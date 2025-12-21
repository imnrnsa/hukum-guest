@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Tambah Lampiran</h3>

    <form action="{{ route('lampiran-dokumen.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Judul</label>
        <input type="text" name="judul" class="form-control mb-2" required>

        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control mb-2"></textarea>

        <label>Upload Banyak File atau Foto</label>
        <input type="file" name="files[]" multiple class="form-control mb-3">

        <button class="btn btn-primary">Simpan</button>
    </form>

</div>
@endsection

