<?php

namespace App\Http\Controllers;

use App\Models\Kedudukan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KedudukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Data Kedudukan";
        $limit = $request->limit ?? 25;
        $data = Kedudukan::paginate($limit);
        return view('Kedudukan.index', compact('title', 'limit','data'));   
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kedudukan' => 'required|unique:kedudukan'
        ]);
        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        try{
            DB::beginTransaction();
    
            $data = [
                "nama_kedudukan" => $request->nama_kedudukan,
            ];
    
            Kedudukan::create($data);
    
            DB::commit();
            Alert::success('Success Title', 'Berhasil Tambah Data');
            return back();
        }catch(QueryException $e){
            // DB::rollBack();
            // return back();
            Alert::success($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kedudukan $Kedudukan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Kedudukan)
    {
        $data = Kedudukan::findOrFail($Kedudukan);
        $title = "Edit Kedudukan";
        return view('kedudukan/edit_kedudukan',compact('data', "title" ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Kedudukan)
    {
        $data = Kedudukan::findOrFail($Kedudukan);
        $data->update([
            "nama_kedudukan" => $request->nama_kedudukan
        ]);
        if($data){
            return redirect()->route("Kedudukan.index");
        }else{
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destory($Kedudukan)
    {
        $data = Kedudukan::findOrFail($Kedudukan);
        if($data == null){abort(404);}
        $data->delete();
        Alert::success("Success Title", "Berhasil Menghapus Data");
        return redirect()->back();
    }
}
