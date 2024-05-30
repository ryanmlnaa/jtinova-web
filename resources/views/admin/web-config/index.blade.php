@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="section-body">
    <form action="{{route('webconfig.update')}}" method="post"enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="control-label">Nama Website</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ $data['name'] ?? '' }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="alias" class="control-label"> Website Alias</label>
                            <input type="text" id="alias" name="alias" class="form-control"
                                value="{{ $data['alias'] ?? '' }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="introduction" class="control-label">Introduction</label>
                            <textarea name="introduction" id="introduction" cols="30" rows="10" class="form-control">{{ $data['introduction'] ?? '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="profile_link" class="control-label">Link Profile</label>
                            <input type="text" id="profile_link" name="profil_link" class="form-control"
                                value="{{ $data['profil_link'] ?? '' }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="manager" class="control-label">Manager</label>
                            <input type="text" id="manager" name="manager" class="form-control"
                                value="{{ $data['manager'] ?? '' }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="nip" class="control-label">NIP Manager</label>
                            <input type="text" id="nip" name="nip" class="form-control"
                                value="{{ $data['nip'] ?? '' }}" autofocus>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="location" class="control-label">Lokasi Alamat</label>
                            <input type="text" id="location" name="location" class="form-control"
                                value="{{ $data['location'] ?? '' }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="open_hours" class="control-label">Jam Buka</label>
                            <input type="text" id="open_hours" name="open_hours" class="form-control" autofocus
                                placeholder="Senin-Jum'at 07:00 - 16:00"value="{{ $data['open_hours'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">Email</label>
                            <input type="text" id="email" name="email" class="form-control"
                                value="{{ $data['email'] ?? '' }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="control-label">Telepon / Hp </label>
                            <input type="text" id="phone" name="phone" class="form-control"
                                value="{{ $data['phone'] ?? '' }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="facebook" class="control-label">Facebook URL</label>
                            <input type="text" id="facebook" name="facebook" class="form-control"
                                value="{{ $data['facebook'] ?? '' }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="twitter" class="control-label">Twitter URL</label>
                            <input type="text" id="twitter" name="twitter" class="form-control"
                                value="{{ $data['twitter'] ?? '' }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="instagram" class="control-label">Instagram URL</label>
                            <input type="text" id="instagram" name="instagram" class="form-control"
                                value="{{ $data['instagram'] ?? '' }}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="youtube" class="control-label">Youtube URL</label>
                            <input type="text" id="youtube" name="youtube" class="form-control"
                                value="{{ $data['youtube'] ?? '' }}" autofocus>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="brand_logo" class="control-label">Brand Logo<small> (700x100)</small></label>
                            <input type="file" id="brand_logo" name="brand_logo" class="form-control"
                                value="{{ $data['brand_logo'] ?? '' }}">
                            @if (isset($data['brand_logo']) && $data['brand_logo'] !== null)
                                <img src="{{ asset('storage/'.$data['brand_logo']) }}" alt="{{ $data['brand_logo'] }}" class="img-fluid bg-dark mt-2">
                            @else
                                <img src="" alt="" class="img-fluid bg-dark mt-2">
                            @endif
        
                        </div>
                        <div class="form-group">
                            <label for="video" class="control-label">Video</label>
                            <input type="text" id="video" name="video" class="form-control"
                                value="{{ $data['video'] ?? '' }}">
        
                            @if (isset($data['video']) && $data['video'] !== null)
                                <iframe width="100%" height="150" src="{{ $data['video'] }}" frameborder="0"
                                    allowfullscreen></iframe>
                            @else
                                <iframe width="100%" height="150" src=""></iframe>
                            @endif
                        </div>
        
                        <div class="form-group">
                            <label for="video_preview" class="control-label">Video Preview <small>(1280x720)</small></label>
                            <input type="file" id="video_preview" name="video_preview" class="form-control"
                                value="{{ $data['video_preview'] ?? '' }}">
                            @if (isset($data['video_preview']) && $data['video_preview'] !== null)
                                <video controls class="img-fluid bg-dark mt-2">
                                    <source src="{{ asset('storage/' . $data['video_preview']) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @else
                                <img src="" alt="" class="img-fluid bg-dark mt-2">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="map" class="control-label">Kode Embed Map Google</label>
                            <textarea id="map" name="map" class="form-control">{{ $data['map'] ?? '' }}</textarea>
                            <iframe src="{{ $data['map'] ?? '' }}" width="100%" height="450" style="border:0;"
                                allowfullscreen="" loading="lazy" class="mt-2"></iframe>
                        </div>
                        <button type="submit" class="btn btn-primary float-right"><span id="text-save">Simpan Setting</span></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
