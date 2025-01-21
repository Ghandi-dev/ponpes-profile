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
                            <h5 class="card-title">Formulir</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h5 class="card-title">Data Siswa</h5> -->

                            <!-- Bordered Tabs Justified -->
                            <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                                <li class="nav-item flex-fill" role="presentation">
                                    <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#bordered-justified-home" type="button" role="tab"
                                        aria-controls="home" aria-selected="true">Data Siswa</button>
                                </li>
                                <li class="nav-item flex-fill" role="presentation">
                                    <button class="nav-link w-100" id="alamat-tab" data-bs-toggle="tab"
                                        data-bs-target="#bordered-justified-alamat" type="button" role="tab"
                                        aria-controls="profile" aria-selected="false">Alamat</button>
                                </li>
                                <li class="nav-item flex-fill" role="presentation">
                                    <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#bordered-justified-profile" type="button" role="tab"
                                        aria-controls="profile" aria-selected="false">Berkas</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                                <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <form
                                        action="<?php echo base_url('admin/siswa/update_data_siswa') . "/" . $siswa->id; ?>"
                                        method="post">
                                        <h5 class="card-title mb-0 pb-0">Data Pribadi Siswa</h5>
                                        <hr>
                                        <?php $this->load->view('admin/siswa/layout/form_data_siswa'); ?>
                                        <h5 class="card-title mb-0 pb-0">Data Orang Tua Siswa</h5>
                                        <hr>
                                        <?php $this->load->view('admin/siswa/layout/form_data_ayah'); ?>
                                        <!-- <hr>
                                        <?php// $this->load->view('admin/siswa/layout/form_data_ibu');?> -->
                                        <div class="row d-flex justify-content-start mt-3">
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-primary w-100">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="bordered-justified-alamat" role="tabpanel"
                                    aria-labelledby="alamat-tab">
                                    <form
                                        action="<?php echo base_url('admin/siswa/update_alamat_siswa') . "/" . $siswa->id; ?>"
                                        method="post">
                                        <h5 class="card-title mb-0 pb-0">Data Alamat Siswa</h5>
                                        <hr>
                                        <?php $this->load->view('admin/siswa/layout/form_data_alamat'); ?>
                                        <div class="row d-flex justify-content-start mt-3">
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-primary w-100">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                    <form
                                        action="<?php echo base_url('admin/siswa/update_berkas_siswa') . "/" . $siswa->id; ?>"
                                        method="post" enctype="multipart/form-data">
                                        <h5 class="card-title mb-0 pb-0">Data Berkas Siswa</h5>
                                        <hr>
                                        <?php $this->load->view('admin/siswa/layout/form_data_berkas'); ?>
                                        <div class="row d-flex justify-content-start mt-3">
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-primary w-100">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- End Bordered Tabs Justified -->

                        </div>
                    </div>
                </div>
        </section>
    </main>
    <?php $this->load->view('templates/script'); ?>
    <script>
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
        <?php endif; ?>
    });
    </script>

    <script>
    $(document).ready(function() {
        // ID yang sudah tersimpan di database
        let provinsiSelected = "<?php echo $alamat->provinsi ?? ''?>";
        let kabupatenSelected = "<?php echo $alamat->kabupaten ?? ''?>";
        let kecamatanSelected = "<?php echo $alamat->kecamatan ?? ''?>";
        let desaSelected = "<?php echo $alamat->desa ?? ''?>";

        // Muat daftar provinsi dan tetapkan opsi yang sesuai
        $.ajax({
            url: "<?php echo base_url('admin/siswa/get_provinces');?>",
            type: "GET",
            dataType: "json",
            success: function(response) {
                let options = '<option value="">--Pilih Provinsi--</option>';
                response.forEach(function(provinsi) {
                    options +=
                        `<option value="${provinsi.id}" ${provinsi.id == provinsiSelected ? 'selected' : ''}>${provinsi.name}</option>`;
                });
                $('#provinsi').html(options).trigger('change');
            },
            error: function() {
                console.log("Gagal memuat daftar provinsi.");
            }
        });

        // Muat kabupaten berdasarkan provinsi
        $('#provinsi').on('change', function() {
            let id_provinsi = $(this).val();
            $('#kabupaten').html('<option value="">Loading...</option>').prop('disabled', true);

            if (id_provinsi) {
                $.ajax({
                    url: `<?php echo base_url('admin/siswa/get_regencies');?>/${id_provinsi}`,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        let options = '<option value="">--Pilih Kabupaten--</option>';
                        response.forEach(function(kabupaten) {
                            options +=
                                `<option value="${kabupaten.id}" ${kabupaten.id == kabupatenSelected ? 'selected' : ''}>${kabupaten.name}</option>`;
                        });
                        $('#kabupaten').html(options).prop('disabled', false).trigger(
                            'change');
                    },
                    error: function() {
                        console.log("Gagal memuat daftar kabupaten.");
                    }
                });
            }
        });

        // Muat kecamatan berdasarkan kabupaten
        $('#kabupaten').on('change', function() {
            let id_kabupaten = $(this).val();
            $('#kecamatan').html('<option value="">Loading...</option>').prop('disabled', true);

            if (id_kabupaten) {
                $.ajax({
                    url: `<?php echo base_url('admin/siswa/get_districts');?>/${id_kabupaten}`,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        let options = '<option value="">--Pilih Kecamatan--</option>';
                        response.forEach(function(kecamatan) {
                            options +=
                                `<option value="${kecamatan.id}" ${kecamatan.id == kecamatanSelected ? 'selected' : ''}>${kecamatan.name}</option>`;
                        });
                        $('#kecamatan').html(options).prop('disabled', false).trigger(
                            'change');
                    },
                    error: function() {
                        console.log("Gagal memuat daftar kecamatan.");
                    }
                });
            }
        });

        // Muat desa berdasarkan kecamatan
        $('#kecamatan').on('change', function() {
            let id_kecamatan = $(this).val();
            $('#desa').html('<option value="">Loading...</option>').prop('disabled', true);

            if (id_kecamatan) {
                $.ajax({
                    url: `<?php echo base_url('admin/siswa/get_villages');?>/${id_kecamatan}`,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        let options = '<option value="">--Pilih Desa--</option>';
                        response.forEach(function(desa) {
                            options +=
                                `<option value="${desa.id}" ${desa.id == desaSelected ? 'selected' : ''}>${desa.name}</option>`;
                        });
                        $('#desa').html(options).prop('disabled', false);
                    },
                    error: function() {
                        console.log("Gagal memuat daftar desa.");
                    }
                });
            }
        });
    });

    $(document).ready(function() {
        // Preview untuk Kartu Keluarga
        $('#kartu_keluarga').change(function(e) {
            previewImage(e, '#preview_image_kartu_keluarga');
        });

        // Preview untuk Akta Kelahiran
        $('#akta_kelahiran').change(function(e) {
            previewImage(e, '#preview_image_akta_kelahiran');
        });

        // Preview untuk Ijazah
        $('#ijazah').change(function(e) {
            previewImage(e, '#preview_image_ijazah');
        });

        // Fungsi umum untuk preview image
        function previewImage(event, previewElementId) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $(previewElementId).attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });
    </script>

</body>

</html>