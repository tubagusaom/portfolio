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
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Profil</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Pekerjaan</span>
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
                if($this->session->flashdata('result')!=''){
                    ?>
                    <div class="alert alert-<?=$this->session->flashdata('mode_alert')?>" role="alert"><?php echo $this->session->flashdata('result'); ?></div>
                    <?php
                }
                ?>
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Data Pekerjaan </div>

                    </div>

                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <form method="POST" action="<?= base_url() . 'profil/pekerjaan_update' ?>" class="mt-repeater form-horizontal">
                                    <h3 class="mt-repeater-title">Pengalaman Kerja</h3>
                                    <div style="clear: both;margin-bottom: 30px;"></div>

                                    <div data-repeater-list="group-a">
                                        <div data-repeater-item class="mt-repeater-item">
                                            <!-- jQuery Repeater Container -->
                                            <div class="mt-repeater-input">
                                                
                                                <input placeholder="Jabatan" type="text" name="nama_pekerjaan" class="form-control" />
                                            </div>
                                            <div class="mt-repeater-input">
                                                <input placeholder="Perusahaan / Lembaga" type="text" name="nama_perusahaan" class="form-control" /> </div>
                                            <div class="mt-repeater-input">
                                                <?php echo form_dropdown('id_provinsi', $provinsi, '', 'class="form-control"'); ?>
                                            </div>
                                            <div class="mt-repeater-input">
                                                <input class="input-group form-control form-control-inline date date-picker" size="16" type="text"  name="tanggal_bergabung" data-date-format="dd/mm/yyyy" /> </div>
                                            <div class="mt-repeater-input">
                                                <input class="input-group form-control form-control-inline date date-picker" size="16" type="text"  name="tanggal_berhenti" data-date-format="dd/mm/yyyy" /> </div>
                                            <div class="mt-repeater-input">
                                                <?php echo form_dropdown('is_work', array('0' => 'Tidak Aktif', '1' => 'Masih Aktif Bekerja'), '', 'class="form-control"'); ?> </div>

                                            <div class="mt-repeater-input">
                                                <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete" style="margin-top: 0px;"><i class="fa fa-close"></i> Delete</a>
                                            </div>
                                        </div>

                                        <?php foreach ($pekerjaan as $key => $value) {
                                            ?>
                                            <div data-repeater-item class="mt-repeater-item">
                                                <!-- jQuery Repeater Container -->
                                                <div class="mt-repeater-input">
                                                    <input type="text" value="<?= $value->nama_pekerjaan ?>" type="text" name="nama_pekerjaan" class="form-control" /> 
                                                </div>
                                                <div class="mt-repeater-input">
                                                    <input type="text" value="<?= $value->nama_perusahaan ?>" type="text" name="nama_perusahaan" class="form-control" /> 
                                                </div>
                                                <div class="mt-repeater-input">
                                                    <?php echo form_dropdown('id_provinsi', $provinsi, $value->id_provinsi, 'class="form-control"'); ?>
                                                </div>
                                                <div class="mt-repeater-input">
                                                    <input type="text" value="<?= jquery_date($value->tanggal_bergabung) ?>" class="input-group form-control form-control-inline date date-picker" type="text"  name="tanggal_bergabung" data-date-format="dd/mm/yyyy" /> 
                                                </div>
                                                <div class="mt-repeater-input">
                                                    <input type="text" value="<?= jquery_date($value->tanggal_berhenti) ?>" class="input-group form-control form-control-inline date date-picker" type="text"  name="tanggal_berhenti" data-date-format="dd/mm/yyyy" /> 
                                                </div>
                                                <div class="mt-repeater-input">
                                                    <?php echo form_dropdown('is_work', array('0' => 'Tidak Aktif', '1' => 'Masih Aktif Bekerja'), $value->is_work, 'class="form-control"'); ?></div>
                                                <div class="mt-repeater-input">
                                                    <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete" style="margin-top: 0px;"><i class="fa fa-close"></i> Delete</a>
                                                </div>
                                            </div>
                                            <?php
                                            # code...
                                        }
                                        ?>
                                    </div>

                                    <a href="javascript:;" data-repeater-create class="btn btn-success mt-repeater-add">
                                        <i class="fa fa-plus"></i> Add</a> <br/>
                                    <hr/>
                                    <button type="submit" class="btn green">
                                        <i class="fa fa-save"></i> Update Pekerjaan</button>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="<?= base_url() ?>assets/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>
            <script src="<?= base_url() ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="<?= base_url() ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="<?= base_url() ?>assets/pages/scripts/form-repeater.min.js" type="text/javascript"></script>
            <script src="<?= base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL SCRIPTS -->
            <!-- BEGIN THEME LAYOUT SCRIPTS -->
            <script src="<?= base_url() ?>assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>


