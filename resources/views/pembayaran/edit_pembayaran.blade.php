@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mx-5 px-3 py-5">
            <h4 class="text-center">{{$title}}</h4>
            <form action="{{route('Pembayaran.update', $data->id_pembayaran)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                  <label for="kedudukan" class="col-form-label">Nama Peserta<span class="text-danger">*</span></label>
                  <select class="form-control" name="peserta" id="kedudukan">
                      <option value="0" hidden>-- Pilih Peserta --</option>
                      @foreach($peserta as $item)
                      <option value="{{$item->id_peserta}}" @if($item->id_peserta == $data->id_peserta) {{"selected"}} @endif>{{$item->nama_peserta}} </option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label for="nip" class="col-form-label">No Rekening<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="no_rekening" value="{{$data->no_rekening}}" id="nip">
              </div>
              <div class="form-group">
                <label for="nip" class="col-form-label">Nominal<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nominal" value="{{$data->nominal}}" id="nip">
            </div>
            <div class="form-group">
              <label for="foto_profile" class="col-form-label">Bukti Pembayaran <span class="text-danger">*</span></label>
              <input type="hidden" name="old_file" value="{{ $data->bukti_pembayaran }}">
              <input type="file" class="form-control" name="bukti_pembayaran"  id="foto_profile" onchange="previewImage(this);">
              <img id="gambar-preview" src="{{ url("bukti_pembayaran/". $data->bukti_pembayaran)}}" alt="Gambar Pratinjau"
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