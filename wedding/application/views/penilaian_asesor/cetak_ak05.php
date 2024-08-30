<style type="text/css">
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
.tx-top{
  vertical-align: text-top;
}

</style>
<page backtop="15mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 5%"><img src="<?= FCPATH . 'assets/img/logo48.png'; ?>" style="width:50px;"/></td>
                <td style="text-align: left;    width: 54%;font-weight: lighter;"><?= $aplikasi->nama_unit ?></td>

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
    <br/>
    <span style="font-size:11pt; font-weight:bold;">FR-AK-05  :  Laporan Asesmen</span>
    <br/>
    <br/>
    <table style="width:100%;" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
      <tr>
        <td rowspan="2" style="width:30%;">Skema Sertifikasi <br/> (KKNI/Okupasi/Klaster)</td>
        <td style="width:15%;" >Judul</td>
        <td>:</td>
        <td style="width:55%;"><?= $data_asesi->skema ?></td>
      </tr>
      <tr>
        <td style="width:15%; border-left:0px;" >Nomor</td>
        <td>:</td>
        <td style="width:55%;"><?= $data_asesi->kode_skema ?></td>
      </tr>
      <tr>
        <td colspan="2" style="color:black; width:25%;">TUK</td>
        <td>:</td>
        <td style="width:55%;"><?= $data_asesi->tuk ?>(<?=$data_asesi->jenis_tuk?>)</td>
      </tr>
      <tr>
        <td colspan="2" style="color:black; width:25%;">Nama Asesor</td>
        <td>:</td>
        <td style="width:55%;"><?=$detail_asesor->users?></td>
      </tr>
      <tr>
        <td colspan="2" style="color:black; width:25%;">Tanggal</td>
        <td>:</td>
        <td style="width:55%;"><?= tgl_indo($data_asesi->tanggal_akhir) ?></td>
      </tr>
      </table>
      <br/>
      <table style="width:100%;" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
      <tr>
        <td rowspan="2" style="width:30%;">Unit Kompetensi</td>
        <td style="width:15%;" >Kode Unit</td>
        <td>:</td>
        <td style="width:55%;"><?= $kode_unit ?></td>
      </tr>
      <tr>
        <td style="width:15%;border-left:0px;" >Judul Unit</td>
        <td>:</td>
        <td style="width:55%;"><?= $unit ?></td>
      </tr>
    </table>
    <br/>
    <table style="width:100%;" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
    <tr style="text-align:center;">
      <td rowspan="2" class="tx-bold" style="width:5%;">No</td>
      <td rowspan="2" class="tx-bold" style="width:45%;">Nama</td>
      <td colspan="2" class="tx-bold" style="width:16%;">Rekomendasi</td>
      <td rowspan="2" class="tx-bold" style="width:37%;">Keterangan**</td>
    </tr>

    <tr style="text-align:center; border: 1px;">
      <td class="tx-bold" style="width:8%;border-left:0px;">K</td>
      <td class="tx-bold" style="width:8%;">BK</td>
    </tr>
    
      <tr>
      <td style="width:3%;">1.</td>
      <td style="width:8%;"><?=$data_asesi->nama_lengkap?></td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($data_asesi->rekomendasi_asesor) && $data_asesi->rekomendasi_asesor =='1' ? 'checked' :'uncheck').'.png';  ?>" alt="">
      </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($data_asesi->rekomendasi_asesor) && $data_asesi->rekomendasi_asesor =='2' ? 'checked' :'uncheck').'.png';  ?>" alt="">
      </td>
      <td class="tx-center" style="width:8%;"><?php echo implode("<br/>",$mak06a)?></td>
   </tr>
    </table>
    <span>** tuliskan Kode dan Judul Unit Kompetensi yang dinyatakan BK bila mengases satu skema  </span>
    <br/><br/>
    <table style="width:100%;" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
    <tr>
      <td style="width:48%;">Aspek Negatif dan Positif dalam Asesmen</td>
      <td class="tx-center" style="width:55%;"><?php echo (isset($mak06b[0])?$mak06b[0]:''); ?></td>
    </tr>
    <tr>
      <td style="width:48%;">Pencatatan Penolakan Hasil Asesmen	</td>
      <td class="tx-center" style="width:55%;"><?php echo (isset($mak06b[1])?$mak06b[1]:''); ?></td>
    </tr>
    <tr>
      <td style="width:48%;">Saran Perbaikan : (Asesor/Personil Terkait)	</td>
      <td class="tx-center" style="width:55%;"><?php echo (isset($mak06b[2])?$mak06b[2]:''); ?></td>
    </tr>
    </table>
<br/>
    <table style="width:100%;" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
    <tr>
      <td rowspan="4" class="tx-top" style="width:48%;">Catatan :</td>
      <td colspan="2" style="width:15%;">Asesor :</td>
    </tr>
    <tr>
      <td style="width:15%;border-left:0px;">Nama </td>
      <td style="width:40%;"><?=$detail_asesor->users?></td>
    </tr>
    <tr>
      <td style="width:15%;border-left:0px;">	No. Reg.</td>
      <td style="width:40%;"><?=$detail_asesor->no_reg?></td>
    </tr>
    <tr>
      <td style="width:15%;border-left:0px;">Tanda tangan/<br/>Tanggal</td>
      <td style="width:40%;"><qrcode value="<?php echo $ttd_asesor_uji; ?>" ec="Q" style="width: 15mm;"></qrcode> &nbsp;&nbsp;<?= tgl_indo($data_asesi->tanggal_akhir) ?></td>
    </tr>
    </table>
        
</page>