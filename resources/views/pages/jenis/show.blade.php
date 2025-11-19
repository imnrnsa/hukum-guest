@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3>Detail Jenis Dokumen</h3>

    <p><strong>Nama Jenis:</strong> {{ $data->nama_jenis }}</p>
    <p><strong>Deskripsi:</strong> {{ $data->deskripsi }}</p>

    <a href="{{ route('jenis-dokumen.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
