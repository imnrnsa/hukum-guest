@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h3 class="mb-3">Dokumen Hukum</h3>

    {{-- SEARCH & FILTER --}}
    <form action="{{ route('dokumen-hukum.index') }}" method="GET" class="mb-4">
        <div class="row">

            {{-- Search --}}
            <div class="col-md-3 mb-2">
                <input type="text" name="search" class="form-control"
                       value="{{ request('search') }}"
                       placeholder="Cari nomor / judul / ringkasan">
            </div>

            {{-- Filter Jenis --}}
            <div class="col-md-3 mb-2">
                <select name="jenis" class="form-control">
                    <option value="">-- Semua Jenis --</option>
                    @foreach($jenisList as $j)
                        <option value="{{ $j->jenis_id }}"
                            {{ request('jenis') == $j->jenis_id ? 'selected' : '' }}>
                            {{ $j->nama_jenis }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Filter Kategori --}}
            <div class="col-md-3 mb-2">
                <select name="kategori" class="form-control">
                    <option value="">-- Semua Kategori --</option>
                    @foreach($kategoriList as $k)
                        <option value="{{ $k->kategori_id }}"
                            {{ request('kategori') == $k->kategori_id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Filter Status --}}
            <div class="col-md-2 mb-2">
                <select name="status" class="form-control">
                    <option value="">-- Semua Status --</option>
                    <option value="Berlaku" {{ request('status') == 'Berlaku' ? 'selected' : '' }}>Berlaku</option>
                    <option value="Tidak Berlaku" {{ request('status') == 'Tidak Berlaku' ? 'selected' : '' }}>Tidak Berlaku</option>
                    <option value="Draft" {{ request('status') == 'Draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>

            {{-- Tombol --}}
            <div class="col-md-1 mb-2">
                <button class="btn btn-primary w-100">Cari</button>
            </div>

            <div class="col-md-12 mt-2">
                <a href="{{ route('dokumen-hukum.index') }}" class="btn btn-secondary btn-sm">
                    Reset
                </a>
            </div>
        </div>
    </form>

    {{-- Tombol Tambah --}}
    <a href="{{ route('dokumen-hukum.create') }}" class="btn btn-primary mb-3">
        Tambah Dokumen
    </a>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- TABLE --}}
    <table class="table table-bordered table-striped align-middle">
        <thead>
            <tr class="text-center">
                <th>Nomor</th>
                <th>Judul</th>
                <th>Jenis</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>File</th>
                <th width="220">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($data as $d)
                <tr>
                    <td>{{ $d->nomor }}</td>
                    <td>{{ $d->judul }}</td>
                    <td>{{ $d->jenis->nama_jenis }}</td>
                    <td>{{ $d->kategori->nama_kategori }}</td>
                    <td>{{ $d->tanggal }}</td>
                    <td>{{ $d->status }}</td>

                    {{-- File --}}
                    <td class="text-center">
                        @if($d->file_path)
                            <a href="{{ asset($d->file_path) }}" target="_blank"
                               class="btn btn-success btn-sm">
                                Lihat
                            </a>
                        @else
                            <span class="text-muted">Tidak ada file</span>
                        @endif
                    </td>

                    {{-- Aksi --}}
                    <td class="d-flex gap-2 justify-content-center">
                        <a href="{{ route('dokumen-hukum.edit', $d->dokumen_id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <a href="{{ route('dokumen-hukum.show', $d->dokumen_id) }}"
                           class="btn btn-info btn-sm">Detail</a>

                        <form action="{{ route('dokumen-hukum.destroy', $d->dokumen_id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                {{-- PLACEHOLDER JIKA DATA KOSONG --}}
                <tr>
                    <td colspan="8" class="text-center py-4 text-muted">
                        <strong>Data dokumen tidak ditemukan</strong><br>
                        Silakan ubah kata kunci pencarian atau filter.
                    </td>
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
