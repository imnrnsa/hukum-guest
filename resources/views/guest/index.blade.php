@extends('guest.layout')

@section('title', 'Sistem Informasi Hukum')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Sistem Informasi Hukum Terlengkap</h1>
                <p class="lead mb-4">Akses berbagai peraturan perundang-undangan secara digital. Cepat, mudah, dan terupdate.</p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('guest.laws') }}" class="btn btn-light btn-lg">
                        <i class="bi bi-search me-2"></i>Cari Peraturan
                    </a>
                    <a href="{{ route('guest.categories') }}" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-grid me-2"></i>Lihat Kategori
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <i class="bi bi-balance-scale display-1 opacity-50"></i>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="container mb-5">
    <div class="row g-4">
        <div class="col-md-3">
            <div class="stat-card text-center p-4">
                <i class="bi bi-file-text display-4 text-primary mb-3"></i>
                <h3 class="fw-bold">{{ number_format($stats['total_laws']) }}</h3>
                <p class="text-muted mb-0">Total Peraturan</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card text-center p-4">
                <i class="bi bi-folder display-4 text-success mb-3"></i>
                <h3 class="fw-bold">{{ $stats['total_categories'] }}</h3>
                <p class="text-muted mb-0">Kategori Hukum</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card text-center p-4">
                <i class="bi bi-download display-4 text-warning mb-3"></i>
                <h3 class="fw-bold">{{ number_format($stats['total_downloads']) }}</h3>
                <p class="text-muted mb-0">Total Download</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card text-center p-4">
                <i class="bi bi-calendar-plus display-4 text-info mb-3"></i>
                <h3 class="fw-bold">{{ $stats['new_laws_this_month'] }}</h3>
                <p class="text-muted mb-0">Peraturan Baru</p>
            </div>
        </div>
    </div>
</section>

<!-- Popular Categories -->
<section class="container mb-5">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="text-center mb-3">Kategori Hukum Populer</h2>
            <p class="text-center text-muted">Jelajahi berbagai kategori hukum yang tersedia</p>
        </div>
    </div>
    <div class="row g-4">
        @foreach($popularCategories as $category)
        <div class="col-md-4 col-lg-2">
            <div class="card law-card text-center p-3">
                <div class="category-icon bg-{{ ['primary','success','warning','info','danger','dark'][$loop->index % 6] }} text-white">
                    <i class="bi bi-{{ $category['icon'] }}"></i>
                </div>
                <h6 class="fw-bold">{{ $category['name'] }}</h6>
                <small class="text-muted">{{ $category['count'] }} peraturan</small>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Recent Laws -->
<section class="container mb-5">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="mb-3">Peraturan Terbaru</h2>
            <p class="text-muted">Update terbaru peraturan perundang-undangan</p>
        </div>
    </div>
    <div class="row g-4">
        @foreach($recentLaws as $law)
        <div class="col-md-6 col-lg-4">
            <div class="card law-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="badge bg-primary">{{ $law['category'] }}</span>
                        <small class="text-muted">{{ $law['year'] }}</small>
                    </div>
                    <h6 class="card-title fw-bold">{{ $law['title'] }}</h6>
                    <p class="card-text text-muted small">{{ Str::limit($law['description'], 100) }}</p>
                </div>
                <div class="card-footer bg-transparent">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="bi bi-download me-1"></i>{{ $law['downloads'] }}
                        </small>
                        <a href="#" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('guest.laws') }}" class="btn btn-primary">Lihat Semua Peraturan</a>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-light py-5">
    <div class="container text-center">
        <h3 class="mb-3">Butuh Bantuan Hukum?</h3>
        <p class="text-muted mb-4">Konsultasikan masalah hukum Anda dengan tim ahli kami</p>
        <a href="{{ route('guest.contact') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-chat-dots me-2"></i>Hubungi Kami
        </a>
    </div>
</section>
@endsection