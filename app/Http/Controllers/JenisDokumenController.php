<?php

namespace App\Http\Controllers;

use App\Models\JenisDokumen;
use Illuminate\Http\Request;

class JenisDokumenController extends Controller
{
    public function index(Request $request)
{
    // menangkap kata kunci search
    $search = $request->search;

    // menangkap filter huruf awal (A, B, C, dst)
    $filter = $request->filter;

    $data = JenisDokumen::when($search, function ($query) use ($search) {
            $query->where('nama_jenis', 'LIKE', '%'.$search.'%')
                  ->orWhere('deskripsi', 'LIKE', '%'.$search.'%');
        })
        ->when($filter, function ($query) use ($filter) {
            $query->where('nama_jenis', 'LIKE', $filter.'%');
        })
        ->orderBy('nama_jenis', 'ASC')
        ->paginate(10)
        ->appends([
            'search' => $search,
            'filter' => $filter
        ]);

    return view('pages.jenis.index', compact('data','search','filter'));
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