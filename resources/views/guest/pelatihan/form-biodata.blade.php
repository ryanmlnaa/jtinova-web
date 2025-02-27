@php
  $pelatihans = \App\Models\Pelatihan::where('status', 'Aktif')->get();
@endphp
<div class="card">
  <div class="card-header">
      <h4>Silakan Lengkapi Data Diri Berikut</h4>
  </div>
  <div class="card-body">
      <form method="POST" action="{{route('pelatihan.pelatihanuser.update', auth()->user()->pelatihanUser)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="form-group col-6">
              <label for="no_hp">No HP / WA</label> <span class="text-danger">*</span>
              <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
                  value="{{ old('no_hp') }}" required>
              @error('no_hp')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group col-6">
              <label for="jenis_kelamin">Jenis Kelamin</label> <span class="text-danger">*</span>
              <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                  <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                  <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
              </select>
              @error('jenis_kelamin')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="alamat">Alamat</label> <span class="text-danger">*</span>
            <textarea id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required>{{ old('alamat') }}</textarea>
            @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="pendidikan_terakhir">Pendidikan Terakhir</label> <span class="text-danger">*</span>
              <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" required>
                  <option value="SD" {{ old('pendidikan_terakhir') == 'SD' ? 'selected' : '' }}>SD</option>
                  <option value="SMP" {{ old('pendidikan_terakhir') == 'SMP' ? 'selected' : '' }}>SMP</option>
                  <option value="SMA" {{ old('pendidikan_terakhir') == 'SMA' ? 'selected' : '' }}>SMA / SMK</option>
                  <option value="D3" {{ old('pendidikan_terakhir') == 'D3' ? 'selected' : '' }}>D3</option>
                  <option value="D4" {{ old('pendidikan_terakhir') == 'D4' ? 'selected' : '' }}>D4</option>
                  <option value="S1" {{ old('pendidikan_terakhir') == 'S1' ? 'selected' : '' }}>S1</option>
                  <option value="S2" {{ old('pendidikan_terakhir') == 'S2' ? 'selected' : '' }}>S2</option>
                  <option value="S3" {{ old('pendidikan_terakhir') == 'S3' ? 'selected' : '' }}>S3</option>
              </select>
              @error('pendidikan_terakhir')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group col-6">
              <label for="pekerjaan">Pekerjaan</label> <span class="text-danger">*</span>
              <input id="pekerjaan" type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan"
                  value="{{ old('pekerjaan') }}" required>
              @error('pekerjaan')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="foto">Upload Foto Terbaru</label>
            <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto"
                value="{{ old('foto') }}" required>
            @error('foto')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>

          @cannot('pending')
          <div class="row">
            <div class="form-group col-6">
              <label for="pelatihan_id">Pelatihan yang Dipilih</label> <span class="text-danger">*</span>
              <select name="pelatihan_id" id="pelatihan_id" class="form-control @error('pelatihan_id') is-invalid @enderror" required>
              <option value="">Pilih Pelatihan</option>
              @foreach ($pelatihans as $pelatihan)
                  <option value="{{ $pelatihan->id }}" {{ old('pelatihan_id', auth()->user()->pelatihanUser->id) == $pelatihan->id ? 'selected' : '' }}>{{ $pelatihan->nama }}</option>
              @endforeach
              </select>
              @error('pelatihan_id')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group col-6">
              <label for="skema">Skema</label> <span class="text-danger">*</span>
              <select name="skema" id="skema" class="form-control @error('skema') is-invalid @enderror" required>
                <option value="individu">Individu</option>
                <option value="kelompok">Kelompok</option>
              </select>
              @error('skema')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
          </div>

          <div class="form-group" id="informasi_pelatihan" style="display: none;">
            <div class="card card-primary">
              <div class="card-header">
                  <h4>Informasi Pelatihan</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-6">
                          <p><strong>Kode Pelatihan:</strong> <span id="kode_pelatihan"></span></p>
                          <p><strong>Nama Pelatihan:</strong> <span id="nama_pelatihan"></span></p>
                          <p><strong>Deskripsi:</strong> <span id="deskripsi"></span></p>
                          <p><strong>Benefit:</strong> <span id="benefit"></span></p>
                          <p><strong>Tempat:</strong> <span id="lokasi"></span></p>
                      </div>
                      <div class="col-6">
                        <p><strong>Tanggal Mulai:</strong> <span id="tanggal_mulai"></span></p>
                        <p><strong>Tanggal Selesai:</strong> <span id="tanggal_selesai"></span></p>
                        <p><strong>Biaya:</strong> <span id="harga"></span></p>
                        <p><strong>Kuota:</strong> <span id="kuota"></span></p>
                        <p><strong>Maksimal per TIM:</strong> <span id="kuota_tim"></span> Orang</p>
                      </div>
                  </div>
              </div>
            </div>
          </div>

          <div class="row input-copy-here form-kelompok" style="display: none;">
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
                  {{-- add tooltip --}}
                  <button type="button" class="btn btn-outline-primary btn-add" data-toggle="tooltip" data-placement="top" title="Tambah Anggota"><i class="fas fa-plus-square"></i></button>
                </div>
              </div>
            </div>
          </div>
          @endcannot

          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block">
                  Simpan
              </button>
          </div>
      </form>

      <div class="row form-group input-copy" style="display: none;">
        <div class="input-group">
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
                <button type="button" class="btn btn-outline-primary btn-remove" data-toggle="tooltip" data-placement="top" title="Hapus Anggota"><i class="fas fa-minus-square"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

@push('scripts')
  <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
  <script>
    function getPelatihanDetail(idPelatihan){
      $.ajax({
          url: "{{ url('api/pelatihan') }}/" + idPelatihan,
          type: 'GET',
          success: function(response) {
            $('#informasi_pelatihan').show();
            $('#kode_pelatihan').text(response.data.kode);
            $('#nama_pelatihan').text(response.data.nama);
            $('#deskripsi').text(response.data.deskripsi);
            $('#benefit').text(response.data.benefit);
            $('#lokasi').text(response.data.lokasi);
            $('#tanggal_mulai').text(response.data.tanggal_mulai);
            $('#tanggal_selesai').text(response.data.tanggal_selesai);
            $('#harga').text(response.data.harga);
            $('#kuota').text(response.data.kuota);
            $('#kuota_tim').text(response.data.kuota_tim);
          }
        });
    }
    $(document).ready(function() {
      getPelatihanDetail($("#pelatihan_id").val());
      let kuota_tim = 0;
      // max click btn-add based on kuota_tim
      $('body').on('click', '.btn-add', function () {
          if ($('.input-copy-here .input-group').length >= kuota_tim - 1) {
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Maksimal anggota tim adalah ' + kuota_tim + ' orang!',
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
          kuota_tim = parseInt($('#kuota_tim').text());

          $('.form-kelompok').show();
        } else {
          $('.form-anggota').val('');
          $('.form-kelompok').hide();
        }
      });

      $('#pelatihan_id').on('change', function() {
        if ($(this).val() == '') {
          $('#skema').val('');
          $('.form-anggota').val('');
          $('.form-kelompok').hide();
        } else {
          $('#skema').val('individu');
          $('.form-anggota').val('');
          $('.form-kelompok').hide();
        }

        getPelatihanDetail($(this).val());
      });
    });
  </script>
@endpush