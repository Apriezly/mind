@extends('layouts/main')


@section('content')
<div class="container">
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div>
                    <p class="mb-4 judul">Pengingat -- Atur Pengingat</p>
                </div>
                <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box-shadow: 0px 4px 16px 0px #00000029 !important;">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="" aoutocomplete="off">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                    <div class="col-6">
                        <div class="form-group style-input">
                            <label>Kegiatan</label>
                            <input type="text" class="form-control " name="name" value=""  placeholder="">
                        </div>
                        <div class="form-group style-input">
                            <label>Status</label>
                            <input type="text" class="form-control"  name="name" value=""  placeholder="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group style-input">
                            <label>Waktu</label>
                            <input type="text" class="form-control " name="name" value=""  placeholder="">
                        </div>
                        <div class="form-group style-input">
                            <label>Set</label>
                            <input type="text" class="form-control " name="name" value=""  placeholder="">
                        </div>
                        <div class="form-group style-input">
                            <label>Ulangi Setiap</label>
                            <input type="text" class="form-control " name="name" value=""  placeholder="">
                        </div>
                        <div class="form-group style-input">
                            <label>Selesai</label>
                            <input type="text" class="form-control " name="name" value=""  placeholder="">
                        </div>
                        <div class="form group style-input">
                        <label>Kirim Via</label>
                        <legend class="col-form-label col-sm-2 pt-0">
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                    Email
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                        <label class="form-check-label" for="gridRadios2">
                                                Whatsapp
                                        </label>
                                </div>
                            </div>
                        </legend>
                        </div>
                        
                    </div>

                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-md button-simpan">Simpan</button>
                                <input type="hidden" name="curr_url" value="">
                                <a href="{{url('/data-sekolah')}}" class="btn btn-md button-batal">Batal</a>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection