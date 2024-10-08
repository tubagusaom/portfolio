
<link href="<?= base_url() ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css">

<!--Date Picke -->
    <script src="<?= base_url() ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

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
                    <a href="<?= base_url('home'); ?>">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Sertifikasi</span>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Konfirmasi Pembayaran</span>
                </li>
            </ul>
            <div class="page-toolbar">
                <div><?= tgl_indo(date('Y-m-d')) ?>
                    <i class="icon-calendar"></i>&nbsp;
                    <span class="thin uppercase hidden-xs"></span>&nbsp;
                </div>
            </div>
        </div>

        <?php if($this->session->flashdata("pesan")<>''){?>
        <div class="alert alert-<?php echo $this->session->flashdata("class");?> alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: #fff">&times;</button>
          <h5><i class="icon fa fa-check"></i> Pemberitahuan</h5>
          <h6><?php echo $this->session->flashdata("pesan");?></h6>
        </div>
      <?php }?>

        <div class="row" style="margin-top: 10px;">
            <div class="portlet-body form">
                
                <form enctype="multipart/form-data" action="<?= base_url(); ?>administrasi_ujk/save" method="POST" class="form-horizontal form-bordered form-row-stripped">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3"> No. Invoice<span class="required_span">*</span></label>
                                <div class="col-md-9">
                                    <input disabled value="<?= $no_invoice ?>" class="form-control">
                                    <input type="hidden" name="id" id="id" class="form-control"  required value="<?= $id_asesi ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> Total yang harus di bayar <span class="required_span">*</span></label>
                                <div class="col-md-9">
                                    <input disabled value="Rp. <?=number_format($total_bayar->biaya_skema);?>" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3"> Jumlah Pembayaran <span class="required_span">*</span></label>
                                <div class="col-md-9">
                                    <input type="number" name="jumlah_pembayaran" required type="text" class="form-control" placeholder="Jumlah Pembayaran" value="<?= $asesi->jumlah_pembayaran ?>">
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label col-md-3">Tanggal Bayar <span class="required_span">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="tanggal_bayar" required id="tanggal_bayar" class="form-control tanggal" value="<?= $asesi->tanggal_bayar ?>" data-date-format="yyyy/mm/dd" placeholder="Tanggal Pembayaran" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Pembayaran Via <span class="required_span">*</span></label>
                                <div class="col-md-9">
                                    <?php echo form_dropdown('metode_pembayaran', $metode_pembayaran, $asesi->metode_pembayaran, 'id="metode_pembayaran" class="form-control"  data-options="required: true"'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Atas Nama / No Rekening <span class="required_span">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="atas_nama" id="atas_nama" class="form-control" placeholder="Atas Nama / No Rekening" value="<?= $asesi->atas_nama ?>" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Bukti Pembayaran <span class="required_span">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-file"></i>
                                    </span>
                                    <input name="bukti_pembayaran" required type="file" class="form-control" placeholder="Browse File" accept="image/*" value="<?= $asesi->bukti_pembayaran ?>" > <br>
                                    File bukti pembayaran yang diizinkan hanya gambar dengan ekstensi .jpg atau .png
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">
                                            <i class="fa fa-check"></i> Simpan</button>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

            </div>
        </div>



    </div>
</div>



        <script type="text/javascript">
            $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "yyyy-mm-dd",
                    autoclose:true
                });
            });
        </script>