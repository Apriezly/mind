@extends('layouts/main')

@section('content')
    <div class="container">
        <h2>Selamat Datang Admin</h2>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </div>
@endsection