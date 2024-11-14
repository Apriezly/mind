@extends('layouts/main')


@section('content')
<div class="container">
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div>
                    <p class="mb-4 judul">Kategori -- Sekolah</p>
                </div>
                <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box-shadow: 0px 4px 16px 0px #00000029 !important;">
                    <div class="card-body">
                        <div>
                            <p class="mb-4 judul-form-input">Lihat Data</p>
                        </div>
                        <div class="col-8 mx-auto">
                            <div class="card-show">
                                <div class="row">
                                
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <span class="judul-show">{{$dokumen->kegiatan}}</span></br>
                                            <span class="isi-show">{{$dokumen->deskripsi}}</span>
                                        </div>
                                        <div class="mb-3">
                                            <span class="judul-show">Waktu:</span></br>
                                            <span class="isi-show">{{$dokumen->expiration_date}}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <span class="judul-show">Kategori:</span></br>
                                            <span class="isi-show">{{$dokumen->kategori_id}}</span>
                                        </div>
                                        <div  class="mb-3">
                                            <span class="judul-show">Lampiran:</span></br>
                                            <span class="isi-show">{{$dokumen->image}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <button type="submit" class="btn button-lihat btn-block btn-flat">Download</button>
                                </div>
                            </div>       
                        </div>
                        
                </div>

            </div>
        </div>
    </div>
</div>

@endsection