<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Sistem Sertifikasi Online LSP MSDMI</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="LSP MSDM Indonesia" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />

        <!-- tubagus aom -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/tb.css">

        <link href="<?= base_url() ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?= base_url() ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?= base_url() ?>assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/layouts/layout/css/themes/light2.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?= base_url() ?>assets/css/global.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="<?=base_url()?>favicon.ico" />
        <script src="<?= base_url() ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    </head>
    <!-- END HEAD -->
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?= base_url() ?>">
                            <img class="img-rounded"  src="<?= base_url() . 'assets/img/logo48.png' ?>" /> </a>
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
                              <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"  title="Pemberitahuan">
                                    <i class="fa fa-weixin"></i>
                                    <span class="badge badge-default"> <?= count($query_pesan_unread) ?> </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>You have
                                            <span class="bold"><?= count($query_pesan) ?></span> Messages</h3>
                                        <a href="#">view all</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                            <?php foreach ($query_pesan as $key => $value) {
                                                ?>
                                                <li>
                                                    <a href="#">
                                                        <span class="photo">
                                                            <img src="<?= base_url() ?>assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                        <span class="subject">
                                                            <span class="from"> Administrator </span>
                                                            <span class="time">Just Now </span>
                                                        </span>
                                                        <span class="message"> <?= $value->title ?> </span>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <?php
                                    //dump($this->auth->get_user_data());die();
                                    $foto = ($this->auth->get_user_data()->foto_profil != "") ? $this->auth->get_user_data()->foto_profil : 'logo49.png';
                                    ?>
                                    <img alt="" class="img-circle" src="<?=base_url()?>repo/profil/<?= $foto ?>" />
                                    <span class="username username-hide-on-mobile"> <?= $this->auth->get_user_data()->akun ?> </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user"></i> Biodata </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-calendar"></i> Jadwal Uji </a>
                                    </li>

                                    <li class="divider"> </li>
                                    <li>
                                        <a href="<?= base_url() . 'users/logout' ?>">
                                            <i class="fa fa-power-off"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url() . 'users/logout' ?>" class="dropdown-toggle" title="Log Out">
                                    <i class="fa fa-power-off"></i>
                                </a>
                            </li>
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <div class="clearfix"> </div>

            <div class="page-container">
                <div class="page-sidebar-wrapper">
                   <div class="page-sidebar navbar-collapse collapse">
                        <?php $this->load->view('templates/responsive/menu'); ?>
                    </div>
                </div>
