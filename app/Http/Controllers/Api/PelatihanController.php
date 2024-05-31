<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelatihan;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    public function show($pelatihan)
    {
        $pelatihans = Pelatihan::where('id', $pelatihan)->where('status', 'Aktif')->first();
        return response()->json([
            'status' => 'success',
            'data' => $pelatihans
        ]);
    }
}
