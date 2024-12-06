<footer id="footer" class="footer">

    <div class="footer-content position-relative">
        <div class="container">
        </div>
    </div>

    <div class="footer-legal text-center position-relative">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Ponpes Al-Muthohhar</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by Muhammad Rizal
            </div>
        </div>
    </div>

</footer>
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="<?php echo base_url() ?>assets/landing-page/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/landing-page/vendor/aos/aos.js"></script>
<script src="<?php echo base_url() ?>assets/landing-page/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?php echo base_url() ?>assets/landing-page/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url() ?>assets/landing-page/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/landing-page/vendor/purecounter/purecounter_vanilla.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/landing-page/vendor/php-email-form/validate.js"></script> -->
<script src="<?php echo base_url() ?>assets/admin/js/sweet-alert/sweetalert2.all.js"></script>

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
    <?php endif;?>
});
</script>

<!-- Template Main JS File -->
<script src="<?php echo base_url() ?>assets/landing-page/js/main.js"></script>

</body>

</html>