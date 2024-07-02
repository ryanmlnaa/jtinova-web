@extends('layouts.auth.app')
@section('title', 'Verifikasi Surel')
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
                    <h4>Verifikasi Surel Telah Dikirim</h4>
                </div>

                <div class="card-body">
                    <h6>Jika Anda tidak menerima surel verifikasi, klik tombol di bawah ini untuk mengirim ulang surel verifikasi.</h6>
                    @if (session('resent'))
                    <div class="alert alert-light">
                        Alamat verifikasi surel telah dikirim ke alamat surel Anda.
                    </div>
                    @endif

                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <div class="form-group">
                            <div class="cf-turnstile" data-sitekey="{{ config('services.cloudflare.turnstile.site_key') }}" data-theme="light" data-callback="onTurnstileSuccess"></div>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Kirim Ulang Surel Verifikasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="simple-footer">
                Copyright &copy; JTI Innovation @php echo date('Y'); @endphp
            </div>
        </div>
    </div>
</div>
@endsection