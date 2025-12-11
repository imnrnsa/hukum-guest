<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPerubahan;
use App\Models\DokumenHukum;
use Illuminate\Http\Request;

class RiwayatPerubahanController extends Controller
{
    public function index()
    {
        $data = RiwayatPerubahan::with('dokumen')->get();
        return view('pages.riwayat.index', compact('data'));
    }

    public function create()
    {
        return view('pages.riwayat.create', [
            'dokumen' => DokumenHukum::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'dokumen_id' => 'required',
            'tanggal' => 'required',
            'uraian_perubahan' => 'required',
            'versi' => 'required'
        ]);

        RiwayatPerubahan::create($request->all());
        return redirect()->route('riwayat-perubahan.index');
    }
    public function edit($id)
{
    return view('pages.riwayat.edit', [
        'data' => RiwayatPerubahan::findOrFail($id),
        'dokumen' => DokumenHukum::all()
    ]);
}

public function update(Request $request, $id)
{
    $request->validate([
        'dokumen_id' => 'required',
        'tanggal' => 'required',
        'uraian_perubahan' => 'required',
        'versi' => 'required'
    ]);

    RiwayatPerubahan::findOrFail($id)->update($request->all());
    return redirect()->route('riwayat-perubahan.index');
}

public function destroy($id)
{
    RiwayatPerubahan::destroy($id);
    return redirect()->route('riwayat-perubahan.index');
}

}
