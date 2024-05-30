<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>JTI Innovation</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="{{ asset('jti/assets/images/logopolije.png') }}" />
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
        integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <!-- Slick slider -->
    <link href="{{ asset('jti/assets/css/slick.css') }}" rel="stylesheet">
    <!-- Gallery Lightbox -->
    <link href="{{ asset('jti/assets/css/magnific-popup.css') }}" rel="stylesheet">
    <!-- Skills Circle CSS  -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/circlebars@1.0.3/dist/circle.css">


    <!-- Main Style -->
    <link href="{{ asset('jti/style.css') }}" rel="stylesheet">

    <!-- Fonts -->

    <!-- Google Fonts Raleway -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600,700" rel="stylesheet">
    <!-- Google Fonts Open sans -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- Template Stylesheet -->
    <link href="{{ asset('belajar/css/style.css') }}" rel="stylesheet">


</head>

<body>

    <!--START SCROLL TOP BUTTON -->
    <!-- Tambahkan script jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Tambahkan script JavaScript untuk pengguliran halaman -->
    <script>
        $(document).ready(function(){
            // Smooth scrolling when clicking on nav links
            $('a[href^="#"]').on('click', function(event) {
                var target = $(this.getAttribute('href'));
                if( target.length ) {
                    event.preventDefault();
                    $('html, body').stop().animate({
                        scrollTop: target.offset().top
                    }, 1000);
                }
            });
        });
    </script>
    {{-- <a class="scrollToTop" href="#">
        <i class="fa fa-angle-up"></i>
    </a> --}}
    <!-- END SCROLL TOP BUTTON -->

    <!-- Start Header -->
    <header id="mu-hero">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light mu-navbar">
                <!-- Text based logo -->
                {{-- <a class="navbar-brand mu-logo" href="index.html"><span>JTI-NOVA</span></a> --}}
                <!-- image based logo -->
                <a class="navbar-brand mu-logo" href="index.html"><img src="{{ asset('jti/assets/images/logo.png') }}"
                        alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mu-navbar-nav">
                        <li class="nav-item active">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="nav-item"><a href="#work-form">Portofolio</a></li>
                        <li class="nav-item"><a href="#mu-training">Pelatihan</a></li>
                        <li class="nav-item"><a href="#mu-pricing">Pendampingan TA</a></li>
                        <li class="nav-item dropdown">
                            {{-- <a class="dropdown-toggle" href="blog.html" role="button" id="navbarDropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="blog.html">Blog Archive</a>
                                <a class="dropdown-item" href="blog-single.html">Blog Single</a>
                            </div> --}}
                        </li>
                        <li class="nav-item"><a href="{{route ('register.mbkm')}}">Daftar MBKM</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- End Header -->

    <!-- Start slider area -->
    <div id="mu-slider">
        <div class="mu-slide">
            <!-- Start single slide  -->
            <div class="mu-single-slide">
                <img src="{{ asset('jti/assets/images/slider-img-1.jpg') }}" alt="slider img">
                <div class="mu-single-slide-content-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mu-single-slide-content">
                                    <h1>{{ $webConfig->name }}</h1>
                                    <p>{{ $webConfig->introduction }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End single slide  -->

            <!-- Start single slide  -->
            <div class="mu-single-slide">
                <img src="{{ asset('jti/assets/images/slider-img-2.jpg') }}" alt="slider img">
                <div class="mu-single-slide-content-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mu-single-slide-content">
                                    <h1>{{ $webConfig->name }}</h1>
                                    <p>{{ $webConfig->introduction }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End single slide  -->

            <!-- Start single slide  -->
            <div class="mu-single-slide">
                <img src="{{ asset('jti/assets/images/slider-img-3.jpg') }}" alt="slider img">
                <div class="mu-single-slide-content-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mu-single-slide-content">
                                    <h1>{{ $webConfig->name }}</h1>
                                    <p>{{ $webConfig->introduction }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End single slide  -->
        </div>
    </div>
    <!-- End Slider area -->


    <!-- Start main content -->
    <main>
        <!-- Start About -->
        <section id="mu-about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mu-about-area">
                            <!-- Title -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mu-title">
                                        <h2>Inovasi Teaching Factory JTI</h2>
                                        <p>Teaching Factory (TEFA) merupakan sarana unggulan
                                            yang dimiliki Politeknik untuk mewujudkansistem
                                            vokasi berbasis kompetensi, disiplin, terampil, dan
                                            mandiri. Tefa memiliki konsep pembelajaran
                                            vokasi berbasis produksi atau jasa yang mengacu pada standar
                                            dan prosedur yang berlaku di industri.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Feature Content -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mu-about-left">
                                        <img class="" src="{{ asset('jti/assets/images/about-us.jpg') }}"
                                            alt="img">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mu-about-right">
                                        <ul>
                                            <li>
                                                <h3>Layanan</h3>
                                                <p>Semakin berkembangnya industri di bidang IT,
                                                    TEFA JTI menawarkan berbagai produk IT
                                                    sesuai kebutuhan klien yang dikembangkan
                                                    dengan tim kami, diantaranya adalah produk multimedia.</p>
                                            </li>
                                            <li>
                                                <h3>Mitra</h3>
                                                <p>Semakin berkembangnya industri di bidang IT,
                                                    TEFA JTI menawarkan berbagai produk IT
                                                    sesuai kebutuhan klien yang dikembangkan
                                                    dengan tim kami, diantaranya adalah produk multimedia.</p>
                                            </li>
                                            <li>
                                                <h3>Penyelesain Masalah</h3>
                                                <p>Semakin berkembangnya industri di bidang IT,
                                                    TEFA JTI menawarkan berbagai produk IT
                                                    sesuai kebutuhan klien yang dikembangkan
                                                    dengan tim kami, diantaranya adalah produk multimedia.</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Feature Content -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About -->

        <!-- Call to Action -->
        <section id="mu-youtube">
            <div id="mu-call-to-action">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mu-call-to-action-area">
                                <div class="mu-call-to-action-left">
                                    <h2>Ayo Bergabung Dengan Kami</h2>
                                    <p>Kami mengundang Anda semua untuk bergabung dan bekerja sama di JTI Innovation
                                        Teaching Factory untuk mewujudkan hubungan simbiosis mutualisme. Mari berbagi
                                        pengalaman dan pengetahuan agar tercipta inovasi-inovasi yang berdaya saing di
                                        kancah nasional dan internasional.</p>
                                </div>
                                <a href="#" class="mu-primary-btn mu-quote-btn">Register <i
                                        class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- <!-- Start Services -->
        <section id="mu-service">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mu-service-area">
                            <!-- Title -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mu-title">
                                        <h2>Our exclusive services</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                                            ligula eget dolor. Aenean massa cum sociis.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Service Content -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mu-service-content">
                                        <div class="row">
                                            <!-- Start single service -->
                                            <div class="col-md-4">
                                                <div class="mu-single-service">
                                                    <div class="mu-single-service-icon"><i class="fa fa-shopping-cart"
                                                            aria-hidden="true"></i></div>
                                                    <div class="mu-single-service-content">
                                                        <h3>E-Commerce</h3>
                                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                                            Aenean commodo ligula eget dolor commodo .</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End single service -->
                                            <!-- Start single service -->
                                            <div class="col-md-4">
                                                <div class="mu-single-service">
                                                    <div class="mu-single-service-icon"><i class="fa fa-bullhorn"
                                                            aria-hidden="true"></i></div>
                                                    <div class="mu-single-service-content">
                                                        <h3>Online Marketing</h3>
                                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                                            Aenean commodo ligula eget dolor commodo .</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End single service -->
                                            <!-- Start single service -->
                                            <div class="col-md-4">
                                                <div class="mu-single-service">
                                                    <div class="mu-single-service-icon"><i class="fa fa-laptop"
                                                            aria-hidden="true"></i></div>
                                                    <div class="mu-single-service-content">
                                                        <h3>Web Design</h3>
                                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                                            Aenean commodo ligula eget dolor commodo .</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End single service -->
                                            <!-- Start single service -->
                                            <div class="col-md-4">
                                                <div class="mu-single-service">
                                                    <div class="mu-single-service-icon"><i class="fa fa-mobile"
                                                            aria-hidden="true"></i></div>
                                                    <div class="mu-single-service-content">
                                                        <h3>Mobile Development</h3>
                                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                                            Aenean commodo ligula eget dolor commodo .</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End single service -->
                                            <!-- Start single service -->
                                            <div class="col-md-4">
                                                <div class="mu-single-service">
                                                    <div class="mu-single-service-icon"><i class="fa fa-clock-o"
                                                            aria-hidden="true"></i></div>
                                                    <div class="mu-single-service-content">
                                                        <h3>Customer Support</h3>
                                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                                            Aenean commodo ligula eget dolor commodo .</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End single service -->
                                            <!-- Start single service -->
                                            <div class="col-md-4">
                                                <div class="mu-single-service">
                                                    <div class="mu-single-service-icon"><i class="fa fa-cog"
                                                            aria-hidden="true"></i></div>
                                                    <div class="mu-single-service-content">
                                                        <h3>Customization</h3>
                                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                                            Aenean commodo ligula eget dolor commodo .</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End single service -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Service Content -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services --> --}}

        {{-- <!-- Start Video -->
        <div id="mu-video">
            <div class="row">
                <div class="col-md-6">
                    <div class="mu-video-left">
                        <a href="#" class="mu-video-play-btn"><i class="fa fa-play"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mu-video-right">
                        <p>In this video from our "Talking business" series, our expert discusses the role a business
                            plan can play in the success of your business.</p>
                    </div>
                </div>
            </div>

            <!-- Start Video Popup -->
            <div class="mu-video-popup">
                <div class="mu-video-iframe-area">
                    <a class="mu-video-close-btn" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                    <iframe width="854" height="480" src="https://www.youtube.com/embed/n9AVEl9764s"
                        allowfullscreen></iframe>
                </div>
            </div>
            <!-- End Video Popup -->

        </div>
        <!-- End Video --> --}}

        <!-- Start Portfolio -->
        {{-- <!--/ Section Portfolio Star /-->
        <section id="work-form" class="portfolio-mf sect-pt4 route">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box text-center">
                            <h3 class="title-a">
                                Portfolio
                            </h3>
                            <p class="subtitle-a">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            </p>
                            <div class="line-mf"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        @foreach ($portofolio as $item)
                            <div class="work-box">
                                <img src="{{ url('foto_portofolio/' . $item->foto) }}" data-lightbox="gallery-mf">
                                <div class="work-content">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h2 class="w-title">{{ $item->judul }}</h2>
                                            <p>{{ $item->deskripsi }}</p>
                                            <h2 class="w-title">{{ $item->klien }}</h2>
                                            <div class="w-more">
                                                <span class="w-ctegory">{{ $item->kategori }}</span> / <span
                                                    class="w-date">{{ $item->start_date }}</span> - <span
                                                    class="w-date">{{ $item->end_date }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="w-like">
                                                <span class="ion-ios-plus-outline"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!--/ Section Portfolio End /--> --}}
        <!-- End Portfolio -->

        <!-- Start Pricing Table -->
        <section id="work-form">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box text-center">
                            <h3 class="title-a">
                                Portofolio
                            </h3>
                            <p class="subtitle-a">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            </p>
                            <div class="line-mf"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        @foreach ($portofolio as $item)
                            <div class="work-box">
                                <img src="{{ url('foto_portofolio/' . $item->foto) }}" data-lightbox="gallery-mf">
                                <div class="work-content">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h2 class="w-title">{{ $item->judul }}</h2>
                                            <p>{{ $item->deskripsi }}</p>
                                            <h2 class="w-title">{{ $item->klien }}</h2>
                                            <div class="w-more">
                                                <span class="w-ctegory">{{ $item->kategori }}</span> / <span
                                                    class="w-date">{{ $item->start_date }}</span> - <span
                                                    class="w-date">{{ $item->end_date }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="w-like">
                                                <span class="ion-ios-plus-outline"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- End Pricing Table -->

        {{-- <!-- Start Counter -->
        <section id="mu-counter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mu-counter-area">

                            <div class="mu-counter-block">
                                <div class="row">

                                    <!-- Start Single Counter -->
                                    <div class="col-md-3 col-sm-6">
                                        <div class="mu-single-counter">
                                            <span class="fa fa-suitcase"></span>
                                            <div class="mu-single-counter-content">
                                                <div class="counter-value" data-count="250">0</div>
                                                <h5 class="mu-counter-name">Project</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- / Single Counter -->

                                    <!-- Start Single Counter -->
                                    <div class="col-md-3 col-sm-6">
                                        <div class="mu-single-counter">
                                            <span class="fa fa-user"></span>
                                            <div class="mu-single-counter-content">
                                                <div class="counter-value" data-count="56">0</div>
                                                <h5 class="mu-counter-name">Clients</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- / Single Counter -->

                                    <!-- Start Single Counter -->
                                    <div class="col-md-3 col-sm-6">
                                        <div class="mu-single-counter">
                                            <span class="fa fa-coffee"></span>
                                            <div class="mu-single-counter-content">
                                                <div class="counter-value" data-count="15">0</div>
                                                <h5 class="mu-counter-name">Stuff</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- / Single Counter -->

                                    <!-- Start Single Counter -->
                                    <div class="col-md-3 col-sm-6">
                                        <div class="mu-single-counter">
                                            <span class="fa fa-clock-o"></span>
                                            <div class="mu-single-counter-content">
                                                <div class="counter-value" data-count="290">0</div>
                                                <h5 class="mu-counter-name">Day</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- / Single Counter -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Counter --> --}}

        <!-- Start Pricing Table -->
        {{-- <section id="mu-pricing">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mu-pricing-area">
                            <!-- Title -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mu-title">
                                        <h2>Pendampingan TA</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                                            ligula eget dolor. Aenean massa cum sociis.</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mu-pricing-content">
                                        <ul class="mu-pricing-table">
                                            <li>
                                                <div class="mu-pricing-single">
                                                    <div class="mu-pricing-single-icon">
                                                        <span class="fa fa-user"></span>
                                                    </div>
                                                    <div class="mu-pricing-single-title">
                                                        <h3>Pendampingan TA</h3>
                                                    </div>
                                                    <div class="mu-pricing-single-content">
                                                        <ul>
                                                            <li>Lorem ipsum dolor sit amet.</li>
                                                            <li>Consectetuer elit aeneaneget dolor.</li>
                                                            <li>Aenean massa cum sociis natoque.</li>
                                                            <li>Penatibus.</li>
                                                        </ul>
                                                    </div>
                                                    <div class="mu-single-pricebox">
                                                        <h4>29$<span>/month</span></h4>
                                                    </div>
                                                    <a class="mu-buy-now-btn" href="{{ route('pendaftaran') }}">Daftar</a>
                                                </div>
                                            </li>
                                            <li class="mu-standard-pricing">
                                                <div class="mu-pricing-single">
                                                    <div class="mu-pricing-single-icon">
                                                        <span class="fa fa-lock"></span>
                                                    </div>
                                                    <div class="mu-pricing-single-title">
                                                        <h3>Pendampingan TA</h3>
                                                    </div>
                                                    <div class="mu-pricing-single-content">
                                                        <ul>
                                                            <li>Lorem ipsum dolor sit amet.</li>
                                                            <li>Consectetuer elit aeneaneget dolor.</li>
                                                            <li>Aenean massa cum sociis natoque.</li>
                                                            <li>Penatibus.</li>
                                                        </ul>
                                                    </div>
                                                    <div class="mu-single-pricebox">
                                                        <h4>99$<span>/month</span></h4>
                                                    </div>
                                                    <a class="mu-buy-now-btn" href="#">Daftar</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="mu-pricing-single">
                                                    <div class="mu-pricing-single-icon">
                                                        <span class="fa fa-paper-plane"></span>
                                                    </div>
                                                    <div class="mu-pricing-single-title">
                                                        <h3>Pendampingan TA</h3>
                                                    </div>
                                                    <div class="mu-pricing-single-content">
                                                        <ul>
                                                            <li>Lorem ipsum dolor sit amet.</li>
                                                            <li>Consectetuer elit aeneaneget dolor.</li>
                                                            <li>Aenean massa cum sociis natoque.</li>
                                                            <li>Penatibus.</li>
                                                        </ul>
                                                    </div>
                                                    <div class="mu-single-pricebox">
                                                        <h4>229$<span>/month</span></h4>
                                                    </div>
                                                    <a class="mu-buy-now-btn" href="#">Daftar</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- Start Pricing Table -->
        <section id="mu-pricing">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mu-pricing-area">
                            <!-- Title -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mu-title">
                                        <h2>Pendampingan TA</h2>
                                        <p>Mau Skripsi / Tugas Akhir kamu cepat selesai? Daftar sekarang juga!</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mu-pricing-content">
                                        <div class="mu-pricing-table-wrapper">
                                            <ul class="mu-pricing-table">
                                                @foreach ($skemaPendampingans as $skemaPendampingan)
                                                    <li>
                                                        <div class="mu-pricing-single">
                                                            <div class="mu-pricing-single-icon">
                                                                <span class="fa fa-user"></span>
                                                            </div>
                                                            <div class="mu-pricing-single-title">
                                                                <h3>{{ $skemaPendampingan->nama }}</h3>
                                                            </div>
                                                            <div class="mu-pricing-single-content">
                                                                <ul>
                                                                    <li>{{ $skemaPendampingan->deskripsi }}</li>
                                                                </ul>
                                                            </div>
                                                            <div class="mu-single-pricebox">
                                                                <h4>{{ $skemaPendampingan->harga }}</h4>
                                                            </div>
                                                            {{-- route register pendampingan with parse query param $skemaPendampingan->code --}}
                                                            <a class="mu-buy-now-btn" href="{{ route('register.pendampingan')}}?pendampingan={{ $skemaPendampingan->kode }}">Daftar</a>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Pricing Table -->

        <section id="mu-newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mu-newsletter-area">
                            <!-- Title -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mu-title">
                                        <h2>Pengumuman</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                                            ligula eget dolor. Aenean massa cum sociis.</p>
                                    </div>
                                </div>
                                <table class="table table-bordered">
                                    <!-- Tambahkan baris dan kolom sesuai kebutuhan -->
                                    <thead class="bg-light text-center" style="text-align: center">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-center">Date</th>
                                            <th scope="col" class="px-6 py-3 text-center">Topic</th>
                                            <th scope="col" class="px-6 py-3 text-center">File</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white" style="text-align: start">
                                        <tr class="align-middle">
                                            <td class="text-center">2024-05-14</td>
                                            <td>Jadwal Acara Kegiatan OAV-SNAV 2024 Update (share)</td>
                                            <td class="text-center"><a
                                                    href="http://10.10.0.148/storage/pengumuman_files/S50OyHfkYpXbMrh4GmxrlQS4qRwoKwHSPy0eA319.pdf"
                                                    class="btn btn-sm btn-primary" type="button"><i
                                                        class="nav-icon bx bx-download"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Start from blog -->
        <section id="mu-training">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mu-from-blog-area">
                            <!-- Title -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mu-title">
                                        <h2 style="margin-top : 30px">Informasi Tentang Pelatihan</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                                            ligula eget dolor. Aenean massa cum sociis.</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mu-from-blog-content">
                                        <div class="row">
                                            @foreach ($pelatihan as $item)
                                                <div class="col-md-4">
                                                    <a href="{{route('register.pelatihan')}}?pelatihan={{$item->kode}}">
                                                    <article class="mu-blog-item">
                                                        <img src="{{ asset('storage/'. $item->foto) }}" data-lightbox="gallery-mf">
                                                        <div class="mu-blog-item-content">
                                                            <h2 class="mu-blog-item-title">{{ $item->nama }}</h2>
                                                            <p>{{ $item->deskripsi }}</p>
                                                            <h1>{{ $item->kategori->name }}</h1>
                                                            <p>{{ $item->benefit }}</p>
                                                            <h1>Rp.{{ $item->harga }}</h1>
                                                        </div>
                                                    </article>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End from blog -->

        <!-- Start Clients -->
        <div id="mu-clients" class="mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mu-clients-area">

                            <!-- Start Clients brand logo -->
                            <div class="mu-clients-slider">

                                <div class="mu-clients-single">
                                    <img src="{{ asset('jti/assets/images/client-brand-1.jpg') }}" alt="Brand Logo">
                                </div>

                                <div class="mu-clients-single">
                                    <img src="{{ asset('jti/assets/images/client-brand-2.jpg') }}" alt="Brand Logo">
                                </div>

                                <div class="mu-clients-single">
                                    <img src="{{ asset('jti/assets/images/client-brand-3.jpg') }}" alt="Brand Logo">
                                </div>

                                <div class="mu-clients-single">
                                    <img src="{{ asset('jti/assets/images/client-brand-4.jpg') }}" alt="Brand Logo">
                                </div>

                                <div class="mu-clients-single">
                                    <img src="{{ asset('jti/assets/images/client-brand-5.jpg') }}" alt="Brand Logo">
                                </div>

                                <div class="mu-clients-single">
                                    <img src="{{ asset('jti/assets/images/client-brand-6.jpg') }}" alt="Brand Logo">
                                </div>
                            </div>
                            <!-- End Clients brand logo -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Clients -->

        <!-- start tim kami -->
        <!-- Travel Guide Start -->
        <div id="mu-guide">
            <div class="container-fluid guide py-5">
                <div class="container py-5">
                    <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                        <h1 class="mb-0" style="color: #323232">Tim Kami</h1>
                    </div>
                    <div id="teamCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="guide-item">
                                            <div class="guide-img">
                                                <div class="guide-img-efects">
                                                    <img src="{{ asset('belajar/img/guide-1.jpg') }}"
                                                        class="img-fluid w-100 rounded-top" alt="Image">
                                                </div>
                                                <div class="guide-icon rounded-pill p-2">
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-facebook-f"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-twitter"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-instagram"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-linkedin-in"></i></a>
                                                </div>
                                            </div>
                                            <div class="guide-title text-center rounded-bottom p-4">
                                                <div class="guide-title-inner">
                                                    <h4 class="mt-3">Full Name</h4>
                                                    <p class="mb-0">Designation</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="guide-item">
                                            <div class="guide-img">
                                                <div class="guide-img-efects">
                                                    <img src="{{ asset('belajar/img/guide-1.jpg') }}"
                                                        class="img-fluid w-100 rounded-top" alt="Image">
                                                </div>
                                                <div class="guide-icon rounded-pill p-2">
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-facebook-f"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-twitter"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-instagram"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-linkedin-in"></i></a>
                                                </div>
                                            </div>
                                            <div class="guide-title text-center rounded-bottom p-4">
                                                <div class="guide-title-inner">
                                                    <h4 class="mt-3">Full Name</h4>
                                                    <p class="mb-0">Designation</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="guide-item">
                                            <div class="guide-img">
                                                <div class="guide-img-efects">
                                                    <img src="{{ asset('belajar/img/guide-1.jpg') }}"
                                                        class="img-fluid w-100 rounded-top" alt="Image">
                                                </div>
                                                <div class="guide-icon rounded-pill p-2">
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-facebook-f"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-twitter"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-instagram"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-linkedin-in"></i></a>
                                                </div>
                                            </div>
                                            <div class="guide-title text-center rounded-bottom p-4">
                                                <div class="guide-title-inner">
                                                    <h4 class="mt-3">Full Name</h4>
                                                    <p class="mb-0">Designation</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="guide-item">
                                            <div class="guide-img">
                                                <div class="guide-img-efects">
                                                    <img src="{{ asset('belajar/img/guide-1.jpg') }}"
                                                        class="img-fluid w-100 rounded-top" alt="Image">
                                                </div>
                                                <div class="guide-icon rounded-pill p-2">
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-facebook-f"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-twitter"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-instagram"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-linkedin-in"></i></a>
                                                </div>
                                            </div>
                                            <div class="guide-title text-center rounded-bottom p-4">
                                                <div class="guide-title-inner">
                                                    <h4 class="mt-3">Full Name</h4>
                                                    <p class="mb-0">Designation</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Duplicate and customize the other 3 items here -->
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="guide-item">
                                            <div class="guide-img">
                                                <div class="guide-img-efects">
                                                    <img src="{{ asset('belajar/img/guide-2.jpg') }}"
                                                        class="img-fluid w-100 rounded-top" alt="Image">
                                                </div>
                                                <div class="guide-icon rounded-pill p-2">
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-facebook-f"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-twitter"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-instagram"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-linkedin-in"></i></a>
                                                </div>
                                            </div>
                                            <div class="guide-title text-center rounded-bottom p-4">
                                                <div class="guide-title-inner">
                                                    <h4 class="mt-3">Full Name</h4>
                                                    <p class="mb-0">Designation</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="guide-item">
                                            <div class="guide-img">
                                                <div class="guide-img-efects">
                                                    <img src="{{ asset('belajar/img/guide-2.jpg') }}"
                                                        class="img-fluid w-100 rounded-top" alt="Image">
                                                </div>
                                                <div class="guide-icon rounded-pill p-2">
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-facebook-f"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-twitter"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-instagram"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-linkedin-in"></i></a>
                                                </div>
                                            </div>
                                            <div class="guide-title text-center rounded-bottom p-4">
                                                <div class="guide-title-inner">
                                                    <h4 class="mt-3">Full Name</h4>
                                                    <p class="mb-0">Designation</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="guide-item">
                                            <div class="guide-img">
                                                <div class="guide-img-efects">
                                                    <img src="{{ asset('belajar/img/guide-2.jpg') }}"
                                                        class="img-fluid w-100 rounded-top" alt="Image">
                                                </div>
                                                <div class="guide-icon rounded-pill p-2">
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-facebook-f"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-twitter"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-instagram"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-linkedin-in"></i></a>
                                                </div>
                                            </div>
                                            <div class="guide-title text-center rounded-bottom p-4">
                                                <div class="guide-title-inner">
                                                    <h4 class="mt-3">Full Name</h4>
                                                    <p class="mb-0">Designation</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="guide-item">
                                            <div class="guide-img">
                                                <div class="guide-img-efects">
                                                    <img src="{{ asset('belajar/img/guide-2.jpg') }}"
                                                        class="img-fluid w-100 rounded-top" alt="Image">
                                                </div>
                                                <div class="guide-icon rounded-pill p-2">
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-facebook-f"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-twitter"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-instagram"></i></a>
                                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                                            class="fab fa-linkedin-in"></i></a>
                                                </div>
                                            </div>
                                            <div class="guide-title text-center rounded-bottom p-4">
                                                <div class="guide-title-inner">
                                                    <h4 class="mt-3">Full Name</h4>
                                                    <p class="mb-0">Designation</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Duplicate and customize the other 3 items here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Travel Guide End -->
        <!-- Map Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h1 class="mb-0" style="color: #323232">Lokasi Kami</h1>
                </div>
                <div style="width: 100%; height: 700%;">
                    <iframe src="{{ $webConfig->map }}" width="100%" height="500" style="border:0;"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <!-- Map End -->
    </main>

    <!-- End main content -->


    <!-- Start footer -->
    <footer id="mu-footer">
        <div class="mu-footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="mu-single-footer">
                            <img class="mu-footer-logo" src="{{ asset('jti/assets/images/logo.png') }}"
                                alt="logo">
                            <p>{{ $webConfig->introduction }}</p>
                            <div class="mu-social-media">
                                <a href="{{ $webConfig->facebook }}"><i class="fa fa-facebook"></i></a>
                                <a class="" href="{{ $webConfig->twitter }}"><i class="fa fa-twitter"></i></a>
                                {{-- <a class="mu-pinterest" href="#"><i class="fa fa-pinterest-p"></i></a> --}}
                                {{-- <a class="mu-google-plus" href="#"><i class="fa fa-google-plus"></i></a> --}}
                                <a class="" href="{{ $webConfig->youtube }}"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mu-single-footer">
                            <h3>Twitter feed</h3>
                            <ul class="list-unstyled">
                                <li class="media">
                                    <span class="fa fa-twitter"></span>
                                    <div class="media-body">
                                        <p><strong>@b_jtinova</strong> Lorem ipsum dolor sit amet, consectetuer
                                            adipiscing
                                            elit.</p>
                                        <a href="#">2 hours ago</a>
                                    </div>
                                </li>
                                <li class="media">
                                    <span class="fa fa-twitter"></span>
                                    <div class="media-body">
                                        <p><strong>@_jtinov</strong> Lorem ipsum dolor sit amet, consectetuer adipiscing
                                            elit.</p>
                                        <a href="#">2 hours ago</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mu-single-footer">
                            <h3>Company</h3>
                            <ul class="mu-useful-links">
                                <li><a href="#">News</a></li>
                                <li><a href="#">Training</a></li>
                                <li><a href="#">Portfolio</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mu-single-footer">
                            <h3>Contact Information</h3>
                            <ul class="list-unstyled">
                                <li class="media">
                                    <span class="fa fa-home"></span>
                                    <div class="media-body">
                                        <p>{{ $webConfig->location }}</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <span class="fa fa-phone"></span>
                                    <div class="media-body">
                                        <p>{{ $webConfig->phone }}</p>
                                        {{-- <p>+62 8213 4562 9876</p> --}}
                                    </div>
                                </li>
                                <li class="media">
                                    <span class="fa fa-envelope"></span>
                                    <div class="media-body">
                                        <p>{{ $webConfig->email }}</p>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mu-footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mu-footer-bottom-area">
                            <p class="mu-copy-right">&copy; Copyright <a rel="nofollow" href="http://markups.io">jti
                                    nova</a>. All right reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End footer -->


    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>
    <!-- Slick slider -->
    <script type="text/javascript" src="{{ asset('jti/assets/js/slick.min.js') }}"></script>
    <!-- Progress Bar -->
    <script src="https://unpkg.com/circlebars@1.0.3/dist/circle.js"></script>
    <!-- Filterable Gallery js -->
    <script type="text/javascript" src="{{ asset('jti/assets/js/jquery.filterizr.min.js') }}"></script>
    <!-- Gallery Lightbox -->
    <script type="text/javascript" src="{{ asset('jti/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Counter js -->
    <script type="text/javascript" src="{{ asset('jti/assets/js/counter.js') }}"></script>
    <!-- Ajax contact form  -->
    <script type="text/javascript" src="{{ asset('jti/assets/js/app.js') }}"></script>


    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('jti/assets/js/custom.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- About us Skills Circle progress  -->
    <script>
        // First circle
        new Circlebar({
            element: "#circle-1",
            type: "progress",
            maxValue: "90"
        });

        // Second circle
        new Circlebar({
            element: "#circle-2",
            type: "progress",
            maxValue: "84"
        });

        // Third circle
        new Circlebar({
            element: "#circle-3",
            type: "progress",
            maxValue: "60"
        });

        // Fourth circle
        new Circlebar({
            element: "#circle-4",
            type: "progress",
            maxValue: "74"
        });
    </script>

</body>

</html>
