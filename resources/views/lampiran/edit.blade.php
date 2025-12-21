@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Edit Lampiran</h3>

    <form action="{{ route('lampiran-dokumen.update', $data->lampiran_id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <label>Judul</label>
        <input type="text" name="judul" value="{{ $data->judul }}" class="form-control mb-2" required>

        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control mb-2">{{ $data->deskripsi }}</textarea>

        <label>Tambah File Baru (opsional)</label>
        <input type="file" name="files[]" multiple class="form-control mb-3">

        <button class="btn btn-primary">Update</button>
    </form>

</div>
@endsection
