@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Riwayat Perubahan Dokumen</h3>

    <a href="{{ route('riwayat-perubahan.create') }}" class="btn btn-primary mb-3">
        Tambah Riwayat
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Dokumen</th>
                <th>Tanggal</th>
                <th>Versi</th>
                <th>Uraian Perubahan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->dokumen->nama_dokumen ?? '-' }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->versi }}</td>
                    <td>{{ $item->uraian_perubahan }}</td>
                    <td>
                        <a href="{{ route('riwayat-perubahan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('riwayat-perubahan.destroy', $item->id) }}" 
                              method="POST" 
                              style="display:inline-block;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
