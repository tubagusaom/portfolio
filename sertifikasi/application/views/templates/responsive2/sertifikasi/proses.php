<link href="<?= base_url() ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="index.html">
                        <img src="<?= base_url() . 'assets/img/logo49.png' ?>" /> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after "dropdown-extended" to change the dropdown styte -->
                        <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                        <!-- BEGIN INBOX DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-envelope-open"></i>
                                <span class="badge badge-default"> 4 </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>You have
                                        <span class="bold">7 New</span> Messages</h3>
                                    <a href="app_inbox.html">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="<?= base_url() ?>assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">Just Now </span>
                                                </span>
                                                <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="<?= base_url() ?>assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">16 mins </span>
                                                </span>
                                                <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="<?= base_url() ?>assets/layouts/layout3/img/avatar1.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Bob Nilson </span>
                                                    <span class="time">2 hrs </span>
                                                </span>
                                                <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="<?= base_url() ?>assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">40 mins </span>
                                                </span>
                                                <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="<?= base_url() ?>assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">46 mins </span>
                                                </span>
                                                <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- END INBOX DROPDOWN -->
                        <!-- BEGIN TODO DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="<?= base_url() ?>assets/layouts/layout/img/avatar3_small.jpg" />
                                <span class="username username-hide-on-mobile"> Nama Asesi </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="page_user_profile_1.html">
                                        <i class="icon-user"></i> Biodata </a>
                                </li>
                                <li>
                                    <a href="app_calendar.html">
                                        <i class="icon-calendar"></i> Jadwal Uji </a>
                                </li>
                                <li>
                                    <a href="app_inbox.html">
                                        <i class="icon-envelope-open"></i> Pesan Masuk
                                        <span class="badge badge-danger"> 3 </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="app_todo.html">
                                        <i class="icon-rocket"></i> Uji Kompetensi
                                        <span class="badge badge-success"> 7 </span>
                                    </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="page_user_login_1.html">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-quick-sidebar-toggler">
                            <a href="javascript:;" class="dropdown-toggle">
                                <i class="icon-logout"></i>
                            </a>
                        </li>
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <?php $this->load->view('templates/responsive/menu'); ?>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->

                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Sertifikasi</span>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Proses Sertifikasi</span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div><?= tgl_indo(date('Y-m-d')) ?>
                                <i class="icon-calendar"></i>&nbsp;
                                <span class="thin uppercase hidden-xs"></span>&nbsp;
                            </div>
                        </div>
                    </div>


                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-12">
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Tahapan / Proses Sertifikasi</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="mt-element-step">
                                        <div class="row step-default">
                                            <div class="mt-step-desc">

                                                <div class="caption-desc font-grey-cascade">Untuk mendapatkan sertifikat kompetensi, maka peserta harus melalui beberapa  <pre class="mt-code">tahapan</pre> yang telah ditentukan. Sesuai dengan <pre class="mt-code">SOP</pre> yang berlaku di LSP</div>
                                                <br/> </div>
                                            <div class="col-md-4 bg-grey mt-step-col active">
                                                <div class="mt-step-number bg-white font-grey">1</div>
                                                <div class="mt-step-title uppercase font-grey-cascade">Registrasi</div>
                                                <div class="mt-step-content font-grey-cascade">Mengisi form permohonan menjadi peserta dengan mengisi biodata pribadi dan Portofolio</div>
                                            </div>
                                            <div class="col-md-4 bg-grey mt-step-col ">
                                                <div class="mt-step-number bg-white font-grey">2</div>
                                                <div class="mt-step-title uppercase font-grey-cascade">Asesmen Mandiri</div>
                                                <div class="mt-step-content font-grey-cascade">Peserta menyatakan  kompeten terhadap Skema yang akan diujikan berdasarkan portofolio yang telah di upload</div>
                                            </div>
                                            <div class="col-md-4 bg-grey mt-step-col ">
                                                <div class="mt-step-number bg-white font-grey">3</div>
                                                <div class="mt-step-title uppercase font-grey-cascade">Pre Asesmen</div>
                                                <div class="mt-step-content font-grey-cascade">Proses verifikasi dokumen pendaftaran oleh Asesor kompetensi atas Prinsip bukti pendukung (VATM)</div>
                                            </div>

                                        </div>
                                        <div style="height: 10px;"></div>
                                        <div class="row step-default">
                                            <div class="mt-step-desc">

                                                <div class="col-md-4 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">4</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Uji Kompetensi</div>
                                                    <div class="mt-step-content font-grey-cascade">Proses pembuktian kompetensi melalui observasi, tes lisan maupun tulisan. Asesor akan merekomendasi Kompeten/Belum Kompeten</div>
                                                </div>
                                                <div class="col-md-4 bg-grey mt-step-col ">
                                                    <div class="mt-step-number bg-white font-grey">5</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Rapat Pleno</div>
                                                    <div class="mt-step-content font-grey-cascade">Pleno akan di lakukan oleh Komite teknis dengan mengkaji dari proses uji kompetensi yang telah di lakukan dan berita acara asesmen</div>
                                                </div>
                                                <div class="col-md-4 bg-grey mt-step-col active">
                                                    <div class="mt-step-number bg-white font-grey">6</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Sertifikat</div>
                                                    <div class="mt-step-content font-grey-cascade">Setelah dinyatakan Kompeten pada tahapan rapat pleno, maka LSP akan menerbitkan sertifikat kompetensi sesuai dengan skema yang diujikan</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

