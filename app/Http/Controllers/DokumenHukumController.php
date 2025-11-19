<?php

namespace App\Http\Controllers;

use App\Models\DokumenHukum;
use App\Models\JenisDokumen;
use App\Models\KategoriDokumen;
use Illuminate\Http\Request;

class DokumenHukumController extends Controller
{
    public function index()
    {
        $data = DokumenHukum::with('jenis', 'kategori')->get();
        return view('pages.dokumen.index', compact('data'));
    }

    public function create()
    {
        return view('pages.dokumen.create', [
            'jenis' => JenisDokumen::all(),
            'kategori' => KategoriDokumen::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_id' => 'required',
            'kategori_id' => 'required',
            'nomor' => 'required|unique:dokumen_hukum,nomor',
            'judul' => 'required',
            'tanggal' => 'required|date',
            'ringkasan' => 'nullable',
            'status' => 'required'
        ]);

        DokumenHukum::create($request->all());
        return redirect()->route('dokumen-hukum.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return view('pages.dokumen.edit', [
            'data' => DokumenHukum::findOrFail($id),
            'jenis' => JenisDokumen::all(),
            'kategori' => KategoriDokumen::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_id' => 'required',
            'kategori_id' => 'required',
            'nomor' => 'required|unique:dokumen_hukum,nomor,' . $id . ',dokumen_id',
            'judul' => 'required',
            'tanggal' => 'required|date',
            'ringkasan' => 'nullable',
            'status' => 'required'
        ]);

        $data = DokumenHukum::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('dokumen-hukum.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function show($id)
    {
        $data = DokumenHukum::with('jenis', 'kategori')->findOrFail($id);
        return view('pages.dokumen.show', compact('data'));
    }

    public function destroy($id)
    {
        $data = DokumenHukum::findOrFail($id);
        $data->delete();

        return redirect()->route('dokumen-hukum.index')->with('success', 'Data berhasil dihapus.');
    }
}
