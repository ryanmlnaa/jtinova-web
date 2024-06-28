<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $data = Role::all();
        return view('admin.role.index', compact('data'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name',
            'permissions' => 'required|array',
        ]);

        if($validator->fails()){
            $messages = $validator->errors()->all();
            $message = implode('<br>', $messages);
            Alert::error($message)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);
        return redirect()->route('role.index')->with('success', 'Role created successfully');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('admin.role.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,'.$id,
            'permissions' => 'required|array',
        ]);

        if($validator->fails()){
            $messages = $validator->errors()->all();
            $message = implode('<br>', $messages);
            Alert::error($message)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $role = Role::find($id);
        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions);
        return redirect()->route('role.index')->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Role deleted successfully');
    }
}
