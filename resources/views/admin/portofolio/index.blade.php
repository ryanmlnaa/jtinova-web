@extends('layouts.admin.app')
@section('title', $title)
@section('menu', $title)
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('portofolio.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>klien</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                {{-- <th>foto</th> --}}
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Action</th>
                                @php $index = 1; @endphp
                                @foreach ($data as $item)
                            <tr>
                                <td>{{ $index }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->klien }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                {{-- <td>

                                    <img src="{{ url('foto_portofolio/' . $item->gambar) }}"
                                        style="width: 120px; height: 80px; object-fit: cover;" alt=""
                                        class="rounded">

                                </td> --}}
                                <td>{{ $item->start_date }}</td>
                                <td>{{ $item->end_date }}</td>
                                <td>
                                    <form action="{{ route('portofolio.destroy', $item->id) }}" method="post"
                                        class="delete-form">
                                        <a href="{{ route('portofolio.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm m-0 edit-button"> <i
                                                class="fa-solid fa-trash-can"></i> Edit</a>
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="id_portofolio" value="{{ $item->id }}">
                                        <button class="btn btn-danger btn-sm m-0 delete-button" type="submit">
                                            <i class="fa-solid fa-trash-can"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @php $index++; @endphp
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-button');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const form = this.closest('form');
                    Swal.fire({
                        title: 'Hapus Data?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal',
                        showCloseButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        customClass: {
                            container: 'my-swal'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
