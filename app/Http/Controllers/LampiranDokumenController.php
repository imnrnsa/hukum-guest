<?php

namespace App\Http\Controllers;

use App\Models\LampiranDokumen;
use App\Models\LampiranFile;
use Illuminate\Http\Request;

class LampiranDokumenController extends Controller
{
    public function index()
    {
        $data = LampiranDokumen::with('files')->paginate(10);
        return view('lampiran.index', compact('data'));
    }

    public function create()
    {
        return view('lampiran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required',
            'deskripsi' => 'nullable',
            'files.*'   => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:5000'
        ]);

        $dokumen = LampiranDokumen::create($request->only('judul','deskripsi'));

        // Upload Banyak File
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {

                $filename = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('uploads/lampiran'), $filename);

                LampiranFile::create([
                    'lampiran_id' => $dokumen->lampiran_id,
                    'file_path'   => 'uploads/lampiran/'.$filename,
                    'file_type'   => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('lampiran-dokumen.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = LampiranDokumen::with('files')->findOrFail($id);
        return view('lampiran.show', compact('data'));
    }

    public function edit($id)
    {
        $data = LampiranDokumen::with('files')->findOrFail($id);
        return view('lampiran.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'     => 'required',
            'deskripsi' => 'nullable',
            'files.*'   => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:5000'
        ]);

        $dokumen = LampiranDokumen::findOrFail($id);
        $dokumen->update($request->only('judul','deskripsi'));

        // Upload file baru
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {

                $filename = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('uploads/lampiran'), $filename);

                LampiranFile::create([
                    'lampiran_id' => $dokumen->lampiran_id,
                    'file_path'   => 'uploads/lampiran/'.$filename,
                    'file_type'   => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('lampiran-dokumen.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = LampiranDokumen::findOrFail($id);

        // hapus file fisik
        foreach ($data->files as $file) {
            if (file_exists(public_path($file->file_path))) {
                unlink(public_path($file->file_path));
            }
        }

        $data->delete();

        return redirect()->route('lampiran-dokumen.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
