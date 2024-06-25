@extends('layouts.auth.app')
@section('title', 'Daftar')
@section('content')
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
                    <h4>Daftar</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
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

                        <div class="form-group">
                            <div class="cf-turnstile" data-sitekey="{{ config('services.cloudflare.turnstile.site_key') }}" data-theme="light" data-callback="onTurnstileSuccess"></div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" disabled="true">
                                Daftar
                            </button>
                        </div>
                    </form>
                    <div class="mt-5 text-muted text-center">
                        Sudah Punya Akun? <a href="{{ route('login') }}">Login</a>
                    </div>
                </div>
            </div>
            <div class="simple-footer">
                Copyright &copy; JTI Innovation @php echo date('Y'); @endphp
            </div>
        </div>
    </div>
</div>
@endsection