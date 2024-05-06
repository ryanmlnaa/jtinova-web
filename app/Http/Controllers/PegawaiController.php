<?php

namespace App\Http\Controllers;

use App\Models\Kedudukan;
use App\Models\Pegawai;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $title = "Data Pegawai";
        $limit = $request->limit ?? 25;
        $kedudukan = Kedudukan::get();
        $data = DB::table('pegawai')
        ->join("kedudukan", "pegawai.id_kedudukan", '=', 'kedudukan.id_kedudukan')
        ->paginate($limit);
        
        return view('Pegawai.index', compact("title", "limit", "data", "kedudukan"));
    }
    public function tambahdata_pegawai(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|numeric|unique:pegawai', // Tambahkan aturan unik di sini
            'nama_pegawai' => 'required',
            'kedudukan' => 'required',
            'link_linkdIn' => 'required',
            'foto_profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
    
        try {
            $fileName = time() . '.' . $request->file('foto_profile')->getClientOriginalExtension();
    
            $request->file('foto_profile')->move(public_path('/foto_pegawai'), $fileName);
    
            DB::beginTransaction();
    
            $data = [
                "nip" => $request->nip,
                "nama_pegawai" => $request->nama_pegawai,
                "id_kedudukan" => $request->kedudukan,
                "link_linkdIn" => $request->link_linkdIn,
                "instagram" => $request->instagram,
                "foto_profile" => $fileName,
            ];

            Pegawai::create($data);
    
            DB::commit();
            Alert::success('Success Title', 'Berhasil Tambah Data');
            return back();
        } catch (QueryException $e) {
            DB::rollBack();
    
            // Tangani khusus kesalahan unik pada kolom 'nip'
            if ($e->errorInfo[1] == 1062) {
                Alert::error('Gagal', 'NIP sudah ada. Masukkan NIP yang berbeda.')->flash();
            } else {
                Alert::error('Gagal', $e->getMessage())->flash();
            }
    
            // Hapus file foto jika ada
            $filePath = public_path('/foto_pegawai/' . $fileName);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
    
            return back();
        }
    }  
    
    public function hapuspegawai($id_pegawai) {
        
        $pegawai = Pegawai::find($id_pegawai);
        // if (!$pegawai) {
        //     return response()->json(['message' => 'Data tidak ditemukan'], 404);
        // }
        $file=(public_path('/foto_pegawai/'.$pegawai->foto_profile));
        if (file_exists($file)) {
        @unlink($file);
        }
        $pegawai->delete();
        // return response()->json(['message' => 'Data berhasil dihapus'], 200);
        Alert::success('Success Title', 'Berhasil hapus Data');
        return redirect()->back();
    }
    public function edit($id) {
        $data = DB::table('pegawai')
        ->where("id_pegawai", "=", $id)
        ->join("kedudukan", "pegawai.id_kedudukan", '=', 'kedudukan.id_kedudukan')
        ->first();
        $kedudukan = Kedudukan::get();
        $title="Edit Pegawai";
        return view("pegawai.edit_pegawai",compact('data','title', 'kedudukan'));
    }
    public function update(Request $req, $pegawai){
        $data = Pegawai::findOrFail($pegawai);
        $validator = Validator::make($req->all(), [
            'nip' => 'required',
            'nama_pegawai' => 'required',
            'kedudukan' => 'required',
            'link_linkdIn' => 'required',
            'instagram' => 'required',
            'foto_profile' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ]); 
        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        try{
            $fileName = "";
            if( $req->foto_profile != null){
                $oldPath = public_path('foto_pegawai/' . $req->foto_profile);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
                $fileName = time() . '.' . $req->file('foto_profile')->getClientOriginalExtension();
                $req->file('foto_profile')->move(public_path('/foto_pegawai'), $fileName); 
            }else{
                $fileName = $req->old_file;
            }
           
            $data->update([
                "nip" => $req->nip,
                "nama_pegawai" => $req->nama_pegawai,
                "id_kedudukan" => $req->kedudukan, 
                "link_linkdIn"=> $req->link_linkdIn,
                "instagram"  => $req->instagram,
                "foto_profile" => $fileName
            ]);
           
            if($data){
                return redirect()->route("datapegawai");
            }else{
                return redirect()->back()->withInput();
            } 
       
        }catch(QueryException $x){
            
    
            // Hapus file foto jika ada
            if($fileName == $req->old_file){
                $filePath = public_path('/foto_pegawai/' . $fileName);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
           
    
            return back();
        }
    }
}
