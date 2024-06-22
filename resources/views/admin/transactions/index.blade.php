@extends('layouts.admin.app')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Metode</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->invoice }}</td>
                                    <td>{{ isset($item->pelatihanUser->user->name) ? $item->pelatihanUser->user->name : $item->pendampinganUser->user->name }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->payment_method }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#infoModal{{$item->id}}"><i class="fas fa-eye"></i></button>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$item->id}}"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
@foreach ($data as $item)
<div class="modal fade" id="infoModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('transaction.update', $item->id)}}" method="post">
            @csrf
            @method('put')
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{asset('storage/'.$item->payment_proof)}}" alt="Bukti pembayaran" width="100%" class="img-thumbnail">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Konfirmasi</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection

@push('scripts')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#table-1').dataTable();
        });
    </script>
@endpush