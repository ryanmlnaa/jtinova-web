<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Data Jabatan";
        $limit = $request->limit ?? 25;
        $data = Jabatan::paginate($limit);
        return view('jabatan.index', compact('title', 'limit','data'));   
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
            'nama_jabatan' => 'required|unique:jabatan'
        ]);
        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        try{
            DB::beginTransaction();
    
            $data = [
                "nama_jabatan" => $request->nama_jabatan,
            ];
    
            Jabatan::create($data);
    
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
    public function show(Jabatan $Jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Jabatan)
    {
        $data = Jabatan::findOrFail($Jabatan);
        $title = "Edit Jabatan";
        return view('jabatan/edit_jabatan',compact('data', "title" ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Jabatan)
    {
        $data = Jabatan::findOrFail($Jabatan);
        $data->update([
            "nama_jabatan" => $request->nama_jabatan
        ]);
        if($data){
            return redirect()->route("jabatan.index");
        }else{
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destory($Jabatan)
    {
        $data = Jabatan::findOrFail($Jabatan);
        if($data == null){abort(404);}
        $data->delete();
        Alert::success("Success Title", "Berhasil Menghapus Data");
        return redirect()->back();
    }
}
