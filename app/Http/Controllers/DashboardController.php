<?php

namespace App\Http\Controllers;

use App\Models\InstrukturUser;
use App\Models\Keahlian;
use App\Models\PelatihanUser;
use App\Models\PendampinganUser;
use App\Models\Prodi;
use App\Models\SkemaPendampingan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data pelatihan dari database
        $title = 'Dashboard';
        if(auth()->user()->hasRole(['admin', 'pegawai'])) {
            return view('admin.index', compact('title'));
        } else {
            $aktivitas_pelatihans = PelatihanUser::where('user_id', auth()->id())->latest()->limit(5)->get();
    
            return view('guest.index', compact('title', 'aktivitas_pelatihans'));
        }
    }

    public function indexPelatihan()
    {
        $title = 'Pelatihan';
        $pelatihan = PelatihanUser::where('user_id', auth()->id())->get();
        return view('guest.pelatihan.index', compact('pelatihan', 'title'));
    }

    public function indexPendampingan()
    {
        $title = 'Pendampingan';
        $pendampingan = PendampinganUser::where('user_id', auth()->id())->first();
        return view('guest.pendampingan.index', compact('pendampingan', 'title'));
    }

    public function profileGuest()
    {
        $title = 'Profil';
        return view('guest.profile.index', compact('title'));
    }

    public function profileAdmin()
    {
        $title = 'Profil';
        return view('admin.profile.index', compact('title'));
    }

    public function profileGuestUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.auth()->id(),
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|string|max:1',
            'pendidikan_terakhir' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'portofolio' => 'nullable|string|max:255',
            'cv' => 'nullable|mimes:pdf|max:2048',
            'linkedin' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $messages = implode('<br>', $messages);
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cek apakah ada file foto yang diupload
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('images/foto', 'public');
        } else {
            $foto = auth()->user()->foto;
        }

        // Cek apakah ada file cv yang diupload
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv')->store('pdffile/cv', 'public');
        } else {
            $cv = auth()->user()->cv;
        }
        
        User::where('id', auth()->id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'pekerjaan' => $request->pekerjaan,
            'portofolio' => $request->portofolio,
            'cv' => $cv,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'foto' => $foto,
        ]);

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->back();
    }

    public function updatePasswordAdmin()
    {
        $title = 'Ubah Password';
        return view('admin.profile.password', compact('title'));
    }

    public function passwordGuest()
    {
        $title = 'Ubah Password';
        return view('guest.profile.password', compact('title'));
    }

    public function passwordGuestUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // validasi password lama
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            Alert::error('Password lama salah')->flash();
            return redirect()->back();
        }

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $messages = implode('<br>', $messages);
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::where('id', auth()->id())->update([
            'password' => bcrypt($request->password),
        ]);

        Alert::success('Berhasil', 'Password berhasil diubah');
        return redirect()->back();
    }
}
