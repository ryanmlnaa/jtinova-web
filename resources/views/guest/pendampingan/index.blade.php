@extends('layouts.guest.app')
@section('title', $title)
@section('content')
    <div class="section-header">
        <h1> Skema Pendampingan </h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Pendampingan yang Kamu Ikuti</h4>
                    </div>
                    <div class="card-body">
                        @if ($pendampingan)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Judul</th>
                                        <td>{{ $pendampingan->judul }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dosen Pembimbing</th>
                                        <td>{{ $pendampingan->dosen_pembimbing }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kendala</th>
                                        <td>{{ $pendampingan->kendala }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($pendampingan->status == 'pending')
                                                <a href="{{ route('pendampingan.showForm') }}"
                                                    class="btn btn-primary">Lengkapi Profile</a>
                                            @elseif(
                                                $pendampingan->status == 'progress' &&
                                                    $pendampingan->transaction->status == 'need_confirm' &&
                                                    $pendampingan->transaction->payment_proof == null)
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#konfirmModal">Konfirmasi ke Admin</button>
                                            @elseif(
                                                ($pendampingan->status == 'progress' &&
                                                    $pendampingan->transaction->status == 'pending' &&
                                                    $pendampingan->transaction->payment_proof == null) ||
                                                    ($pendampingan->status == 'progress' && $pendampingan->transaction->status == 'failed'))
                                                <a href="{{ route('transaction.bayar.index', Illuminate\Support\Facades\Crypt::encryptString($pendampingan->transaction->id)) }}"
                                                    class="btn btn-primary">Upload Bukti Bayar</a>
                                            @elseif(
                                                $pendampingan->status == 'progress' &&
                                                    $pendampingan->transaction->status == 'pending' &&
                                                    $pendampingan->transaction->payment_proof != null)
                                                {{ $pendampingan->status }}
                                            @else
                                                {{ $pendampingan->status }}
                                            @endif
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        @else
                            <p>Belum ada pendampingan yang kamu ikuti</p>
                            <a href="{{ route('katalog.pendampingan.index') }}" class="btn btn-primary">Lihat Skema
                                Pendampingan</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modal')
    <div class="modal fade" id="konfirmModal" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi ke Admin by WA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-light">
                        <p>Silakan Konfirmasi ke salah satu admin berikut untuk lanjut ke pembayaran: </p>
                        <a href="https://wa.me/6285183002639"><strong>Admin: +62 851-8300-2639</strong></a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endpush
