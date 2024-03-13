@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nip" class="control-label">Nip</label>
                    <input type="number" id="nip" name="nip" class="form-control"
                        value="" autofocus>
                </div>
                <div class="form-group">
                    <label for="nama_pegawai" class="control-label">Nama Pegawai</label>
                    <input type="text" id="nama_pegawai" name="nama_pegawai" class="form-control"
                        value="" autofocus>
                </div>
                <div class="form-group">
                    <label for="kedudukan" class="control-label">Kedudukan</label>
                    <input type="text" id="kedudukan" name="kedudukan" class="form-control"
                        value="" autofocus>
                </div>
                <div class="form-group">
                    <label for="link_linkdIn" class="control-label">Link linkdin</label>
                    <input type="text" id="link_linkdIn" name="link_linkdIn" class="form-control"
                        value="" autofocus>
                </div>
                <div class="form-group">
                    <label for="instagram" class="control-label">Instagram</label>
                    <input type="text" id="instagram" name="instagram" class="form-control"
                        value="" autofocus>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection