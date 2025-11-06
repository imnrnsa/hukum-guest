<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Constructor
     * (tidak perlu middleware auth jika hanya untuk guest)
     */
    public function __construct()
    {
        // Kosong, karena tidak ada middleware untuk guest
    }

    /**
     * Menampilkan dashboard guest
     */
    public function index()
    {
        // Menampilkan view layouts/guest/dashboard.blade.php
        return view('layouts.dashboard');
    }
}
