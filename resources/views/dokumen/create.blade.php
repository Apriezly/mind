@extends('layouts/main')


@section('content')
<div class="container">
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div>
                    <a href="{{ route('data.index')}}" class="mb-4 judul">Kategori -- Sekolah</a>
                </div>
                <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box-shadow: 0px 4px 16px 0px #00000029 !important;">
                    <div class="card-body">
                        <form action="{{ route('data.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <p class="mb-4 judul-form-input">Tambah Data</p>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group style-input">
                                        <label>Kegiatan</label>
                                        <input type="text" class="form-control  @error('kegiatan') is-invalid @enderror" name="kegiatan" value=""  placeholder="">

                                        @error('kegiatan')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group style-input">
                                        <label>Deskripsi</label>
                                        <textarea id class="form-control  @error('deskripsi') is-invalid @enderror"  style="height:118px" name="deskripsi" value=""  placeholder=""></textarea>
                                        @error('deskripsi')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group style-input">
                                        <label>Tanggal Pelaksanaan</label>
                                        <input type="datetime-local" id="datetime-local" class="form-control  @error('expiration_date') is-invalid @enderror" name="expiration_date" value=""  placeholder="">
                                        @error('expiration_date')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group style-input">
                                        <label>Kategori</label>
                                        <select class="form-control" name="kategori_id">
                                            <option style="color:#999999">-- Pilih kategori --</option>
                                            @foreach ($kategori as $kategoriID => $judul)
                                            <option value="{{ $kategoriID }}">
                                                {{ $judul }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group style-input">
                                        <label>Lampiran (Opsional)</label>
                                        <input type="file" id="file" class="form-control" name="image" value=""  placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <p class="mb-4 judul-form-input">Atur Pengingat</p>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group style-input">
                                        <label>Set</label>
                                        <input type="hidden" class="@error('set') is-invalid @enderror" id="setValue" name="set">
                                        <select  data-placeholder="-- Pilih Set --" class="form-control" id="set" multiple>
                                            @foreach ($set as $setID => $nama)
                                            <option value="{{ $setID }}">
                                                {{ $nama }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div id="inputCustom">
                                            <input type="datetime-local" class="form-control" name="set_custom">
                                        </div>
                                        @error('set')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="form group style-input">
                                        <label>Kirim Via</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="tipe" value="Email">
                                                <label class="form-check-label">Email</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="tipe" value="WhatsApp">
                                                <label class="form-check-label">WhatsApp</label>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>

                            

                            <div class="col-sm-12 mt-2">
                                <button type="submit" class="btn btn-md button-simpan">Simpan</button>
                                <input type="hidden" name="curr_url" value="">
                                <a href="{{ route('data.index') }}" class="btn btn-md button-batal">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')

<script>
    $(document).ready(function(){

        $('#inputCustom').hide();
        $('#set').chosen({no_results_text: "Data tidak ditemukan!"}) //saat milih

            $('#set').change(function(){ //ganti ini
                var inputArrayString = $(this).val().toString(); //variabel untuk nampung nilai yang dipilih
                // console.log(inputArrayString);

                $('#setValue').val(inputArrayString); //memasukkan value ke input type hidden

                if($(this).val().includes('7')) { //includes = ngambil nilai array
                    $('#inputCustom').show();
                } else {
                    $('#inputCustom').hide();
                }
            })
    })

    
    // var fruits = ["mango", "orange"];
    // var str = fruits.toString();
    // console.log(fruits);
    // console.log(str);


</script>
@endsection