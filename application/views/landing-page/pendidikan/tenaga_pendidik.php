<?php $this->load->view('landing-page/templates/head');?>
<?php $this->load->view('landing-page/templates/header');?>
<div>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('<?php echo base_url(); ?>assets/landing-page/img/hero-carousel/carousel2.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Tenaga Pendidik</h2>
                <ol>
                    <li><a href="<?php echo base_url('landing-page/home') ?>">Beranda</a></li>
                    <li>Tenaga Pendidik</li>
                </ol>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- End about Section -->
        <!-- ======= Program Kepesantrenan Section ======= -->
        <section id="kepesantrenan" class="kepesantrenan section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Tenaga Pendidik</h2>
                    <p>Berikut susunan tenaga pendidik Pondok Pesantren Al-Muthohhar</p>
                </div>
                <div class="row">
                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow p-3">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td colspan="2">Larry the Bird</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End kepesantrenan Section -->
    </main><!-- End #main -->
</div>
<?php $this->load->view('landing-page/templates/footer');?>