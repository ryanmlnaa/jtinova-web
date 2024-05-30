<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstrukturUser;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class InstrukturUserController extends Controller
{
    public function index()
    {
        $title = "Data Instruktur";
        $data = InstrukturUser::all();
        return view('admin.instruktur-user.index', compact("title", "data"));
    }

    public function destroy(InstrukturUser $instrukturUser)
    {
        Storage::disk('public')->delete($instrukturUser->foto);
        Storage::disk('public')->delete($instrukturUser->cv);
        User::where('id', $instrukturUser->user_id)->delete();
        return redirect()->route('instruktur.index');
    }
}
