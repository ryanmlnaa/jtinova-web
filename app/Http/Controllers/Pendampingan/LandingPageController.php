<?php

namespace App\Http\Controllers\Pendampingan;

use App\Http\Controllers\Controller;
use App\Models\SkemaPendampingan;
use App\Models\WebConfig;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $trainings = SkemaPendampingan::where('status', 'Aktif')->get();
        $webConfig = WebConfig::first();
        return view('welcome.pendampingan.index', compact('trainings', 'webConfig'));
    }

    public function show($kode)
    {
        $training = SkemaPendampingan::where('kode', $kode)->first();
        if (!$training) {
            return abort(404);
        }
        $webConfig = WebConfig::first();
        return view('welcome.pendampingan.show', compact('training', 'webConfig'));
    }
}
