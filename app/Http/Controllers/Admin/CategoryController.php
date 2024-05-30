<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index()
    {
        $title = "Data Kategori";
        $data = Category::all();
        return view('category.index', compact('title', 'data'));
    }

    public function create()
    {
        $title = "Tambah Kategori";
        return view('category.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $messages = implode('<br>', $messages);
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $request->merge(['slug' => Str::slug($request->name)]);
        Category::create($request->all());

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        $title = "Edit Kategori";
        return view('category.edit', compact('title', 'category'));
    }

    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $messages = implode('<br>', $messages);
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $request->merge(['slug' => Str::slug($request->name)]);
        $category->update($request->all());

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('category.index');
    }

    public function show(Category $category)
    {
        $title = "Detail Kategori";
        return view('category.show', compact('title', 'category'));
    }
}
