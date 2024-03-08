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
      <li class="menu-header">Starter</li>
    
      <li class=" {{ Request::is('webconfig') ? 'active' : '' }} "><a class="nav-link" href="{{ route('webconfig') }}"><i class="far fa-square"></i> <span>Config Web</span></a></li>
      <li class="dropdown">
      <li class=" {{ Request::is('dataproduk') ? 'active' : '' }} "><a class="nav-link" href="{{ route('dataproduk') }}"><i class="far fa-square"></i> <span>Data Produk</span></a></li>
      <li class=" {{ Request::is('datapegawai') ? 'active' : '' }} "><a class="nav-link" href="{{ route('datapegawai') }}"><i class="far fa-square"></i> <span>Data Pegawai</span></a></li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
    
        </ul>
      </li>
      
      
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Google Maps</span></a>
        <ul class="dropdown-menu">
          <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
          <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
          <li><a href="gmaps-geocoding.html">Geocoding</a></li>
          <li><a href="gmaps-geolocation.html">Geolocation</a></li>
          <li><a href="gmaps-marker.html">Marker</a></li>
          <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
          <li><a href="gmaps-route.html">Route</a></li>
          <li><a href="gmaps-simple.html">Simple</a></li>
        </ul>
      </li>            <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Modules</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>
          <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
          <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
          <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
          <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
          <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
          <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
          <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
          <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
          <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
          <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
          <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
        </ul>
      </li>
      <li class="menu-header">Pages</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
        <ul class="dropdown-menu">
          <li><a href="auth-forgot-password.html">Forgot Password</a></li> 
          <li><a href="auth-login.html">Login</a></li> 
          <li><a href="auth-register.html">Register</a></li> 
          <li><a href="auth-reset-password.html">Reset Password</a></li> 
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>Errors</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="errors-503.html">503</a></li> 
          <li><a class="nav-link" href="errors-403.html">403</a></li> 
          <li><a class="nav-link" href="errors-404.html">404</a></li> 
          <li><a class="nav-link" href="errors-500.html">500</a></li> 
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="features-activities.html">Activities</a></li>
          <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
          <li><a class="nav-link" href="features-posts.html">Posts</a></li>
          <li><a class="nav-link" href="features-profile.html">Profile</a></li>
          <li><a class="nav-link" href="features-settings.html">Settings</a></li>
          <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
          <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
        <ul class="dropdown-menu">
          <li><a href="utilities-contact.html">Contact</a></li>
          <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
          <li><a href="utilities-subscribe.html">Subscribe</a></li>
        </ul>
      </li>            <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
    </ul>

       </aside>