<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use App\Models\PelatihanUser;
use App\Models\Prodi;
use App\Models\SkemaPendampingan;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data pelatihan dari database
        $title = 'Dashboard';
        if(auth()->user()->hasRole(['admin', 'pegawai'])) {
            return view('admin.index', compact('title'));
        } else {
            $prodis = Prodi::all();
            $keahlians = Keahlian::all();
            $skemaPendampingans = SkemaPendampingan::all();
    
            // Kirim data ke view dashboard
            return view('guest.index', compact('title', 'prodis', 'keahlians', 'skemaPendampingans'));
        }
    }

    public function indexPelatihan()
    {
        $title = 'Pelatihan';
        $pelatihan = PelatihanUser::where('user_id', auth()->id())->get();
        return view('guest.pelatihan.index', compact('pelatihan', 'title'));
    }
}
