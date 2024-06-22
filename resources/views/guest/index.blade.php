@extends('layouts.guest.app')
@section('title', $title)
@section('menu', $title)
@section('content')
    <div class="section-header">
        <h1>Selamat Datang {{ Auth::user()->name }}</h1>
    </div>
    <div class="section-body">
    @role('mahasiswa-mbkm')
        @can('fill-profile')
            @include('guest.mbkm.form-biodata')
        @else
            @include('guest.mbkm.index')
        @endcan
    @endrole
    @role('user-pendampingan')
        @include('guest.pendampingan.dashboard')
    @endrole
    @role('user-pelatihan')
        @include('guest.pelatihan.dashboard')
    @endrole
    @role('instruktur')
        @can('fill-profile')
            @include('guest.instruktur.form-biodata')
        @else
            @include('guest.instruktur.index')
        @endcan
    @endrole
    </div>
@endsection
