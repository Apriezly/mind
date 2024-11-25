@extends('layouts/main')


@section('content')
<div class="container">
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div>
                    <p class="mb-4 judul" href="{{ route('data.index')}}">Kategori -- Sekolah</p>
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
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <span class="judul-show">Waktu:</span></br>
                                            <span class="isi-show">{{$dokumen->expiration_date}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <span class="judul-show">Kategori:</span></br>
                                            <span class="isi-show">{{ ($dokumen->kategori != null) ? $dokumen->kategori->judul : '' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div  class="mb-3">
                                            <span class="judul-show">Lampiran:</span></br>
                                            <span data-toggle="modal" data-target="#exampleModalCenter" class="isi-image-show image-show"><u>{{$dokumen->imageasli}}</u></span>
                                        </div>

                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">{{$dokumen->imageasli}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset('/storage/dokumen/'.$dokumen->image) }}" class="w-100 rounded">
                                                </div>
                                                </div>
                                            </div>
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