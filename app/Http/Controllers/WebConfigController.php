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
        
        $title = "Halaman Web Config";
        $data = WebConfig::first();
     
        return view('atur_web.pemgaturan_web', compact('title', 'data'));
    }
    public function simpanwebconfig(Request $request) {
      
        if ($request->id == null) {
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'alias' => 'required',
            
            'video' => 'required',
            'video_preview'=>'required',
            'instagram'=>'required',
            'facebook'=>'required',
            'phone'=>'required',
            'map'=>'required',
            'location'=>'required',
            'youtube'=>'required',
            'open_hours'=>'required',
            'manager'=>'required',
            'nip'=>'required',
            'profile_link'=>'required',



            'brand_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();

            Alert::error($messages[0])->flash();
            return back()->withErrors($validator)->withInput();
        }


     


            $fileName = time().'.'.$request->file('brand_logo')->getClientOriginalExtension();
 
            $request->file('brand_logo')->move(public_path().'/brand_logo', $fileName);
            $fileNamee = time().'.'.$request->file('video_preview')->getClientOriginalExtension();
 
            $request->file('video_preview')->move(public_path().'/video', $fileName);
            $data=[
                "id"=>$request->id,
                "name"=>$request->name,
                "alias"=>$request->alias,
                "brand_logo"=>"$fileName",
                "video"=>$request->video,
                "video_preview"=>"$fileNamee",
                "introduction"=>$request->introduction,
                "profil_link"=>$request->profile_link,
                "map"=>$request->map,
                "location"=>$request->location,
                "open_hours"=>$request->open_hours,
                "email"=>$request->email,
                "phone"=>$request->phone,
                "facebook"=>$request->facebook,
                "twitter"=>$request->twitter,
                "instagram"=>$request->instagram,
                "youtube"=>$request->youtube,
                "manager"=>$request->manager,
                "nip"=>$request->nip,
            ];  
            WebConfig::create($data);
            Alert::success('Tambah ', 'Berhasil Tambah Data');
            return back();

        }else {
            if (($request->video_preview != null)&&($request->brand_logo != null)) {
                $validator = Validator::make($request->all(), [

                    'name' => 'required',
                    'alias' => 'required',
                    
                    'video' => 'required',
                    'video_preview'=>'required|mimes:mp4,avi,mov,wmv',
                    'instagram'=>'required',
                    'facebook'=>'required',
                    'phone'=>'required',
                    'map'=>'required',
                    'location'=>'required',
                    'youtube'=>'required',
                    'open_hours'=>'required',
                    'manager'=>'required',
                    'nip'=>'required',
                    'profile_link'=>'required',
        
        
        
                    'brand_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        
                ]);
            }elseif (($request->video_preview == null)&&($request->brand_logo != null)) {
                  $validator = Validator::make($request->all(), [

                    'name' => 'required',
                    'alias' => 'required',
                    
                    'video' => 'required',
                    // 'video_preview'=>'required|mimes:mp4,avi,mov,wmv',
                    'instagram'=>'required',
                    'facebook'=>'required',
                    'phone'=>'required',
                    'map'=>'required',
                    'location'=>'required',
                    'youtube'=>'required',
                    'open_hours'=>'required',
                    'manager'=>'required',
                    'nip'=>'required',
                    'profile_link'=>'required',
        
        
        
                    'brand_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        
                ]);
            }elseif (($request->video_preview != null)&&($request->brand_logo == null)) {
                $validator = Validator::make($request->all(), [

                    'name' => 'required',
                    'alias' => 'required',
                    
                    'video' => 'required',
                    'video_preview'=>'required|mimes:mp4,avi,mov,wmv',
                    'instagram'=>'required',
                    'facebook'=>'required',
                    'phone'=>'required',
                    'map'=>'required',
                    'location'=>'required',
                    'youtube'=>'required',
                    'open_hours'=>'required',
                    'manager'=>'required',
                    'nip'=>'required',
                    'profile_link'=>'required',
        
        
        
                    // 'brand_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        
                ]); 
            }elseif (($request->video_preview == null)&&($request->brand_logo == null)) {
                $validator = Validator::make($request->all(), [

                    'name' => 'required',
                    'alias' => 'required',
                    
                    'video' => 'required',
                    // 'video_preview'=>'required|mimes:mp4,avi,mov,wmv',
                    'instagram'=>'required',
                    'facebook'=>'required',
                    'phone'=>'required',
                    'map'=>'required',
                    'location'=>'required',
                    'youtube'=>'required',
                    'open_hours'=>'required',
                    'manager'=>'required',
                    'nip'=>'required',
                    'profile_link'=>'required',
        
        
        
                    // 'brand_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        
                ]);
            }
          
    
            if ($validator->fails()) {
                $messages = $validator->errors()->all();
    
                Alert::error($messages[0])->flash();
                return back()->withErrors($validator)->withInput();
            }
    
            $webcon=WebConfig::find($request->id);
            
            $fileNamee=$webcon->video_preview;
            $fileName=$webcon->brand_logo;
            if ($request->hasFile('brand_logo')) {
                // Hapus gambar profil lama jika ada
                if ($webcon->brand_logo) {

                    $filee=(public_path('/brand_logo/'.$webcon->brand_logo));
                    @unlink($filee);

                    
                }
                $fileName = time().'.'.$request->file('brand_logo')->getClientOriginalExtension();
 
                $request->file('brand_logo')->move(public_path().'/brand_logo', $fileName);
            }
            if ($request->hasFile('video_preview')) {
                // Hapus gambar profil lama jika ada
                if ($webcon->video_preview) {
                    $file=(public_path('video/'.$webcon->video_preview));
                    @unlink($file);
                }
                $fileNamee = time().'.'.$request->file('video_preview')->getClientOriginalExtension();
 
                $request->file('video_preview')->move(public_path().'/video/', $fileNamee);
            }



            $data=[
                "id"=>$request->id,
                "name"=>$request->name,
                "alias"=>$request->alias,
                "brand_logo"=>"$fileName",
                "video"=>$request->video,
                "video_preview"=>"$fileNamee",
                "introduction"=>$request->introduction,
                "profil_link"=>$request->profile_link,
                "map"=>$request->map,
                "location"=>$request->location,
                "open_hours"=>$request->open_hours,
                "email"=>$request->email,
                "phone"=>$request->phone,
                "facebook"=>$request->facebook,
                "twitter"=>$request->twitter,
                "instagram"=>$request->instagram,
                "youtube"=>$request->youtube,
                "manager"=>$request->manager,
                "nip"=>$request->nip,
            ]; 
            WebConfig::where('id', $request->id)->update($data);
            Alert::success('Ubah data', 'Berhasil Ubah Data');
            return back();

     
    }
    }
}
