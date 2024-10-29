@extends('template/all')

@section('contents')
    <div class="container">
        <h2>Hai</h2>
        <h2>Selamat Pagi, Admin!</h2>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </div>
@endsection