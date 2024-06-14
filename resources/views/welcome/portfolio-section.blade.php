<section id="portfolio" class="portfolio section section-bg">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Portfolio</h2>
    <p>Teaching Factory JTI Innovation telah bekerja sama dengan berbagai instansi dan perusahaan untuk menyediakan solusi teknologi dan inovasi yang terbaik. Lihat portofolio kami untuk mengetahui lebih lanjut tentang proyek-proyek yang telah kami kerjakan.</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

      <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
        <li data-filter="*" class="filter-active">All</li>
        @foreach ($kategori as $item)
        <li data-filter=".filter-{{ $item->name }}"> {{ $item->name }}</li>
        @endforeach
      </ul><!-- End Portfolio Filters -->

      <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
        @foreach($portofolio as $item)
        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $item->category->name}}">
          <div class="portfolio-content h-100">
            <img src="{{ asset('storage/' .$item->images->first()->image_url)}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{ $item->judul }}</h4>
              <p>{{ $item->deskripsi }}</p>
              <a href="{{ asset('storage/' .$item->images->first()->image_url)}}" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="{{ route('portfolio.show', $item->id) }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
          </div>
        </div><!-- End Portfolio Item -->
        @endforeach

      </div><!-- End Portfolio Container -->

    </div>

  </div>

</section>