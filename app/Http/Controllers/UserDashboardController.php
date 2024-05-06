<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatihan;
use App\Models\Portofolio;

class UserDashboardController extends Controller
{
    // Metode untuk menampilkan data di dashboard
    public function index()
    {
        // Ambil semua data dari database
        $pelatihans = Pelatihan::all();
        $portofolios = Portofolio::all();

        // Kirim data ke view dashboard
        return view('user.dashboard', [
            'title' => 'Dashboard',
            'pelatihans' => $pelatihans,
            'portofolios' => $portofolios,
        ]);
    }
}
