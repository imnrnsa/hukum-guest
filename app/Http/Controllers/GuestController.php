<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DokumenHukum;
use App\Models\JenisDokumen;
use App\Models\KategoriDokumen;

class GuestController extends Controller
{
    public function home()
    {
        // Data untuk hero section
        $heroData = [
            'title' => 'Konsultasi Hukum Online Lebih Mudah',
            'subtitle' => 'Temukan dokumen hukum, konsultasi dengan ahli, dan dapatkan solusi hukum terpercaya',
            'search_placeholder' => 'Cari undang-undang, peraturan, atau konsultan...'
        ];

        try {
            // Dokumen terbaru
            $recentDocuments = DokumenHukum::with(['jenis', 'kategori'])
                ->where('status', 'active')
                ->orderBy('created_at', 'desc')
                ->take(6)
                ->get();

            // Kategori populer
            $popularCategories = KategoriDokumen::withCount(['dokumen' => function($query) {
                $query->where('status', 'active');
            }])->orderBy('dokumen_count', 'desc')
              ->take(8)
              ->get();

            // Jenis dokumen
            $documentTypes = JenisDokumen::all();

        } catch (\Exception $e) {
            // Jika tabel belum ada, gunakan array kosong
            $recentDocuments = collect();
            $popularCategories = collect();
            $documentTypes = collect();
        }

        return view('guest.home', compact(
            'heroData', 
            'recentDocuments', 
            'popularCategories',
            'documentTypes'
        ));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $category = $request->get('category');
        $type = $request->get('type');

        try {
            $documents = DokumenHukum::with(['jenis', 'kategori'])
                ->where('status', 'active')
                ->when($query, function($q) use ($query) {
                    return $q->where('judul', 'like', "%{$query}%")
                            ->orWhere('ringkasan', 'like', "%{$query}%")
                            ->orWhere('nomor', 'like', "%{$query}%");
                })
                ->when($category, function($q) use ($category) {
                    return $q->where('kategori_id', $category);
                })
                ->when($type, function($q) use ($type) {
                    return $q->where('jenis_id', $type);
                })
                ->orderBy('tanggal', 'desc')
                ->paginate(12);

            $categories = KategoriDokumen::all();
            $types = JenisDokumen::all();

        } catch (\Exception $e) {
            // Jika tabel belum ada, gunakan data kosong
            $documents = collect();
            $categories = collect();
            $types = collect();
        }

        return view('guest.search', compact('documents', 'categories', 'types', 'query'));
    }

    public function documentDetail($id)
    {
        try {
            $document = DokumenHukum::with(['jenis', 'kategori'])
                ->where('status', 'active')
                ->findOrFail($id);

            $relatedDocuments = DokumenHukum::with(['jenis', 'kategori'])
                ->where('status', 'active')
                ->where('kategori_id', $document->kategori_id)
                ->where('dokumen_id', '!=', $id)
                ->take(4)
                ->get();

        } catch (\Exception $e) {
            abort(404, 'Dokumen tidak ditemukan');
        }

        return view('guest.document-detail', compact('document', 'relatedDocuments'));
    }

    public function categoryDocuments($categoryId)
    {
        try {
            $category = KategoriDokumen::findOrFail($categoryId);
            $documents = DokumenHukum::with(['jenis', 'kategori'])
                ->where('status', 'active')
                ->where('kategori_id', $categoryId)
                ->orderBy('tanggal', 'desc')
                ->paginate(12);

        } catch (\Exception $e) {
            abort(404, 'Kategori tidak ditemukan');
        }

        return view('guest.category', compact('category', 'documents'));
    }

    public function typeDocuments($typeId)
    {
        try {
            $type = JenisDokumen::findOrFail($typeId);
            $documents = DokumenHukum::with(['jenis', 'kategori'])
                ->where('status', 'active')
                ->where('jenis_id', $typeId)
                ->orderBy('tanggal', 'desc')
                ->paginate(12);

        } catch (\Exception $e) {
            abort(404, 'Jenis dokumen tidak ditemukan');
        }

        return view('guest.type', compact('type', 'documents'));
    }

    public function about()
    {
        return view('guest.about');
    }

    public function contact()
    {
        return view('guest.contact');
    }
}