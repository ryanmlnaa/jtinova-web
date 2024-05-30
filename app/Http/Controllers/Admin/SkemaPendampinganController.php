<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkemaPendampingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SkemaPendampinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data SkemaPendampingan";
        $data = SkemaPendampingan::all();
        return view('admin.skema-pendampingan.index', compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Data SkemaPendampingan";
        return view('admin.skema-pendampingan.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|max:255',
            'nama' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'harga' => 'required|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|max:255',
        ]);
        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        SkemaPendampingan::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'foto' => $request->file('foto')->store('images/skema-pendampingan', 'public'),
            'status' => $request->status,
        ]);

        Alert::success("Success", "Berhasil Menambahkan Data");
        return redirect()->route('skemaPendampingan.index');
    }

    /**
     * Display the specified resource.
     */
    public function edit(SkemaPendampingan $skemaPendampingan)
    {
        $title = "Detail Data SkemaPendampingan";
        return view('admin.skema-pendampingan.edit', compact('skemaPendampingan', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SkemaPendampingan $skemaPendampingan)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|max:255',
            'nama' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'harga' => 'required|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|max:255',
        ]);

        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $skemaPendampingan->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'status' => $request->status,
        ]);

        if($request->hasFile('foto')){
            Storage::disk('public')->delete($skemaPendampingan->foto);
            $skemaPendampingan->update([
                'foto' => $request->file('foto')->store('images/skema-pendampingan', 'public'),
            ]);
        }

        Alert::success("Success", "Berhasil Mengubah Data");
        return redirect()->route('skemaPendampingan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SkemaPendampingan $skemaPendampingan)
    {
        Storage::disk('public')->delete($skemaPendampingan->foto);
        $skemaPendampingan->delete();
        Alert::success("Success", "Berhasil Menghapus Data");
        return redirect()->route('skemaPendampingan.index');
    }
}
