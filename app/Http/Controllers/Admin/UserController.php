<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'edit']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $title = "Data User";
        $data = User::latest()->get();
        return view('admin.user.index', compact("title", "data"));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.user.edit', compact("user", "roles", "permissions"));
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|string|max:1',
            'pendidikan_terakhir' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'portofolio' => 'nullable|string|max:255',
            'cv' => 'nullable|mimes:pdf|max:2048',
            'linkedin' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role.*' => 'required|exists:roles,name',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $messages = implode('<br>', $messages);
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cek apakah ada file foto yang diupload
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('images/foto', 'public');
        } else {
            $foto = auth()->user()->foto;
        }

        // Cek apakah ada file cv yang diupload
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv')->store('pdffile/cv', 'public');
        } else {
            $cv = auth()->user()->cv;
        }
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'pekerjaan' => $request->pekerjaan,
            'portofolio' => $request->portofolio,
            'cv' => $cv,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'foto' => $foto,
        ]);

        $user->syncRoles($request->role);
        $user->syncPermissions($request->permission);

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
