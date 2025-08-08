<link href="<?= base_url() ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Jadwal</span>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Jadwal Uji Kompetensi</span>
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
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Jadwal Uji Kompetensi</span>
                        </div>

                    </div>
                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover " >
                            <thead>
                                <tr>
                                    <th> Nama Jadwal </th>
                                    <th> Tanggal </th>
                                    <th> Status </th>
                                    <th> Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($list_jadwal as $key => $value) {
                                    if ($value->status_jadwal == '0') {
                                        $label_jadwal = 'Tersedia';
                                        $label_status_jadwal = 'success';
                                    } else if ($value->status_jadwal == '1') {
                                        $label_jadwal = 'Pending';
                                        $label_status_jadwal = 'warning';
                                    } else {
                                        $label_jadwal = 'Selesai';
                                        $label_status_jadwal = 'error';
                                    }
                                    ?>
                                    <tr class="odd gradeX">

                                        <td> <?= $value->jadual ?> </td>
                                        <td>
                                            <?= tgl_indo($value->tanggal) ?>
                                        </td>
                                        <td><span class="label label-sm label-<?= $label_status_jadwal ?>"> <?= $label_jadwal ?> </span>
                                        </td>

                                        <td>
                                            <a href="<?= base_url() . 'jadwal/registrasi/' . $value->id ?>">
                                                Registrasi </a>
                                        </td>

                                    </tr>
                                <?php } ?>   
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div></div>      


<script src="<?= base_url() ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?= base_url() ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= base_url() ?>assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>