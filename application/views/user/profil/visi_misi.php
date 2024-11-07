<?php $this->load->view('user/templates/head');?>
<?php $this->load->view('user/templates/header');?>
<div>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('<?php echo base_url(); ?>assets/img/hero-carousel/carousel1.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Profil Pengasuh</h2>
                <ol>
                    <li><a href="<?php echo base_url('user/home') ?>">Home</a></li>
                    <li>Visi dan Misi</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->
    </main><!-- End #main -->
</div>
<?php $this->load->view('user/templates/footer');?>