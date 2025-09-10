<link href="<?= base_url() ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />

    <div class="page-content-wrapper">
    <!-- BEGIN CONTENT -->
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
                        <span>Sertifikasi</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Detail</span>
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
                    <div class="portlet light portlet-fit bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class=" icon-layers font-green"></i>
                                <span class="caption-subject font-green bold uppercase"><?= $detail_sertifikasi->jadual ?></span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="mt-element-step">
                                <div class="row step-default">
                                    <div class="mt-step-desc">

                                        <div class="caption-desc font-grey-cascade">Berikut tahapan proses uji kompetensi yang sedang berjalan untuk jadwal <br/> <pre class="mt-code"><?= $detail_sertifikasi->jadual ?></pre> 
                                        </div>
                                        <br/> </div>
                                    <table class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th style="width: 15%"> Nama Proses </th>
                                                <th> Keterangan Proses </th>
                                                <th> Status </th>
                                                <th> Waktu Proses </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Registrasi</td>                    
                                                <td>Unggah Syarat Pendaftaran dan Portofolio </td>
                                                <td><?= $status_praasesmen ?></td>
                                                <td><?= $tanggal_praasesmen ?></td>
                                                <td><a href="<?= base_url() . 'bukti_pendukung/index'?>">Detail</a></td>
                                            </tr>
                                            <tr>
                                                <td>Asesmen Mandiri</td>                    
                                                <td>Pengakuan Asesi</td>
                                                <td><?= $status_mandiri ?></td>
                                                <td><?= $tanggal_mandiri ?></td>
                                                <td><a href="<?= base_url() . 'sertifikasi/asesmen_mandiri/' . $id ?>">Detail</a></td>
                                            </tr>
                                            <tr>
                                                <td>Pembayaran</td>                    
                                                <td>Konfirmasi Pembayaran  </td>
                                                <td><?= $status_administrasi ?></td>
                                                <td><?= $tanggal_administrasi ?></td>
                                                <td><a href="#">Detail</a></td>
                                            </tr>
                                            <tr>
                                                <td>Pra Asesmen</td>                    
                                                <td>Penilaian kesiapan pelaksanaan uji kompetensi  </td>
                                                <td><?= $status_praasesmen_siap ?></td>
                                                <td><?= $tanggal_praasesmen_siap ?></td>
                                                <td><a href="<?= base_url() . 'sertifikasi/praasesmen/' . $id ?>">Detail</a></td>
                                            </tr>

                                            <tr>
                                                <td>Penjadwalan</td>                    
                                                <td>Jadwal pelaksanaan, tempat dan asesor kompetensi </td>
                                                <td><?= $status_penjadwalan ?></td>
                                                <td><?= $tanggal_penjadwalan ?></td>
                                                <td><a href="<?= base_url() . 'sertifikasi/detail_jadwal/' . $id ?>">Detail</a></td>
                                            </tr>
                                            <tr>
                                                <td>Asesmen</td>                    
                                                <td>Rekomendasi Kompeten atau Belum Kompeten dari Asesor Kompetensi </td>
                                                <td><?= $status_rekomendasi ?></td>
                                                <td><?= $tanggal_rekomendasi ?></td>
                                                <td><a href="<?= base_url() . 'sertifikasi/asesmen/' . $id ?>">Detail</a></td>
                                            </tr>
                                            <tr>
                                                <td>Komite Teknis</td>                    
                                                <td>Keputusan Rapat Komite Teknis </td>
                                                <td><?= $status_komite_teknis ?></td>
                                                <td><?= $tanggal_komite_teknis ?></td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td>Keputusan Pleno</td>                    
                                                <td>Keputusan pengurus LSP</td>
                                                <td><?= $status_berita_acara ?></td>
                                                <td><?= $tanggal_berita_acara ?></td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td>Sertifikat</td>                    
                                                <td>Pencetakan Sertifikat Kompetensi </td>
                                                <td><?= $status_sertifikat ?></td>
                                                <td><?= $tanggal_sertifikat ?></td>
                                                <td><a href="<?= base_url() . 'sertifikasi/detail_sertifikat/' . $id ?>">Detail</a></td>
                                            </tr>
                                            <tr>
                                                <td>Distribusi Sertifikat</td>                    
                                                <td>Pengiriman Sertifikat</td>
                                                <td><?= $status_pengiriman ?></td>
                                                <td><?= $tanggal_pengiriman ?></td>
                                                <td><a href="<?= base_url() . 'sertifikasi/detail_pengiriman/' . $id ?>">Detail</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
</div></div></div></div></div>
