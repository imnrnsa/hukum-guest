<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LegalHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-blue-600">LegalHub</h1>
            <p class="text-gray-600 mt-2">Buat akun baru</p>
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
                       class="w-full px-3 py-2 border rounded focus:ring-2 focus:ring-blue-500"
                       placeholder="Masukkan nama">
            </div>

            <div class="mb-4">
                <label class="text-sm font-semibold">Email</label>
                <input type="email" name="email" required
                       class="w-full px-3 py-2 border rounded focus:ring-2 focus:ring-blue-500"
                       placeholder="Masukkan email">
            </div>

            <div class="mb-4">
                <label class="text-sm font-semibold">Password</label>
                <input type="password" name="password" required
                       class="w-full px-3 py-2 border rounded focus:ring-2 focus:ring-blue-500"
                       placeholder="Masukkan password">
            </div>

            <button class="bg-green-600 hover:bg-green-700 w-full text-white py-2 rounded shadow">
                Daftar
            </button>
        </form>

        <p class="text-center text-sm mt-5 text-gray-600">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-blue-600 font-semibold">Login di sini</a>
        </p>
    </div>

</body>
</html>
