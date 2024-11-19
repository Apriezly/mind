

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
                        <form action="" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="form-group style-input">
                                        <label>Foto Profil</label>
                                        <input type="file" id="file" class="form-control" name="image" >
                                    </div>
                                    <div class="form-group style-input">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name', Auth::user()->name) }}"  placeholder="">
                                    </div>
                                    <div class="form-group style-input">
                                        <label>Email Aktif</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email', Auth::user()->email) }}"  placeholder="">
                                    </div>
                                    <div class="form-group style-input">
                                        <label>Nomor WhatsApp Aktif</label>
                                        <input type="tel" class="form-control" name="nomor" value="{{ old('nomor', Auth::user()->nomor) }}"  placeholder="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group style-input">
                                        <label>Password Lama</label>
                                        <div class="password-wrapper">
                                            <input type="password" id="passLama" class="form-control" name="password" value="{{ old('ulangi_password', Auth::user()->ulangi_password) }}"  placeholder="">
                                            <i id="eyeIconLama" class="fa fa-eye password-icon" onclick="showPass()"></i>
                                        </div>
                                    </div>
                                    <div class="form-group style-input">
                                        <label>Password Baru</label>
                                        <div class="password-wrapper">
                                            <input type="password" id="passBaru" class="form-control" name="password_baru" value=""  placeholder="">
                                            <i id="eyeIconBaru" class="fa fa-eye password-icon" onclick="showPassbaru()"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-md button-simpan">Update</button>
                                <input type="hidden" name="curr_url" value="">
                                <a href="{{ route('profil.index') }}" class="btn btn-md button-batal">Batal</a>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
