<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>JTI Innovation</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset ('static/favicon.png')}}" rel="icon">
  <link href="{{asset ('static/favicon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset ('assetss/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{asset ('assetss/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{asset ('assetss/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{asset ('assetss/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{asset ('assetss/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset ('assetss/assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{route('landing.page')}}" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('static/favicon.png') }}" alt="logo" class="img-fluid">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{route('landing.page')}}#hero" class="">Home<br></a></li>
          <li><a href="{{route('landing.page')}}#about" class="">Tentang Kami<br></a></li>
          <li><a href="{{route('landing.page')}}#layanan">Layanan</a></li>
          <li><a href="{{route('landing.page')}}#portfolio">Portofolio</a></li>
          @auth
          <li><a href="{{route('dashboard')}}">{{Auth::user()->name}}</a></li>
          @endauth
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      @guest
      <a class="btn-masuk" href="{{route ('login')}}">Masuk</a>
      <a class="btn-getstarted" href="{{route('landing.page')}}#tabs">Daftar</a>
      @endguest

    </div>
  </header>

  <main class="main">

    @yield('content')

  </main>

  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <img class="mu-footer-logo" src="{{ asset('static/logo.png') }}"
              alt="logo">
          </a>
          <div class="footer-contact pt-3">
            <p>{{ $webConfig->location }}</p>
            <p class="mt-3"><strong>Phone:</strong> <span>{{ $webConfig->phone }}</span></p>
            <p><strong>Email:</strong> <span>{{ $webConfig->email }}</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href="{{ $webConfig->twitter }}"><i class="bi bi-twitter-x"></i></a>
            <a href="{{ $webConfig->facebook }}"><i class="bi bi-facebook"></i></a>
            <a href="{{ $webConfig->instagram }}"><i class="bi bi-instagram"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Menu</h4>
          <ul>
            <li><a href="#hero">Home</a></li>
            <li><a href="#about">Tentang Kami</a></li>
            <li><a href="#layanan">Layanan</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Layanan Kami</h4>
          <ul>
            <li><a href="#">Pelatihan</a></li>
            <li><a href="#">Pendampingan</a></li>
            <li><a href="#">Instruktur</a></li>
            <li><a href="#">Mahasiswa MBKM</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Tentang JTINova</h4>
          <p>{{ $webConfig->introduction }}</p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">JTInova</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="{{route('landing.page')}}">JTInova</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset ('assetss/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{asset ('assetss/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{asset ('assetss/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{asset ('assetss/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{asset ('assetss/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{asset ('assetss/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{asset ('assetss/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{asset ('assetss/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{asset ('assetss/assets/js/main.js') }}"></script>

  @stack('scripts')
</body>

</html>