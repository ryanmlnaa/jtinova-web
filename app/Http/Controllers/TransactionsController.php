<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionsController extends Controller
{
    public function buktiPembayaran(Request $req)
    {
       
        
        $validator = Validator::make($req->all(), [
            'bukti_pembayaran' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $messages = implode('<br>', $messages);
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = [
            
            "invoice" => Str::random(20),
            "status" => "pending",
            "payment_method" => "transfer",
        ];
        $pathSegments = $req->segments();
        if($pathSegments[0] == "transaction-pendampingan"){
            $data["pendampingan_user_id"] = auth()->user()->pendampinganUser->id;
        }
        if($pathSegments[0] == "transaction-pelatihan"){
            $data["pelatihan_user_id"] = auth()->user()->pelatihanUser->id;
        }
        if ($req->hasFile("bukti_pembayaran")) {
            $data["payment_proof"] = $req->file("bukti_pembayaran")->store("images/bukti_pembayaran", "public");
        }
        Transactions::create($data);   
        $user = User::find(auth()->user()->id);
        $user->revokePermissionTo('bayar');

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('dashboard');
    }
}
