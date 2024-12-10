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
          <div class="col-6">
            <small class="mb-1">
              <a style="color:#FFA363" href="{{ url('/lupa-sandi')}}"><u>Lupa kata sandi?</u></a>
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

<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <span style="font-size:12px; font-weight:400; color:#000000;">Sandi : </span>
      </div>
    </div>
  </div>
</div> -->

@endsection