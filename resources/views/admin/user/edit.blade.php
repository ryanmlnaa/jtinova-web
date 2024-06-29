@extends('layouts.admin.app')
@section('title', 'Edit User')
@section('content')
<div class="section-body">
  <div class="row mt-sm-4">
    <div class="col-12">
      <div class="card">
        <form method="post" action="{{route('user.update', $user)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card-header">
            <h4>Edit User</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <label>Name</label> <span class="text-danger">*</span>
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" name="name" required>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group col-md-6 col-12">
                <label>Email</label> <span class="text-danger">*</span>
                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" name="email" required>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6 col-12">
                <label>No HP</label>
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ $user->no_hp }}">
                @error('no_hp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group col-md-6 col-12">
                <label>Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ $user->alamat }}">
                @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6 col-12">
                <label>Jenis Kelamin</label>
                <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                  <option value="">Pilih Jenis Kelamin</option>
                  <option value="L" {{ $user->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                  <option value="P" {{ $user->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group col-md-6 col-12">
                <label>Pendidikan Terakhir</label>
                <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror">
                  <option value="">Pilih Pendidikan Terakhir</option>
                  <option value="SD" {{ $user->pendidikan_terakhir == 'SD' ? 'selected' : '' }}>SD</option>
                  <option value="SMP" {{ $user->pendidikan_terakhir == 'SMP' ? 'selected' : '' }}>SMP</option>
                  <option value="SMA" {{ $user->pendidikan_terakhir == 'SMA' ? 'selected' : '' }}>SMA / SMK</option>
                  <option value="D3" {{ $user->pendidikan_terakhir == 'D3' ? 'selected' : '' }}>D3</option>
                  <option value="D4" {{ $user->pendidikan_terakhir == 'D4' ? 'selected' : '' }}>D4</option>
                  <option value="S1" {{ $user->pendidikan_terakhir == 'S1' ? 'selected' : '' }}>S1</option>
                  <option value="S2" {{ $user->pendidikan_terakhir == 'S2' ? 'selected' : '' }}>S2</option>
                  <option value="S3" {{ $user->pendidikan_terakhir == 'S3' ? 'selected' : '' }}>S3</option>
                </select>
                @error('pendidikan_terakhir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6 col-12">
                <label>Pekerjaan</label>
                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" value="{{ $user->pekerjaan }}">
                @error('pekerjaan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group col-md-6 col-12">
                <label>Portofolio</label>
                <input type="url" class="form-control @error('portofolio') is-invalid @enderror" name="portofolio" value="{{ $user->portofolio }}">
                @error('portofolio')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6 col-12">
                <label>Instagram</label>
                <input type="url" class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="{{ $user->instagram }}">
                @error('instagram')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group col-md-6 col-12">
                <label>LinkedIn</label>
                <input type="url" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" value="{{ $user->linkedin }}">
                @error('linkedin')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6 col-12"> 
                <label>CV</label> <span> <a href="{{ asset('storage/' . $user->cv) }}" target="_blank">Lihat CV</a> </span>
                <input type="file" class="form-control @error('cv') is-invalid @enderror" name="cv">
                @error('cv')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group col-md-6 col-12">
                <label>Foto</label> <span> <a href="{{ asset('storage/' . $user->foto) }}" target="_blank">Lihat Foto</a> </span>
                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
            </div>

            {{-- edit multi role --}}
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <label>Role</label> <span class="text-danger">* Tekan tombol Ctrl untuk memilih lebih dari satu role</span>
                <select class="form-control select2 @error('role') is-invalid @enderror" name="role[]" multiple data-height="100%">
                  <option value="">Pilih Role</option>
                  @foreach ($roles as $role)
                  <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                  @endforeach
                </select>
                @error('role')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group col-md-6 col-12">
                <label>Permission langsung</label> <span class="text-danger">* Tekan tombol Ctrl untuk memilih lebih dari satu permission</span>
                <select class="form-control select2 @error('permission') is-invalid @enderror" name="permission[]" multiple data-height="100%">
                  <option value="">Pilih Permission</option>
                  @foreach ($permissions as $permission)
                  <option value="{{ $permission->name }}" {{ $user->hasPermissionTo($permission->name) ? 'selected' : '' }}>{{ $permission->name }}</option>
                  @endforeach
                </select>
                @error('permission')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="{{ route('user.index') }}" class="btn text-white btn-danger">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
