@extends('layouts.guest')

@section('title', 'Cari Dokumen Hukum - LegalHub')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Search Header -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Cari Dokumen Hukum</h1>
        
        <!-- Search Form -->
        <form action="{{ route('search') }}" method="GET" class="mb-6">
            <div class="flex shadow-lg rounded-lg overflow-hidden">
                <input 
                    type="text" 
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="Cari berdasarkan judul, nomor, atau ringkasan dokumen..."
                    class="flex-grow px-6 py-4 text-gray-800 focus:outline-none"
                >
                <button type="submit" class="bg-blue-600 text-white px-8 hover:bg-blue-700 transition duration-200">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

        <!-- Filter Options -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Filter by Kategori</label>
                <select name="category" onchange="this.form.submit()" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->kategori_id }}" {{ request('category') == $category->kategori_id ? 'selected' : '' }}>
                            {{ $category->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Filter by Jenis</label>
                <select name="type" onchange="this.form.submit()" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Semua Jenis</option>
                    @foreach($types as $type)
                        <option value="{{ $type->jenis_id }}" {{ request('type') == $type->jenis_id ? 'selected' : '' }}>
                            {{ $type->nama_jenis }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Search Results -->
    <div class="mb-6">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">
                @if(request('q') || request('category') || request('type'))
                    Hasil Pencarian
                    @if(request('q'))
                        untuk "{{ request('q') }}"
                    @endif
                @else
                    Semua Dokumen Hukum
                @endif
            </h2>
            <span class="text-gray-600">{{ $documents->total() }} dokumen ditemukan</span>
        </div>
    </div>

    <!-- Documents Grid -->
    @if($documents->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @foreach($documents as $document)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-200 border border-gray-200">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
                            {{ $document->jenis->nama_jenis }}
                        </span>
                        <span class="text-sm text-gray-500">{{ $document->tanggal->format('d M Y') }}</span>
                    </div>
                    
                    <h3 class="font-semibold text-lg mb-2 line-clamp-2 hover:text-blue-600">
                        <a href="{{ route('document.detail', $document->dokumen_id) }}">
                            {{ $document->judul }}
                        </a>
                    </h3>
                    
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $document->ringkasan }}</p>
                    
                    <div class="flex justify-between items-center">
                        <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                            {{ $document->kategori->nama }}
                        </span>
                        <span class="text-xs text-gray-500">{{ $document->nomor }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="bg-white rounded-lg shadow-md p-4">
            {{ $documents->links() }}
        </div>
    @else
        <!-- No Results -->
        <div class="bg-white rounded-lg shadow-md p-8 text-center">
            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-search text-gray-400 text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Tidak ada dokumen ditemukan</h3>
            <p class="text-gray-600 mb-4">
                @if(request('q'))
                    Tidak ada hasil untuk "{{ request('q') }}". Coba dengan kata kunci lain.
                @else
                    Belum ada dokumen yang tersedia.
                @endif
            </p>
            <a href="{{ route('search') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                Tampilkan Semua Dokumen
            </a>
        </div>
    @endif
</div>

<script>
    // Auto-submit form when filters change
    document.addEventListener('DOMContentLoaded', function() {
        const selects = document.querySelectorAll('select[name="category"], select[name="type"]');
        selects.forEach(select => {
            select.addEventListener('change', function() {
                this.form.submit();
            });
        });
    });
</script>
@endsection