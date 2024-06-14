<section id="hero" class="hero section">

  <img src="{{asset ('storage/'.$webConfig->brand_logo) }}" alt="" data-aos="fade-in">

  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h2 data-aos="fade-up" data-aos-delay="100">{{ $webConfig->name }}</h2>
        <p data-aos="fade-up" data-aos-delay="200">{{ $webConfig->introduction }}</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="#about" class="btn-get-started">Tentang Kami</a>
          <a href="{{$webConfig->video}}" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
        </div>

      </div>
    </div>
  </div>

</section>