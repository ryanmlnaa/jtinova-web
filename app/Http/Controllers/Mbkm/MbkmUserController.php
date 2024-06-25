<?php

namespace App\Http\Controllers\Mbkm;

use App\Http\Controllers\Controller;
use App\Models\Keahlian;
use App\Models\MbkmUser;
use App\Models\Prodi;
use App\Models\Timeline;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MbkmUserController extends Controller
{
    public function formMbkm()
    {
        $title = 'Formulir MBKM';
        $prodis = Prodi::all();
        $keahlians = Keahlian::all();
        return view('guest.mbkm.form-biodata', compact('title', 'prodis', 'keahlians'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'prodi_id' => 'required',
            'nim' => 'required|string|max:10|unique:mbkm_users',
            'semester' => 'required|numeric|min:1|max:8',
            'golongan' => 'required|max:1',
            'tahun_masuk' => 'required|numeric|min:2010|max:'.(date('Y')),
            'no_hp' => 'required|string|max:15|regex:/^([0-9\s\-\+\(\)]*)$/',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'khs' => 'required|mimes:pdf|max:2048',
            'keahlian_id' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $messages = implode('<br>', $messages);
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (!auth()->check()) {
            if (!User::where('email', $request->email)->exists()) {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'no_hp' => $request->no_hp,
                    'foto' => $request->file('photo')->store('images/mbkm-user', 'public'),
                ]);
            }

            $checkLogin = auth()->attempt(['email' => $request->email, 'password' => $request->password]);
            if (!$checkLogin) {
                Alert::error('Gagal', 'Email atau password salah');
                return redirect()->back();
            }
        }

        $timelineId = Timeline::where('status', 1)->first()->id;
        $mbkmUser = MbkmUser::create([
            'user_id' => auth()->user()->id,
            'prodi_id' => $request->prodi_id,
            'timeline_id' => $timelineId,
            'nim' => $request->nim,
            'semester' => $request->semester,
            'golongan' => $request->golongan,
            'tahun_masuk' => $request->tahun_masuk,
            'khs' => $request->file('khs')->store('pdffile/mbkm-user', 'public'),
        ]);
        
        $mbkmUser->keahlian()->attach($request->keahlian_id);
        
        User::find(auth()->user()->id)->update([
            'no_hp' => $request->no_hp,
            'foto' => $request->file('photo')->store('images/mbkm-user', 'public'),
        ]);

        auth()->user()->assignRole('mahasiswa-mbkm');

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->back();
    }
}
