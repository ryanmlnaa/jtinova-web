@extends('layouts.guest.app')
@section('title', $title)
@section('content')
    <div class="section-header">
        <h1> Katalog Pelatihan </h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Pelatihan yang Kamu Ikuti</h4>
            </div>
            <div class="card-body">
              @if($pelatihan->count() > 0)
                <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama Pelatihan</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($pelatihan as $item)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->pelatihan->nama}}</td>
                          <td>{{$item->transaction->status}}</td>
                          <td>
                            @if($item->transaction->status == 'pending' || $item->transaction->payment_proof == null)
                            <a href="{{route('transaction.bayar.index', Illuminate\Support\Facades\Crypt::encryptString($item->transaction->id))}}" class="btn btn-primary">Upload Bukti Bayar</a>
                            @else
                            <a href="#" class="btn btn-primary">Koridor Kelas</a>
                            @endif
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              @else
                <p>Belum ada pelatihan yang kamu ikuti</p>
              @endif
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Pelatihan yang Telah Selesai</h4>
            </div>
            <div class="card-body">
              List Pelatihan yang telah selesai
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <a href="{{route('katalog.pelatihan.index')}}" class="btn btn-primary">Lihat Katalog Pelatihan</a>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('scripts')
  <script>
      $(document).ready(function () {
          $('#table-1').dataTable();
      });
  </script>
@endpush