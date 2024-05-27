@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mx-5 px-3 py-5">
            <h4 class="text-center">{{$title}}</h4>
            <form action="{{route('keahlian.update', $data->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="nama" class="control-label">Nama Keahlian <span class="text-danger">*</span></label>
                    <input type="text" id="nama" value="{{ $data["naman"] }}" name="nama" class="form-control"
                        autofocus>
                </div>
                <button type="submit" class="btn btn-primary float-right">Save changes</button>
            </form>
        </div>
    </div>
</div>
@endsection