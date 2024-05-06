<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KeahlianController extends Controller
{
    public function index(Request $request)
    {
        $title = "Data Keahlian";
        $data = Keahlian::getData();
        return view('keahlian.index', compact('title', 'data'));   
    }

  
    public function tambah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_keahlian' => 'required|unique:keahlian',
            'tipe_keahlian' => 'required',
        ]);
        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        try{
            DB::beginTransaction();
    
            $data = [
                "nama_keahlian" => $request->nama_keahlian,
                "tipe_keahlian" => $request->tipe_keahlian,
            ];
    
            Keahlian::create($data);
    
            DB::commit();
            Alert::success('Success', 'Berhasil Tambah Data');
            return back();
        }catch(QueryException $e){
            // DB::rollBack();
            // return back();
            Alert::success($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Keahlian::findOrFail($id);
        $title = "Edit Keahlian";
        return view('keahlian/edit_keahlian',compact('data', "title" ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Keahlian::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'nama_keahlian' => 'required',
            'tipe_keahlian' => 'required',
        ]);
        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        $data->update([
            "nama_keahlian" => $request->nama_keahlian,
            "tipe_keahlian" => $request->tipe_keahlian
        ]);
        if($data){
            Alert::success("Success", "Berhasil Mengubah Data");
            return redirect()->route("Keahlian.index");
        }else{
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $data = Keahlian::findOrFail($id);
        if($data == null){abort(404);}
        $data->delete();
        Alert::success("Success", "Berhasil Menghapus Data");
        return redirect()->back();
    }
}
