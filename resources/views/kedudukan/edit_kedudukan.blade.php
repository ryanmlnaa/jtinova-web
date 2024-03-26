@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mx-5 px-3 py-5">
            <h4 class="text-center">{{$title}}</h4>
            <form action="{{route('Kedudukan.update', $data["id_kedudukan"])}}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="nama_kedudukan" class="control-label">Nama Kedudukan</label>
                    <input type="text" id="nama_kedudukan" value="{{ $data["nama_kedudukan"] }}" name="nama_kedudukan" class="form-control"
                        autofocus>
                </div>
                <button type="submit" class="btn btn-primary float-right">Save changes</button>
            </form>
        </div>
    </div>
</div>
@endsection