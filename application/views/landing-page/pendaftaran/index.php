<?php $this->load->view('landing-page/templates/head');?>
<?php $this->load->view('landing-page/templates/header');?>
<div>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('<?php echo base_url(); ?>assets/landing-page/img/hero-carousel/carousel2.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Pendaftaran</h2>
                <ol>
                    <li><a href="<?php echo base_url('landing-page/home') ?>">Beranda</a></li>
                    <li>Pendaftaran</li>
                </ol>
            </div>
        </div><!-- End Breadcrumbs -->
        <section id="about" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Form Pendaftaran</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                        <form action="<?php echo base_url('auth/register'); ?>" method="post" role="form"
                            class="php-email-form">
                            <div class="row gy-4">
                                <div class="col-lg-6 form-group">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" id="nama"
                                        placeholder="Nama Lengkap Anda" required>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="no_hp" class="form-label">Nomor HP</label>
                                    <input type="tel" class="form-control" name="no_hp" id="no_hp"
                                        placeholder="Nomor HP Anda" pattern="^08[0-9]{8,11}$"
                                        title="Nomor HP harus diawali dengan 08 dan memiliki 10-13 digit angka"
                                        required>
                                </div>
                            </div>
                            <div class="row gy-4">
                                <div class="col-lg-6 form-group">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                                        placeholder="Tempat Lahir Anda" required>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                        required>
                                </div>
                            </div>
                            <div class="row gy-4">
                                <div class="col-lg-6 form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Email Anda" required>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required
                                        pattern=".{6,}" title="Password harus terdiri dari minimal 6 karakter">
                                </div>
                            </div>
                            <div class="text-center"><button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End about Section -->
    </main><!-- End #main -->
</div>
<?php $this->load->view('landing-page/templates/footer');?>