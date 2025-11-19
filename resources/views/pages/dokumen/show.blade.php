@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3>Detail Dokumen</h3>

    <p><strong>Nomor:</strong> {{ $data->nomor }}</p>
    <p><strong>Judul:</strong> {{ $data->judul }}</p>
    <p><strong>Jenis:</strong> {{ $data->jenis->nama_jenis }}</p>
    <p><strong>Kategori:</strong> {{ $data->kategori->nama_kategori }}</p>
    <p><strong>Tanggal:</strong> {{ $data->tanggal }}</p>
    <p><strong>Ringkasan:</strong> {{ $data->ringkasan }}</p>
    <p><strong>Status:</strong> {{ $data->status }}</p>

    <a href="{{ route('dokumen-hukum.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
