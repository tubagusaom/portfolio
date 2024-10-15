<style type="text/css">
*{
  font-family: arial;
  line-height:1.0;
}
td,th{
    padding: 1mm;
}
div,p{
    font-family: arial;
}
.tx-center{
  text-align:center;
}
.tx-top{
  vertical-align: top;
}

</style>
<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
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
    <span style="font-size:11pt; font-weight:bold;">FR-AK-03  : Umpan Balik & Catatan Asesmen</span>
    <br/>
    <br/>
    <table style="width:100%;" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
    <tr>
        <td style="width:20%;">Nama Asesi</td>
        <td>:</td>
        <td style="width:30%;"><?=$data_asesi->nama_lengkap?></td>
        <td style="width:20%;">Hari/Tanggal</td>
        <td>:</td>
        <td style="width:30%;"><?=tgl_indo($data_asesi->tanggal_akhir)?></td>
      </tr>
    <tr>
      <td style="width:20%;">Nama Asesor</td>
      <td>:</td>
      <td style="width:30%;"><?=$asesor_pra_asesmen->users?></td>
      <td class="tx-center" style="width:20%;">Waktu</td>
      <td>:</td>
      <td style="width:30%;"></td>
    </tr>
    </table>
    <br/><br/>
    <strong>Umpan balik dari Asesi (diisi oleh Asesi setelah pengambilan keputusan) :</strong>
    <br/><br/>
    <table style="width:100%;" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
  <tr align="center">
    <td rowspan="2" style="width:44%;">Komponen</td>
    <td colspan="2" style="width:16%;">Hasil</td>
    <td rowspan="2" style="width:40%;">Catatan / Komentar Asesi</td>
  </tr>

  <tr align="center">
    <td style="width:6%; border-left:0px;">Ya</td>
    <td style="width:6%;">Tidak</td>
  </tr>

  <tr>
     <td style="width:44%;">
    <table border="0"  style="border-collapse: collapse;">
      <tr style="text-align:justify;">
        <td style="width:6%;">1. </td>
        <td style="width:90%;">Saya mendapatkan penjelasan yang cukup memadai mengenai proses asesmen/uji kompetensi  </td>
        </tr>
    </table>
    </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[0]) && $mak05[0] == '1'?"checked":"uncheck").'.png'; ?>">
      </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[0]) && $mak05[0] == '0'?"checked":"uncheck").'.png'; ?>">
      </td>
    <td style="width:40%;"><?=(isset($mak05a[0])?$mak05a[0]:'')?></td>
   </tr>
   <tr>
     <td style="width:44%;">
    <table border="0"  style="border-collapse: collapse;">
      <tr style="text-align:justify;">
        <td style="width:6%;">2. </td>
        <td style="width:90%;">Saya diberikan kesempatan untuk mempelajari standar kompetensi yang akan diujikan dan menilai diri sendiri terhadap pencapaiannya </td>
        </tr>
    </table>
    </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[1]) && $mak05[1] == '1'?"checked":"uncheck").'.png'; ?>">
      </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[1]) && $mak05[1] == '0'?"checked":"uncheck").'.png'; ?>">
      </td>
    <td style="width:40%;"><?=(isset($mak05a[1])?$mak05a[1]:'')?></td>
   </tr>
   <tr>
     <td style="width:44%;">
    <table border="0"  style="border-collapse: collapse;">
      <tr style="text-align:justify;">
        <td style="width:6%;">3. </td>
        <td style="width:90%;">Asesor memberikan kesempatan untuk mendiskusikan/menegosiasikan metoda, instrumen dan sumber asesmen serta jadwal asesmen  </td>
        </tr>
    </table>
    </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[2]) && $mak05[2] == '1'?"checked":"uncheck").'.png'; ?>">
      </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[2]) && $mak05[2] == '0'?"checked":"uncheck").'.png'; ?>">
      </td>
    <td style="width:40%;"><?=(isset($mak05a[2])?$mak05a[2]:'')?></td>
   </tr>
  <tr>
     <td style="width:45%;">
    <table border="0"  style="border-collapse: collapse;">
      <tr style="text-align:justify;">
        <td style="width:6%;">4. </td>
        <td style="width:90%;">Asesor berusaha menggali seluruh bukti pendukung yang sesuai dengan latar belakang pelatihan dan pengalaman yang saya miliki </td>
        </tr>
    </table>
    </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[3]) && $mak05[3] == '1'?"checked":"uncheck").'.png'; ?>">
      </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[3]) && $mak05[3] == '0'?"checked":"uncheck").'.png'; ?>">
      </td>
    <td style="width:40%;"><?=(isset($mak05a[3])?$mak05a[3]:'')?></td>
   </tr>
   <tr>
     <td style="width:45%;">
    <table border="0"  style="border-collapse: collapse;">
      <tr style="text-align:justify;">
        <td style="width:6%;">5. </td>
        <td style="width:90%;">Saya sepenuhnya diberikan kesempatan untuk mendemonstrasikan kompetensi yang saya miliki selama asesmen </td>
        </tr>
    </table>
    </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[4]) && $mak05[4] == '1'?"checked":"uncheck").'.png'; ?>">
      </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[4]) && $mak05[4] == '0'?"checked":"uncheck").'.png'; ?>">
      </td>
    <td style="width:40%;"><?=(isset($mak05a[4])?$mak05a[4]:'')?></td>
   </tr>
   <tr>
     <td style="width:45%;">
    <table border="0"  style="border-collapse: collapse;">
      <tr style="text-align:justify;">
        <td style="width:6%;">6. </td>
        <td style="width:90%;">Saya mendapatkan penjelasan yang memadai mengenai keputusan asesmen</td>
        </tr>
    </table>
    </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[5]) && $mak05[5] == '1'?"checked":"uncheck").'.png'; ?>">
      </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[5]) && $mak05[5] == '0'?"checked":"uncheck").'.png'; ?>">
      </td>
    <td style="width:40%;"><?=(isset($mak05a[5])?$mak05a[5]:'')?></td>
   </tr>
   <tr>
     <td style="width:45%;">
    <table border="0"  style="border-collapse: collapse;">
      <tr style="text-align:justify;">
        <td style="width:6%;">7. </td>
        <td style="width:90%;">Asesor memberikan umpan balik yang mendukung setelah asesmen serta tindak lanjutnya </td>
        </tr>
    </table>
    </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[6]) && $mak05[6] == '1'?"checked":"uncheck").'.png'; ?>">
      </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[6]) && $mak05[6] == '0'?"checked":"uncheck").'.png'; ?>">
      </td>
    <td style="width:40%;"><?=(isset($mak05a[6])?$mak05a[6]:'')?></td>
   </tr>
   <tr>
     <td style="width:45%;">
    <table border="0"  style="border-collapse: collapse;">
      <tr style="text-align:justify;">
        <td style="width:6%;">8. </td>
        <td style="width:90%;">Asesor bersama saya mempelajari semua dokumen asesmen serta menandatanganinya </td>
        </tr>
    </table>
    </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[7]) && $mak05[7] == '1'?"checked":"uncheck").'.png'; ?>">
      </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[7]) && $mak05[7] == '0'?"checked":"uncheck").'.png'; ?>">
      </td>
    <td style="width:40%;"><?=(isset($mak05a[7])?$mak05a[7]:'')?></td>
   </tr>
    <tr>
     <td style="width:45%;">
    <table border="0"  style="border-collapse: collapse;">
      <tr style="text-align:justify;">
        <td style="width:6%;">9. </td>
        <td style="width:90%;">Saya mendapatkan jaminan kerahasiaan hasil asesmen serta penjelasan penanganan dokumen asesmen </td>
        </tr>
    </table>
    </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[8]) && $mak05[8] == '1'?"checked":"uncheck").'.png'; ?>">
      </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[8]) && $mak05[8] == '0'?"checked":"uncheck").'.png'; ?>">
      </td>
    <td style="width:40%;"><?=(isset($mak05a[8])?$mak05a[8]:'')?></td>
   </tr>
   <tr>
   <td style="width:45%;">
    <table border="0"  style="border-collapse: collapse;">
      <tr style="text-align:justify;">
        <td style="width:8%;">10. </td>
        <td style="width:90%;">Asesor menggunakan keterampilan komunikasi yang efektif selama asesmen</td>
        </tr>
    </table>
    </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[9]) && $mak05[9] == '1'?"checked":"uncheck").'.png'; ?>">
      </td>
      <td style="width:5%;" class="tx-center">
      <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak05[9]) && $mak05[9] == '0'?"checked":"uncheck").'.png'; ?>">
      </td>
    <td style="width:40%;"><?=(isset($mak05a[9])?$mak05a[9]:'')?></td>
   </tr>
   <tr>
    <td colspan="6" class="tx-top" style="height: 70px;"> Catatan/komentar lainnya (apabila ada) :
    </td>
  </tr>
</table>
        
</page>