<?php $this->load->view('user/templates/head');?>
<?php $this->load->view('user/templates/header');?>
<div>
    <section id="hero" class="hero">
        <!-- hero -->
        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <img data-aos="fade-up" src="<?php echo base_url(); ?>assets/img/logo.png" alt=""
                            class="img-fluid w-70">
                        <p data-aos="fade-up" class="mt-2 text-white text-capitalize">
                            Selamat datang<br> di website resmi<br>
                            pondok pesantren<br>
                            al-muthohhar
                            purwakarta
                        </p>
                        <a data-aos="fade-up" data-aos-delay="200" href="#kata-pengantar"
                            class="btn-get-started">Jelajahi</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- carousel -->
        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-item active"
                style="background-image: url(<?php echo base_url(); ?>assets/img/hero-carousel/carousel1.jpg)">
            </div>
            <div class="carousel-item"
                style="background-image: url(<?php echo base_url(); ?>assets/img/hero-carousel/carousel2.jpg)">
            </div>
            <div class="carousel-item"
                style="background-image: url(<?php echo base_url(); ?>assets/img/hero-carousel/carousel3.jpg)">
            </div>
            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>
        </div>

    </section><!-- End Hero Section -->

    <main id="main">

        <!-- ======= Kata Pengantar Section ======= -->
        <section id="kata-pengantar" class="kata-pengantar section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>معهد التربية الإسلامية المطهر</h2>
                </div>
                <div class="row gy-5">
                    <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-item">
                            <div class="row">
                                <h3 class="card-title fw-semibold text-dark">Kata Pengantar</h3>
                                <p class="card-text fst-italic mt-2">Assalamualaikum Warahmatullahi Wabarakatuh</p>
                                <p class="card-text mt-2 fw-semibold text-justify text-dark" style="text-align:justify">
                                    Puji dan syukur kepada Allah SWT, atas berkat rahmat dan karunia-Nya kami dapat
                                    meluncurkan situs web sekolah resmi Pondok Pesantren Al-Muthohhar ini di
                                    Internet. Situs web ini bertujuan untuk memperkenalkan dan mempublikasi satuan
                                    pendidikan dengan memanfaatkan media teknologi internet, untuk jangkauan
                                    seluas-luasnya.<br><br>

                                    Melalui situs web ini, kami berharap seluruh stakeholders pesantren, orang tua
                                    santri, dan calon santri dapat mengenal/mengetahui segala informasi tentang secara
                                    lebih luas, baik informasi mengenai sekolah, informasi terbaru atau berbagai
                                    kegiatan pembelajaran di sekolah dengan cepat, efisien, dan online selama 24
                                    jam.<br><br>

                                    Akhir kata, semoga situs web ini dapat memberikan manfaat positif bagi siapa saja
                                    yang mengunjungi, terutama untuk kemajuan dan kredibilitas Pondok Pesantren
                                    Al-Muthohhar, amin, terima kasih.
                                </p>
                                <p class="card-text fst-italic mt-2">Wasalamualaikum Warahmatullahi Wabarakatuh</p>
                                <p class="card-text text-end fw-bold text-dark mt-2">Pimpinan Pondok Pesantren</p>
                                <p class="card-text text-end fw-bolder text-dark mt-2">Muhammad Rizal</p>

                            </div>
                        </div>
                    </div><!-- End Card Item -->
                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-item">
                            <div class="post-item position-relative h-100">
                                <div class="post-img position-relative overflow-hidden">
                                    <img src="<?php echo base_url(); ?>assets/img/pimpinan2.jpg"
                                        class="img-fluid rounded" alt="">
                                </div>
                            </div>
                        </div>
                    </div><!-- End Card Item -->
                </div>
            </div>
        </section><!-- End Kata Pengantar Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about ">
            <div class="container" data-aos="fade-up">

                <div class="row position-relative">

                    <div class="col-lg-7 about-img"
                        style="background-image: url(<?php echo base_url(); ?>assets/img/tentang.jpg);"></div>

                    <div class="col-lg-7">
                        <h2>Tentang Ponpes<br> Al-Muthohhar</h2>
                        <div class="our-story">
                            <p style="text-align:justify">Yayasan Pesantren Al-Muthohhar legok merupakan suatu
                                yayasan pendidikan agama islam, yang terletak di Kp.legok
                                Rt10/Rw01, Desa Palinggihan, Kecamatan Plered,
                                Kabupaten Purwakarta, Provinsi Jawa barat.
                                Yayasan pesantren Al-Muthohhar didirikan oleh
                                KH.Muhammad Thoha Rafe'i pada tahun 1912 Dengan
                                bertujuan untuk memperluas syari'at-syari'at agama Islam
                                dan mengembangkan pengetahuan ilmu agama. Hingga
                                saat ini, yayasan pesantren Al-Muthohhar masih tetap
                                berdiri tegak dan kokoh.
                                Dan di yayasan pesantren Al-Muthohhar juga terdapat
                                beberapa unit pendidikan formal antara lain;
                            <ul>
                                <li><i class="bi bi-check-circle"></i> <span>Pondok pesantren putra-putri</span></li>
                                <li><i class="bi bi-check-circle"></i> <span>Raudhatul Athfal (RA)</span></li>
                                <li><i class="bi bi-check-circle"></i> <span>Madrasah ibtidaiyah (MI)</span></li>
                                <li><i class="bi bi-check-circle"></i> <span>SMP BP</span></li>
                                <li><i class="bi bi-check-circle"></i> <span>Madrasah Aliyah (MA)</span></li>
                            </ul>

                            <div class="watch-video d-flex align-items-center position-relative">
                                <i class="bi bi-play-circle"></i>
                                <a href="https://www.youtube.com/watch?v=DnIv0xntGW0"
                                    class="glightbox stretched-link">Tonton Video</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End about Section -->

        <!-- ======= Program Kepesantrenan Section ======= -->
        <section id="kepesantrenan" class="kepesantrenan section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Program Unggulan</h2>
                </div>
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item  position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-book-quran"></i>
                            </div>
                            <h3>Tahfizul Quran</h3>
                            <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores
                                iure
                                perferendis
                                tempore et consequatur.</p>
                            <a href="service-details.html" class="readmore stretched-link">Learn more <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-book-quran"></i>
                            </div>
                            <h3>Ilmu Tafsir</h3>
                            <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum
                                hic
                                non ut
                                nesciunt dolorem.</p>
                            <a href="service-details.html" class="readmore stretched-link">Learn more <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-book-quran"></i>
                            </div>
                            <h3>Ilmu Tauhid</h3>
                            <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id
                                voluptas
                                adipisci
                                eos earum corrupti.</p>
                            <a href="service-details.html" class="readmore stretched-link">Learn more <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div><!-- End Service Item -->
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-book-quran"></i>
                            </div>
                            <h3>Ilmu Nahwu</h3>
                            <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id
                                voluptas
                                adipisci
                                eos earum corrupti.</p>
                            <a href="service-details.html" class="readmore stretched-link">Learn more <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div><!-- End Service Item -->
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-book-quran"></i>
                            </div>
                            <h3>Ilmu Shorof</h3>
                            <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id
                                voluptas
                                adipisci
                                eos earum corrupti.</p>
                            <a href="service-details.html" class="readmore stretched-link">Learn more <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div><!-- End Service Item -->
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fa-solid fa-book-quran"></i>
                            </div>
                            <h3>Ilmu Tajwid</h3>
                            <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id
                                voluptas
                                adipisci
                                eos earum corrupti.</p>
                            <a href="service-details.html" class="readmore stretched-link">Learn more <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div><!-- End Service Item -->
                </div>
            </div>
        </section><!-- End kepesantrenan Section -->
        <!-- End Recent Blog Posts Section -->
    </main><!-- End #main -->
</div>
<?php $this->load->view('user/templates/footer');?>