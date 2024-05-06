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
                                <th>Nama Jabatan</th>
                                <th>Action</th>

                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($data as $item)
                            <tr>
                                <td>{{ $index }}</td>
                                <td>{{ $item->nama_jabatan }}</td>
                              
                           <td>
                           
                            <form action="" method="post" class="delete-form">
                                <a href="{{route('Jabatan.edit', $item->id_jabatan)}}" class="btn btn-warning btn-sm m-0 edit-button" > <i class="fa-solid fa-trash-can"></i> Edit</a>
                              @method('DELETE')
                              @csrf
                              <input type="hidden" name="id_jabatan" value="{{ $item->id_jabatan }}">
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

              const id = this.parentNode.querySelector('input[name="id_jabatan"]').value;

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
                      this.parentNode.action = '/hapusjabatan/' + id;
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah {{ $title }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('Jabatan.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="nama_kedudukan" class="col-form-label">Nama Jabatan  <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="nama_jabatan" id="nama_kedudukan">
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
 
  