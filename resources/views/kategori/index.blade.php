<div class="container">
    <div class="row mb-2">
        <div class="col-sm-6">
            <p class="m-0 judul-utama">Kategori</p>
        </div>
    </div><!-- /.row -->
</div>

<div class="container">   
    <div class="row my-3">
        @foreach ($kategori as $data)
        <div class="col-sm-3 my-2">
            <div class="{{$data->id % 2 == 0 ? 'kategori2' : 'kategori1'}}" style="height:125px;">
                <div class="card-body"> 
                    <div class="row form-inline float-right">
                        <div class="dropdown">
                            <i class="fa fa-ellipsis-v dropbtn"></i>
                            <div class="dropdown-content">
                                <a href="{{ route('kategori.edit', $data->id) }}">Edit</a>
                                <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('kategori.destroy', $data->id) }}" method="POST">
                                    @csrf 
                                    @method('delete')
                                    <button class="hapus-kategori">
                                        <a>Hapus</a>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <a href="{{ route('data.index')}}">
                        <?php
                        if($data->image != null)
                            echo '<img src="/storage/kategori/' . $data->image . '">';
                        else
                            if($data->id % 2 == 0)
                                echo '<img src="/element/cat.svg">';
                            else
                                echo '<img src="/element/tiger.svg">';
                        ?>
                        <div class="mt-2 text-kategori">
                            <span>{{$data->judul}}</span>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        

        @endforeach
        <div class="col-sm-3 my-2 {{count($kategori) == 8 ? 'd-none' : ''}}">
            <div class="tambah-ktg" style="height:125px;">
                <div class="card-body"> 
                    <div class="text-center">
                        <a href="{{ route('kategori.create') }}">
                            <img src="{{ asset('/element/tambah-ktg.svg') }}" class="icon-kategori img-circle" href="{{ route('kategori.create') }}">
                        </a>
                        <div class="mt-2" style="font-size:14px; font-weight:500;">
                            <span href="{{ route('kategori.create') }}">Tambah Kategori Baru</span></br>
                            <span><?php
                                
                                $kategori = $kategori->count();
                                $max = 8;

                                $total = $max - $kategori;

                                echo $total ." tersisa";

                            ?></span>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

