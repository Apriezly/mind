@extends('layouts/main')


@section('content')
<div class="container">
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div>
                <a href="{{ url('/beranda')}}" class="mb-4 judul">Daftar Data</a>
                </div>
                <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box-shadow: 0px 4px 16px 0px #00000029 !important;">
                    <div class="card-body">
                        <div class="row mb-3">
                            <a href="{{ route('data.create') }}" class="btn btn-md button-tabel">
                            <!-- <a href="{{ url('/tambahdata') }}" class="btn btn-md button-tabel"> -->
                            <img src="{{asset('/element/plus.svg')}}">
                                Tambah Data
                            </a>
                        </div>
                        

                        
                        <table class="table table-borderless table-striped" id="example">
                            <thead class="judul-tabel"> 
                                <tr>
                                    <th>Kegiatan</th>
                                    <th>Deskripsi</th>
                                    <th>Created_at</th>
                                    <th>Update_at</th>
                                    <!-- <th>Lampiran</th> -->
                                    <th>Aksi</th>
                                </tr>                          
                            </thead>
                            <tbody class="isi-tabel">
                            
                                @forelse ($dokumen as $data)
                                    <tr>
                                        <td class="col-2">{{$data->kegiatan}}</td>
                                        <td class="col-4">{{$data->deskripsi}}</td>
                                        <td class="col-2">{{$data->created_at}}</td>
                                        <td class="col-2">{{$data->updated_at}}</td>
                                        <td class="col-2">
                                            <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('data.destroy', $data->id) }}" method="POST">
                                                <a href="{{ route('data.show', $data->id) }}" class="btn btn-sm button-show">
                                                    <img src="{{asset('/element/show.svg')}}" alt="show">
                                                </a>
                                                <a href="{{ route('data.edit', $data->id) }}" class="btn btn-sm button-edit">
                                                    <img src="{{asset('/element/edit.svg')}}" alt="edit">
                                                </a>

                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm button-hapus">
                                                    <img src="{{asset('/element/delete.svg')}}" alt="delete">
                                                </button>
                                            </form>
                                        </td>   
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data belum tersedia.
                                    </div>
                                @endforelse
                            <tbody>
                        </table>
                

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


  <script>
    $('#example').DataTable({
    "paging":  true, // Untuk tampilan Previous, angka, dan Next
    "ordering": true,
    "searching": true,
    "info": true,
    "lengthChange": true,
    "order": [[0, 'asc']],  // Mengurutkan berdasarkan kolom kedua (Usia)
    
    });

    // Force hapus teks "Search" jika masih muncul
    $('.dataTables_filter label').contents().filter(function () {
    return this.nodeType === 3;
    }).remove();
    
  </script>

@endsection