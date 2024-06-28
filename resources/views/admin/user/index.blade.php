@extends('layouts.admin.app')
@section('title', 'Data Semua Pengguna')
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Permission Langsung</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if ($item->getRoleNames()->count() == 0)
                                            <span class="badge badge-light">Tidak ada Role</span>
                                        @else
                                        @foreach ($item->getRoleNames() as $role)
                                            <span class="badge badge-secondary">{{$role}}</span>
                                        @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->getDirectPermissions()->count() == 0)
                                            <span class="badge badge-light">Tidak ada permission</span>
                                        @else
                                        @foreach ($item->getDirectPermissions() as $permission)
                                            <span class="badge badge-secondary">{{$permission->name}}</span>
                                        @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('user.edit', $item)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger button-delete" data-id="{{$item->id}}" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i></button>
                                        <form action="{{route('user.destroy', $item)}}" method="post" id="form-{{$item->id}}">
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