<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/head'); ?>
</head>

<body>
    <?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar_admin'); ?>
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Validasi Pendaftaran</h5>
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
                            <h5 class="card-title">Data Pendaftaran</h5>
                            <div class="table-responsive">
                                <!-- Tambahkan div ini -->
                                <table class="table datatable table-bordered table-striped">
                                    <thead>
                                        <tr class="align-middle text-center">
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Siswa</th>
                                            <th scope="col">No HP</th>
                                            <!-- <th scope="col">Status Pendaftaran</th> -->
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;foreach ($siswa as $row): ?>
                                        <tr class="align-middle text-center">
                                            <th scope="row"><?php echo $no;?></th>
                                            <td><?php echo $row->nama?></td>
                                            <td><?php echo $row->no_hp?></td>

                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="<?php echo base_url('admin/pendaftaran/validasi/ok/' . $row->id)?>"
                                                        class="btn btn-sm btn-success text-white fst-italic">Validasi
                                                        <span class="bi bi-check"></span>
                                                    </a>
                                                    <a href="<?php echo base_url('admin/pendaftaran/validasi/tolak/' . $row->id)?>"
                                                        class="btn btn-sm btn-danger text-white fst-italic">Tolak X
                                                        <span class="bi bi-cross"></span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $no++;endforeach; ?>
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
    <?php $this->load->view('templates/script'); ?>
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
        <?php endif; ?>
    });
    </script>
</body>

</html>