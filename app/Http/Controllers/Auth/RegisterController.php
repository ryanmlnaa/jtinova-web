<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\InstrukturUser;
use App\Models\MbkmUser;
use App\Models\Pelatihan;
use App\Models\PelatihanTeam;
use App\Models\PelatihanUser;
use App\Models\PendampinganUser;
use App\Models\SkemaPendampingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'requrlname' => ['required', 'string', 'max:255'],
            'kode' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->givePermissionTo('fill-profile');

        if ($data['requrlname'] == 'register.mbkm') {
            $user->assignRole('mahasiswa-mbkm');
            MbkmUser::create(['user_id' => $user->id]);

        } else if ($data['requrlname'] == 'register.pendampingan'){
            $user->assignRole('user-pendampingan');
            $skemaPendampingan = SkemaPendampingan::where('kode', $data['kode'])->where('status', 'Aktif')->first();
            if ($skemaPendampingan == null) {
                PendampinganUser::create(['user_id' => $user->id]);
            } else {
                PendampinganUser::create(['user_id' => $user->id, 'skema_pendampingan_id' => $skemaPendampingan->id]);
            }

        } else if ($data['requrlname'] == 'register.pelatihan'){
            $user->assignRole('user-pelatihan');
            $pelatihan = Pelatihan::where('kode', $data['kode'])->where('status', 'Aktif')->first();
            if ($pelatihan == null) {
                $teamId = PelatihanTeam::create();
                PelatihanUser::create(['user_id' => $user->id, 'pelatihan_team_id' => $teamId->id]);
            } else {
                $teamId = PelatihanTeam::create(['pelatihan_id' => $pelatihan->id]);
                PelatihanUser::create(['user_id' => $user->id, 'pelatihan_team_id' => $teamId->id]);
            }

        } else if ($data['requrlname'] == 'register.instruktur'){
            $user->assignRole('instruktur');
            InstrukturUser::create(['user_id' => $user->id]);

        } else {
            $user->assignRole('user');
        }

        return $user;
    }
}
