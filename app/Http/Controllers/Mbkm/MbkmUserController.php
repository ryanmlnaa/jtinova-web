<?php

namespace App\Http\Controllers\Mbkm;

use App\Http\Controllers\Controller;
use App\Models\MbkmUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MbkmUserController extends Controller
{
    public function update(Request $request, MbkmUser $mbkmUser)
    {
        $validator = Validator::make($request->all(), [
            'prodi_id' => 'required',
            'nim' => 'required|string|max:10|unique:mbkm_users',
            'semester' => 'required|numeric|min:1|max:8',
            'golongan' => 'required|max:1',
            'tahun_masuk' => 'required|numeric|min:2010|max:'.(date('Y')),
            'no_hp' => 'required|numeric',
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

        $mbkmUser->update([
            'prodi_id' => $request->prodi_id,
            'nim' => $request->nim,
            'semester' => $request->semester,
            'golongan' => $request->golongan,
            'tahun_masuk' => $request->tahun_masuk,
            'no_hp' => $request->no_hp,
            'photo' => $request->file('photo')->store('images/mbkm-user', 'public'),
            'khs' => $request->file('khs')->store('pdffile/mbkm-user', 'public'),
        ]);
        
        // attach keahlian
        $mbkmUser->keahlian()->attach($request->keahlian_id);

        // remove permission fill-profile
        $user = User::find(auth()->user()->id);
        $user->revokePermissionTo('fill-profile');

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->back();
    }
}
