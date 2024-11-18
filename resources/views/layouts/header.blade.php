<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" data-auto-collapse-size="768" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link">Selamat pagi, {{Auth::user()->name}}!</a>
      </li>
    </ul>

   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/notifikasi') }}">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-warning navbar-badge">12</span>
        </a>
      </li>

      
      <li class="nav-item dropdown no-arrow"> 
        <a class="nav-link mr-5" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="" class="">
        <span>&ensp;{{Auth::user()->name}}</span>
        </a>

        <div class="mr-3 dropdown-menu dropdown-menu-right shadow animated --grow-in" aria-labelledby="userDropdown"> 
          <a class="dropdown-item" href="{{ route('profil.index') }}">
          <img src="{{ asset('/element/setting.svg') }}">
            <span>&ensp;Pengaturan Profil</span>
          </a>
        <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ url('/logout') }}"> 
          <img src="{{ asset('/element/keluar.svg') }}">
            <span>&ensp;Keluar</span>
          </a>
        </div>
      </li>
    </ul>
  </nav>