@extends('layouts.auth.app')
@section('title', 'Masuk')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
                <img src="{{asset('static/logo.png')}}" alt="logo" width="500"
                    class="shadow-light img-fluid">
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Masuk</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Surel</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                tabindex="1" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">

                                    <strong>{{ $message }}</strong>

                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Kata Sandi</label>
                                <div class="float-right">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <!-- add eye icon for show password -->
                            <input id="password" type="password" class="form-control password" name="password"
                                tabindex="2" required>
                            <i class="fa fa-fw fa-eye field-icon toggle-password" style="float: right; margin-top: -28px; margin-right: 10px; cursor: pointer;"></i>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input"
                                    tabindex="3" id="remember-me">
                                <label class="custom-control-label" for="remember-me">Ingat Saya</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="cf-turnstile" data-sitekey="{{ config('services.cloudflare.turnstile.site_key') }}" data-theme="light" data-callback="onTurnstileSuccess"></div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Masuk
                            </button>
                        </div>
                    </form>
                    <div class="mt-5 text-muted text-center">
                        Belum punya akun? <a href="{{ route('register') }}">Buat Akun</a>
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