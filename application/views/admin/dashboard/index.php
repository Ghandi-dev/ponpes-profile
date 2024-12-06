<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/head');?>
</head>

<body>
    <?php $this->load->view('templates/header');?>
    <?php $this->load->view('templates/sidebar_admin');?>
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Dashboard</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col">
                    <div class="row">

                        <!-- Pembayaran yang harus divalidasi Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Pembayaran yang harus divalidasi</h5>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <!-- Ikon -->
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-cash"></i>
                                            </div>
                                            <!-- Angka -->
                                            <div class="ps-2">
                                                <!-- Ubah dari 'ps-3' menjadi 'ps-2' untuk jarak lebih dekat -->
                                                <h6><?=$pembayaran?></h6>
                                            </div>
                                        </div>
                                        <!-- Tombol -->
                                        <a href="<?=base_url('admin/pembayaran');?>"
                                            class="btn btn-primary d-flex align-items-center">
                                            Lihat Detail <span class="bi bi-arrow-right ms-1"></span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div><!-- End Pembayaran yang harus divalidasi Card -->

                        <!-- Daftar Ulang yang harus divalidasi Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">Daftar Ulang yang harus divalidasi</h5>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <!-- Ikon -->
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-clipboard-check-fill"></i>
                                            </div>
                                            <!-- Angka -->
                                            <div class="ps-2">
                                                <!-- Ubah dari 'ps-3' menjadi 'ps-2' untuk jarak lebih dekat -->
                                                <h6><?=$pendaftaran?></h6>
                                            </div>
                                        </div>
                                        <!-- Tombol -->
                                        <a href="<?=base_url('admin/pendaftaran');?>"
                                            class="btn btn-primary d-flex align-items-center">
                                            Lihat Detail <span class="bi bi-arrow-right ms-1"></span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div><!-- End Daftar Ulang yang harus divalidasi Card -->

                        <!-- Jumlah Siswa -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Siswa</h5>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <!-- Ikon -->
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-people"></i>
                                            </div>
                                            <!-- Angka -->
                                            <div class="ps-2">
                                                <!-- Ubah dari 'ps-3' menjadi 'ps-2' untuk jarak lebih dekat -->
                                                <h6><?=$siswa?></h6>
                                            </div>
                                        </div>
                                        <!-- Tombol -->
                                        <a href="<?=base_url('admin/siswa');?>"
                                            class="btn btn-primary d-flex align-items-center">
                                            Lihat Detail <span class="bi bi-arrow-right ms-1"></span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div><!-- End Jumlah Siswa -->

                    </div>
                </div><!-- End Left side columns -->
                <!-- Reports -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Siswa Per Tahun</span></h5>
                            <!-- Line Chart -->
                            <div id="reportsChart"></div>

                            <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                // Mengonversi data PHP ke JavaScript menggunakan json_encode
                                var jumlahSiswaPerTahun = <?php echo json_encode($jumlah_siswa_per_tahun); ?>;

                                // Menyiapkan data untuk chart
                                var tahun = [];
                                var jumlahSiswa = [];

                                // Mengisi array tahun dan jumlahSiswa dari data PHP
                                jumlahSiswaPerTahun.forEach(function(row) {
                                    tahun.push(row.tahun); // Menambahkan tahun
                                    jumlahSiswa.push(row.jumlah_siswa); // Menambahkan jumlah siswa
                                });

                                // Membuat chart ApexCharts
                                new ApexCharts(document.querySelector("#reportsChart"), {
                                    series: [{
                                        name: 'Jumlah Siswa',
                                        data: jumlahSiswa, // Data jumlah siswa
                                    }],
                                    chart: {
                                        height: 350,
                                        type: 'line', // Menggunakan line chart
                                        toolbar: {
                                            show: false
                                        },
                                    },
                                    markers: {
                                        size: 4
                                    },
                                    colors: ['#4154f1'], // Warna garis
                                    fill: {
                                        type: "gradient",
                                        gradient: {
                                            shadeIntensity: 1,
                                            opacityFrom: 0.3,
                                            opacityTo: 0.4,
                                            stops: [0, 90, 100]
                                        }
                                    },
                                    dataLabels: {
                                        enabled: false
                                    },
                                    stroke: {
                                        curve: 'smooth',
                                        width: 2
                                    },
                                    xaxis: {
                                        categories: tahun, // Data kategori tahun
                                        title: {
                                            text: 'Tahun', // Label untuk sumbu X
                                        },
                                    },
                                    yaxis: {
                                        title: {
                                            text: 'Jumlah Siswa', // Label untuk sumbu Y
                                        },
                                        min: 0, // Menentukan nilai minimum pada sumbu Y
                                        max: 240, // Menentukan nilai maksimum pada sumbu Y
                                        labels: {
                                            formatter: function(value) {
                                                return value +
                                                    ' siswa'; // Format label pada sumbu Y
                                            }
                                        },
                                        tickAmount: 6 // Menentukan jumlah tick pada sumbu Y
                                    },
                                    tooltip: {
                                        x: {
                                            format: 'yyyy' // Format tooltip untuk tahun
                                        },
                                    }
                                }).render();
                            });
                            </script>
                            <!-- End Line Chart -->

                        </div>

                    </div>
                </div><!-- End Reports -->
            </div>
        </section>
    </main>
    <?php $this->load->view('templates/script');?>
</body>

</html>