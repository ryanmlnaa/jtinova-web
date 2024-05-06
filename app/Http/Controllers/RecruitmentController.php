<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use App\Models\Recruitment;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RecruitmentController extends Controller
{
    private $semester = [2,4,6];
    private $keahlian_utama = ["Laravel", "Flutter", "Code Igniter"];
    private $keahlian_lain = ["Desain", "Editing"];
    private $prodi = ["Teknik Informatika", "Manajemen Informatika", "Teknik Komputer"];
    public function index(Request $req)
    {
        $title = "Data Recruitment";
        $data = Recruitment::getData(); 
        $keahlian = Keahlian::getData();
        $smt = $this->semester;
        $prodi = $this->prodi;
        return view('recruitment.index', compact('title', 'data', 'smt', 'keahlian', 'prodi'));
    }
    public function tambah(Request $req){
        $validator = Validator::make($req->all(), [
            "nim" => "required|unique:recruitment",
            "nama" => "required",
            "prodi" => "required",
            "semester" => "required",
            "keahlian_utama" => "required",
            "keahlian_lain" => "required"
        ]);
        if($validator->fails()){
            $message = $validator->errors()->all();
            Alert::error($message[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        try{
            DB::beginTransaction();
            $data = [
                "nim" => $req->nim,
                "nama" => $req->nama,
                "prodi" => $req->prodi,
                "semester" => $req->semester,
                "keahlian_utama" => $req->keahlian_utama,
                "keahlian_lain" => $req->keahlian_lain
            ];
            dd($data);
            Recruitment::create($data);
            DB::commit();
            Alert("Success Title", "Berhasil menambahkan data");
            return back();
        }
        catch(QueryException $e){
            DB::rollBack();
            return back();
        }
    }
    public function edit($id){
        $data = Recruitment::findOrFail($id);
        $title = "Edit Recruitment";
        $smt = $this->semester;
        $utama = $this->keahlian_utama;
        $lain = $this->keahlian_lain;
        $prodi = $this->prodi;
        return view("Recruitment.edit_recruitment", compact("data", "title", "smt", "utama", "lain", "prodi"));
    }
    public function update($id, Request $req){
        $data = Recruitment::findOrFail($id);
        $validator = Validator::make($req->all(), [
            "nim" => "required",
            "nama" => "required",
            "prodi" => "required",
            "semester" => "required",
            "keahlian_utama" => "required",
            "keahlian_lain" => "required"
        ]);
        if($validator->fails()){
            $message = $validator->errors()->all();
            Alert::error($message[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        try{
            DB::beginTransaction();
            $data->update([
                "nim" => $req->nim,
                "nama" => $req->nama,
                "prodi" => $req->prodi,
                "semester" => $req->semester,
                "keahlian_utama" => $req->keahlian_utama,
                "keahlian_lain" => $req->keahlian_lain
            ]);
            DB::commit();
            Alert("Success Title", "Berhasil mengubah data");
            return back();
        }
        catch(QueryException $e){
            DB::rollBack();
            return back();
        }
    }
    public function delete($id){
        $data = Recruitment::findOrFail($id);
        $data->delete();
        Alert("Success", "Berhasil menghapus data");
        return redirect()->back();
    }
    
}
