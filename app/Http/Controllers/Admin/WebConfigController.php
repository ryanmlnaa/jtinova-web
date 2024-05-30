<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class WebConfigController extends Controller
{
    public function index()
    {
        $title = "Konfigurasi Website";
        $data = WebConfig::first();

        return view('admin.web-config.index', compact('title', 'data'));
    }

    public function update(Request $request) 
    {
        $dataWebConfig = WebConfig::first();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'alias' => 'required|string|max:50',
            'brand_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'required|string',
            'video_preview' => 'nullable|file|mimes:mp4|max:2048',
            'introduction' => 'required|string',
            'profil_link' => 'required|string',
            'map' => 'required|string',
            'location' => 'required|string',
            'open_hours' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'facebook' => 'required|string',
            'twitter' => 'nullable|string',
            'instagram' => 'required|string',
            'youtube' => 'required|string',
            'manager' => 'required|string|max:100',
            'nip' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            Alert::error($validator->errors()->first());
            return redirect()->route('webconfig.index')->withErrors($validator)->withInput();
        }
        
        if ($request->hasFile('brand_logo')) {
            Storage::disk('public')->delete($dataWebConfig->brand_logo);

            $dataWebConfig->update([
                'brand_logo' => $request->file('brand_logo')->store('images', 'public'),
            ]);
        }

        if ($request->hasFile('video_preview')) {
            Storage::disk('public')->delete($dataWebConfig->video_preview);

            $dataWebConfig->update([
                'video_preview' => $request->file('video_preview')->store('video', 'public'),
            ]);
        }

        $dataWebConfig->update([
            'name' => $request->name,
            'alias' => $request->alias,
            'video' => $request->video,
            'introduction' => $request->introduction,
            'profil_link' => $request->profil_link,
            'map' => $request->map,
            'location' => $request->location,
            'open_hours' => $request->open_hours,
            'email' => $request->email,
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'manager' => $request->manager,
            'nip' => $request->nip,
        ]);
        
        Alert::success('Ubah data', 'Berhasil Ubah Data');
        return redirect()->route('webconfig.index');
    }
}
