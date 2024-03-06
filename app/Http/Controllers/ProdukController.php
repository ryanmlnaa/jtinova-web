<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request){

        $data=Produk::paginate(20);
        $title="Data Produk";
        return view("Produk.index",compact('data','title'));

        
    }
}
