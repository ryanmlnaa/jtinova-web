@extends('layouts.admin.app')
@section('title', $title)
@section('menu', $title)
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah {{ $title }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('portofolio.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="judul" class="col-form-label">Judul<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    name="judul" id="judul" value="{{ old('judul') }}">
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="klien" class="col-form-label">klien<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('klien') is-invalid @enderror"
                                    name="klien" id="klien" value="{{ old('klien') }}">
                                @error('klien')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label> <span class="text-danger">*</span>
                                <select name="kategori" id="kategori" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi" class="col-form-label">Deskripsi<span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Mulai<span class="text-danger">*</span></label>
                                <input type="date" name="start_date"
                                    class="form-control @error('start_date') is-invalid @enderror"
                                    value="{{ old('start_date') }}">
                                @error('start_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Selesai<span class="text-danger">*</span></label>
                                <input type="date" name="end_date"
                                    class="form-control @error('end_date') is-invalid @enderror"
                                    value="{{ old('end_date') }}">
                                @error('end_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group increment">
                                <label for="">Photo</label>
                                <div class="input-group">
                                    <input type="file" name="foto[]" class="form-control">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-primary btn-add"><i class="fas fa-plus-square"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('portofolio.index') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                        <div class="clone invisible" style="display: none;">
                            <div class="input-group mb-3">
                                <input type="file" name="foto[]" class="form-control">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-danger btn-remove"><i class="fas fa-minus-square"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    
<script>
    $(document).ready(function() {
        $(".btn-add").click(function(){ 
            var html = $(".clone").html();
            $(".increment").after(html);
        });
        $("body").on("click",".btn-remove",function(){ 
            $(this).parents(".input-group").remove();
        });
    });
</script>
@endpush
