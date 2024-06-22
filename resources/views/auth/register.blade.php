@extends('layouts.auth.app')
@section('title', 'Register')
@section('content')
@php
if (request()->route()->getName() == 'register.mbkm') {
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
} else {
    $disabled = false;
}
@endphp
<div class="container mt-5">
    <div class="row">
        <div
            class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
                <img src="{{asset('static/logo.png')}}" alt="logo" width="500"
                    class="shadow-light">
            </div>

            <div class="card card-primary">
                <div class="card-header">
                    <h4>Pendaftaran</h4>
                </div>

                @if ($disabled)
                <div class="card-body">
                    <div class="alert alert-danger">
                        Pendaftaran sudah ditutup atau belum dibuka
                    </div>
                </div>
                @else
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" autofocus>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="password" class="d-block">Password</label>
                                <input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror"
                                    data-indicator="pwindicator" name="password">
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="password2" class="d-block">Konfirmasi Password</label>
                                <input id="password2" type="password" class="form-control"
                                    name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Daftar
                            </button>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </form>
                    <div class="mt-5 text-muted text-center">
                        Sudah Punya Akun? <a href="{{ route('login') }}">Login</a>
                    </div>
                </div>
                @endif
            </div>
            <div class="simple-footer">
                Copyright &copy; JTI Innovation @php echo date('Y'); @endphp
            </div>
        </div>
    </div>
</div>
@endsection