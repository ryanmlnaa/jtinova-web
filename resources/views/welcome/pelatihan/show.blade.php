@extends('layouts.welcome.app')
@section('content')

<div class="page-title">
  <div class="container">
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{route('landing.page')}}">Home</a></li>
        <li><a href="{{route('katalog.pelatihan.index')}}">Pelatihan</a></li>
        <li class="current">Detail Pelatihan</li>
      </ol>
    </nav>
    <h1>Detail Pelatihan {{$training->nama}}</h1>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div id="blog-details" class="blog-details section">
        <div class="container">

          <article class="article">

            <div class="post-img">
              <img src="{{asset('storage/'.$training->foto)}}" alt="" class="img-fluid">
            </div>

            <h2 class="title">{{$training->nama}}</h2>

            <div class="meta-top">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-cash"></i> @currency($training->harga) </li>
                <li class="d-flex align-items-center"><i class="bi bi-calendar-check"></i> {{Carbon\Carbon::parse($training->tanggal_mulai)->format('d F Y')}} - {{Carbon\Carbon::parse($training->tanggal_selesai)->format('d F Y')}} </li>
                <li class="d-flex align-items-center"><i class="bi bi-geo-alt"></i> {{$training->lokasi}} </li>
                <li class="d-flex align-items-center"><i class="bi bi-tag"></i> {{$training->kategori->name}} </li>
              </ul>
            </div><!-- End meta top -->

            <div class="content">
              <h3>Deskripsi</h3>
              <p>{{$training->deskripsi}}</p>
              <h3>Benefit</h3>
              <p>{{$training->benefit}}</p>

              
            </div><!-- End post content -->
            <a href="{{route('register.pelatihan')}}?pelatihan={{$training->kode}}" class="btn-daftar-layanan">Daftar</a>
          </article>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection