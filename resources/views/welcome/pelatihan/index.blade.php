@extends('layouts.welcome.app')
@section('content')

<div class="page-title">
  <div class="container">
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{route('landing.page')}}">Home</a></li>
        <li class="current">Pelatihan</li>
      </ol>
    </nav>
    <h1>Katalog Pelatihan</h1>
  </div>
</div>

<div class="container pt-5 pb-5">
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        @foreach($trainings as $training)
        <div class="col-lg-4 col-md-6 mb-4">
          <a class="card border-0 card-item-pub" href="{{route('katalog.pelatihan.show', $training->kode)}}">
            <img src="{{asset('storage/'.$training->foto)}}" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title">{{$training->nama}}</h5>
              <p class="card-text">{{$training->deskripsi}}</p>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection