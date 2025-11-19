<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DokumenHukum;
use App\Models\KategoriDokumen;
use App\Models\JenisDokumen;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'totalUsers'    => User::count(),
            'totalDokumen'  => DokumenHukum::count(),
            'totalKategori' => KategoriDokumen::count(),
            'totalJenis'    => JenisDokumen::count(),
        ];

        return view('pages.dashboard', compact('stats'));
    }
}
