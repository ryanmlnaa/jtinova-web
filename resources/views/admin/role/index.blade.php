@extends('layouts.admin.app')
@section('title', 'Role')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('role.create')}}" class="btn btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Tambah Data">
                        Tambah Data
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Lihat Permission" onclick="$('#showModal{{$item->id}}').modal('show')"><i class="fas fa-eye"></i></button>
                                        <a href="{{route('role.edit', $item)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger button-delete" data-id="{{$item->id}}" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i></button>
                                        <form action="{{route('role.destroy', $item->id)}}" method="post" id="form-{{$item->id}}">
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
{{-- modal show permission --}}
@foreach ($data as $item)
<div class="modal fade" id="showModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Role {{$item->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                @foreach ($item->permissions as $permission)
                <div class="col-md-3 mb-2">
                    <span class="badge {{$loop->iteration % 2 == 0 ? 'badge-light' : 'badge-secondary'}}">{{$permission->name}}</span>
                </div>
                @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
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