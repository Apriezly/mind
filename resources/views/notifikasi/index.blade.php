@extends('layouts/main')

@section('content')
    <div class="container">
        <div class="container-fluid mb-5">
            <div class="row">
                <div class="col-12">
                    <div>
                        <p class="mb-4 judul">Pengingat - Atur Pengingat</p>
                    </div>
                  <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box-shadow: 0px 4px 16px 0px #00000029 !important;">
                    <div class="card-body">
                        <div class="col-12">
                            <div class="row align-items-center mb-5">
                                <span class="mr-3">
                                    <a href="" class="btn dipilih">Semua</a>
                                </span>
                                <span class="mr-3">
                                    <a href="" class="btn tidak-dipilih">Sudah dibaca</a>
                                </span>
                                <span class="mr-3">
                                    <a href="" class="btn tidak-dipilih">Belum dibaca</a>
                                </span>
                            </div>
                            <a class="row align-items-center mb-4" href="{{ url('lihatnotifikasi')}}">
                                <div class="col-1 text-center">
                                    <span>
                                    <img src="{{ asset('/element/user-mind.svg')}}" alt=""></br>
                                    </span>
                                    <span class="belum-dibaca"style="font-size:10px !important; color:#404040 !important;">14 Nov</span>
                                </div>
                                <div class="col ml-2">
                                    <span class="belum-dibaca" style="font-size:18px !important; color:#404040 !important;">Mind</span></br>
                                    <span class="belum-dibaca" style="font-size:14px !important; color:#404040 !important;">Email Terkirim</span></br>
                                    <span style="font-size:14px !important; font-weight: 400 !important; color:#404040 !important;">Hii, user! Peringatan “Ujian Mapel Produktif” berhasil terkirim ke alamat email user@gmail.com. Periksa email untuk informasi selengkapnya.</span></br>
                                </div>
                            </a>
                            <a class="row align-items-center mb-4" href="{{ url('lihatnotifikasi')}}">
                                <div class="col-1 text-center">
                                    <span>
                                    <img src="{{ asset('/element/user-mind.svg')}}" alt=""></br>
                                    </span>
                                    <span class="sudah-dibaca"style="font-size:10px !important; color:#404040 !important;">14 Nov</span>
                                </div>
                                <div class="col ml-2">
                                    <span class="sudah-dibaca" style="font-size:18px !important; color:#404040 !important;">Mind</span></br>
                                    <span class="sudah-dibaca" style="font-size:14px !important; color:#404040 !important;">Email Terkirim</span></br>
                                    <span style="font-size:14px !important; font-weight: 400 !important; color:#404040 !important;">Hii, user! Peringatan “Ujian Mapel Produktif” berhasil terkirim ke alamat email user@gmail.com. Periksa email untuk informasi selengkapnya.</span></br>
                                </div>
                            </a>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>                                                     
@endsection
                                   
                                                        
                                                        




                                   