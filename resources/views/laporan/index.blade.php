@extends('layouts/main')

@section('content')
<div class="container-fluid mb-5">
        <div class="row">
            <div class="col-md-12">
            <div>
                <h1 class="h3 mb-4 text-gray-800">Laporan</h1>
            </div>
                <div class="card border-0 shadow-sm rounded p-3" style="border-radius:16px !important; box-shadow: 0px 4px 16px 0px #00000029 !important;">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="" aoutocomplete="off">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div>
                                            <canvas id="myChart"></canvas>
                                        </div>
                                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                        <script>
                                            const ctx = document.getElementById('myChart');
                                            new Chart(ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt','Nov', 'Des',],
                                                    datasets: [{
                                                        label: 'Data',
                                                        data: [200,  100, 23, 12,  194, 50, 150, 52, 85, 27, 43, 195],
                                                        backgroundColor: ['#E06196','#FAE3EC'],
                                                        borderWidth: 1
                                                    }]
                                                },
                                                options: {
                                                    scales: {
                                                        y: {
                                                            beginAtZero: true
                                                        }
                                                    }
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="dropdown">
                            <button class="btn button-simpan dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Download</button>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                        </div>
    
   
                           
         

@endsection         