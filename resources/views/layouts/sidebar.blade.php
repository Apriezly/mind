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
            <a href="{{ url('/beranda-p') }}" class="nav-link {{ Request::segment(1) == 'beranda-p' ? 'active-link' : 'nonactive-link'}}">
            <img src="{{ asset('/element/beranda-active.png') }}">
              <span>&emsp;Beranda</span>
            </a>
          </li>
          <li class="nav-item active">
            <a href="{{ url('/kalender') }}" class="nav-link {{ Request::segment(1) == 'kalender' ? 'active-link' : 'nonactive-link'}}">
            <img src="{{ asset('/element/kalender.png') }}" style="width:25px">
              <span>&emsp;Kalender</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/pengingat') }}" class="nav-link {{ Request::segment(1) == 'pengingat' ? 'active-link' : 'nonactive-link'}}">
            <img src="{{ asset('/element/pengingat.png') }}">
              <span>&emsp;Pengingat</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/laporan') }}" class="nav-link {{ Request::segment(1) == 'laporan' ? 'active-link' : 'nonactive-link'}}">
            <img src="{{ asset('/element/laporan.png') }}">
              <span>&emsp;Laporan</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/bantuan') }}" class="nav-link {{ Request::segment(1) == 'bantuan' ? 'active-link' : 'nonactive-link'}}">
            <img src="{{ asset('/element/bantuan.png') }}">
              <span>&emsp;Bantuan</span>
            </a>
          </li>
        </ul>
      </nav>
      <div style="position:absolute; bottom:0; left:30px; color:#d1f4f0" class="text-center">
       <p>Copyright @2024<br><strong>Mind.</strong> All Right Reserved.</p>
       <p></p>
      </div>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  <!-- sidebar footer -->
   
  </aside>
  @section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $(document).ready(function(){
     
    })
  </script>
  @endsection