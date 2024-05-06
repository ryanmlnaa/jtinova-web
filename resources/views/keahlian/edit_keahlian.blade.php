@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mx-5 px-3 py-5">
            <h4 class="text-center">{{$title}}</h4>
            <form action="{{route('Keahlian.update', $data->id_keahlian)}}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="nama_kedudukan" class="control-label">Nama Keahlian <span class="text-danger">*</span></label>
                    <input type="text" id="nama_kedudukan" value="{{ $data["nama_keahlian"] }}" name="nama_keahlian" class="form-control"
                        autofocus>
                </div>
                <div class="form-group">
                    <label for="kedudukan" class="col-form-label">Tipe Keahlian</label>
                    <select class="form-control" name="tipe_keahlian" id="kedudukan">
                        <option value="0" hidden>-- Pilih Tipe --</option>
                        <option @if($data["tipe_keahlian"] == "utama") {{ "selected"}} @endif>utama</option>
                        <option @if($data["tipe_keahlian"] == "lain ") {{ "selected"}} @endif>lain</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary float-right">Save changes</button>
            </form>
        </div>
    </div>
</div>
@endsection