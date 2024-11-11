@extends('layouts/main')


@section('content-header')
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-md-12">
            <div>
            <h1 class="h3 mb-4 text-gray-800">Edit Data</h1>
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
                                <label class="font-weight-bold">Deskripsi</label>
                                    <input type="text" class="form-control" style="height:118px" name="name" value=""  placeholder="">
                                </div>
                            </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Waktu</label>
                                    <input type="text" class="form-control " name="name" value=""  placeholder="">
                                </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Kategori</label>
                                    <input type="text" class="form-control " name="name" value=""  placeholder="">
                                </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Lampiran(Opsional)</label>
                                    <input type="file" id="file" class="form-control " name="name" value=""  placeholder="">
                                </div>
                            </div>

                        <div class="col-sm-12">
                                <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                                    <input type="hidden" name="curr_url" value="https://jombangwifi.id/perumahan">
                                        <a href="https://jombangwifi.id/perumahan" class="btn btn-md btn-secondary">Batal</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div
                            
@endsection