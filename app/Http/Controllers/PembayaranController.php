<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Peserta;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $title = "Data Pembayaran";
        $data = Pembayaran::getData();
        $peserta = Peserta::getData();
        return view('Pembayaran.index', compact("title", "data", 'peserta'));
    }
    public function tambah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'peserta' => 'required', // Tambahkan aturan unik di sini
            'nominal' => 'required',
            'no_rekening' => 'required',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
    
        try {
            $fileName = "";
            if($request->file("bukti_pembayaran") != null){
            $fileName = time() . '.' . $request->file('bukti_pembayaran')->getClientOriginalExtension();
    
            $request->file('bukti_pembayaran')->move(public_path('/bukti_pembayaran'), $fileName);
            }
            DB::beginTransaction();
    
            $data = [
                "id_peserta" => $request->peserta,
                "nominal" => $request->nominal,
                "no_rekening" => $request->no_rekening,
                "bukti_pembayaran" => $fileName,
                "status" => "belum",
            ];

            Pembayaran::create($data);
    
            DB::commit();
            Alert::success('Success', 'Berhasil Tambah Data');
            return back();
        } catch (QueryException $e) {
            DB::rollBack();
            dd($e);
    
            // Tangani khusus kesalahan unik pada kolom 'nip'
            // if ($e->errorInfo[1] == 1062) {
            //     Alert::error('Gagal', 'NIP sudah ada. Masukkan NIP yang berbeda.')->flash();
            // } else {
            //     Alert::error('Gagal', $e->getMessage())->flash();
            // }
    
            // Hapus file foto jika ada
            $filePath = public_path('/bukti_pembayaran/' . $fileName);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
    
            return back();
        }
    }  
    
    public function delete($id) {
        
        $data = Pembayaran::findOrFail($id);
        // if (!$pegawai) {
        //     return response()->json(['message' => 'Data tidak ditemukan'], 404);
        // }
        $file=(public_path('/bukti_pembayaran/'.$data->bukti_pembayaran));
        if (file_exists($file)) {
        @unlink($file);
        }
        $data->delete();
        // return response()->json(['message' => 'Data berhasil dihapus'], 200);
        Alert::success('Success', 'Berhasil hapus Data');
        return redirect()->back();
    }
    public function edit($id) 
    {
        $data = Pembayaran::findOrFail($id);
        $peserta = Peserta::getData();
        $title="Edit Pembayaran";
        return view("pembayaran.edit_pembayaran",compact('data','title', 'peserta'));
    }
    public function update(Request $req, $id){
        $data = Pembayaran::findOrFail($id);
        $validator = Validator::make($req->all(), [
            'peserta' => 'required', // Tambahkan aturan unik di sini
            'nominal' => 'required',
            'no_rekening' => 'required',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        try{
            $fileName = "";
            if( $req->bukti_pembayaran != null){
                $oldPath = public_path('bukti_pembayaran/' . $req->bukti_pembayaran);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
                $fileName = time() . '.' . $req->file('bukti_pembayaran')->getClientOriginalExtension();
                $req->file('bukti_pembayaran')->move(public_path('/bukti_pembayaran'), $fileName); 
            }else{
                $fileName = $req->old_file;
            }
           
            $data->update([
                "id_peserta" => $req->peserta,
                "nominal" => $req->nominal,
                "no_rekening" => $req->no_rekening,
                "bukti_pembayaran" => $fileName,
                "status" => $req->status,
            ]);
           
            if($data){
                return redirect()->route("Pembayaran.index");
            }else{
                return redirect()->back()->withInput();
            } 
       
        }catch(QueryException $x){
            
    
            // Hapus file foto jika ada
            if($fileName == $req->old_file){
                $filePath = public_path('/bukti_pembayaran/' . $fileName);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
           
    
            return back();
        }
    }
}
