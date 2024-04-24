<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PelatihanController extends Controller
{
    private $kategori = ["Desktop", "Website", "Mobile"];
    public function index(Request $req)
    {
        $title = "Data Pelatihan";
        $kat = $this->kategori;
        $data = Pelatihan::getData(); 
        return view('Pelatihan.index', compact('title', 'data', 'kat'));
    }
    public function tambah(Request $req){
        $validator = Validator::make($req->all(), [
            "nama_pelatihan" => "required",
            "kategori" => "required",
            "deskripsi" => "required",
            "harga" => "numeric|required",
            "benefit" => "required"
        ]);
        if($validator->fails()){
            $message = $validator->errors()->all();
            Alert::error($message[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        try{
            DB::beginTransaction();
            $data = [
                "nama_pelatihan" => $req->nama_pelatihan,
                "kategori" => $req->kategori,
                "deskripsi" => $req->deskripsi,
                "harga" => $req->harga,
                "benefit" => $req->benefit
            ];
            Pelatihan::create($data);
            DB::commit();
            Alert("Success", "Berhasil menambahkan data");
            return back();
        }
        catch(QueryException $e){
            DB::rollBack();
            return back();
        }
    }
    public function edit($id){
        $data = Pelatihan::findOrFail($id);
        $title = "Edit Pelatihan";
        $kat = $this->kategori;
        return view("Pelatihan.edit_pelatihan", compact("data", "title", "kat"));
    }
    public function update($id, Request $req){
        $data = Pelatihan::findOrFail($id);
        $validator = Validator::make($req->all(), [
            "nama_pelatihan" => "required",
            "kategori" => "required",
            "deskripsi" => "required",
            "harga" => "numeric|required",
            "benefit" => "required"
        ]);
        if($validator->fails()){
            $message = $validator->errors()->all();
            Alert::error($message[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        try{
            DB::beginTransaction();
            $data->update([
                "nama_pelatihan" => $req->nama_pelatihan,
                "kategori" => $req->kategori,
                "deskripsi" => $req->deskripsi,
                "harga" => $req->harga,
                "benefit" => $req->benefit
            ]);
            DB::commit();
            Alert("Success", "Berhasil mengubah data");
            return redirect()->route("Pelatihan.index");
        }
        catch(QueryException $e){
            DB::rollBack();
            return back();
        }
    }
    public function delete($id){
        $data = Pelatihan::findOrFail($id);
        $data->delete();
        Alert("Success", "Berhasil menghapus data");
        return redirect()->back();
    }
}
