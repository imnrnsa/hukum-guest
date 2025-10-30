<!DOCTYPE html>
<html>
<head>
    <title>Kategori Dokumen</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f9f9f9; margin: 20px; }
        h1 { color: #333; }
        a.button { padding: 8px 12px; background: #4CAF50; color: #fff; text-decoration: none; border-radius: 5px; }
        table { width: 100%; border-collapse: collapse; background: white; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 10px; }
        th { background: #4CAF50; color: white; }
        tr:nth-child(even) { background: #f2f2f2; }
    </style>
</head>
<body>
    <h1>📑 Daftar Kategori Dokumen</h1>
    <a href="{{ route('kategori.index') }}" class="button">+ Tambah Kategori</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
        @foreach($kategori as $k)
        <tr>
            <td>{{ $k['id'] }}</td>
            <td>{{ $k['nama'] }}</td>
            <td><a href="{{ route('kategori.edit', $k['id']) }}">✏️ Edit</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>