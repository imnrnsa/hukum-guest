@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="mb-3">Edit Kategori Dokumen</h3>

    <form action="{{ route('kategori-dokumen.update', $data->kategori_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" 
                   value="{{ $data->nama_kategori }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $data->deskripsi }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('kategori-dokumen.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
@include('layouts.scripts')