@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mx-5 px-3 py-5">
            <h4 class="text-center">{{$title}}</h4>
            <form action="{{route('Pelatihan.update', $data->id_pelatihan)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                  <label for="nip" class="col-form-label">Nama Pelatihan <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="nama_pelatihan" value="{{$data->nama_pelatihan}}" id="nip">
              </div>
              <div class="form-group">
                <label for="nip" class="col-form-label">Deskripsi <span class="text-danger">*</span></label>
                <textarea type="number" class="form-control" name="deskripsi" id="nip">{{$data->deskripsi}}</textarea>
            </div>
              <div class="form-group">
                  <label for="kedudukan" class="col-form-label">Kategori <span class="text-danger">*</span></label>
                  <select class="form-control" name="kategori" id="kedudukan">
                      <option value="0" hidden>-- Pilih Kategori --</option>
                      @foreach($kat as $k)
                      <option @if($k == $data->kategori) {{"selected"}} @endif>{{$k}}</option>
                      @endforeach
                  </select>
              </div>
                <div class="form-group">
                    <label for="instagram" class="control-label">Benefit <span class="text-danger">*</span></label>
                    <input type="text" id="instagram" name="benefit" class="form-control"
                        value="{{$data->benefit}}" autofocus>
                </div>
                <div class="form-group">
                  <label for="instagram" class="control-label">Harga <span class="text-danger">*</span></label>
                  <input type="text" id="instagram" name="harga" class="form-control currency"
                      value="{{$data->harga}}" autofocus>
              </div>
                <button type="submit" class="btn btn-primary float-right">Save changes</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var cleave = new Cleave('.currency', {
          numeral: true,
          numeralDecimalMark: ',',
          delimiter: '.'
        });
    });
</script>
@endsection
