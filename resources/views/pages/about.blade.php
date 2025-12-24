@extends('layouts.app') {{-- sesuaikan dengan layout kamu --}}

@section('title', 'Tentang | Hukum Desa')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="mb-3">Tentang Website Hukum Desa</h3>

            <p>
                Website <strong>Hukum Desa</strong> merupakan platform informasi yang
                menyediakan kumpulan produk hukum dan dokumen publik desa secara
                terpusat, transparan, dan mudah diakses oleh masyarakat.
            </p>

            <p>
                Website ini bertujuan untuk meningkatkan keterbukaan informasi publik
                serta memudahkan pemerintah desa dan masyarakat dalam mengakses
                peraturan desa, keputusan kepala desa, dan dokumen hukum lainnya.
            </p>

            <h5 class="mt-4">Fitur Utama</h5>
            <ul>
                <li>Publikasi produk hukum desa</li>
                <li>Akses dokumen publik secara online</li>
                <li>Pencarian dokumen yang mudah</li>
                <li>Informasi yang transparan dan terstruktur</li>
            </ul>

            <p class="mt-3 text-muted">
                Dengan adanya website ini, diharapkan tata kelola pemerintahan desa
                menjadi lebih terbuka, akuntabel, dan informatif.
            </p>
        </div>
    </div>
</div>
@endsection
