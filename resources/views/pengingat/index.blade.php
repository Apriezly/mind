@extends('layouts/main')


@section('content-header')
<div class="container">
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div>
                <p class="mb-4 judul">Pengingat</p>
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
                                <div class="input-group">
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
                        <th>Status</th>
                        <th>Set</th>
                        <th>Ulangi Setiap</th>
                        <th>Selesai</th>
                        <th>Kirim Via</th>
                        <th>Atur Pengingat</th>
                        <th>Aksi</th>
                      </tr>                        
                    </thead>
                    <tbody class="isi-tabel">
                        <tr>
                          <td>Ujian Mapel Produktif</td>
                          <td>1 hari lagi</td>
                          <td>2 hari sebelumnya</td>
                          <td>Kamis (07.00)</td>
                          <td>17-10-2024 21.00</td>
                          <td>Email</td>
                          <td scope="row">
                            <span class="sudah-diatur">Sudah diatur</span>
                          </td>
                          <td>
                                        
                              <a href="{{ url('/editpengingat') }}" class="btn btn-sm button-edit">
                                  <img src="{{asset('/element/edit.svg')}}" alt="edit">
                              </a>
                          </td>
                                    
                        </tr>
                        <tr>
                          <td>Bayar sewa toko</td>
                          <td>4 hari lagi</td>
                          <td>-</td>
                          <td>-</td>
                          <td>20-10-2024 15.00</td>
                          <td>-</td>
                          <td scope="row">
                            <span class="belum-diatur">Belum diatur</span>
                          </td>
                          <td>
                                        
                              <a href="{{ url('/editpengingat') }}" class="btn btn-sm button-edit">
                                  <img src="{{asset('/element/edit.svg')}}" alt="edit">
                              </a>
                          </td>
                                    
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