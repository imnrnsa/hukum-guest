@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="mb-3">Tambah Dokumen Hukum</h3>

    <form action="{{ route('dokumen-hukum.store') }}" method="POST">
        @csrf

        {{-- JENIS DOKUMEN --}}
        <div class="mb-3">
            <label class="form-label">Jenis Dokumen</label>
            <select name="jenis_id" class="form-control" required>
                <option value="">-- Pilih Jenis Dokumen --</option>
                @foreach($jenis as $j)
                    <option value="{{ $j->jenis_id }}">{{ $j->nama_jenis }}</option>
                @endforeach
            </select>
        </div>

        {{-- KATEGORI DOKUMEN --}}
        <div class="mb-3">
            <label class="form-label">Kategori Dokumen</label>
            <select name="kategori_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $k)
                    <option value="{{ $k->kategori_id }}">{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        {{-- NOMOR --}}
        <div class="mb-3">
            <label class="form-label">Nomor Dokumen</label>
            <input type="text" name="nomor" class="form-control" required>
        </div>

        {{-- JUDUL --}}
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        {{-- TANGGAL --}}
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        {{-- RINGKASAN --}}
        <div class="mb-3">
            <label class="form-label">Ringkasan</label>
            <textarea name="ringkasan" class="form-control"></textarea>
        </div>

        {{-- STATUS --}}
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="">-- Pilih Status --</option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('dokumen-hukum.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
