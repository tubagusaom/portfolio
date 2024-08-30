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
                    <a href="#">Home</a>
                    <i class="fa fa-circle"></i>`
                </li>
                <li>
                    <span>Form Persetujuan Asesmen</span>
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
            <?php
            if ($this->session->flashdata('result') != '') {
                ?>
                <div class="alert alert-<?= $this->session->flashdata('mode_alert') ?>" role="alert"><?php echo $this->session->flashdata('result'); ?></div>
                <?php
            }
            ?>
            <div class="table-responsive form">
                <!-- BEGIN FORM-->
                <form action="<?= base_url() . 'sertifikasi/save_persetujuan' ?>" method="POST" class="form-horizontal form-bordered form-row-stripped">

                    <div class="col-md-12">
                      <h3>FR-MAK-03 : FORMULIR PERSETUJUAN ASESMEN DAN KERAHASIAAN</h3>
                        <input name="id" value="<?= $id ?>" type="hidden" />
                      <?php $this->load->view('penilaian_asesi/mak03'); ?>
                    </div>

                    <div class="col-md-12">
                            <label class="control-label col-md-9"></label>
                            <div class="col-md-3">
                                <!-- <a href="<?= base_url()?>" class="btn btn-primary">Kembali</a> -->
                                <button type="submit"  id="submitmak03" class="btn btn-primary btn-block">Simpan hasil Persetujuan</button>
                            </div>
                      </div>


                        <!-- END FORM-->
                    </div>

                </form>

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
                <script>
					$('#submitmak03').click(function() {
						$( "#target" ).submit();
					});
				</script>
