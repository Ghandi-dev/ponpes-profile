<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/head');?>
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
                            <h5 class="card-title">Pembayaran</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="row pt-4">
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body p-4">
                                            <!-- Form Pembayaran -->
                                            <form
                                                action="<?php echo base_url('client/pembayaran/pembayaran_proses'); ?>"
                                                method="post" enctype="multipart/form-data">
                                                <div class="row mb-3">
                                                    <input type="hidden" class="form-control" name="id_siswa"
                                                        value="<?=$siswa->id?>">
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputText">Jumlah Pembayaran</label>
                                                    <input type="text" class="form-control" name="jumlah" required>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputText">Tanggal Pembayaran</label>
                                                    <input type="date" class="form-control" name="tanggal" required>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputNumber">Bukti
                                                        Pembayaran</label>
                                                    <input class="form-control" type="file" id="file" name="file"
                                                        require>
                                                    <input class="form-control" type="hidden" id="old_file"
                                                        name="old_file" value="<?=$pembayaran->bukti_pembayaran ?? ''?>"
                                                        require>
                                                </div>
                                                <div class="row mb-3">
                                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                                </div>

                                            </form><!-- End General Form Elements -->
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-8">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr class="align-middle text-center">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Bukti</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($pembayaran)): ?>
                                                <tr class="align-middle text-center">
                                                    <th scope="row">1</th>
                                                    <td><?=$pembayaran->tanggal_pembayaran?></td>
                                                    <td><?=$pembayaran->jumlah?></td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-sm btn-info text-white fst-italic"
                                                            data-bs-toggle="modal" data-bs-target="#modal">
                                                            bukti pembayaran | <span class="bi bi-eye"></span>
                                                        </button>
                                                    </td>
                                                    <td class="status-pembayaran"><?=$pembayaran->status_pembayaran?>
                                                    </td>
                                                </tr>
                                                <?php else: ?>
                                                <tr class="text-center">
                                                    <td colspan="5">Belum ada pembayaran</td>
                                                </tr>
                                                <?php endif;?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <p>
                                        <?=isset($pembayaran->catatan) ? '* Catatan alasan penolakan: ' . $pembayaran->catatan : '';?>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bukti Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <img src="<?=base_url('assets/upload/bukti-pembayaran/') . $pembayaran->bukti_pembayaran?>"
                        class="img-fluid" alt="Bukti Pembayaran">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('templates/script');?>
    <script>
    // Ganti nilai status sesuai dengan aturan
    $('.status-pembayaran').each(function() {
        var status = $(this).text().trim(); // Ambil nilai asli
        var statusText = ''; // Variabel untuk menyimpan teks status
        var badgeClass = ''; // Variabel untuk menyimpan kelas badge

        // Tentukan teks status dan kelas badge berdasarkan nilai status
        if (status === '2') {
            statusText = 'Ditolak';
            badgeClass = 'badge bg-danger '; // Warna merah untuk status Ditolak
        } else if (status === '1') {
            statusText = 'Menunggu Divalidasi';
            badgeClass = 'badge bg-warning text-dark'; // Warna kuning untuk Menunggu
        } else if (status === '3') {
            statusText = 'Telah Divalidasi';
            badgeClass = 'badge bg-success'; // Warna hijau untuk status Telah Divalidasi
        }

        // Ganti teks elemen dengan badge
        $(this).html('<span class="' + badgeClass + '">' + statusText + '</span>');
    });
    document.addEventListener('DOMContentLoaded', function() {
        <?php if ($this->session->flashdata('success')): ?>
        Swal.fire({
            title: 'Success!',
            text: '<?php echo $this->session->flashdata('success'); ?>',
            icon: 'success',
            confirmButtonText: 'OK'
        });
        <?php elseif ($this->session->flashdata('error')): ?>
        Swal.fire({
            title: 'Error!',
            text: '<?php echo $this->session->flashdata('error'); ?>',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        <?php endif;?>
    });
    </script>
</body>

</html>