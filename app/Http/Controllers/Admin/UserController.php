<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $title = "Data User";
        $data = User::latest()->get();
        return view('admin.user.index', compact("title", "data"));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return redirect()->route('user.index')->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['password'] = Hash::make('password');
        User::create($data);
        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('user.index');
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages[0])->flash();
            return redirect()->route('user.index')->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $user->update($data);
        Alert::success('Berhasil', 'Data berhasil diubah');
        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('user.index');
    }
}
