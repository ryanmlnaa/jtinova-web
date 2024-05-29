@extends('layouts.auth.app')
@section('title', 'Daftar MBKM di Teaching Factory JTI Innovation')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div
            class="col-12">
            <div class="login-brand">
                <img src="{{asset('images/logo-jtinnovation.png')}}" alt="logo" width="500"
                    class="shadow-light">
            </div>

            <div class="card card-primary">
                <div class="card-header">
                    <h4>Daftar MBKM di Teaching Factory JTI Innovation</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="requrl" value="mbkm">
                        <div class="row">
                          <div class="form-group col-6">
                            <label for="name">Nama</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" autofocus>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>

                          <div class="form-group col-6">
                              <label for="email">Email</label>
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                  value="{{ old('email') }}">
                              @error('email')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                              @enderror
                          </div>
                        </div>

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
                            <label for="tahun_masuk">Prodi</label>
                            <select name="prodi_id" id="prodi_id" class="form-control @error('prodi_id') is-invalid @enderror">
                              @foreach ($prodis as $prodi)
                                <option value="{{ $prodi->id }}">{{ $prodi->name }}</option>
                              @endforeach
                            </select>
                            @error('tahun_masuk')
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
                            <label for="golongan">Tahun Masuk Politeknik</label>
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

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="password" class="d-block">Password</label>
                                <input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror"
                                    data-indicator="pwindicator" name="password">
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="password2" class="d-block">Konfirmasi Password</label>
                                <input id="password2" type="password" class="form-control"
                                    name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Daftar
                            </button>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </form>
                    <div class="mt-5 text-muted text-center">
                        Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
                    </div>
                </div>
            </div>
            <div class="simple-footer">
                Copyright &copy; JTI Innovation @php echo date('Y'); @endphp
            </div>
        </div>
    </div>
</div>
@endsection