<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $title = "Data Pegawai";

        $data = Pegawai::latest()->get();

        return view('admin.pegawai.index', compact("title", "data"));
    }

    public function create()
    {
        $title = "Tambah Pegawai";

        $jabatan = Jabatan::all();
        $users = User::all();

        return view('admin.pegawai.create', compact("title", "jabatan", "users"));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "user_id" => "required|exists:users,id",
            "nip" => "required|string|max:50|unique:pegawai,nip",
            "nama" => "required|string|max:255",
            "jabatan_id" => "required|exists:jabatan,id",
            "instagram" => "nullable|string",
            "linkedin" => "nullable|string",
            "foto" => "required|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $message = implode('<br>', $message);
            Alert::error($message)->flash();
            return back()->withErrors($validator)->withInput();
        }

        Pegawai::create([
            "user_id" => $request->user_id,
            "nip" => $request->nip,
            "nama" => $request->nama,
            "jabatan_id" => $request->jabatan_id,
            "instagram" => $request->instagram,
            "linkedin" => $request->linkedin,
            "foto" => $request->file("foto")->store("images/pegawai", "public"),
        ]);

        Alert::success('Berhasil', 'Data Pegawai berhasil ditambahkan');
        return redirect()->route('pegawai.index');
    }

    public function edit(Pegawai $pegawai)
    {
        $title = "Edit Pegawai";

        $jabatan = Jabatan::all();
        $users = User::all();

        return view('admin.pegawai.edit', compact("title", "jabatan", "users", "pegawai",));
    }

    public function update(Request $request, Pegawai $pegawai)
    {

        
        $validator = Validator::make($request->all(), [
            "user_id" => "required|exists:users,id",
            "nip" => "required|string|max:50|",
            "nama" => "required|string|max:255",
            "jabatan_id" => "required|exists:jabatan,id",
            "instagram" => "nullable|string",
            "linkedin" => "nullable|string",
            "foto" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $message = implode('<br>', $message);
            Alert::error($message)->flash();
            return back()->withErrors($validator)->withInput();
        }

        $data = [
            "user_id" => $request->user_id,
            "nip" => $request->nip,
            "nama" => $request->nama,
            "jabatan_id" => $request->jabatan_id,
            "instagram" => $request->instagram, // Pastikan menggunakan request->instagram di sini
            "linkedin" => $request->linkedin, // Dan juga request->linkedin di sini
        ];        

        if ($request->hasFile("foto")) {
            Storage::disk('public')->delete($pegawai->foto);
            $data["foto"] = $request->file("foto")->store("images/pegawai", "public");
        }

        $pegawai->update($data);

        Alert::success('Berhasil', 'Data Pegawai berhasil diubah');
        return redirect()->route('pegawai.index');
    }

    public function destroy(Pegawai $pegawai)
    {
        Storage::disk('public')->delete($pegawai->foto);
        $pegawai->delete();

        Alert::success('Berhasil', 'Data Pegawai berhasil dihapus');
        return redirect()->route('pegawai.index');
    }
}
