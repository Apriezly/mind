@extends('auth/layout')

@section('content')

<div class="card-login"><div class="card-body login-card-body">
      <div class="login-logo">
        <img src="{{ asset('/element/mind-b.png')}}" alt="Mind Logo">
      </div>

      <p class="katamind">-- Login --</p>


      <form action="{{ route('login-proses') }}" method="post">
        @csrf
        <div class="form-group has-feedback">
          <p class="tx-login"> Email
          <input type="email" name="email" class="form-control" placeholder="Email">

          @error('email')
            <small>{{ $message }}</small>
          @enderror
          </p>
        </div>

        <div class="form-group has-feedback">
          <p class="tx-login"> Password
          <input type="password" name="password" class="form-control" placeholder="Password">

          @error('password')
            <small>{{ $message }}</small>
          @enderror
          </p>
        </div>
        
        <div class="row">
          <!-- <div class="col-6">
            <div class="checkbox">
              <small style="color:#FFA363">
                <input type="checkbox" class="sm-checkbox">   Ingat sandi
              </small>
            </div>
          </div> -->
          <div class="col-6">
            <small class="mb-1">
              <a style="color:#FFA363" href="#" onclick="return confirm('Sandi =  Auth::user()->ulangi_password');"><u>Lupa kata sandi?</u></a>
            </small>
          </div>
        </div>
        
        
        
        <div class="row mt-4">
          <div class="col-6">
            <button type="submit" class="btn log-green btn-block btn-flat">Masuk</button>
          </div>
          <div class="col-6">
            <a href="{{ url('/')}}" class="btn log-outline btn-block btn-flat">Batal</a>
          </div>
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>

@endsection