@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mx-5 px-3 py-5">
            <h4 class="text-center">{{$title}}</h4>
            <form action="{{route('Benefit.update', $data->id_benefit)}}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="nama_kedudukan" class="control-label">Nama Benefit <span class="text-danger">*</span></label>
                    <input type="text" id="nama_kedudukan" value="{{ $data["nama_benefit"] }}" name="nama_benefit" class="form-control"
                        autofocus>
                </div>
                <button type="submit" class="btn btn-primary float-right">Save changes</button>
            </form>
        </div>
    </div>
</div>
@endsection