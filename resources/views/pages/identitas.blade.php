@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Profil Pengembang</h4>
        </div>

        <div class="card-body">
            <div class="row align-items-center">

                {{-- Foto Pengembang --}}
                <div class="col-md-4 text-center mb-4">
                    <img 
                        src="{{ asset('storage/profile/annisa.jpg') }}" 
                        class="rounded-circle shadow-sm mb-3"
                        width="180"
                        height="180"
                        style="object-fit: cover;"
                        alt="Foto Pengembang"
                    >

                    <h5 class="fw-bold mb-0">Nur Annisa</h5>
                    <small class="text-muted">Full Stack Web Developer</small>
                </div>

                {{-- Identitas --}}
                <div class="col-md-8">
                    <table class="table table-borderless align-middle">
                        <tr>
                            <th width="35%">Teknologi</th>
                            <td>Laravel, PHP, MySQL, Bootstrap, JavaScript</td>
                        </tr>
                        <tr>
                            <th>Proyek</th>
                            <td>Sistem Informasi Produk Hukum Desa</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>nurannisa@email.com</td>
                        </tr>
                        <tr>
                            <th>Tahun Pengembangan</th>
                            <td>2025</td>
                        </tr>
                    </table>
                </div>

            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                    ← Kembali
                </a>

                <a href="{{ url('/') }}" class="btn btn-primary">
                    Beranda
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
