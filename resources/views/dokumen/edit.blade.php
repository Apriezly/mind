@extends('layouts/main')


@section('content-header')
<div class="container">
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div>
                    <p class="mb-4 judul">Kategori - Sekolah</p>
                </div>
                <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box-shadow: 0px 4px 16px 0px #00000029 !important;">
                    <div class="card-body">
                        <div class="row">
                            <p class="mb-4 judul-form-input">Edit Data</p>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="" aoutocomplete="off">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                            <div class="col-6">
                                <div class="form-group style-input">
                                    <label>Kegiatan</label>
                                    <input type="text" class="form-control" name="name" value=""  placeholder="">
                                </div>
                                <div class="form-group style-input">
                                    <label>Deskripsi</label>
                                    <input type="text" class="form-control" style="height:118px" name="name" value=""  placeholder="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group style-input">
                                    <label>Waktu</label>
                                    <input type="datetime-local" class="form-control" name="name" value=""  placeholder="">
                                </div>
                                <div class="form-group style-input">
                                    <label>Kategori</label>
                                    <input type="text" class="form-control" name="name" value=""  placeholder="">
                                </div>
                                <div class="form-group style-input">
                                    <label>Lampiran (Opsional)</label>
                                    <input type="file" id="file" class="form-control" name="name" value=""  placeholder="">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-md button-simpan">Update</button>
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