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
                                <th>Nama Instruktur</th>
                                <th>Email</th>
                                <th>No Telp</th>
                                <th>Agama</th>
                                <th>Pekerjaan</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Tempat / Tgl Lahir</th>
                                <th>Alamat</th>
                                <th>Keahlian</th>
                                <th>Foto KTP</th>
                                <th>Portofolio</th>
                                <th>Tanggal Daftar</th>
                                <th>Action</th>

                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($data as $item)
                            <tr>
                                <td>{{ $index }}</td>
                                <td>{{ $item->nama_instruktur }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_telp }}</td>
                                <td>{{ $item->agama }}</td>
                                <td>{{ $item->pekerjaan }}</td>
                                <td>{{ $item->pendidikan_terakhir }}</td>
                                <td>{{ $item->tmp_lahir }}/{{ $item->tgl_lahir }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->bidang_keahlian }}</td>
                                <td>
                                    <img src="{{ url('foto_ktp_instruktur/' . $item->foto_ktp) }}"
                                        style="width: 200px; height: 120px; object-fit: cover;" alt=""
                                        class="rounded">

                                </td>
                                <td>
                                    <img src="{{ url('portofolio_instruktur/' . $item->portofolio) }}"
                                        style="width: 200px; height: 120px; object-fit: cover;" alt=""
                                        class="rounded">

                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <form action="/hapusinstruktur/{{ $item->id_instruktur }}" method="post"
                                        class="delete-form">
                                        <a href="{{ route('Instruktur.edit', $item->id_instruktur) }}"
                                            class="btn btn-warning btn-sm m-0 edit-button"> <i
                                                class="fa-solid fa-trash-can"></i> Edit</a>
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="id_instruktur" value="{{ $item->id_instruktur }}">
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

                const id = this.parentNode.querySelector('input[name="id_instruktur"]').value;

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
                        this.parentNode.action = '/hapusinstruktur/' + id;
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
                <form action="{{Route('Instruktur.tambah')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nip" class="col-form-label">Nama Instruktur<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_instruktur" id="nip">
                    </div>
                    <div class="form-group">
                      <label for="nip" class="col-form-label">Email<span class="text-danger">*</span></label>
                      <input type="email" class="form-control" name="email" id="nip">
                  </div>
                    <div class="form-group">
                        <label for="nama_pegawaai" class="col-form-label">No Telp<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="no_telp" id="nama_pegawaai">
                    </div>
                    <div class="form-group">
                        <label for="kedudukan" class="col-form-label">Agama<span class="text-danger">*</span></label>
                        <select class="form-control" name="agama" id="kedudukan">
                            <option value="0" hidden>-- Pilih Agama --</option>
                            @foreach($agama as $data)
                            <option>{{$data}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="d-block">Jenis Kelamin</label>
                        @foreach($jkel as $data)
                        <div class="form-check">
                            <input class="form-check-input"
                                type="radio"
                                name="j_kel"
                                id="exampleRadios1"
                                value="{{$data}}">
                            <label class="form-check-label"
                                for="exampleRadios1">
                                {{$data}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="nama_pegawaai" class="col-form-label">Pekerjaan<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="pekerjaan" id="nama_pegawaai">
                    </div>
                    <div class="form-group">
                        <label for="nama_pegawaai" class="col-form-label">Pendidikan Terakhir<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="pendidikan_terakhir" id="nama_pegawaai">
                    </div>
                    <div class="form-group">
                        <label for="kedudukan" class="col-form-label">Keahlian<span class="text-danger">*</span></label>
                        <select class="form-control" name="keahlian" id="kedudukan">
                            <option value="0" hidden>-- Pilih Keahlian --</option>
                            @foreach($keahlian as $data)
                            <option>{{$data}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_pegawaai" class="col-form-label">Tempat Lahir<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="tmp_lahir" id="nama_pegawaai">
                    </div>
                    <div class="form-group">
                        <label for="nama_pegawaai" class="col-form-label">Tanggal Lahir<span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="tgl_lahir" id="nama_pegawaai">
                    </div>
                    <div class="form-group">
                        <label for="nama_pegawaai" class="col-form-label">Alamat<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="alamat" id="nama_pegawaai">
                    </div>
                    <div class="form-group">
                        <label for="foto_profile" class="col-form-label">Foto KTP</label>
                        <input type="file" class="form-control" name="foto_ktp" id="foto_profile"
                            onchange="previewImageKTP(this);">
                        <img id="gambar-preview-ktp" src="#" alt="Gambar Pratinjau"
                            style="max-width: 50%; display: none;">
                    </div>
                    <div class="form-group">
                        <label for="foto_profile" class="col-form-label">Portofolio</label>
                        <input type="file" class="form-control" name="portofolio" id="foto_profile"
                            onchange="previewImagePorto(this);">
                        <img id="gambar-preview-portofolio" src="#" alt="Gambar Pratinjau"
                            style="max-width: 50%; display: none;">
                    </div>
                    {{-- <div class="form-group">
                        <label for="kedudukan" class="col-form-label">Status Peserta<span class="text-danger">*</span></label>
                        <select class="form-control" name="status" id="kedudukan">
                            <option value="0" hidden>-- Pilih Status --</option>
                            <option>aktif</option>
                            <option>nonaktif</option>
                        </select>
                    </div> --}}
                   
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
    function previewImageKTP(input) {
        var preview = document.getElementById('gambar-preview-ktp');
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
    function previewImagePorto(input) {
        var preview = document.getElementById('gambar-preview-portofolio');
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
