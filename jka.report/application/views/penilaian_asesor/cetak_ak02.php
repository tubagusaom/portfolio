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


<page backtop="20mm" backbottom="10mm" backleft="18mm" backright="18mm">
    <page_header>
            <table style="width:100%;">
              <tr>
              <td style="text-align: left; width: 5%"><img src="<?= FCPATH.'assets/img/logo48.png'; ?>" alt="" style="width:50px;"></td>
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

    <span style="font-size:11pt; font-weight:bold;">FR.AK.02. FORMULIR REKAMAN ASESMEN KOMPETENSI</span>
    <br>
    <br>
    <table style="width:100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
    <tr>
        <td class="tx-bold" style="width:33%;">Nama Asesi</td>
        <td class="tx-center" style="width:3%;">:</td>
        <td style="width:65%;"><?= $data_asesi->nama_lengkap ?></td>
      </tr>
      <tr>
        <td class="tx-bold" style="width:33%;">Nama Asesor</td>
        <td class="tx-center" style="width:3%;">:</td>
        <td style="width:65%;"><?= $asesor_pra_asesmen->users ?></td>
      </tr>
      <tr>
        <td class="tx-bold" style="width:33%;">Skema Sertifikasi</td>
        <td class="tx-center" style="width:3%;">:</td>
        <td style="width:65%;"><?= $data_asesi->skema ?></td>
      </tr>
      <tr>
        <td class="tx-bold" style="width:33%;">Kode dan Judul Unit Kompetensi</td>
        <td class="tx-center" style="width:3%;">:</td>
        <td style="width:65%;"><?=$kode_unit?><br/><?=$unit?></td>
      </tr>
      <tr>
        <td class="tx-bold" style="width:33%;">Tanggal Mulai Asesmen</td>
        <td class="tx-center" style="width:3%;">:</td>
        <td style="width:65%;"><?= tgl_indo($data_asesi->tanggal) ?></td>
      </tr>
      <tr>
        <td class="tx-bold" style="width:33%;">Tanggal Selesai Asesmen</td>
        <td class="tx-center" style="width:3%;">:</td>
        <td style="width:65%;"><?= tgl_indo($data_asesi->tanggal_akhir) ?></td>
      </tr>
    </table>
    <br>
    <br>
    <div style="width:100%;">Beri tanda centang (<img style="width:16px;" src="<?= FCPATH.'assets/img/cl.png'; ?>" alt="">) di kolom yang sesuai untuk mencerminkan bukti yang diperoleh untuk menentukan Kompetensi siswa untuk setiap unit kompetensi.</div>
    <br>
    <table style="width:100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
      <tr>
        <td style="width:37%; height:100px;" class="tx-center bd-b">Unit Kompetensi</td>
        <td style="width:9%; padding:0px; font-size:7pt;" class="tx-center">Observasi Demonstrasi</td>
        <td style="width:9%; padding:0px; font-size:7pt; height:100px;" class="tx-center">Portofolio</td>
        <td style="width:9%; padding:0px; font-size:7pt; height:100px;" class="tx-center">Pernyataan Pihak Ketiga Pertanyaan Wawancara</td>
        <td style="width:9%; padding:0px; font-size:7pt; height:100px;" class="tx-center">Pertanyaan Lisan</td>
        <td style="width:9%; padding:0px; font-size:7pt; height:100px;" class="tx-center">Pertanyaan Tertulis</td>
        <td style="width:9%; padding:0px; font-size:7pt; height:100px;" class="tx-center">Proyek Kerja</td>
        <td style="width:9%; padding:0px; font-size:7pt; height:100px;" class="tx-center">Lainnya</td>
      </tr>
      <?php
       foreach ($unit_kompetensi as $keys => $unitt): ?>
      <tr>
        <td style="width:37%;">
          <b><?= $unitt->id_unit_kompetensi ?></b> <br> <?= $unitt->unit_kompetensi ?>
        </td>

        <td style="width:9%;" class="tx-center">
        <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($frak02["1".$keys]) && $frak02["1".$keys] == 1?"checked":"uncheck").'.png'; ?>" alt="">
        </td>
        <td style="width:9%;" class="tx-center">
          <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($frak02["2".$keys]) && $frak02["2".$keys] == 2?"checked":"uncheck").'.png'; ?>" alt="">
        </td>
        <td style="width:9%;" class="tx-center">
          <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($frak02["3".$keys]) && $frak02["3".$keys] == 3?"checked":"uncheck").'.png'; ?>" alt="">
        </td>
        <td style="width:9%;" class="tx-center">
          <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($frak02["4".$keys]) && $frak02["4".$keys] == 4?"checked":"uncheck").'.png'; ?>" alt="">
        </td>
        <td style="width:9%;" class="tx-center">
          <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($frak02["5".$keys]) && $frak02["5".$keys] == 5?"checked":"uncheck").'.png'; ?>" alt="">
        </td>
        <td style="width:9%;" class="tx-center">
          <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($frak02["6".$keys]) && $frak02["6".$keys] == 6?"checked":"uncheck").'.png'; ?>" alt="">
        </td>
        <td style="width:9%;" class="tx-center">
          <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($frak02["7".$keys]) && $frak02["7".$keys] == 7?"checked":"uncheck").'.png'; ?>" alt="">
        </td>

      </tr>
      <?php endforeach; ?>
      <tr>
        <td class="tx-bold" style="width:37%;">Rekomendasi hasil asesmen</td>
        <td colspan="7" style="width:63%;">
        <?php if($data_asesi->rekomendasi_asesor == '0'){
          echo "";
        }elseif($data_asesi->rekomendasi_asesor == '1'){
          echo "KOMPETEN";
        }else{
          echo "BELUM KOMPETEN";
        }?>
        </td>
      </tr>
      <tr>
        <td class="tx-bold" style="width:37%;">Tindak lanjut yang dibutuhkan</td>
        <td colspan="7" style="width:63%;"><?=$data_asesi->rekomendasi_description ?></td>
      </tr>
      <tr>
        <td class="tx-bold" style="width:37%;">Komentar/Observasi oleh <br> asesor</td>
        <td colspan="7" style="width:63%;"><?=$data_asesi->komentar_observasi ?></td>
      </tr>
    </table>
    <table style="width:100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
      <tr>
        <td class="tx-center" style="width:25%; height:30px; background-color: #D9D9D9;">Tanda Tangan Asesi</td>
        <td style="width:25%;" >
          <qrcode value="<?php echo $qr_asesi; ?>" ec="Q" style="width: 15mm;"></qrcode>
        </td>
        <td class="tx-center" style="width:25%; height:30px;  background-color: #D9D9D9;">Tanggal:</td>
        <td class="tx-center" style="width:25%;"><?= tgl_indo($data_asesi->tanggal_akhir) ?></td>
      </tr>
      <tr>
        <td class="tx-center" style="width:25%; height:30px; background-color: #D9D9D9;">Tanda Tangan Asesor</td>
        <td style="width:25%;">
          <qrcode value="<?php echo $ttd_asesor_uji; ?>" ec="Q" style="width: 15mm;"></qrcode>
        </td>
        <td class="tx-center" style="width:25%; height:30px; background-color: #D9D9D9;">Tanggal:</td>
        <td class="tx-center" style="width:25%;"><?= tgl_indo($data_asesi->tanggal_akhir) ?></td>
      </tr>
    </table>
</page>
