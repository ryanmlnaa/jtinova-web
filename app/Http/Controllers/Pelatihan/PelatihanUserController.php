<?php

namespace App\Http\Controllers\Pelatihan;

use App\Http\Controllers\Controller;
use App\Models\PelatihanUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PelatihanUserController extends Controller
{
    public function update(Request $request, PelatihanUser $pelatihanUser)
    {
        $validator = Validator::make($request->all(), [
            'pelatihan_id' => 'required|exists:pelatihan,id',
            'no_hp' => 'required|numeric|digits_between:10,15',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'pendidikan_terakhir' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama.*' => 'required|string|max:255',
            'email.*' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $messages = implode('<br>', $messages);
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pelatihanUser->update([
            'pelatihan_id' => $request->pelatihan_id,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'pekerjaan' => $request->pekerjaan,
            'foto' => $request->file('foto')->store('images/pelatihan-user', 'public'),
        ]);

        $user = User::find(auth()->user()->id);
        $user->revokePermissionTo('fill-profile');
        
        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('dashboard');
    }
}
