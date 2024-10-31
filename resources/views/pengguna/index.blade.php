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