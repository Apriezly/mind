@extends('auth/layout')

@section('content')

<div class="card-login">
    <div class="card-body login-card-body">
    <div class="login-logo">
        <img src="{{ asset('/element/mind-b.png')}}" alt="Mind Logo">
      </div>

      <p class="katamind">-- Register --</p>


      <form action="{{ route('register-proses') }}" method="post">
        @csrf
        <div class="form-group has-feedback">
          <p class="tx-login"> Nama
          <input type="text" name="name" class="form-control" placeholder="Nama user" value="{{ old('name') }}">

          @error('name')
            <small>{{ $message }}</small>
          @enderror
          </p>
        </div>

        <div class="form-group has-feedback">
          <p class="tx-login" for="email"> Email
          <input type="email" name="email" class="form-control" placeholder="example@gmail.com" value="{{ old('email') }}">

          @error('email')
            <small>{{ $message }}</small>
          @enderror
          </p>
        </div>

        <div class="form-group has-feedback">
          <p class="tx-login"> Nomor WhatsApp
          <input type="tel" name="nomor" class="form-control" placeholder="62xxxxxxxxxxx" value="{{ old('nomor') }}">

          @error('nomor')
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
          <!-- <small id="message"></small> -->
          @error('ulangi_password')
            <small>{{ $message }}</small>
          @enderror
          </p>
        </div>
      
        <div class="row">
          <div class="form-group col-12">
            <div class="form-check">
                <input type="checkbox" class="form-check-input sm-checkbox" id="invalidCheck" required>  
                <small class="form-check-label" for="invalidCheck" style="color:#FFA363">
                  I agree to the terms and conditions
                </small>
                <div class="invalid-feedback">
                  You must agree before submitting.
                </div>
            </div>
          </div>
        </div>

        <div class="row mt-4">
          <div class="col-6">
            <button type="submit" class="btn log-green btn-block btn-flat">Daftar</button>
          </div>
          <div class="col-6">
            <a href="{{ url('/')}}" class="btn log-outline btn-block btn-flat">Batal</a>
          </div>
        </div>
      </form>
@endsection

