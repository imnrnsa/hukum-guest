<?php

namespace App\Http\Controllers;

use App\Models\LampiranDokumen;
use App\Models\DokumenHukum;
use Illuminate\Http\Request;

class LampiranDokumenController extends Controller
{
    public function index()
    {
        $data = LampiranDokumen::with('dokumen')->get();
        return view('pages.lampiran.index', compact('data'));
    }

    public function create()
    {
        return view('pages.lampiran.create', [
            'dokumen' => DokumenHukum::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'dokumen_id' => 'required',
            'keterangan' => 'required',
        ]);

        LampiranDokumen::create($request->all());
        return redirect()->route('lampiran-dokumen.index');
    }
}
