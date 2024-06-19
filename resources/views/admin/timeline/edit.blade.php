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
                  <form action="{{route('timeline.update', $timeline)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="title" class="col-form-label">Judul</label> <span class="text-danger">*</span>
                      <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title', $timeline->title)}}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="tahun_ajaran" class="col-form-label">Tahun Ajaran</label> <span class="text-danger">* (Contoh: 2021/2022 Genap)</span>
                      <input type="text" class="form-control @error('tahun_ajaran') is-invalid @enderror" name="tahun_ajaran" id="tahun_ajaran" value="{{old('tahun_ajaran', $timeline->tahun_ajaran)}}">
                        @error('tahun_ajaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="status" class="col-form-label">Status</label> <span class="text-danger">*</span>
                      <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="">Pilih Status</option>
                        <option value="1" {{old('status', $timeline->status) == 1 ? 'selected' : ''}}>Aktif</option>
                        <option value="0" {{old('status', $timeline->status) == 0 ? 'selected' : ''}}>Tidak Aktif</option>
                      </select>
                        @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row form-group">
                      <label for="description" class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-form-label text-left pl-3">Deskripsi <span class="text-danger">*</span></label> 
                      <label for="start_at" class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-form-label text-left pl-3">Tanggal Buka <span class="text-danger">*</span></label> 
                      <label for="end_at" class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-form-label text-left pl-6">Tanggal Tutup <span class="text-danger">*</span></label> 
                    </div>
                    <div class="row form-group input-copy-here">
                      @foreach (json_decode($timeline->timeline) as $item)
                      @if(!$loop->first)
                      <div class="input-group">
                      @endif
                      <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">
                        <div class="form-group">
                          <input type="text" class="form-control" name="description[]" id="description" value="{{$item->title}}">
                        </div>
                      </div>
                      <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">
                        <input type="date" class="form-control" name="start_at[]" id="start_at" value="{{$item->start}}">
                      </div>
                      <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="row">
                          <div class="col-xxl-11 col-xl-11 col-lg-11 col-md-11 col-sm-11">
                            <input type="date" class="form-control" name="end_at[]" id="end_at" value="{{$item->end}}">
                          </div>
                          <div class="col-xxl-1 col-xl-1 col-lg-1 col-md-1 col-sm-11">
                            <button type="button" class="btn btn-outline-primary {{ $loop->first ? 'btn-add' : 'btn-remove' }}"><i class="fas fa-{{ $loop->first ? 'plus' : 'minus' }}-square"></i></button>
                          </div>
                        </div>
                      </div>
                      @if(!$loop->first)
                      </div>
                      @endif
                      @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('timeline.index')}}" class="btn btn-danger">Batal</a>
                  </form>
                  <div class="row form-group input-copy" style="display: none;">
                    <div class="input-group">
                      <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">
                        <div class="form-group">
                          <input type="text" class="form-control" name="description[]" id="description">
                        </div>
                      </div>
                      <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">
                        <input type="date" class="form-control" name="start_at[]" id="start_at">
                      </div>
                      <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="row">
                          <div class="col-xxl-11 col-xl-11 col-lg-11 col-md-11 col-sm-11">
                            <input type="date" class="form-control" name="end_at[]" id="end_at">
                          </div>
                          <div class="col-xxl-1 col-xl-1 col-lg-1 col-md-1 col-sm-11">
                            <button type="button" class="btn btn-outline-primary btn-remove"><i class="fas fa-minus-square"></i></button>
                          </div>
                        </div>
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
        $(document).ready(function () {



          $('.btn-add').on('click', function () {
              var input = $('.input-copy').html();
              $('.input-copy-here').append(input);
          });

          $("body").on('click', '.btn-remove', function () {
              $(this).parents('.input-group').remove();
          });
        });
    </script>
@endpush