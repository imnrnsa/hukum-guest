<?php

namespace App\Http\Controllers;

use App\Models\KategoriDokumen;
use Illuminate\Http\Request;

class KategoriDokumenController extends Controller
{
    public function index(Request $request)
{
    // search berdasarkan nama & deskripsi
    $search = $request->search;

    // filter huruf A-Z (nama_kategori diawali huruf tertentu)
    $filter = $request->filter;

    $data = KategoriDokumen::when($search, function ($q) use ($search) {
            $q->where('nama_kategori', 'LIKE', "%$search%")
              ->orWhere('deskripsi', 'LIKE', "%$search%");
        })
        ->when($filter, function ($q) use ($filter) {
            $q->where('nama_kategori', 'LIKE', $filter.'%');
        })
        ->orderBy('nama_kategori', 'ASC')
        ->paginate(10)
        ->appends([
            'search' => $search,
            'filter' => $filter
        ]);

    return view('pages.kategori.index', compact('data','search','filter'));
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
