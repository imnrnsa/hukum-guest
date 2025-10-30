<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategories = KategoriDokumen::orderBy('created_at', 'desc')->get();
        return view('admin.kategori.index', compact('kategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:100|unique:kategori_dokumen,nama',
            'deskripsi' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        KategoriDokumen::create($request->all());

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori dokumen berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kategori = KategoriDokumen::findOrFail($id);
        return view('admin.kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = KategoriDokumen::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kategori = KategoriDokumen::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:100|unique:kategori_dokumen,nama,' . $id . ',kategori_id',
            'deskripsi' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $kategori->update($request->all());

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori dokumen berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = KategoriDokumen::findOrFail($id);
        
        // Cek apakah kategori memiliki dokumen
        if ($kategori->dokumen()->count() > 0) {
            return redirect()->back()
                ->with('error', 'Tidak dapat menghapus kategori karena masih memiliki dokumen terkait!');
        }

        $kategori->delete();

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori dokumen berhasil dihapus!');
    }
}