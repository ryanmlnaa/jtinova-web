<section id="tabs" class="tabs section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up" data-aos-delay="100">
    <h2>Daftar Disini</h2>
    <p>Teaching Factory JTI Innovation menyediakan berbagai layanan seperti pelatihan, pendampingan, instruktur, dan magang mahasiswa MBKM. Daftar sekarang untuk bergabung dengan kami dan tingkatkan keterampilan Anda di bidang teknologi dan inovasi.</p>
  </div><!-- End Section Title -->

  <div class="container">

    <ul class="nav nav-tabs row d-flex aos-init" data-aos="fade-up" data-aos-delay="100" role="tablist">
      <li class="nav-item col-3" role="presentation">
        <a class="nav-link layanans active" id="layanan-pelatihan" data-bs-toggle="tab" data-bs-target="#tabs-tab-1" aria-selected="false" role="tab">
          <i class="bi bi-briefcase"></i>
          <h4 class="d-none d-lg-block">Pelatihan</h4>
        </a>
      </li>
      <li class="nav-item col-3" role="presentation">
        <a class="nav-link layanans" id="layanan-pendampingan" data-bs-toggle="tab" data-bs-target="#tabs-tab-2" aria-selected="false" role="tab" tabindex="-1">
          <i class="bi bi-card-checklist"></i>
          <h4 class="d-none d-lg-block">Pendampingan</h4>
        </a>
      </li>
      <li class="nav-item col-3" role="presentation">
        <a class="nav-link layanans" id="layanan-instruktur" data-bs-toggle="tab" data-bs-target="#tabs-tab-3" aria-selected="false" role="tab" tabindex="-1">
          <i class="bi bi-bar-chart"></i>
          <h4 class="d-none d-lg-block">Instruktur</h4>
        </a>
      </li>
      <li class="nav-item col-3" role="presentation">
        <a class="nav-link layanans" id="layanan-mbkm" data-bs-toggle="tab" data-bs-target="#tabs-tab-4" aria-selected="true" role="tab" tabindex="-1">
          <i class="bi bi-binoculars"></i>
          <h4 class="d-none d-lg-block">Magang</h4>
        </a>
      </li>
    </ul><!-- End Tab Nav -->

    <div class="tab-content aos-init" data-aos="fade-up" data-aos-delay="200">

      <div class="tab-pane fade active show" id="tabs-tab-1" role="tabpanel">
        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Pelatihan Guru SMK / Karyawan / Umum</h3>
                <p class="fst-italic">
                    Teaching Factory JTI Innovation menawarkan berbagai program pelatihan yang dirancang untuk meningkatkan keterampilan teknis dan praktis peserta. 
                    Pelatihan kami mencakup berbagai bidang teknologi dan inovasi, dengan kurikulum yang disesuaikan dengan kebutuhan industri untuk memastikan lulusan siap kerja.
                </p>
                <ul>
                    <li><i class="bi bi-check2-all"></i>
                        <span>Program pelatihan yang mencakup teknologi terbaru dan praktik industri.</span>
                    </li>
                    <li><i class="bi bi-check2-all"></i> 
                        <span>Instruktur berpengalaman dari kalangan akademisi dan praktisi industri.</span>
                    </li>
                    <li><i class="bi bi-check2-all"></i> 
                        <span>Fasilitas pelatihan yang lengkap dan modern untuk mendukung proses belajar.</span>
                    </li>
                </ul>
                <p>
                    Pelatihan yang kami tawarkan bertujuan untuk mempersiapkan peserta dengan keterampilan yang dibutuhkan untuk bersaing di dunia kerja, dengan fokus pada penerapan praktis dan pengalaman langsung.
                </p>
                <a href="{{route('katalog.pelatihan.index')}}" class="btn-lihat-layanan">Lihat Detail</a>
                <a href="{{route('register')}}" class="btn-daftar-layanan">Daftar</a>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="{{asset('static/sementara.jpg')}}" alt="" class="img-fluid">
            </div>
        </div>
    </div><!-- End Tab Content Item -->        

      <div class="tab-pane fade" id="tabs-tab-2" role="tabpanel">
        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
            <h3>Pendampingan TA / Skripsi</h3>
            <p class="fst-italic">
                Teaching Factory JTI Innovation menyediakan layanan pendampingan bagi mahasiswa yang sedang mengerjakan Tugas Akhir (TA) atau Skripsi. Kami menawarkan bimbingan intensif untuk membantu mahasiswa menyelesaikan penelitian mereka dengan sukses.
            </p>
            <ul>
                <li><i class="bi bi-check2-all"></i>
                    <span>Pendampingan oleh praktisi berpengalaman di bidang terkait.</span>
                </li>
                <li><i class="bi bi-check2-all"></i> 
                    <span>Bimbingan dalam metodologi penelitian, analisis data, dan penulisan laporan.</span>
                </li>
                <li><i class="bi bi-check2-all"></i> 
                    <span>Akses ke fasilitas dan sumber daya yang mendukung penelitian mahasiswa.</span>
                </li>
            </ul>
            <p>
                Layanan pendampingan kami bertujuan untuk memastikan bahwa mahasiswa mendapatkan dukungan yang mereka butuhkan untuk menghasilkan karya ilmiah yang berkualitas dan memenuhi standar akademik yang tinggi.
            </p>
            <a href="{{route('katalog.pendampingan.index')}}" class="btn-lihat-layanan">Lihat Detail</a>
            <a href="{{route('register')}}" class="btn-daftar-layanan">Daftar</a>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 text-center">
            <img src="{{asset('static/sementara.jpg')}}" alt="" class="img-fluid">
          </div>
        </div>
      </div><!-- End Tab Content Item -->

      <div class="tab-pane fade" id="tabs-tab-3" role="tabpanel">
        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
            <h3>Instruktur</h3>
            <p class="fst-italic">
                Teaching Factory JTI Innovation membuka peluang bagi siapa saja yang ingin menjadi instruktur di TEFA. Kami mengundang para profesional dan praktisi industri yang memiliki pengetahuan dan pengalaman di bidang teknologi dan inovasi untuk bergabung dengan kami.
            </p>
            <ul>
                <li><i class="bi bi-check2-all"></i>
                    <span>Berbagi ilmu dan keterampilan dengan peserta yang antusias.</span>
                </li>
                <li><i class="bi bi-check2-all"></i> 
                    <span>Berperan dalam pengembangan pendidikan vokasi yang berkualitas.</span>
                </li>
                <li><i class="bi bi-check2-all"></i> 
                    <span>Meningkatkan kompetensi dan kemandirian peserta melalui pembelajaran praktis.</span>
                </li>
            </ul>
            <p>
                Sebagai instruktur di TEFA, Anda akan memiliki kesempatan untuk berkontribusi pada pengembangan keterampilan dan pengetahuan peserta, serta membantu mereka siap menghadapi tantangan di dunia industri.
            </p>
            <a href="{{route('instrukturTimeline.index')}}" class="btn-lihat-layanan">Lihat Timeline</a>
            <a href="{{route('register.instruktur')}}" class="btn-daftar-layanan">Daftar</a>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 text-center">
            <img src="{{asset('static/sementara.jpg')}}" alt="" class="img-fluid">
          </div>
        </div>
      </div><!-- End Tab Content Item -->

      <div class="tab-pane fade" id="tabs-tab-4" role="tabpanel">
        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
            <h3>Magang Mahasiswa MBKM (Merdeka Belajar Kampus Merdeka)</h3>
            <p class="fst-italic">
              Teaching Factory JTI Innovation menyediakan dua jenis program magang: Magang MBKM khusus Mahasiswa Polije dan Magang Freelance. Kedua program ini dirancang untuk memberikan pengalaman kerja nyata dan keterampilan praktis yang relevan dengan kebutuhan industri.
            </p>
            <h4>Magang MBKM (Merdeka Belajar Kampus Merdeka)</h4>
            <ul>
                <li><i class="bi bi-check2-all"></i>
                    <span>Kesempatan untuk bekerja langsung dengan profesional di bidang terkait.</span>
                </li>
                <li><i class="bi bi-check2-all"></i> 
                    <span>Pengalaman praktis yang relevan dengan kurikulum akademik.</span>
                </li>
                <li><i class="bi bi-check2-all"></i> 
                    <span>Pengembangan keterampilan soft skills seperti komunikasi dan kerja tim.</span>
                </li>
            </ul>
            <a href="{{route('mbkmTimeline.index')}}" class="btn-lihat-layanan">Lihat Timeline</a>
            <a href="{{route('register.mbkm')}}" class="btn-daftar-layanan">Daftar</a>

            <h4 class="mt-3">Magang Freelance</h4>
            <ul>
                <li><i class="bi bi-check2-all"></i>
                    <span>Fleksibilitas untuk bekerja dari mana saja dan mengatur waktu kerja secara mandiri.</span>
                </li>
                <li><i class="bi bi-check2-all"></i> 
                    <span>Kesempatan untuk mengerjakan proyek nyata dan mendapatkan portofolio yang kuat.</span>
                </li>
                <li><i class="bi bi-check2-all"></i> 
                    <span>Pengembangan keterampilan teknis dan manajerial melalui pengalaman kerja freelance.</span>
                </li>
            </ul>
            <p>
                Program ini dirancang untuk mempersiapkan peserta agar siap menghadapi tantangan di dunia kerja, dengan memberikan pengalaman langsung dan pemahaman mendalam tentang praktik industri.
            </p>
            <a href="{{route('freelanceTimeline.index')}}" class="btn-lihat-layanan">Lihat Timeline</a>
            <a href="{{route('register.freelance')}}" class="btn-daftar-layanan">Daftar</a>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 text-center">
            <img src="{{asset('static/sementara.jpg')}}" alt="" class="img-fluid">
          </div>
        </div>
      </div><!-- End Tab Content Item -->

    </div>

  </div>

</section>

@push('scripts')
<script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
<script>
  $(document).ready(function() {
    function clickTabs(idLayanan, idTab) {
      $('.layanans').removeClass('active');
      $('.layanans').attr('aria-selected', 'false');
      $('.layanans').attr('tabindex', '-1');
      $('.tab-pane').removeClass('active');
      $('.tab-pane').removeClass('show');
      $(idLayanan).addClass('active');
      $(idLayanan).attr('aria-selected', 'true');
      $(idLayanan).attr('tabindex', '0');
      $(idTab).addClass('active');
      $(idTab).addClass('show');
    }

    $('.pelatihan-tabs').click(function() {
      clickTabs('#layanan-pelatihan', '#tabs-tab-1');
    });

    $('.pendampingan-tabs').click(function() {
      clickTabs('#layanan-pendampingan', '#tabs-tab-2');
    });

    $('.instruktur-tabs').click(function() {
      clickTabs('#layanan-instruktur', '#tabs-tab-3');
    });

    $('.mbkm-tabs').click(function() {
      clickTabs('#layanan-mbkm', '#tabs-tab-4');
    });
  });
</script>
@endpush