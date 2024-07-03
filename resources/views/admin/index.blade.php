@extends('layouts.admin.app')
@section('title', $title)
@section('menu', $title)
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>User Baru Hari Ini</h4>
                        </div>
                        <div class="card-body">
                            {{ $dataCard['newUsersCountToday'] }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total User Pelatihan</h4>
                        </div>
                        <div class="card-body">
                            {{ $dataCard['totalUserPelatihanCount'] }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total User Pendampingan</h4>
                        </div>
                        <div class="card-body">
                            {{ $dataCard['totalUserPendampinganCount'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Transaksi Baru</h4>
                    <div class="card-header-action">
                        <a href="{{ route('transaction.index') }}" class="btn btn-primary">Lihat Detail <i
                                class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataCard['transactions'] as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->invoice }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y H:i') }}</td>
                                        <td>{{ isset($item->pelatihanUser->user->name) ? $item->pelatihanUser->user->name : $item->pendampinganUser->user->name }}
                                        </td>
                                        <td>
                                            @if ($item->status == 'pending')
                                                <span class="badge badge-warning">{{ $item->status }}</span>
                                            @elseif ($item->status == 'success')
                                                <span class="badge badge-success">{{ $item->status }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ $item->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="tooltip"
                                                data-placement="top" title="Lihat Bukti Bayar"
                                                onclick="$('#infoModal{{ $item->id }}').modal('show')"><i
                                                    class="fas fa-eye"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-hero">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="far fa-question-circle"></i>
                    </div>
                    <h4>{{ $dataCard['contactMessagesCount'] }}</h4>
                    <div class="card-description">Pesan Belum Dibaca</div>
                </div>
                <div class="card-body p-0">
                    <div class="tickets-list">
                        @foreach ($dataCard['contactMessages'] as $item)
                            <a href="{{ route('contact-message.show', $item) }}" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>{{ $item->subject }}</h4>
                                </div>
                                <div class="ticket-info">
                                    <div> {{ $item->name }}</div>
                                    <div class="bullet"></div>
                                    <div class="text-primary">{{ $item->created_at->diffForHumans() }}</div>
                                </div>
                            </a>
                        @endforeach
                        <a href="{{ route('contact-message.index') }}" class="ticket-item ticket-more">
                            Lihat Semua <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Layanan Pelatihan</h4>
                    <div class="card-header-action">
                        <a href="{{ route('pelatihan.index') }}" class="btn btn-primary">Lihat Detail <i
                                class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr class="text-center">
                                    <th>Layanan</th>
                                    <th>Pendaftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataCard['pelatihan'] as $item)
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td class="text-center">{{ $item->pelatihanUsers->count() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Layanan Pendampingan</h4>
                    <div class="card-header-action">
                        <a href="{{ route('skemaPendampingan.index') }}" class="btn btn-primary">Lihat Detail <i
                                class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr class="text-center">
                                    <th>Nama Pelatihan</th>
                                    <th>Pendaftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataCard['pendampingan'] as $item)
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td class="text-center">{{ $item->pendampinganUsers->count() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Layanan MBKM, Freelance, dan Instruktur</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>Layanan</th>
                                    <th>Jenis</th>
                                    <th>Pendaftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataCard['timeline'] as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->jenis }}</td>
                                        <td>
                                            @if ($item->jenis == 'mbkm')
                                                {{ $item->MbkmUser->count() }}
                                            @elseif ($item->jenis == 'freelance')
                                                {{ $item->FreelanceUser->count() }}
                                            @elseif ($item->jenis == 'instruktur')
                                                {{ $item->InstrukturUser->count() }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    @foreach ($dataCard['transactions'] as $item)
        <div class="modal fade" id="infoModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('transaction.update', $item->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if ($item->payment_proof)
                                <img src="{{ asset('storage/' . $item->payment_proof) }}" alt="Bukti pembayaran"
                                    width="100%" class="img-thumbnail">
                            @else
                                <p class="text-center">Belum ada bukti pembayaran</p>
                            @endif
                        </div>
                        <div class="modal-footer">
                            @if ($item->status == 'need_confirm')
                                <button type="submit" class="btn btn-primary" name="status" value="pending">Lanjut ke
                                    Upload Bukti TF</button>
                            @else
                                <button type="submit" class="btn btn-primary" name="status" value="success">Konfirmasi
                                    Bukti TF</button>
                            @endif
                            <button type="submit" class="btn btn-danger" name="status" value="failed">Tolak</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
