<?php

namespace App\Http\Controllers\Pendampingan;

use App\Http\Controllers\Controller;
use App\Models\PendampinganUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PendampinganUserController extends Controller
{
    public function update(Request $request, PendampinganUser $pendampinganUser)
    {
        $validator = Validator::make($request->all(), [
            'prodi_id' => 'required',
            'nim' => 'required|string|max:10|unique:mbkm_users',
            'judul' => 'required|string|max:255',
            'dosen_pembimbing' => 'required|string|max:255',
            'skema_pendampingan_id' => 'required',
            'no_hp' => 'required|numeric',
            'kendala' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $messages = implode('<br>', $messages);
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pendampinganUser->update($request->all());

        $user = User::find(auth()->user()->id);
        $user->revokePermissionTo('fill-profile');
        
        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('dashboard');
    }
}
