@extends('layouts/main')


@section('content')
<div class="container">
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div>
                    <p class="mb-4 judul">Kategori - Sekolah</p>
                </div>
                <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box-shadow: 0px 4px 16px 0px #00000029 !important;">
                    <div class="card-body">
                        <div class="row">
                            <p class="mb-4 judul-form-input">Edit Data</p>
                        </div>
                        <form action="{{ route('data.update', $dokumen->id) }}" method="POST" enctype="multipart/form-data">
                           
                            @csrf
                            @method('PUT')

                            <div class="row">
                            <div class="col-6">
                                <div class="form-group style-input">
                                    <label>Kegiatan</label>
                                    <input type="text" class="form-control  @error('kegiatan') is-invalid @enderror" name="kegiatan" value="{{ old('kegiatan', $dokumen->kegiatan) }}"  placeholder="">

                                    @error('kegiatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group style-input">
                                    <label>Deskripsi</label>
                                    <textarea id class="form-control  @error('deskripsi') is-invalid @enderror"  style="height:118px" name="deskripsi" value=""  placeholder="">{{ old('deskripsi', $dokumen->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group style-input">
                                    <label>Waktu</label>
                                    <input type="datetime-local" id="datetime-local" class="form-control  @error('expiration_date') is-invalid @enderror" name="expiration_date" value="{{ old('expiration_date', $dokumen->expiration_date) }}"  placeholder="">
                                    @error('expiration_date')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group style-input">
                                    <label>Kategori</label>
                                    <input type="text" class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id" name="kategori_id" value="{{ old('kategori_id', $dokumen->kategori_id) }}"  placeholder="">
                                    @error('kategori_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group style-input">
                                    <label>Lampiran (Opsional)</label>
                                    <input type="file" id="file" class="form-control" name="image" value=""  placeholder="">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-md button-simpan">Update</button>
                                <input type="hidden" name="curr_url" value="">
                                <a href="{{ route('data.index') }}" class="btn btn-md button-batal">Batal</a>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
                            
@endsection