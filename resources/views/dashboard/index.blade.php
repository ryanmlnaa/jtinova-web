@extends('templating.main')
@section('title', $title)
@section('menu', $title)
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-lg-12">
            @role('mahasiswa-mbkm')
            @can('fill-profile')
                @include('dashboard.mbkm-user-form')
            @endcan
            @endrole
            @role('user-pendampingan')
            @can('fill-profile')
                @include('dashboard.pendampingan-user-form')
            @endcan
            @endrole
            @role('user-pelatihan')
            @can('fill-profile')
                @include('dashboard.pelatihan-user-form')
            @endcan
            @endrole
            @role('instruktur')
            @can('fill-profile')
                @include('dashboard.instruktur-form')
            @endcan
            @endrole
        </div>
    </div>
</div>
@endsection
