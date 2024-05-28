<?php

namespace App\Http\Controllers;

use App\Models\MbkmUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MbkmUserController extends Controller
{
    public function index()
    {
        $title = 'Data Mahasiswa MBKM';
        $data = MbkmUser::with('user', 'prodi', 'keahlian')->get();
        return view('mbkm-user.index', compact('data', 'title'));
    }

    public function destroy(MbkmUser $mbkmUser)
    {
        User::destroy($mbkmUser->user_id);
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('mbkmuser.index');
    }
}
