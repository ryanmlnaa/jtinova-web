@extends('layouts.admin.app')
@section('title', $title)
@section('menu', $title)
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mx-5 px-3 py-5">
                <h4 class="text-center">{{ $title }}</h4>
                <form action="{{ route('portofolio.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="nip" class="col-form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" value="{{ $data->judul }}"
                            id="nip">
                    </div>
                    <div class="form-group">
                        <label for="nip" class="col-form-label">Deskripsi</label>
                        <textarea type="number" class="form-control" name="deskripsi" id="nip">{{ $data->deskripsi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama_pegawaai" class="col-form-label">Nama Klien</label>
                        <input type="text" class="form-control" name="klien"
                            value="{{ $data->klien }}"id="nama_pegawaai">
                    </div>
                    <div class="form-group">
                        <label for="kedudukan" class="col-form-label">Kategori</label>
                        <select class="form-control" name="kategori" id="kedudukan">
                            <option value="0" hidden>-- Pilih Kategori --</option>
                            @foreach ($kat as $k)
                                <option @if ($k == $data->kategori) {{ 'selected' }} @endif>{{ $k }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="date" name="start_date" value="{{ $data->start_date }}"
                            class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="date" name="end_date" value="{{ $data->end_date }}"class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label for="foto_profile" class="col-form-label">Foto Portofolio</label>
                        <input type="hidden" name="old_file" value="{{ $data->foto }}">
                        <input type="file" id="foto" class="form-control" name="foto[]" multiple>
                            <div id="multi_preview" style="max-width: 50%; display: flex; flex-wrap: wrap;">
                              @foreach ($data->images as $item)
                            <img id="gambar-preview" src="{{ asset('storage/' . $item->image_url) }}" alt="Gambar Pratinjau"
                                style="max-width: 50%; margin:10px; display: block;">
                        @endforeach
                          </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Save changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    
<script>
    $(document).ready(function() {
        $('#foto').on('change', function(){
            var files = $(this)[0].files;
            $('#multi_preview').html(''); // Clear previous previews

            for(var i = 0; i < files.length; i++) {
                var file = files[i];
                var reader = new FileReader();

                reader.onloadend = (function(fileIndex) {
                    return function(e) {
                        var img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxWidth = '200px';
                        img.style.margin = '5px';
                        img.style.display = 'block';
                        $('#multi_preview').append(img);
                    };
                })(i);

                if (file) {
                    reader.readAsDataURL(file);
                }
            }
        });
    });
</script>
@endpush

