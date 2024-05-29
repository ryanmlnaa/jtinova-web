<div class="card">
  <div class="card-header">
      <h4>Silakan Lengkapi Data Diri Berikut</h4>
  </div>
  <div class="card-body">
      <form method="POST" action="{{ route('mbkm.mbkmuser.update', $dataUser) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
              <div class="form-group col-6">
                  <label for="nim">NIM</label>
                  <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" name="nim"
                      value="{{ old('nim') }}">
                  @error('nim')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-group col-6">
                  <label for="prodi_id">Prodi</label>
                  <select name="prodi_id" id="prodi_id" class="form-control @error('prodi_id') is-invalid @enderror">
                  @foreach ($prodis as $prodi)
                      <option value="{{ $prodi->id }}">{{ $prodi->name }}</option>
                  @endforeach
                  </select>
                  @error('prodi_id')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
          </div>

          <div class="row">
              <div class="form-group col-6">
                  <label for="semester">Semester</label>
                  <select name="semester" id="semester" class="form-control @error('semester') is-invalid @enderror">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  </select>
                  @error('semester')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-group col-6">
                  <label for="golongan">Golongan</label>
                  <select name="golongan" id="golongan" class="form-control @error('golongan') is-invalid @enderror">
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                  <option value="E">E</option>
                  </select>
                  @error('golongan')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
          </div>

          <div class="row">
              <div class="form-group col-6">
                  <label for="tahun_masuk">Tahun Masuk Politeknik</label>
                  <input id="tahun_masuk" type="text" class="form-control @error('tahun_masuk') is-invalid @enderror" name="tahun_masuk"
                      value="{{ old('tahun_masuk') }}" autofocus>
                  @error('tahun_masuk')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
              </div>

              <div class="form-group col-6">
                  <label for="no_hp">No HP</label>
                  <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
                      value="{{ old('no_hp') }}">
                  @error('no_hp')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
          </div>

          <div class="form-group">
              <label for="keahlian">Skill / Library / Framework / Tools yang dikuasi</label>
              <div class="row">
                  @foreach ($keahlians as $keahlian)
                  <div class="col-4">
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="keahlian-{{ $keahlian->id }}"
                              name="keahlian_id[]" value="{{ $keahlian->id }}" @if (is_array(old('keahlian_id')) && in_array($keahlian->id, old('keahlian_id'))) checked @endif>
                          <label class="custom-control-label" for="keahlian-{{ $keahlian->id }}">
                              {{ $keahlian->nama }}
                          </label>
                      </div>
                  </div>
                  @endforeach
              </div>
          </div>

          <div class="row">
              <div class="form-group col-6">
                  <label for="khs">Upload KHS dari semester awal - terakhir</label>
                  <input id="khs" type="file" class="form-control @error('khs') is-invalid @enderror" name="khs"
                      value="{{ old('khs') }}" autofocus>
                  @error('khs')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
              </div>

              <div class="form-group col-6">
                  <label for="photo">Upload Foto Terbaru</label>
                  <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo"
                      value="{{ old('photo') }}">
                  @error('photo')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
          </div>

          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block">
                  Simpan
              </button>
          </div>
      </form>
  </div>
</div>