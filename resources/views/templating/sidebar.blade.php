<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class=" {{ Request::is('dashboard') ? 'active' : '' }}  "><a class="nav-link" href="{{ route('dashboard') }}"><i class="far fa-square"></i> <span>Dashboard</span></a></li>
      
      <li class="menu-header">Data Master</li>
      <li class=" {{ Request::is('webconfig') ? 'active' : '' }} "><a class="nav-link" href="{{ route('webconfig') }}"><i class="far fa-square"></i> <span>Config Web</span></a></li>
      <li class=" {{ Request::is('datakeahlian') ? 'active' : '' }} "><a class="nav-link" href="{{ route('Keahlian.index') }}"><i class="far fa-square"></i> <span>Data Keahlian</span></a></li>
      <li class=" {{ Request::is('databenefit') ? 'active' : '' }} "><a class="nav-link" href="{{ route('Benefit.index') }}"><i class="far fa-square"></i> <span>Data Benefit</span></a></li>
      <li class=" {{ Request::is('datauser') ? 'active' : '' }} "><a class="nav-link" href="{{ route('User.index') }}"><i class="far fa-square"></i> <span>Data User</span></a></li>
      <li class=" {{ Request::is('datajabatan') ? 'active' : '' }} "><a class="nav-link" href="{{ route('Jabatan.index') }}"><i class="far fa-square"></i> <span>Data Jabatan</span></a></li>
      
      <li class="menu-header">Data CRUD</li>      
      <li class=" {{ Request::is('dataproduk') ? 'active' : '' }} "><a class="nav-link" href="{{ route('dataproduk') }}"><i class="far fa-square"></i> <span>Data Produk</span></a></li>
      <li class=" {{ Request::is('datapegawai') ? 'active' : '' }} "><a class="nav-link" href="{{ route('datapegawai') }}"><i class="far fa-square"></i> <span>Data Pegawai</span></a></li>
      <li class=" {{ Request::is('datapelatihan') ? 'active' : '' }} "><a class="nav-link" href="{{ route('Pelatihan.index') }}"><i class="far fa-square"></i> <span>Data Pelatihan</span></a></li>
      <li class=" {{ Request::is('datarecruitment') ? 'active' : '' }} "><a class="nav-link" href="{{ route('Recruitment.index') }}"><i class="far fa-square"></i> <span>Data Recruitment MBKM</span></a></li>
      <li class=" {{ Request::is('dataportofolio') ? 'active' : '' }} "><a class="nav-link" href="{{ route('Portofolio.index') }}"><i class="far fa-square"></i> <span>Data Proyek  </span></a></li>
      {{-- <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
    
        </ul>
      </li> --}}
      
      
     
    </ul>

       </aside>