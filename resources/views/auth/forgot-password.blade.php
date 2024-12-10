@extends('auth/layout')

@section('content')

<div class="card-login"><div class="card-body login-card-body">
    
      <p style="text-align: left; font-size: 12px; font-weight: 400 !important; color:#404040;">Lupa kata sandi? Tenang, kamu hanya perlu memasukkan email saja dan <span style="color:#19A177;font-weight:700">Mind</span> akan mengirimkan link reset password untuk membuat password barumu.</p>

      <form action="{{ route('kirim_email') }}" method="post">
        @csrf

        <div class="form-group has-feedback">
          <p class="tx-login"> Email
          <input type="email" name="email" class="form-control" placeholder="Email">

          @error('email')
            <small>{{ $message }}</small>
          @enderror

          @if(session()->has('status'))
            <small class="berhasil">
              {{ session()->get('status')}}
            </small>
          @endif
          </p>

        </div>

        <div class="row mt-4">
          <div class="col-6">
            <button type="submit" class="btn log-green btn-block btn-flat">Kirim Email</button>
          </div>
          <div class="col-6">
            <a href="{{ url('/login')}}" class="btn log-outline btn-block btn-flat">Batal</a>
          </div>
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>


@endsection