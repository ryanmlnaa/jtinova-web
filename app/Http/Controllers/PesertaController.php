<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PesertaController extends Controller
{
    private $jkel = ["laki-laki", "perempuan"];
    private $agama = ["islam", "kristen", "katolik", "hindu", "buddha", "konghucu"];
    public function index(Request $request)
    {
        $title = "Data Peserta";
        $data = Peserta::get();
        $agama = $this->agama;
        $jkel = $this->jkel;
        return view('Peserta.index', compact("title", "data","jkel", "agama"));
    }
    public function tambah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_peserta' => 'required', // Tambahkan aturan unik di sini
            'email' => 'required|unique:peserta',
            'no_telp' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'j_kel' => 'required',
            'pendidikan_terakhir' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'status' => 'required',
            'foto_ktp' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return   back()->withErrors($validator)->withInput();
        }
    
        try {
            $fileName = "";
            if($request->file("foto_ktp") != null){
            $fileName = time() . '.' . $request->file('foto_ktp')->getClientOriginalExtension();
    
            $request->file('foto_ktp')->move(public_path('/foto_ktp_peserta'), $fileName);
            }
            DB::beginTransaction();
    
            $data = [
                "nama_peserta" => $request->nama_peserta    ,
                "email" => $request->email,
                "no_telp" => $request->no_telp,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
                'j_kel' => $request->j_kel,
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                "status" => $request->status,
                "foto_ktp" => $fileName,
            ];

            Peserta::create($data);
    
            DB::commit();
            Alert::success('Success', 'Berhasil Tambah Data');
            return back();
        } catch (QueryException  $e) {
            DB::rollBack();
    
            // Hapus file foto jika ada
            $filePath = public_path('/foto_ktp_peserta/' . $fileName);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
    
            return back();
        }
    }  
    
    public function delete($id) {
        
        $peserta = Peserta::find($id);
       
        $file=(public_path('/foto_ktp_peserta/'.$peserta->foto_ktp));
        if (file_exists($file)) {
        @unlink($file);
        }
        $peserta->delete();
        Alert::success('Success', 'Berhasil hapus Data');
        return redirect()->back();
    }
    public function edit($id) {
        $data = Peserta::findOrFail($id);
        $title="Edit Peserta";
        $agama = $this->agama;
        $jkel = $this->jkel;
        return view("peserta.edit_peserta",compact('data','title', "jkel","agama"));
    }
    public function update(Request $req, $peserta){
        $data = Peserta::findOrFail($peserta);
        $validator = Validator::make($req->all(),  [
            'nama_peserta' => 'required', // Tambahkan aturan unik di sini
            'email' => 'required',
            'no_telp' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'j_kel' => 'required',
            'pendidikan_terakhir' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'status' => 'required',
            'foto_ktp' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        try{
            $fileName = "";
            if( $req->foto_ktp != null){
                $oldPath = public_path('foto_ktp_peserta/' . $req->foto_ktp);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
                $fileName = time() . '.' . $req->file('foto_ktp')->getClientOriginalExtension();
                $req->file('foto_ktp')->move(public_path('/foto_ktp_peserta'), $fileName); 
            }else{
                $fileName = $req->old_file;
            }
           
            $data->update([
                "nama_peserta" => $req->nama_peserta    ,
                "email" => $req->email,
                "no_telp" => $req->no_telp,
                'agama' => $req->agama,
                'pekerjaan' => $req->pekerjaan,
                'j_kel' => $req->j_kel,
                'pendidikan_terakhir' => $req->pendidikan_terakhir,
                'tmp_lahir' => $req->tmp_lahir,
                'tgl_lahir' => $req->tgl_lahir,
                'alamat' => $req->alamat,
                "status" => $req->status,
                "foto_ktp" => $fileName,
            ]);
           
            if($data){
                return redirect()->route("Peserta.index");
            }else{
                return redirect()->back()->withInput();
            } 
       
        }catch(QueryException $x){
            if($fileName == $req->old_file){
                $filePath = public_path('/foto_ktp_peserta/' . $fileName);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
           
    
            return back();
        }
    }

}
