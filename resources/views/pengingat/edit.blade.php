@extends('layouts/main')



@section('content')
<div class="container">
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div>
                    <p class="mb-4 judul">Pengingat - Atur Pengingat</p>
                </div>
                <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box-shadow: 0px 4px 16px 0px #00000029 !important;">
                    <div class="card-body">
                        <form action="{{ route('pengingat.update', $dokumen->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group style-input">
                                        <label>Kegiatan</label>
                                            <input type="text" class="coba form-control  @error('kegiatan') is-invalid @enderror" name="kegiatan" value="{{ old('kegiatan', $dokumen->kegiatan) }}"  id="disabledInput" placeholder="" disabled>

                                            @error('kegiatan')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="form-group style-input">
                                        <label>Status</label>
                                        <input type="text" class="form-control" placeholder="" name="status" id="disabledInput" value="<?php
                                            $sekarang = new DateTime();
                                            $akhir = new DateTime($dokumen->expiration_date);
                                            $diff = $sekarang->diff($akhir);
                                            echo $diff->days ." hari lagi";
                                        ?>" disabled>
                                    </div>
                                    
                                    <div class="form-group style-input">
                                        <label>Selesai</label>
                                        <input type="datetime-local" class="form-control" name="selesai" value="{{ old('expiration_date', $dokumen->expiration_date) }}"  placeholder="" id="disabledInput" disabled>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group style-input">
                                        <label>Waktu</label>
                                        <input type="time" id="time" class="form-control " name="waktu" value=""  placeholder="" style="height:35px">
                                    </div>
                                    <div class="form-group style-input">
                                        <label>Set</label>
                                        <!-- <select class="form-control" multiple title="-- Pilih --" data-size="5" data-dropup-auto="false" id="set"> -->
                                        <select class="form-control" multiple id="set">
                                            @foreach ($set as $setID => $nama)
                                            <option name="set" value="{{ $setID }}" @selected(old('id') == $setID)>
                                                {{ $nama }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form group style-input">
                                        <label>Kirim Via</label>
                                            <div class="col-sm-10" name="tipe">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Email" checked>
                                                    <label class="form-check-label" for="gridRadios1">Email</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                                    <label class="form-check-label" for="gridRadios2">Whatsapp</label>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            @if($errors->any())
                                {!! implode('', $errors->all('<div>:message</div>')) !!}
                            @endif

                            <div class="row mt-2">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-md button-simpan">Simpan</button>
                                    <input type="hidden" name="curr_url" value="">
                                    <a href="{{url('/pengingat')}}" class="btn btn-md button-batal">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>  
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>
<script>
    new MultiSelectTag('set')
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $(document).ready( function(){
        $("#set").change(function(){
            console.log("coba")
        })

        $('document').on('change','#set',function() {
            // console.log('coba')
            
        })
    })


    
    

    // $(function() {
    //     $(".datetimepicker").datetimepicker( {
    //         format: 'yyyy-mm-dd H-i-s',
    //         autoclose: true,
    //         autoHighlight: true
    //     })
    // })
  </script>

@endsection

<!-- contoh hitung jarak tanggal

$awal = date_create("1995-11-09");
$akhir = datecreate();
$diff = date_diff($awal, $akhir);

echo "Usiaku adalah ";
echo $diff->y." Tahun ";
echo $diff->m." Bulan ";
echo $diff->d." Hari ";
echo $diff->h." Jam ";
echo $diff->i." Menit ";
echo $diff->s." Detik ";
echo "Total hari : ".$diff->days; -->

