@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data
                    </button>

                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>#</th>
                                <th>Nama Peserta</th>
                                <th>No Rekening</th>
                                <th>Nominal</th>
                                <th>Bukti Transfer</th>
                                <th>Status</th>
                                <th>Tanggal Bayar</th>
                                <th>Action</th>

                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($data as $item)
                            <tr>
                                <td>{{ $index }}</td>
                                <td>{{ $item->nama_peserta }}</td>
                                <td>{{ $item->no_rekening }}</td>
                                <td>{{ $item->nominal }}</td>
                                <td>
                                    <img src="{{ url('bukti_pembayaran/' . $item->bukti_pembayaran) }}"
                                        style="width: 100px; height: 240px; object-fit: cover;" alt=""
                                        class="rounded">

                                </td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <form action="/hapuspembayaran/{{ $item->id_pembayaran }}" method="post"
                                        class="delete-form">
                                        <a href="{{ route('Pembayaran.edit', $item->id_pembayaran) }}"
                                            class="btn btn-warning btn-sm m-0 edit-button"> <i
                                                class="fa-solid fa-trash-can"></i> Edit</a>
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="id_pembayaran" value="{{ $item->id_pembayaran }}">
                                        <button class="btn btn-danger btn-sm m-0 delete-button" type="submit">
                                            <i class="fa-solid fa-trash-can"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $index++;
                            @endphp
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                const id = this.parentNode.querySelector('input[name="id_pembayaran"]').value;

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
                        this.parentNode.action = '/hapuspembayaran/' + id;
                        this.parentNode.submit();
                    }
                });
            });
        });
    </script>
@endsection
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah {{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('Pembayaran.tambah')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="kedudukan" class="col-form-label">Nama Peserta<span class="text-danger">*</span></label>
                        <select class="form-control" name="peserta" id="kedudukan">
                            <option value="0" hidden>-- Pilih Peserta --</option>
                            @foreach($peserta as $item)
                            <option value="{{$item->id_peserta}}">{{$item->nama_peserta}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nip" class="col-form-label">No Rekening<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="no_rekening" id="nip">
                    </div>
                    <div class="form-group">
                      <label for="nip" class="col-form-label">Nominal<span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="nominal" id="nip">
                  </div>
                    <div class="form-group">
                        <label for="foto_profile" class="col-form-label">Bukti Transfer<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="bukti_pembayaran" id="foto_profile"
                            onchange="previewImage(this);">
                        <img id="gambar-preview" src="#" alt="Gambar Pratinjau"
                            style="max-width: 50%; display: none;">
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage(input) {
        var preview = document.getElementById('gambar-preview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            preview.style.display = 'block';
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>
