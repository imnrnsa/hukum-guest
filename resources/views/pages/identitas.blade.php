@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Identitas Pengembang Web</h4>
        </div>

        <div class="card-body">

            <table class="table table-bordered">
                <tr>
                    <th width="30%">Nama Pengembang</th>
                    <td>Nur Annisa</td>
                </tr>
                <tr>
                    <th>Peran</th>
                    <td>Full Stack Web Developer</td>
                </tr>
                <tr>
                    <th>Teknologi</th>
                    <td>
                        Laravel, PHP, MySQL, Bootstrap, JavaScript
                    </td>
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

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between mt-3">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">
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
