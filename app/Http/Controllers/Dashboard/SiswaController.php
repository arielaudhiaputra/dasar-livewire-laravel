<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Lembaga;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.index');
    }

    public function create()
    {
        $dataLembaga = Lembaga::all();

        return view('siswa.siswa_create', compact('dataLembaga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_lembaga' => 'required',
            'nis' => 'required|numeric|unique:siswa,nis',
            'nama' => 'required|string',
            'email' => 'required|unique:siswa,email,id',
            'foto' => 'required|image|mimes:jpeg,png|max:100',
        ]);


        $siswa = new Siswa;
        $siswa->id_lembaga = $request->id_lembaga;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->email = $request->email;
        $fotoPath = $request->file('foto')->store('siswa_fotos', 'public');
        $siswa->foto = $fotoPath;
        $siswa->save();

        return back()->with('success', 'Berhasil menambahkan data siswa!');
    }

    public function show($id)
    {
        $siswa = Siswa::find($id)->first();
        $dataLembaga = Lembaga::all();

        return view('siswa.siswa_update', compact('siswa', 'dataLembaga'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);

        $request->validate([
            'id_lembaga' => 'required',
            'nis' => 'required|numeric|unique:siswa,nis,' . $id,
            'nama' => 'required|string',
            'email' => 'required|unique:siswa,email,' . $id,
            'foto' => 'image|mimes:jpeg,png|max:100',
        ]);

        if (
            $siswa->id_lembaga == $request->id_lembaga &&
            $siswa->nis == $request->nis &&
            $siswa->nama == $request->nama &&
            $siswa->email == $request->email &&
            !$request->hasFile('foto')
        ) {
            // Tidak ada perubahan, kembalikan dengan pesan error
            return back()->with('error', 'Tidak ada perubahan data untuk disimpan.');
        }


        $siswa->id_lembaga = $request->id_lembaga;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->email = $request->email;
        $siswa->save();
        if ($request->hasFile('foto')) {
            //get old foto siswa
            $get_foto_siswa = $siswa['foto'];

            //update foto siswa
            $fotoPath = $request->file('foto')->store('siswa_fotos', 'public');
            $siswa->foto = $fotoPath;
            $siswa->save();

            //delete foto old siswa
            $data = 'storage/' . $get_foto_siswa;
            if (File::exists($data)) {
                File::delete($data);
            } else {
                File::delete('storage/app/public/' . $get_foto_siswa);
            }
        }

        return back()->with('success', 'Berhasil Update data siswa!');
    }
}
