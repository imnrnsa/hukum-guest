@extends('layouts.app')

@section('title', 'Login - LegalHub')

@section('content')
<style>
    body {
        background: #f4f6f9;
        font-family: 'Inter', sans-serif;
    }

    .login-card {
        background: #ffffff;
        padding: 2.2rem;
        border-radius: 14px;
        max-width: 410px;
        width: 100%;
        margin: 60px auto;
        position: relative;
        box-shadow: 0 8px 20px rgba(0,0,0,0.10);
        border-top: 6px solid #1e3a8a; /* Navy hukum */
    }

    /* Ornamen hukum */
    .law-icon {
        font-size: 48px;
        color: #1e3a8a;
        margin-bottom: 10px;
    }

    .login-title {
        font-size: 28px;
        font-weight: 800;
        color: #1e3a8a;
    }

    .subtitle {
        color: #6b7280;
        font-size: 14px;
        margin-top: -5px;
    }

    /* Input */
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

    /* Button */
    .btn-submit {
        margin-top: 15px;
        width: 100%;
        background: linear-gradient(90deg, #1e3a8a, #3b82f6);
        padding: 11px;
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.25s;
        letter-spacing: 0.3px;
    }

    .btn-submit:hover {
        background: linear-gradient(90deg, #162c6a, #2563eb);
    }

    /* Footer links */
    .footer-link a {
        color: #1e3a8a;
        text-decoration: none;
        font-weight: 500;
    }

    .footer-link a:hover {
        text-decoration: underline;
    }

    /* Dekorasi garis hukum */
    .law-divider {
        width: 70px;
        height: 3px;
        background: #1e3a8a;
        margin: 10px auto 20px auto;
        border-radius: 10px;
    }
</style>

<div class="login-card">

    <div class="text-center mb-4">
        <div class="law-icon">⚖️</div>
        <h1 class="login-title">Hukum Publik</h1>
        <div class="law-divider"></div>
        <p class="subtitle">Pusat Layanan Dokumen Hukum Desa</p>
    </div>

    {{-- Alert Error --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 border border-red-300 rounded p-3 mb-3 text-sm">
            <ul class="list-disc ml-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Alert Status --}}
    @if (session('status'))
        <div class="bg-green-100 text-green-700 border border-green-300 rounded p-3 mb-3 text-sm">
            {{ session('status') }}
        </div>
    @endif

    {{-- FORM LOGIN --}}
    <form method="POST" action="{{ route('login.submit') }}">
        @csrf

        <label class="text-gray-700 text-sm font-medium mb-1">Email</label>
        <input type="email" name="email" class="input-box"
               value="{{ old('email') }}" required placeholder="Masukkan email Anda">

        <div class="mt-3">
            <label class="text-gray-700 text-sm font-medium mb-1">Password</label>
            <input type="password" name="password" class="input-box"
                   required placeholder="Masukkan password Anda">
        </div>

        <div class="mt-3 flex items-center justify-between text-sm">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="remember">
                Ingat saya
            </label>
            <a href="#" class="text-blue-900 hover:underline">Lupa password?</a>
        </div>

        <button type="submit" class="btn-submit">Masuk</button>
    </form>

    <div class="mt-4 text-center text-sm footer-link">
        Belum punya akun?
        <a href="{{ route('register') }}">Daftar di sini</a>
    </div>

    <div class="mt-5 text-center text-sm text-gray-500 footer-link">
        <a href="{{ url('/') }}">← Kembali ke Beranda</a>
    </div>

</div>

@endsection
@include('layouts.scripts')
