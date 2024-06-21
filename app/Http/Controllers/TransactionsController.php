<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionsController extends Controller
{
    public function buktiPembayaran(Request $req)
    {        
        $validator = Validator::make($req->all(), [
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $messages = implode('<br>', $messages);
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Transactions::create([
            "invoice" => 'INV-' . Carbon::now()->getTimestamp() * rand(1, 9),
            "status" => "pending",
            "payment_method" => "transfer",
            "pelatihan_user_id" => isset(auth()->user()->pelatihanUser->id) ? auth()->user()->pelatihanUser->id : null,
            "pendampingan_user_id" => isset(auth()->user()->pendampinganUser->id) ? auth()->user()->pendampinganUser->id : null,
            "payment_proof" => $req->file("bukti_pembayaran")->store("images/bukti_pembayaran", "public"),
        ]);   

        $user = User::find(auth()->user()->id);
        $user->revokePermissionTo('bayar');
        $user->givePermissionTo('pending');

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('dashboard');
    }
}
