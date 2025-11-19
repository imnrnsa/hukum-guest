@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3>Jenis Dokumen</h3>

    <a href="{{ route('jenis-dokumen.create') }}" class="btn btn-primary mb-3">Tambah Jenis</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Jenis</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td>{{ $d->nama_jenis }}</td>
                <td>{{ $d->deskripsi }}</td>
                <td class="d-flex gap-2">

                    <a href="{{ route('jenis-dokumen.edit', $d->jenis_id) }}" class="btn btn-warning btn-sm">
    Edit
</a>


                    <a href="{{ route('jenis-dokumen.show', $d->jenis_id) }}" class="btn btn-info btn-sm">
                        Detail
                    </a>

                    <form action="{{ route('jenis-dokumen.destroy', $d->jenis_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
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
