<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PelatihanController extends Controller
{
    public function index(Request $req)
    {
        $title = "Data Pelatihan";
        $data = Pelatihan::all();
        return view('pelatihan.index', compact('title', 'data'));
    }

    public function create()
    {
        $title = "Tambah Pelatihan";
        $kategori = Category::all();
        return view('pelatihan.create', compact('title', 'kategori'));
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "nama" => "required|string|max:255",
            "kode" => "required|string|max:255",
            "id_kategori" => "required",
            "deskripsi" => "required|string",
            "benefit" => "required|string",
            "harga" => "required|numeric",
            "foto" => "required|image|mimes:jpeg,png,jpg,gif|max:2048",
            "status" => "required|in:Aktif,Tidak Aktif"
        ]);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $message = implode('<br>', $message);
            Alert::error($message)->flash();
            return back()->withErrors($validator)->withInput();
        }

        Pelatihan::create([
            "nama" => $req->nama,
            "kode" => $req->kode,
            "id_kategori" => $req->id_kategori,
            "deskripsi" => $req->deskripsi,
            "benefit" => $req->benefit,
            "harga" => $req->harga,
            "foto" => $req->file('foto')->store('images/pelatihan', 'public'),
            "status" => $req->status
        ]);

        Alert::success("Success", "Berhasil menambahkan data");
        return redirect()->route('pelatihan.index');
    }

    public function edit(Pelatihan $pelatihan)
    {
        $title = "Edit Pelatihan";
        $kategori = Category::all();
        return view("pelatihan.edit", compact("pelatihan", "title", "kategori"));
    }

    public function update(Request $req, Pelatihan $pelatihan)
    {
        $validator = Validator::make($req->all(), [
            "nama" => "required|string|max:255",
            "kode" => "required|string|max:255",
            "id_kategori" => "required",
            "deskripsi" => "required|string",
            "benefit" => "required|string",
            "harga" => "required|numeric",
            "foto" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            "status" => "required|in:Aktif,Tidak Aktif"
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $message = implode('<br>', $message);
            Alert::error($message)->flash();
            return back()->withErrors($validator)->withInput();
        }

        $data = $req->all();
        if ($req->hasFile('foto')) {
            Storage::disk('public')->delete($pelatihan->foto);
            $data['foto'] = $req->file('foto')->store('images/pelatihan', 'public');
        }
        $pelatihan->update($data);
        Alert::success("Success", "Berhasil mengubah data");
        return redirect()->route('pelatihan.index');
    }
    public function destroy(Pelatihan $pelatihan)
    {
        Storage::disk('public')->delete($pelatihan->foto);
        $pelatihan->delete();
        Alert::success("Success", "Berhasil menghapus data");
        return redirect()->back();
    }
}
