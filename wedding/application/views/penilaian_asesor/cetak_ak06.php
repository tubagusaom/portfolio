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
.tx-top{
  vertical-align: top;}
.tx-bold{
  font-weight: bold;
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
    <span style="font-size:11pt; font-weight:bold;">FR-AK-06  : Meninjau Proses Asesmen</span>
    <br/>
    <br/>
    <table style="width:100%;" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
      <tr>
        <td rowspan="2" style="width:30%;">Skema Sertifikasi <br/> (KKNI/Okupasi/Klaster)</td>
        <td style="width:15%;" >Judul</td>
        <td>:</td>
        <td style="width:52%;"><?= $data_asesi->skema ?></td>
      </tr>
      <tr>
        <td style="width:15%; border-left:0px;" >Nomor</td>
        <td>:</td>
        <td style="width:52%;"><?= $data_asesi->kode_skema ?></td>
      </tr>
      <tr>
        <td colspan="2" style="color:black; width:25%;">TUK</td>
        <td>:</td>
        <td style="width:52%;"><?= $data_asesi->tuk ?>(<?=$data_asesi->jenis_tuk?>)</td>
      </tr>
      <tr>
        <td colspan="2" style="color:black; width:25%;">Nama Asesor</td>
        <td>:</td>
        <td style="width:52%;"><?=$detail_asesor->users?></td>
      </tr>
      <tr>
        <td colspan="2" style="color:black; width:25%;">Tanggal</td>
        <td>:</td>
        <td style="width:52%;"><?= tgl_indo($data_asesi->tanggal) ?></td>
      </tr>
      </table>
      <br/>
      <table style="width:100%;border-collapse: collapse;" border="1"  >
        <tr>
          <td style="width:99%;"><strong> Penjelasan :</strong>
            <ol>
              <li>Peninjauan seharusnya dilakukan oleh asesor yang mensupervisi implementasi asesmen.</li>
              <li>Jika tinjauan dilakukan oleh asesor lain, tinjauan akan dilakukan setelah seluruh proses implementasi asesmen telah selesai.</li>
              <li>Peninjauan dapat dilakukan secara terpadu dalam skema sertifikasi dan / atau peserta kelompok yang homogen.</li>
            </ol> 
          </td>
        </tr>
      </table>
      <br>

<table style="width:100%;border-collapse: collapse;" border="1"  >
  <tr align="center">
    <td style="width:55%;" rowspan="2"><strong> Aspek yang ditinjau</strong></td>
    <td colspan="4" style="width:45%;"><strong> Kesesuaian dengan prinsip asesmen</strong></td>
  </tr>
  <tr align="center">
    <td style="width:11%;border-left:0px;"><em>Validitas</em></td>
    <td style="width:11%;"><em>Reliabel</em></td>
    <td style="width:11%;"><em>Fleksibel</em></td>
    <td style="width:12%;"><em>Adil</em></td>
  </tr>
  <tr>
    <td><p><strong> Prosedur Asesmen:</strong></p>
    <p> • Rencana asesmen</p></td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[0]) && $mak07[0] =='on' ? 'checked' :'uncheck').'.png';?>" alt=""></td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[1]) && $mak07[1] =='on' ? 'checked' :'uncheck').'.png';?>" alt=""></td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[2]) && $mak07[2] =='on' ? 'checked' :'uncheck').'.png';?>" alt=""></td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[3]) && $mak07[3] =='on' ? 'checked' :'uncheck').'.png';?>" alt=""></td>
  </tr>
  <tr>
    <td> • Persiapan asesmen </td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[4]) && $mak07[4] =='on' ? 'checked' :'uncheck').'.png'; ?>" alt=""></td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[5]) && $mak07[5] =='on' ? 'checked' :'uncheck').'.png'; ?>" alt=""></td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[6]) && $mak07[6] =='on' ? 'checked' :'uncheck').'.png'; ?>" alt=""></td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[7]) && $mak07[7] =='on' ? 'checked' :'uncheck').'.png'; ?>" alt=""></td>  
  </tr>
  <tr>
    <td> • Implementasi asesmen</td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[8]) && $mak07[8] =='on' ? 'checked' :'uncheck').'.png'; ?>" alt=""></td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[9]) && $mak07[9] =='on' ? 'checked' :'uncheck').'.png'; ?>" alt=""></td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[10]) && $mak07[10] =='on' ? 'checked' :'uncheck').'.png'; ?>" alt=""></td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[11]) && $mak07[11] =='on' ? 'checked' :'uncheck').'.png'; ?>" alt=""></td>  
  </tr>
  <tr>
    <td> • Keputusan asesmen</td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[12]) && $mak07[12] =='on' ? 'checked' :'uncheck').'.png'; ?>" alt=""></td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[13]) && $mak07[13] =='on' ? 'checked' :'uncheck').'.png'; ?>" alt=""></td>  
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[14]) && $mak07[14] =='on' ? 'checked' :'uncheck').'.png'; ?>" alt=""></td>  
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[15]) && $mak07[15] =='on' ? 'checked' :'uncheck').'.png'; ?>" alt=""></td>
  </tr>
  <tr>
    <td> • Umpan balik asesmen</td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[16]) && $mak07[16] =='on' ? 'checked' :'uncheck').'.png'; ?>" alt=""></td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[17]) && $mak07[17] =='on' ? 'checked' :'uncheck').'.png'; ?>" alt=""></td>  
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[18]) && $mak07[18] =='on' ? 'checked' :'uncheck').'.png'; ?>" alt=""></td>  
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[19]) && $mak07[19] =='on' ? 'checked' :'uncheck').'.png'; ?>" alt=""></td>
  </tr>
  <tr>
    <td colspan="5" class="tx-top" style="height: 40px;"> Rekomendasi untuk peningkatan : <br/><?php echo (isset($mak07[20])?$mak07[20]:''); ?>
    </td>
  </tr>
</table>

<br>
<table style="width:100%;border-collapse: collapse;" border="1"  >
 <tr align="center">
    <td style="width:45%;" rowspan="2"><strong> Aspek yang ditinjau</strong></td>
    <td colspan="5" style="width:45%;"><strong> Pemenuhan dimensi kompetensi</strong></td>
  </tr>
  <tr align="center">
    <td style="width:11%;font-size: 10px;border-left:0px;"><em>Task Skill</em></td>
    <td style="width:11%;font-size: 10px;"><em>Task Management Skill</em></td>
    <td style="width:11%;font-size: 10px;"><em>Contingency Management Skill</em></td>
    <td style="width:11%;font-size: 10px;"><em>Jobe Role/<br/>Environment Management Skill</em></td>
    <td style="width:11%;font-size: 10px;"><em>Transfer Skill</em></td>

  </tr>
  <tr>
    <td style="width:45%;"><p><strong> Konsistensi keputusan asesmen</strong></p>
      <p>&nbsp; Bukti dari berbagai asesmen diperiksa untuk konsistensi dimensi kompetensi  </p>
      <p>&nbsp; </p>
    </td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[24]) && $mak07[24] =='on' ? 'checked' :'uncheck').'.png';  ?>" alt=""></td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[25]) && $mak07[25] =='on' ? 'checked' :'uncheck').'.png';  ?>" alt=""></td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[26]) && $mak07[26] =='on' ? 'checked' :'uncheck').'.png';  ?>" alt=""></td>
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[27]) && $mak07[27] =='on' ? 'checked' :'uncheck').'.png';  ?>" alt=""></td>  
    <td style="width:5%;" class="tx-center"><img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak07[28]) && $mak07[28] =='on' ? 'checked' :'uncheck').'.png';  ?>" alt=""></td>  

  </tr>
  <tr>
    <td colspan="6" class="tx-top" style="height: 40px;"> Rekomendasi untuk peningkatan :<br/><?php echo (isset($mak07[29])?$mak07[29]:''); ?>
    </td>
  </tr>
</table>
<br/><br/>
<table style="width:100%;" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
    <tr>
      <td class="tx-center" style="width:33%;"><strong>Nama Peninjau</strong></td>
      <td class="tx-center" style="width:33%;"><strong>Tanggal & Tanda Tangan Peninjau</strong></td>
      <td class="tx-center" style="width:33%;"><strong>Komentar</strong></td>
    </tr>
    <tr>
    <td class="tx-center" style="height: 40px;"><?=$aplikasi->manajer_sertifikasi?></td>
      <td class="tx-center" style="height: 40px;"><qrcode value="<?php echo $ttd_manajer; ?>" ec="Q" style="width: 15mm;"></qrcode><br/><?=tgl_indo($data_asesi->tanggal_akhir)?></td>
      <td class="tx-center" style="height: 40px;">&nbsp;</td>
    </tr>
    </table>
        
</page>