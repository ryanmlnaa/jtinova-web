<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pegawai;
use App\Models\Pelatihan;
use App\Models\Portofolio;
use App\Models\SkemaPendampingan;
use App\Models\WebConfig;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $portofolio = Portofolio::with(['category', 'images' => function ($query) {
            $query->where('is_primary', true);
        }])->get();
        $pelatihan = Pelatihan::where('status', 'Aktif')->get();
        $skemaPendampingans = SkemaPendampingan::where('status', 'Aktif')->get();
        $webConfig = WebConfig::first();
        $pegawai = Pegawai::all();
        $kategori = Category::all();

        return view('welcome.index', compact('portofolio', 'pelatihan', 'skemaPendampingans', 'webConfig','pegawai', 'kategori'));
    }

    public function show($id) {
        $portofolio = Portofolio::with(['category', 'images'])->findOrFail($id);
        $webConfig = WebConfig::first();

        return view('portofolio.portfolio-details', compact('portofolio', 'webConfig'));
    }    
}
