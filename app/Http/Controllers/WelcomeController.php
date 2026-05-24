<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Partner;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Menampilkan halaman utama publik (route /).
     * Mengambil data Partner dan Kategori untuk ditampilkan ke pengunjung.
     */
    public function index()
    {
        // Ambil semua partner untuk ditampilkan di homepage
        $partners = Partner::latest()->get();

        // Ambil semua kategori beserta jumlah event masing-masing
        $categories = Category::withCount('events')->get();

        return view('welcome', [
            'nama'       => 'Muh.Raihan',
            'nim'        => '24.12.3360',
            'partners'   => $partners,
            'categories' => $categories,
        ]);
    }
}
