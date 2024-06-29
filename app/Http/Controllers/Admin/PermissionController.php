<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $data = Permission::all();
        return view('admin.permission.index', compact('data'));
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions,name',
        ]);

        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Permission::create(['name' => $request->name]);
        return redirect()->route('permission.index')->with('success', 'Permission created successfully');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.permission.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions,name,'.$id,
        ]);

        if($validator->fails()){
            $messages = $validator->errors()->all();
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $permission = Permission::find($id);
        $permission->update(['name' => $request->name]);
        return redirect()->route('permission.index')->with('success', 'Permission updated successfully');
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->route('permission.index')->with('success', 'Permission deleted successfully');
    }
}
