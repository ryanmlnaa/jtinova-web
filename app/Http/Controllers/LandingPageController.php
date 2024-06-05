<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pelatihan;
use App\Models\Portofolio;
use App\Models\SkemaPendampingan;
use App\Models\WebConfig;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $portofolio = Portofolio::getData();
        $pelatihan = Pelatihan::where('status', 'Aktif')->get();
        $skemaPendampingans = SkemaPendampingan::where('status', 'Aktif')->get();
        $webConfig = WebConfig::first();
        $pegawai = Pegawai::all();
        return view('welcome', compact('portofolio', 'pelatihan', 'skemaPendampingans', 'webConfig','pegawai'));
    }
}
