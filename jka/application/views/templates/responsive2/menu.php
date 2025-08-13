<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <li class="sidebar-toggler-wrapper hide">
        <div class="sidebar-toggler">
            <span></span>
        </div>
    </li>
    <!-- END SIDEBAR TOGGLER BUTTON -->
    <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
   
    <li class="nav-item start <?= $this->uri->segment(1) == 'home' ? 'active' : '' ?>">
        <a href="<?= base_url() ?>" class="nav-link ">
            <i class="icon-home"></i>

            <span class="title">Beranda</span>

        </a>
    </li>
    <li class="nav-item start <?= $this->uri->segment(1) == 'profil' ? 'active' : '' ?>">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-user"></i>
            <span class="title">Profil</span>
            <span class="arrow <?= $this->uri->segment(1) == 'profil' ? 'open' : '' ?>"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item <?= $this->uri->segment(1) == 'profil' && $this->uri->segment(2) == 'index' ? 'active' : '' ?>">
                <a href="<?= base_url() . 'profil/index' ?>" class="nav-link ">
                    <span class="title">Biodata</span>

                </a>
            </li>
           
            <li class="nav-item <?= $this->uri->segment(1) == 'profil' && $this->uri->segment(2) == 'foto' ? 'active' : '' ?>">
                <a href="<?= base_url() . 'profil/foto' ?>" class="nav-link ">
                    <span class="title">Pasfoto</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item  <?= $this->uri->segment(1) == 'sertifikasi' ? 'active' : '' ?>">    <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-layers"></i>
            <span class="title">Sertifikasi</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?= base_url() . 'sertifikasi/view' ?>" class="nav-link ">
                    <span class="title">Riwayat Sertifikasi</span>
                </a>
            </li>
           
        </ul>
    </li>
    <li class="nav-item <?= $this->uri->segment(1) == 'bukti_pendukung' ? 'active' : '' ?> ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-docs"></i>
            <span class="title">Bukti Pendukung</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item <?= $this->uri->segment(1) == 'bukti_pendukung' && $this->uri->segment(2) == 'upload' ? 'active' : '' ?>">
                <a href="<?= base_url() . 'bukti_pendukung/upload' ?>" class="nav-link ">
                    <span class="title">Upload Bukti Pendukung</span>
                </a>
            </li>
            <li class="nav-item  <?= $this->uri->segment(1) == 'bukti_pendukung' && $this->uri->segment(2) == 'index' ? 'active' : '' ?>">
                <a href="<?= base_url() . 'bukti_pendukung/index' ?>" class="nav-link ">
                    <span class="title">Arsip Bukti Pendukung</span>
                </a>
            </li>
        </ul>
    </li>
    
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-notebook"></i>
            <span class="title">Bantuan</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?= base_url() . 'bantuan/kontak' ?>" class="nav-link ">
                    <span class="title">Kontak</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?= base_url() . 'knowledge_base/view' ?>" class="nav-link ">
                    <span class="title">Panduan</span>
                </a>
            </li>
        </ul>
    </li>
</ul>
