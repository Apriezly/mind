@extends('layouts/main')

@section('content')
<div class="container">
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div>
                    <p class="mb-4 judul">Tambah Kategori</p>
                </div>
                <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box-shadow: 0px 4px 16px 0px #00000029 !important;">
                    <div class="card-body">
                        <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                        
                        @csrf
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group style-input">
                                    <label>Icon</label>
                                    <input type="file" id="file" class="form-control @error('image') is-invalid @enderror" name="image" value=""  placeholder="No file choosen">
                                    @error('image')
                                            <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 style-input">
                                <div class="form-group">
                                    <label>Judul Kategori</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value=""  placeholder="">
                                    @error('judul')
                                            <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-md button-simpan">Simpan</button>
                                <input type="hidden" name="curr_url" value="">
                                <a href="{{url('/beranda')}}" class="btn btn-md button-batal">Batal</a>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>                                       

@endsection