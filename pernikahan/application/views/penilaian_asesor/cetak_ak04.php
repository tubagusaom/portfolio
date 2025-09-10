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
    <span style="font-size:11pt; font-weight:bold;">FR-AK-04  : Banding Asesmen</span>
    <br/>
    <br/>
    <table style="width:100%" border="1"  style="border-collapse: collapse;">
    <tr>
        <td colspan="3" style="width:100%;"> Nama Peserta : <?=strtoupper($data_asesi->nama_lengkap)?></td>

    </tr>
    <tr>
        <td colspan="3" style="width:100%;"> Nama Asesor : <?=$detail_asesor->users?></td>

    </tr>
    <tr>
        <td colspan="3" style="width:100%;"> Tanggal Asesmen :<?=tgl_indo($data_asesi->tanggal);?> </td>

    </tr>
    <tr>
        <td style="width:80%;"> Jawablah dengan <strong>Ya</strong> atau <strong>Tidak</strong> pertanyaan-pertanyaan berikut ini :</td>
        <td style="width:10%; text-align=center;"> YA </td>
        <td style="width:10%; text-align=center;"> TIDAK </td>
    </tr>
    <tr>
        <td style="width:80%;"> Apakah Proses Banding telah dijelaskan kepada Anda? </td>
        <td class="tx-center" style="width:10%;"> <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak02[0]) && $mak02[0] == '1'?"checked":"uncheck").'.png'; ?>"></td>
        <td class="tx-center" style="width:10%;"> <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak02[0]) && $mak02[0] == '0'?"checked":"uncheck").'.png'; ?>">  </td>
    </tr>
    <tr>
        <td style="width:80%;"> Apakah Anda telah mendiskusikan Banding dengan Asesor? </td>
        <td class="tx-center" style="width:10%;"> <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak02[1]) && $mak02[1] == '1'?"checked":"uncheck").'.png'; ?>">  </td>
        <td class="tx-center" style="width:10%;"> <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak02[1]) && $mak02[1] == '0'?"checked":"uncheck").'.png'; ?>">  </td>
    </tr>
    <tr>
        <td style="width:80%;"> Apakah Anda mau melibatkan “orang lain” membantu Anda dalam Proses Banding? </td>
        <td class="tx-center" style="width:10%;"> <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak02[2]) && $mak02[2] == '1'?"checked":"uncheck").'.png'; ?>">  </td>
        <td class="tx-center" style="width:10%;"> <img style="width:16px;" src="<?= FCPATH.'assets/img/'.(isset($mak02[2]) && $mak02[2] == '0'?"checked":"uncheck").'.png'; ?>">  </td>
    </tr>
    <tr>
        <td colspan="3" style="width:100%;">Banding ini diajukan atas Keputusan Asesmen yang dibuat terhadap Skema Sertifikasi (Kualifikasi/Klaster/Okupasi) berikut :
        <br/> Skema Sertifikasi      : <?php if (!empty($mak02a) && !is_null($mak02a)){?>
        <?=$data_asesi->skema?>
         <br/>
         No. Skema Sertifikasi    : <?=$data_asesi->kode_skema?>
         <?php } ?>
</td>
</tr>
<tr>
        <td colspan="3" style="width:100%;"> Banding ini diajukan atas alasan sebagai berikut :<br/>
        <?=$mak02b?>
</td>
</tr>
<tr>
        <td colspan="3" style="width:100%;">Anda mempunyai hak mengajukan banding jika Anda menilai proses asesmen tidak sesuai SOP dan tidak memenuhi Prinsip Asesmen.
    <br/>
</td>
</tr>
<tr>
        <td colspan="3" style="width:100%;">
        <br/>
        <br/>
        Tanda tangan Asesi : <qrcode value="<?php echo $ttd_asesor_uji; ?>" ec="Q" style="width: 15mm;"></qrcode> Tanggal : <?=tgl_indo($data_asesi->tanggal);?>
</td></tr>
</table>
        
</page>