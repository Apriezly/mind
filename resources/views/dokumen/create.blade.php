@extends('layouts/main')


@section('content-header')
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-md-12">
            <div>
            <h1 class="h3 mb-4 text-gray-800">Tambah Data</h1>
        </div>
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="" aoutocomplete="off">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Kegiatan</label>
                                <input type="text" class="form-control " name="name" value="Perumahan Pulo Asri Sejahtera " placeholder="Masukkan Nama Perumahan">

                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Waktu</label>
                                        <select id="kota" class="form-control " name="kota">
                                        </select>
                                    </div>
                                </div>


@endsection
