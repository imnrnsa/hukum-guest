@extends('layouts.admin')

@section('title', 'Kelola Dokumen Hukum - LegalHub')
@section('page-title', 'Kelola Dokumen Hukum')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="flex justify-between items-center p-6 bg-gray-50 border-b">
        <div>
            <h3 class="text-lg font-semibold">Daftar Dokumen Hukum</h3>
            <p class="text-gray-600 text-sm mt-1">Total {{ $dokumens->count() }} dokumen</p>
        </div>
        <a href="{{ route('admin.dokumen.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200 font-semibold">
            <i class="fas fa-plus mr-2"></i>Tambah Dokumen
        </a>
    </div>

    @if($dokumens->count() > 0)
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($dokumens as $dokumen)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900 line-clamp-2">{{ $dokumen->judul }}</div>
                        <div class="text-sm text-gray-500 mt-1 line-clamp-2">{{ Str::limit($dokumen->ringkasan, 100) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
                            {{ $dokumen->jenis->nama_jenis }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                            {{ $dokumen->kategori->nama }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $dokumen->nomor }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $dokumen->tanggal->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($dokumen->status == 'active')
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Aktif</span>
                        @else
                            <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">Nonaktif</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('document.detail', $dokumen->dokumen_id) }}" 
                           target="_blank"
                           class="text-green-600 hover:text-green-900 mr-3"
                           title="Lihat di Website">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.dokumen.edit', $dokumen->dokumen_id) }}" 
                           class="text-blue-600 hover:text-blue-900 mr-3"
                           title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.dokumen.destroy', $dokumen->dokumen_id) }}" 
                              method="POST" class="inline" data-confirm="true">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="text-center py-12">
        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-file-alt text-gray-400 text-2xl"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Belum ada dokumen</h3>
        <p class="text-gray-600 mb-6">Mulai dengan menambahkan dokumen hukum pertama Anda.</p>
        <a href="{{ route('admin.dokumen.create') }}" 
           class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-semibold">
            <i class="fas fa-plus mr-2"></i>Tambah Dokumen Pertama
        </a>
    </div>
    @endif
</div>
@endsection