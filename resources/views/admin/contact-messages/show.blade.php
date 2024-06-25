@extends('layouts.admin.app')
@section('title', 'Pesan Kontak Detail')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Nama</th>
                                <td>{{ $message->name }}</td>
                            </tr>
                            <tr>
                                <th>Surel</th>
                                <td>{{ $message->email }}</td>
                            </tr>
                            <tr>
                                <th>Subjek</th>
                                <td>{{ $message->subject }}</td>
                            </tr>
                            <tr>
                                <th>Pesan</th>
                                <td>{{ $message->message }}</td>
                            </tr>
                        </table>
                    </div>
                    <a href="{{route('contact-message.index')}}" class="btn btn-primary">Kembali</a>                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection