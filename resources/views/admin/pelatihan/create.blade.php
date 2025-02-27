@extends('layouts.admin.app')
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
                        <form action="{{ route('pelatihan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="id_kategori" class="col-form-label">Kategori</label> <span
                                        class="text-danger">*</span>
                                    <select class="form-control @error('id_kategori') is-invalid @enderror"
                                        name="id_kategori" id="id_kategori" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('id_kategori') == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_kategori')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="nama" class="col-form-label">Nama</label> <span
                                        class="text-danger">*</span>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" id="nama" value="{{ old('nama') }}" required>
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="kode" class="col-form-label">Kode</label> <span
                                        class="text-danger">*</span>
                                    <input type="text" class="form-control @error('kode') is-invalid @enderror"
                                        name="kode" id="kode" value="{{ old('kode') }}" required>
                                    @error('kode')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="harga" class="col-form-label">Harga</label> <span
                                        class="text-danger">*</span>
                                    <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                        name="harga" id="harga" value="{{ old('harga') }}" required>
                                    @error('harga')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="deskripsi" class="col-form-label">Deskripsi</label> <span
                                        class="text-danger">*</span>
                                    <textarea class="summernote-simple @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" required>{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="benefit" class="col-form-label">Benefit</label> <span
                                        class="text-danger">*</span>
                                    <textarea class="summernote-simple @error('benefit') is-invalid @enderror" name="benefit" id="benefit" required>{{ old('benefit') }}</textarea>
                                    @error('benefit')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="tanggal_mulai" class="col-form-label">Tanggal Mulai</label> <span
                                        class="text-danger">*</span>
                                    <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                        name="tanggal_mulai" id="tanggal_mulai" value="{{ old('tanggal_mulai') }}"
                                        required>
                                    @error('tanggal_mulai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="tanggal_selesai" class="col-form-label">Tanggal Selesai</label> <span
                                        class="text-danger">*</span>
                                    <input type="date"
                                        class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                        name="tanggal_selesai" id="tanggal_selesai" value="{{ old('tanggal_selesai') }}"
                                        required>
                                    @error('tanggal_selesai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="lokasi" class="col-form-label">Lokasi</label> <span
                                        class="text-danger">*</span>
                                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror"
                                        name="lokasi" id="lokasi" value="{{ old('lokasi') }}" required>
                                    @error('lokasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="status" class="col-form-label">Status</label> <span
                                        class="text-danger">*</span>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status"
                                        id="status" required>
                                        <option value="">Pilih Status</option>
                                        <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif
                                        </option>
                                        <option value="Tidak Aktif"
                                            {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
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
                                    <label for="kuota_tim" class="col-form-label">Maksimal Peserta per TIM</label> <span
                                        class="text-danger">*</span>
                                    <input type="number" class="form-control @error('kuota_tim') is-invalid @enderror"
                                        name="kuota_tim" id="kuota_tim" value="{{ old('kuota_tim') }}" required>
                                    @error('kuota_tim')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="kuota" class="col-form-label">Kuota</label> <span
                                        class="text-danger">*</span>
                                    <input type="number" class="form-control @error('kuota') is-invalid @enderror"
                                        name="kuota" id="kuota" value="{{ old('kuota') }}" required>
                                    @error('kuota')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="foto" class="col-form-label">Gambar</label> <span
                                    class="text-danger">*</span>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                    name="foto" id="foto" value="{{ old('foto') }}" required>
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="syllabus_link" class="col-form-label">Silabus</label> <span
                                    class="text-danger">* (Format PDF)</span>
                                <input type="file" class="form-control @error('syllabus_link') is-invalid @enderror"
                                    name="syllabus_link" id="syllabus_link" value="{{ old('syllabus_link') }}" required>
                                @error('syllabus_link')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('pelatihan.index') }}" class="btn btn-danger">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
