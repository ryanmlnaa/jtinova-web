<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="#">JTINOVA</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">NOVA</a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class=" {{ Request::is('dashboard') ? 'active' : '' }}  "><a class="nav-link"
            href="{{ route('dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

    @role(['admin', 'pegawai'])
      <li class="menu-header">Data Master</li>
      <li class=" {{ Request::is('webconfig') ? 'active' : '' }} "><a class="nav-link"
              href="{{ route('webconfig') }}"><i class="fas fa-cog"></i> <span>Config Web</span></a></li>
      <li class=" {{ Request::is('datakeahlian') ? 'active' : '' }} "><a class="nav-link"
              href="{{ route('keahlian.index') }}"><i class="fas fa-tasks"></i> <span>Data Keahlian</span></a></li>
          <li class=" {{ Request::is('prodi') ? 'active' : '' }} "><a class="nav-link"
          href="{{ route('prodi.index') }}"><i class="fas fa-graduation-cap"></i> <span>Data Prodi</span></a></li>
      <li class=" {{ Request::is('databenefit') ? 'active' : '' }} "><a class="nav-link"
              href="{{ route('Benefit.index') }}"><i class="far fa-square"></i> <span>Data Benefit</span></a></li>
      <li class=" {{ Request::is('datauser') ? 'active' : '' }} "><a class="nav-link"
              href="{{ route('User.index') }}"><i class="far fa-square"></i> <span>Data User</span></a></li>
      <li class=" {{ Request::is('datajabatan') ? 'active' : '' }} "><a class="nav-link"
              href="{{ route('Jabatan.index') }}"><i class="far fa-square"></i> <span>Data Jabatan</span></a></li>
      <li class=" {{ Request::is('datapeserta') ? 'active' : '' }} "><a class="nav-link"
              href="{{ route('Peserta.index') }}"><i class="far fa-square"></i> <span>Data Peserta</span></a></li>
      <li class=" {{ Request::is('datainstruktur') ? 'active' : '' }} "><a class="nav-link"
              href="{{ route('Instruktur.index') }}"><i class="far fa-square"></i> <span>Data Instruktur</span></a>
      </li>

      <li class="menu-header">Data CRUD</li>
      <li class=" {{ Request::is('dataproduk') ? 'active' : '' }} "><a class="nav-link"
              href="{{ route('dataproduk') }}"><i class="far fa-square"></i> <span>Data Produk</span></a></li>
      <li class=" {{ Request::is('datapegawai') ? 'active' : '' }} "><a class="nav-link"
              href="{{ route('datapegawai') }}"><i class="far fa-square"></i> <span>Data Pegawai</span></a></li>
      <li class=" {{ Request::is('datapelatihan') ? 'active' : '' }} "><a class="nav-link"
              href="{{ route('pelatihan.index') }}"><i class="far fa-square"></i> <span>Data Pelatihan</span></a>
      </li>
      <li class=" {{ Request::is('mbkmuser') ? 'active' : '' }} "><a class="nav-link"
              href="{{ route('mbkmuser.index') }}"><i class="fas fa-users"></i> <span>Data Mahasiswa MBKM</span></a></li>
      <li class=" {{ Request::is('dataportofolio') ? 'active' : '' }} "><a class="nav-link"
              href="{{ route('Portofolio.index') }}"><i class="far fa-square"></i> <span>Data Proyek</span></a></li>
      <li class=" {{ Request::is('datapembayaran') ? 'active' : '' }} "><a class="nav-link"
              href="{{ route('Pembayaran.index') }}"><i class="far fa-square"></i> <span>Data Pembayaran</span></a>
      </li>
    @endrole
  </ul>
</aside>
