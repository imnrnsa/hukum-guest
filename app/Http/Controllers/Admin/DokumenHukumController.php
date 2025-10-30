<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DokumenHukum;
use App\Models\JenisDokumen;
use App\Models\KategoriDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DokumenHukumController extends Controller
{
    public function index()
    {
        $dokumens = DokumenHukum::with(['jenis', 'kategori'])
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('admin.dokumen.index', compact('dokumens'));
    }

    public function create()
    {
        $jenis = JenisDokumen::all();
        $kategories = KategoriDokumen::all();
        return view('admin.dokumen.create', compact('jenis', 'kategories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_id' => 'required|exists:jenis_dokumen,jenis_id',
            'kategori_id' => 'required|exists:kategori_dokumen,kategori_id',
            'nomor' => 'required|string|max:100',
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'ringkasan' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DokumenHukum::create($request->all());

        return redirect()->route('admin.dokumen.index')
            ->with('success', 'Dokumen hukum berhasil ditambahkan!');
    }

    public function show($id)
    {
        $dokumen = DokumenHukum::with(['jenis', 'kategori'])->findOrFail($id);
        return view('admin.dokumen.show', compact('dokumen'));
    }

    public function edit($id)
    {
        $dokumen = DokumenHukum::findOrFail($id);
        $jenis = JenisDokumen::all();
        $kategories = KategoriDokumen::all();
        
        return view('admin.dokumen.edit', compact('dokumen', 'jenis', 'kategories'));
    }

    public function update(Request $request, $id)
    {
        $dokumen = DokumenHukum::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'jenis_id' => 'required|exists:jenis_dokumen,jenis_id',
            'kategori_id' => 'required|exists:kategori_dokumen,kategori_id',
            'nomor' => 'required|string|max:100',
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'ringkasan' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $dokumen->update($request->all());

        return redirect()->route('admin.dokumen.index')
            ->with('success', 'Dokumen hukum berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $dokumen = DokumenHukum::findOrFail($id);
        $dokumen->delete();

        return redirect()->route('admin.dokumen.index')
            ->with('success', 'Dokumen hukum berhasil dihapus!');
    }
}