@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('pelatihan.update', $pelatihan)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="id_kategori" class="col-form-label">Kategori</label> <span class="text-danger">*</span>
                        <select class="form-control @error('id_kategori') is-invalid @enderror" name="id_kategori" id="id_kategori">
                          <option value="">Pilih Kategori</option>
                          @foreach ($kategori as $item)
                            <option value="{{$item->id}}" {{old('id_kategori', $pelatihan->id_kategori) == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                          @endforeach
                        </select>
                        @error('id_kategori')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group col-6">
                        <label for="nama" class="col-form-label">Nama</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{old('nama', $pelatihan->nama)}}">
                        @error('nama')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="kode" class="col-form-label">Kode</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" id="kode" value="{{old('kode', $pelatihan->kode)}}">
                        @error('kode')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group col-6">
                        <label for="harga" class="col-form-label">Harga</label> <span class="text-danger">*</span>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" value="{{old('harga', $pelatihan->harga)}}">
                        @error('harga')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="deskripsi" class="col-form-label">Deskripsi</label> <span class="text-danger">*</span>
                        <textarea type="number" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi">{{old('deskripsi', $pelatihan->deskripsi)}}</textarea>
                        @error('deskripsi')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group col-6">
                        <label for="benefit" class="col-form-label">Benefit</label> <span class="text-danger">*</span>
                        <textarea class="form-control @error('benefit') is-invalid @enderror" name="benefit" id="benefit">{{old('benefit', $pelatihan->benefit)}}</textarea>
                        @error('benefit')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="tanggal_mulai" class="col-form-label">Tanggal Mulai</label> <span class="text-danger">*</span>
                        <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai" id="tanggal_mulai" value="{{old('tanggal_mulai', $pelatihan->tanggal_mulai)}}">
                        @error('tanggal_mulai')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group col-6">
                        <label for="tanggal_selesai" class="col-form-label">Tanggal Selesai</label> <span class="text-danger">*</span>
                        <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" name="tanggal_selesai" id="tanggal_selesai" value="{{old('tanggal_selesai', $pelatihan->tanggal_selesai)}}">
                        @error('tanggal_selesai')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-6">
                        <label for="lokasi" class="col-form-label">Lokasi</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" id="lokasi" value="{{old('lokasi', $pelatihan->lokasi)}}">
                        @error('lokasi')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group col-6">
                        <label for="status" class="col-form-label">Status</label> <span class="text-danger">*</span>
                        <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                          <option value="">Pilih Status</option>
                          <option value="Aktif" {{old('status', $pelatihan->status) == 'Aktif' ? 'selected' : ''}}>Aktif</option>
                          <option value="Tidak Aktif" {{old('status', $pelatihan->status) == 'Tidak Aktif' ? 'selected' : ''}}>Tidak Aktif</option>
                        </select>
                        @error('status')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="kuota_tim" class="col-form-label">Maksimal Peserta per TIM</label> <span class="text-danger">*</span>
                        <input type="number" class="form-control @error('kuota_tim') is-invalid @enderror" name="kuota_tim" id="kuota_tim" value="{{old('kuota_tim', $pelatihan->kuota_tim)}}">
                        @error('kuota_tim')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group col-6">
                        <label for="kuota" class="col-form-label">Kuota</label> <span class="text-danger">*</span>
                        <input type="number" class="form-control @error('kuota') is-invalid @enderror" name="kuota" id="kuota" value="{{old('kuota', $pelatihan->kuota)}}">
                        @error('kuota')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="foto" class="col-form-label">Gambar</label> <span class="text-danger">*</span>
                      <img src="{{asset('storage/'.$pelatihan->foto)}}" alt="foto" class="img-thumbnail" width="100">
                    </div>
                    <div class="form-group">
                      <label for="foto" class="col-form-label">Gambar</label> <span class="text-danger">*</span>
                      <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto" value="{{old('foto')}}">
                      @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('pelatihan.index')}}" class="btn btn-danger">Batal</a>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection