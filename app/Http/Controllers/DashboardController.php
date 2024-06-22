<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use App\Models\PelatihanUser;
use App\Models\PendampinganUser;
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
    
            return view('guest.index', compact('title', 'prodis', 'keahlians'));
        }
    }

    public function indexPelatihan()
    {
        $title = 'Pelatihan';
        $pelatihan = PelatihanUser::where('user_id', auth()->id())->get();
        return view('guest.pelatihan.index', compact('pelatihan', 'title'));
    }

    public function indexPendampingan()
    {
        $title = 'Pendampingan';
        $pendampingan = PendampinganUser::where('user_id', auth()->id())->first();
        return view('guest.pendampingan.index', compact('pendampingan', 'title'));
    }
}
