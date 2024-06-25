@extends('layouts.admin.app')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $title }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>JK</th>
                                    <th>Pendidikan Terakhir</th>
                                    <th>Pekerjaan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->user->jenis_kelamin }}</td>
                                    <td>{{ $item->user->pendidikan_terakhir }}</td>
                                    <td>{{ $item->user->pekerjaan }}</td>
                                    <td>{{ $item->status_pendaftaran }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#infoModal{{$item->id}}"><i class="fas fa-eye"></i></button>
                                        <button type="button" class="btn btn-danger button-delete" data-id="{{$item->id}}"><i class="fas fa-trash"></i></button>
                                        <form action="{{route('instruktur.destroy', $item)}}" method="post" id="form-{{$item->id}}">
                                            @csrf
                                            @method('delete')
                                        </form>
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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CV dan Foto {{$item->user->name}}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-9">
                        <embed src="{{asset('storage/'.$item->user->cv)}}" type="application/pdf" width="100%" height="600px">
                    </div>
                    <div class="col-3">
                        <img src="{{asset('storage/'.$item->user->foto)}}" alt="Foto {{$item->user->name}}" width="100%" class="img-thumbnail">
                        <br>
                        <br>
                        <form action="{{route('instruktur.notifyPendaftaran', $item->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="gagal" {{ $item->status_pendaftaran == 'gagal' ? 'selected' : '' }}>Tidak Lolos</option>
                                    <option value="proses" {{ $item->status_pendaftaran == 'proses' ? 'selected' : '' }}>Proses Seleksi Selanjutnya</option>
                                    <option value="lolos" {{ $item->status_pendaftaran == 'lolos' ? 'selected' : '' }}>Lolos Seleksi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pelatihan_id">Pilih Pelatihan (Pilih jika peserta lolos)</label>
                                <select name="pelatihan_id" class="form-control">
                                    <option value="">Pilih Pelatihan</option>
                                    @foreach ($pelatihan as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="kirim_notif" name="kirim_notif" value="1">
                                <label class="form-check-label" for="kirim_notif">Kirim Email Notifikasi</label>
                            </div>                            
                            <button type="submit" class="btn btn-primary">Ubah Status</button>
                        </form>
                    </div>
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@push('scripts')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.button-delete').on('click', function () {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batalkan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#form-' + id).submit();
                    }
                })
            });

            $('#table-1').dataTable();
        });
    </script>
@endpush