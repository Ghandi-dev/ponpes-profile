<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="<?php echo base_url('user/home') ?>" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1><span>.</span>ٱلْمُطَهَّرُ</h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="<?php echo base_url('user/home') ?>"
                        class="<?php echo $title == 'home' ? 'active' : '' ?>">Home</a></li>
                <li class="dropdown"><a href="#"
                        class="<?php echo $title == 'profil-pengasuh' || $title == 'visi-misi' ? 'active' : '' ?>"><span>Profil</span>
                        <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="<?php echo base_url('user/profil/profil_pengasuh') ?>"
                                class="<?php echo $title == 'profil-pengasuh' ? 'active' : '' ?>">Profil Pendiri dan
                                Pengasuh</a>
                        </li>
                        <li><a href="<?php echo base_url('user/profil/visi_misi') ?>"
                                class="<?php echo $title == 'visi-misi' ? 'active' : '' ?>">Visi dan Misi</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Pendidikan</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="<?php echo base_url('user/pendidikan/form') ?>">Program Unggulan</a></li>
                        <li><a href="<?php echo base_url('user/tenaga_pendidik') ?>">Tenaga Pendidik</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Galeri</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="<?php echo base_url('user/foto') ?>">Foto</a></li>
                        <li><a href="<?php echo base_url('user/video') ?>">Video</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url('user/kontak') ?>">Kontak</a></li>
            </ul>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->