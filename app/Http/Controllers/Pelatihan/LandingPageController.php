<?php

namespace App\Http\Controllers\Pelatihan;

use App\Http\Controllers\Controller;
use App\Models\Pelatihan;
use App\Models\WebConfig;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $trainings = Pelatihan::where('status', 'Aktif')->get();
        $webConfig = WebConfig::first();
        return view('welcome.pelatihan.index', compact('trainings', 'webConfig'));
    }

    public function show($kode)
    {
        $training = Pelatihan::where('kode', $kode)->first();
        if (!$training) {
            return abort(404);
        }
        $webConfig = WebConfig::first();
        return view('welcome.pelatihan.show', compact('training', 'webConfig'));
    }
}
