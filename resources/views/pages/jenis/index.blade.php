@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h3 class="mb-3">Jenis Dokumen</h3>

    {{-- SEARCH & FILTER --}}
    <form method="GET" action="{{ route('jenis-dokumen.index') }}" class="mb-3">
        <div class="row">

            <div class="col-md-4">
                <input type="text" name="search" class="form-control"
                    placeholder="Cari nama atau deskripsi..."
                    value="{{ request('search') }}">
            </div>

            <div class="col-md-3">
                <select name="filter" class="form-control">
                    <option value="">-- Filter Huruf Awal --</option>
                    @foreach(range('A','Z') as $letter)
                        <option value="{{ $letter }}" {{ request('filter') == $letter ? 'selected' : '' }}>
                            Dimulai huruf {{ $letter }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <button class="btn btn-primary">Cari</button>
                <a href="{{ route('jenis-dokumen.index') }}" class="btn btn-secondary">Reset</a>
            </div>

        </div>
    </form>

    <a href="{{ route('jenis-dokumen.create') }}" class="btn btn-primary mb-3">Tambah Jenis</a>

    {{-- TABLE --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Jenis</th>
                <th>Deskripsi</th>
                <th width="20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $d)
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

                    <form action="{{ route('jenis-dokumen.destroy', $d->jenis_id) }}" 
                          method="POST" 
                          onsubmit="return confirm('Yakin ingin menghapus?')">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">Hapus</button>

                    </form>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="3" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- PAGINATION --}}
    <div>
        {{ $data->links() }}
    </div>

</div>
@endsection
