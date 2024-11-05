@extends('layouts/main')


@section('content-header')
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Kategori</h3>
            </div>
        </div><!-- /.row -->
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-sm-3 my-2">
                <div class="kategori1 h-100 py-2">
                    <div class="card-body"> 
                    </div>
                </div>
            </div>
            <div class="col-sm-3 my-2">
                <div class="kategori2 h-100 py-2">
                    <div class="card-body"> 
                    </div>
                </div>
            </div>
            <div class="col-sm-3 my-2">
                <div class="kategori1 h-100 py-2">
                    <div class="card-body"> 
                    </div>
                </div>
            </div>
            <div class="col-sm-3 my-2">
                <div class="kategori2 h-100 py-2" style="background:#19a177">
                    <div class="card-body"> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="container-fluid mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div>
                    <h1 class="h3 mb-4 text-gray-900">Daftar Kadarluarsa</h1>
                </div>
                <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box-shadow: 0px 4px 16px 0px #00000029 !important;">
                    <div class="card-body">
                    
                             <div cass="row mb-3">
                                <div class="col-md-6">
                                    <form action="https://jomabangwifi.id/notification" method="get" id="sort-form">
                                        <input type="hidden" name="search" value>
                                        <div class="form-inline">
                                            <label for="entries" class="mr-2">Show:</label>
                                            <select id="entries" name="entries" class="form-control">
                                                <option value="10" selected> 10</option>
                                                <option value="25"> 25</option>
                                                <option value="50"> 50</option>
                                                <option value="100"> 100</option>
                                            </select>
                                            <label for="entries" class="ml-2">entries</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          </div>
                                <div class="col-md-6">
                                  <div class="form-inline float-right">
                                    <form action="" method="get">
                                      <input type="hidden" name="entries" value>
                                      <div  class="input-group ml-3">
                                        <input type="text" name="search" class="form-control border-1 small hover:border-primary" placeholder="Cari data..." aria-label="Search" aria-describedby="basic-addon2" autocomplete="off" value>
                                        <div class="input-group-append">
                                          <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm">
                                              
                                            </i>
                                          </button>
                                        </div>
                                     </div>
                                   </form>
                                </div>
                              </div>
                            </div>
                           <table class="table table-borderless table-striped" id="dataTable">
                              <thead> 
                                <tr>
                                    <th>Kegiatan</th>
                                    <th>Deskripsi</th>
                                    <th>Waktu</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                </tr>                          
                             </thead>
                             <tbody>
                              <tr>
                                <td scope="row">Ujian Mapel Produktif</td>
                                <td style="white-space: normal; word-wrap: break-word;">STS</td>
                                <td>17-10-2024 21:00</td>
                                <td style="white-space: normal; word-wrap: break-word;">Sekolah</td>
                                <td style="white-space: normal; word-wrap: break-word;">1 hari lagi</td>
                                <td scope="row">
                              </td>
                              <td>
                              </tr>    
                              <tr>
                                <td scope="row">Reuni Keluarga Slamet</td>
                                <td style="white-space: normal; word-wrap: break-word;">Tempat : Rumah Dinda</td>
                                <td>18-10-2024 10:00</td>
                                <td style="white-space: normal; word-wrap: break-word;">Keluarga</td>
                                <td style="white-space: normal; word-wrap: break-word;">2 hari lagi</td>
                                <td scope="row">
                              </td>
                             <td>
                            </tr>
                            <tr>
                                <td scope="row">Bayar Kredit Montor</td>
                                <td style="white-space: normal; word-wrap: break-word;">Kurang 10 juta</td>
                                <td>20-10-2024 08:00</td>
                                <td style="white-space: normal; word-wrap: break-word;">Pribadi</td>
                                <td style="white-space: normal; word-wrap: break-word;">4 hari lagi</td>
                                <td scope="row">
                              </td>
                            <td>
                            </tr>
                            <tr>
                                <td scope="row">Bayar Sewa Toko</td>
                                <td style="white-space: normal; word-wrap: break-word;">200 ribu</td>
                                <td>20-10-2024 15:00</td>
                                <td style="white-space: normal; word-wrap: break-word;">Bisnis</td>
                                <td style="white-space: normal; word-wrap: break-word;">4 hari lagi</td>
                                <td scope="row">
                             </td>
                            <td>
                        </tr>
                        <tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-6">
                               <p>1- 10 dari 46 data</p>
                            </div>
                            <div class="col-md-6">
                             <ul class="pagination justify-content-end">
                              <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                              </li>
                              <li class="page-item active">
                                <a class="page-link" href="">1</a>
                              </li>
                              <li class="page-item ">
                                <a class="page-link" href="">2</a>
                              </li>
                              <li class="page-item ">
                                <a class="page-link" href="">3</a>
                              </li>
                              <li class="page-item ">
                                <a class="page-link" href="">4</a>
                              </li>
                              <li class="page-item ">
                                <a class="page-link" href="">5</a>
                              </li>
                              <li class="page-item disabled">
                                <a class="page-link" href="">Next</span>
                              </li>
                              </li>
                              <li class="page-itemdisabled">
                               <a class="page-link" href=""></a>
                              </li>

                              
                            
                           
                                           

                                    

                                      
                                    
                                       

                                    

                                   
                                     
@endsection

                                   
                                                        
                                                        




                                   