<link href="<?= base_url() ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?= base_url() ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="<?= base_url() ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="<?= base_url() ?>assets/pages/css/profile-2.min.css" rel="stylesheet" type="text/css" />

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
                    <span>Biodata</span>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Biodata Mempelai</span>
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

                <form id="form_profil" action="<?= base_url() . 'biodata/edit' ?>" method="POST" class="form-horizontal form-bordered form-row-stripped">
                    <div class="form-body">
                      <div class="form-group">
                          <label class="control-label col-md-3">Tanggal Menikah <span class="required_span">*</span></label>
                          <div class="col-md-9">
                              <input required name="tgl_wedding" value="<?= jquery_date($biodata->tgl_wedding) ?>" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />
                          </div>
                      </div>

                      <div class="page-bar form-group">
                        <label class="page-breadcrumb col-md-12">
                          <h3><b>Mempelai Pria</b></h3>
                        </label>
                      </div>

                      <div class="form-group">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="<?= base_url() . 'assets/files/asesi/' . $biodata->foto_pria ?>" alt="" /> </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                            <div>
                                <span class="btn default btn-file">
                                    <span class="fileinput-new"> Pilih Foto </span>
                                    <span class="fileinput-exists"> Change </span>
                                    <input type="file" name="foto_pria"> </span>
                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Hapus Foto </a>
                            </div>
                        </div>
                      </div>

                        <div class="form-group">
                            <label class="col-md-3">Mempelai Pria <span class="required_span">*</span></label>
                            <div class="col-md-9">
                                <input required  type="text" placeholder="Nama mempelai pria" class="form-control" name="biodata_pria" value="<?= $biodata->biodata_pria ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">No HP <span class="required_span">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </span>
                                <input name="hp_pria" value="<?= $biodata->hp_pria ?>" required type="text" class="form-control" placeholder="No HP mempelai pria"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Alamat Rumah <span class="required_span">*</span></label>
                            <div class="col-md-9">
                                <textarea required name="alamat_pria" rows="4" class="form-control"><?= $biodata->alamat_pria ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Tentang mempelai pria <span class="required_span">*</span></label>
                            <div class="col-md-9">
                                <textarea required name="desc_pria" rows="4" class="form-control"><?= $biodata->desc_pria ?></textarea>
                            </div>
                        </div>

                        <div class="page-bar form-group">
                          <label class="page-breadcrumb col-md-12">
                            <h3><b>Mempelai Perempuan</b></h3>
                          </label>
                        </div>

                        <div class="form-group">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                  <img src="<?= base_url() . 'assets/files/asesi/' . $biodata->foto_perempuan ?>" alt="" /> </div>
                              <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                              <div>
                                  <span class="btn default btn-file">
                                      <span class="fileinput-new"> Pilih Foto </span>
                                      <span class="fileinput-exists"> Change </span>
                                      <input type="file" name="foto_perempuan"> </span>
                                  <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Hapus Foto </a>
                              </div>
                          </div>
                        </div>

                          <div class="form-group">
                              <label class="col-md-3">Mempelai Perempuan <span class="required_span">*</span></label>
                              <div class="col-md-9">
                                  <input required  type="text" placeholder="Nama mempelai perempuan" class="form-control" name="biodata_perempuan" value="<?= $biodata->biodata_perempuan ?>" />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-md-3">No HP <span class="required_span">*</span></label>
                              <div class="input-group">
                                  <span class="input-group-addon">
                                      <i class="fa fa-phone"></i>
                                  </span>
                                  <input name="hp_perempuan" value="<?= $biodata->hp_perempuan ?>" required type="text" class="form-control" placeholder="No HP mempelai perempuan"> </div>
                          </div>
                          <div class="form-group">
                              <label class="col-md-3">Alamat Rumah <span class="required_span">*</span></label>
                              <div class="col-md-9">
                                  <textarea required name="alamat_perempuan" rows="4" class="form-control"><?= $biodata->alamat_perempuan ?></textarea>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-md-3">Tentang mempelai perempuan <span class="required_span">*</span></label>
                              <div class="col-md-9">
                                  <textarea required name="desc_perempuan" rows="4" class="form-control"><?= $biodata->desc_perempuan ?></textarea>
                              </div>
                          </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn green btn-block" id="profil">
                                        <i class="fa fa-check"></i> Update Biodata</button>
                                </div>
                            </div>
                        </div>
                </form>
                <!-- END FORM-->
            </div>

            <script type="text/javascript">
                $(function(){
                        $(".date-picker").datepicker({
                            format: 'yyyy-mm-dd',

                        });
                    }
                )
            </script>

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

            <script src="<?= base_url() ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
            <script src="<?= base_url() ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
            <script src="<?= base_url() ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
            <script src="<?= base_url() ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
            <!-- END CORE PLUGINS -->
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="<?= base_url() ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
