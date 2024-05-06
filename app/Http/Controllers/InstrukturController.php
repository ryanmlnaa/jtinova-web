<?php

namespace App\Http\Controllers;

use App\Models\Instruktur;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class InstrukturController extends Controller
{
    private $jkel = ["laki-laki", "perempuan"];
    private $agama = ["islam", "kristen", "katolik", "hindu", "buddha", "konghucu"];
    private $keahlian = ["Web Development", "Mobile Development", "Sistem Pengambilan Keputusan", "Sistem Pakar", "Lainnya"];
    public function index(Request $req)
    {
        $title = "Data Instruktur";
        $data = Instruktur::get();
        $agama = $this->agama;
        $jkel = $this->jkel;
        $keahlian  = $this->keahlian;
        return view('Instruktur.index', compact("title", "data","jkel", "agama", "keahlian"));
    }
    public function tambah(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama_instruktur' => 'required', // Tambahkan aturan unik di sini
            'email' => 'required|unique:instruktur',
            'no_telp' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'j_kel' => 'required',
            'pendidikan_terakhir' => 'required',
            'keahlian' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'keahlian' => 'required',
            'foto_ktp' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'portofolio' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return   back()->withErrors($validator)->withInput();
        }
    
        try {
            $fileKtp = "";
            if($req->foto_ktp != null){
            $fileKtp = time() . '.' . $req->file('foto_ktp')->getClientOriginalExtension();
    
            $req->file('foto_ktp')->move(public_path('/foto_ktp_instruktur'), $fileKtp);
            }
            $filePorto = "";
            if($req->portofolio != null){
            $filePorto = time() . '.' . $req->file('portofolio')->getClientOriginalExtension();
            $req->file('portofolio')->move(public_path('/portofolio_instruktur'), $filePorto);
            }
            DB::beginTransaction();
    
            $data = [
                "nama_instruktur" => $req->nama_instruktur    ,
                "email" => $req->email,
                "no_telp" => $req->no_telp,
                'agama' => $req->agama,
                'pekerjaan' => $req->pekerjaan,
                'bidang_keahlian' => $req->keahlian,
                'j_kel' => $req->j_kel,
                'pendidikan_terakhir' => $req->pendidikan_terakhir,
                'tmp_lahir' => $req->tmp_lahir,
                'tgl_lahir' => $req->tgl_lahir,
                'alamat' => $req->alamat,
                "foto_ktp" => $fileKtp,
                "portofolio" => $filePorto,
            ];

            Instruktur::create($data);
    
            DB::commit();
            Alert::success('Success', 'Berhasil Tambah Data');
            return back();
        } catch (QueryException  $e) {
            DB::rollBack();
            dd($e->getMessage());
            // Hapus file foto jika ada
            $filePathKTP = public_path('/foto_ktp_instruktur/' . $fileKtp);
            if (file_exists($filePathKTP)) {
                @unlink($filePathKTP);
            }

            $filePathPorto = public_path('/portofolio_instruktur/' . $filePorto);
            if (file_exists($filePathPorto)) {
                @unlink($filePathPorto);
            }
    
            return back();
        }
    }  
    
    public function delete($id) {
        
        $instruktur = Instruktur::findOrFail($id);
       
        $filePathKTP = public_path('/foto_ktp_instruktur/' . $instruktur->foto_ktp);
        if (file_exists($filePathKTP)) {
            @unlink($filePathKTP);
        }

        $filePathPorto = public_path('/portofolio_instruktur/' . $instruktur->portofolio);
        if (file_exists($filePathPorto)) {
            @unlink($filePathPorto);
        }
        $instruktur->delete();
        Alert::success('Success', 'Berhasil hapus Data');
        return redirect()->back();
    }
    public function edit($id) {
        $data = Instruktur::findOrFail($id);
        $title="Edit Instruktur";
        $agama = $this->agama;
        $jkel = $this->jkel;
        $keahlian  = $this->keahlian;
        return view("Instruktur.edit_instruktur",compact('data','title', "jkel","agama", "keahlian"));
    }
    public function update(Request $req, $id){
        $data = Instruktur::findOrFail($id);
        $validator = Validator::make($req->all(),  [
            'nama_peserta' => 'required', // Tambahkan aturan unik di sini
            'email' => 'required|unique:instruktur',
            'no_telp' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'j_kel' => 'required',
            'pendidikan_terakhir' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'keahlian' => 'required',
            'foto_ktp' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'portofolio' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        try{
            $fileKTP = "";
            if( $req->foto_ktp != null){
                $oldPath = public_path('foto_ktp_instruktur/' . $req->foto_ktp);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
                $fileKTP = time() . '.' . $req->file('foto_ktp')->getClientOriginalExtension();
                $req->file('foto_ktp')->move(public_path('/foto_ktp_instruktur'), $fileKTP); 
            }else{
                $fileKTP = $req->old_file_ktp;
            }

            $filePorto = "";
            if( $req->portofolio != null){
                $oldPath = public_path('portofolio_instruktur/' . $req->portofolio);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
                $filePorto = time() . '.' . $req->file('portofolio')->getClientOriginalExtension();
                $req->file('portofolio')->move(public_path('/portofolio_instruktur'), $filePorto); 
            }else{
                $filePorto = $req->old_file_porto;
            }
           
            $data->update([
                "nama_peserta" => $req->nama_peserta    ,
                "email" => $req->email,
                "no_telp" => $req->no_telp,
                'agama' => $req->agama,
                'pekerjaan' => $req->pekerjaan,
                'keahlian' => $req->keahlian,
                'j_kel' => $req->j_kel,
                'pendidikan_terakhir' => $req->pendidikan_terakhir,
                'tmp_lahir' => $req->tmp_lahir,
                'tgl_lahir' => $req->tgl_lahir,
                'alamat' => $req->alamat,
                "foto_ktp" => $fileKTP,
                "portofolio" => $filePorto,
            ]);
           
            if($data){
                return redirect()->route("Peserta.index");
            }else{
                return redirect()->back()->withInput();
            } 
       
        }catch(QueryException $x){
            if($fileKTP == $req->old_file_ktp) {
                $filePathKTP = public_path('/foto_ktp_instruktur/' . $fileKTP);
                if (file_exists($filePathKTP)) {
                    @unlink($filePathKTP);
                }
            }
            
            if($filePorto == $req->old_file_porto){
                $filePathPorto = public_path('/foto_ktp_peserta/' . $filePorto);
                if (file_exists($filePathPorto)) {
                    unlink($filePathPorto);
                }
            }
           
    
            return back();
        }
    }
}
