<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 30px">
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
    <li class="nav-item start <?= $this->uri->segment(1) == 'biodata' ? 'active' : '' ?>">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-user"></i>
            <span class="title">Biodata</span>
            <span class="arrow <?= $this->uri->segment(1) == 'biodata' ? 'open' : '' ?>"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item <?= $this->uri->segment(1) == 'biodata' && $this->uri->segment(2) == 'index' ? 'active' : '' ?>">
                <a href="<?= base_url() . 'biodata/index' ?>" class="nav-link ">
                    <span class="title">Biodata Mempelai</span>
                </a>
            </li>
            <li class="nav-item <?= $this->uri->segment(1) == 'biodata' && $this->uri->segment(2) == 'family_pria' ? 'active' : '' ?>">
                <a href="<?= base_url() . 'biodata/family_pria' ?>" class="nav-link ">
                    <span class="title">Keluarga Mempelai Pria</span>
                </a>
            </li>
            <li class="nav-item <?= $this->uri->segment(1) == 'biodata' && $this->uri->segment(2) == 'family_perempuan' ? 'active' : '' ?>">
                <a href="<?= base_url() . 'biodata/family_perempuan' ?>" class="nav-link ">
                    <span class="title">Keluarga Mempelai Perempuan</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item <?= $this->uri->segment(1) == 'bukti_pendukung' ? 'active' : '' ?> ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-docs"></i>
            <span class="title">Dokumentasi</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">

          <li class="nav-item <?= $this->uri->segment(1) == 'bukti_pendukung' && $this->uri->segment(2) == 'upload' ? 'active' : '' ?>">
              <a href="<?= base_url() . 'bukti_pendukung/upload' ?>" class="nav-link ">
                  <span class="title">Acara</span>
              </a>
          </li>

            <li class="nav-item <?= $this->uri->segment(1) == 'bukti_pendukung' && $this->uri->segment(2) == 'upload' ? 'active' : '' ?>">
                <a href="<?= base_url() . 'bukti_pendukung/upload' ?>" class="nav-link ">
                    <span class="title">Upload Foto</span>
                </a>
            </li>
            <li class="nav-item  <?= $this->uri->segment(1) == 'bukti_pendukung' && $this->uri->segment(2) == 'index' ? 'active' : '' ?>">
                <a href="<?= base_url() . 'bukti_pendukung/index' ?>" class="nav-link ">
                    <span class="title">Arsip Foto</span>
                </a>
            </li>
        </ul>
    </li>
</ul>
