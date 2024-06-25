@extends('layouts.auth.app')
@section('title', $title)
@php
$timeline = \App\Models\Timeline::where('status', 1)->where('jenis', 'instruktur')->first();
if ($timeline) {
    $timelineData = json_decode($timeline->timeline);

    if (Carbon\Carbon::now()->format('Y-m-d') >= $timelineData[0]->start && Carbon\Carbon::now()->format('Y-m-d') <= $timelineData[0]->end) {
        $disabled = false;
    } else {
        $disabled = true;
    }
} else {
    $disabled = true;
}

if (auth()->check()) {
    $data = App\Models\InstrukturUser::where('user_id', Auth::user()->id)->first();
} else {
    $data = null;
}
@endphp
@section('content')
<div class="container mt-5">
    <div class="row">
        <div
            class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
                <img src="{{asset('static/logo.png')}}" alt="logo" width="500"
                    class="shadow-light">
            </div>

            @if($data && $data->status_pendaftaran == 'proses')
            <div class="alert alert-light">
                <h4 class="alert-heading">Pendaftaran Instruktur</h4>
                <p>Pendaftaran sedang diproses, pantau terus email dan dashboard untuk informasi lebih lanjut.</p>
            </div>
            <div class="form-group text-center">
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
                    Kembali ke Dashboard
                </a>
            </div>
            @elseif ($data && $data->status_pendaftaran == 'gagal')
            <div class="alert alert-light">
                <h4 class="alert-heading">Pendaftaran Instruktur</h4>
                <p><span class="text-info">Mohon maaf</span>, anda <span class="text-info">tidak lolos</span> seleksi Instruktur. Silahkan coba lagi di periode berikutnya.</p>
            </div>
            <div class="form-group text-center">
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
                    Kembali ke Dashboard
                </a>
            </div>
            @elseif ($data && $data->status_pendaftaran == 'lolos')
            <div class="alert alert-light">
                <h4 class="alert-heading">Pendaftaran Instruktur</h4>
                <p>Selamat, anda <span class="text-success">lolos</span> seleksi Instruktur. Silahkan cek email dan dashboard untuk informasi lebih lanjut.</p>
            </div>
            <div class="form-group text-center">
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
                    Kembali ke Dashboard
                </a>
            </div>
            @elseif ($disabled)
            <div class="alert alert-light">
                <h4 class="alert-heading">Pendaftaran Instruktur</h4>
                <p>Pendaftaran Instruktur belum dibuka atau sudah ditutup. Pantau terus informasi di website ini atau di email anda.</p>
            </div>
            <div class="form-group text-center">
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
                    Kembali ke Dashboard
                </a>
            </div>
            @else
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Daftar Instruktur</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('instruktur.instrukturUser.store')}}" enctype="multipart/form-data">
                        @csrf
                        @if(!Auth::check())
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label> <span class="text-danger">*</span>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autofocus>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Surel</label> <span class="text-danger">*</span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autofocus>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="password" class="d-block">Kata Sandi</label> <span class="text-danger">*</span>
                                <input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror password"
                                    name="password" required autofocus>
                                    <i class="fa fa-fw fa-eye field-icon toggle-password" style="float: right; margin-top: -28px; margin-right: 10px; cursor: pointer;"></i>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="password2" class="d-block">Konfirmasi Kata Sandi</label> <span class="text-danger">*</span>
                                <input id="password2" type="password" class="form-control"
                                    name="password_confirmation" required>
                                <i class="fa fa-fw fa-eye field-icon toggle-password2" style="float: right; margin-top: -28px; margin-right: 10px; cursor: pointer;"></i>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                          <div class="form-group col-6">
                            <label for="no_hp">No HP / WA</label> <span class="text-danger">*</span>
                            <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
                                value="{{ old('no_hp') }}" required autofocus>
                            @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="form-group col-6">
                            <label for="jenis_kelamin">Jenis Kelamin</label> <span class="text-danger">*</span>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" required autofocus>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="alamat">Alamat</label> <span class="text-danger">*</span>
                          <textarea id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required autofocus>{{ old('alamat') }}</textarea>
                          @error('alamat')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                        </div>

                        <div class="row">
                          <div class="form-group col-6">
                            <label for="pendidikan_terakhir">Pendidikan Terakhir</label> <span class="text-danger">*</span>
                            <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" required autofocus>
                                <option value="SD" {{ old('pendidikan_terakhir') == 'SD' ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ old('pendidikan_terakhir') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ old('pendidikan_terakhir') == 'SMA' ? 'selected' : '' }}>SMA / SMK</option>
                                <option value="D3" {{ old('pendidikan_terakhir') == 'D3' ? 'selected' : '' }}>D3</option>
                                <option value="D4" {{ old('pendidikan_terakhir') == 'D4' ? 'selected' : '' }}>D4</option>
                                <option value="S1" {{ old('pendidikan_terakhir') == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ old('pendidikan_terakhir') == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ old('pendidikan_terakhir') == 'S3' ? 'selected' : '' }}>S3</option>
                            </select>
                            @error('pendidikan_terakhir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="form-group col-6">
                            <label for="pekerjaan">Pekerjaan</label> <span class="text-danger">*</span>
                            <input id="pekerjaan" type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan"
                                value="{{ old('pekerjaan') }}" required autofocus>
                            @error('pekerjaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-6">
                            <label for="portofolio">Link Portofolio</label> <span class="text-danger">*</span>
                            <input id="portofolio" type="text" class="form-control @error('portofolio') is-invalid @enderror" name="portofolio"
                                value="{{ old('portofolio') }}" required autofocus>
                            @error('portofolio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="form-group col-6">
                            <label for="linkedin">LinkedIn</label> <span class="text-danger">*</span>
                            <input id="linkedin" type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin"
                                value="{{ old('linkedin') }}" required autofocus>
                            @error('linkedin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-6">
                            <label for="cv">Upload CV Terbaru</label>
                            <input id="cv" type="file" class="form-control @error('cv') is-invalid @enderror" name="cv"
                                value="{{ old('cv') }}" required autofocus>
                            @error('cv')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="form-group col-6">
                            <label for="foto">Upload Foto Terbaru</label>
                            <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto"
                                value="{{ old('foto') }}" required autofocus>
                            @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="cf-turnstile" data-sitekey="{{ config('services.cloudflare.turnstile.site_key') }}" data-theme="light" data-callback="onTurnstileSuccess"></div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Simpan
                            </button>
                        </div>
                    </form>
                  </div>
                </div>
                @endif
                <div class="simple-footer">
                    Copyright &copy; JTI Innovation @php echo date('Y'); @endphp
                </div>
            </div>
        </div>
    </div>
@endsection