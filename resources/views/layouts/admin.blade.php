<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - LegalHub')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Admin Layout dengan Sidebar -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-blue-800 text-white w-64 flex-shrink-0">
            <div class="p-4">
                <h1 class="text-2xl font-bold">LegalHub Admin</h1>
                <p class="text-blue-200 text-sm">Panel Administrasi</p>
            </div>
            
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" 
                   class="block py-3 px-4 text-blue-100 hover:bg-blue-700 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700' : '' }}">
                    <i class="fas fa-tachometer-alt mr-3"></i>Dashboard
                </a>
                
                <a href="{{ route('admin.kategori.index') }}" 
                   class="block py-3 px-4 text-blue-100 hover:bg-blue-700 {{ request()->routeIs('admin.kategori.*') ? 'bg-blue-700' : '' }}">
                    <i class="fas fa-folder mr-3"></i>Kategori Dokumen
                </a>
                
                <a href="{{ route('admin.dokumen.index') }}" 
                   class="block py-3 px-4 text-blue-100 hover:bg-blue-700 {{ request()->routeIs('admin.dokumen.*') ? 'bg-blue-700' : '' }}">
                    <i class="fas fa-file-alt mr-3"></i>Dokumen Hukum
                </a>
                
                <a href="{{ route('dashboard') }}" 
                   class="block py-3 px-4 text-blue-100 hover:bg-blue-700 mt-8 border-t border-blue-700 pt-4">
                    <i class="fas fa-arrow-left mr-3"></i>Kembali ke User Dashboard
                </a>
                
                <form method="POST" action="{{ route('logout') }}" class="mt-4 px-4">
                    @csrf
                    <button type="submit" class="w-full text-left block py-3 px-4 text-blue-100 hover:bg-red-700 bg-red-600 rounded">
                        <i class="fas fa-sign-out-alt mr-3"></i>Logout
                    </button>
                </form>
            </nav>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-sm border-b">
                <div class="flex justify-between items-center py-4 px-6">
                    <h2 class="text-xl font-semibold text-gray-800">
                        @yield('page-title', 'Dashboard Admin')
                    </h2>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-600">Halo, {{ Auth::user()->name }}</span>
                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
                <!-- Notifications -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                    </div>
                @endif

                <!-- Page Content -->
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Konfirmasi delete
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForms = document.querySelectorAll('form[data-confirm]');
            
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>
</html>