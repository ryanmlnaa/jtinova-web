<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatihan;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data pelatihan dari database
        $pelatihans = Pelatihan::all();

        // Kirim data ke view dashboard
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'pelatihans' => $pelatihans,
        ]);
    }
}
