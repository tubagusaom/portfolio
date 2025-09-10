
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
                                    <th>Deskripsi Uji Kompetensi</th>
                                    <th>Persetujuan Asesmen</th>
                                    <th>Banding Hasil Asesmen</th>
                                    <th>Umpan Balik Asesi</th>
                                    </tr>
                            </thead>
                            <tbody>
                            <?php
                              $tglnew = date('Y-m-d', strtotime($tglskrng));
                              $jamnew = date('H:i:s');
                              $jamakhir = date('H:i:s');
                            //   dump($jamnew);die();
                              foreach ($data_aktivitas as $key => $value) {
                                // $this->db->where('id_perangkat_asesmen',$value->id_perangkat);
                                // $this->db->where('jenis_perangkat','1');
                                // $row_perangkat = $this->db->get(kode_lsp().'perangkat_asesmen_detail')->row();
                                // var_dump($row_perangkat); die();
                             ?>
                            <tr>
                                <td> Skema Sertifikasi : <b><?=$value->skema?></b>
                                  <br> Asesor : <b><?=$value->users?></b> Tanggal & Waktu Asesmen : <b><?=tgl_indo($value->tanggal)?>&nbsp;<?=$value->starttime?></b>
                                  <br> Dengan Metode :
                                    <b style="color: #337ab7">
                                        <?=$value->metode_asesmen=='2' ? 'Asesmen Portofolio' :
                                                'Uji Kompetensi'?>
                                    </b> <br><br>

                                    Cetak MUK :
                                      <a href="<?=base_url()?>penilaian_asesi/cetak/<?=$value->id ?>" target="_blank" title="cetak MUK">
                                        <i class="fa fa-print"></i>
                                      </a> <br>

                                    <div style="padding-top: 15px; padding-bottom: 5px">
                                        <b>Perangkat <?=$value->metode_asesmen=='2' ? 'Asesmen Uji Portofolio' :
                                                'Uji Kompetensi'?> :</b>
                                    </div>
                                    <?php
                                        // $perangkat_asesmen = @unserialize($value->perangkat_yang_digunakan);
                                        if ($value->perangkat_yang_digunakan != "") {
                                            $perangkat_asesmen = @unserialize($value->perangkat_yang_digunakan);
                                        } else {
                                            $perangkat_asesmen = array();
                                        }

                                        // echo $value->metode_asesmen;

                                        $numero = 1;

                                        if ($value->metode_asesmen == 1) {

                                        foreach ($perangkat_asesmen as $key => $perangkat){

                                            // a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"4";}

                                            if (in_array($key, $perangkat_asesmen)) {
                                                $selected = 'checked';
                                            } else {
                                                $selected = '';
                                            }

                                            // echo $selected;
                                            if ($tglnew == $value->tanggal && $jamnew >= $value->starttime && $jamakhir <= $value->endtime) {
                                            if($perangkat != ""){

                                                if ($perangkat == 0) {
                                                    $namaperangkat = "Pertanyaan Lisan";
                                                    $inisial_kode = "1";

                                                    $this->db->where('id_perangkat_asesmen',$value->id_perangkat);
                                                    $this->db->where('jenis_perangkat','3');
                                                    $row_perangkat = $this->db->get(kode_lsp().'perangkat_asesmen_detail')->row();
                                                    //var_dump($value->id_perangkat);
                                                            // $jenisperangkat= "3";
                                                }elseif ($perangkat == 1) {
                                                    $namaperangkat = "Pertanyaan Tulisan";
                                                    $inisial_kode = "2";

                                                    $this->db->where('id_perangkat_asesmen',$value->id_perangkat);
                                                    $this->db->where('jenis_perangkat','1');
                                                    $row_perangkat = $this->db->get(kode_lsp().'perangkat_asesmen_detail')->row();
                                                            // $jenisperangkat= "2";
                                                }elseif ($perangkat == 2) {
                                                    $namaperangkat = "Observasi / Praktek";
                                                    $inisial_kode = "3";

                                                    $this->db->where('id_perangkat_asesmen',$value->id_perangkat);
                                                                $this->db->where('jenis_perangkat','2');
                                                    $row_perangkat = $this->db->get(kode_lsp().'perangkat_asesmen_detail')->row();
                                                                // $jenisperangkat= "3";
                                                }
                                                elseif ($perangkat == 3) {
                                                    $namaperangkat = "Wawancara";
                                                    $inisial_kode = "4";
                                                                // $jenisperangkat= "3";
                                                }elseif ($perangkat == 4) {
                                                    $namaperangkat = "Cek Portofolio";
                                                    $inisial_kode = "5";
                                                                // $jenisperangkat= "3";
                                                }

                                            // }

                                            if ($selected != "") {


                                                if ($row_perangkat->id == "") {

                                                    if ($inisial_kode == '4' OR $inisial_kode == '5') {
                                                        echo '
                                                        <b>'.$numero.'.
                                                        '.$namaperangkat.'</b><br>
                                                        ';
                                                    }else {
                                                        echo $numero . '. <b style="color: red"> '.$namaperangkat.' Belum Tersedia</b><br >';
                                                    }

                                                }else {
                                                    //var_dump($value->metode_asesmen);
                                                	if ($inisial_kode == '1') {
                                                		echo '
	                                                    <b>'.$numero.'.
	                                                    '.$namaperangkat.'</b><br>
                                                		';
                                                	}else {
                                                		echo '
	                                                    <b>'.$numero.'.
	                                                    <a target="_blank" href="'.base_url() . 'perangkat_asesmen/uji/'.$row_perangkat->id.'">
	                                                            '.$namaperangkat.'
	                                                    </a></b><br>
                                                		';
                                                	}

                                                }

                                            $numero++;}

                                            }
                                          }else {
                                            echo "&nbsp;";
                                          }


                                        }
                                       }else {
                                        echo '
                                            <b>1. Wawancara</b><br>
                                            <b>2. Cek Portofolio</b>
                                        ';
                                       }
                                    ?>

                                        </td>
                                        <td><a href="<?= base_url() . 'sertifikasi/persetujuan/' . $value->id ?>">Persetujuan Asesmen</a>

                                         </td>
                                         <td><a href="<?= base_url() . 'sertifikasi/banding/' . $value->id ?>">Banding Hasil Asesmen</a></td>
                                         <td><a href="<?= base_url().'sertifikasi/asesmen/'.$value->id ?>">Umpan Balik Asesi</a></td>

                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                                        <?php } ?>

                            </div>
                </div>



            </div>
