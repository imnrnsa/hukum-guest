@extends('layouts.guest')

@section('title', $document->judul . ' - LegalHub')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <!-- Document Header -->
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <span class="bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full">
                            {{ $document->jenis->nama_jenis }}
                        </span>
                        <span class="bg-gray-100 text-gray-800 text-sm px-3 py-1 rounded-full ml-2">
                            {{ $document->kategori->nama }}
                        </span>
                    </div>
                    <span class="text-gray-500 text-sm">{{ $document->tanggal->format('d F Y') }}</span>
                </div>

                <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $document->judul }}</h1>
                
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                    <div class="flex items-start">
                        <i class="fas fa-file-alt text-yellow-600 mt-1 mr-3"></i>
                        <div>
                            <h3 class="font-semibold text-yellow-800">Nomor Dokumen</h3>
                            <p class="text-yellow-700">{{ $document->nomor }}</p>
                        </div>
                    </div>
                </div>

                <!-- Document Content -->
                <div class="prose max-w-none">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Ringkasan</h3>
                    <div class="text-gray-700 leading-relaxed">
                        {!! nl2br(e($document->ringkasan)) !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Related Documents -->
            @if($relatedDocuments->count() > 0)
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Dokumen Terkait</h3>
                <div class="space-y-4">
                    @foreach($relatedDocuments as $relatedDoc)
                    <div class="border-l-4 border-blue-500 pl-4">
                        <a href="{{ route('document.detail', $relatedDoc->dokumen_id) }}" 
                           class="font-medium text-gray-800 hover:text-blue-600 line-clamp-2">
                            {{ $relatedDoc->judul }}
                        </a>
                        <p class="text-sm text-gray-600 mt-1">{{ $relatedDoc->tanggal->format('d M Y') }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Aksi Cepat</h3>
                <div class="space-y-3">
                    <a href="{{ route('search') }}" 
                       class="flex items-center p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition duration-200">
                        <i class="fas fa-search text-blue-600 mr-3"></i>
                        <span>Cari Dokumen Lain</span>
                    </a>
                    <a href="{{ route('category.documents', $document->kategori_id) }}" 
                       class="flex items-center p-3 bg-green-50 rounded-lg hover:bg-green-100 transition duration-200">
                        <i class="fas fa-folder text-green-600 mr-3"></i>
                        <span>Dokumen {{ $document->kategori->nama }} Lainnya</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection