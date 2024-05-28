<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KeahlianController extends Controller
{
    public function index(Request $request)
    {
        $title = "Data Keahlian";
        $data = Keahlian::latest()->get();

        return view('keahlian.index', compact('title', 'data'));   
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
        ]);
        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return redirect()->route('keahlian.index')->withErrors($validator)->withInput();
        }
        
        Keahlian::create([
            'nama' => $request->nama,
        ]);

        Alert::success("Success", "Berhasil Menambahkan Data");
        return redirect()->route('keahlian.index');
    }

    public function update(Request $request, $id)
    {
        $data = Keahlian::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
        ]);

        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return redirect()->route('keahlian.index')->withErrors($validator)->withInput();
        }

        $data->update([
            "nama" => $request->nama,
        ]);

        Alert::success("Success", "Berhasil Mengubah Data");
        return redirect()->route('keahlian.index');
    }


    public function destroy($id)
    {
        Keahlian::findOrFail($id)->delete();
        Alert::success("Success", "Berhasil Menghapus Data");
        return redirect()->route('keahlian.index');
    }
}
