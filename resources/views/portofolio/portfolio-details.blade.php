<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Portfolio Details - Presento Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset ('assetss/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset ('assetss/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset ('assetss/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('assetss/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset ('assetss/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset ('assetss/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('assetss/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset ('assetss/assets/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Presento
  * Template URL: https://bootstrapmade.com/presento-bootstrap-corporate-template/
  * Updated: Jun 02 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="portfolio-details-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
    
          <a href="index.html" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('jti/assets/images/logo.png') }}" alt="">
            {{-- <h1 class="sitename">Presento</h1> --}}
            <span>.</span>
          </a>
    
          <nav id="navmenu" class="navmenu">
            <ul>
              <li><a href="#hero" class="">Home<br></a></li>
              <li><a href="#services">Services</a></li>
              <li><a href="#portfolio">Portfolio</a></li>
              <li><a href="#pendampingan">Pendampingan</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>
    
          <a class="btn-getstarted" href="{{route ('login')}}">Login</a>
          <a class="btn-getstarted" href="{{route ('register.mbkm')}}">Daftar MBKM</a>
    
        </div>
      </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Portfolio Details</li>
          </ol>
        </nav>
        <h1>Portfolio Details</h1>
      </div>
    </div><!-- End Page Title -->

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
              <h3>Project information</h3>
              <ul>
                <li><strong>Category</strong>: {{ $portofolio->category->name }}</li>
                <li><strong>Client</strong>: {{ $portofolio->klien }}</li>
                <li><strong>Project date</strong>: {{ \Carbon\Carbon::parse($portofolio->start_date)->format('d F, Y') }}</li>
                <li><strong>Project endate</strong>: {{ \Carbon\Carbon::parse($portofolio->end_date)->format('d F, Y') }}</li>
              </ul>
            </div>
            <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
              <h2>{{ $portofolio->judul }}</h2>
              <p>
                {{ $portofolio->deskripsi }}
              </p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Portfolio Details Section -->

  </main>

  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <img class="mu-footer-logo" src="{{ asset('jti/assets/images/logo.png') }}"
              alt="logo">
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>{{ $webConfig->location }}</p>
            <p class="mt-3"><strong>Phone:</strong> <span>{{ $webConfig->phone }}</span></p>
            <p><strong>Email:</strong> <span>{{ $webConfig->email }}</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href="{{ $webConfig->twitter }}"><i class="bi bi-twitter-x"></i></a>
            <a href="{{ $webConfig->facebook }}"><i class="bi bi-facebook"></i></a>
            <a href="{{ $webConfig->instagram }}"><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Portofolio</a></li>
            <li><a href="#">Pendampingan</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Tentang JTINova</h4>
          <p>{{ $webConfig->introduction }}</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">JTInova</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">JTInova</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset ('assetss/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset ('assetss/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset ('assetss/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset ('assetss/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset ('assetss/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset ('assetss/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset ('assetss/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset ('assetss/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset ('assetss/assets/js/main.js') }}"></script>

</body>

</html>