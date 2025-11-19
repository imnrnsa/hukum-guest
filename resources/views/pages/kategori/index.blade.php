@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="mb-3">Daftar Kategori Dokumen</h3>

    <a href="{{ route('kategori-dokumen.create') }}" class="btn btn-primary mb-3">+ Tambah Kategori</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="50">ID</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $d)
                <tr>
                    <td>{{ $d->kategori_id }}</td>
                    <td>{{ $d->nama_kategori }}</td>
                    <td>{{ $d->deskripsi }}</td>
                    <td class="d-flex gap-2">

                        {{-- Tombol Edit --}}
                        <a href="{{ route('kategori-dokumen.edit', $d->kategori_id) }}" 
                           class="btn btn-warning btn-sm">Edit</a>

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('kategori-dokumen.destroy', $d->kategori_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Yakin ingin menghapus?')">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
