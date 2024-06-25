<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstrukturUser;
use App\Models\Pelatihan;
use App\Models\Timeline;
use App\Models\User;
use App\Notifications\StatusPendaftaranInstruktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class InstrukturUserController extends Controller
{
    public function index()
    {
        $title = 'Data Mahasiswa MBKM';
        $data = Timeline::where('jenis', 'instruktur')->latest()->get();
        return view('admin.instruktur-user.index', compact("title", "data"));
    }

    public function showUsers(Timeline $timeline)
    {
        $title = 'Detail Mahasiswa MBKM';
        $data = InstrukturUser::where('timeline_id', $timeline->id)->get();
        $pelatihan = Pelatihan::get(['id', 'nama']);
        return view('admin.instruktur-user.show', compact('data', 'title', 'pelatihan'));
    }

    public function notifyPendaftaran(Request $request, InstrukturUser $instrukturUser)
    {
        $user = User::find($instrukturUser->user_id);
        $pelatihan = Pelatihan::find($request->pelatihan_id)->nama;
        if ($request->kirim_notif == '1'){
            $user->notify(new StatusPendaftaranInstruktur($request->status, $pelatihan));
        }

        $instrukturUser->update([
            'status_pendaftaran' => $request->status,
            'pelatihan_id' => $request->pelatihan_id ?? null,
        ]);

        if ($request->status == 'gagal') {
            $user->removeRole('instruktur');
        } else {
            $user->assignRole('instruktur');
        }

        Alert::success('Berhasil', 'Notifikasi berhasil dikirim');
        return redirect()->back();
    }

    public function destroy(InstrukturUser $instrukturUser)
    {
        Storage::disk('public')->delete($instrukturUser->foto);
        Storage::disk('public')->delete($instrukturUser->cv);
        User::where('id', $instrukturUser->user_id)->delete();
        return redirect()->route('instruktur.index');
    }
}
