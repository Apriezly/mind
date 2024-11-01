@extends('layouts/main')


@section('content-header')
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Kategori</h3>
            </div>
        </div><!-- /.row -->
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-sm-3 my-2">
                <div class="card shadow h-100 py-2" style="background:#ffa363">
                    <div class="card-body"> 
                    </div>
                </div>
            </div>
            <div class="col-sm-3 my-2">
                <div class="card shadow h-100 py-2" style="background:#19a177">
                    <div class="card-body"> 
                    </div>
                </div>
            </div>
            <div class="col-sm-3 my-2">
                <div class="card shadow h-100 py-2" style="background:#ffa363">
                    <div class="card-body"> 
                    </div>
                </div>
            </div>
            <div class="col-sm-3 my-2">
                <div class="card shadow h-100 py-2" style="background:#19a177">
                    <div class="card-body"> 
                    </div>
                </div>
            </div>
        </div>
    </div>

   






    

   
    <div class="container">
        <h2>Selamat Datang Pengguna</h2>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </div>
@endsection

<div class="container-fluid mb-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h1 class="h3 mb-4 text-gray-900">Pengaduan</h1>
                </div>
                <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box-shadow: 0px 4px 16px 0px #00000029 !important;">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="row mb-3">
                                <div class="col-mb-6">
                                    <form action="https://jombangwiwfi.id/pengaduan" method="get" id="sort-form">
                                        <input type="hidden" name="search" value>
                                        <div classs="form-inline">
                                            <label for="entries" class="mr-2">Show:</label>
                                            <select id="entries" name="entries" class="form-control">
                                            <option value="10" selected> 10</option>
                                            <option value="25"> 25</option>
                                             <option value="50"> 50</option>
                                             <option value="100">
                                                "100"
                                                </option>
                                                </select>
                                                <label for="entries" class="ml-2">entries</label>
                                            </div>
                                          </form>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-inline float-right">
                                                <form action="https://jombangwifi.id/pengaduan" method="get">
                                                    <input type="text" name="search" class="form-control border-1 small hover:border-primary" placeholder="Cari data..." aria-label="Search" aria-describedby="basic-addon2" autocomplete="off" value>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="submit">
                                                            <i class="fas fa-search fa-sm">
                                                                ::before
                                                            </i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>