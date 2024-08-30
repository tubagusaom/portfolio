<link href="<?= base_url() ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />

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
                        <span>Pembayaran</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Konfirmasi</span>
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
                <?php
                if ($this->session->flashdata('result') != '') {
                    ?>
                    <div class="alert alert-<?= $this->session->flashdata('mode_alert') ?>" role="alert"><?php echo $this->session->flashdata('result'); ?></div>
                    <?php
                }
                ?>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <style type="text/css">
                        .required_span{
                            color: red;
                            font-weight: bold;
                        }
                    </style>
                    <form enctype="multipart/form-data" action="<?= $formURL; ?>" method="POST" class="form-horizontal form-bordered form-row-stripped">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3"> No. Invoice<span class="required_span">*</span></label>
                                <div class="col-md-5">
                                    <input disabled value="<?= $no_invoice ?>" class="form-control">
                                    <input type="hidden" name="id" id="id" class="form-control"  required value="<?= $id ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> Total yang harus di bayar <span class="required_span">*</span></label>
                                <div class="input-group">
                                    <?=rupiah($total_bayar);?>
                                    <input name="total_bayar" required type="hidden" class="form-control" placeholder="Jumlah Pembayaran" value="<?=$total_bayar?>">
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label col-md-3">Tanggal Bayar <span class="required_span">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="tanggal_bayar" required id="tanggal_bayar" class="form-control date date-picker" data-date-format="dd/mm/yyyy" placeholder="Tanggal Pembayaran" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Pembayaran Via <span class="required_span">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="pembayaran_via" id="pembayaran_via" class="form-control" placeholder=" Pembayaran Via (ATM, E-Banking, Kartu Kredit, dll ..." required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Deskripsi <span class="required_span">*</span></label>
                                <div class="col-md-9">
                                    <textarea name="keterangan" rows="4" class="form-control" placeholder="Keterangan Konfirmasi Pembayaran" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Bukti Pembayaran <span class="required_span">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-file"></i>
                                    </span>
                                    <input name="bukti_pembayaran" required type="file" class="form-control" placeholder="Browse File" accept="image/*" > <br>
                                    File bukti pembayaran yang diizinkan hanya gambar dengan ekstensi .jpg atau .png
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">
                                            <i class="fa fa-check"></i> Submit</button>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url() ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>