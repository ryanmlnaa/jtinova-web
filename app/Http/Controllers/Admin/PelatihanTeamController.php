<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PelatihanTeam;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PelatihanTeamController extends Controller
{
    public function index(Request $request)
    {
        $title = "Data Tim Pelatihan";
        $data = PelatihanTeam::all();
        return view('admin.pelatihan-team.index', compact("title", "data"));
    }

    public function show(PelatihanTeam $pelatihanteam)
    {
        $title = "Detail Tim Pelatihan";
        return view('admin.pelatihan-team.show', compact("title", "pelatihanteam"));
    }

    public function destroy(PelatihanTeam $pelatihanteam)
    {
        $pelatihanteam->delete();
        Alert::success("Success", "Berhasil menghapus data");
        return redirect()->route('pelatihanteam.index');
    }
}
