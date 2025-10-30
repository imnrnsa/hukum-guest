@extends('layouts.guest')

@section('title', 'Dashboard - Produk Hukum & Dokumen Publik')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Welcome Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Selamat Datang, {{ Auth::user()->name }}! 👋</h1>
                <p class="text-gray-600 mt-2">Akses penuh ke semua fitur Produk Hukum & Dokumen Publik</p>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-500">Terakhir login</p>
                <p class="text-gray-700 font-semibold">{{ now()->format('d M Y H:i') }}</p>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-blue-50 rounded-lg p-6 border border-blue-200">
            <div class="flex items-center">
                <div class="bg-blue-100 p-3 rounded-full mr-4">
                    <i class="fas fa-file-alt text-blue-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-blue-800">150+</h3>
                    <p class="text-blue-600">Dokumen Hukum</p>
                </div>
            </div>
        </div>

        <div class="bg-green-50 rounded-lg p-6 border border-green-200">
            <div class="flex items-center">
                <div class="bg-green-100 p-3 rounded-full mr-4">
                    <i class="fas fa-search text-green-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-green-800">8</h3>
                    <p class="text-green-600">Kategori</p>
                </div>
            </div>
        </div>

        <div class="bg-purple-50 rounded-lg p-6 border border-purple-200">
            <div class="flex items-center">
                <div class="bg-purple-100 p-3 rounded-full mr-4">
                    <i class="fas fa-clock text-purple-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-purple-800">24/7</h3>
                    <p class="text-purple-600">Akses</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
     <!-- Tambahkan di bagian Quick Actions -->
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Administrasi</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition duration-200">
            <i class="fas fa-cog text-purple-600 text-xl mr-3"></i>
            <div>
                <h4 class="font-semibold">Panel Admin</h4>
                <p class="text-sm text-gray-600">Kelola kategori dan dokumen</p>
            </div>
        </a>
    </div>
</div>  
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Left Column -->
        <div class="space-y-6">
            <!-- Profile Card -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Profil Saya</h2>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Nama:</span>
                        <span class="font-semibold">{{ Auth::user()->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Email:</span>
                        <span class="font-semibold">{{ Auth::user()->email }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Bergabung:</span>
                        <span class="font-semibold">{{ Auth::user()->created_at->format('d M Y') }}</span>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('profile') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm font-semibold">
                        <i class="fas fa-user-edit mr-2"></i>Edit Profil
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Akses Cepat</h2>
                <div class="space-y-3">
                    <a href="{{ route('search') }}" class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-blue-50 transition duration-200">
                        <i class="fas fa-search text-blue-600 mr-3"></i>
                        <span>Cari Dokumen Hukum</span>
                    </a>
                    <a href="{{ route('home') }}" class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-green-50 transition duration-200">
                        <i class="fas fa-home text-green-600 mr-3"></i>
                        <span>Kembali ke Beranda</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-6">
            <!-- Recent Activity -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Aktivitas Terbaru</h2>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="bg-green-100 p-2 rounded-full mr-3 mt-1">
                            <i class="fas fa-sign-in-alt text-green-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="font-semibold">Login berhasil</p>
                            <p class="text-gray-600 text-sm">Anda berhasil masuk ke sistem</p>
                            <p class="text-gray-500 text-xs">{{ now()->format('H:i') }}</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-2 rounded-full mr-3 mt-1">
                            <i class="fas fa-user-plus text-blue-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="font-semibold">Akun dibuat</p>
                            <p class="text-gray-600 text-sm">Akun Produk Hukum & Dokumen Publik Anda telah aktif</p>
                            <p class="text-gray-500 text-xs">{{ Auth::user()->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

{{-- Tambahkan di bagian manapun sebelum penutup content --}}
<div class="bg-white rounded-lg shadow-md p-6 mt-6">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-bold text-gray-800">Administrasi Website</h2>
        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Admin</span>
    </div>
    <p class="text-gray-600 mb-4">Kelola konten dan data website Produk Hukum & Dokumen Publik</p>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center p-4 bg-gradient-to-r from-purple-500 to-blue-600 rounded-lg hover:from-purple-600 hover:to-blue-700 transition duration-200 text-white shadow-md">
            <i class="fas fa-cog text-2xl mr-4"></i>
            <div>
                <h4 class="font-semibold text-lg">Panel Administrator</h4>
                <p class="text-purple-100 text-sm">Kelola kategori, dokumen, dan konten</p>
            </div>
            <i class="fas fa-arrow-right ml-auto text-purple-200"></i>
        </a>
    </div>
</div>

<!-- Tambahkan di bagian manapun -->
<div class="bg-white rounded-lg shadow-md p-6 mt-6">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Administrasi Website</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 border border-purple-200 transition duration-200">
            <i class="fas fa-cog text-purple-600 text-2xl mr-4"></i>
            <div>
                <h4 class="font-semibold text-lg">Panel Administrator</h4>
            <!-- Logout Section -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Keluar</h2>
                <p class="text-gray-600 mb-4">Keluar dari akun Anda</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition duration-200 font-semibold">
                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection