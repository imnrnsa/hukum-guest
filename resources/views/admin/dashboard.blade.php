@extends('layouts.admin')

@section('title', 'Admin Dashboard - Produk Hukum dan Dokumen Publik')
@section('page-title', 'Dashboard Administrator')

@section('content')
<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Total Kategori Card -->
    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
        <div class="flex items-center">
            <div class="bg-blue-100 p-3 rounded-full mr-4">
                <i class="fas fa-folder text-blue-600 text-2xl"></i>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-800">{{ $totalKategori }}</h3>
                <p class="text-gray-600">Total Kategori</p>
            </div>
        </div>
        <a href="{{ route('admin.kategori.index') }}" class="inline-block mt-4 text-blue-600 hover:text-blue-800 text-sm font-semibold">
            Kelola Kategori <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>

    <!-- Total Dokumen Card -->
    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
        <div class="flex items-center">
            <div class="bg-green-100 p-3 rounded-full mr-4">
                <i class="fas fa-file-alt text-green-600 text-2xl"></i>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-800">{{ $totalDokumen }}</h3>
                <p class="text-gray-600">Total Dokumen</p>
            </div>
        </div>
        <a href="{{ route('admin.dokumen.index') }}" class="inline-block mt-4 text-green-600 hover:text-green-800 text-sm font-semibold">
            Kelola Dokumen <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>

    <!-- Total Jenis Card -->
    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
        <div class="flex items-center">
            <div class="bg-purple-100 p-3 rounded-full mr-4">
                <i class="fas fa-tags text-purple-600 text-2xl"></i>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-800">{{ $totalJenis }}</h3>
                <p class="text-gray-600">Jenis Dokumen</p>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="bg-white rounded-lg shadow-md p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Aksi Cepat</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Tambah Kategori -->
        <a href="{{ route('admin.kategori.create') }}" 
           class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 border border-blue-200 transition duration-200 group">
            <div class="bg-blue-600 p-3 rounded-full mr-4 group-hover:bg-blue-700">
                <i class="fas fa-plus-circle text-white"></i>
            </div>
            <div>
                <h4 class="font-semibold text-blue-800">Tambah Kategori Baru</h4>
                <p class="text-sm text-gray-600">Buat kategori dokumen hukum baru</p>
            </div>
            <i class="fas fa-arrow-right ml-auto text-blue-500 opacity-0 group-hover:opacity-100 transition duration-200"></i>
        </a>
        
        <!-- Tambah Dokumen -->
        <a href="{{ route('admin.dokumen.create') }}" 
           class="flex items-center p-4 bg-green-50 rounded-lg hover:bg-green-100 border border-green-200 transition duration-200 group">
            <div class="bg-green-600 p-3 rounded-full mr-4 group-hover:bg-green-700">
                <i class="fas fa-file-medical text-white"></i>
            </div>
            <div>
                <h4 class="font-semibold text-green-800">Tambah Dokumen Baru</h4>
                <p class="text-sm text-gray-600">Tambah dokumen hukum baru ke sistem</p>
            </div>
            <i class="fas fa-arrow-right ml-auto text-green-500 opacity-0 group-hover:opacity-100 transition duration-200"></i>
        </a>
    </div>
</div>

<!-- Recent Activity -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
    <!-- Recent Categories -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Kategori Terbaru</h3>
        <div class="space-y-3">
            @php
                $recentCategories = \App\Models\KategoriDokumen::orderBy('created_at', 'desc')->take(5)->get();
            @endphp
            
            @forelse($recentCategories as $category)
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                <div>
                    <h4 class="font-medium text-gray-800">{{ $category->nama }}</h4>
                    <p class="text-sm text-gray-600">{{ $category->created_at->diffForHumans() }}</p>
                </div>
                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
                    {{ $category->dokumen_count ?? 0 }} dokumen
                </span>
            </div>
            @empty
            <p class="text-gray-500 text-center py-4">Belum ada kategori</p>
            @endforelse
        </div>
    </div>

    <!-- Recent Documents -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Dokumen Terbaru</h3>
        <div class="space-y-3">
            @php
                $recentDocuments = \App\Models\DokumenHukum::with('kategori')
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();
            @endphp
            
            @forelse($recentDocuments as $doc)
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                <div class="flex-1 min-w-0">
                    <h4 class="font-medium text-gray-800 truncate">{{ $doc->judul }}</h4>
                    <p class="text-sm text-gray-600">{{ $doc->kategori->nama }} • {{ $doc->created_at->diffForHumans() }}</p>
                </div>
            </div>
            @empty
            <p class="text-gray-500 text-center py-4">Belum ada dokumen</p>
            @endforelse
        </div>
    </div>
</div>
@endsection