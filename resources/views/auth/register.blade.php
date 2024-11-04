@extends('auth/layout')

@section('content')

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

@endsection

