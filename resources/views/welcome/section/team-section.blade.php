<section id="team" class="team section section-bg">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Tim Kami</h2>
    <p>Tim kami terdiri dari orang-orang yang berpengalaman dan berdedikasi tinggi dalam bidangnya.</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">
      @foreach ($pegawai as $item)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">

        <div class="team-member">
          <div class="member-img">
            <img src="{{ asset('storage/' . $item->user->foto) }}" class="img-fluid" alt="">
            <div class="social">
              @if ($item->user->instagram)
                <a href="{{ $item->user->instagram }}" target="_blank"><i class="bi bi-instagram"></i></a>
              @endif
              @if ($item->user->linkedin)
                  <a href="{{ $item->user->linkedin }}" target="_blank"><i class="bi bi-linkedin"></i></a>
              @endif
            </div>
          </div>
          <div class="member-info">
            <h4>{{ $item->user->name }}</h4>
            <span>{{ $item->jabatan->nama }}</span>
          </div>
        </div>
      </div><!-- End Team Member -->
      @endforeach
    </div>
  </div>
</section>