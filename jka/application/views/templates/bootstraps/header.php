<!DOCTYPE html>
<html lang="en"> 

<head>

    <title><?= $aplikasi->nama_unit ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?= base_url() ?>assets/img/logo.png">

    <!-- Mobile Metas -->
    <!-- <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"> -->
    <!-- <meta name="viewport" content="width=device-width" /> -->
    <meta content="width=device-width, initial-scale=1" name="viewport" />


    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="Copyright" content="tera_byte" />
    <meta name="author" content="tera_byte" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta name="language" content="Indonesia" />
    <meta name="revisit-after" content="7" />
    <meta name="webcrawlers" content="all" />
    <meta name="rating" content="general" />
    <meta name="spiders" content="all" />

    <!-- Social Media Meta -->
    <meta property="place:location:latitude" content="13.062616" /> <!-- Silahkan disesuaikan -->
    <meta property="place:location:longitude" content="80.229508" /> <!-- Silahkan disesuaikan -->
    <meta property="business:contact_data:street_address" content="Jl. Intelektual" /> <!-- Silahkan disesuaikan -->
    <meta property="business:contact_data:locality" content="DKI JAKARTA" /> <!-- Silahkan disesuaikan -->
    <meta property="business:contact_data:postal_code" content="13720" /> <!-- Silahkan disesuaikan -->
    <meta property="business:contact_data:country_name" content="Indonesia" /> <!-- Silahkan disesuaikan -->
    <meta property="business:contact_data:email" content="info@it-konsultan.com" /> <!-- Silahkan disesuaikan -->
    <meta property="business:contact_data:phone_number" content="085737744383" /> <!-- Silahkan disesuaikan -->
    <meta property="business:contact_data:website" content="https://it.konsultan.com" />

    <meta property="og:type" content="article" /> <!-- Card type bisa di ganti article, website, blog dan profile -->
    <meta property="profile:first_name" content="Tera" /> <!-- Silahkan disesuaikan -->
    <meta property="profile:last_name" content="Byte" /> <!-- Silahkan disesuaikan -->
    <meta property="profile:username" content="Facebook_Username" /> <!-- Silahkan disesuaikan -->
    <meta property="og:title" content="<?= $aplikasi->nama_unit . ' | ' . $aplikasi->singkatan_unit ?>" />
    <meta property="og:description" content="<?= $aplikasi->nama_unit ?>" />
    <meta property="og:image" content="<?= base_url('favicon.ico') ?>" />
    <meta property="og:url" content="https://it.konsultan.com/" />
    <meta property="og:site_name" content="<?= $aplikasi->singkatan_unit ?>" />
    <meta property="fb:admins" content="Facebook_ID" /> <!-- Silahkan disesuaikan -->

    <meta name="twitter:card" content="summary" /> <!-- Card type jangan di ganti -->
    <meta name="twitter:site" content="<?= $aplikasi->singkatan_unit ?>" />
    <meta name="twitter:title" content="<?= $aplikasi->nama_unit . ' | ' . $aplikasi->singkatan_unit ?>" />
    <meta name="twitter:description" content="<?= $aplikasi->nama_unit ?>" />
    <meta name="twitter:creator" content="Twitter_Username" /> <!-- Silahkan disesuaikan -->
    <meta name="twitter:image:src" content="<?= base_url('favicon.ico') ?>" />
    <meta name="twitter:domain" content="https://it.konsultan.com/" />

    <meta name="description" content="<?= $aplikasi->nama_unit . ' | ' . $aplikasi->singkatan_unit ?>" />
    <meta name="keywords" content="<?= $aplikasi->nama_unit ?>, <?= $aplikasi->singkatan_unit ?>" />

    <meta itemprop="name" content="<?= $aplikasi->nama_unit . ' | ' . $aplikasi->singkatan_unit ?>" />
    <meta itemprop="description" content="<?= $aplikasi->nama_unit ?>" />
    <meta itemprop="image" content="<?= base_url('favicon.ico') ?>" />

    <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstraps/font-awesome.min.css" type="text/css" />
    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/datepicker.css" type="text/css"/> -->


    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/_tera_byte/plugins/bootstrap/bootstrap.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/_tera_byte/plugins/slick/slick.css">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/_tera_byte/plugins/themify-icons/themify-icons.css">
    <!-- animation css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/_tera_byte/plugins/animate/animate.css">
    <!-- aos -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/_tera_byte/plugins/aos/aos.css">
    <!-- venobox popup -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/_tera_byte/plugins/venobox/venobox.css">

    <!-- Main Stylesheet -->
    <link href="<?php echo base_url() ?>assets/_tera_byte/css/style.css" rel="stylesheet">

    <script type="text/javascript">
        var base_url = "<?php echo base_url() ?>";
    </script>

    <script src="<?php echo base_url() ?>assets/js/jquery.v2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstraps/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstraps/bootbox.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/public/bootstrap-datepicker.js" type="text/javascript"></script>

</head>

<body>

    <!-- preloader start -->
    <div class="preloader">
        <img src="<?php echo base_url() ?>assets/_tera_byte/images/book-gif.gif" alt="preloader">
    </div>
    <!-- preloader end -->

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rounded-0 border-0 p-4">
                <div class="modal-header border-0">
                    <h3>Masuk</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" class="row">
                        <div class="col-12">
                            <!-- <input type="text" class="form-control mb-3" id="loginPhone" name="loginPhone" placeholder="Phone"> -->
                            <input type="text" placeholder="Username" class="form-control mb-3 login-control" aria-describedby="basic-addon1" name="inputUsername" id="inputUsername">
                        </div>
                        <div class="col-12">
                            <!-- <input type="password" class="form-control mb-3" id="loginPassword" name="loginPassword" placeholder="Password"> -->
                            <input type="password" placeholder="Password" class="form-control mb-3 login-control" aria-describedby="basic-addon2" name="inputPassword" id="inputPassword" onkeypress="if (event.keyCode == 13) login_click();">
                        </div>
                        <div class="col-12">
                            <!-- <button type="button" class="btn btn-primary" id="btn-login">LOGIN</button> -->
                            <button type="button" class="btn btn-primary disabled" id="btn-login">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->

    <?= $this->load->view('templates/bootstraps/menu'); ?>

    <script>
        //alert('ok'); 
        // function login_click() {
        //         $('#btn-login').click();
        // }
    </script>