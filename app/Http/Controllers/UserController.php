<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $title = "Data User";
        $data = User::getData();
        return view('user.index', compact("title", "data"));
    }
    public function tambah(Request $req){
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|same:confirm_password',
            'role' => 'required'
        ]);
        if($validator->fails()){
            $message = $validator->errors()->all();
            Alert::error($message[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        try{
            DB::beginTransaction();
            $data = [
                "name" => $req->name,
                "email" => $req->email,
                "password" => Hash::make($req->password),
                "role" => $req->role
            ];
            User::create($data);
            DB::commit();
            Alert::success('Success', "Berhasil menambahkan data");
            return back();
        }catch(QueryException $x){
            DB::rollBack();
            return back();
        }
    }
    public function edit($id){
        $title = "Edit User";
        $data = User::findOrFail($id);
        return view("User.edit_user", compact('data', 'title'));    
    }
    public function update($id, Request $req){
        $data = User::findOrFail($id);
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|same:confirm_password',
            'role' => 'required'
        ]);
        if($validator->fails()){
            $message = $validator->errors()->all();
            Alert::error($message[0])->flash();
            return back()->withErrors($validator)->withInput();
        }
        try{
            DB::beginTransaction();
            $data->update([
                "name" => $req->name,
                "email" => $req->email,
                "password" => Hash::make($req->password),
                "role" => $req->role
            ]);
            DB::commit();
            Alert::success("Success", "Berhasil mengubah data");
            return redirect()->route("User.index");
        }
        catch(QueryException $e){
            DB::rollBack();
            return back();
        }
    }
}
