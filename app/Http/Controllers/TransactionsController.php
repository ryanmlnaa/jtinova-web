<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionsController extends Controller
{
    public function index($id)
    {
        $title = 'Bukti Pembayaran';
        return view('guest.form-bukti-bayar.index', compact('title'));
    }

    public function update(Request $req, $id)
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

        try {
            $decrypted = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            Alert::error($e->getMessage())->flash();
            return redirect()->back();
        }

        $transaction = Transactions::where('id', $decrypted)->first();

        if ($transaction->payment_proof) {
            Storage::disk('public')->delete($transaction->payment_proof);
        }

        $transaction->update([
            "status" => "pending",
            "payment_proof" => $req->file("bukti_pembayaran")->store("images/bukti_pembayaran", "public"),
        ]);

        Alert::success('Berhasil', 'Bukti pembayaran berhasil diunggah')->flash();
        return redirect()->route('dashboard');
    }
}
