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

              <h3>Gabung Pelatihan Sekarang</h3>
            </div><!-- End post content -->

            <!-- if authenticate -->
            @auth
            <form action="{{route('pelatihan.pelatihanuser.store')}}" method="post">
              @csrf
              <input type="hidden" name="pelatihan_id" value="{{$training->id}}">
              <div class="mb-3">
                <label for="skema" class="form-label">Skema</label> <span class="text-danger">*</span>
                <select name="skema" id="skema" class="form-select @error('skema') is-invalid @enderror" required>
                  <option value="individu">Individu</option>
                  <option value="kelompok">Kelompok</option>
                </select>
                @error('skema')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <div class="row input-copy-here form-kelompok" style="display: none;">
                  <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                    <div class="form-group">
                      <input type="text" class="form-control form-anggota" name="nama[]" id="nama" placeholder="Nama Anggota">
                    </div>
                  </div>
                  <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
                    <div class="row">
                      <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-10">
                        <input type="email" class="form-control form-anggota" name="email[]" id="email" placeholder="Email Anggota">
                      </div>
                      <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2">
                        <button type="button" class="btn btn-outline-primary btn-add" data-toggle="tooltip" data-placement="top" title="Tambah Anggota"><i class="bi bi-plus-lg"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn-daftar-layanan">Daftar</button>
              </div>
            </form>
            @else
            <a href="{{route('register')}}" class="btn-daftar-layanan mt-3">Daftar</a>
            @endauth
            <div class="input-copy" style="display: none;">
              <div class="row input-group mt-3">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                  <div class="form-group">
                    <input type="text" class="form-control form-anggota" name="nama[]" id="nama" placeholder="Nama Anggota" required>
                  </div>
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
                  <div class="row">
                    <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-10">
                      <input type="email" class="form-control form-anggota" name="email[]" id="email" placeholder="Email Anggota" required>
                    </div>
                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2">
                      <button type="button" class="btn btn-outline-primary btn-remove" data-toggle="tooltip" data-placement="top" title="Hapus Anggota"><i class="bi bi-dash-lg"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
<script>
  $(document).ready(function() {
    const kuota_tim = parseInt("{{$training->kuota_tim}}");
    // max click btn-add based on kuota_tim
    $('body').on('click', '.btn-add', function () {
        if ($('.input-copy-here .input-group').length >= kuota_tim - 2) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Maksimal kuota per tim adalah ' + kuota_tim + ' orang!',
            });
            return;
        }
        var input = $('.input-copy').html();
        $('.input-copy-here').append(input);
    });

    $("body").on('click', '.btn-remove', function () {
        $(this).parents('.input-group').remove();
    });

    $('#skema').on('change', function() {
      if ($(this).val() == 'kelompok') {
        $('.form-kelompok').show();
      } else {
        $('.form-anggota').val('');
        $('.form-kelompok').hide();
      }
    });
  });
</script>
@endpush