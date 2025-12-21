@extends('layouts.app')

@section('content')
<div class="container">

    <a href="{{ route('lampiran-dokumen.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

    <table class="table table-bordered">
        <tr>
            <th>Judul</th>
            <th>Jumlah Lampiran</th>
            <th>Aksi</th>
        </tr>

        @foreach($data as $d)
        <tr>
            <td>{{ $d->judul }}</td>
            <td>{{ $d->files->count() }}</td>
            <td>
                <a href="{{ route('lampiran-dokumen.show', $d->lampiran_id) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('lampiran-dokumen.edit', $d->lampiran_id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('lampiran-dokumen.destroy', $d->lampiran_id) }}" method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

    {{ $data->links() }}

</div>
@endsection
