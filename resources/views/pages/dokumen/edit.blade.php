@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">Edit Dokumen Hukum</h3>

    <form action="{{ route('dokumen-hukum.update', $data->dokumen_id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Jenis Dokumen --}}
        <div class="mb-3">
            <label class="form-label">Jenis Dokumen</label>
            <select name="jenis_id" class="form-control" required>
                <option value="">-- Pilih Jenis --</option>
                @foreach ($jenis as $j)
                    <option value="{{ $j->jenis_id }}" {{ $j->jenis_id == $data->jenis_id ? 'selected' : '' }}>
                        {{ $j->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Kategori Dokumen --}}
        <div class="mb-3">
            <label class="form-label">Kategori Dokumen</label>
            <select name="kategori_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->kategori_id }}" {{ $k->kategori_id == $data->kategori_id ? 'selected' : '' }}>
                        {{ $k->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Nomor --}}
        <div class="mb-3">
            <label class="form-label">Nomor Dokumen</label>
            <input type="text" name="nomor" class="form-control" value="{{ $data->nomor }}" required>
        </div>

        {{-- Judul --}}
        <div class="mb-3">
            <label class="form-label">Judul Dokumen</label>
            <input type="text" name="judul" class="form-control" value="{{ $data->judul }}" required>
        </div>

        {{-- Tanggal --}}
        <div class="mb-3">
            <label class="form-label">Tanggal Dokumen</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $data->tanggal }}" required>
        </div>

        {{-- Ringkasan --}}
        <div class="mb-3">
            <label class="form-label">Ringkasan</label>
            <textarea name="ringkasan" class="form-control" rows="4">{{ $data->ringkasan }}</textarea>
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="Berlaku" {{ $data->status == 'Berlaku' ? 'selected' : '' }}>Berlaku</option>
                <option value="Dicabut" {{ $data->status == 'Dicabut' ? 'selected' : '' }}>Dicabut</option>
                <option value="Revisi"  {{ $data->status == 'Revisi'  ? 'selected' : '' }}>Revisi</option>
                <option value="Tidak Berlaku" {{ $data->status == 'Tidak Berlaku' ? 'selected' : '' }}>Tidak Berlaku</option>
            </select>
        </div>

        {{-- Tombol --}}
        <div class="d-flex gap-2">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('dokumen-hukum.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

    </form>
</div>
@endsection
