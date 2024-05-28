@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @role('mahasiswa-mbkm')
                    @can('fill-profile')
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
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

                        <div class="form-group">
                            <label for="keahlian">Keahlian</label>
                            <div class="row">
                                @foreach ($keahlians as $keahlian)
                                <div class="col-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="keahlian-{{ $keahlian->id }}"
                                            name="keahlian_id[]" value="{{ $keahlian->id }}">
                                        <label class="custom-control-label" for="keahlian-{{ $keahlian->id }}">
                                            {{ $keahlian->nama }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Daftar
                            </button>
                        </div>
                    </form>
                    @endcan
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection