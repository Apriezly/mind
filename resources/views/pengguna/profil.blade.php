

@extends('layouts/main')

@section('content')
<div class="container">
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div>
                    <p class="mb-4 judul">Pengaturan Profil</p>
                </div>
                <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box-shadow: 0px 4px 16px 0px #00000029 !important;">
                    <div class="card-body">
                        <form action="{{ route('profil.update', Auth::user()) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        

                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="form-group style-input">
                                        <label>Foto Profil</label>
                                        <input type="file" id="file" class="form-control @error('image') is-invalid @enderror" name="image" >
                                        @error('image')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group style-input">
                                        <label>Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', Auth::user()->name) }}"  placeholder="">
                                        @error('name')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group style-input">
                                        <label>Email Aktif</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', Auth::user()->email) }}"  placeholder="">
                                        @error('email')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group style-input">
                                        <label>Nomor WhatsApp Aktif</label>
                                        <input type="tel" class="form-control @error('nomor') is-invalid @enderror" name="nomor" value="{{ old('nomor', Auth::user()->nomor) }}"  placeholder="">
                                        @error('nomor')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group style-input">
                                        <label>Sandi Lama</label>
                                        <div class="password-wrapper">
                                            <input type="password" id="passLama" class="form-control @error('password_lama') is-invalid @enderror" name="password_lama" value=""  placeholder="">
                                            <i id="eyeIconLama" class="fa fa-eye password-icon" onclick="showPass()"></i>
                                            @error('password_lama')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group style-input">
                                        <label>Sandi Baru</label>
                                        <div class="password-wrapper">
                                            <input type="password" id="passBaru" class="form-control @error('password_baru') is-invalid @enderror" name="password_baru" value=""  placeholder="">
                                            <i id="eyeIconBaru" class="fa fa-eye password-icon" onclick="showPassbaru()"></i>
                                            @error('password_baru')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-md button-simpan">Update</button>
                                <a href="{{ url('/beranda') }}" class="btn btn-md button-batal">Batal</a>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
