@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3>Edit Jenis Dokumen</h3>

    <form method="POST" action="{{ route('jenis-dokumen.update', $data->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Jenis</label>
            <input type="text" name="nama_jenis" value="{{ $data->nama_jenis }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $data->deskripsi }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
@include('layouts.scripts')