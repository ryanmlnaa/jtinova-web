@extends('layouts.admin.app')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ubah Data</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('skemaPendampingan.update', $skemaPendampingan)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                      <label for="kode" class="col-form-label">Kode</label> <span class="text-danger">*</span>
                      <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" id="kode" value="{{old('kode', $skemaPendampingan->kode)}}">
                      @error('kode')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="nama" class="col-form-label">Nama</label> <span class="text-danger">*</span>
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{old('nama', $skemaPendampingan->nama)}}">
                      @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="harga" class="col-form-label">Harga</label> <span class="text-danger">*</span>
                      <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" value="{{old('harga', $skemaPendampingan->harga)}}">
                      @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="status" class="col-form-label">Status</label> <span class="text-danger">*</span>
                      <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                        <option value="1" {{old('status', $skemaPendampingan->status) == 'Aktif' ? 'selected' : ''}}>Aktif</option>
                        <option value="0" {{old('status', $skemaPendampingan->status) == 'Tidak Aktif' ? 'selected' : ''}}>Tidak Aktif</option>
                      </select>
                      @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="deskripsi" class="col-form-label">Deskripsi</label> <span class="text-danger">*</span>
                      <textarea type="number" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi">{{old('deskripsi', $skemaPendampingan->deskripsi)}}</textarea>
                      @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    {{-- display gambar --}}
                    <div class="form-group">
                      <label for="foto" class="col-form-label">Gambar</label> <span class="text-danger">*</span>
                      <img src="{{asset('storage/'.$skemaPendampingan->foto)}}" alt="foto" class="img-thumbnail" width="100">
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