@extends('layouts.welcome.app')
@section('content')

<div class="page-title">
  <div class="container">
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{route('landing.page')}}">Home</a></li>
        <li class="current">Detail Portofolio</li>
      </ol>
    </nav>
    <h1>Detail Portofolio</h1>
  </div>
</div>

<!-- Portfolio Details Section -->
<section id="portfolio-details" class="portfolio-details section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-8">
        <div class="portfolio-details-slider swiper">

          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>

          <div class="swiper-wrapper align-items-center">
            @foreach ($portofolio->images as $item )
            <div class="swiper-slide">
                <img src="{{ asset ('storage/' . $item->image_url) }}" alt="">
              </div>
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
          <h3>Informasi Project</h3>
          <ul>
            <li><strong>Kategori</strong>: {{ $portofolio->category->name }}</li>
            <li><strong>Klien</strong>: {{ $portofolio->klien }}</li>
            <li><strong>Tanggal Mulai</strong>: {{ \Carbon\Carbon::parse($portofolio->start_date)->format('d F Y') }}</li>
            <li><strong>Tanggal Selesai</strong>: {{ \Carbon\Carbon::parse($portofolio->end_date)->format('d F Y') }}</li>
          </ul>

          <h3>{{ $portofolio->judul }}</h3>
          <p>
            {{ $portofolio->deskripsi }}
          </p>
        </div>
      </div>

    </div>

  </div>

</section><!-- /Portfolio Details Section -->

@endsection