<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="<?php echo base_url('landing-page/home') ?>" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1><span>.</span>ٱلْمُطَهَّرُ</h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="<?php echo base_url('landing-page/home') ?>"
                        class="<?php echo $title == 'home' ? 'active' : '' ?>">Beranda</a></li>
                <li class="dropdown"><a href="#"
                        class="<?php echo $title == 'profil-pengasuh' || $title == 'visi-misi' ? 'active' : '' ?>"><span>Profil</span>
                        <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="<?php echo base_url('landing-page/profil/profil_pengasuh') ?>"
                                class="<?php echo $title == 'profil-pengasuh' ? 'active' : '' ?>">Profil Pendiri Pondok
                                Pesantren</a>
                        </li>
                        <li><a href="<?php echo base_url('landing-page/profil/visi_misi') ?>"
                                class="<?php echo $title == 'visi-misi' ? 'active' : '' ?>">Visi dan Misi</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"
                        class="<?php echo $title == 'tenaga-pendidik' || $title == 'program-unggulan' ? 'active' : '' ?>"><span>Pendidikan</span>
                        <i class=" bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="<?php echo base_url('landing-page/pendidikan') ?>"
                                class="<?php echo $title == 'program-unggulan' ? 'active' : '' ?>">Program Unggulan</a>
                        </li>
                        <li><a href="<?php echo base_url('landing-page/pendidikan/tenaga_pendidik') ?>"
                                class="<?php echo $title == 'tenaga-pendidik' ? 'active' : '' ?>">Tenaga Pendidik</a>
                        </li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url('landing-page/pendaftaran') ?>"
                        class="<?php echo $title == 'pendaftaran' ? 'active' : '' ?>">Pendaftaran</a></li>
                <li><a href="<?php echo base_url('landing-page/kontak') ?>"
                        class="<?php echo $title == 'kontak' ? 'active' : '' ?>">Kontak</a></li>
                <li><a href="<?php echo base_url('auth/login') ?>">Login</a></li>
            </ul>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->