@extends('layouts.guest.app')
@section('title', $title)
@section('menu', $title)
@section('content')
    <div class="section-header">
        <h1>Selamat Datang {{ Auth::user()->name }}</h1>
    </div>
    <div class="section-body">
    @role('mahasiswa-mbkm')
        @include('guest.mbkm.index')
    @endrole
    @role('instruktur')
        @include('guest.instruktur.index')
    @endrole
    @role('user-pendampingan')
        @include('guest.pendampingan.dashboard')
    @endrole
    @role('user-pelatihan')
        @include('guest.pelatihan.dashboard')
    @endrole
    </div>
@endsection
