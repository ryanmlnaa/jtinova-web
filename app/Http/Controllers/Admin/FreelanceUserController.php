<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FreelanceUser;
use App\Models\Timeline;
use App\Models\User;
use App\Notifications\StatusPendaftaranFreelance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class FreelanceUserController extends Controller
{
    public function index()
    {
        $title = 'Data Peserta Freelance';
        $data = Timeline::where('jenis', 'freelance')->latest()->get();
        return view('admin.freelance-user.index', compact('data', 'title'));
    }

    public function showUsers(Timeline $timeline)
    {
        $title = 'Detail Peserta Freelance';
        $data = FreelanceUser::where('timeline_id', $timeline->id)->get();
        return view('admin.freelance-user.show', compact('data', 'title'));
    }

    public function destroy(FreelanceUser $freelanceuser)
    {
        $user = User::find($freelanceuser->user_id);
        $user->removeRole('freelance');        
        $freelanceuser->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('freelanceuser.index');
    }

    public function notifyPendaftaran(Request $request, FreelanceUser $freelanceUser)
    {
        $user = User::find($freelanceUser->user_id);
        $user->notify(new StatusPendaftaranFreelance($request->status));

        $freelanceUser->update([
            'status_pendaftaran' => $request->status,
        ]);

        if ($request->status == 'gagal') {
            $user->removeRole('freelance');
        } else {
            $user->assignRole('freelance');
        }

        Alert::success('Berhasil', 'Notifikasi berhasil dikirim');
        return redirect()->back();
    }
}
