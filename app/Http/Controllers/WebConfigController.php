<?php

namespace App\Http\Controllers;

use App\Models\WebConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class WebConfigController extends Controller
{
    public function index()
    {
        $title = "Konfigurasi Website";
        $data = WebConfig::first();

        return view('atur_web.pemgaturan_web', compact('title', 'data'));
    }
    public function simpanwebconfig(Request $request) 
    {
        $dataWebConfig = WebConfig::first();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'alias' => 'required|string|max:50',
            'brand_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'required|string',
            'video_preview' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
            return redirect()->route('webconfig')->withErrors($validator)->withInput();
        }

        if ($request->hasFile('brand_logo')) {
            $fileName = '/images/brand-logo-'.time().'.'.$request->file('brand_logo')->getClientOriginalExtension();
            $request->file('brand_logo')->move(public_path().'/images', $fileName);

            if ($dataWebConfig->brand_logo) {
                $oldImage = public_path().'/images/brand-logo-'.$dataWebConfig->brand_logo;
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }
        } else {
            $fileName = $dataWebConfig->brand_logo;
        }

        if ($request->hasFile('video_preview')) {
            $fileNameVideo = '/images-video-'.time().'.'.$request->file('video_preview')->getClientOriginalExtension();
            $request->file('video_preview')->move(public_path().'/images', $fileNameVideo);

            if ($dataWebConfig->video_preview) {
                $oldImage = public_path().'/images/video-'.$dataWebConfig->video_preview;
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }
        } else {
            $fileNameVideo = $dataWebConfig->video_preview;
        }

        $dataWebConfig->update([
            'name' => $request->name,
            'alias' => $request->alias,
            'brand_logo' => $fileName,
            'video' => $request->video,
            'video_preview' => $fileNameVideo,
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
        return back();
    }
}
