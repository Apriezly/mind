@extends('layouts/main')


@section('content')
<div class="container">
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div>
                  <a href="{{ url('/beranda')}}" class="mb-4 judul">Daftar Pengingat</a>
                </div>
                <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box-shadow: 0px 4px 16px 0px #00000029 !important;">
                    <div class="card-body">
                        <div class="row mb-3">
                    </div>
                        
                    <table class="table table-borderless table-striped" id="example">
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
                        @foreach ($dokumen as $data)
                        <tr>
                          <td>{{ $data->kegiatan }}</td>
                          <td>
                            <?php
                                $sekarang = new DateTime();
                                $akhir = new DateTime($data->expiration_date);
                                $diff = $sekarang->diff($akhir);

                                // strtotime = mengubah format tanggal ke waktu
                                // strval = onversi menjadi string
                                
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
                          <td class="col-3">{{ implode(', ', array_map(function($arr) {
                                  return $arr['set']['nama'] ?? '';
                              }, $data->arr_set)) }}
                          </td>
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
                            <?php
                              if(strtotime(strval($data->expiration_date)) < strtotime("now")){?>
                              <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('pengingat.destroy', $data->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm button-hapus">
                                    <img src="{{asset('/element/delete.svg')}}" alt="delete">
                                </button>
                              </form>
                              <?php
                              }else{ 
                              ?>
                                <a href="{{ route('data.edit', $data->id) }}" class="btn btn-sm button-edit">
                                  <img src="{{asset('/element/edit.svg')}}" alt="edit">
                                </a>
                              <?php }
                            ?>  
                          </td>      
                        </tr>
                        @endforeach   
                      <tbody>
                    </table>
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