@extends('auth/layout')

@section('content')

<div class="card-login">
    <div class="card-body login-card-body">
    <div class="login-logo">
        <img src="{{ asset('/element/mind-b.png')}}" alt="Mind Logo">
      </div>

      <p class="katamind">-- Reset Password --</p>


      <form action="{{ route('password.update') }}" method="post">
        @csrf

        <div class="form-group has-feedback" type="hidden">
          <input type="hidden" name="token" class="form-control" value="{{request()->token}}">
        </div>

        <div class="form-group has-feedback">
          <p class="tx-login" for="email"> Email
          <input type="email" name="email" class="form-control" placeholder="example@gmail.com" value="{{request()->email}}">

          @error('email')
            <small>{{ $message }}</small>
          @enderror
          </p>
        </div>


        <div class="form-group has-feedback">
          <p class="tx-login" for="password"> Sandi
          <input type="password" name="password" class="form-control" placeholder="Kata sandi minimal 6 karakter">

          @error('password')
            <small>{{ $message }}</small>
          @enderror
          </p>
        </div>

        <div class="form-group has-feedback">
          <p class="tx-login"> Ulangi Sandi
          <input type="password" name="ulangi_password" class="form-control" placeholder="Masukkan kata sandi yang sama">
          @error('ulangi_password')
            <small>{{ $message }}</small>
          @enderror
          </p>
        </div>
      
        <div class="row mt-4">
          <div class="col-6">
            <button type="submit" class="btn log-green btn-block btn-flat">Reset Password</button>
          </div>
          <div class="col-6">
            <a href="{{ url('/login')}}" class="btn log-outline btn-block btn-flat">Batal</a>
          </div>
        </div>
      </form>
@endsection

