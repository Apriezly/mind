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
                                        // Ambil data dari controller dan map sesuai dengan kebutuhan Chart.js
                                        const dokumen = @json($Dokumen);  // Pastikan data ini ada di console
                                         // Mapping data untuk labels dan values
                                        const labels = dokumen.map(item => item.kategori );
                                        const dataValues = dokumen.map(item => item.kategori_id) ;
                                        // Inisialisasi Chart.js
                                        const ctx = document.getElementById('myChart').getContext('2d');
                                        const myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt','Nov', 'Des',],
                                                datasets: [{
                                                    label: 'Data',
                                                    data: dataValues, // Data dari database
                                                    backgroundColor: ['#E06196','#FAE3EC'],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                responsive: true,
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
                    <div class="btn-group">
                        <button class="btn button-simpan" class="btn btn-default" >Download</button> 
        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
               
                                    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                    <script>
                                        const ctx = document.getElementById('myChart').getContext('2d');
                                        constDokumen = @json($Dokumen);
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt','Nov', 'Des',],
                                                datasets: [{
                                                    label: 'Data',
                                                    // data: Array(labels.length).fill(1),
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
                                        
                                   </script> -->

<!-- <!doctype html>
<html lang="en">
    <head>
        <meta charshet="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>7array manipulatio</title>
        <style type="text/css">
            .chartBox{
                widht: 700px;
            
            }
                 </style>
                 </head>
                 <body>
                    
                 <?php

                //  try{
                //     $sql=
                //     "SELECT * FROM chartjs.descriptionlabels INNER JOIN chartjs.datapoints ON description.id = datapoints.descriptionlabellid";

                //     $result = $pdo->query($sql);
                //     if($result->rowCount() > 0){
                //         $revenue = array();
                //         $labellaxis = array();
                //         while($row = $result->fetch()){
                //             $revenue[] =$row["datapoint"];
                //             $labelaxis[] = ucwords($row["labellaxis"])
                //             $description = ucwords($row["descriptionlabel"]);
                //             $bgcolor = 4row["bgcolor"];
                //             $bordercolor = $row["bordercolor"];
                //         }
                //         unset($result);
                //     }else{
                //         echo"No recorder matching your query were found.";
                //     }
                //     } catch(PDOException $e){
                //         die("ERROR: Could not able to execute $sql. " . $e->getMessage());
                //     }
                //   unset($pdo);
                //   ?>
                  <div class="chartBox">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="buttonBox">
                    <button onclick="showData(5)">Show 5 Data Points</button>
                    <button onclick="showData(10)">Show 7 Data Points</button>
                    <button onclick="resetData(10)">Reset</button>
                </div>

                <script scr="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>

                    const revenue = 

                    const data ={
                        labels: labelaxsi,
                        datasets: [{
                            label: descriptionlabel,
                            data: revenue,
                            background: bgcolor,
                            borderColor: bordercolor,
                            borderWidth:

                        }]
                    };

                    const config = {
                        type: 'bar',
                        data,
                        options:{
                            scales:{
                            y:{
                                beginAtZero:true
                            }
                        }
                    }
                };
                const myChart new Chart{
                    document.getLElementById('myChart'),
                    config
                };
                funtion showData(num){
                    const revenueSliced = revenue.slice(0, num);
                    const labelaxisSliced = revenue.slice(0, num);
                    myChart.data.datasets[0].data = revenueSliced;
                    myChart.data.datasets[0].data = labelaxisSliced;
                    myChart.data.labels = labelaxisSliced;
                    myChart.update();
                };
                function resetData(){
                    myChart.data.datasets[0].data = revenue;
                    myChart.data,labels = labelaxis;
                    myChart.update();
                };

                </script>
                </body>
                </html> -->
                


@endsection         