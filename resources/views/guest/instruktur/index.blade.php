@php
  $data = App\Models\InstrukturUser::where('user_id', Auth::user()->id)->first();
  $pelatihans = App\Models\InstrukturUser::where('user_id', Auth::user()->id)->latest()->limit(5)->get();
@endphp

@if ($data && $data->status_pendaftaran == 'proses')
<div class="card">
  <div class="card-header">
    <h4>Status Pendaftaran Instruktur</h4>
  </div>
  <div class="card-body">
    <h5>Pendaftaran sedang diproses, pantau terus email dan dashboard untuk informasi lebih lanjut.</h5>
  </div>
</div>
@elseif ($data && $data->status_pendaftaran == 'gagal')
<div class="card">
  <div class="card-header">
    <h4>Status Pendaftaran Instruktur</h4>
  </div>
  <div class="card-body">
    <h5><span class="text-info">Mohon maaf</span>, anda <span class="text-info">tidak lolos</span> seleksi Instruktur. Silahkan coba lagi di periode berikutnya.</h5>
  </div>
</div>
@else
<div class="card">
  <div class="card-header">
    <h4>Aktivitas Instruktur</h4>
  </div>
  <div class="card-body">
    <ul class="list-unstyled list-unstyled-border">
      @foreach ($pelatihans as $pelatihan)
      <li class="media">
        <img class="mr-3 rounded-circle" width="50" src="{{asset('storage/'.$pelatihan->pelatihan->foto)}}" alt="{{$pelatihan->pelatihan->kode}}">
        <div class="media-body">
          <div class="media-title">{{$pelatihan->pelatihan->nama}}</div>
          <span class="text-small text-muted">{{Illuminate\Support\Str::limit($pelatihan->pelatihan->deskripsi, 50)}}</span>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</div>
@endif