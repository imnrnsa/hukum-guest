@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="mb-3">Tambah Kategori Dokumen</h3>

    <form action="{{ route('kategori-dokumen.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('kategori-dokumen.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
