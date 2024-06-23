<?php

namespace App\Http\Controllers\Pendampingan;

use App\Http\Controllers\Controller;
use App\Models\PendampinganUser;
use App\Models\Prodi;
use App\Models\Transactions;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PendampinganUserController extends Controller
{
    public function showForm()
    {
        
        $title = 'Form Biodata';
        $prodis = Prodi::all();
        $pendampinganUser = PendampinganUser::where('user_id', auth()->user()->id)->first();
        return view('guest.pendampingan.form-biodata', compact('title', 'prodis', 'pendampinganUser'));
    }

    public function update(Request $request, $id)
    {
        try {
            $decrypted = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            Alert::error($e->getMessage())->flash();
            return redirect()->back();
        }
        
        $validator = Validator::make($request->all(), [
            'prodi_id' => 'required|exists:prodis,id',
            'nim' => 'required|string|max:15',
            'judul' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'dosen_pembimbing' => 'required|string|max:255',
            'kendala' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $messages = implode('<br>', $messages);
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        PendampinganUser::where('id', $decrypted)->where('user_id', auth()->user()->id)->update([
            'prodi_id' => $request->prodi_id,
            'nim' => $request->nim,
            'judul' => $request->judul,
            'dosen_pembimbing' => $request->dosen_pembimbing,
            'kendala' => $request->kendala,
            'status' => 'progress',
        ]);

        User::find(auth()->user()->id)->update([
            'no_hp' => $request->no_hp,
        ]);
        
        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('dashboard.pendampingan.index');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pendampingan_id' => 'required|exists:skema_pendampingans,id',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $messages = implode('<br>', $messages);
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (PendampinganUser::where('user_id', auth()->user()->id)->exists()) {
            Alert::error('Gagal', 'Anda hanya bisa mendaftar satu kali');
            return redirect()->back();
        }

        $pendampinganUser = PendampinganUser::create([
            'user_id' => auth()->user()->id,
            'skema_pendampingan_id' => $request->pendampingan_id,
        ]);

        Transactions::create([
            'invoice' => 'INVPEN' . Carbon::now()->getTimestamp() * rand(1, 9),
            'status' => 'pending',
            'payment_method' => 'transfer',
            'pendampingan_user_id' => $pendampinganUser->id,
        ]);
        
        auth()->user()->assignRole('user-pendampingan');
        
        Alert::success('Berhasil', 'Pendaftaran berhasil! Silahkan lengkapi profil dan lakukan pembayaran.');
        return redirect()->route('dashboard.pendampingan.index');
    }
}
