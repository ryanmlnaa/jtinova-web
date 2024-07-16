@extends('layouts.welcome.app')
@section('content')
    <div class="page-title">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('landing.page') }}">Home</a></li>
                    <li class="current">Sertifikasi</li>
                </ol>
            </nav>
            <h1>Form Sertifikasi Junior Web Developer Kominfo</h1>
        </div>
    </div>

    <section id="layanan" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Form Sertifikasi Junior Web Developer Kominfo</h2>
            <p>Silakan isi form berikut</p>
        </div><!-- End Section Title -->

        <div class="container">
            <iframe
                src="https://docs.google.com/forms/d/e/1FAIpQLSdvzxonsfunAxDF9chnAbFFybLRuUheTVarRM7LN3k4Jp_CAQ/viewform?embedded=true"
                width="100%" height="1082" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
        </div>

    </section>
@endsection
