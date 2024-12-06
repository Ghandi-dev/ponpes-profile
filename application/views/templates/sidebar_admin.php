<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?php echo $title != 'Dashboard' ? 'collapsed' : '' ?>"
                href="<?php echo base_url('admin/dashboard') ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Menu</li>

        <li class="nav-item">
            <a class="nav-link <?php echo $title != 'Kelola Pembayaran' ? 'collapsed' : '' ?>"
                href=" <?php echo base_url('admin/pembayaran') ?>">
                <i class="bi bi-cash"></i>
                <span>Kelola Pembayaran</span>
            </a>
        </li><!-- End Kelola Pembayaran Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo $title != 'Validasi Pendaftaran' ? 'collapsed' : '' ?>"
                href=" <?php echo base_url('admin/pendaftaran') ?>">
                <i class="bi bi-clipboard-check-fill"></i>
                <span>Validasi Pendaftaran</span>
            </a>
        </li><!-- End Validasi Pendaftaran Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo in_array($title, array('Kelola Siswa', 'Tambah Siswa', 'Edit Siswa')) ? '' : 'collapsed' ?>"
                href=" <?php echo base_url('admin/siswa') ?>">
                <i class="bi bi-people-fill"></i>
                <span>Kelola Siswa</span>
            </a>
        </li><!-- End Kelola Siswa Nav -->

    </ul>

</aside><!-- End Sidebar-->