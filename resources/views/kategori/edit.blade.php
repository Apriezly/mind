@extends('layouts/main')


@section('content')
<div class="container">
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div>
                    <a href="{{ url('/beranda' )}}" class="mb-4 judul">Edit Kategori</a>
                </div>
                <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box-shadow: 0px 4px 16px 0px #00000029 !important;">
                    <div class="card-body">
                        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group style-input">
                                    <label>Icon</label>
                                    <input type="file" id="file" class="form-control " name="image" value=""  placeholder="No file choosen">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group style-input">
                                    <label>Judul Kategori</label>
                                    <input type="text" class="form-control " name="judul" value="{{ old('judul', $kategori->judul) }}"  placeholder="">
                                </div>
                            </div>
                            @if($errors->any())
                                {!! implode('', $errors->all('<div>:message</div>')) !!}
                            @endif

                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-md button-simpan">Update</button>
                                <a href="{{url('/beranda')}}" class="btn btn-md button-batal">Batal</a>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div> 

@endsection
