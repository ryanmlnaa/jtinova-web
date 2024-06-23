@extends('layouts.admin.app')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="section-header">
  <h1>Edit Password {{ Auth::user()->name }}</h1>
</div>
<div class="section-body">
  <div class="row mt-sm-4">
    <div class="col-12">
      <div class="card">
        <form method="post" action="{{route('dashboard.passwordGuest.update')}}">
          @csrf
          @method('PUT')
          <div class="card-header">
            <h4>Edit Password</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Password lama</label> <span class="text-danger">*</span>
              <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required>
              @error('old_password')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Password baru</label> <span class="text-danger">*</span>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
              @error('password')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Konfirmasi password baru</label> <span class="text-danger">*</span>
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>
              @error('password_confirmation')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="card-footer text-right">
            <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
