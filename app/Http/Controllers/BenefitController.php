<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class BenefitController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Data Benefit";
        $data = Benefit::getData();
        return view('benefit.index', compact('title', 'data'));   
    }

  
    public function tambah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_benefit' => 'required|unique:benefit',
        ]);
        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        try{
            DB::beginTransaction();
    
            $data = [
                "nama_benefit" => $request->nama_benefit,
            ];
    
            Benefit::create($data);
    
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
        $data = Benefit::findOrFail($id);
        $title = "Edit Benefit";
        return view('benefit/edit_benefit',compact('data', "title" ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Benefit::findOrFail($id);
        $data->update([
            "nama_benefit" => $request->nama_benefit,
            
        ]);
        if($data){
            Alert::success("Success", "Berhasil Mengubah Data");
            return redirect()->route("Benefit.index");
        }else{
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $data = Benefit::findOrFail($id);
        if($data == null){abort(404);}
        $data->delete();
        Alert::success("Success", "Berhasil Menghapus Data");
        return redirect()->back();
    }
}
