<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?php echo $title != 'Dashboard' ? 'collapsed' : '' ?>"
                href="<?php echo base_url('client/dashboard') ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Menu</li>

        <li class="nav-item">
            <a class="nav-link <?php echo $title != 'Pembayaran' ? 'collapsed' : '' ?>"
                href=" <?php echo base_url('client/pembayaran') ?>">
                <i class="bi bi-cash"></i>
                <span>Pembayaran</span>
            </a>
        </li><!-- End Kelola Pembayaran Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo $title != 'Formulir' ? 'collapsed' : '' ?>"
                href="<?php echo base_url('client/formulir') ?>">
                <i class="bi bi-file-earmark-person-fill"></i>
                <span>Formulir</span>
            </a>
        </li><!-- End Validasi Pendaftaran Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo $title != 'Cetak Formulir' ? 'collapsed' : '' ?>"
                href=" <?php echo base_url('client/cetak') ?>">
                <i class="bi bi-card-heading"></i>
                <span>Cetak Kartu Pendaftaran</span>
            </a>
        </li><!-- End Kelola Siswa Nav -->

    </ul>

</aside><!-- End Sidebar-->