<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Models\Portofolio;
use App\Models\SkemaPendampingan;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $portofolio = Portofolio::getData();
        $pelatihan = Pelatihan::getData();
        $skemaPendampingans = SkemaPendampingan::all();
        return view('welcome', compact('portofolio', 'pelatihan', 'skemaPendampingans'));
    }
}
