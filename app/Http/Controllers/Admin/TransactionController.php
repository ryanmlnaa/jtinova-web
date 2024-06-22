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

        $pelatihan_team_id = $data->pelatihanUser->pelatihan_team_id;
        if ($pelatihan_team_id != null) {
            $userPelatihan = PelatihanUser::where('pelatihan_team_id', $pelatihan_team_id)->get();
            foreach ($userPelatihan as $user) {
                $user->user->revokePermissionTo('bayar');
                $user->user->revokePermissionTo('pending');
            }
        } else {
            $data->pelatihanUser->user->revokePermissionTo('bayar');
            $data->pelatihanUser->user->revokePermissionTo('pending');
        }

        Alert::success("Success", "Berhasil Menambahkan Data");
        return redirect()->route('transaction.index');
    }
}
