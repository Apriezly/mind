<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link">Hallo, selamat pagi!</a>
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
        <img src="{{ asset('/element/user.png') }}">
        <span>&ensp;user</span>
        </a>

        <div class="mr-3 dropdown-menu dropdown-menu-right shadow animated --grow-in" aria-labelledby="userDropdown"> 
          <a class="dropdown-item" href="{{ url('/profil') }}">
          <img src="{{ asset('/element/setting.png') }}">
            <span>&ensp;Pengaturan Profil</span>
          </a>
        <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ url('/logout') }}"> 
          <img src="{{ asset('/element/keluar.png') }}">
            <span>&ensp;Keluar</span>
          </a>
        </div>
      </li>
    </ul>
  </nav>