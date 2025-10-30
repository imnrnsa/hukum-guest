<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Guest')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        body {
            background-color: #f4f6f8;
            color: #2c3e50;
            font-family: "Poppins", sans-serif;
        }
        .about-section {
            padding: 70px 0;
        }
        .icon {
            font-size: 48px;
            color: #0056b3;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        .footer {
            margin-top: 60px;
            text-align: center;
            padding: 20px;
            background: #0056b3;
            color: white;
            font-size: 15px;
        }
        h1, h3 {
            font-weight: 600;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li::before {
            content: "\f14a";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            margin-right: 8px;
            color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container about-section">
    <div class="text-center mb-5">
        <h1><i class="fa-solid fa-scale-balanced icon"></i></h1>
        <h2 class="fw-bold">Tentang Sistem Produk Hukum & Dokumen Publik</h2>
        <p class="lead">Platform digital untuk mengelola, mencari, dan mengakses berbagai produk hukum serta dokumen publik secara transparan dan mudah.</p>
    </div>

    <div class="row align-items-center">
        <div class="col-md-6">
            <h3><i class="fa-solid fa-bullseye"></i> Tujuan</h3>
            <p>Sistem ini bertujuan untuk meningkatkan keterbukaan informasi publik dan mempermudah masyarakat dalam mengakses produk hukum seperti peraturan daerah, keputusan, surat edaran, dan dokumen resmi lainnya.</p>

            <h3><i class="fa-solid fa-route"></i> Alur Penggunaan</h3>
            <ul>
                <li>Pengguna membuka halaman utama sistem.</li>
                <li>Menelusuri atau mencari produk hukum melalui fitur pencarian.</li>
                <li>Melihat detail isi dokumen atau peraturan.</li>
                <li>Mengunduh dokumen publik yang dibutuhkan.</li>
                <li>Bisa memberikan masukan atau saran untuk pembaruan data hukum.</li>
            </ul>
        </div>

        <div class="col-md-6 text-center">
            <img src="<?= base_url('assets/images/law_document.jpg'); ?>"
                 class="img-fluid rounded shadow"
                 alt="Gambar Produk Hukum dan Dokumen Publik">
            <p class="mt-3 text-muted">Ilustrasi produk hukum dan keterbukaan dokumen publik</p>
        </div>
    </div>
</div>

<div class="footer">
    <p><i class="fa-solid fa-circle-info"></i> Sistem Produk Hukum & Dokumen Publik © 2025 — Menuju Transparansi dan Akses Informasi yang Terbuka</p>
</div>

</body>
</html>
