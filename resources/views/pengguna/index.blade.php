@extends('layouts/main')


@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark"><strong>Kategori</h1>
        </div>
    </div><!-- /.row -->
@endsection
@section('content')
    <div class="container">
        <h2>Selamat Datang Pengguna</h2>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </div>
@endsection