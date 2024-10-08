<style>
td,th{
    padding: 1mm;
}
</style>
<page backtop="15mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left; width: 5%"><img src="<?php echo FCPATH.'assets/img/logo48.png';?>" alt="" style="width:33px;"></td>
                <td style="text-align: left; width: 64%;font-weight: lighter;">
                    <?=$aplikasi->nama_unit?>
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
      <table style="width:92%; border:none; padding-left:45px;">
        <tr style="border:none; border-top: 1px solid #333;">
          <td style="width: 90%; border:none; border-top: 1px solid #333; font-size: 8pt; text-transform:uppercase;"><?=$aplikasi->nama_unit?> | <?=$aplikasi->alamat?> <?=$aplikasi->no_telpon?></td>
          <td style="width:10%; text-align:center; border-top: 1px solid #333; color: white; background: #f44758;">[[page_cu]]</td>
        </tr>
      </table>
    </page_footer>
    <br/>
    <span style="font-size:11pt; font-weight:bold;">FR.APL-01. FORMULIR PERMOHONAN SERTIFIKASI KOMPETENSI</span>
    <br>
    <br>
    <span style="font-size:11pt; font-weight:bold;">Bagian 1 : Rincian Data Pemohon Sertifikasi</span>
    <br>
    <br>
    <span style="font-size:14px;">Pada bagian ini, cantumkan data pribadi, data pendidikan formal serta data pekerjaan anda pada saat ini.</span>
    <br>
    <br>

    <table border="0" style="width:100%;border:none;font-size:14px;">
      <tr>
        <th style="width:3%;padding:5px 0px 10px 3px;">a.</th>
        <th colspan="6" style="padding:5px 0px 10px 3px;">Data Pribadi</th>
      </tr>

      <tr>
        <td style="width:3%;padding-top: 10px;"></td>
        <td style="width:27%;padding-top: 10px;">Nama Lengkap</td>
        <td style="width:1%;padding-top: 10px;">:</td>
        <td colspan="4" style="width:68%;border-bottom: 1px solid #333;padding-top: 10px;">
          <?= strtoupper($data_asesi->nama_lengkap); ?>
        </td>
      </tr>
      <tr>
        <td style="width:3%;padding-top: 10px;"></td>
        <td style="width:27%;padding-top: 10px;">No. KTP</td>
        <td style="width:1%;padding-top: 10px;">:</td>
        <td colspan="4" style="width:68%;border-bottom: 1px solid #333;padding-top: 10px;">
          <?=$data_asesi->no_identitas ?>
        </td>
      </tr>
      <tr>
        <td style="width:3%;padding-top: 10px;"></td>
        <td style="width:27%;padding-top: 10px;">Tempat / Tgl. lahir</td>
        <td style="width:1%;padding-top: 10px;">:</td>
        <td colspan="4" style="width:68%;border-bottom: 1px solid #333;padding-top: 10px;">
          <?=ucwords($data_asesi->tempat_lahir) ?> / <?= tgl_indo($data_asesi->tgl_lahir) ?>
        </td>
      </tr>
      <tr>
        <td style="width:3%;padding-top: 10px;"></td>
        <td style="width:27%;padding-top: 10px;">Jenis Kelamin</td>
        <td style="width:1%;padding-top: 10px;">:</td>
        <td colspan="4" style="width:68%;border-bottom: 1px solid #333;padding-top: 10px;">
          <?=($data_asesi->jenis_kelamin == '2'?"Wanita":"Laki-Laki") ?>
        </td>
      </tr>
      <tr>
        <td style="width:3%;padding-top: 10px;"></td>
        <td style="width:27%;padding-top: 10px;">Kebangsaan</td>
        <td style="width:1%;padding-top: 10px;">:</td>
        <td colspan="4" style="width:68%;border-bottom: 1px solid #333;padding-top: 10px;">
          WNI
        </td>
      </tr>
      <tr>
        <td style="width:3%;padding-top: 10px;"></td>
        <td style="width:27%;padding-top: 10px;">Alamat Rumah</td>
        <td style="width:1%;padding-top: 10px;">:</td>
        <td colspan="4" style="width:68%;border-bottom: 1px solid #333;font-size:14px;padding-top: 10px;">
          <?= ($data_asesi->alamat) ?>
        </td>
      </tr>

      <tr>
        <td style="width:3%;border:none;"></td>
        <td style="width:27%;border:none;"></td>
        <td style="width:1%;border:none;"></td>
        <td style=""></td>
        <td style=""></td>
        <td style="text-align:right;padding-top: 10px;">Kode Pos <font style="margin-left:8px;">:</font></td>
        <td style="border-bottom: 1px solid #333;text-align:right;padding-top: 10px;">
          <?= $data_asesi->kode_pos ?>
        </td>
      </tr>
      <tr class="acuan4_2colmax68">
        <td style="width:3%;"></td>
        <td style="width:27%;padding-top: 10px;">No. Telepon/Hp</td>
        <td style="width:1%;padding-top: 10px;">:</td>
        <td style="padding-top: 10px;">Rumah <font style="margin-left:3px;">:</font></td>
        <td style="border-bottom: 1px solid #333;padding-top: 10px;">
          <?= $data_asesi->telp_rumah ?>
        </td>
        <td style="width:20%;text-align:right;padding-top: 10px;">Hp <font style="margin-left:43px;">:</font></td>
        <td style="width:18%;border-bottom: 1px solid #333;padding-top: 10px;">
          <?= $data_asesi->telp ?>
        </td>
      </tr>
      <tr class="acuan4_2colmax68">
        <td style="width:3%;"></td>
        <td style="width:27%;"></td>
        <td style="width:1%;"></td>
        <td style="">E-mail <font style="margin-left:8px;padding-top: 10px;">:</font></td>
        <td colspan="3" style=";border-bottom: 1px solid #333;padding-top: 10px;">
          <?= $data_asesi->email ?>
        </td>
      </tr>

      <tr>
        <td style="width:3%;padding-top: 10px;"></td>
        <td style="width:27%;padding-top: 10px;">Pendidikan Terakhir</td>
        <td style="width:1%;padding-top: 10px;">:</td>
        <td colspan="4" style="width:68%;border-bottom: 1px solid #333;padding-top: 10px;">
          <?= strtoupper($data_lengkap_asesi->nama_pendidikan) ?>
        </td>
      </tr>


      <tr>
        <th style="width:3%;padding:20px 0px 10px 3px;">b.</th>
        <th colspan="6" style="padding:17px 0px 10px 5px;">Data Pekerjaan Sekarang</th>
      </tr>

      <tr>
        <td style="width:3%;padding-top: 10px;"></td>
        <td style="width:27%;padding-top: 10px;">Nama Lembaga</td>
        <td style="width:1%;">:</td>
        <td colspan="4" style="width:68%;border-bottom: 1px solid #333;padding-top: 10px;">
          <?= $data_lengkap_asesi->organisasi ?>
        </td>
      </tr>
      <tr>
        <td style="width:3%;padding-top: 10px;"></td>
        <td style="width:27%;padding-top: 10px;">Jabatan</td>
        <td style="width:1%;padding-top: 10px;">:</td>
        <td colspan="4" style="width:68%;border-bottom: 1px solid #333;padding-top: 10px;">
          <?=$data_lengkap_asesi->jabatan?>
        </td>
      </tr>
      <tr>
        <td style="width:3%;padding-top: 10px;"></td>
        <td style="width:27%;padding-top: 10px;">Alamat</td>
        <td style="width:1%;padding-top: 10px;">:</td>
        <td colspan="4" style="width:68%;border-bottom: 1px solid #333;font-size:11px;padding-top: 10px;">
          <?=$data_lengkap_asesi->alamat_company?>
        </td>
      </tr>

      <tr>
        <td style="width:3%;border:none;"></td>
        <td style="width:27%;border:none;"></td>
        <td style="width:1%;border:none;"></td>
        <td style=""></td>
        <td style=""></td>
        <td style="text-align:right;">Kode Pos <font style="margin-left:8px;padding-top: 10px;">:</font></td>
        <td style="border-bottom: 1px solid #333;text-align:right;padding-top: 10px;">
          <?=$data_lengkap_asesi->kode_pos_company?>
        </td>
      </tr>
      <tr class="acuan4_2colmax68">
        <td style="width:3%;padding-top: 10px;"></td>
        <td style="width:27%;padding-top: 10px;">No. Telepon/Fax/E-mail</td>
        <td style="width:1%;padding-top: 10px;">:</td>
        <td style="padding-top: 10px;">Telp <font style="margin-left:3px;">:</font></td>
        <td style="border-bottom: 1px solid #333;padding-top: 10px;">
          <?= $data_asesi->telp_company ?>
        </td>
        <td style="width:20%;text-align:right;padding-top: 10px;">Fax <font style="margin-left:43px;">:</font></td>
        <td style="width:18%;border-bottom: 1px solid #333;padding-top: 10px;"><?="-"?></td>
      </tr>
      <tr class="acuan4_2colmax68">
        <td style="width:3%;"></td>
        <td style="width:27%;"></td>
        <td style="width:1%;"></td>
        <td style="padding-top: 10px;" >E-mail <font style="margin-left:8px;">:</font></td>
        <td colspan="3" style=";border-bottom: 1px solid #333;padding-top: 10px;">
          <?= $data_asesi->email_company ?>
        </td>
      </tr>
    </table>
</page>

<br>

<page backtop="15mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left; width: 5%"><img src="<?php echo FCPATH.'assets/img/logo48.png';?>" alt="" style="width:33px;"></td>
                <td style="text-align: left; width: 64%;font-weight: lighter;">
                    <?=$aplikasi->nama_unit?>
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
      <table style="width:92%; border:none; padding-left:45px;">
        <tr style="border:none; border-top: 1px solid #333;">
          <td style="width: 90%; border:none; border-top: 1px solid #333; font-size: 8pt; text-transform:uppercase;"><?=$aplikasi->nama_unit?> | <?=$aplikasi->alamat?> <?=$aplikasi->no_telpon?></td>
          <td style="width:10%; text-align:center; border-top: 1px solid #333; color: white; background-color: #f44758;">[[page_cu]]</td>
        </tr>
      </table>
    </page_footer>

    <span style="font-size:11pt; font-weight:bold;">Bagian 2 : Data Sertifikasi</span>
    <br>
    <br>
    <div style="text-align:justify;">Tuliskan Judul dan Nomor Skema Sertifikasi, Tujuan Asesmen serta Daftar Unit Kompetensi sesuai kemasan pada skema sertifikasi yang anda ajukan untuk mendapatkan pengakuan sesuai dengan latar belakang pendidikan, pelatihan serta pengalaman kerja yang anda miliki.</div>
    <br>

    <table style="width:100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
      <tr nobr="true">
        <td rowspan="2" style=" text-align:center; font-size:11px;">Skema Sertifikasi <br> (KKNI/Okupasi/Klaster)</td>
        <td style=" font-size:11px; text-align:center;">Judul</td>
        <td>:</td>
        <td colspan="6" style=" font-size:11px; width:408px;">
          <?= $data_asesi->skema  ?>
        </td>
      </tr>
      <tr>
        <td style=" font-size:11px; text-align:center; border-left:0px;">Nomor</td>
        <td>:</td>
        <td colspan="6" style=" font-size:11px;"><?= $data_asesi->kode_skema ?></td>
      </tr>
      <tr>
        <td colspan="2" style=" font-size:11px;">Tujuan Asesmen</td>
        <td>:</td>
        <!-- is_perpanjangan -->
        <td style="font-size:8pt;">
          <img style="width:14px;" src="<?= FCPATH.'assets/img/'.(isset($data_asesi->is_perpanjangan) && $data_asesi->is_perpanjangan == 1?"uncheck":"checked").'.png'; ?>"> Sertifikasi
        </td>
        <td style="font-size:8pt;">
          <img style="width:14px;" src="<?= FCPATH.'assets/img/'.(isset($data_asesi->is_perpanjangan) && $data_asesi->is_perpanjangan == 0?"uncheck":"checked").'.png'; ?>"> Sertifikasi Ulang
        </td>
        <td style="font-size:8pt;"><img src="<?= FCPATH.'assets/img/uncheck.png'; ?>" alt="" style="width:14px;"> PKT</td>
        <td style="font-size:8pt;"><img src="<?= FCPATH.'assets/img/uncheck.png'; ?>" alt="" style="width:14px;"> RPL</td>
        <td style="font-size:8pt;"><img src="<?= FCPATH.'assets/img/uncheck.png'; ?>" alt="" style="width:14px;"> Lainnya</td>
      </tr>
    </table>
    <br/>
    <span style="font-size:11pt; font-weight:bold;">Daftar Unit Kompetensi sesuai kemasan:</span>
    <table  style="width: 100%;border: solid 1px ; border-collapse: collapse; margin-top: 25px;" cellpadding="3"   >
        <thead>
            <tr>
                <th style="width: 5%; text-align: left; border: solid 1px;text-align:center;background-color: #FF8C00; ">No</th>
                <th style="width: 20%; text-align: left; border: solid 1px;text-align:center;background-color: #FF8C00; ">Kode Unit Kompetensi</th>
                <th style="width: 45%; text-align: left; border: solid 1px;text-align:center;background-color: #FF8C00; ">Unit Kompetensi</th>
                <th style="width: 30%; text-align: left; border: solid 1px;text-align:center;background-color: #FF8C00; ">
                  Jenis Standar <br>
                  <font style="font-size:11px">(Standar Khusus / Standar Internasional / SKKNI)</font>
                </th>
            </tr>
        </thead>
        <tbody>
          <?php
              foreach ($unit_kompetensi as $key=>$value) {
          ?>
            <tr>
                <td style="width: 5%; text-align: center; border: solid 1px ;">
                    <?=$key+1?>
                </td>
                <td style="width: 20%; text-align: center; border: solid 1px ">
                    <?=$value->id_unit_kompetensi?>
                </td>
                <td style="width: 45%; text-align: left; border: solid 1px ">
                    <?=$value->unit_kompetensi?></td>
                <td style="width: 30%; text-align: center; border: solid 1px ">
                    SKKNI</td>
            </tr>
          <?php
              }
          ?>
        </tbody>

    </table>
</page>

<page backtop="15mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left; width: 5%"><img src="<?php echo FCPATH.'assets/img/logo48.png';?>" alt="" style="width:33px;"></td>
                <td style="text-align: left; width: 64%;font-weight: lighter;">
                    <?=$aplikasi->nama_unit?>
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
      <table style="width:92%; border:none; padding-left:45px;">
        <tr style="border:none; border-top: 1px solid #333;">
          <td style="width: 90%; border:none; border-top: 1px solid #333; font-size: 8pt; text-transform:uppercase;"><?=$aplikasi->nama_unit?> | <?=$aplikasi->alamat?> <?=$aplikasi->no_telpon?></td>
          <td style="width:10%; text-align:center; border-top: 1px solid #333; color: white; background-color: #f44758;">[[page_cu]]</td>
        </tr>
      </table>
    </page_footer>

    <span style="font-size:11pt; font-weight:bold;">Bagian  3 :  Bukti Kelengkapan Pemohon</span>
    <br>
    <br>
    <div style="text-align:justify;" class="tx-bold">a. Bukti persyaratan dasar pemohon :</div>
    <br>

    <table style="width:100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;" >
      <tr>
        <td style="text-align:center; font-weight:bold; width:8px; background-color: #FF8C00;font-size:12px;" rowspan="2">No.</td>
        <td style="text-align:center; font-weight:bold; width:252px; background-color: #FF8C00;font-size:12px;" rowspan="2">Bukti Persyaratan Dasar</td>
        <td style="text-align:center; font-weight:bold; background-color: #FF8C00;font-size:12px;" colspan="2">Ada</td>
        <td style="text-align:center; font-weight:bold; width:110px; background-color: #FF8C00;font-size:12px;" rowspan="2">Tidak Ada</td>
      </tr>
      <tr>
        <td style="text-align: center; font-weight:bold; width:70px; background-color: #FF8C00;font-size:12px; border-left:0px;">memenuhi<br>syarat</td>
        <td style="text-align: center; font-weight:bold; width:70px; background-color: #FF8C00;font-size:12px;">tidak<br>memenuhi<br>syarat </td>
      </tr>

    <?php
      $validitasdokumen = is_null($data_asesi->validitas_dokumen) ? array() : unserialize($data_asesi->validitas_dokumen);
      $valdokumen = unserialize($data_asesi->validitas_dokumen);
      foreach ($pendukung as $keyp => $pendukung) {
    ?>

      <tr>
        <td style="text-align: center;font-size:12px;"><?=($keyp+1)?></td>
        <td style="text-align:justify;font-size:12px;">
          <?=ucwords($pendukung)?>
        </td>
        <td style="text-align:center;">
          <img style="width:14px;" src="<?= FCPATH.'assets/img/'.(isset($valdokumen[$pendukung]) && $valdokumen[$pendukung] == 1?"cl":"uncheck").'.png'; ?>">
        </td>
        <td style="text-align:center;;">
          <img style="width:14px;" src="<?= FCPATH.'assets/img/'.(isset($valdokumen[$pendukung]) && $valdokumen[$pendukung] == 1?"uncheck":"uncheck").'.png'; ?>">
        </td>
        <td style="text-align:center;">
          <!-- <img style="width:14px;" src="<?= FCPATH.'assets/img/'.(isset($valdokumen[$keyb])?"uncheck":"cl").'.png'; ?>"> -->
        </td>
      </tr>

    <?php } ?>

    </table><br>


    <?php
      $total = $total_portofolio+$total_tambahan;
      if ($total > 0) {
    ?>

    <div style="text-align:justify;" class="tx-bold">b. Bukti kompetensi yang relevan : </div>
    <br>
    <table style="width:100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
      <tr>
        <th style="background-color: #FF8C00; width:8px;font-size:12px;" rowspan="2">No.</th>
        <th style="width:480px; background-color: #FF8C00;font-size:12px;" rowspan="2">Rincian Bukti Pendidikan / Pelatihan, Pengalaman Kerja, Pengalaman Hidup  </th>
        <th style="width:40px; background-color: #FF8C00;font-size:12px;text-align:center;" colspan="2">Lampiran Bukti*</th>
      </tr>
      <tr>
        <th style="background-color: #FF8C00; width:20px;font-size:12px;text-align:center;border-left:0px;">Ada</th>
        <th style="background-color: #FF8C00;font-size:12px;text-align:center;">Tidak<br>ada</th>
      </tr>

      <?php
        $no = 1;
        $no_t = 0;
        foreach ($tambahan as $keyt => $tambahan) {
          $nama_tambahan = str_replace('_', ' ', $tambahan);
          $kodetambahan = str_replace(' ', '_', strtoupper($kd_bukti[$tambahan]));
          $jenis_tambahan = str_replace(' ', '_', $kd_bukti[$tambahan].'-'.($no_t++));
      ?>

        <tr>
          <td style="font-size:12px;text-align:center;"><?= $no ?>.</td>
          <td style="font-size:12px;"><?= $jenis_kode_bukti[$kodetambahan].' '.ucwords(' <b>('.strtoupper($nama_tambahan).')</b>') ?></td>
          <td style="text-align:center;">
              <img style="width:15px;" src="<?= FCPATH.'assets/img/'.(isset($valdokumen[$jenis_tambahan]) && $valdokumen[$jenis_tambahan] == 1?"cl":"uncheck").'.png'; ?>">
          </td>
          <td style="text-align:center;">
              <img style="width:15px;" src="<?= FCPATH.'assets/img/'.(isset($valdokumen[$jenis_tambahan]) && $valdokumen[$jenis_tambahan] == 1?"uncheck":"uncheck").'.png'; ?>">
          </td>
        </tr>

      <?php
        $no++;
      ?>

      <?php $no_p++;} ?>
    </table> <br>
    <?php } ?>

    <table style="width:100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
      <tr nobr="true">
        <td rowspan="3" style="width:50%;vertical-align:top; font-size:10pt;">
          <b>Rekomendasi (diisi oleh LSP):</b> <br><br>

          <font style="font-size:12px;margin:9px 0 0 0;">Berdasarkan ketentuan persyaratan dasar, maka pemohon : <br>
            <?=
              $data_asesi->rekomendasi_permohonan == '1' ?
                "<b>Diterima / <font style='text-decoration: line-through;'>Tidak diterima</font></b>":
                "<b><font style='text-decoration: line-through;'>Diterima</font> / Tidak diterima</b>";
            ?> sebagai peserta  sertifikasi <br><br>
            * coret yang tidak sesuai
          </font>

        </td>
        <td class="tx-bold" colspan="2" style="font-size:10pt;">Pemohon :</td>
      </tr>

      <tr nobr="true">
        <td style="width:25%;border-left:0px"> Nama </td>
        <td style="width:25%;font-size:12px;"> <?=$data_asesi->nama_lengkap?> </td>
      </tr>

      <tr nobr="true">
        <td style="font-size:11px;padding: 55px 0 0 3px;border-left:0px"> Tanda Tangan / Tanggal </td>
        <td style="height: 35px;">
          <qrcode value="<?php echo $qr_asesi; ?>" ec="Q" style="width: 13mm;"></qrcode><br/>
          <font style="font-size:11px;margin: 5px 0 0 0;"><?= tgl_indo($data_asesi->u_date_create) ?></font>
        </td>
      </tr>

      <tr nobr="true">
        <td rowspan="4" style="vertical-align: text-top; width:50%">
          <strong>Catatan : </strong> <br><br>
          <?=$data_asesi->catatan_rekomendasi_apl01?>
        </td>
        <td colspan="2"> <strong>Asesor /Admin LSP  :</strong> </td>
      </tr>

      <tr nobr="true">
        <td style="border-left:0px;"> Nama </td>
        <td style="font-size:12px;">
          <?php
            if ($asesor_pra_asesmen->users == "Administrator") {
              echo "Admin LSP";
              $noreg = "-";
            }else {
              echo $asesor_pra_asesmen->users;
              $noreg = $asesor_pra_asesmen->no_reg;
            }
          ?>
        </td>
      </tr>

      <tr nobr="true">
        <td style="border-left:0px;"> No.Reg </td>
        <td> <?= $noreg ?> </td>
      </tr>

      <tr nobr="true">
        <td style="font-size:11px;padding: 55px 0 0 3px;border-left:0px"> <font>Tanda Tangan / Tanggal</font> </td>
        <td style="height: 35px;">
          <qrcode value="<?php echo $ttd_asesor; ?>" ec="Q" style="width: 13mm;"></qrcode><br/>
          <font style="font-size:11px;margin: 5px 0 0 0;"><?= tgl_indo($data_asesi->pra_asesmen_date) ?></font>
        </td>
      </tr>
    </table>

</page>
