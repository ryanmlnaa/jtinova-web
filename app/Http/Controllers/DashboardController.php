<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use App\Models\Prodi;
use App\Models\SkemaPendampingan;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data pelatihan dari database
        $title = 'Dashboard';
        $prodis = Prodi::all();
        $keahlians = Keahlian::all();
        $skemaPendampingans = SkemaPendampingan::all();

        // Kirim data ke view dashboard
        return view('dashboard.index', compact('title', 'prodis', 'keahlians', 'skemaPendampingans'));
    }
}
