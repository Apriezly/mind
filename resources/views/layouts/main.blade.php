<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Mind</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="{{ asset('/lte/plugins/fullcalendar/fullcalendar.min.css')}}">
  <link rel="stylesheet" href="{{ asset('/lte/plugins/fullcalendar/fullcalendar.print.css')}}" media="print">
  <!-- Data tabel -->
  <link rel="stylesheet" href="{{ asset('/dataTable/datatables.min.css') }}">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('/lte/plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/lte/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/app.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Pesan yg di login -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


  <!-- icon site -->
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/element/iconbg.png') }}">

</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('layouts/header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        @yield('content-header')
      </div>
    </div>
    

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        @yield('content')
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('/lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="{{ asset('/lte/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('/lte/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/lte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/lte/dist/js/demo.js')}}"></script>
<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('/lte/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
<!-- script buatan sendiri -->
<script src="{{ asset('/script.js') }}"></script>
<script src="{{ asset('/lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- yg ada di login -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- @yield('script') -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
</script>


</body>
</html>

