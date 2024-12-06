<?php $this->load->view('landing-page/templates/head');?>
<?php $this->load->view('landing-page/templates/header');?>
<div>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('<?php echo base_url(); ?>assets/landing-page/img/hero-carousel/carousel2.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Visi dan Misi</h2>
                <ol>
                    <li><a href="<?php echo base_url('landing-page/home') ?>">Beranda</a></li>
                    <li>Visi dan Misi</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->
        <!-- ======= About Section ======= -->
        <section id="visi-misi" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row position-relative">
                    <div class="col-lg-7 about-img rounded"
                        style="background-image: url(<?php echo base_url(); ?>assets/landing-page/img/bangunan.png);">
                    </div>

                    <div class="col-lg-7 h-100">
                        <h2>&nbsp;</h2>
                        <div class="our-story">
                            <p style="text-align:justify">
                                Tujuan pondok pesantren sebagai sebuah lembaga pendidikan Islam tentu saja berkaitan
                                erat dengan tujuan pendidikan secara universal, Isalm, nasioanl,
                                institusional, kurikulum, mata pelajaran, pokok bahasan, sub pokok bahasan.
                                Adapun tujuan pondok pesantren Al-Muthohhar adalah sebagai berikut:
                            </p>
                            <div
                                class="section-header d-flex flex-column align-items-center justify-content-center mb-2 pb-4">
                                <h2>Visi</h2>
                                <h5>Menciptakan lembaga yang sesuai dengan tuntutan zaman dengan perpaduan dua sistem
                                    ajaran</h5>
                            </div>
                            <div
                                class="section-header d-flex flex-column align-items-center justify-content-center mb-2 pb-4">
                                <h2>Misi</h2>
                                <h5>Mendidik santri dengan berdisiplin dan mengembangkan potensinya</h5>
                            </div>
                            <div
                                class="section-header d-flex flex-column align-items-center justify-content-center mb-2 pb-4">
                                <h2>Tujuan</h2>
                                <h5>Menciptakan keseimbangan guna mencerdaskan kehidupan bangsa dengan pendidikan formal
                                    atau modern dan menyarikan agama Islam</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End about Section -->
    </main><!-- End #main -->
</div>
<?php $this->load->view('landing-page/templates/footer');?>