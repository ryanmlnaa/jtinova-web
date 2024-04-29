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
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Prodi</th>
                                <th>Semester</th>
                                <th>Keahlian Utama</th>
                                <th>Keahlian Lain</th>
                                <th>Action</th>

                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($data as $item)
                            <tr>
                                <td>{{ $index }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->prodi }}</td>
                                <td>{{ $item->semester }}</td>
                                <td>{{ $item->keahlian_utama }}</td>
                                <td>{{ $item->keahlian_lain }}</td>
                           <td>
                            <form action="/hapusrecruitment/{{ $item->id_recruitment }}" method="post" class="delete-form">
                              <a href="{{route('Recruitment.edit', $item->id_recruitment)}}" class="btn btn-warning btn-sm m-0 edit-button" > <i class="fa-solid fa-trash-can"></i> Edit</a>
                              @method('DELETE')
                              @csrf
                              <input type="hidden" name="id_recruitment" value="{{ $item->id_recruitment }}">
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

              const id = this.parentNode.querySelector('input[name="id_recruitment"]').value;

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
                      this.parentNode.action = '/hapusrecruitment/' + id;
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
            <form action="{{Route('Recruitment.tambah')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="nip" class="col-form-label">NIM </label>
                  <input type="text" class="form-control" name="nim" id="nip">
                </div>
                <div class="form-group">
                  <label for="nama_pegawaai" class="col-form-label">Nama Mahasiswa</label>
                  <input type="text" class="form-control" name="nama" id="nama_pegawaai">
                </div>
                <div class="form-group">
                  <label for="prodi" class="col-form-label">Prodi</label>
                  <select class="form-control" name="prodi" id="prodi">
                    <option value="0" hidden>-- Pilih Prodi --</option>
                    @foreach($prodi as $p)
                    <option>{{$p}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="semester" class="col-form-label">Semester</label>
                  <select class="form-control" name="semester" id="semester">
                    <option value="0" hidden>-- Pilih Semester --</option>
                    @foreach($smt as $s)
                    <option>{{$s}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label class="d-block">Keahlian Utama</label>
                  @foreach($keahlian as $data)
                  @if($data->tipe_keahlian == "utama")
                  <div class="form-check">
                      <input class="form-check-input"
                          type="radio"
                          name="keahlian_utama"
                          id="exampleRadios1"
                          value="Laravel">
                      <label class="form-check-label"
                          for="exampleRadios1">
                          {{$data->nama_keahlian}}
                      </label>
                  </div>
                  @endif
                  @endforeach
              </div>
                <div class="form-group">
                  <label class="d-block">Keahlian Lain</label>
                  @foreach($keahlian as $data)
                  @if($data->tipe_keahlian == "lain")
                  <div class="form-check">
                      <input class="form-check-input"
                          name="keahlian_lain"
                          type="checkbox"
                          value="Desain">
                      <label class="form-check-label"
                          for="defaultCheck1">
                          Desain
                      </label>
                  </div>
                  @endif
                  @endforeach
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
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

  