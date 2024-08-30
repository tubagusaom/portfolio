<style>
*{
  font-family: arial;
  line-height:1.0;
}
td,th{
    padding: 1.5mm;
}
div,p{
    font-family: arial;
}

/* table.border, tr, td{
  border-collapse: collapse;
  border: 1px solid #555;
  z-index: 1;
} */
.bd-all{
  border:3px solid #333;
}
.bd-l{
  border-left:2px solid #333;
}
.bd-r{
  border-right:2px solid #333;
}
.bd-t{
  border-top:2px solid #333;
}
.bd-b{
  border-bottom:2px solid #333;
}
.bd-0{
  border:2px solid white;
}
.bd-l-0{
  border-left:2px solid white;
}
.bd-r-0{
  border-right:2px solid white;
}
.bd-t-0{
  border-top:2px solid white;
}
.bd-b-0{
  border-bottom:2px solid white;
}
.tx-center{
  text-align:center;
}
.tx-bold{
  font-weight: bold;
}

</style>


<page backtop="15mm" backbottom="15mm" backleft="18mm" backright="18mm">
    <page_header>
            <table style="width:100%;">
              <tr>
              <td style="text-align: left; width: 5%"><img src="<?= FCPATH.'assets/img/logo48.png'; ?>" alt="" style="width:33px;"></td>
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

    <span style="font-size:11pt; font-weight:bold;">FR.APL-02. ASESMEN MANDIRI</span>
    <br>
    <br>
    <table style="width:100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
      <tr>
        <td rowspan="2" style=" text-align:center; font-size:11pt;">Skema Sertifikasi <br> (KKNI/Okupasi/Klaster)</td>
        <td style=" font-size:11pt; text-align:center;">Judul</td>
        <td>:</td>
        <td colspan="6" style=" font-size:11pt; width:63%;"><?= $data_asesi->skema  ?></td>
      </tr>
      <tr>
        <td style=" font-size:11pt; text-align:center;border-left:0px;">Nomor</td>
        <td>:</td>
        <td style=" font-size:11pt;"><?= $data_asesi->kode_skema ?></td>
      </tr>
    </table>
    <br>
    <table style="width:100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
      <tr>
        <td style="width:598px; background-color: #FF8C00;">PANDUAN ASESMEN MANDIRI</td>
      </tr>
      <tr>
        <td style="width:598px;">
          <b>Instruksi:</b> <br>
          <ul>
            <li>Baca setiap pertanyaan di kolom sebelah kiri</li>
            <li>Beri tanda centang (<img style="width:16px;" src="<?= FCPATH.'assets/img/checked.png'; ?>" alt="">) pada kotak jika Anda yakin dapat melakukan tugas yang dijelaskan.</li>
            <li>Isi kolom di sebelah kanan dengan mendaftar bukti yang Anda miliki untuk menunjukkan bahwa Anda melakukan tugas-tugas ini.</li>
          </ul>
        </td>
      </tr>
      <?php
      foreach ($unit_kompetensi as $key => $unit):
        $elemen = $this->asesi_model->elemen($unit->id_unit_kompetensi);
      {?>
    <tr>
        <td colspan="4" class="tx-bold" style=" font-size:11pt; width:161px" >Kode Unit : <?=$unit->id_unit_kompetensi?></td>
      </tr>
      <tr>
        <td colspan="4" class="tx-bold" style=" font-size:11pt; width:161px">Judul Unit : <?=$unit->unit_kompetensi?></td>
      </tr>
      <?php } ?>
    </table>

      <?php
        $validitasdokumen = is_null($data_asesi->pilihan_bukti_pendukung) ? array() : unserialize($data_asesi->pilihan_bukti_pendukung);
        $valdokumen = unserialize($data_asesi->pilihan_bukti_pendukung);
      ?>

    <table style="width:100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
      <tr>
        <td class="tx-bold" style="width:333px;">Dapatkah saya?</td>
        <td class="tx-bold tx-center" style="width:15px;">K</td>
        <td class="tx-bold tx-center" style="width:15px;">BK</td>
        <td class="tx-bold tx-center" style="width:159px;">Bukti</td>
      </tr>

      <?php
        $no_elemen = 1;
        foreach ($elemen as $key => $elemen) :
            $query_kuk = $this->asesi_model->kuk($elemen->id);
        ?>
        <tr>
          <td style="width:333px;"><b><?= $no_elemen  ?>. Elemen  : <?= $elemen->elemen_kompetensi ?> </b><br> <br>
          • Kriteria Unjuk Kerja:
            <?php
              foreach ($query_kuk as $key => $kuk) :

            ?>
              <p><?=$no_elemen.'.'.($key + 1).'. '.$kuk->kuk ?></p>
              <?php endforeach; ?>
          </td>
          <td class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/checked.png'; ?>"></td>
          <td class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/uncheck.png'; ?>"></td>
          <td class="" style="width:140px;"> 
          <?php 
          foreach ($valdokumen as $keyy => $bukti_pilihan):?>
          
          <?php endforeach;?></td>
        </tr>
      <?php $no_elemen++; endforeach; ?>
      <?php endforeach; ?>

    </table>
    <br/>
    <table style="width:100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
      <tr>
        <td style="width:183px; font-size:10pt; vertical-align:top;"><b>Nama Asesi:</b>
          <br>
          <br>
          <br>
          <div class="tx-center">
            <?= ucfirst($data_asesi->nama_lengkap); ?>
          </div>
        </td>
        <td style="width:183px; font-size:10pt; vertical-align:top;"><b>Tanggal:</b>
          <br>
          <br>
          <br>
          <div class="tx-center">
            <?= tgl_indo($data_asesi->tanggal); ?>
          </div>
        </td>
        <td class="tx-btn_modal_update" style="width:183px; vertical-align:top;"><b>Tanda Tangan Asesi:</b>
        <qrcode value="<?php echo $qr_asesi; ?>" ec="Q" style="width: 15mm;"></qrcode>
        </td>
      </tr>

      <tr>
        <td colspan="3" class="tx-bold" style="background-color: #FF8C00;">Ditinjau oleh Asesor</td>
      </tr>
      <tr>
        <td style="width:182px; vertical-align:top;"><b>Nama Asesor:</b>
          <br>
          <br>
          <br>
          <?= ucfirst($asesor_pra_asesmen->users); ?>
        </td>
        <td rowspan="2" style="width:182px; vertical-align:top;"> <b>Rekomendasi:</b> <br> <br>
          <ol type="1">
            <li>Asesmen <b><?= ($data_asesi->pra_asesmen == 1?"dapat / <span style='text-decoration:line-through;'>tidak dapat</span>":"dapat / tidak dapat") ?></b> dilanjutkan </li>
          </ol>
        </td>
        <td style="width:182px; vertical-align:top;"><b>Tanda Tangan Asesor:</b>
        <qrcode value="<?php echo $ttd_asesor; ?>" ec="Q" style="width: 15mm;"></qrcode><br/>
        </td>
      </tr>
      <tr>
        <td style="vertical-align:top;"> <b>Nomor MET Asesor:</b> <br><br>
          <?= $asesor_pra_asesmen->no_reg ?>
        </td>
        <td style="vertical-align:top;"> <b>Tanggal:</b> <br><br>
        <?= tgl_indo($data_asesi->pra_asesmen_date) ?>
        </td>
      </tr>
    </table>
</page>
