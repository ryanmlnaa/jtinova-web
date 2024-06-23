<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function index(Request $request)
    {
        $title = "Data Portofolio";
        $data = Portofolio::with('category')->get();

        $kat = $this->kategori;
        return view('admin.portofolio.index', compact("title", "data", "kat",));
    }

    public function create()
    {
        $categories = Category::all();
        $title = 'Tambah Portofolio';
        return view('admin.portofolio.create', compact('categories', 'title'));
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'foto.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required|exists:categories,id',
            'klien' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }

        $data = Portofolio::create([
            'slug' => Str::slug($req->judul),
            'judul' => $req->judul,
            'category_id' => $req->kategori,
            'deskripsi' => $req->deskripsi,
            'klien' => $req->klien,
            'start_date' => $req->start_date,
            'end_date' => $req->end_date,
        ]);

        if ($req->hasFile('foto')) {
            $index = 0;
            foreach ($req->file('foto') as $item) {
                PortfolioImage::create([
                    'portfolio_id' => $data->id,
                    'image_url' => $item->store("images/portofolio", "public"),
                    'is_primary' => $index === 0 ? "1" : "0"
                ]);
                $index++;
            }
        }

        Alert::success('Success', 'Berhasil Tambah Data');
        return redirect()->route('portofolio.index');
    }


    public function destroy($id)
    {
        $data = Portofolio::findOrFail($id);

        // Hapus file terkait
        $images = $data->images;
        foreach ($images as $image) {
            Storage::disk('public')->delete($image->image_url);
            $image->delete();
        }

        $data->delete();

        Alert::success('Success', 'Berhasil hapus Data');
        return redirect()->back();
    }

    public function edit($id)
    {
        $data = Portofolio::with('images')->findOrFail($id);
        $title = "Edit Portofolio";
        $categories = Category::all();
        return view("admin.portofolio.edit", compact('data', 'title', 'categories'));
    }
    public function update(Request $req, $pegawai)
    {
        $validator = Validator::make($req->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required|exists:categories,id',
            'klien' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }

        $data = Portofolio::findOrFail($pegawai);
        $data->update([
            'slug' => Str::slug($req->judul),
            'judul' => $req->judul,
            'category_id' => $req->kategori,
            'deskripsi' => $req->deskripsi,
            'klien' => $req->klien,
            'start_date' => $req->start_date,
            'end_date' => $req->end_date,
        ]);

        if ($req->hasFile('foto')) {
            $index = 0;
            foreach ($req->file('foto') as $item) {
                PortfolioImage::create([
                    'portfolio_id' => $data->id,
                    'image_url' => $item->store("images/portofolio", "public"),
                    'is_primary' => $index === 0 ? "1" : "0"
                ]);

                $index++;
            }
        }

        Alert::success('Success', 'Berhasil Update Data');
        return redirect()->route('portofolio.index');   
    }

    public function deleteImage(Request $req)
    {

        $data = PortfolioImage::findOrFail($req->id);
        Storage::disk('public')->delete($data->image_url);
        $data->delete();
        return response()->json(['message' => 'Berhasil hapus gambar', 'status' => 'success']);
    }
}
