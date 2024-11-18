

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
                        <form action="{{ route('profil.update', $user->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                            <div class="row">
                            <div class="col-6">
                            <div class="form-group style-input">
                                <label>Foto Profil</label>
                                <input type="file" id="file" class="form-control" name="image" >
                            </div>
                                <div class="form-group style-input">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="name" value=""  placeholder="">
                                </div>
                                <div class="form-group style-input">
                                    <label>Email Aktif</label>
                                    <input type="email" class="form-control" name="email" value=""  placeholder="">
                                </div>
                                <div class="form-group style-input">
                                    <label>Nomor WhatsApp Aktif</label>
                                    <input type="tel" class="form-control" name="nomor" value=""  placeholder="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group style-input">
                                    <label>Password Lama</label>
                                    <input type="password" class="form-control" name="password" value=""  placeholder="">
                                </div>
                                <div class="form-group style-input">
                                    <label>Password Baru</label>
                                    <input type="password" class="form-control" name="ulangi_password" value=""  placeholder="">
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
