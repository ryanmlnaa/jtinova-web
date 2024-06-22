@extends('layouts.guest.app')
@section('title', $title)
@section('content')
<div class="section-header">
    <h1> Skema Pendampingan </h1>
</div>
<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Pendampingan yang Kamu Ikuti</h4>
        </div>
        <div class="card-body">
          @if($pendampingan)
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th>Judul</th>
                  <td>{{$pendampingan->judul}}</td>
                </tr>
                <tr>
                  <th>Dosen Pembimbing</th>
                  <td>{{$pendampingan->dosen_pembimbing}}</td>
                </tr>
                <tr>
                  <th>Kendala</th>
                  <td>{{$pendampingan->kendala}}</td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td>
                  @if($pendampingan->status == 'pending')
                    <a href="{{route('pendampingan.showForm')}}" class="btn btn-primary">Lengkapi Profile</a>
                  @elseif($pendampingan->status == 'progress' && $pendampingan->transaction->status == 'pending')
                    <a href="{{route('transaction.bayar.index', Illuminate\Support\Facades\Crypt::encryptString($pendampingan->transaction->id))}}" class="btn btn-primary">Upload Bukti Bayar</a>
                  @else
                    {{$pendampingan->status}}
                  @endif
                  </td>
                </tr>
                
              </table>
            </div>
          @else
            <p>Belum ada pendampingan yang kamu ikuti</p>
            <a href="{{route('katalog.pendampingan.index')}}" class="btn btn-primary">Lihat Skema Pendampingan</a>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection