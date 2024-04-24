<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PortofolioController extends Controller
{
    private $kategori = ["Desktop", "Website", "Mobile"];
    public function index(Request $request)
    {
        $title = "Data Portofolio";
        $data = Portofolio::getData();
        $kat = $this->kategori;
        return view('Portofolio.index', compact("title", "data", "kat"));
    }
    public function tambah(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'judul' => 'required|unique:portofolio', // Tambahkan aturan unik di sini
            'deskripsi' => 'required',
            'klien' => 'required',
            'kategori' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        
        if($req->start_date > $req->end_date){
            Alert::error("Tanggal mulai harus lebih dulu")->flash();
            return back()->withError()->withInput();
        }
        try {
            $fileName = time() . '.' . $req->file('foto')->getClientOriginalExtension();
    
            $req->file('foto')->move(public_path('/foto_portofolio'), $fileName);
    
            DB::beginTransaction();
    
            $data = [
                "judul" => $req->judul,
                "deskripsi" => $req->deskripsi,
                "klien" => $req->klien, 
                "kategori"=> $req->kategori,
                "start_date"  => $req->start_date,
                "end_date"  => $req->end_date,
                "foto" => $fileName
            ];

            Portofolio::create($data);
    
            DB::commit();
            Alert::success('Success Title', 'Berhasil Tambah Data');
            return back();
        } catch (QueryException $e) {
            DB::rollBack();
    
            // Tangani khusus kesalahan unik pada kolom 'nip'
            // if ($e->errorInfo[1] == 1062) {
            //     Alert::error('Gagal', 'NIP sudah ada. Masukkan NIP yang berbeda.')->flash();
            // } else {
            //     Alert::error('Gagal', $e->getMessage())->flash();
            // }
    
            // Hapus file foto jika ada
            $filePath = public_path('/foto_portofolio/' . $fileName);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
    
            return back();
        }
    }  
    
    public function delete($id) {
        
        $data = Portofolio::findOrFail($id);
        $file=(public_path('/foto_portofolio/'.$data->foto));
        if (file_exists($file)) {
        @unlink($file);
        }
        $data->delete();
        // return response()->json(['message' => 'Data berhasil dihapus'], 200);
        Alert::success('Success', 'Berhasil hapus Data');
        return redirect()->back();
    }
    public function edit($id) {
        $data = Portofolio::findOrFail($id);
        $title="Edit Portofolio";
        $kat = $this->kategori;
        return view("Portofolio.edit_portofolio",compact('data','title', 'kat'));
    }
    public function update(Request $req, $pegawai){
        $data = Portofolio::findOrFail($pegawai);
        $validator = Validator::make($req->all(), [
            'judul' => 'required', // Tambahkan aturan unik di sini
            'deskripsi' => 'required',
            'klien' => 'required',
            'kategori' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        if($req->start_date > $req->end_date){
            Alert::error("Tanggal mulai harus lebih dulu")->flash();
            return back()->withInput();
        }
        try{
            $fileName = "";
            if( $req->foto != null){
                $oldPath = public_path('foto_portofolio/' . $req->old_file);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }

                $fileName = time() . '.' . $req->file('foto')->getClientOriginalExtension();
                $req->file('foto')->move(public_path('/foto_portofolio'), $fileName);

                
            }else{
                $fileName = $req->old_file;
            }
           
            $data->update([
                "judul" => $req->judul,
                "deskripsi" => $req->deskripsi,
                "klien" => $req->klien, 
                "kategori"=> $req->kategori,
                "start_date"  => $req->start_date,
                "end_date"  => $req->end_date,
                "foto" => $fileName
            ]);
           
            if($data){
                return redirect()->route("Portofolio.index");
            }else{
                return redirect()->back()->withInput();
            } 
       
        }catch(QueryException $x){
            
    
            // Hapus file foto jika ada
            if($fileName == $req->old_file){
                $filePath = public_path('/foto_portofolio/' . $fileName);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
           
    
            return back();
        }
    }
}
