<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Mind</title>

  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
  <link rel="stylesheet" href="{{ asset('/lte/plugins/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/lte/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/app.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/css/multi-select-tag.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/element/iconbg.png') }}">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('layouts/header')
  @include('layouts/sidebar')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        @yield('content-header')
      </div>
    </div>
    
    <div class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('/lte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('/lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('/lte/dist/js/adminlte.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/script.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chosen-js@1.8.7/chosen.jquery.min.js" integrity="sha256-c4gVE6fn+JRKMRvqjoDp+tlG4laudNYrXI1GncbfAYY=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chosen-js@1.8.7/chosen.min.css" integrity="sha256-EH/CzgoJbNED+gZgymswsIOrM9XhIbdSJ6Hwro09WE4=" crossorigin="anonymous">
@yield('script')

<script>
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
</script>
<script> 
  $(document).ready(function () {
    $('[data-widget="pushmenu"]').on('click', function () {
      const $logo = $('#logo'); 
      const $classlogo = $('#classlogo');
      const currentSrc = $logo.attr('src');

      if (currentSrc === "{{ asset('/element/mind-max.svg') }}") {
        $logo.attr('src', "{{ asset('/element/mind-min.svg') }}"); 
        $classlogo.removeClass('px-5').addClass('px-4');
      } else {
        $logo.attr('src', "{{ asset('/element/mind-max.svg') }}"); 
        $classlogo.removeClass('px-4').addClass('px-5');
      }
    });
  });
</script>

</body>
</html>

