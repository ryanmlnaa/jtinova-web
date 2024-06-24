<section id="contact" class="contact section">

  <!-- Section Title -->
  <div class="container section-title aos-init aos-animate" data-aos="fade-up">
    <h2>Hubungi Kami</h2>
    <p>Hubungi kami melalui formulir di bawah ini.</p>
  </div><!-- End Section Title -->

  <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">
      <div class="col-lg-6 ">
        <div class="row gy-4">

          <div class="col-lg-12">
            <div class="info-item d-flex flex-column justify-content-center align-items-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3>Alamat</h3>
              <p>{{ $webConfig->location }}</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Telepon</h3>
              <p>{{ $webConfig->phone }}</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p>{{ $webConfig->email }}</p>
            </div>
          </div><!-- End Info Item -->

        </div>
      </div>

      <div class="col-lg-6">
        <form action="{{route('contact-message.store')}}" method="post" class="php-email-form aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
          @csrf  
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Anda" value="{{ old('name') }}" required>
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-md-6 ">
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Surel Anda" value="{{ old('email') }}" required>
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" placeholder="Subjek" value="{{ old('subject') }}" required>
              @error('subject')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-md-12">
              <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="6" placeholder="Pesan" required>{{ old('message') }}</textarea>
              @error('message')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-md-12">
              <div class="checkbox mb-3">
                <!-- The following line controls and configures the Turnstile widget. -->
                <div class="cf-turnstile" data-sitekey="{{ config('services.cloudflare.turnstile.site_key') }}" data-theme="light" data-callback="onTurnstileSuccess"></div>
                <!-- end. -->
              </div>
            </div>

            <div class="col-md-12 text-center">
              <button type="submit">Kirim Pesan</button>
            </div>

          </div>
        </form>
      </div><!-- End Contact Form -->

    </div>

  </div>

</section>

@push('scripts')
<script>
  window.onTurnstileSuccess = function (code) {
    document.querySelector('form button[type="submit"]').disabled = false;
}
</script>
@endpush