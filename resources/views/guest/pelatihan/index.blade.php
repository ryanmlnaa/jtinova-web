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
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($pelatihan as $item)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->pelatihan->nama}}</td>
                          <td>
                            @php
                            $status = isset($item->team->transaction->status) ? $item->team->transaction->status : $item->transaction->status;
                            $payment_proof = isset($item->team->transaction->payment_proof) ? $item->team->transaction->payment_proof : $item->transaction->payment_proof;
                            $id = isset($item->team->transaction->id) ? $item->team->transaction->id : $item->transaction->id;
                            $pelatihan_user_id_transaction = isset($item->team->transaction->pelatihan_user_id) ? $item->team->transaction->pelatihan_user_id : $item->transaction->pelatihan_user_id;
                            @endphp
                            @if(($status == 'pending' && $pelatihan_user_id_transaction == $item->id && $payment_proof == null) || ($status == 'failed' && $pelatihan_user_id_transaction == $item->id))
                            <a href="{{route('transaction.bayar.index', Illuminate\Support\Facades\Crypt::encryptString($id))}}" class="btn btn-primary">Upload Bukti Bayar</a>
                            @elseif($status == 'pending' && $payment_proof != null)
                            Status pembayaran: <span class="badge badge-warning">Menunggu Konfirmasi</span>
                            @elseif($status == 'pending')
                            Status pembayaran: <span class="badge badge-warning">Menunggu Konfirmasi</span>
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