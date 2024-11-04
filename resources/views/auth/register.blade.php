<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mind</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/lte/plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/lte/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/app.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('/lte/plugins/iCheck/square/blue.css') }}">
  <!-- icon site -->
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/element/iconbg.png') }}">
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="login-logo mt-3">
        <a href="{{ url('/register') }}"><b>Mind</b></a>
    </div>

    <div class="card-body login-card-body">
      <p class="login-box-msg">Register</p>

      <form action="{{ route('register-proses') }}" method="post">
        @csrf
        <div class="form-group has-feedback">
          <input type="text" name="name" class="form-control" placeholder="Nama" value="{{ old('name') }}">
        </div>
        @error('name')
            <small>{{ $message }}</small>
        @enderror

        <div class="form-group has-feedback">
          <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
        </div>
        @error('email')
            <small>{{ $message }}</small>
        @enderror

        <!-- <div class="form-group has-feedback">
          <input type="text" name="nomor" class="form-control" placeholder="Nomor Whatsapp" value="{{ old('nomor') }}">
        </div>
        @error('nomor')
            <small>{{ $message }}</small>
        @enderror -->

        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        @error('password')
            <small>{{ $message }}</small>
        @enderror

          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign Up</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('/lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/lte/dist/js/adminlte.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('/lte/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
<!-- sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if($message = Session::get('success'))
        <script>
            Swal.fire('{{ $message}}');
        </script>
    @endif

    @if($message = Session::get('failed'))
        <script>
            Swal.fire('{{ $message}}');
        </script>
    @endif
</body>
</html>
