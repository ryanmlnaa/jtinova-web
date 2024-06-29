@php
  use Illuminate\Support\Str;
@endphp
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Aktivitas Pelatihan</h4>
      </div>
      <div class="card-body">
        <ul class="list-unstyled list-unstyled-border">
          @foreach ($aktivitas_pelatihans as $aktivitas_pelatihan)
          <li class="media">
            <img class="mr-3 rounded-circle" width="50" src="{{asset('storage/'.$aktivitas_pelatihan->pelatihan->foto)}}" alt="{{$aktivitas_pelatihan->pelatihan->kode}}">
            <div class="media-body">
              <div class="media-title">{{$aktivitas_pelatihan->pelatihan->nama}}</div>
              <span class="text-small text-muted">{{ Str::limit(Str::of($aktivitas_pelatihan->pelatihan->deskripsi)->stripTags(), 50) }}</span>
            </div>
          </li>
          @endforeach
        </ul>
        <div class="text-center pt-1 pb-1">
          <a href="{{route('dashboard.pelatihan.index')}}" class="btn btn-primary btn-lg btn-round">
            Lihat Semua
          </a>
        </div>
      </div>
    </div>
  </div>
</div>