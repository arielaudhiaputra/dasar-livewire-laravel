@extends('layouts.sneat.main')
@section('title', 'Siswa')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="fw-bold py-3 mb-4 float-start">Tabel Siswa</h4>
            <a href="{{ route('siswa.create') }}" class="btn btn-success btn-block float-end mt-2">Tambah Siswa</a>
        </div>
    </div>
    @livewire('table-siswa')
</div>
@endsection