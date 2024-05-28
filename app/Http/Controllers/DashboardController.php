<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use App\Models\MbkmUser;
use Illuminate\Http\Request;
use App\Models\Pelatihan;
use App\Models\Prodi;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data pelatihan dari database
        $title = 'Dashboard';
        $pelatihans = Pelatihan::all();
        $dataUser = MbkmUser::where('user_id', auth()->user()->id)->first();
        $prodis = Prodi::all();
        $keahlians = Keahlian::all();
        // Kirim data ke view dashboard
        return view('dashboard.index', compact('pelatihans', 'title', 'dataUser', 'prodis', 'keahlians'));
    }
}
