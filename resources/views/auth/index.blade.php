@extends('auth/layout')

@section('content')

<div class="card-login">
    <div class="card-body login-card-body">
      <div class="login-logo">
        <img src="{{ asset('/element/mind-b.svg')}}" alt="Mind Logo">
      </div>

      <p class="katamind"><span style="color:#19A177;font-weight:700">Mind</span> hadir sebagai sahabat yang akan senantiasa mengingatkan hal-hal penting dalam hidupmu!</p>

      <div class="login-maskot">
        <img src="{{ asset('/element/maskot.png')}}" alt="Mind Maskot">
      </div>

      <form action="" method="post">
        @csrf
        <div class="row">
          <div class="col-6">
            <a href="{{ url('login')}}" class="btn log-green btn-block btn-flat">Masuk</a>
          </div>
          <div class="col-6">
            <a href="{{ url('register')}}" class="btn log-outline btn-block btn-flat">Buat Akun</a>
          </div>
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>

@endsection