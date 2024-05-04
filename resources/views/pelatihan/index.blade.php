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
                                <th>Nama Pelatihan</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                                <th>Benefit</th>
                                <th>Harga</th>
                                <th>Foto</th>
                                <th>Action</th>

                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($data as $item)
                            <tr>
                                <td>{{ $index }}</td>
                                <td>{{ $item->nama_pelatihan }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ $item->benefit }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>
                                  <img src="{{ url('foto_pelatihan/' . $item->foto) }}"
                                      style="width: 120px; height: 80px; object-fit: cover;" alt=""
                                      class="rounded">
                              </td>  
                           <td>
                            <form action="/hapuspelatihan/{{ $item->id_pelatihan }}" method="post" class="delete-form">
                              <a href="{{route('Pelatihan.edit', $item->id_pelatihan)}}" class="btn btn-warning btn-sm m-0 edit-button" > <i class="fa-solid fa-trash-can"></i> Edit</a>
                              @method('DELETE')
                              @csrf
                              <input type="hidden" name="id_pelatihan" value="{{ $item->id_pelatihan }}">
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

              const id = this.parentNode.querySelector('input[name="id_pelatihan"]').value;

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
                      this.parentNode.action = '/hapuspelatihan/' + id;
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{Route('Pelatihan.tambah')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="nip" class="col-form-label">Nama Pelatihan</label>
                  <input type="text" class="form-control" name="nama_pelatihan" id="nip">
                </div>
                <div class="form-group">
                  <label for="nip" class="col-form-label">Deskripsi</label>
                  <textarea type="number" class="form-control" name="deskripsi" id="nip"></textarea>
              </div>
                <div class="form-group">
                  <label for="kedudukan" class="col-form-label">Kategori</label>
                  <select class="form-control" name="kategori" id="kedudukan">
                      <option value="0" hidden>-- Pilih Kategori --</option>
                      @foreach($kat as $k)
                      <option>{{$k}}</option>
                      @endforeach
                  </select>
              </div>  
              <div class="form-group">
                <label for="nip" class="col-form-label">Benefit</label>
                <input type="text" class="form-control" name="benefit" id="nip">
              </div>
                <div class="form-group">
                  <label for="instagram" class="col-form-label">Harga</label>
                  <input type="text" class="form-control" name="harga" id="instagram">
              </div>
              <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*">
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

  