<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MbkmUser;
use App\Models\Timeline;
use App\Models\User;
use App\Notifications\StatusPendaftaranMbkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MbkmUserController extends Controller
{
    public function index()
    {
        $title = 'Data Mahasiswa MBKM';
        $data = Timeline::where('jenis', 'mbkm')->latest()->get();
        return view('admin.mbkm-user.index', compact('data', 'title'));
    }

    public function showUsers(Timeline $timeline)
    {
        $title = 'Detail Mahasiswa MBKM';
        $data = MbkmUser::where('timeline_id', $timeline->id)->get();
        return view('admin.mbkm-user.show', compact('data', 'title'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'prodi_id' => 'required',
            'nim' => 'required|unique:mbkm_users',
            'semester' => 'required|numeric|min:1|max:8',
            'golongan' => 'required|max:1',
            'tahun_masuk' => 'required|numeric|min:2010|max:'.(date('Y')),
            'no_hp' => 'required|numeric|max:15',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'khs' => 'required|mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        MbkmUser::where('user_id', auth()->user()->id)->first()->update([
            'prodi_id' => $request->prodi_id,
            'nim' => $request->nim,
            'semester' => $request->semester,
            'golongan' => $request->golongan,
            'tahun_masuk' => $request->tahun_masuk,
            'no_hp' => $request->no_hp,
            'photo' => $request->file('photo')->store('images/mbkm-user', 'public'),
            'khs' => $request->file('khs')->store('pdffile/mbkm-user', 'public'),
        ]);

        // remove permission fill-profile from role mahasiswa-mbkm
        $user = User::find(auth()->user()->id);
        $user->revokePermissionTo('fill-profile');

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->route('mbkmuser.index');
    }

    public function destroy(MbkmUser $mbkmUser)
    {
        User::destroy($mbkmUser->user_id);
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('mbkmuser.index');
    }

    public function notifyPendaftaran(Request $request, MbkmUser $mbkmUser)
    {
        $user = User::find($mbkmUser->user_id);
        $user->notify(new StatusPendaftaranMbkm($request->status));

        $mbkmUser->update([
            'status_pendaftaran' => $request->status,
        ]);

        if ($request->status == 'gagal') {
            $user->removeRole('mahasiswa-mbkm');
        } else {
            $user->assignRole('mahasiswa-mbkm');
        }

        Alert::success('Berhasil', 'Notifikasi berhasil dikirim');
        return redirect()->back();
    }
}
