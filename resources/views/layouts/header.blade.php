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
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <!-- <span class="mr-2 d-none d-lg-block text-black small">Administratore></span>
          <br> --> 
        <img class="mr-2 img-profile rounded-circle" scr="https://jombangwifi.id/img/undraw profile.svg"> 
      <div> ==$0
        <span class="d-none d-lg-block small">
        </span>
        <span class="d-none d-lg-block small">Admin</span>
      </div>
      </a>
      <div class="dropdown-menu dropdown-menu-right shadow animated 
      --grow-in" aria-labelledby="userDropdown"> 
      <a class="dropdown-item" href="user/profile">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        "profile"
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"> 
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        "logout"
      </a>
      </div>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">user</a>
       </li>
    </ul>
  </nav>