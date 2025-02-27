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
                                    <th>Kode Pelatihan</th>
                                    <th>Nama Pelatihan</th>
                                    <th>Nama Peserta</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelatihanteam->pelatihanUsers as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if (isset($item->pelatihan->kode))
                                        <a href="{{route('katalog.pelatihan.show', $item->pelatihan->kode)}}" target="_blank">{{ $item->pelatihan->kode }}</a>
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>{{ isset($item->pelatihan->nama) ? $item->pelatihan->nama : '' }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    {{-- <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$item->id}}"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger button-delete" data-id="{{$item->id}}"><i class="fas fa-trash"></i></button>
                                        <form action="{{route('pelatihanuser.destroy', $item)}}" method="post" id="form-{{$item->id}}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td> --}}
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