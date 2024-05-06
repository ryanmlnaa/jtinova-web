@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mx-5 px-3 py-5">
            <h4 class="text-center">{{$title}}</h4>
            <form action="{{route('Peserta.update', $data->id_peserta)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                  <label for="nip" class="col-form-label">Nama Peserta</label>
                  <input type="text" class="form-control" name="nama_peserta" value="{{$data->nama_peserta}}" id="nip">
              </div>
              <div class="form-group">
                  <label for="nama_pegawaai" class="col-form-label">Email</label>
                  <input type="text" class="form-control" name="email" value="{{$data->email}}"id="nama_pegawaai">
              </div>
              <div class="form-group">
                <label for="nama_pegawaai" class="col-form-label">No Telp</label>
                <input type="text" class="form-control" name="no_telp" value="{{$data->no_telp}}"id="nama_pegawaai">
            </div>
            <div class="form-group">
              <label for="kedudukan" class="col-form-label">Agama<span class="text-danger">*</span></label>
              <select class="form-control" name="agama" id="kedudukan">
                  <option value="0" hidden>-- Pilih Agama --</option>
                  @foreach($agama as $item)
                    <option @if($data->agama == $item) {{ "selected"}} @endif>{{$item}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
              <label class="d-block">Jenis Kelamin</label>
              @foreach($jkel as $item)
              <div class="form-check">
                  <input class="form-check-input"
                      type="radio"
                      name="j_kel"
                      id="exampleRadios1"
                      @if($data->j_kel == $item) {{ "checked"}} @endif
                      value="{{$item}}">
                  <label class="form-check-label"
                      for="exampleRadios1">
                      {{$item}}
                  </label>
              </div>
              @endforeach
          </div>
          <div class="form-group">
              <label for="nama_pegawaai" class="col-form-label">Pekerjaan<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="pekerjaan" value="{{$data->pekerjaan}}" id="nama_pegawaai">
          </div>
          <div class="form-group">
              <label for="nama_pegawaai" class="col-form-label">Pendidikan Terakhir<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="pendidikan_terakhir" value="{{$data->pendidikan_terakhir}}" id="nama_pegawaai">
          </div>
          
          <div class="form-group">
              <label for="nama_pegawaai" class="col-form-label">Tempat Lahir<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="tmp_lahir" value="{{$data->tmp_lahir}}" id="nama_pegawaai">
          </div>
          <div class="form-group">
              <label for="nama_pegawaai" class="col-form-label">Tanggal Lahir<span class="text-danger">*</span></label>
              <input type="date" class="form-control" name="tgl_lahir" value="{{$data->tgl_lahir}}" id="nama_pegawaai">
          </div>
          <div class="form-group">
              <label for="nama_pegawaai" class="col-form-label">Alamat<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="alamat" value="{{$data->alamat}}" id="nama_pegawaai">
          </div>
          <div class="form-group">
              <label for="foto_profile" class="col-form-label">Foto KTP</label>
              <input type="hidden" name="old_file" value="{{ $data->foto_ktp }}">
              <input type="file" class="form-control" name="foto_ktp" id="foto_profile" onchange="previewImage(this);">
              <img id="gambar-preview" src="{{ url("foto_ktp_peserta/". $data->foto_ktp)}}" alt="Gambar Pratinjau"
                  style="max-width: 50%; margin-top:20px; display: block;">
          </div>
            <div class="form-group">
              <label for="kedudukan" class="col-form-label">Status Peserta<span class="text-danger">*</span></label>
              <select class="form-control" name="status" id="kedudukan">
                  <option value="0" hidden>-- Pilih Kategori --</option>
                  <option @if($data->status == "aktif") {{ "selected" }} @endif>aktif</option>
                  <option @if($data->status == "nonaktif") {{ "selected" }} @endif>nonaktif</option>
              </select>
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