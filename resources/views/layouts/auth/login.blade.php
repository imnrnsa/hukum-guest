@extends('layouts.app')

@section('title', 'Login')

@section('content')
<style>
    body {
        background: #f3f4f6;
        font-family: 'Inter', sans-serif;
    }

    .login-card {
        background: #ffffff;
        padding: 2rem;
        border-radius: 12px;
        max-width: 380px;
        width: 100%;
        box-shadow: 0 6px 15px rgba(0,0,0,0.08);
        margin: 50px auto;
    }

    .login-title {
        font-size: 26px;
        font-weight: 700;
        color: #2563eb;
        margin-bottom: 4px;
    }

    .subtitle {
        color: #6b7280;
        font-size: 14px;
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        outline: none;
        transition: 0.2s;
    }

    input:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37,99,235,0.15);
    }

    .btn-submit {
        margin-top: 10px;
        width: 100%;
        background: #2563eb;
        padding: 11px;
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-submit:hover {
        background: #1e4fcf;
    }

    .footer-link a {
        color: #2563eb;
        text-decoration: none;
    }

    .footer-link a:hover {
        text-decoration: underline;
    }
</style>

<div class="login-card">
    <div class="text-center mb-4">
        <h1 class="login-title">LegalHub</h1>
        <p class="subtitle">Masuk ke akun Anda</p>
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
        <input type="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan email Anda">

        <div class="mt-3">
            <label class="text-gray-700 text-sm font-medium mb-1">Password</label>
            <input type="password" name="password" required placeholder="Masukkan password Anda">
        </div>

        <div class="mt-3 flex items-center justify-between text-sm">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="remember">
                Ingat saya
            </label>
            <a href="#" class="text-blue-600 hover:underline">Lupa password?</a>
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