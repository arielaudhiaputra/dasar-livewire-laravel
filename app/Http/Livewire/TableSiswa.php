<?php

namespace App\Http\Livewire;

use App\Models\Siswa;
use App\Models\Lembaga;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TableSiswa extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $id_lembaga = 0, $pagination = 5, $search, $deleteSiswaId;
    protected $listeners = ['deleteSiswaConfirmed' => 'deleteSiswa'];

    public function render()
    {
        $siswaQuery = Siswa::query();


        if ($this->search) {
            $siswaQuery->where(function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('nis', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->id_lembaga != 0) {
            $siswaQuery->where('id_lembaga', $this->id_lembaga);
        }



        $dataSiswa = $siswaQuery->paginate($this->pagination);
        $dataLembaga = Lembaga::all();

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('livewire.table-siswa', compact('dataSiswa', 'dataLembaga'));
    }

    public function updating()
    {
        $this->resetPage();
    }

    public function deleteSiswaConfirmation($id)
    {
        $this->deleteSiswaId = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteSiswa()
    {
        $siswa = Siswa::find($this->deleteSiswaId);
        if ($siswa) {
            $data = 'storage/' . $siswa['foto'];
            if (File::exists($data)) {
                File::delete($data);
            } else {
                File::delete('storage/app/public/' . $siswa['foto']);
            }

            $siswa->delete();


            $this->dispatchBrowserEvent('siswaDeleted');
        }
    }
}
