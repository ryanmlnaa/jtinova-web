@extends('layouts.auth.app')
@section('title', $title)
@php
$timeline = \App\Models\Timeline::where('status', 1)->first();
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
    $data = App\Models\MbkmUser::where('user_id', Auth::user()->id)->first();
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
                <h4 class="alert-heading">Pendaftaran MBKM</h4>
                <p>Pendaftaran sedang diproses, pantau terus email dan dashboard untuk informasi lebih lanjut.</p>
            </div>
            @elseif ($data && $data->status_pendaftaran == 'gagal')
            <div class="alert alert-light">
                <h4 class="alert-heading">Pendaftaran MBKM</h4>
                <p><span class="text-info">Mohon maaf</span>, anda <span class="text-info">tidak lolos</span> seleksi MBKM. Silahkan coba lagi di periode berikutnya.</p>
            </div>
            @elseif ($data && $data->status_pendaftaran == 'lolos')
            <div class="alert alert-light">
                <h4 class="alert-heading">Pendaftaran MBKM</h4>
                <p>Selamat, anda <span class="text-success">lolos</span> seleksi MBKM. Silahkan cek email dan dashboard untuk informasi lebih lanjut.</p>
            </div>
            @elseif ($disabled)
            <div class="alert alert-light">
                <h4 class="alert-heading">Pendaftaran MBKM</h4>
                <p>Pendaftaran MBKM belum dibuka atau sudah ditutup. Pantau terus informasi di website ini atau di email anda.</p>
            </div>
            @else
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Daftar MBKM</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('mbkm.mbkmuser.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if(!Auth::check())
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autofocus>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Surel</label>
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
                                <label for="password" class="d-block">Kata Sandi</label>
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
                                <label for="password2" class="d-block">Konfirmasi Kata Sandi</label>
                                <input id="password2" type="password" class="form-control"
                                    name="password_confirmation" required>
                                <i class="fa fa-fw fa-eye field-icon toggle-password2" style="float: right; margin-top: -28px; margin-right: 10px; cursor: pointer;"></i>
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="nim">NIM</label>
                                <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" name="nim"
                                    value="{{ old('nim') }}" required autofocus>
                                @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="prodi_id">Prodi</label>
                                <select name="prodi_id" id="prodi_id" class="form-control @error('prodi_id') is-invalid @enderror" required autofocus>
                                @foreach ($prodis as $prodi)
                                    <option value="{{ $prodi->id }}">{{ $prodi->name }}</option>
                                @endforeach
                                </select>
                                @error('prodi_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="semester">Semester</label>
                                <select name="semester" id="semester" class="form-control @error('semester') is-invalid @enderror" required autofocus>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                </select>
                                @error('semester')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="golongan">Golongan</label>
                                <select name="golongan" id="golongan" class="form-control @error('golongan') is-invalid @enderror" required autofocus>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                </select>
                                @error('golongan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="tahun_masuk">Tahun Masuk Politeknik</label>
                                <input id="tahun_masuk" type="text" class="form-control @error('tahun_masuk') is-invalid @enderror" name="tahun_masuk"
                                    value="{{ old('tahun_masuk') }}" required autofocus>
                                @error('tahun_masuk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="no_hp">No HP</label>
                                <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
                                    value="{{ old('no_hp') }}" required autofocus>
                                @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="keahlian">Skill / Library / Framework / Tools yang dikuasi</label>
                            <div class="row">
                                @foreach ($keahlians as $keahlian)
                                <div class="col-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="keahlian-{{ $keahlian->id }}"
                                            name="keahlian_id[]" value="{{ $keahlian->id }}" @if (is_array(old('keahlian_id')) && in_array($keahlian->id, old('keahlian_id'))) checked @endif required autofocus>
                                        <label class="custom-control-label" for="keahlian-{{ $keahlian->id }}">
                                            {{ $keahlian->nama }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="khs">Upload KHS dari semester awal - terakhir</label>
                                <input id="khs" type="file" class="form-control @error('khs') is-invalid @enderror" name="khs"
                                    value="{{ old('khs') }}" autofocus>
                                @error('khs')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="photo">Upload Foto Terbaru</label>
                                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo"
                                    value="{{ old('photo') }}">
                                @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Daftar
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