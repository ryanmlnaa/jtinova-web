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
                  <form action="{{route('pegawai.update', $pegawai)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                      <label for="user_id" class="col-form-label">User</label> <span class="text-danger">*</span>
                      <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id">
                        <option value="">Pilih User</option>
                        @foreach ($users as $item)
                          <option value="{{$item->id}}" {{old('user_id', $pegawai->user_id) == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                        @endforeach
                      </select>
                      @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="nama" class="col-form-label">Nama</label> <span class="text-danger">*</span>
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{old('nama', $pegawai->nama)}}">
                      @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="nip" class="col-form-label">NIP</label> <span class="text-danger">*</span>
                      <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip" value="{{old('nip', $pegawai->nip)}}">
                      @error('nip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="jabatan_id" class="col-form-label">Jabatan</label> <span class="text-danger">*</span>
                      <select class="form-control @error('jabatan_id') is-invalid @enderror" name="jabatan_id" id="jabatan_id">
                        <option value="">Pilih Jabatan</option>
                        @foreach ($jabatan as $item)
                          <option value="{{$item->id}}" {{old('jabatan_id', $pegawai->jabatan_id) == $item->id ? 'selected' : ''}}>{{$item->nama}}</option>
                        @endforeach
                      </select>
                      @error('jabatan_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="foto" class="col-form-label">Gambar</label> <span class="text-danger">*</span>
                      <img src="{{asset('storage/'.$pegawai->foto)}}" alt="foto" class="img-thumbnail" width="100">
                    </div>
                    <div class="form-group">
                      <label for="foto" class="col-form-label">Foto</label> <span class="text-danger">*</span>
                      <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto" value="{{old('foto')}}">
                      @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('pegawai.index')}}" class="btn btn-danger">Batal</a>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection