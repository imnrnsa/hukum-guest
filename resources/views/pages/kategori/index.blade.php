@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h3 class="mb-3">Daftar Kategori Dokumen</h3>

    {{-- SEARCH + FILTER --}}
    <form action="{{ route('kategori-dokumen.index') }}" method="GET" class="mb-3">
        <div class="row">

            {{-- Kolom Search --}}
            <div class="col-md-4">
                <input type="text" name="search" class="form-control"
                       placeholder="Cari kategori..."
                       value="{{ request('search') }}">
            </div>

            {{-- Kolom Filter Huruf --}}
            <div class="col-md-3">
                <select name="filter" class="form-control">
                    <option value="">-- Filter Huruf Awal --</option>
                    @foreach(range('A','Z') as $letter)
                        <option value="{{ $letter }}" 
                                {{ request('filter') == $letter ? 'selected' : '' }}>
                            Dimulai dengan huruf {{ $letter }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tombol --}}
            <div class="col-md-3">
                <button class="btn btn-primary">Cari</button>
                <a href="{{ route('kategori-dokumen.index') }}" class="btn btn-secondary">Reset</a>
            </div>

        </div>
    </form>

    {{-- Tombol Tambah --}}
    <a href="{{ route('kategori-dokumen.create') }}" class="btn btn-primary mb-3">+ Tambah Kategori</a>

    {{-- Flash Success --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- TABLE --}}
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="70">ID</th>
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

                        {{-- EDIT --}}
                        <a href="{{ route('kategori-dokumen.edit', $d->kategori_id) }}" 
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        {{-- DELETE --}}
                        <form action="{{ route('kategori-dokumen.destroy', $d->kategori_id) }}" 
                              method="POST">

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

    {{-- PAGINATION --}}
    <div class="mt-3">
        {{ $data->links() }}
    </div>

</div>
@endsection
