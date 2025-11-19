@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3>Dokumen Hukum</h3>

    <a href="{{ route('dokumen-hukum.create') }}" class="btn btn-primary mb-3">Tambah Dokumen</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Judul</th>
                <th>Jenis</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td>{{ $d->nomor }}</td>
                <td>{{ $d->judul }}</td>
                <td>{{ $d->jenis->nama_jenis }}</td>
                <td>{{ $d->kategori->nama_kategori }}</td>
                <td>{{ $d->tanggal }}</td>
                <td>{{ $d->status }}</td>
                <td class="d-flex gap-2">

                    <a href="{{ route('dokumen-hukum.edit', $d->dokumen_id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <a href="{{ route('dokumen-hukum.show', $d->dokumen_id) }}" class="btn btn-info btn-sm">Detail</a>

                    <form action="{{ route('dokumen-hukum.destroy', $d->dokumen_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
