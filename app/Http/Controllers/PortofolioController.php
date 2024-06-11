<?php

namespace App\Http\Controllers;

use App\Models\PortfolioImage;
use App\Models\Portofolio;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    private $kategori = ["Desktop", "Website", "Mobile"];
    public function index(Request $request)  {
        $title = "Data Portofolio";
        $data = Portofolio::with('category')->get();
        $portfolio_images = PortfolioImage::getdata();

        $kat = $this->kategori;
        return view('Portofolio.index', compact("title", "data", "kat", "portfolio_images"));
    }

    public function create()
    {
        $categories = Category::all();
        $title = 'Tambah Portofolio';
        return view('portofolio.create', compact('categories', 'title'));
    }

    public function tambah(Request $req)
    {
        // Log the request method for debugging
        Log::info('Request Method: ' . $req->method());

        $validator = Validator::make($req->all(), [
            'judul' => 'required|unique:portofolio',
            'deskripsi' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'foto.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required|exists:categories,id',
        ]);

        // dd($req->file('foto'));
        
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }

        if ($req->start_date > $req->end_date) {
            Alert::error("Tanggal mulai harus lebih dulu")->flash();
            return back()->withError()->withInput();
        }

        try {
            
           

            DB::beginTransaction();

            $data = [
                "judul" => $req->judul,
                "slug" => Str::slug($req->judul),
                "deskripsi" => $req->deskripsi,
                "klien" => $req->klien,
                "kategori" => $req->kategori,
                "start_date"  => $req->start_date,
                "end_date"  => $req->end_date,
                "category_id" => $req->kategori,
            ];

            

            $portofolio = Portofolio::create($data)->id;
            $index = 0;
            foreach($req->file('foto') as $item)
            {
                $fileName = $item->store("images/portofolio", "public");
                $isPrimary = $index === 0 ? "1" : "0";
                $images = [
                    'portfolio_id' => $portofolio,
                    'image_url' => $fileName,
                    'is_primary' => $isPrimary
                ];
                PortfolioImage::create($images);
                $index++;
            }
            

            DB::commit();
            Alert::success('Success Title', 'Berhasil Tambah Data');
            return redirect()->route('portofolio.index');
        } catch (QueryException $e) {
            DB::rollBack();
            
        if ($req->hasFile("foto")) {
            Storage::disk('public')->delete($req->foto);
        }
            dd('gagal' . $e->getMessage());
            return back();
        }

        Alert::success('Success Title', 'Berhasil Tambah Data');
        return redirect()->route('portofolio.index');
    }


    public function delete($id)
    {

        $data = Portofolio::findOrFail($id);
            Storage::disk('public')->delete($data->foto);
        
        $data->delete();
        // return response()->json(['message' => 'Data berhasil dihapus'], 200);
        Alert::success('Success', 'Berhasil hapus Data');
        return redirect()->back();
    }
    public function edit($id)
    {
        $data = Portofolio::with('images')->findOrFail($id);
        $title = "Edit Portofolio";
        $kat = $this->kategori;
        return view("Portofolio.edit_portofolio", compact('data', 'title', 'kat'));
    }
    public function update(Request $req, $pegawai)
    {
        $data = Portofolio::findOrFail($pegawai);
        $validator = Validator::make($req->all(), [
            'judul' => 'required', // Tambahkan aturan unik di sini
            'deskripsi' => 'required',
            'klien' => 'required',
            'kategori' => 'required',
            'start_date' => 'required',
            'foto.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'end_date' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        if ($req->start_date > $req->end_date) {
            Alert::error("Tanggal mulai harus lebih dulu")->flash();
            return back()->withInput();
        }
        try {

          

            $data->update([
                "judul" => $req->judul,
                "deskripsi" => $req->deskripsi,
                "klien" => $req->klien,
                "kategori" => $req->kategori,
                "start_date"  => $req->start_date,
                "end_date"  => $req->end_date,
            ]);

           
            $index = 0;
            foreach($req->file('foto') as $item)
            {
                $fileName = $item->store("images/portofolio", "public");
                $isPrimary = $index === 0 ? "1" : "0";
                $images = [
                    'portfolio_id' => $pegawai,
                    'image_url' => $fileName,
                    'is_primary' => $isPrimary
                ];
                PortfolioImage::create($images);
                $index++;
            }

            if ($data) {
                return redirect()->route("portofolio.index");
            } else {
                return redirect()->back()->withInput();
            }
        } catch (QueryException $x) {


            // Hapus file foto jika ada
            if ($fileName == $req->old_file) {
                Storage::disk('public')->delete($req->foto);
            }


            return back();
        }
    }
}
