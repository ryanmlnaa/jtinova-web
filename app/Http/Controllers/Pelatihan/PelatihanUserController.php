<?php

namespace App\Http\Controllers\Pelatihan;

use App\Http\Controllers\Controller;
use App\Models\PelatihanTeam;
use App\Models\PelatihanUser;
use App\Models\Transactions;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PelatihanUserController extends Controller
{
    public function update(Request $request, PelatihanUser $pelatihanUser)
    {
        if($pelatihanUser->pelatihan_id != null || isset($pelatihanUser->pelatihan_id)){
            $request['pelatihan_id'] = $pelatihanUser->pelatihan_id;
        }

        $validator = Validator::make($request->all(), [
            'pelatihan_id' => 'required|exists:pelatihan,id',
            'no_hp' => 'required|numeric|digits_between:10,15',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'pendidikan_terakhir' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // if request is kelompok, then validate nama and email
        if($request->skema == "kelompok"){
            $validator = Validator::make($request->all(), [
                'nama.*' => 'required|string|max:255',
                'email.*' => 'required|email',
            ]);
        }

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $messages = implode('<br>', $messages);
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // if kelompok
        if($request->skema == "kelompok"){
            $count = (count(array_filter($request->nama)));
            $team_id = PelatihanTeam::create([
                'nama' => 'Tim ' . Str::random(7),
                'jumlah_anggota' => $count + 1,
            ])->id;

            for($i = 0; $i < $count; $i++){
                $user = User::where('email', $request->email[$i])->first();
                if(!$user){
                    $user = User::create([
                        'name' => $request->nama[$i],
                        'email' => $request->email[$i],
                        'password' => Hash::make("password"),
                    ]);
                }

                $user->assignRole('user-pelatihan');
                $user->givePermissionTo('fill-profile');
                $user->givePermissionTo('pending');

                PelatihanUser::create([
                    'user_id' => $user->id,
                    'pelatihan_team_id' => $team_id,
                    'pelatihan_id' => $request->pelatihan_id,
                ]);
            }

            $pelatihanUser->update([
                'pelatihan_team_id' => $team_id,
            ]);
        }

        $pelatihanUser->update([
            'pelatihan_id' => $request->pelatihan_id,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'pekerjaan' => $request->pekerjaan,
            'foto' => $request->file('foto')->store('images/pelatihan-user', 'public'),
        ]);

        $user = User::find(auth()->user()->id);
        $user->revokePermissionTo('fill-profile');
        $user->givePermissionTo('bayar');

        if($user->hasPermissionTo('pending')){
            $user->revokePermissionTo('bayar');
        }

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('dashboard');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'skema' => 'required|in:individu,kelompok',
            'pelatihan_id' => 'required|exists:pelatihan,id',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $messages = implode('<br>', $messages);
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pelatihanUser = PelatihanUser::create([
            'user_id' => auth()->user()->id,
            'pelatihan_id' => $request->pelatihan_id,
        ]);

        Transactions::create([
            'invoice' => 'INV-' . Carbon::now()->getTimestamp() * rand(1, 9),
            'status' => 'pending',
            'payment_method' => 'transfer',
            'pelatihan_user_id' => $pelatihanUser->id,
        ]);

        auth()->user()->givePermissionTo('pending');

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('dashboard');
    }
}
