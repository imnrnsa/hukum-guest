@extends('layouts.guest')

@section('title', 'Dokumen ' . $category->nama . ' - LegalHub')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Category Header -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Kategori: {{ $category->nama }}</h1>
                @if($category->deskripsi)
                    <p class="text-gray-600">{{ $category->deskripsi }}</p>
                @endif
            </div>
            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">
                {{ $documents->total() }} dokumen
            </span>
        </div>
    </div>

    <!-- Documents Grid -->
    @if($documents->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @foreach($documents as $document)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-200">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
                            {{ $document->jenis->nama_jenis }}
                        </span>
                        <span class="text-sm text-gray-500">{{ $document->tanggal->format('d M Y') }}</span>
                    </div>
                    
                    <h3 class="font-semibold text-lg mb-2 line-clamp-2">
                        <a href="{{ route('document.detail', $document->dokumen_id) }}" class="hover:text-blue-600">
                            {{ $document->judul }}
                        </a>
                    </h3>
                    
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $document->ringkasan }}</p>
                    
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500">{{ $document->nomor }}</span>
                        <a href="{{ route('document.detail', $document->dokumen_id) }}" 
                           class="text-blue-600 hover:text-blue-800 text-sm font-semibold">
                            Baca Selengkapnya
                        </a>
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
        <div class="bg-white rounded-lg shadow-md p-8 text-center">
            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-folder-open text-gray-400 text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum ada dokumen</h3>
            <p class="text-gray-600 mb-4">Tidak ada dokumen dalam kategori ini.</p>
            <a href="{{ route('search') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                Lihat Semua Dokumen
            </a>
        </div>
    @endif
</div>
@endsection