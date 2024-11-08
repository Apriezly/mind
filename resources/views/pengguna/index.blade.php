@extends('layouts/main')

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <p class="m-0 judul-utama">Kategori</p>
            </div>
        </div><!-- /.row -->
    </div>

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
                <div class="col-12">
                  <div>
                    <p class="mb-4 judul-utama">Daftar Kadarluarsa</p>
                  </div>
                  <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box-shadow: 0px 4px 16px 0px #00000029 !important;">
                    <div class="card-body">
                      <div class="row mb-3">
                        <div class="col-6">
                          <form action="" method="get" id="sort-form">
                            <input type="hidden" name="search" value>
                            <div class="form-inline float-left">
                                <label for="entries" class="mr-2 show se-mind se-mind-color">Show :</label>
                                  <select id="entries" name="entries" class="form-control bg-oren se-mind">
                                    <option value="10" selected> 10</option>
                                    <option value="25"> 25</option>
                                    <option value="50"> 50</option>
                                    <option value="100"> 100</option>
                                  </select>
                                <label for="entries" class="ml-2 se-mind se-mind-color">entries</label>
                            </div>
                          </form>
                        </div>
                        <div class="col-6">
                          <form action="" method="get">
                            <input type="hidden" name="entries" value>
                              <div class="form-inline float-right">
                              <!-- <form>
                                  <input type="text" name="search" placeholder="Search.." aria-label="Search" aria-describedby="basic-addon2" autocomplete="off" value>
                              </form> -->
                                <div class="input-group">
                                  <!-- <div class="input-group-append">
                                    <button class="btn btn-search" type="submit">
                                    <img src="{{ asset('/element/search.svg') }}" alt="filter icon">
                                    </button>
                                  </div> -->
                                  <input type="text" name="search" class="form-control search-mind border-1 small hover:border-primary" placeholder="Cari data..." aria-label="Search" aria-describedby="basic-addon2" autocomplete="off" value>
                                </div>
                                <div class="ml-3">
                                  <img src="{{ asset('/element/filter.svg') }}" alt="filter icon">
                                </div>
                              </div>
                          </form>
                        </div>
                      </div>

                      
                      <table class="table table-borderless table-striped" id="dataTable">
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
                          <tr>
                            <td scope="row">Ujian Mapel Produktif</td>
                            <td style="white-space: normal; word-wrap: break-word;">STS</td>
                            <td>17-10-2024 21:00</td>
                            <td style="white-space: normal; word-wrap: break-word;">Sekolah</td>
                            <td style="white-space: normal; word-wrap: break-word;">1 hari lagi</td>
                            <td scope="row"></td>
                          </tr>    
                          <tr>
                            <td scope="row">Reuni Keluarga Slamet</td>
                            <td style="white-space: normal; word-wrap: break-word;">Tempat : Rumah Dinda</td>
                            <td>18-10-2024 10:00</td>
                            <td style="white-space: normal; word-wrap: break-word;">Keluarga</td>
                            <td style="white-space: normal; word-wrap: break-word;">2 hari lagi</td>
                            <td scope="row"></td>
                          </tr>
                          <tr>
                            <td scope="row">Bayar Kredit Montor</td>
                            <td style="white-space: normal; word-wrap: break-word;">Kurang 10 juta</td>
                            <td>20-10-2024 08:00</td>
                            <td style="white-space: normal; word-wrap: break-word;">Pribadi</td>
                            <td style="white-space: normal; word-wrap: break-word;">4 hari lagi</td>
                            <td scope="row"></td>
                          </tr>
                          <tr>
                            <td scope="row">Bayar Sewa Toko</td>
                            <td style="white-space: normal; word-wrap: break-word;">200 ribu</td>
                            <td>20-10-2024 15:00</td>
                            <td style="white-space: normal; word-wrap: break-word;">Bisnis</td>
                            <td style="white-space: normal; word-wrap: break-word;">4 hari lagi</td>
                            <td scope="row"></td>
                          </tr>
                        <tbody>
                      </table>

                      <div class="row mt-3">
                        <div class="col-6">
                          <div class="form-inline float-left">
                            <p class="se-mind">1- 10 dari <span class="banyak-data">46 data</span></p>
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
                                <a class="page-link" href="">2</a>
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
                        </div>

                           
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>                                                     
@endsection

                                   
                                                        
                                                        




                                   