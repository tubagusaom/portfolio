
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?= base_url() ?>">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Dashboard Sertifikasi</span>
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
        <?php if ($data_aktivitas['detail_sertifikasi']->rekomendasi_apl01 == '2') { ?>
            <div class="alert alert-danger" role="alert">Permohonan ditolak, <?= $data_aktivitas['detail_sertifikasi']->catatan_rekomendasi_apl01 ?>! <a href="<?= base_url() . 'bukti_pendukung/upload' ?>">Upload</a></div>
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
                            <span data-counter="counterup" data-value="<?= $jumlah_repositori ?>"><?= $jumlah_repositori ?></span> </div>
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
                            <span data-counter="counterup" data-value="<?= $jumlah_uji_kompetensi ?>"><?= $jumlah_uji_kompetensi ?></span>
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

        <div class="mt-step-desc">
            <div class="caption-desc ">
                <h5>Jadwal : <?= $data_aktivitas['riwayat_sertifikasi'][0]->jadual ?> (<?= tgl_indo($data_aktivitas['riwayat_sertifikasi'][0]->tanggal_mulai_uji) ?> s/d <?= tgl_indo($data_aktivitas['riwayat_sertifikasi'][0]->tanggal_akhir_uji) ?>)</h5>
            </div>
            <br/>
        </div>
        <table class="table table-striped table-bordered table-hover" >
            <thead>
                <tr>
                    <th style="width: 15%"> Nama Proses </th>
                    <th> Keterangan Proses </th>
                    <th> Status </th>
                    <th> Waktu Proses </th>
                    <th> Hasil </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Registrasi</td>
                    <td>Unggah Syarat Pendaftaran dan Portofolio </td>
                    <td><?= $data_aktivitas['status_praasesmen'] ?></td>
                    <td><?= $data_aktivitas['tanggal_praasesmen'] ?></td>
                    <td>
                        <a href="<?= base_url() . 'bukti_pendukung/index/' ?>">Detail</a>
                    </td>
                </tr>
                <tr>
                    <td>Asesmen Mandiri</td>
                    <td>Pengakuan Asesi</td>
                    <td><?= $data_aktivitas['status_mandiri'] ?></td>
                    <td><?= $data_aktivitas['tanggal_mandiri'] ?></td>
                    <td><a href="<?= base_url() . 'sertifikasi/asesmen_mandiri/' ?>">Detail</a></td>
                </tr>

                <tr>
                    <td>Asesmen</td>
                    <td>Rekomendasi Kompeten atau Belum Kompeten dari Asesor Kompetensi </td>
                    <td><?= $data_aktivitas['status_rekomendasi'] ?></td>
                    <td><?= $data_aktivitas['tanggal_rekomendasi'] ?></td>
                    <td><a href="<?= base_url() . 'sertifikasi/asesmen/' ?>">Detail</a></td>
                </tr>

                <tr>
                    <td>Keputusan Pleno</td>
                    <td>Keputusan pengurus LSP</td>
                    <td><?= $data_aktivitas['status_berita_acara'] ?></td>
                    <td><?= $data_aktivitas['tanggal_berita_acara'] ?></td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Sertifikat</td>
                    <td>Pencetakan Sertifikat Kompetensi </td>
                    <td><?= $data_aktivitas['status_sertifikat'] ?></td>
                    <td><?= $data_aktivitas['tanggal_sertifikat'] ?></td>
                    <td><a href="<?= base_url() . 'sertifikasi/detail_sertifikat/' ?>">Detail</a></td>
                </tr>
                <tr>
                    <td>Distribusi Sertifikat</td>
                    <td>Pengiriman Sertifikat</td>
                    <td><?= $data_aktivitas['status_pengiriman'] ?></td>
                    <td><?= $data_aktivitas['tanggal_pengiriman'] ?></td>
                    <td><a href="<?= base_url() . 'sertifikasi/detail_pengiriman/' ?>">Detail</a></td>
                </tr>
            </tbody>
        </table>
    </div>
