@extends('layouts.welcome.app')
@section('content')

<div class="page-title">
  <div class="container">
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{route('landing.page')}}">Home</a></li>
        <li class="current">Timeline</li>
      </ol>
    </nav>
    <h1>Timeline</h1>
  </div>
</div>

<section id="layanan" class="services section">

  @if (!$timeline)
  <div class="container section-title" data-aos="fade-up">
    <h2>Timeline Pendaftaran Instruktur</h2>
    <p>Belum ada timeline pendaftaran Instruktur</p>
  </div>
  @else
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>{{$timeline->title}}</h2>
    <p>{{$timeline->tahun_ajaran}}</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">

      @foreach (json_decode($timeline->timeline) as $item)
      <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item d-flex position-relative h-100">
          <i class="bi-calendar-range icon flex-shrink-0"></i>
          <div>
            <h4 class="title">{{$loop->iteration . '. '.$item->title}}</h4>
            <h5>{{Carbon\Carbon::parse($item->start)->format('d F Y')}} - {{Carbon\Carbon::parse($item->end)->format('d F Y')}}</h5>
          </div>
        </div>
      </div><!-- End Service Item -->
      @endforeach

    </div>
    {{-- button to register --}}
    <div class="container section-title mt-4" data-aos="fade-up" data-aos-delay="100">
      <a href="{{route('register.instruktur')}}" class="btn-daftar-layanan">Daftar</a>
    </div><!-- End Section Title -->
  </div>
  @endif

</section>

@endsection