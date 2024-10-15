
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?=base_url() ?>">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Dashboard</span>
                </li>
            </ul>
            <div class="page-toolbar">
                <div><?= tgl_indo(date('Y-m-d')) ?>
                    <i class="icon-calendar"></i>&nbsp;
                    <span class="thin uppercase hidden-xs"></span>&nbsp;
                </div>
            </div>
        </div>
        <h1 class="page-title"> Dashboard Sertifikasi</h1>
        <?php if($data_aktivitas->status_permohonan == '2'){ ?>
        <div class="alert alert-danger" role="alert"><?=$data_aktivitas->deskripsi_permohonan?>! <a href="<?=base_url().'bukti_pendukung/upload'?>">Upload</a></div>
    <?php } ?>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="<?= $jumlah_sertifikat ?>">0</span>
                        </div>
                        <div class="desc"> Sertifikat </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 red" href="<?= base_url() . 'bukti_pendukung/index' ?>">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="<?= $jumlah_repositori ?>">0</span> </div>
                            <div class="desc">Portofolio </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 green" href="<?= base_url() . 'sertifikasi/view' ?>">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="<?= $jumlah_uji_kompetensi ?>">0</span>
                            </div>
                            <div class="desc"> Uji Kompetensi </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="0"></span></div>
                                <div class="desc">Sertifikat Expired  </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <!-- END DASHBOARD STATS 1-->


                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">

                                <?php
                                if ($this->id_asesi == '0') {
                                    echo "<h3>" . $data_aktivitas['status_belum_ada_jadwal'] . "</h3><br/>
                                    <a href='" . base_url() . "jadwal/index' class='btn btn-primary'>Jadwal Uji Kompetensi</a>";
                                } else {
                                    ?>
                                   <div class="table-responsive">
                                  <table class="table">
                                    <thead>
                                      <tr>

                                          <th>Skema Sertifikasi yang di ambil</th>
                                          <th>Persetujuan Asesmen</th>
                                          <th>Banding Hasil Asesmen</th>
                                          <th>Umpan Balik Asesi</th>
                                          <th>Uji Teori</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_aktivitas as $key => $value) { 
                                        $this->db->where('id_perangkat_asesmen',$value->id_perangkat);
                                        $row_perangkat = $this->db->get(kode_lsp().'perangkat_asesmen_detail')->row();
                                        ?>
                                    <tr>                                         
                                        <td>
                                            <?=$value->skema?>
                                            
                                        </td>
                                        <td><a href="<?= base_url() . 'sertifikasi/persetujuan/' . $value->id ?>">Persetujuan Asesmen</a>
                                        
                                         </td>
                                         <td><a href="<?= base_url() . 'sertifikasi/banding/' . $value->id ?>">Banding Hasil Asesmen</a></td>
                                         <td><a href="<?= base_url().'sertifikasi/asesmen/'.$value->id ?>">Umpan Balik Asesi</a></td>
                                         <td><a target="_blank" href="<?=base_url() . 'perangkat_asesmen/uji/'.$row_perangkat->id.'/'.$value->id ?>">Link</a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                                        <?php } ?>
       
                            </div>
                </div>



            </div>
