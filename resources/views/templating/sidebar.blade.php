<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="#">JTINOVA</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">NOVA</a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class=" {{ Request::is('home') ? 'active' : '' }}  "><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

    @role(['admin', 'pegawai'])
      <li class="menu-header">Konfigurasi Web</li>
      <li class=" {{ Request::is('web-config') ? 'active' : '' }} "><a class="nav-link" href="{{ route('webconfig.index') }}"><i class="fas fa-cog"></i> <span>Konfigurasi Web</span></a></li>
      <li class="menu-header">Data Master</li>
      <li class=" {{ Request::is('jabatan') ? 'active' : '' }} "><a class="nav-link" href="{{ route('jabatan.index') }}"><i class="fas fa-user-tie"></i> <span>Data Jabatan</span></a></li>
      <li class=" {{ Request::is('keahlian') ? 'active' : '' }} "><a class="nav-link" href="{{ route('keahlian.index') }}"><i class="fas fa-tasks"></i> <span>Keahlian / Skill</span></a></li>
      <li class=" {{ Request::is('prodi') ? 'active' : '' }} "><a class="nav-link" href="{{ route('prodi.index') }}"><i class="fas fa-graduation-cap"></i> <span>Prodi</span></a></li>
      <li class=" {{ Request::is('category') ? 'active' : '' }} "><a class="nav-link" href="{{ route('category.index') }}"><i class="fas fa-database"></i> <span>Data Kategori</span></a></li>
      
      <li class="menu-header">Data Layanan</li>
      <li class=" {{ Request::is('skemaPendampingan') ? 'active' : '' }} "><a class="nav-link" href="{{ route('skemaPendampingan.index') }}"><i class="fas fa-book"></i> <span>Skema Pendampingan</span></a></li>
      <li class=" {{ Request::is('pelatihan') ? 'active' : '' }} "><a class="nav-link" href="{{ route('pelatihan.index') }}"><i class="fas fa-book"></i> <span>Data Pelatihan</span></a></li>
      
      <li class="menu-header">Data Pengguna</li>
      <li class=" {{ Request::is('user') ? 'active' : '' }} "><a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-users"></i> <span>User</span></a></li>
      <li class=" {{ Request::is('pegawai') ? 'active' : '' }} "><a class="nav-link" href="{{ route('pegawai.index') }}"><i class="fas fa-users"></i> <span>Pegawai</span></a></li>
      <li class=" {{ Request::is('mbkmuser') ? 'active' : '' }} "><a class="nav-link" href="{{ route('mbkmuser.index') }}"><i class="fas fa-users"></i> <span>Mahasiswa MBKM</span></a></li>
      <li class=" {{ Request::is('instruktur') ? 'active' : '' }} "><a class="nav-link" href="{{ route('instruktur.index') }}"><i class="fas fa-users"></i> <span>Instruktur</span></a></li>
      <li class=" {{ Request::is('pendampinganuser') ? 'active' : '' }} "><a class="nav-link" href="{{ route('pendampinganuser.index') }}"><i class="fas fa-users"></i> <span>Pendampingan</span></a></li>
      <li class=" {{ Request::is('pelatihanuser') ? 'active' : '' }} "><a class="nav-link" href="{{ route('pelatihanuser.index') }}"><i class="fas fa-users"></i> <span>Pelatihan</span></a></li>
    @endrole
  </ul>
</aside>
