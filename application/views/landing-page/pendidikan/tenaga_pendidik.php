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
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
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
                                        <td>KH. Sholeh Rafeie BA</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>KH. Muhyidin Murtadho</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>KH. Ahmad Thoha Bakri S.Hi M.Pd</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>KH. Ahmad Sayuti M.Pd</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Muhammad Hilman Marzuki</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>Ustad Wawan Kustiwan</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td>Ustad Fuad Hasan</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td>Muhammad Hamdan</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td>Ustad Elvin Alkabrie S.Pd</td>
                                    </tr>
                                </tbody>
                            </table>

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