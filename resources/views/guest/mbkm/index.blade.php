@php
  $data = App\Models\MbkmUser::where('user_id', Auth::user()->id)->first();
@endphp

@if ($data->status_pendaftaran == 'proses')
<div class="card">
  <div class="card-header">
    <h4>Status Pendaftaran</h4>
  </div>
  <div class="card-body">
    <h5>Pendaftaran sedang diproses, pantau terus email dan dashboard untuk informasi lebih lanjut.</h5>
  </div>
</div>
@elseif ($data->status_pendaftaran == 'gagal')
<div class="card">
  <div class="card-header">
    <h4>Status Pendaftaran</h4>
  </div>
  <div class="card-body">
    <h5><span class="text-info">Mohon maaf</span>, anda <span class="text-info">tidak lolos</span> seleksi MBKM. Silahkan coba lagi di periode berikutnya.</h5>
  </div>
</div>
@else
<div class="row">
  <div class="col-6">
    <div class="card">
      <div class="card-header">
        <h4>Aktivitas MBKM</h4>
      </div>
      <div class="card-body">
        List project yang sedang berjalan
      </div>
    </div>
  </div>
  <div class="col-6">
    <div class="card">
      <div class="card-header">
        <h4>Status Presensi</h4>
      </div>
      <div class="card-body">
        List presensi yang sudah diisi
      </div>
    </div>
  </div>
</div>
@endif