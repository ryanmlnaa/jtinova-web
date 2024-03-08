@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Simple Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    <tr>
                      <th>#</th>
                      <th>Nama grup</th>
                      <th>Judul</th>
                      <th>thumbnail</th>
                      <th>slug</th>
                      <th>deskripsi</th>
                      <th>Action</th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Irwansyah Saputra</td>
                      <td>2017-01-09</td>
                      <td><div class="badge badge-success">Active</div></td>
                      <td><a href="#" class="btn btn-secondary">Detail</a></td>
                    </tr>
                  </table>
                </div>
              </div>
        </div>
    </div>
</div>


@endsection