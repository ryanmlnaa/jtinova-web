@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mx-5 px-3 py-5">
            <h4 class="text-center">{{$title}}</h4>
            <form action="{{route('Portofolio.update', $data->id_portofolio)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                  <label for="nip" class="col-form-label">Judul</label>
                  <input type="text" class="form-control" name="judul" value="{{$data->judul}}" id="nip">
              </div>
              <div class="form-group">
                <label for="nip" class="col-form-label">Deskripsi</label>
                <textarea type="number" class="form-control" name="deskripsi" id="nip">{{$data->deskripsi}}</textarea>
            </div>
              <div class="form-group">
                  <label for="nama_pegawaai" class="col-form-label">Nama Klien</label>
                  <input type="text" class="form-control" name="klien" value="{{$data->klien}}"id="nama_pegawaai">
              </div>
              <div class="form-group">
                  <label for="kedudukan" class="col-form-label">Kategori</label>
                  <select class="form-control" name="kategori" id="kedudukan">
                      <option value="0" hidden>-- Pilih Kategori --</option>
                      @foreach($kat as $k)
                      <option @if($k == $data->kategori) {{"selected"}} @endif>{{$k}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label>Tanggal Mulai</label>
                  <input type="date" name="start_date" value="{{$data->start_date}}" class="form-control datepicker">
              </div>
              <div class="form-group">
                  <label>Tanggal Selesai</label>
                  <input type="date" name="end_date" value="{{$data->end_date}}"class="form-control datepicker">
              </div>
                <div class="form-group">
                    <label for="foto_profile" class="col-form-label">Foto Portofolio</label>
                    <input type="hidden" name="old_file" value="{{ $data->foto }}">
                    <input type="file" class="form-control" name="foto"  id="foto_profile" onchange="previewImage(this);">
                    <img id="gambar-preview" src="{{ url("foto_portofolio/". $data->foto)}}" alt="Gambar Pratinjau"
                    style="max-width: 50%; margin-top:20px; display: block;">
                </div>
                <button type="submit" class="btn btn-primary float-right">Save changes</button>
            </form>
        </div>
    </div>
</div>
@endsection

<script>
    function previewImage(input) {
      var preview = document.getElementById('gambar-preview');
      var file = input.files[0];
      var reader = new FileReader();

      reader.onloadend = function () {
        preview.src = reader.result;
      };

      if (file) {
        reader.readAsDataURL(file);
      } else {
        preview.src = '#';
        preview.style.display = 'none';
      }
    }


  </script>