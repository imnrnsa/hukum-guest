@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Riwayat Perubahan</h3>

    <form action="{{ route('riwayat-perubahan.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Dokumen</label>
            <select name="dokumen_id" class="form-control">
                @foreach ($dokumen as $d)
                    <option value="{{ $d->id }}" 
                        {{ $data->dokumen_id == $d->id ? 'selected' : '' }}>
                        {{ $d->nama_dokumen }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Perubahan</label>
            <input type="date" name="tanggal" class="form-control" 
                   value="{{ $data->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Versi Dokumen</label>
            <input type="text" name="versi" class="form-control"
                   value="{{ $data->versi }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Uraian Perubahan</label>
            <textarea name="uraian_perubahan" rows="4" class="form-control" required>{{ $data->uraian_perubahan }}</textarea>
        </div>

        <button class="btn btn-warning">Update</button>
        <a href="{{ route('riwayat-perubahan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
