<aside class="main-sidebar sidebar-white-primary">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('/element/iconsite.png') }}" alt="AdminLTE Logo">
      <span class="brand-text font-weight-light">Mind</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url('/beranda-p') }}" class="nav-link active">
              <i class="fa fa-dashboard"></i>
              <p>Beranda</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/kalender') }}" class="nav-link">
            <i class="fa fa-calendar-o"></i>
              <p>Kalender</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/pengingat') }}" class="nav-link">
              <i class="fa fa-clock-o"></i>
              <p>Pengingat</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/laporan') }}" class="nav-link">
              <i class="fa fa-file-o"></i>
              <p>Laporan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/bantuan') }}" class="nav-link">
              <i class="fa fa-question-circle"></i>
              <p>Bantuan</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

  </aside>