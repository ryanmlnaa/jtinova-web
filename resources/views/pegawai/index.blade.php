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
                                <th>Nip</th>
                                <th>Nama Pegawai</th>
                                <th>Jabatan</th>
                                <th>Link LinkdIn</th>
                                <th>instagram</th>
                                <th>foto Pegawai</th>
                                <th>Action</th>

                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($data as $item)
                            <tr>
                                <td>{{ $index }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->nama_pegawai }}</td>
                                <td>{{ $item->nama_jabatan }}</td>
                                <td>{{ $item->link_linkdIn }}</td>
                                <td>{{ $item->instagram }}</td>
                                <td>
                                    <img src="{{ url('foto_pegawai/' . $item->foto_profile) }}"
                                        style="width: 70px; height: 70px; object-fit: cover;" alt=""
                                        class="rounded-circle">

                                </td>
                           <td>
                            <form action="/hapuspegawai/{{ $item->id_pegawai }}" method="post" class="delete-form">
                              <a href="{{route('Pegawai.edit', $item->id_pegawai)}}" class="btn btn-warning btn-sm m-0 edit-button" > <i class="fa-solid fa-trash-can"></i> Edit</a>
                              @method('DELETE')
                              @csrf
                              <input type="hidden" name="id_pegawai" value="{{ $item->id_pegawai }}">
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

              const id = this.parentNode.querySelector('input[name="id_pegawai"]').value;

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
                      this.parentNode.action = '/hapuspegawai/' + id;
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
            <form action="/tambahdatapegawai" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="nip" class="col-form-label">NIP / NIK / No KTP <span class="text-danger">*</span> </label>
                  <input type="number" class="form-control" name="nip" id="nip">
                </div>
                <div class="form-group">
                  <label for="nama_pegawaai" class="col-form-label">Nama Pegawai <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawaai">
                </div>
                <div class="form-group">
                  <label for="kedudukan" class="col-form-label">Jabatan  <span class="text-danger">*</span></label>
                  <select class="form-control" name="jabatan" id="kedudukan">
                    <option value="0" hidden>-- Pilih Jabatan --</option>
                    @foreach($jabatan as $data)
                      <option value="{{$data->id_jabatan}}"> {{$data->nama_jabatan}} </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="link_linkdIn" class="col-form-label">link linkdin</label>
                  <input type="text" class="form-control" name="link_linkdIn" id="link_linkdIn">
                </div>
                <div class="form-group">
                  <label for="instagram" class="col-form-label">Link Instagram</label>
                  <input type="text" class="form-control" name="instagram" id="instagram">
                </div>
                <div class="form-group">
                  <label for="foto_profile" class="col-form-label">Foto Pegawai  <span class="text-danger">*</span></label>
                  <input type="file" class="form-control" name="foto_profile" id="foto_profile" onchange="previewImage(this);">
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

      reader.onloadend = function () {
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

  