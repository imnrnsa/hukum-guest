@extends('layouts.admin')

@section('title', 'Tambah Dokumen Hukum - LegalHub')
@section('page-title', 'Tambah Dokumen Hukum Baru')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('admin.dokumen.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-4">
                    <!-- Jenis Dokumen -->
                    <div>
                        <label for="jenis_id" class="block text-gray-700 text-sm font-bold mb-2">Jenis Dokumen *</label>
                        <select id="jenis_id" name="jenis_id" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Pilih Jenis Dokumen</option>
                            <option value="1">Surat Keputusan</option>
                            <option value="2">Peraturan</option>
                            <option value="3">Laporan</option>
                            <option value="4">Notulen</option>
                            <option value="5">Dokumen Pendukung</option>
                            @foreach ($jenis as $j)
                                <option value="{{ $j->jenis_id }}" {{ old('jenis_id') == $j->jenis_id ? 'selected' : '' }}>
                                    {{ $j->nama_jenis }}
                                </option>
                            @endforeach
                        </select>
                        @error('jenis_id')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Kategori Dokumen -->
                    <div>
                        <label for="kategori_id" class="block text-gray-700 text-sm font-bold mb-2">Kategori *</label>
                        <select id="kategori_id" name="kategori_id" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Pilih Kategori</option>
                            <option value="1">Internal</option>
                            <option value="2">Eksternal</option>
                            <option value="3">Rahasia</option>
                            <option value="4">Publik</option>
                            <option value="5">Arsip</option>
                            @foreach ($kategories as $kategori)
                                <option value="{{ $kategori->kategori_id }}"
                                    {{ old('kategori_id') == $kategori->kategori_id ? 'selected' : '' }}>
                                    {{ $kategori->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nomor Dokumen -->
                    <div>
                        <label for="nomor" class="block text-gray-700 text-sm font-bold mb-2">Nomor Dokumen *</label>
                        <input type="text" id="nomor" name="nomor" value="{{ old('nomor') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Contoh: UU No. 1 Tahun 2024" required>
                        @error('nomor')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tanggal -->
                    <div>
                        <label for="tanggal" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Dokumen *</label>
                        <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            required>
                        @error('tanggal')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status *</label>
                        <select id="status" name="status" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif
                            </option>
                        </select>
                        @error('status')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-4">
                    <!-- Judul Dokumen -->
                    <div>
                        <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul Dokumen *</label>
                        <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Masukkan judul lengkap dokumen" required>
                        @error('judul')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Ringkasan -->
                    <div>
                        <label for="ringkasan" class="block text-gray-700 text-sm font-bold mb-2">Ringkasan *</label>
                        <textarea id="ringkasan" name="ringkasan" rows="8"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Masukkan ringkasan atau deskripsi dokumen..." required>{{ old('ringkasan') }}</textarea>
                        @error('ringkasan')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-3 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.dokumen.index') }}"
                    class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition duration-200 font-semibold">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200 font-semibold">
                    <i class="fas fa-save mr-2"></i>Simpan Dokumen
                </button>
            </div>
        </form>
    </div>

    <script>
        // Set default tanggal ke hari ini
        document.addEventListener('DOMContentLoaded', function() {
            if (!document.getElementById('tanggal').value) {
                const today = new Date().toISOString().split('T')[0];
                document.getElementById('tanggal').value = today;
            }
        });
    </script>
@endsection
