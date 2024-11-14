@extends('layouts/main')


@section('content')
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-12">
            <div>
                <p class="mb-4 judul-utama">Kategori - Sekolah</p>
            </div>
            <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box shadow: 0px 4px 16px 0px #00000029 !important;">
                <div class="card-body">
                    <a href="" class="btn btn-md btn-darker mb-3">
                    <i class="fa fa-plus">
                    </i>
                    "Tambah Kategori"
                    </a>
                    
                    <div cass="row mb-3">
                        <div class="col-md-6">
                            <form action="" method="get" id="sort-form">
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

                        <div class="col-md-6">
                            <div class="form-inline float-right">
                                <form action="" method="get">
                                    <input type="hidden" name="entries" value>
                                    <div class="input-group ml-3">
                                        <input type="text" name="search" class="form-control border-1 small hover:border-primary" placeholder="Cari Data..." aria-label="Search" aria-describedby="basic-addon2" aoutocomplete="off" value>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search fa-sm"></i>
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
                                <th>Created_at</th>
                                <th>Update_at</th>
                                <th>Aksi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ujian Mapel Produktif</td>
                                <td>STS</td>
                                <td>15-10-2024 09:00</td>
                                <td>15-10-2024 09:00</td>
                                <td>
                                    <div class="id-flex">
                                        <a href="" class="btn btn-sm btn-show mr-2 d-none">
                                            <img scr="" alt="show-img">
                                        </a>
                                    </div>
                                    <div class="id-flex">
                                        <a href="" class="btn btn-sm btn-primary mr-2">
                                            <img scr="" alt="edit-img">
                                        </a>
                                    </div>
                                    <form action="" method="post">
                                        <input type="hidden" name="_token" value="VBiqh6WNWSzatha59ysUQ40hfs0axlhl7s3dgSKR" autocomplete="off">
                                        <input type="hidden" name="_method" value="delete">
                                        <button class="btn btn-danger btn-sm mr-2" type="submit" onlick="return confirm('yakin ingin dihapus')">
                                            <img src="" alt="delete-img">
                                        </button>
                                    </form>
                                    <div>
                                        <a href="" class="btn btn-sm btn-success mr-2">
                                            <img scr="" alt="show-img">
                                        </a>
                                    </div>
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

@endsection