@extends('layouts.auth.app')
@section('title', 'Verifikasi Email')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div
            class="col-12">
            <div class="login-brand">
                <img src="{{asset('images/logo-jtinnovation.png')}}" alt="logo" width="500"
                    class="shadow-light">
            </div>

            <div class="card card-primary">
                <div class="card-header">
                    <h4>Verifikasi Email Telah Dikirim</h4>
                </div>

                <div class="card-body">
                    <h6>Jika Anda tidak menerima email verifikasi, klik tombol di bawah ini untuk mengirim ulang email verifikasi.</h6>
                    @if (session('resent'))
                    <div class="alert alert-info">
                        Email verifikasi telah dikirim ke alamat email Anda.
                    </div>
                    @endif

                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Kirim Ulang Email Verifikasi
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