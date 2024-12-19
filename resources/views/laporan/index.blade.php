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
                                                document.addEventListener('DOMContentLoaded', function () {
                                                    const tahunSekarang = new Date().getFullYear(); // Ambil tahun sekarang
                                                    loadDataByYear(tahunSekarang); // Load data untuk tahun sekarang ketika halaman pertama kali dimuat
                                                });

                                                function loadDataByYear(tahun) {
                                                    // Kirim request ke server untuk mengambil data berdasarkan tahun
                                                    fetch(`/laporan?tahun=${tahun}`)
                                                        .then(response => response.json()) // Terima data JSON dari server
                                                        .then(data => {
                                                            updateChart(data);  // Update chart dengan data yang diterima
                                                        })
                                                        .catch(error => console.error('Error fetching data:', error));
                                                }

                                                // Ambil data dari backend
                                                const dokumen = @json($Dokumen);

                                                // Map data ke bulan
                                                const bulanLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'];

                                                // Mengelompokkan data berdasarkan tahun
                                                let tahunData = {};

                                                // Kelompokkan data berdasarkan tahun dan bulan
                                                dokumen.forEach(item => {
                                                    if (!tahunData[item.tahun]) {
                                                        tahunData[item.tahun] = Array(12).fill(0); // Inisialisasi array untuk tahun tersebut
                                                    }
                                                    tahunData[item.tahun][item.bulan - 1] = item.jumlah; // -1 karena bulan dimulai dari 0
                                                });

                                                // Membuat datasets berdasarkan tahun yang ada
                                                const datasets = Object.keys(tahunData).map(tahun => ({
                                                    label: `Tahun ${tahun}`,
                                                    data: tahunData[tahun],
                                                    backgroundColor: ['#E06196','#FAE3EC'],
                                                    borderWidth: 1
                                                }));

                                                // Inisialisasi Chart.js
                                                const ctx = document.getElementById('myChart').getContext('2d');
                                                const myChart = new Chart(ctx, {
                                                    type: 'bar', // Jenis chart bar
                                                    data: {
                                                        labels: bulanLabels, // Menampilkan label bulan
                                                        datasets: datasets // Menampilkan datasets per tahun
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
                        <button class="btn button-simpan" class="btn btn-default" id="downloadCsv">Download</button>

                        <!-- <button class="btn button-simpan" class="btn btn-default" >Download</button> -->
                        <script>
                                                    // Event listener untuk perubahan tahun
                            document.getElementById('downloadCsv').addEventListener('click', function () {
                            // Ambil data dari chart.js
                            const labels = myChart.data.labels; // Label (bulan)
                            const data = myChart.data.datasets[0].data; // Data jumlah dokumen
                            // Buat header CSV
                            let csvContent = 'Bulan,Jumlah\n';
                            // Gabungkan data label dan jumlah
                            labels.forEach((label, index) => {
                                csvContent += `${label},${data[index]}\n`;
                             });
                            // Buat blob untuk CSV
                            const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
                            // Buat URL untuk download
                            const url = URL.createObjectURL(blob);
                            const a = document.createElement('a');
                            a.href = url;
                            a.download = 'chart_data.csv'; // Nama file CSV
                            document.body.appendChild(a);
                            a.click();
                            document.body.removeChild(a);
                            });
                        </script> 
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
    <!-- <script>
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
                                    </script> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    
    <canvas id="myChart"></canvas>

    
    <script>
        function loadDataByYear() {
        // Ambil tahun yang dipilih dari dropdown
        const selectedYear = document.getElementById('tahun').value;

        // Gunakan fetch untuk mengirimkan permintaan AJAX ke server dengan tahun yang dipilih
        fetch(`/laporan?tahun=${selectedYear}`)
            .then(response => response.json())
            .then(data => {
                updateChart(data);  // Update chart dengan data yang baru
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    document.addEventListener('DOMContentLoaded', function () {
    let tahun = new Date().getFullYear(); // Ambil tahun sekarang
    let tahunMax = 2025; // Misalnya kita ingin menampilkan data dari tahun 2020 hingga 2025
    
    // Timer untuk mengubah tahun setiap 5 detik (5000 ms)
    setInterval(function () {
        loadDataByYear(tahun);  // Load data berdasarkan tahun yang dipilih
        tahun++;  // Ganti tahun
        if (tahun > tahunMax) tahun = 2020;  // Jika sudah melebihi tahunMax, kembali ke 2020
    }, 5000);  // Ganti setiap 5 detik
});


    // Ambil data dari backend
    const dokumen = @json($Dokumen);

    // Map data ke bulan
    const bulanLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'];

    // Mengelompokkan data berdasarkan tahun
    let tahunData = {};

    // Kelompokkan data berdasarkan tahun dan bulan
    dokumen.forEach(item => {
        if (!tahunData[item.tahun]) {
            tahunData[item.tahun] = Array(12).fill(0); // Inisialisasi array untuk tahun tersebut
        }
        tahunData[item.tahun][item.bulan - 1] = item.jumlah; // -1 karena bulan dimulai dari 0
    });

    // Membuat datasets berdasarkan tahun yang ada
    const datasets = Object.keys(tahunData).map(tahun => ({
        label: `Tahun ${tahun}`,
        data: tahunData[tahun],
        backgroundColor: ['#E06196','#FAE3EC'],
        borderWidth: 1
    }));

    // Inisialisasi Chart.js
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar', // Jenis chart bar
        data: {
            labels: bulanLabels, // Menampilkan label bulan
            datasets: datasets // Menampilkan datasets per tahun
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
</script> -->



           
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


                


@endsection         