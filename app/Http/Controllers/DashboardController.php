<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use App\Models\MbkmUser;
use Illuminate\Http\Request;
use App\Models\Pelatihan;
use App\Models\Prodi;
use App\Models\SkemaPendampingan;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data pelatihan dari database
        $title = 'Dashboard';
        $dataUser = MbkmUser::where('user_id', auth()->user()->id)->first();
        $prodis = Prodi::all();
        $keahlians = Keahlian::all();
        $skemaPendampingans = SkemaPendampingan::all();

        // Kirim data ke view dashboard
        return view('dashboard.index', compact('title', 'dataUser', 'prodis', 'keahlians', 'skemaPendampingans'));
    }
}
