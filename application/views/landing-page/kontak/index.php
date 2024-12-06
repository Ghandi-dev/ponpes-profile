<?php $this->load->view('landing-page/templates/head');?>
<?php $this->load->view('landing-page/templates/header');?>
<div>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('<?php echo base_url(); ?>assets/landing-page/img/hero-carousel/carousel2.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Kontak</h2>
                <ol>
                    <li><a href="<?php echo base_url('landing-page/home') ?>">Beranda</a></li>
                    <li>Kontak</li>
                </ol>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">
                    <div class="col-lg-6">
                        <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-map"></i>
                            <h3>Alamat Kami</h3>
                            <p class="px-5">Kp.legok
                                Rt10/Rw01, Desa Palinggihan, Kecamatan Plered,
                                Kabupaten Purwakarta, Provinsi Jawa barat.</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center">
                            <a href="https://api.whatsapp.com/send?phone=6281381214060" target="_blank" rel="noopener">
                                <i class="bi bi-whatsapp" style="font-size: 2rem;"></i>
                            </a>
                            <h3>WhatsApp</h3>
                            <p>+62 813-8121-4060</p>
                        </div>
                    </div><!-- End Info Item -->


                </div>

                <div class="row gy-4 mt-1">

                    <div class="col">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0303080625363!2d107.3893177757693!3d-6.643158364943218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6905d158cda1fb%3A0xb1a934cac1dc5b4b!2sPondok%20Pesantren%20Al%20Muthohhar!5e0!3m2!1sid!2sid!4v1733470512416!5m2!1sid!2sid"
                            style="border:0; width: 100%; height: 384px;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div><!-- End Google Maps -->
                </div>

            </div>
        </section><!-- End Contact Section -->

        <!-- End about Section -->
    </main><!-- End #main -->
</div>
<?php $this->load->view('landing-page/templates/footer');?>