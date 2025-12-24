<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
  public function index()
{
    $profile = [
        'nama' => 'Nur Annisa',
        'peran' => 'Full Stack Web Developer',
        'teknologi' => 'Laravel, PHP, MySQL, Bootstrap, JavaScript',
        'proyek' => 'Sistem Informasi Produk Hukum Desa',
        'email' => 'nurannisa@email.com',
        'tahun' => '2025',
        'foto' => 'profile/annisa.jpg' // ganti sesuai nama file
    ];

    return view('pages.about', compact('profile'));
}
}