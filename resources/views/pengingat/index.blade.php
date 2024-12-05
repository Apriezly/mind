@extends('layouts/main')


@section('content')
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
                              <div class="form-inline float-right">
                                  <div class="input-group">
                                    <input type="text" name="search" id="input-search" class="form-control search-mind border-1 small hover:border-primary" placeholder="Cari data...">
                                  </div>
                                <div class="ml-3">
                                  <img src="{{ asset('/element/filter.svg') }}" alt="filter icon">
                                </div>
                              </div>
                        </div>
                      </div>

                    
                    <table class="table table-borderless table-striped" id="dataTable">
                    <thead class="judul-tabel"> 
                      <tr>
                        <th>Kegiatan</th>
                        <th>Status</th>
                        <th>Selesai</th>
                        <th>Set</th>
                        <th>Kirim Via</th>
                        <th>Info</th>
                        <th>Aksi</th>
                      </tr>                        
                    </thead>
                    <tbody class="isi-tabel">
                    @forelse ($dokumen as $data)
                        <tr>
                          <td>{{ $data->kegiatan }}</td>
                          <td>
                            <?php
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
                            ?>

                          </td>
                          <td>{{ $data->expiration_date }}</td>
                          <td></td>
                          <td>{{ ($data->tipe != null) ? $data->tipe : '' }}</td>
                          <td scope="row">
                            <?php
                              if($data->tipe != null){
                                echo "<span class='sudah-diatur'>Sudah Diatur</span>";
                              }else{
                                echo "<span class='belum-diatur'>Belum Diatur</span>";
                              }
                            ?>
                          </td>
                          <td>  
                              <a href="{{ route('data.edit', $data->id) }}" class="btn btn-sm button-edit">
                                  <img src="{{asset('/element/edit.svg')}}" alt="edit">
                              </a>
                          </td>      
                        </tr>
                      @empty
                        <div class="alert alert-danger">
                            Data belum tersedia.
                        </div>
                      @endforelse   
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).ready( function(){
    // $(document).on(keyup, function(e){
    //   e.preventDefault();
    //   let search_string = $(#search).val();
    //   // console.log();
      
    // })

    // let table = new DataTable('#dataTable');

    // $('#input-search').on('keyup', function () {
    //   table.search(this.value).draw();
    // });

    // var isi = document.getElementById("dataTable");

    $('#input-search').on('keyup', function(){
      var value = $(this).val();
      console.log('Value:', value)
    // //   var data = searchTable(value, isi)

    })

    // function searchTable(value, data){
    //   var filteredData = []

    //   for (var i = 0; i  < data.length; i++){
    //     value = value.toLowerCase()
    //     var name = data[i].name.toLowerCase()

    //     if (name.includes(value)){
    //       filteredData.push(data[i])
    //     }
    //   }
    // }
  })
</script>

@endsection