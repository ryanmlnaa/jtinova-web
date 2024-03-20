@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form action="{{route('update')}}" method="post">
                <div class="form-group">
                    <label for="nama_kedudukan" class="control-label">Nama Kedudukan</label>
                    <input type="text" id="nama_kedudukan" name="nama_kedudukan" class="form-control"
                        value="" autofocus>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection