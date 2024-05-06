@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mx-5 px-3 py-5">
            <h4 class="text-center">{{$title}}</h4>
            <form action="{{route('User.update', $data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="nip" class="col-form-label">Nama User <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{$data->name}}" id="nip">
                </div>
                <div class="form-group">
                    <label for="nip" class="col-form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" value="{{$data->email}}" id="nip">
                </div>
                <div class="form-group">
                    <label for="nip" class="col-form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="password" id="nip">
                </div>
                <div class="form-group">
                    <label for="nip" class="col-form-label">Confirm Password <span
                            class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="confirm_password" id="nip">
                </div>
                <div class="form-group">
                    <label for="kedudukan" class="col-form-label">Role <span
                            class="text-danger">*</span></label>
                    <select class="form-control" name="role" id="kedudukan">
                        <option value="0" hidden>-- Pilih Role --</option>
                        <option @if("user" == $data->role) {{"selected"}} @endif>user</option>
                        <option @if("admin" == $data->role) {{"selected"}} @endif>admin</option>

                    </select>
                </div>
                <button type="submit" class="btn btn-primary float-right">Save changes</button>
            </form>
        </div>
    </div>
</div>
@endsection
