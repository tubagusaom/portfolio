 <page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm" ">
   <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td><img src="<?php echo assets_url().'assets/img/logo48.png';?>" /></td>
                <td style="text-align: left;    width: 54%;font-weight: lighter;"><?= $aplikasi->nama_unit ?></td>

            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 25%"><?= $aplikasi->singkatan_unit ?> :
                </td>
                <td style="text-align: left;    width: 60%"> <?= $aplikasi->alamat ?> <?= $aplikasi->no_telpon ?></td>
                <td style="text-align: right;    width: 17%">Halaman [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer> 
     <h3>FR-MAK-01. FORMULIR PERSETUJUAN ASESMEN DAN KERAHASIAAN</h3>
    <div style="width: 575px; border: 2px solid #000; border-collapse: collapse; padding: 5px; font-size: 15px;">
      Persetujuan Asesmen ini untuk menjamin bahwa Peserta telah diberi arahan secara rinci tentang perencanaan dan proses asesmen
      <hr>
      <table width="100%" style="border-collapse: collapse;" border="1">
        <tr>
          <td rowspan="2" style="width: 25%; text-align: center; padding: 5px;">Skema Sertifikasi / Klaster Asesmen</td>
          <td style="width: 20%; padding: 5px;">Judul</td>
          <td style="width: 5%; text-align: center; padding: 5px;">:</td>
          <td style="width: 50%; padding: 5px;"><strong><?= $skema_sertifikasi->skema ?></strong></td>
        </tr>
        <tr>
          <td style="width: 20%; padding: 5px; border-left: 0px;">Nomor</td>
          <td style="width: 5%; text-align: center;">:</td>
          <td style="width: 50%; padding: 5px;"><strong><?= $skema_sertifikasi->kode_skema ?></strong></td>
        </tr>
        <tr>
          <td colspan="2" style="width: 45%; padding: 5px;">
            TUK
          </td>
          <td style="width: 5%; text-align: center;">:</td>
          <td style="width: 50%; padding: 5px;"><?=$data_asesi->tuk?></td>
        </tr>
        <tr>
          <td colspan="2" style="width: 45%; padding: 5px;">
            Nama Asesor
          </td>
          <td style="width: 5%; text-align: center;">:</td>
          <td style="width: 50%; padding: 5px;"><?=$nama_asesor?></td>
        </tr>   
        <tr>
          <td colspan="2" style="width: 45%; padding: 5px;">
            Nama Peserta
          </td>
          <td style="width: 5%; text-align: center;">:</td>
          <td style="width: 50%; padding: 5px;"><?=strtoupper($data_asesi->nama_lengkap)?></td>
        </tr>   
        <tr>
          <td colspan="2" rowspan="3" style="width: 45%; padding: 5px;">
            Bukti yang akan dikumpulkan :
          </td>
          <td style="width: 5%; text-align: center;">:</td>
          <td style="width: 50%; padding: 5px;">Bukti TL :</td>
        </tr>                  
        <tr>
          <td style="width: 5%; text-align: center; border-left: 0px;">:</td>
          <td style="width: 50%; padding: 5px;">Bukti L : Observasi Demonstrasi (CLO)</td>
        </tr> 
        <tr>
          <td style="width: 5%; text-align: center; border-left: 0px;">:</td>
          <td style="width: 50%; padding: 5px;">Bukti T : Tes Tertulis (DPT)</td>
        </tr> 
        <tr>
          <td colspan="4" width="100%;">
            <b>
              &nbsp;Pelaksanaan asesmen disepakati pada :
              <br>
              &nbsp;&nbsp;Hari/ Tanggal : <?=tgl_indo($data_asesi->tanggal_mulai)?>
              <br>
              &nbsp;&nbsp;Tempat    :   <?=$data_asesi->tuk?>, <?=$data_asesi->alamat_tuk?>         
            </b>
          </td>
        </tr>
        <tr>
          <td colspan="4" style="width:90%; padding: 5px;">
            <b>
              &nbsp;&nbsp;Peserta Sertifikasi :
              <p align="justify" style="padding: 5px;">
              &nbsp;Saya setuju mengikuti asesmen dengan pemahaman bahwa informasi yang &nbsp;dikumpulkan hanya digunakan untuk pengembangan profesional dan hanya &nbsp;&nbsp;dapat diakses oleh orang tertentu saja.
              </p>              
            </b> 
          </td>
        </tr> 
        <tr>
          <td colspan="4" style="width: 100%; padding: 5px;">
            <b style="text-align: justify;">
              &nbsp;Asesor :
              <p align="justify" style="padding: 5px;">
              &nbsp;Menyatakan tidak akan membuka hasil pekerjaan yang saya peroleh karena &nbsp;penugasan saya sebagai asesor dalam pekerjaan Asesmen kepada siapapun &nbsp;atau organisasi apapun &nbsp;selain kepada pihak yang berwenang sehubungan &nbsp;dengan kewajiban saya sebagai Asesor &nbsp;yang ditugaskan oleh LSP.
              </p>
            </b> 
          </td>
        </tr>  
        <tr>
          <td colspan="4" style="width: 100%; padding: 5px;padding-top: 25px;">
            Tanda tangan Peserta  : <qrcode value="<?php echo $qr_asesi; ?>" ec="Q" style="width: 15mm;"></qrcode>       
            <br>
            Tanggal : <?=tgl_indo($data_asesi->tanggal_mulai)?>
            <br>
            <br>
            <br>
            Tanda tangan Asesor   : <qrcode value="<?php echo $ttd_asesor_uji; ?>" ec="Q" style="width: 15mm;"></qrcode>      
            <br>
            Tanggal : <?=tgl_indo($data_asesi->tanggal_mulai)?>
          </td>
        </tr>                  
      </table>
    </div>
 </page>