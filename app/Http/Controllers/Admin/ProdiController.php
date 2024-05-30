<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Prodi";
        $data = Prodi::latest()->get();
        return view('prodi.index', compact('data', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|max:255',
            'name' => 'required|max:255',
        ]);
        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return redirect()->route('prodi.index')->withErrors($validator)->withInput();
        }
        
        Prodi::create([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        Alert::success("Success", "Berhasil Menambahkan Data");
        return redirect()->route('prodi.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|max:255',
            'name' => 'required|max:255',
        ]);

        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return redirect()->route('prodi.index')->withErrors($validator)->withInput();
        }
        $prodi->update([
            "code" => $request->code,
            "name" => $request->name,
        ]);

        Alert::success("Success", "Berhasil Mengubah Data");
        return redirect()->route('prodi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        $prodi->delete();
        Alert::success("Success", "Berhasil Menghapus Data");
        return redirect()->route('prodi.index');
    }
}
