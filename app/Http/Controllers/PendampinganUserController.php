<?php

namespace App\Http\Controllers;

use App\Models\PendampinganUser;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PendampinganUserController extends Controller
{
    public function index(Request $request)
    {
        $title = "Data Peserta";
        $data = PendampinganUser::all();
        return view('pendampingan-user.index', compact("title", "data"));
    }
    public function destroy(PendampinganUser $pendampinganUser) {
        
        User::where('id', $pendampinganUser->user_id)->delete();

        Alert::success('Success', 'Berhasil hapus Data');
        return redirect()->back();
    }
}
