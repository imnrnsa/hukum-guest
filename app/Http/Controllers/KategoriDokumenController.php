<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriDokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $kategori = [
           ['id' => 1, 'nama' => 'Peraturan'],
             ['id' => 2, 'nama' => 'Surat Keputusan'],
             ['id' => 3, 'nama' => 'Dokumen Lainnya']
         ];

         return view('index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi sederhana
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        // sementara tampilkan hasil input
        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori baru berhasil ditambahkan: ' . $validated['nama']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Detail kategori dengan ID: " . $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Form edit kategori dengan ID: " . $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori dengan ID ' . $id . ' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori dengan ID ' . $id . ' berhasil dihapus');
    }
}

