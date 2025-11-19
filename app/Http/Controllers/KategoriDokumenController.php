<?php

namespace App\Http\Controllers;

use App\Models\KategoriDokumen;
use Illuminate\Http\Request;

class KategoriDokumenController extends Controller
{
    public function index()
    {
        $data = KategoriDokumen::all();
        return view('pages.kategori.index', compact('data'));
    }

    public function create()
    {
        return view('pages.kategori.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'nama_kategori' => 'required',
        'deskripsi' => 'nullable'
    ]);

    KategoriDokumen::create([
        'nama_kategori' => $request->nama_kategori,
        'deskripsi' => $request->deskripsi
    ]);

    return redirect()->route('kategori-dokumen.index')
                     ->with('success', 'Kategori berhasil ditambahkan.');
}
public function edit($kategori_id)
{
    $data = KategoriDokumen::findOrFail($kategori_id);
    return view('pages.kategori.edit', compact('data'));
}

public function update(Request $request, $kategori_id)
{
    $data = KategoriDokumen::findOrFail($kategori_id);

    $request->validate([
        'nama_kategori' => 'required',
        'deskripsi' => 'nullable'
    ]);

    $data->update([
        'nama_kategori' => $request->nama_kategori,
        'deskripsi' => $request->deskripsi
    ]);

    return redirect()->route('kategori-dokumen.index')
                     ->with('success', 'Kategori berhasil diupdate.');
}


    public function destroy($kategori_id)
    {
        KategoriDokumen::findOrFail($kategori_id)->delete();

        return redirect()->route('kategori-dokumen.index')
                         ->with('success', 'Kategori berhasil dihapus.');
    }
}
