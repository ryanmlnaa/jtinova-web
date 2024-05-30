@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('skemaPendampingan.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="kode" class="col-form-label">Kode</label> <span class="text-danger">*</span>
                      <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" id="kode" value="{{old('kode')}}">
                      @error('kode')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="nama" class="col-form-label">Nama</label> <span class="text-danger">*</span>
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{old('nama')}}">
                      @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="harga" class="col-form-label">Harga</label> <span class="text-danger">*</span>
                      <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" value="{{old('harga')}}">
                      @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="status" class="col-form-label">Status</label> <span class="text-danger">*</span>
                      <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                        <option value="1" {{old('status') == 'Aktif' ? 'selected' : ''}}>Aktif</option>
                        <option value="0" {{old('status') == 'Tidak Aktif' ? 'selected' : ''}}>Tidak Aktif</option>
                      </select>
                      @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="deskripsi" class="col-form-label">Deskripsi</label> <span class="text-danger">*</span>
                      <textarea type="number" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi">{{old('deskripsi')}}</textarea>
                      @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
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
                    <a href="{{route('skemaPendampingan.index')}}" class="btn btn-danger">Batal</a>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection