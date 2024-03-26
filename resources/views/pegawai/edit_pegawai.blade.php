@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mx-5 px-3 py-5">
            <h4 class="text-center">{{$title}}</h4>
            <form action="{{route('Pegawai.update', $data->id_pegawai)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="nip" class="control-label">Nip</label>
                    <input type="number" id="nip" name="nip" class="form-control"
                        value="{{$data->nip}}" autofocus>
                </div>
                <div class="form-group">
                    <label for="nama_pegawai" class="control-label">Nama Pegawai</label>
                    <input type="text" id="nama_pegawai" name="nama_pegawai" class="form-control"
                        value="{{$data->nama_pegawai}}" autofocus>
                </div>
                <div class="form-group">
                    <label for="kedudukan" class="col-form-label">Kedudukan</label>
                    <select class="form-control" name="kedudukan" id="kedudukan">
                      <option value="0" hidden>-- Pilih Kedudukan --</option>
                      @foreach($kedudukan as $ked)
                        <option value="{{$ked->id_kedudukan}}" {{ ($data->id_kedudukan == $ked->id_kedudukan) ? "selected" : ""}}> {{$ked->nama_kedudukan}} </option>
                      @endforeach
                    </select>
                  </div>
                <div class="form-group">
                    <label for="link_linkdIn" class="control-label">Link linkdin</label>    
                    <input type="text" id="link_linkdIn" name="link_linkdIn" class="form-control"
                        value="{{$data->link_linkdIn}}" autofocus>
                </div>
                <div class="form-group">
                    <label for="instagram" class="control-label">Instagram</label>
                    <input type="text" id="instagram" name="instagram" class="form-control"
                        value="{{$data->instagram}}" autofocus>
                </div>
                <div class="form-group">
                    <label for="foto_profile" class="col-form-label">Foto Pegawai</label>
                    <input type="hidden" name="old_file" value="{{ $data->foto_profile }}">
                    <input type="file" class="form-control" name="foto_profile"  id="foto_profile" onchange="previewImage(this);">
                    <img id="gambar-preview" src="{{ url("foto_pegawai/". $data->foto_profile)}}" alt="Gambar Pratinjau"
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