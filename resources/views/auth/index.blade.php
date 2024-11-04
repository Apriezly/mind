@extends('auth/layout')

@section('content')

<div class="card">
    <div class="login-logo mt-3">
        <a href="{{ url('/') }}"><b>Mind</b></a>
    </div>

    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('login') }}" method="post">
        @csrf
          <div class="row-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
            <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>

@endsection