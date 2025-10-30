<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sistem Informasi Hukum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #34495e;
            --accent: #e74c3c;
            --light: #ecf0f1;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 100px 0;
            margin-bottom: 50px;
        }
        
        .stat-card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease;
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .law-card {
            border: none;
            border-radius: 10px;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .law-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        
        .category-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 1rem;
        }
        
        .footer {
            background: var(--primary);
            color: white;
            padding: 50px 0 20px;
            margin-top: 50px;
        }
        
        .search-box {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('guest.index') }}">
                <i class="bi bi-balance-scale me-2"></i>Sistem Hukum
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('guest.index') ? 'active' : '' }}" 
                           href="{{ route('guest.index') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('guest.laws') ? 'active' : '' }}" 
                           href="{{ route('guest.laws') }}">Peraturan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('guest.categories') ? 'active' : '' }}" 
                           href="{{ route('guest.categories') }}">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('guest.about') ? 'active' : '' }}" 
                           href="{{ route('guest.about') }}">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('guest.contact') ? 'active' : '' }}" 
                           href="{{ route('guest.contact') }}">Kontak</a>
                    </li>
                </ul>
                
                <div class="d-flex">
                    <form action="{{ route('guest.search') }}" method="GET" class="d-flex me-2">
                        <input type="text" name="q" class="form-control me-2" placeholder="Cari peraturan..." 
                               value="{{ request('q') }}">
                        <button type="submit" class="btn btn-outline-light">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                    
                    @auth
                        <a href="{{ route('dashboard.index') }}" class="btn btn-light me-2">
                            <i class="bi bi-speedometer2 me-1"></i>Dashboard
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-light">Register</a>
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
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>Sistem Informasi Hukum</h5>
                    <p>Platform digital untuk mengakses berbagai peraturan perundang-undangan secara lengkap dan terupdate.</p>
                </div>
                <div class="col-md-2 mb-4">
                    <h6>Menu</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('guest.index') }}" class="text-light text-decoration-none">Beranda</a></li>
                        <li><a href="{{ route('guest.laws') }}" class="text-light text-decoration-none">Peraturan</a></li>
                        <li><a href="{{ route('guest.categories') }}" class="text-light text-decoration-none">Kategori</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6>Kontak</h6>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-geo-alt me-2"></i>Jl. Hukum No. 123, Jakarta</li>
                        <li><i class="bi bi-telephone me-2"></i>(021) 1234-5678</li>
                        <li><i class="bi bi-envelope me-2"></i>info@sistemhukum.go.id</li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6>Legal</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Disclaimer</a></li>
                    </ul>
                </div>
            </div>
            <hr class="bg-light">
            <div class="text-center">
                <small>&copy; 2024 Sistem Informasi Hukum. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>