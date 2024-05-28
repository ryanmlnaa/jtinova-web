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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|unique:mbkm_users',
            'nama' => 'required',
            'prodi_id' => 'required',
            'keahlian_id' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        MbkmUser::create([
            'user_id' => auth()->user()->id,
            'nim' => $request->nim,
            'nama' => $request->nama,
            'prodi_id' => $request->prodi_id,
            'keahlian_id' => $request->keahlian_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('mbkmuser.index');
    }

    public function destroy(MbkmUser $mbkmUser)
    {
        User::destroy($mbkmUser->user_id);
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('mbkmuser.index');
    }
}
