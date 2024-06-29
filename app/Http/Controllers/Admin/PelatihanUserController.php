<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PelatihanUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PelatihanUserController extends Controller
{
    public function index(Request $request)
    {
        $title = "Data Peserta Pelatihan";
        $data = PelatihanUser::all();
        return view('admin.pelatihan-user.index', compact("title", "data"));
    }
    public function destroy(PelatihanUser $pelatihanUser) {
        $pelatihanUser->delete();

        Alert::success('Success', 'Berhasil hapus Data');
        return redirect()->back();
    }
}
