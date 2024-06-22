<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PelatihanUser;
use App\Models\Transactions;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    public function index()
    {
        $title = 'Transactions';
        $data = Transactions::all();

        return view('admin.transactions.index', compact('data', 'title'));
    }

    public function update(Request $request, $id)
    {
        $data = Transactions::find($id);
        $data->status = 'success';
        $data->save();

        Alert::success("Success", "Berhasil Menambahkan Data");
        return redirect()->route('transaction.index');
    }
}
