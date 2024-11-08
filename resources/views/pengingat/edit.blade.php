@extends('layouts/main')


@section('content-header')
<div class="container-fluid mb-5">
            <div class="row">
                <div class="col-12">
                    <div>
                        <p class="mb-4 judul-utama">Pengingat -- Atur Pengingat</p>
                    </div>

                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="" aoutocomplete="off">
                                <input type="hidden" name="_method" value="PUT">

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Kegiatan</label>
                            <input type="text" class="form-control " name="name" value=""  placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Kegiatan</label>
                            <input type="text" class="form-control" style="height:150px" name="name" value=""  placeholder="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Kegiatan</label>
                            <input type="text" class="form-control " name="name" value=""  placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Kegiatan</label>
                            <input type="text" class="form-control " name="name" value=""  placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Kegiatan</label>
                            <input type="text" class="form-control " name="name" value=""  placeholder="">
                        </div>
                    </div>
                </div>
                   
                <!-- <div class="col-6">
                    <div class="row">
                    <div class="col-sm-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Kegiatan</label>
                                <input type="text" class="form-control " name="name" value=""  placeholder="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                <label class="font-weight-bold">Waktu</label>
                                <input type="text" class="form-control " name="name" value=""  placeholder="">
                            </div>
                        </div>
                    </div>
                </div>

          
                        <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Set</label>
                                <input type="text" class="form-control " name="name" value=""  placeholder="">
                            </div>
                        </div> 
                        
            </div> 
          </div>
        </div>
                        
                       
                        
                        
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Ulangi Setiap</label>
                                <input type="text" class="form-control " name="name" value=""  placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Selesai</label>
                                <input type="text" class="form-control " name="name" value=""  placeholder="">
                            </div>
                        </div>
                        
                            <legend class="col-form-label col-sm-2 pt-0">Kirim-via</legend>
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
                                    </fieldset> -->

                        <div class="col-sm-12">
                            
                            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                            <input type="hidden" name="curr_url" value="">
                            <a href="" class="btn btn-md btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div
                            


@endsection