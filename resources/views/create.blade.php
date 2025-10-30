<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori Dokumen</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f9f9f9; margin: 20px; }
        form { background: white; padding: 20px; border-radius: 8px; width: 350px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; }
        button { margin-top: 15px; padding: 10px; background: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%; }
    </style>
</head>
<body>
    <h1>➕ Tambah Kategori (Guest)</h1>
    <form>
        <label>Nama</label>
        <input type="text" name="nama">

        <label>Deskripsi</label>
        <textarea name="deskripsi"></textarea>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>