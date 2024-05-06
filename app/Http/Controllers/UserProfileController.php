<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserProfileController extends Controller
{
    public function show()
    {
        $title = 'Profil Pengguna';

        // Mendapatkan pengguna yang sedang login
        $user = auth()->user();



        // Kirim data pengguna ke view
        return view('user.profile', ['title' => $title, 'user' => $user]);
    }

    public function update(Request $request)
    {
        // Validasi input pengguna
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . auth()->id()],
            // Tambahkan aturan validasi lain jika diperlukan
        ]);

        // Dapatkan pengguna yang sedang login
        $user = auth()->user();

        // Perbarui informasi pengguna
        $user->name = $request->name;
        $user->email = $request->email;
        $user->keahlian = $request->keahlian;
        $user->bio = $request->bio;
        // Tambahkan pembaruan informasi lain jika diperlukan

        // Simpan perubahan ke database
        $user->save();
        

        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui');
    }
}
