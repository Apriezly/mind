<aside class="main-sidebar elevation-4 background-sidebar">
    <!-- Brand Logo -->
    <nav class="pt-5">
    <a id="classlogo" class="px-5">
      <img src="{{ asset('/element/mind-max.svg') }}" id="logo" alt="Mind">
    </a>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="pt-5">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url('/beranda') }}" class="nav-link {{ in_array(Request::segment(1), ['beranda', 'data', 'kategori']) ? 'active-link' : 'nonactive-link'}}">
            <img src="{{ in_array(Request::segment(1), ['beranda', 'data', 'kategori'])? asset('/element/beranda-active.svg') : asset('/element/beranda.svg')}}">
              <span>&emsp;Beranda</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/kalender') }}" class="nav-link {{ Request::segment(1) == 'kalender' ? 'active-link' : 'nonactive-link'}}">
            <img src="{{ Request::segment(1) == 'kalender'? asset('/element/kalender-active.svg') : asset('/element/kalender.svg')}}">
              <span>&emsp;Kalender</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/pengingat') }}" class="nav-link {{ in_array(Request::segment(1), ['pengingat', 'editpengingat']) ? 'active-link' : 'nonactive-link'}}">
            <img src="{{ in_array(Request::segment(1), ['pengingat', 'editpengingat'])? asset('/element/pengingat-active.svg') : asset('/element/pengingat.svg')}}">
              <span>&emsp;Pengingat</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/laporan') }}" class="nav-link {{ Request::segment(1) == 'laporan' ? 'active-link' : 'nonactive-link'}}">
            <img src="{{ Request::segment(1) == 'laporan'? asset('/element/laporan-active.svg') : asset('/element/laporan.svg')}}">
              <span>&emsp;Laporan</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://bit.ly/adminMind" class="nav-link {{ Request::segment(1) == 'bantuan' ? 'active-link' : 'nonactive-link'}}">
            <img src="{{ Request::segment(1) == 'bantuan'? asset('/element/bantuan-active.svg') : asset('/element/bantuan.svg')}}">
              <span>&emsp;Bantuan</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  <!-- sidebar footer -->
   
  </aside>
  @section('script')
  
  
  @endsection

 