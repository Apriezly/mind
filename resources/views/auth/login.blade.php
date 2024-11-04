@extends('auth/layout')

@section('content')

<div class="card">
    <div class="login-logo mt-3">
        <a href="{{ url('/login') }}"><b>Mind</b></a>
    </div>

    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('login-proses') }}" method="post">
        @csrf
        <div class="form-group has-feedback">
          <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
        @error('email')
            <small>{{ $message }}</small>
        @enderror

        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        @error('password')
            <small>{{ $message }}</small>
        @enderror

        <div class="row">
          <div class="col-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>

@endsection