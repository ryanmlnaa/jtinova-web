@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">
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
                                        <th>NIP</th>
                                        <th>Jabatan</th>
                                        <th>Instagram</th>
                                        <th>Linkedin</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nip }}</td>
                                            <td>{{ $item->jabatan->nama }}</td>
                                            <td>{{ $item->instagram }}</td>
                                            <td>{{ $item->linkedin }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $item->foto) }}" alt="foto"
                                                    width="100" class="img-thumbnail">
                                            </td>
                                            <td>
                                                <a href="{{ route('pegawai.edit', $item) }}" class="btn btn-warning"><i
                                                        class="fas fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger button-delete"
                                                    data-id="{{ $item->id }}"><i class="fas fa-trash"></i></button>
                                                <form action="{{ route('pegawai.destroy', $item->id) }}" method="post"
                                                    id="form-{{ $item->id }}">
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
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.button-delete').on('click', function() {
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
