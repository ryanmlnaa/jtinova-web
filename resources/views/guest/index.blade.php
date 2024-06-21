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
        @if(auth()->user()->can('fill-profile'))
            @include('guest.pendampingan.form-biodata')
        @elseif(auth()->user()->can('bayar'))
            @include('guest.form-bukti-bayar.index')
        @else
            @include('guest.pendampingan.index')
        @endif
    @endrole
    @role('user-pelatihan')
        @if(auth()->user()->can('fill-profile'))
            @include('guest.pelatihan.form-biodata')
        @elseif(auth()->user()->can('bayar'))
            @include('guest.form-bukti-bayar.index')
        @elseif (auth()->user()->can('pending'))
            @include('guest.form-bukti-bayar.pending')
        @else
            @include('guest.pelatihan.index')
        @endif
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
