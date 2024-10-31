<aside class="main-sidebar elevation-2" style="background:#19A177; border-radius: 0px 32px 32px 0px;">
    <!-- Brand Logo -->
    <nav class="pt-5">
    <a class="px-5">
      <img src="{{ asset('/element/mind-max.png') }}" alt="Mind">
    </a>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="pt-5">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url('/beranda-p') }}" class="nav-link" style="background:#D1F4F0; border16px;">
            <img src="{{ asset('/element/beranda-active.png') }}">
              <span style="color:#02432f">&emsp;Beranda</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/kalender') }}" class="nav-link">
            <img src="{{ asset('/element/kalender.png') }}" style="width:25px">
            <span style="color:#D1F4F0">&emsp;Kalender</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/pengingat') }}" class="nav-link">
            <img src="{{ asset('/element/pengingat.png') }}" style="width:25px">
            <span style="color:#D1F4F0">&emsp;Pengingat</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/laporan') }}" class="nav-link">
            <img src="{{ asset('/element/laporan.png') }}">
            <span style="color:#D1F4F0">&emsp;Laporan</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/bantuan') }}" class="nav-link">
            <img src="{{ asset('/element/bantuan.png') }}">
            <span style="color:#D1F4F0">&emsp;Bantuan</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  <!-- sidebar footer -->
   <div class="sidebar-footer">
    <p>bismillah</p>
   </div>
  </aside>