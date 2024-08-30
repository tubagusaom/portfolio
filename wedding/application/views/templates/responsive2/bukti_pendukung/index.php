
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
                    <span>Bukti Pendukung</span>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Daftar Bukti Pendukung</span>
                </li>
            </ul>
            <div class="page-toolbar">
                <div><?= tgl_indo(date('Y-m-d')) ?>
                    <i class="icon-calendar"></i>&nbsp;
                    <span class="thin uppercase hidden-xs"></span>&nbsp;
                </div>
            </div>
        </div>

        <?php
        $jenis_portofolio = array(
        						'0' => 'Foto'
                                ,'1' => 'Kartu Pelajar'
                                ,'2' => 'Raport'
                                ,'3' => 'Sertifikat Pelatihan'
                                ,'4' => 'Penghargaan'
                                ,'5' => 'Tugas / Pra Karya'
                                ,'6' => 'Lain-lain'
                                );
        ?>

        <div class="row" style="margin-top: 10px;">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption font-dark col-md-6">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Dokumen Bukti Pendukung</span>
                        </div>
                        <div class="col-md-6 pull-right" style="float: right;">
                            <a href="<?= base_url() . 'bukti_pendukung/upload' ?>" style="float: right;" id="sample_editable_1_new" class="btn sbold green"> Add New
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                    <div class="col-md-12" style="margin-top: 50px;">
                            <div class="mt-element-ribbon bg-grey-steel">
                                <div class="ribbon ribbon-round ribbon-color-primary uppercase">Persyaratan Dasar</div>
                                <div class="ribbon-content table-responsive">
                                   Bukti-bukti yang diupload pada saat registrasi

                                    <div class="clearfix" style="margin-bottom: 30px;"></div>

                                    <?php
                                    //var_dump($bukti_dasar); die();
                                    if (!empty($bukti_dasar)) {
                                        ?>

                                        <table class="table table-bordered table-hover" style="background-color: #fff;">
                                            <thead>
                                                <tr class="warning">
                                                    <th width="20%">Jenis Dokumen</th>
                                                    <th width="20%">Nama Dokumen</th>
                                                    <th width="10%" style="text-align: center;">Download</th>
                                                    <th width="10%" style="text-align: center">Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($bukti_dasar as $jenis=>$dokumen) {
                                                    if(is_array($dokumen)){
                                                foreach ($dokumen as $keys => $value){
                                                ?>
                                                    <tr>
                                                        <td><?= $jenis; ?></td>
                                                        <td id="dokumen"><?= $value; ?></td>
                                                        <td align="center">
                                                            <a href="<?= base_url() . 'assets/files/asesi/' . $value ?>" target="_blank"> <i class="icon-cloud-download font-dark"></i></a>
                                                            &nbsp

                                                        </td>

                                                        <td align="center">
                                                          <a
                                                              href="javascript:;"
                                                              data-jenis="<?php echo $jenis ?>"
                                                              data-toggle="modal" data-target="<?= '#'.$jenis ?>">
                                                              <button  data-toggle="modal" data-target="bah-data" class="btn btn-info btn-sm" onclick="edit()">
                                                                <i class="icon-pencil"></i>
                                                              </button>
                                                          </a>
                                                        </td>
                                                    </tr>
                                                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="<?= $jenis ?>" class="modal fade" style="background-color:rgba(0,0,0, 0.4)">
                                                    <div class="modal-dialog">

                                                      <!-- Modal content-->
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">UBAH BUKTI PENDUKUNG</h4>
                                                        </div>

                                                        <form action="<?= base_url() . 'bukti_pendukung/edit' ?>" method="post">
                                                          <div class="modal-body">
                                                            <div class="form-group">
                                                              <label for="text"> Jenis Dokumen : </label>
                                                              <?php echo form_dropdown('jenis_portofolio', array(
														        						'0' => 'Foto'
														                                ,'1' => 'Kartu Pelajar'
														                                ,'2' => 'Raport'
														                                ,'3' => 'Sertifikat Pelatihan'
                                														,'4' => 'Penghargaan'
														                                ,'5' => 'Tugas / Pra Karya'
														                                ,'6' => 'Lain-lain'
														                                ), '', 'class="form-control"'); ?>
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="text">Nama Dokumen: </label>
                                                              <input type="text" class="form-control" name="nama_dokumen" required>
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="text">Nama File:</label>
                                                              <input type="text" class="form-control" value="<?php echo $value ?>" name="nama_file" readonly>
                                                              <input type="hidden" value="<?php echo $this->auth->get_user_data()->id; ?>" name="id_users">
                                                              <input type="hidden" value="-" name="size">
                                                            </div>
                                                          </div>

                                                          <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                          </div>
                                                        </form>

                                                      </div>

                                                    </div>
                                                  </div>
                                                    <?php } }} ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    <div class="col-xs-12" style="margin-top: 50px;">
                            <div class="mt-element-ribbon bg-grey-steel">
                                <div class="ribbon ribbon-round ribbon-color-primary uppercase">Pasfoto</div>
                                <div class="ribbon-content table-responsive">
                                   Foto ukuran 3 X 4 untuk sertifikat

                                    <div class="clearfix" style="margin-bottom: 30px;"></div>

                                    <?php
                                    if (!empty($jns_portofolio['0'])) {
                                        ?>

                                        <table class="table table-bordered table-hover" style="background-color: #fff;">
                                            <thead>
                                                <tr class="warning">
                                                    <th width="20%">Jenis Dokumen</th>
                                                    <th width="20%">Nama Dokumen</th>
                                                    <th width="20%">File Size</th>
                                                    <th width="10%" style="text-align: center;">Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($jns_portofolio['0'] as $jportofolio) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $jenis_portofolio[$jportofolio['jenis_portofolio']]; ?></td>
                                                        <td><?= $jportofolio['nama_dokumen']; ?></td>
                                                        <td><?= $jportofolio['file_size']; ?></td>
                                                        <td align="center">
                                                            <a href="<?= base_url() . 'assets/files/asesi/' . $jportofolio['nama_file'] ?>" target="_blank"> <i class="icon-cloud-download font-dark"></i></a>
                                                            &nbsp
                                                            <a alt="Hapus Bukti Pendukung" href="<?= base_url() . 'bukti_pendukung/hapus/' . $jportofolio['id'] ?>"> <i class="icon-ban font-dark"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                        <div class="col-xs-12" style="margin-top: 50px;">
                            <div class="mt-element-ribbon bg-grey-steel">
                                <div class="ribbon ribbon-round ribbon-color-primary uppercase">KTP / Kartu Pelajar</div>
                                <div class="ribbon-content table-responsive">


                                    <div class="clearfix" style="margin-bottom: 30px;"></div>

                                    <?php
                                    if (!empty($jns_portofolio['1'])) {
                                        ?>

                                        <table class="table table-bordered table-hover" style="background-color: #fff;">
                                            <thead>
                                                <tr class="warning">
                                                    <th width="20%">Jenis Dokumen</th>
                                                    <th width="20%">Nama Dokumen</th>
                                                    <th width="20%">File Size</th>
                                                    <th width="10%" style="text-align: center;">Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($jns_portofolio['1'] as $jportofolio) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $jenis_portofolio[$jportofolio['jenis_portofolio']]; ?></td>
                                                        <td><?= $jportofolio['nama_dokumen']; ?></td>
                                                        <td><?= $jportofolio['file_size']; ?></td>
                                                        <td align="center">
                                                            <a href="<?= base_url() . 'assets/files/asesi/' . $jportofolio['nama_file'] ?>" target="_blank"> <i class="icon-cloud-download font-dark"></i></a>
                                                            &nbsp
                                                            <a alt="Hapus Bukti Pendukung" href="<?= base_url() . 'bukti_pendukung/hapus/' . $jportofolio['id'] ?>"> <i class="icon-ban font-dark"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="mt-element-ribbon bg-grey-steel">
                                <div class="ribbon ribbon-round ribbon-color-primary uppercase">Raport</div>
                                <div class="ribbon-content table-responsive">

                                    <div class="clearfix" style="margin-bottom: 30px;"></div>

                                    <?php
                                    if (!empty($jns_portofolio['2'])) {
                                        ?>

                                        <table class="table table-bordered table-hover" style="background-color: #fff;">
                                            <thead>
                                                <tr class="warning">
                                                    <th width="20%">Jenis Dokumen</th>
                                                    <th width="20%">Nama Dokumen</th>
                                                    <th width="20%">File Size</th>
                                                    <th width="10%" style="text-align: center;">Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($jns_portofolio['2'] as $jportofolio) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $jenis_portofolio[$jportofolio['jenis_portofolio']]; ?></td>
                                                        <td><?= $jportofolio['nama_dokumen']; ?></td>
                                                        <td><?= $jportofolio['file_size']; ?></td>
                                                        <td align="center">
                                                            <a href="<?= base_url() . 'assets/files/asesi/' . $jportofolio['nama_file'] ?>" target="_blank"> <i class="icon-cloud-download font-dark"></i></a>
                                                            &nbsp
                                                            <a alt="Hapus Bukti Pendukung" href="<?= base_url() . 'bukti_pendukung/hapus/' . $jportofolio['id'] ?>"> <i class="icon-ban font-dark"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="mt-element-ribbon bg-grey-steel">
                                <div class="ribbon ribbon-round ribbon-color-primary ribbon-shadow uppercase">Sertifikat Pelatihan</div>
                                <div class="ribbon-content table-responsive">

                                    <div class="clearfix" style="margin-bottom: 30px;"></div>

                                    <?php
                                    if (!empty($jns_portofolio['3'])) {
                                        ?>

                                        <table class="table table-bordered table-hover" style="background-color: #fff;">
                                            <thead>
                                                <tr class="warning">
                                                    <th width="20%">Jenis Dokumen</th>
                                                    <th width="20%">Nama Dokumen</th>
                                                    <th width="20%">File Size</th>
                                                    <th width="10%" style="text-align: center;">Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($jns_portofolio['3'] as $jportofolio) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $jenis_portofolio[$jportofolio['jenis_portofolio']]; ?></td>
                                                        <td><?= $jportofolio['nama_dokumen']; ?></td>
                                                        <td><?= $jportofolio['file_size']; ?></td>
                                                        <td align="center">
                                                            <a href="<?= base_url() . 'assets/files/asesi/' . $jportofolio['nama_file'] ?>" target="_blank"> <i class="icon-cloud-download font-dark"></i></a>
                                                            &nbsp
                                                            <a alt="Hapus Bukti Pendukung" href="<?= base_url() . 'bukti_pendukung/hapus/' . $jportofolio['id'] ?>"> <i class="icon-ban font-dark"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="mt-element-ribbon bg-grey-steel">
                                <div class="ribbon ribbon-round ribbon-color-primary ribbon-shadow uppercase">Penghargaan</div>
                                <div class="ribbon-content table-responsive">

                                    <div class="clearfix" style="margin-bottom: 30px;"></div>

                                    <?php
                                    if (!empty($jns_portofolio['4'])) {
                                        ?>

                                        <table class="table table-bordered table-hover" style="background-color: #fff;">
                                            <thead>
                                                <tr class="warning">
                                                    <th width="20%">Jenis Dokumen</th>
                                                    <th width="20%">Nama Dokumen</th>
                                                    <th width="20%">File Size</th>
                                                    <th width="10%" style="text-align: center;">Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($jns_portofolio['4'] as $jportofolio) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $jenis_portofolio[$jportofolio['jenis_portofolio']]; ?></td>
                                                        <td><?= $jportofolio['nama_dokumen']; ?></td>
                                                        <td><?= $jportofolio['file_size']; ?></td>
                                                        <td align="center">
                                                            <a href="<?= base_url() . 'assets/files/asesi/' . $jportofolio['nama_file'] ?>" target="_blank"> <i class="icon-cloud-download font-dark"></i></a>
                                                            &nbsp
                                                            <a alt="Hapus Bukti Pendukung" href="<?= base_url() . 'bukti_pendukung/hapus/' . $jportofolio['id'] ?>"> <i class="icon-ban font-dark"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="mt-element-ribbon bg-grey-steel">
                                <div class="ribbon ribbon-round ribbon-color-primary uppercase">Tugas / Pra Karya</div>
                                <div class="ribbon-content table-responsive">

                                    <div class="clearfix" style="margin-bottom: 30px;"></div>
                                    <?php
                                    if (!empty($jns_portofolio['5'])) {
                                        ?>
                                        <table class="table table-bordered table-hover" style="background-color: #fff;">
                                            <thead>
                                                <tr class="warning">
                                                    <th width="20%">Jenis Dokumen</th>
                                                    <th width="20%">Nama Dokumen</th>
                                                    <th width="20%">File Size</th>
                                                    <th width="10%" style="text-align: center;">Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($jns_portofolio['5'] as $jportofolio) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $jenis_portofolio[$jportofolio['jenis_portofolio']]; ?></td>
                                                        <td><?= $jportofolio['nama_dokumen']; ?></td>
                                                        <td><?= $jportofolio['file_size']; ?></td>
                                                        <td align="center">
                                                            <a href="<?= base_url() . 'assets/files/asesi/' . $jportofolio['nama_file'] ?>" target="_blank"> <i class="icon-cloud-download font-dark"></i></a>
                                                            &nbsp
                                                            <a alt="Hapus Bukti Pendukung" href="<?= base_url() . 'bukti_pendukung/hapus/' . $jportofolio['id'] ?>"> <i class="icon-ban font-dark"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="mt-element-ribbon bg-grey-steel">
                                <div class="ribbon ribbon-round ribbon-color-primary ribbon-shadow uppercase">Lain-lain</div>
                                <div class="ribbon-content table-responsive">

                                    <div class="clearfix" style="margin-bottom: 30px;"></div>

                                    <?php
                                    if (!empty($jns_portofolio['6'])) {
                                        ?>
                                        <table class="table table-bordered table-hover" style="background-color: #fff;">
                                            <thead>
                                                <tr class="warning">
                                                    <th width="20%">Jenis Dokumen</th>
                                                    <th width="20%">Nama Dokumen</th>
                                                    <th width="20%">File Size</th>
                                                    <th width="10%" style="text-align: center;">Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($jns_portofolio['6'] as $jportofolio) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $jenis_portofolio[$jportofolio['jenis_portofolio']]; ?></td>
                                                        <td><?= $jportofolio['nama_dokumen']; ?></td>
                                                        <td><?= $jportofolio['file_size']; ?></td>
                                                        <td align="center">
                                                            <a href="<?= base_url() . 'assets/files/asesi/' . $jportofolio['nama_file'] ?>" target="_blank"> <i class="icon-cloud-download font-dark"></i></a>
                                                            &nbsp
                                                            <a alt="Hapus Bukti Pendukung" href="<?= base_url() . 'bukti_pendukung/hapus/' . $jportofolio['id'] ?>"> <i class="icon-ban font-dark"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>



        <script src="<?= base_url() ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?= base_url() ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?= base_url() ?>assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
