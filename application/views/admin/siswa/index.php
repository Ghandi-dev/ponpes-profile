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
                            <h5 class="card-title">Kelola Siswa</h5>
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
                            <h5 class="card-title">Data Siswa</h5>
                            <div class="table-responsive">
                                <!-- Tambahkan div ini -->
                                <table class="table datatable table-bordered table-striped">
                                    <thead>
                                        <tr class="align-middle text-center">
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Siswa</th>
                                            <th scope="col">Tempat Lahir</th>
                                            <th scope="col">Tanggal Lahir</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
foreach ($siswa as $row): ?>
                                        <tr class="align-middle text-center">
                                            <th scope="row"><?=$no;?></th>
                                            <td><?=$row->nama;?></td>
                                            <td><?=$row->tempat_lahir;?></td>
                                            <td><?=date('d F Y', strtotime($row->tanggal_lahir))?></td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="<?=base_url('admin/siswa/edit/' . $row->id)?>"
                                                        class="btn btn-sm btn-success text-white fst-italic">Edit
                                                    </a>
                                                    <div class="btn btn-sm btn-danger text-white fst-italic delete"
                                                        data-id="<?=$row->id_user?>">Hapus
                                                        <span class="bi bi-cross"></span>
                                                    </div>
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

    $('.delete').on('click', function(e) {
        e.preventDefault();
        let id = $(this).data('id');

        Swal.fire({
            title: "Anda yakin?",
            text: "Apakah anda yakin menghapus data ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus data ini!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `<?php echo site_url('admin/siswa/delete/'); ?>${id}`,
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Data Berhasil dihapus',
                            icon: 'success'
                        }).then(() => {
                            // Optionally reload or update the page content
                            location.reload();
                        });
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error!',
                            text: 'There was an issue deleting the item.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });
    </script>
</body>

</html>