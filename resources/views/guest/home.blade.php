@extends('layouts.guest')

@section('title', 'LegalHub - Platform Hukum Terpercaya')

@section('content')
    <!-- Hero Section -->
    <section class="bg-blue-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">{{ $heroData['title'] }}</h1>
            <p class="text-xl mb-8 text-blue-100">{{ $heroData['subtitle'] }}</p>
            
            <!-- Search Box -->
            <form action="{{ route('search') }}" method="GET" class="max-w-2xl mx-auto">
                <div class="flex shadow-lg rounded-lg overflow-hidden">
                    <input 
                        type="text" 
                        name="q"
                        placeholder="{{ $heroData['search_placeholder'] }}"
                        class="flex-grow px-6 py-4 text-gray-800 focus:outline-none"
                    >
                    <button type="submit" class="bg-blue-700 px-8 hover:bg-blue-800 transition duration-200">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Kategori Dokumen Hukum</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($popularCategories as $category)
                <a href="{{ route('category.documents', $category->kategori_id) }}" 
                   class="bg-gray-50 p-6 rounded-lg text-center hover:shadow-lg transition duration-200 border border-gray-200">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-file-alt text-blue-600"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-2">{{ $category->nama }}</h3>
                    <p class="text-sm text-gray-600">{{ $category->dokumen_count }} dokumen</p>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Recent Documents -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center mb-12">
                <h2 class="text-3xl font-bold">Dokumen Terbaru</h2>
                <a href="{{ route('search') }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                    Lihat Semua <i class="ml-1 fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($recentDocuments as $document)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
                                {{ $document->jenis->nama_jenis }}
                            </span>
                            <span class="text-sm text-gray-500">{{ $document->tanggal->format('d M Y') }}</span>
                        </div>
                        <h3 class="font-semibold text-lg mb-2 line-clamp-2">{{ $document->judul }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $document->ringkasan }}</p>
                        <div class="flex justify-between items-center">
                            <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                                {{ $document->kategori->nama }}
                            </span>
                            <a href="{{ route('document.detail', $document->dokumen_id) }}" 
                               class="text-blue-600 hover:text-blue-800 text-sm font-semibold">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Mengapa Memilih LegalHub?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Terpercaya</h3>
                    <p class="text-gray-600">Dokumen hukum dari sumber resmi dan terupdate</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-search text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Mudah Dicari</h3>
                    <p class="text-gray-600">Sistem pencarian canggih dengan filter lengkap</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clock text-orange-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Terupdate</h3>
                    <p class="text-gray-600">Selalu mendapatkan informasi hukum terbaru</p>
                </div>
            </div>
        </div>
    </section>
@endsection