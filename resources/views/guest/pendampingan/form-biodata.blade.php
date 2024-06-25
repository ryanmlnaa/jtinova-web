@extends('layouts.guest.app')
@section('title', $title)
@section('content')
<div class="section-header">
    <h1> Lengkapi Data Diri</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Silakan Lengkapi Data Diri Berikut</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('pendampingan.pendampinganuser.update', Illuminate\Support\Facades\Crypt::encryptString($pendampinganUser->id))}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="nim">NIM</label> <span class="text-danger">*</span>
                                <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" name="nim"
                                    value="{{ old('nim') }}" required autofocus>
                                @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="tahun_masuk">Prodi</label> <span class="text-danger">*</span>
                                <select name="prodi_id" id="prodi_id" class="form-control @error('prodi_id') is-invalid @enderror" required autofocus>
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
                                <label for="judul">Judul Penelitian</label> <span class="text-danger">*</span>
                                <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                                    value="{{ old('judul') }}" required autofocus>
                                @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="dosen_pembimbing">Dosen Pembimbing</label> <span class="text-danger">*</span>
                                <input id="dosen_pembimbing" type="text" class="form-control @error('dosen_pembimbing') is-invalid @enderror" name="dosen_pembimbing"
                                    value="{{ old('dosen_pembimbing') }}" required autofocus>
                                @error('dosen_pembimbing')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="no_hp">No HP / WA</label> <span class="text-danger">*</span>
                            <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
                                value="{{ old('no_hp') }}" required autofocus>
                            @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kendala">Kendala</label> <span class="text-danger">*</span>
                            <textarea id="kendala" type="text" class="form-control @error('kendala') is-invalid @enderror" name="kendala" required autofocus>{{ old('kendala') }}</textarea>
                            @error('kendala')
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
        </div>
    </div>
</div>
@endsection