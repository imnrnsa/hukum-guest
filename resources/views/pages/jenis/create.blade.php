@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3>Tambah Jenis Dokumen</h3>

    <form method="POST" action="{{ route('jenis-dokumen.store') }}">
        @csrf

        <div class="mb-3">
            <label>Nama Jenis</label>
            <input type="text" name="nama_jenis" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
