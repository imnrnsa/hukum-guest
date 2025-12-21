<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LegalHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<style>
    .law-card {
        background: #ffffff;
        padding: 2.2rem;
        border-radius: 14px;
        width: 100%;
        max-width: 430px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.10);
        border-top: 6px solid #1e3a8a;
    }

    .law-icon {
        font-size: 50px;
        color: #1e3a8a;
        margin-bottom: 6px;
    }

    .law-title {
        font-size: 28px;
        font-weight: 800;
        color: #1e3a8a;
    }

    .law-divider {
        width: 70px;
        height: 3px;
        background: #1e3a8a;
        margin: 10px auto 18px auto;
        border-radius: 10px;
    }

    .input-box {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #cbd5e1;
        border-radius: 10px;
        transition: 0.25s;
        background: #f8fafc;
    }

    .input-box:focus {
        border-color: #1e3a8a;
        box-shadow: 0 0 0 2px rgba(30,58,138,0.15);
        background: #ffffff;
    }

    .btn-register {
        width: 100%;
        background: linear-gradient(90deg, #1e3a8a, #3b82f6);
        padding: 11px;
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
        letter-spacing: 0.3px;
    }

    .btn-register:hover {
        background: linear-gradient(90deg, #162c6a, #2563eb);
    }
</style>

<div class="law-card">

    <div class="text-center mb-6">
        <div class="law-icon">⚖️</div>
        <h1 class="law-title">Hukum Publik</h1>
        <div class="law-divider"></div>
        <p class="text-gray-600 text-sm">Registrasi akun layanan dokumen hukum</p>
    </div>

    {{-- ERROR --}}
    @if ($errors->any())
        <div class="bg-red-100 p-3 rounded mb-4 text-red-700 text-sm">
            @foreach ($errors->all() as $e)
                <p>{{ $e }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('register.submit') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label class="text-sm font-semibold">Nama Lengkap</label>
            <input type="text" name="name" required
                   class="input-box"
                   placeholder="Masukkan nama lengkap Anda">
        </div>

        <div class="mb-4">
            <label class="text-sm font-semibold">Email</label>
            <input type="email" name="email" required
                   class="input-box"
                   placeholder="Masukkan email Anda">
        </div>

        <div class="mb-4">
            <label class="text-sm font-semibold">Password</label>
            <input type="password" name="password" required
                   class="input-box"
                   placeholder="Masukkan password">
        </div>

        <button class="btn-register">
            Daftar
        </button>
    </form>

    <p class="text-center text-sm mt-5 text-gray-600">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-blue-900 font-semibold hover:underline">
            Login di sini
        </a>
    </p>
</div>

</body>
</html>
