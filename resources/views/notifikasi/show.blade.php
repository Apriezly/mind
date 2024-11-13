@extends('layouts/main')

@section('content')
    <div class="container">
        <div class="container-fluid mb-5">
            <div class="row">
                <div class="col-12">
                  <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box-shadow: 0px 4px 16px 0px #00000029 !important;">
                    <div class="card-body">
                        <div class="col-12">
                            <div class="row mx-5 align-items-center">
                                <div class="col-6">
                                    <div class="form-inline float-left">
                                        <img src="{{ asset('/element/user-mind.svg')}}" alt="">
                                        <div class="ml-3">
                                            <span style="font-size:24px !important; font-weight: 500 !important; color:#404040 !important;">Mind</span></br>
                                            <span style="font-size:18px !important; font-weight: 400 !important; color:#404040 !important;">Email Terkirim</span></br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-inline float-right">
                                        <span style="font-size:18px !important; font-weight: 400 !important; color:#404040 !important;">18:00</span>
                                    </div>
                                </div>
                            </div>
                            <hr class="solid mx-5">
                            <div class="col-8 mx-auto">
                                <div class="card-show">
                                    <p style="font-size: 14px; font-weight: 400;">
                                        <span class="mb-3" style="font-weight: 600 !important;">Hii, user!</span><br>
                                        Peringatan “Ujian Mapel Produktif” berhasil terkirim ke alamat email user@gmail.com. Periksa email untuk informasi selengkapnya.
                                    </p>
                                    <div class="row mt-3">
                                        <button type="submit" class="btn button-lihat btn-block btn-flat">Lihat Email</button>
                                    </div>
                                </div>       
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>                                                     
@endsection

                                   
                                                        
                                                        




                                   
