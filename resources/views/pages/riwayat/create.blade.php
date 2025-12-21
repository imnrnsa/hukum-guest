@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tambah Riwayat Perubahan</h3>

    <form action="{{ route('riwayat-perubahan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Dokumen</label>
            <select name="dokumen_id" class="form-control" required>
                <option value="">-- Pilih Dokumen --</option>
                @foreach ($dokumen as $d)
                    <option value="{{ $d->id }}">{{ $d->nama_dokumen }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Perubahan</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Versi Dokumen</label>
            <input type="text" name="versi" class="form-control" placeholder="Misal: 1.0 / 2.3" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Uraian Perubahan</label>
            <textarea name="uraian_perubahan" rows="4" class="form-control" required></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('riwayat-perubahan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
