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
}
