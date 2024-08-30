<link href="<?= base_url() ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />

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
                    <a href="<?= base_url() ?>">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Kontak</span>
                    <i class="fa fa-circle"></i>
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
            <div class="portlet-body form">
                <section class="generic-heading-3">
                    <div class="container">
                        <?php
                        if ($this->session->flashdata('result') != '') {
                            ?>

                            <div class="alert alert-<?= $this->session->flashdata('mode_alert') ?>" role="alert" id="Div-Alert">
                                <button class="close" onclick="hide('Div-Alert')">×</button>
                                <h4 class="alert-heading"><u>Terimakasih</u></h4>
                                <?php echo $this->session->flashdata('result'); ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </section>
                <!--Contact Page Start-->
                <section class="contact-page">
                    <div class="contact-map">
                        <div class="col-md-12">
                            <iframe src="https://www.google.com/maps/embed?pb=" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>

                        </div>
                    </div>

                    <div class="container">

                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="mb-sm mt-sm"><strong>Contact</strong> Us</h2>
                                <form id="contactForm" action="<?php echo base_url('kontak/save') ?>" method="POST">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label>Your name *</label>
                                                <input type="text" name="nama_kontak" id="nama_kontak" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Your email address *</label>
                                                <input type="email" name="email_kontak" id="email_kontak" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Subject</label>
                                                <input type="text" name="subject_kontak" id="subject_kontak" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Message *</label>
                                                <textarea name="message_kontak" id="message_kontak" maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input id="btn-message" type="submit" value="Send Message" class="btn btn-primary btn-lg mb-xlg" data-loading-text="Loading...">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6" style="margin-top: 15px;">

                                <h4 class="heading-primary">Alamat <strong><?= $aplikasi->singkatan_unit ?></strong></h4>
                                <ul class="list list-icons list-icons-style-3 mt-xlg">
                                    <li><i class="fa fa-map-marker"></i> <strong>Alamat :</strong> &nbsp;<?= $aplikasi->alamat ?></li>
                                    <li><i class="fa fa-phone"></i> <strong>Phone :</strong>&nbsp;<?= $aplikasi->no_telpon ?> </li>
                                    <li><i class="fa fa-fax"></i> <strong>Fax :</strong>&nbsp;<?= $aplikasi->no_fax ?> </li>
                                    <li><i class="fa fa-envelope"></i> <strong>Email :</strong> <a href="mailto:mail@example.com">&nbsp;<?= $aplikasi->alamat_email ?></a></li>
                                    <li><i class="fa fa-globe"></i> <strong>Url Aplikasi :</strong><a href="http://asahi.or.id" target="_blank">&nbsp;<?= $aplikasi->url_aplikasi ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </section>

                </div>
               </div>
              </div>
             </div>


                <script src="<?= base_url() ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
                <script src="<?= base_url() ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
                <script src="<?= base_url() ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
                <script src="<?= base_url() ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
                <!-- END CORE PLUGINS -->
                <!-- BEGIN PAGE LEVEL PLUGINS -->
                <script src="<?= base_url() ?>assets/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>
                <script src="<?= base_url() ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
                <!-- END PAGE LEVEL PLUGINS -->
                <!-- BEGIN THEME GLOBAL SCRIPTS -->
                <script src="<?= base_url() ?>assets/global/scripts/app.min.js" type="text/javascript"></script>

                <script src="<?= base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
