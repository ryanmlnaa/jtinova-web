@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mx-5 px-3 py-5">
            <h4 class="text-center">{{$title}}</h4>
            <form action="{{route('Recruitment.update', $data->id_recruitment)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                  <label for="nip" class="col-form-label">NIM</label>
                  <input type="text" class="form-control" name="nim" value="{{$data->nim}}" id="nip">
                </div>
                <div class="form-group">
                  <label for="nama_pegawaai" class="col-form-label">Nama Mahasiswa</label>
                  <input type="text" class="form-control" name="nama" value="{{$data->nama}}" id="nama_pegawaai">
                </div>
                <div class="form-group">
                  <label for="prodi" class="col-form-label">Prodi</label>
                  <select class="form-control" name="prodi" id="prodi">
                    <option value="0" hidden>-- Pilih Prodi --</option>
                    @foreach($prodi as $p)
                    <option @if($p == $data->prodi) {{"selected"}} @endif> {{$p}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="semester" class="col-form-label">Semester</label>
                  <select class="form-control" name="semester" id="semester">
                    <option value="0" hidden>-- Pilih Semester --</option>
                    @foreach($smt as $s)
                    <option  @if($s == $data->semester) {{ "selected" }} @endif>{{$s}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label class="d-block">Keahlian Utama</label>
                  @foreach($utama as $u)
                  <div class="form-check">
                      <input class="form-check-input"
                          type="radio"
                          name="keahlian_utama"
                          id="exampleRadios1"
                  @if($u == $data->keahlian_utama) {{"checked" }} @endif

                          value="{{ $u }}">
                      <label class="form-check-label"
                          for="exampleRadios1">
                          {{ $u }}
                      </label>
                  </div>
                  @endforeach
              </div>
                <div class="form-group">
                  <label class="d-block">Keahlian Lain</label>
                  @foreach($lain as $l)
                  <div class="form-check">
                      <input class="form-check-input"
                          name="keahlian_lain"
                          type="checkbox"
                  @if($l == $data->keahlian_lain) {{"checked" }} @endif
                         
                          value="{{$l}}">
                      <label class="form-check-label"
                          for="defaultCheck1">
                          {{$l}}
                      </label>
                  </div>
                  @endforeach
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