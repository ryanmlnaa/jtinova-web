@extends('layouts.welcome.app')
@section('content')

<div class="page-title">
  <div class="container">
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{route('landing.page')}}">Home</a></li>
        <li><a href="{{route('katalog.pendampingan.index')}}">Pendampingan</a></li>
        <li class="current">Detail Pendampingan</li>
      </ol>
    </nav>
    <h1>Detail Pendampingan</h1>
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
              </ul>
            </div><!-- End meta top -->

            <div class="content">
              <p>{{$training->deskripsi}}</p>
            </div><!-- End post content -->
            
            @auth
            <form action="{{route('pendampingan.pendampingan.store')}}" method="post">
              @csrf
              <input type="hidden" name="pendampingan_id" value="{{$training->id}}">
              <div class="form-group">
                <button type="submit" class="btn-daftar-layanan">Daftar</button>
              </div>
            </form>
            @else
            <a href="{{route('register')}}" class="btn-daftar-layanan mt-3">Daftar</a>
            @endauth
          </article>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
<script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
@endpush