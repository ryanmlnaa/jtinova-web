<?php

namespace App\Http\Controllers\Instruktur;

use App\Http\Controllers\Controller;
use App\Models\InstrukturUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class InstrukturUserController extends Controller
{
    public function update(Request $request, InstrukturUser $instrukturUser)
    {
        $validator = Validator::make($request->all(), [
            'no_hp' => 'required|numeric|digits_between:10,15',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'pendidikan_terakhir' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'portofolio' => 'required|string|max:255',
            'cv' => 'required|mimes:pdf|max:2048',
            'linkedin' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $messages = implode('<br>', $messages);
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $instrukturUser->update([
            'pelatihan_id' => $request->pelatihan_id,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'pekerjaan' => $request->pekerjaan,
            'foto' => $request->file('foto')->store('images/instruktur-user', 'public'),
            'portofolio' => $request->portofolio,
            'cv' => $request->file('cv')->store('pdffile/instruktur-user', 'public'),
            'linkedin' => $request->linkedin,
        ]);

        $user = User::find(auth()->user()->id);
        $user->revokePermissionTo('fill-profile');
        
        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('dashboard');
    }
}
