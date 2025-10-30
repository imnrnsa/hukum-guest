<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Produk Hukum & Dokumen Publik - Platform Hukum Terpercaya')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">Produk Hukum & Dokumen Publik</a>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 {{ request()->routeIs('home') ? 'text-blue-600 font-semibold' : '' }}">Beranda</a>
                    <a href="{{ route('search') }}" class="text-gray-700 hover:text-blue-600 {{ request()->routeIs('search') ? 'text-blue-600 font-semibold' : '' }}">Cari Dokumen</a>
                    
                    @if(isset($popularCategories) && $popularCategories->count() > 0)
                    <div class="relative group">
                        <button class="text-gray-700 hover:text-blue-600 flex items-center">
                            Kategori <i class="ml-1 fas fa-chevron-down text-xs"></i>
                        </button>
                        <div class="absolute hidden group-hover:block bg-white shadow-lg rounded-lg mt-2 w-48 z-10">
                            @foreach($popularCategories as $category)
                            <a href="{{ route('category.documents', $category->kategori_id) }}" 
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">
                                {{ $category->nama }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600">Tentang</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600">Kontak</a>
                </div>

                <div class="flex items-center space-x-4">

    @auth
        <!-- Langsung tampilkan Dashboard tanpa cek verifikasi -->
        <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 font-semibold">
            <i class="fas fa-tachometer-alt mr-1"></i>Dashboard
        </a>
        
        <!-- Logout form -->
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 text-sm font-semibold transition duration-200">
                <i class="fas fa-sign-out-alt mr-1"></i>Logout
            </button>
        </form>
        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-semibold">
            <i class="fas fa-sign-in-alt mr-1"></i>Login
        </a>
        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm font-semibold">
            <i class="fas fa-user-plus mr-1"></i>Daftar
        </a>
    @endauth
</div>
                        
                        <!-- Logout form -->
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 text-sm font-semibold transition duration-200">
                                <i class="fas fa-sign-out-alt mr-1"></i>Logout
                            </button>
                        </form>
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-semibold">
                            <i class="fas fa-sign-in-alt mr-1"></i>Login
                        </a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm font-semibold">
                            <i class="fas fa-user-plus mr-1"></i>Daftar
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">LegalHub</h3>
                    <p class="text-gray-300 text-sm">Platform hukum terpercaya untuk menemukan dokumen hukum dan konsultasi dengan ahli.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Tautan Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white text-sm">Beranda</a></li>
                        <li><a href="{{ route('search') }}" class="text-gray-300 hover:text-white text-sm">Cari Dokumen</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white text-sm">Tentang Kami</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-white text-sm">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Kategori</h4>
                    <ul class="space-y-2">
                       
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-gray-300 text-sm">
                        <li><i class="fas fa-envelope mr-2"></i> info@legalhub.com</li>
                        <li><i class="fas fa-phone mr-2"></i> (021) 1234-5678</li>
                        <li><i class="fas fa-map-marker-alt mr-2"></i> Jakarta, Indonesia</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-300 text-sm">
                <p>&copy; 2024 LegalHub. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Simple JavaScript for mobile menu (bisa ditambah nanti)
        document.addEventListener('DOMContentLoaded', function() {
            console.log('LegalHub loaded successfully');
            
            // Konfirmasi logout
            const logoutForms = document.querySelectorAll('form[action="{{ route("logout") }}"]');
            
            logoutForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    if (!confirm('Apakah Anda yakin ingin logout?')) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>
</html>