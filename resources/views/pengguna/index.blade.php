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
                 <!-- <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box-shadow: 0px 4px 16px 0px #00000029 !important;">
                    <div class="card-body"> -->
                      <!--<div class="row mb-3">
                        <div class="col-6">
                          <form action="" method="get" id="sort-form">
                            <div class="form-inline float-left">
                                <label for="entries" class="mr-2 show se-mind se-mind-color">Show :</label>
                                  <select id="entries" name="entries" class="form-control bg-oren se-mind">
                                    <option value="10" selected> 10</option>
                                    <option value="25"> 25</option>
                                    <option value="46"> 46</option>
                                    <option value="100"> 100</option>
                                  </select>
                                <label for="entries" class="ml-2 se-mind se-mind-color">entries</label>
                            </div>
                          </form>
                        </div> -->
                       <!-- <div class="col-6">
                          <form action="" method="get">
                            <input type="hidden" name="entries" value>
                              <div class="form-inline float-right">
                                <div class="input-group"> -->
                                 <!-- <input type="text" id="MyTable" onkeyup="myFunction()" > <!--name="search" button class="form-control search-mind border-1 small hover:border-primary" placeholder="Cari data..." aria-label="Search"  value="" > -->
                                <!--</div>
                                <div class="ml-3">
                                  <img src="{{ asset('/element/filter.svg') }}" alt="filter icon">
                                </div>
                              </div>
                          </form>
                         </div>
                      </div> -->
  
                      <!-- <div id="table_wrapper" class="dt-container dt-empty-footer">
                      <table class="table table-borderless table-striped" id="table" style="width:100%">
                        <thead class="judul-tabel"> 
                          <tr class="header">
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
                                //$sekarang = new DateTime();
                                //$akhir = new DateTime($data->expiration_date);
                                //$diff = $sekarang->diff($akhir);

                                //if(strtotime(strval($data->expiration_date)) < strtotime("now"))
                                  //echo "<span style='color: #F56E6B;font-weight:600'>Terlewat</span>";
                                //else
                                  //if($diff->days > 3)
                                    //echo $diff->days ." hari lagi";
                                  //else if($diff->days > 0 && $diff->days < 3)
                                    //echo "<span style='color: #F56E6B'>$diff->days hari lagi</span>";
                                  //else if($diff->days == 0 && $diff->h > 0)
                                    //echo "<span style='color: #F56E6B'>$diff->h jam lagi</span>";
                                  //else if($diff->days == 0 && $diff->h == 0 && $diff->i > 0)
                                    //echo "<span style='color: #F56E6B'>$diff->i menit lagi</span>";
                                  //else if($diff->days == 0 && $diff->h == 0 && $diff->i == 0 && $diff->s > 0)
                                    //echo "<span style='color: #F56E6B'>$diff->s detik lagi</span>";
                            ?></td>
                          </tr>  
                        @empty
                          <div class="alert alert-danger">
                              Data belum tersedia.
                          </div>
                        @endforelse 
                        <tbody>
                      </table> -->

                     <!-- <div class="row mt-3">
                        <div class="col-6">
                          <div class="form-inline float-left">
                            <p class="se-mind">1 - 10 dari <span class="banyak-data">46 data</span></p>
                          </div>
                        </div>
                        

                        
                          <div class="col-6">
                          <div class="form-inline float-right">
                            <ul class="pagination justify-content-end se-mind">
                              <li class="page-item disabled">
                              <span class="page-link">Previous</span>
                              </li>
                              <li class="page-item active">
                                <a class="page-link" href="">1</a>
                              </li>
                              <li class="page-item">
                                <a class="page-link" href="" >2</a>
                              </li>
                              <li class="page-item">
                                <a class="page-link" href="">3</a>
                              </li>
                              <li class="page-item">
                                <a class="page-link" href="">4</a>
                              </li>
                              <li class="page-item">
                                <a class="page-link" href="">5</a>
                              </li>
                              <li class="page-item">
                                <span class="page-link" href="">Next</span>
                              </li>
                            </ul>
                          </div>
                        </div> -->


<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
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
    <!-- Inisialisasi DataTable dengan JavaScript -->
<script>
        // $(document).ready(function() {
        //     $('#example').DataTable({
        //         "paging": true,          // Mengaktifkan pagination
        //         "ordering": true,        // Mengaktifkan fitur sorting
        //         "searching": true,       // Mengaktifkan fitur pencarian
        //         "info": true,            // Menampilkan informasi halaman
        //         "lengthChange": false    // Menonaktifkan perubahan jumlah item per halaman
        //     });
        // });

    $('#example').DataTable({
    "paging": true,
    "ordering": true,
    "searching": true,
    "info": true,
    "lengthChange": true,
    "order": [[1, 'asc']],  // Mengurutkan berdasarkan kolom kedua (Usia)
});
// Force hapus teks "Search" jika masih muncul
$('.dataTables_filter label').contents().filter(function () {
return this.nodeType === 3;
}).remove();
    
                                    </script>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div> 
      </head>
  <body>
  

  
  


    
    

                      
                        

                      
                        

                        
                           
    
                              
        
        

@endsection

                                   
                                                        
                                                        




                                   