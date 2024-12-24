<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/head');?>
    <style>
    /* Tambahkan CSS untuk membuat tabel scrollable */
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        /* Untuk memperhalus scroll di iOS */
    }
    </style>
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
                            <h5 class="card-title">Kelola Pembayaran</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Pembayaran</h5>
                            <div class="table-responsive">
                                <!-- Tambahkan div ini -->
                                <table class="table datatable table-striped table-bordered">
                                    <thead>
                                        <tr class="align-middle text-center">
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Siswa</th>
                                            <th scope="col">Tanggal Pembayaran</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Bukti</th>
                                            <th scope="col">Status Pembayaran</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$no = 1;
foreach ($pembayaran as $row): ?>
                                        <tr class="align-middle text-center">
                                            <th scope="row"><?=$no?></th>
                                            <td><?=$row->nama?></td>
                                            <td><?=$row->tanggal_pembayaran?></td>
                                            <td>Rp. <?=$row->jumlah?></td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-info text-white fst-italic"
                                                    data-bs-toggle="modal" data-bs-target="#modal"
                                                    data-image="<?=base_url('assets/upload/bukti-pembayaran/' . $row->bukti_pembayaran)?>">
                                                    bukti pembayaran | <span class="bi bi-eye"></span>
                                                </button>
                                            </td>
                                            <td class="status-pembayaran"><?=$row->status_pembayaran?></td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="<?=base_url('admin/pembayaran/validasi/ok/' . $row->id . '/' . $row->id_siswa)?>"
                                                        class="btn btn-sm btn-success text-white fst-italic">Validasi
                                                        <span class="bi bi-check"></span>
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm btn-danger text-white fst-italic btn-tolak"
                                                        data-id="<?=$row->id;?>" data-id-siswa="<?=$row->id_siswa;?>">
                                                        Tolak X <span class="bi bi-cross"></span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $no++;endforeach;?>
                                    </tbody>
                                </table>
                            </div> <!-- Tutup div table-responsive -->
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Modal Bukti Pembayaran -->
    <div class="modal fade" id="modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bukti Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <img id="modal-image" src="" class="img-fluid" alt="Bukti Pembayaran">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Penolakan -->
    <div class="modal fade" id="modalTolak" tabindex="-1" role="dialog" aria-labelledby="modalTolakLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTolakLabel">Catatan Penolakan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formTolak">
                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="3"
                                placeholder="Masukkan alasan penolakan"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="submitTolak">Tolak</button>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('templates/script');?>
    <script>
    // Gunakan querySelectorAll jika fungsi `select` tidak ada
    const datatables = document.querySelectorAll('.datatable');

    $(document).ready(function() {
        $('.datatable').DataTable({
            "bLengthChange": false,
            'language': {
                'info': "Menampilkan _START_ sampai _END_ dari total _TOTAL_ data"
            },
        });
    });

    $(document).ready(function() {
        // Saat tombol bukti pembayaran diklik
        $('[data-bs-toggle="modal"]').on('click', function() {
            // Ambil data gambar dari atribut data-image
            var imageSrc = $(this).data('image');

            // Set gambar di dalam modal
            $('#modal-image').attr('src', imageSrc);
        });

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
    });

    $(document).ready(function() {
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
    <!-- Modal Penolakan -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        let tolakButton = document.querySelectorAll('.btn-tolak');
        let modalTolak = new bootstrap.Modal(document.getElementById('modalTolak'));
        let submitTolak = document.getElementById('submitTolak');
        let catatanInput = document.getElementById('catatan');

        let tolakUrl = "";

        // Event listener untuk membuka modal
        tolakButton.forEach(button => {
            button.addEventListener('click', function() {
                let id = this.getAttribute('data-id');
                let idSiswa = this.getAttribute('data-id-siswa');
                tolakUrl =
                    `<?=base_url('admin/pembayaran/validasi/tolak/')?>${id}/${idSiswa}`;
                modalTolak.show();
            });
        });

        // Event listener untuk tombol submit
        submitTolak.addEventListener('click', function() {
            let catatan = catatanInput.value.trim();
            if (!catatan) {
                alert('Harap masukkan catatan alasan penolakan.');
                return;
            }

            // Redirect ke URL dengan catatan
            window.location.href = `${tolakUrl}?catatan=${encodeURIComponent(catatan)}`;
        });
    });
    </script>

</body>

</html>