<?php

namespace App\Http\Controllers;

use App\Models\JenisDokumen;
use Illuminate\Http\Request;

class JenisDokumenController extends Controller
{
    public function index()
    {
        $data = JenisDokumen::all();
        return view('pages.jenis.index', compact('data'));
    }

    public function create()
    {
        return view('pages.jenis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|unique:jenis_dokumen,nama_jenis',
            'deskripsi' => 'nullable'
        ]);

        JenisDokumen::create([
            'nama_jenis' => $request->nama_jenis,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('jenis-dokumen.index')
                         ->with('success', 'Jenis dokumen berhasil ditambahkan.');
    }
    public function edit($id)
{
    $data = JenisDokumen::findOrFail($id);
    return view('pages.jenis.edit', compact('data'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_jenis' => 'required|unique:jenis_dokumen,nama_jenis,' . $id,
        'deskripsi' => 'nullable'
    ]);

    $data = JenisDokumen::findOrFail($id);
    $data->update([
        'nama_jenis' => $request->nama_jenis,
        'deskripsi' => $request->deskripsi
    ]);

    return redirect()->route('jenis-dokumen.index')
                     ->with('success', 'Jenis dokumen berhasil diperbarui.');
}
public function destroy($id)
{
    $data = JenisDokumen::findOrFail($id);
    $data->delete();

    return redirect()->route('jenis-dokumen.index')
                     ->with('success', 'Jenis dokumen berhasil dihapus.');
}
public function show($id)
{
    $data = JenisDokumen::findOrFail($id);
    return view('pages.jenis.show', compact('data'));
}
}