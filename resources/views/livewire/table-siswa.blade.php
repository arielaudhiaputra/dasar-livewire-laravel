<div class="row">
    <div class="col-lg-12">
        <div class="card p-4">
            <div class="table-responsive text-nowrap">
                <div class="float-start d-flex justify-content-center align-items-center gap-2 py-2">
                    <label for="">Show</label>
                    <select class="form-select form-select-sm" style="width: 70px;" wire:model="pagination" aria-label="Default select example">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <label for="">Entries</label>
                </div>

                <div class="float-end d-flex align-items-center gap-3 py-2">
                    <div class=" d-flex align-items-center justify-content-center float-end gap-2">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto"><label for="">Select Lembaga :</label></div>
                            <div class="col-auto">
                                <select name="lembaga" id="lembaga" width="" class="form-control form-select-sm" wire:model="id_lembaga">
                                    <option value="0">Semua Lembaga</option>
                                    @foreach ($dataLembaga as $lembaga )
                                    <option value="{{ $lembaga->id }}">{{ $lembaga->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Search :</label>
                        <input type="text" wire:model="search">
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <th>No</th>
                        <th width="20%">Nama</th>
                        <th>NIS</th>
                        <th>Lembaga</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($dataSiswa as $key => $siswa )
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-4">
                                        @if ($siswa->foto != null)
                                        <img src="{{ url(Storage::url($siswa->foto)) }}" alt="Img Profil" class="img-thumbnail rounded-circle" width="80">
                                        @else
                                        <img src="{{ url('assets/img/profile/default.png') }}" alt="Img Profil" class="img-thumbnail rounded-circle" width="80">
                                        @endif
                                    </div>
                                    <div class="col-3 pl-2 mt-3">
                                        <span class="fw-bold">{{ $siswa->nama }}</span> <br>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $siswa->nis }}</td>
                            <td>{{ $siswa->lembaga->nama }}</td>
                            <td>{{ $siswa->email }}</td>
                            <td>
                                <a href="{{ route('siswa.show', $siswa->id) }}"><i class="text-primary bx bx-edit-alt me-1"></i></a>
                                <a href="" wire:click.prevent="deleteSiswaConfirmation({{ $siswa->id }})"><i class=" text-danger bx bx-trash me-1"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="float-end mt-4">
                    {{ $dataSiswa->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('show-delete-confirmation', event => {
        Swal.fire({
            title: "Apa Kamu yakin?",
            text: "Anda tidak akan dapat mengembalikannya!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('deleteSiswaConfirmed');
            }
        });
    });

    window.addEventListener('siswaDeleted', event => {
        Swal.fire({
            title: "Deleted",
            text: "Data siswa berhasil dihapus",
            icon: "success"
        })
    });
</script>