@extends('layouts.guest.app')
@section('title', $title)
@section('content')
    <div class="section-header">
        <h1> Katalog Pelatihan </h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h4>Pelatihan yang Kamu Ikuti</h4>
            </div>
            <div class="card-body">
              @if($pelatihan->count() > 0)
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama Pelatihan</th>
                        <th>Waktu</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($pelatihan as $item)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->nama}}</td>
                          <td>{{$item->waktu}}</td>
                          <td>{{$item->status}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h4>Aktivitas Lain</h4>
            </div>
            <div class="card-body">
              List aktivitas lain yang sedang berjalan
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
