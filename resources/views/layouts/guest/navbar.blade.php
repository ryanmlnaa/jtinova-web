@php
$timeline = \App\Models\Timeline::where('status', 1)->first();
if ($timeline) {
    $timelineData = json_decode($timeline->timeline);

    if (Carbon\Carbon::now()->format('Y-m-d') >= $timelineData[0]->start && Carbon\Carbon::now()->format('Y-m-d') <= $timelineData[0]->end) {
        $disabled = false;
    } else {
        $disabled = true;
    }
} else {
    $disabled = true;
}
@endphp

<nav class="navbar navbar-expand-lg main-navbar">
    <a href="{{route('dashboard')}}" class="navbar-brand sidebar-gone-hide">JTINOVA</a>
    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
    <div class="nav-collapse">
      <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
        <i class="fas fa-ellipsis-v"></i>
      </a>
      <ul class="navbar-nav">
        <li class="nav-item"><a href="{{route('dashboard')}}" class="nav-link">Dashboard</a></li>
        @if (!$disabled)
        <li class="nav-item"><a href="{{route('register.mbkm')}}" class="nav-link">Daftar MBKM</a></li>
        @endif
      </ul>
    </div>
    <div class="ml-auto"></div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{asset('storage/'.Auth::user()->foto)}}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{Auth::user()->name}}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{route('dashboard.profileGuest.index')}}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="{{route('dashboard.passwordGuest.index')}}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Ubah Password
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>

<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item {{ Request::is('dashboard/pelatihan') ? 'active' : '' }}">
                <a href="{{route('dashboard.pelatihan.index')}}" class="nav-link"><i class="fas fa-book"></i><span>Pelatihan</span></a>
            </li>
            <li class="nav-item {{ Request::is('dashboard/pendampingan') ? 'active' : '' }}">
                <a href="{{route('dashboard.pendampingan.index')}}" class="nav-link"><i class="fas fa-hands-helping"></i><span>Pendampingan</span></a>
            </li>
            @role('mahasiswa-mbkm')
            <li class="nav-item">
                <a href="{{route('mbkmTimeline.index')}}" class="nav-link"><i class="fas fa-calendar"></i><span>Timeline</span></a>
            </li>
            @endrole
        </ul>
    </div>
</nav>