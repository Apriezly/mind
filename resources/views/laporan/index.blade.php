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
                        <!-- Tambahkan Bootstrap CSS -->
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                        <!-- Tambahkan jsPDF dan autoTable -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
                        <style>
                            .btn-primary.dropdown-toggle {
                             background-color: #1CAF82 !important;
                             border: none !important;
                            }
                             table {
                             display: none; /* Sembunyikan tabel dari tampilan browser */
                            }
                        </style>
                            </head>
                                <body>
                                        <!-- Dropdown untuk Mengunduh -->
                                        <div class="dropdown mb-3">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="downloadDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            Download
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="downloadDropdown">
                                                <li><a class="dropdown-item" href="#" id="downloadChartPdf">Unduh Grafik sebagai PDF</a></li>
                                                <li><a class="dropdown-item" href="#" id="downloadTablePdf">Unduh Tabel sebagai PDF</a></li>
                                            </ul>
                                        </div>

                                        <!-- Canvas untuk Chart.js -->
                                        <!-- <canvas id="myChart" width="400" height="200"></canvas> -->

                                        <!-- Tabel Data (Tersembunyi) -->
                                        <table border="1" style="width: 100%; border-collapse: collapse;">
                                            <thead>
                                                <tr>
                                                    <th>Tahun</th>
                                                    <th>Bulan</th>
                                                    <th>Jumlah Dokumen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Dokumen as $data)
                                                    <tr>
                                                        <td>{{ $data->tahun }}</td>
                                                        <td>{{ $data->bulan }}</td>
                                                        <td>{{ $data->jumlah }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Skrip untuk Mengunduh PDF -->
                                    <script>
                                        document.getElementById('downloadChartPdf').addEventListener('click', async function () {
                                            const { jsPDF } = window.jspdf; // Ambil jsPDF dari pustaka

                                            // Ambil elemen canvas dari Chart.js
                                            const canvas = document.getElementById('myChart');
                                            const canvasImage = canvas.toDataURL('image/png', 1.0); // Konversi canvas ke gambar

                                            // Buat dokumen PDF baru
                                            const pdf = new jsPDF();

                                            // Tambahkan gambar canvas ke PDF
                                            const pageWidth = pdf.internal.pageSize.getWidth();
                                            const imgWidth = pageWidth; // Gambar akan memenuhi lebar halaman
                                            const imgHeight = (canvas.height / canvas.width) * imgWidth; // Menjaga rasio aspek

                                            pdf.addImage(canvasImage, 'PNG', 0, 10, imgWidth, imgHeight);

                                            // Tambahkan teks deskripsi di PDF
                                            pdf.text('Data grafik di atas adalah hasil dari laporan Anda.', 10, imgHeight + 20);

                                            // Unduh PDF dengan nama file tertentu
                                            pdf.save('Laporan_Grafik.pdf');
                                        });

                                        document.getElementById('downloadTablePdf').addEventListener('click', function () {
                                            // Ambil elemen tabel
                                            const table = document.querySelector('table');

                                            // Buat objek jsPDF
                                            const { jsPDF } = window.jspdf;
                                            const doc = new jsPDF();

                                            // Tambahkan judul di PDF
                                            doc.setFontSize(18);
                                            doc.text('Laporan Dokumen', 10, 10);
                                            doc.setFontSize(12);
                                            doc.text(`Tanggal: ${new Date().toLocaleDateString()}`, 10, 20);

                                            // Konversi tabel ke PDF
                                            doc.autoTable({ html: table, startY: 30 });

                                            // Unduh file PDF
                                            doc.save('Laporan_Dokumen.pdf');
                                        });
                                    </script>

                                    <!-- Tambahkan Chart.js untuk menggambar grafik -->
                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                    <script>
                                        // Contoh data untuk Chart.js
                                        const ctx = document.getElementById('myChart').getContext('2d');
                                        const myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei'],
                                                datasets: [{
                                                    label: 'Jumlah Dokumen',
                                                    data: [12, 19, 3, 5, 2],
                                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                    borderColor: 'rgba(75, 192, 192, 1)',
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

                                    <!-- Tambahkan Bootstrap JS -->
                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                                </body>
                                </html>


@endsection         