<section id="pendampingan" class="pricing section section-bg">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Pendampingan</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row g-4 g-lg-0">

      
      @foreach($skemaPendampingans as $item)
      
      <div class="col-lg-4 @if($item->id == 2) {{"featured"}} @endif" data-aos="zoom-in" data-aos-delay="100">
        <div class="pricing-item">
          <h3>{{$item->nama}}</h3>
          <h4>@currency($item->harga)<span></span></h4>
          <p>{{$item->deskripsi}}</p>
          {{-- <ul>
            <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
            <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
            <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
            <li class="na"><i class="bi bi-x"></i> <span>Pharetra massa massa ultricies</span></li>
            <li class="na"><i class="bi bi-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
          </ul> --}}
          <div class="text-center"><a href="{{route('register.pendampingan')}}?pendampingan={{ $item->kode }}" class="buy-btn">Daftar</a></div>
        </div>
      </div><!-- End Pricing Item -->
      @endforeach

    </div>

  </div>

</section>