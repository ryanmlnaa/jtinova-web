<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pegawai;
use App\Models\Pelatihan;
use App\Models\Portofolio;
use App\Models\SkemaPendampingan;
use App\Models\Timeline;
use App\Models\WebConfig;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $portofolio = Portofolio::with(['category', 'images' => function ($query) {
            $query->where('is_primary', true);
        }])->get();

        $webConfig = WebConfig::first();
        $pegawai = Pegawai::all();
        $kategori = Category::all();

        return view('welcome.index', compact('portofolio', 'webConfig','pegawai', 'kategori'));
    }

    public function show($id) {
        $portofolio = Portofolio::with(['category', 'images'])->findOrFail($id);
        $webConfig = WebConfig::first();

        return view('welcome.portofolio.show', compact('portofolio', 'webConfig'));
    }

    public function mbkmTimeline() {
        $webConfig = WebConfig::first();
        $timeline = Timeline::where('status', 1)->where('jenis', 'mbkm')->first();
        return view('welcome.mbkm.mbkm-timeline', compact('webConfig', 'timeline'));
    }

    public function instrukturTimeline() {
        $webConfig = WebConfig::first();
        $timeline = Timeline::where('status', 1)->where('jenis', 'instruktur')->first();
        return view('welcome.instruktur.instruktur-timeline', compact('webConfig', 'timeline'));
    }

    public function freelanceTimeline() {
        $webConfig = WebConfig::first();
        $timeline = Timeline::where('status', 1)->where('jenis', 'freelance')->first();
        return view('welcome.freelance.freelance-timeline', compact('webConfig', 'timeline'));
    }

    public function gform() {
        $webConfig = WebConfig::first();
        return view('welcome.gform', compact('webConfig'));
    }
}
