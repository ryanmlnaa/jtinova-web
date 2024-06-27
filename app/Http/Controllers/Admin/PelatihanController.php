<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.pelatihan.index', compact('title', 'data'));
    }

    public function create()
    {
        $title = "Tambah Pelatihan";
        $kategori = Category::all();
        return view('admin.pelatihan.create', compact('title', 'kategori'));
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "nama" => "required|string|max:255",
            "kode" => "required|string|max:255|unique:pelatihan,kode",
            "id_kategori" => "required",
            "deskripsi" => "required|string",
            "benefit" => "required|string",
            "harga" => "required|numeric|regex:/^[0-9]+$/u",
            "foto" => "required|image|mimes:jpeg,png,jpg,gif|max:2048",
            "tanggal_mulai" => "required|date",
            "tanggal_selesai" => "required|date|after:tanggal_mulai",
            "lokasi" => "required|string|max:255",
            "kuota" => "required|numeric|regex:/^[0-9]+$/u",
            "kuota_tim" => "required|numeric|regex:/^[0-9]+$/u",
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
            $data['foto'] = $req->file('foto')->store('images/pelatihan', 'public');
        }
        Pelatihan::create($data);

        Alert::success("Success", "Berhasil menambahkan data");
        return redirect()->route('pelatihan.index');
    }

    public function edit(Pelatihan $pelatihan)
    {
        $title = "Edit Pelatihan";
        $kategori = Category::all();
        return view("admin.pelatihan.edit", compact("pelatihan", "title", "kategori"));
    }

    public function update(Request $req, Pelatihan $pelatihan)
    {
        $validator = Validator::make($req->all(), [
            "nama" => "required|string|max:255",
            "kode" => "required|string|max:255|unique:pelatihan,kode,$pelatihan->kode,kode",
            "id_kategori" => "required",
            "deskripsi" => "required|string",
            "benefit" => "required|string",
            "harga" => "required|numeric|regex:/^[0-9]+$/u",
            "foto" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            "tanggal_mulai" => "required|date",
            "tanggal_selesai" => "required|date|after:tanggal_mulai",
            "lokasi" => "required|string|max:255",
            "kuota" => "required|numeric|regex:/^[0-9]+$/u",
            "kuota_tim" => "required|numeric|regex:/^[0-9]+$/u",
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
