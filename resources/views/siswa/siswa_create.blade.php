@extends('layouts.sneat.main')
@section('title', 'Tambah Siswa')
@section('content')


<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Tambah Siswa</div>

                <div class="card-body">

                    <form enctype="multipart/form-data" method="post" action="{{ route('siswa.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            @if ($errors->has('nama'))
                            <p class="text-danger text-small mt-2">{{ $errors->first('nama') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="text" class="form-control" id="nis" name="nis">
                            @if ($errors->has('nis'))
                            <p class="text-danger text-small mt-2">{{ $errors->first('nis') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @if ($errors->has('email'))
                            <p class="text-danger text-small mt-2">{{ $errors->first('email') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="id_lembaga" class="form-label">Lembaga</label>
                            <select class="form-control" id="id_lembaga" name="id_lembaga">
                                <option value="" selected>Select Lembaga</option>
                                @foreach($dataLembaga as $lembaga)
                                <option value="{{ $lembaga->id }}">{{ $lembaga->nama }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('id_lembaga'))
                            <p class="text-danger text-small mt-2">{{ $errors->first('id_lembaga') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                            @if ($errors->has('foto'))
                            <p class="text-danger text-small mt-2">{{ $errors->first('foto') }}</p>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection