<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/head');?>
    <style>
    .disabled-link {
        pointer-events: none;
        color: black;
    }
    </style>
</head>

<body>
    <?php $this->load->view('templates/header');?>
    <?php $this->load->view('templates/sidebar_client');?>
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
                <div class="col-lg-6">
                    <!-- Penjelasan Alur Pendaftaran -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Penjelasan Alur Pendaftaran</h5>
                            <ol>
                                <li><strong>Membuat Akun:</strong> Calon siswa membuat akun di sistem pendaftaran untuk
                                    melanjutkan proses.</li>
                                <li><strong>Pembayaran Uang Pendaftaran:</strong> Setelah akun dibuat, calon siswa
                                    diharuskan melakukan pembayaran pendaftaran melalui halaman pembayaran.</li>
                                <li><strong>Mengisi Form Data Siswa:</strong> Calon siswa melengkapi data pribadi dan
                                    informasi lainnya melalui formulir yang disediakan.</li>
                                <li><strong>Daftar Ulang:</strong> Setelah semua data terisi, calon siswa harus
                                    mencetak kartu pendaftaran kemudian datang ke ponpes Al-Muthohhar untuk daftar
                                    ulang.</li>
                                <li><strong>Selesai:</strong> Proses pendaftaran selesai. Calon siswa siap untuk tahapan
                                    selanjutnya.</li>
                            </ol>
                        </div>
                    </div><!-- End Penjelasan Alur Pendaftaran -->
                </div>
                <div class="col-lg-6">
                    <!-- Recent Activity -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Timeline Pendaftaran</h5>
                            <div class="activity">
                                <div class="activity-item d-flex">
                                    <div class="activite-label">1</div>
                                    <i class='<?=in_array($pendaftaran->status, ['D1', 'D2', 'D3', 'D4', 'D5'])
? 'bi bi-check-square-fill text-success'
: 'bi bi-check-square text-danger';?> activity-badge align-self-start'></i>
                                    <div class="activity-content">
                                        Membuat akun
                                    </div>
                                </div><!-- End activity item-->
                                <div class="activity-item d-flex">
                                    <div class="activite-label">2</div>
                                    <i class='<?=in_array($pendaftaran->status, ['D2', 'D3', 'D4', 'D5'])
? 'bi bi-check-square-fill text-success'
: 'bi bi-check-square text-danger';?> activity-badge align-self-start'></i>
                                    <div
                                        class="activity-content <?=in_array($pendaftaran->status, ['D2', 'D3', 'D4', 'D5']) ? '' : 'text-muted';?>">
                                        Membayar uang pendaftaran <span class="bi bi-arrow-right"></span> <a
                                            href="<?=base_url('client/pembayaran/');?>"
                                            class="<?=in_array($pendaftaran->status, ['D2', 'D3', 'D4', 'D5']) ? 'disabled-link' : '';?>">halaman
                                            pembayaran</a>
                                    </div>
                                </div><!-- End activity item-->
                                <div class="activity-item d-flex">
                                    <div class="activite-label">3</div>
                                    <i class='<?=in_array($pendaftaran->status, ['D3', 'D4', 'D5'])
? 'bi bi-check-square-fill text-success'
: 'bi bi-check-square text-danger';?> activity-badge align-self-start'></i>
                                    <div
                                        class="activity-content <?=in_array($pendaftaran->status, ['D3', 'D4', 'D5']) ? '' : 'text-muted';?>">
                                        Mengisi form data siswa<span class=" bi bi-arrow-right"></span> <a
                                            href="<?=base_url('client/formulir/');?>"
                                            class="<?=in_array($pendaftaran->status, ['D3', 'D4', 'D5']) ? 'disabled-link' : '';?>">halaman
                                            formulir</a>
                                    </div>
                                </div><!-- End activity item-->
                                <div class="activity-item d-flex">
                                    <div class="activite-label">4</div>
                                    <i class='<?=in_array($pendaftaran->status, ['D4', 'D5'])
? 'bi bi-check-square-fill text-success'
: 'bi bi-check-square text-danger';?> activity-badge align-self-start'></i>
                                    <div
                                        class="activity-content <?=in_array($pendaftaran->status, ['D4', 'D5']) ? '' : 'text-muted';?>">
                                        Daftar ulang<span class=" bi bi-arrow-right"></span> <a
                                            href="<?=base_url('client/cetak/');?>"
                                            class="<?=in_array($pendaftaran->status, ['D4', 'D5']) ? 'disabled-link' : '';?>">halaman
                                            cetak kartu pendaftaran</a>
                                    </div>
                                </div><!-- End activity item-->
                                <div class="activity-item d-flex">
                                    <div class="activite-label">5</div>
                                    <i class='<?=in_array($pendaftaran->status, ['D5'])
? 'bi bi-check-square-fill text-success'
: 'bi bi-check-square text-danger';?> activity-badge align-self-start'></i>
                                    <div class="activity-content text-muted">
                                        Selesai
                                    </div>
                                </div><!-- End activity item-->
                            </div>
                        </div>
                    </div><!-- End Recent Activity -->
                </div>
            </div>
        </section>
    </main>
    <?php $this->load->view('templates/script');?>
</body>

</html>