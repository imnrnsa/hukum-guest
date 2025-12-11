<?php

namespace App\Http\Controllers;

use App\Models\DokumenHukum;
use App\Models\JenisDokumen;
use App\Models\KategoriDokumen;
use Illuminate\Http\Request;

class DokumenHukumController extends Controller
{
    /**
     * LIST DATA + FILTER + SEARCH
     */
    public function index(Request $request)
    {
        $search   = $request->search;
        $jenis    = $request->jenis;
        $kategori = $request->kategori;
        $status   = $request->status;

        $data = DokumenHukum::with(['jenis', 'kategori'])
            ->when($search, function ($q) use ($search) {
                $q->where(function ($query) use ($search) {
                    $query->where('nomor', 'LIKE', "%$search%")
                        ->orWhere('judul', 'LIKE', "%$search%")
                        ->orWhere('ringkasan', 'LIKE', "%$search%");
                });
            })
            ->when($jenis, fn($q) => $q->where('jenis_id', $jenis))
            ->when($kategori, fn($q) => $q->where('kategori_id', $kategori))
            ->when($status, fn($q) => $q->where('status', $status))
            ->orderBy('tanggal', 'DESC')
            ->paginate(10)
            ->appends($request->all());

        return view('pages.dokumen.index', [
            'data'         => $data,
            'jenisList'    => JenisDokumen::all(),
            'kategoriList' => KategoriDokumen::all()
        ]);
    }

    /**
     * FORM TAMBAH
     */
    public function create()
    {
        return view('pages.dokumen.create', [
            'jenis'    => JenisDokumen::all(),
            'kategori' => KategoriDokumen::all()
        ]);
    }

    /**
     * SIMPAN DATA BARU
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_id'    => 'required',
            'kategori_id' => 'required',
            'nomor'       => 'required|unique:dokumen_hukum,nomor',
            'judul'       => 'required',
            'tanggal'     => 'required|date',
            'ringkasan'   => 'nullable',
            'status'      => 'required',
            'file'        => 'nullable|mimes:pdf,doc,docx,xls,xlsx|max:5000'
        ]);

        $data = $request->except('file');

        // Upload file
        if ($request->hasFile('file')) {
            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('uploads/dokumen'), $filename);
            $data['file_path'] = 'uploads/dokumen/' . $filename;
        }

        DokumenHukum::create($data);

        return redirect()->route('dokumen-hukum.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * FORM EDIT
     */
    public function edit($id)
    {
        return view('pages.dokumen.edit', [
            'data'     => DokumenHukum::findOrFail($id),
            'jenis'    => JenisDokumen::all(),
            'kategori' => KategoriDokumen::all()
        ]);
    }

    /**
     * UPDATE DATA
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_id'    => 'required',
            'kategori_id' => 'required',
            'nomor'       => 'required|unique:dokumen_hukum,nomor,'.$id.',dokumen_id',
            'judul'       => 'required',
            'tanggal'     => 'required|date',
            'ringkasan'   => 'nullable',
            'status'      => 'required',
            'file'        => 'nullable|mimes:pdf,doc,docx,xls,xlsx|max:5000'
        ]);

        $data   = DokumenHukum::findOrFail($id);
        $input  = $request->except('file');

        // Jika upload file baru
        if ($request->hasFile('file')) {

            // Hapus file lama jika ada
            if ($data->file_path && file_exists(public_path($data->file_path))) {
                @unlink(public_path($data->file_path));
            }

            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('uploads/dokumen'), $filename);

            $input['file_path'] = 'uploads/dokumen/' . $filename;
        }

        $data->update($input);

        return redirect()->route('dokumen-hukum.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * DETAIL
     */
    public function show($id)
    {
        $data = DokumenHukum::with(['jenis', 'kategori'])->findOrFail($id);
        return view('pages.dokumen.show', compact('data'));
    }

    /**
     * DELETE
     */
    public function destroy($id)
    {
        $data = DokumenHukum::findOrFail($id);

        if ($data->file_path && file_exists(public_path($data->file_path))) {
            @unlink(public_path($data->file_path));
        }

        $data->delete();

        return redirect()->route('dokumen-hukum.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
