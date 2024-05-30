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
                  value="{{ old('no_hp') }}">
              @error('no_hp')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group col-6">
              <label for="jenis_kelamin">Jenis Kelamin</label> <span class="text-danger">*</span>
              <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
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
            <textarea id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat">{{ old('alamat') }}</textarea>
            @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="pendidikan_terakhir">Pendidikan Terakhir</label> <span class="text-danger">*</span>
              <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror">
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
                  value="{{ old('pekerjaan') }}">
              @error('pekerjaan')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="pelatihan_id">Pelatihan yang Dipilih</label> <span class="text-danger">*</span>
            <select name="pelatihan_id" id="pelatihan_id" class="form-control @error('pelatihan_id') is-invalid @enderror">
            @foreach ($pelatihans as $pelatihan)
                <option value="{{ $pelatihan->id }}" {{ old('pelatihan_id', auth()->user()->pelatihanUser->pelatihan_id) == $pelatihan->id ? 'selected' : '' }}>{{ $pelatihan->nama }}</option>
            @endforeach
            </select>
            @error('pelatihan_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="foto">Upload Foto Terbaru</label>
            <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto"
                value="{{ old('foto') }}">
            @error('foto')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block">
                  Simpan
              </button>
          </div>
      </form>
  </div>
</div>