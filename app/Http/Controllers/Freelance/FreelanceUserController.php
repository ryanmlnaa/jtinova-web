<?php

namespace App\Http\Controllers\Freelance;

use App\Http\Controllers\Controller;
use App\Models\FreelanceUser;
use App\Models\Timeline;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class FreelanceUserController extends Controller
{
    public function formFreelance()
    {
        $title = 'Formulir Pendaftaran Freelance';
        return view('guest.freelance.form-biodata', compact('title'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_hp' => 'required|string|max:15|regex:/^([0-9\s\-\+\(\)]*)$/',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'pendidikan_terakhir' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'portofolio' => 'required|string|max:255',
            'cv' => 'required|mimes:pdf|max:2048',
            'linkedin' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $messages = implode('<br>', $messages);
            Alert::error($messages)->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (!auth()->check()) {
            if (!User::where('email', $request->email)->exists()) {
                $newUser = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);

                $newUser->sendEmailVerificationNotification();
            }

            $checkLogin = auth()->attempt(['email' => $request->email, 'password' => $request->password]);
            if (!$checkLogin) {
                Alert::error('Gagal', 'Email atau password salah');
                return redirect()->back();
            }
        }

        $timelineId = Timeline::where('status', 1)->where('jenis', 'freelance')->first()->id;
        FreelanceUser::create([
            'user_id' => auth()->user()->id,
            'timeline_id' => $timelineId,
        ]);

        User::find(auth()->user()->id)->update([
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'pekerjaan' => $request->pekerjaan,
            'foto' => $request->file('foto')->store('images/instruktur-user', 'public'),
            'portofolio' => $request->portofolio,
            'cv' => $request->file('cv')->store('pdffile/instruktur-user', 'public'),
            'linkedin' => $request->linkedin,
        ]);

        auth()->user()->assignRole('freelance');

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->back();
    }
}
