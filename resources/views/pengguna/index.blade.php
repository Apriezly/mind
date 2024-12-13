@extends('layouts/main')

@section('content')
    @include('kategori/index')

    <div class="container">
        <div class="container-fluid mb-5 mt-5">
            <div class="row">
              <div class="col-12">
                <div>
                  <p class="mb-4 judul-utama">Daftar Kadaluarsa</p>
                </div>
                

                <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box-shadow: 0px 4px 16px 0px #00000029 !important;">
                  <div class="card-body"> 
                    <div class="row mb-12">
                      <div class="col-12">
                        <table id="example"  class="dt-container dt-empty-footer">
                          <thead class="judul-tabel"> 
                            <tr>
                              <th>Kegiatan</th>
                              <th>Deskripsi</th>
                              <th>Waktu</th>
                              <th>Kategori</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody class="isi-tabel">
                            @forelse ($dokumen as $data)
                              <tr>
                                <td scope="row" class="col-2">{{$data->kegiatan}}</td>
                                <td style="white-space: normal; word-wrap: break-word;" class="col-4">{{$data->deskripsi}}</td>
                                <td class="col-2">{{$data->expiration_date}}</td>
                                <td style="white-space: normal; word-wrap: break-word;" class="col-2">{{ ($data->kategori != null) ? $data->kategori->judul : '' }}</td>
                                <td style="white-space: normal; word-wrap: break-word;" class="col-2"><?php
                                      $sekarang = new DateTime();
                                      $akhir = new DateTime($data->expiration_date);
                                      $diff = $sekarang->diff($akhir);
                                      if(strtotime(strval($data->expiration_date)) < strtotime("now"))
                                      echo "<span style='color: #F56E6B;font-weight:600'>Terlewat</span>";
                                          else
                                          if($diff->days > 3)
                                          echo $diff->days ." hari lagi";
                                          else if($diff->days > 0 && $diff->days < 3)
                                          echo "<span style='color: #F56E6B'>$diff->days hari lagi</span>";
                                          else if($diff->days == 0 && $diff->h > 0)
                                          echo "<span style='color: #F56E6B'>$diff->h jam lagi</span>";
                                          else if($diff->days == 0 && $diff->h == 0 && $diff->i > 0)
                                          echo "<span style='color: #F56E6B'>$diff->i menit lagi</span>";
                                          else if($diff->days == 0 && $diff->h == 0 && $diff->i == 0 && $diff->s > 0)
                                          echo "<span style='color: #F56E6B'>$diff->s detik lagi</span>";
                                ?></td>
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
    "order": [[2, 'asc']],  // Mengurutkan berdasarkan kolom kedua (Usia)
    
    });

    // Force hapus teks "Search" jika masih muncul
    $('.dataTables_filter label').contents().filter(function () {
    return this.nodeType === 3;
    }).remove();
   
   
       
   

    
  </script>
  


@endsection

                                   
                                                        
                                                        




                                   