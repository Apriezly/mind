@extends('layouts/main')


@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark"><strong>Kategori</h1>
        </div>
    </div><!-- /.row -->
@endsection
@section('content')
    <div class="row my-3">
        <div class="col-sm-4 my-2">
        <div class="card shadow h-100 py-2">
        <div class="card-body"> ==$0
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                        "Sekolah"
                    </div> 
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        "25"
                    </div> 
                    </div>
        
             <div class="col-auto"> ==$0
                <img scr="https://jombangwifi.id/img/icons/user.svg" alt="icon-users">
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