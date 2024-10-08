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
    <span style="font-size:11pt; font-weight:bold;">FR-AK-01  :  PERSETUJUAN ASESMEN DAN KERAHASIAAN</span>
    <br/>
    <br/>

    <table style="width:100%;" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
        <tr>
            <td colspan="4" style="padding:5px; width:100%; text-align:justify;" > Persetujuan Asesmen ini untuk menjamin bahwa Asesi telah diberi arahan secara rinci tentang perencanaan dan proses asesmen </td>

        </tr>

        <tr>
        <td rowspan="2" style="width:30%;">Skema Sertifikasi <br/> (KKNI/Okupasi/Klaster)</td>
        <td style="width:8%;" >Judul</td>
        <td style="width:2%;text-align:center;">:</td>
        <td style="width:60%;"> <?= $data_asesi->skema ?></td>
      </tr>
      <tr>
        <td style="width:8%; border-left:0px;">Nomor</td>
        <td style="width:2%;text-align:center;">:</td>
        <td style="width:60%"> <?= $data_asesi->kode_skema ?></td>
      </tr>
      <tr>
        <td colspan="2" class="" style="color:black; width:5%;">TUK</td>
        <td style="text-align:center;">:</td>
        <td> <?= $data_asesi->tuk ?>(<?=$data_asesi->jenis_tuk?>)</td>
      </tr>
      <tr>
        <td colspan="2" class="" style="color:black; width:5%;">Nama Asesor</td>
        <td style="text-align:center;">:</td>
        <td> <?=$detail_asesor->users?></td>
      </tr>
      <tr>
        <td colspan="2" class="" style="color:black; width:5%;">Nama Peserta</td>
        <td style="text-align:center;">:</td>
        <td > <?= ucwords($data_asesi->nama_lengkap) ?></td>
      </tr>
      <tr>
        <td colspan="2">Bukti yang akan dikumpulkan</td>
        <td style="text-align:center;">:</td>
        <td style="font-size:10pt;"> 
          <?php foreach ($perangkat_uji as $key=>$perangkat) {
            echo  $perangkat . "<br>";
          }
          ?>
        </td>
      </tr>
        <tr>
            <td colspan="4">Pelaksanaan asesmen akan dilaksanakan pada:
                <br/>
                Hari/ Tanggal : 
                <?php 
                $time = strtotime($data_asesi->tanggal);  
                $hari = date('l', $time);
                switch ($hari) {
                  case 'Monday':
                      echo 'Senin,';
                      break;
                  case 'Tuesday':
                      echo 'Selasa,';
                      break;
                  case 'Wednesday':
                      echo 'Rabu,';
                      break;
                  case 'Thursday':
                      echo 'Kamis,';
                      break;
                  case 'Friday':
                      echo 'Jumat,';
                      break;
                  case 'Saturday':
                      echo 'Sabtu,';
                      break;                               
                  case 'Sunday':
                      echo 'Minggu,';
                      break;
                  default:
                      echo 'nampaknya format tanggal tidak cocok !';
                      break;
              } 
                ?><?=tgl_indo($data_asesi->tanggal); ?>
                <br/>
                Tempat    : <?= $data_asesi->tuk ?>
            </td>

        </tr>
        <tr>
            <td colspan="4" ><strong>Asesi: <?php echo (isset($mak03[0]) && $mak03[0]=='1'?'Setuju':''); ?></strong>
                <br/>
                <p>Bahwa saya sudah mendapatkan Penjelasan Hak dan Prosedur Banding Oleh Asesor. 
                </p> 
            </td>

        </tr>
        <tr>
            <td colspan="4"><strong>Asesor: <?php echo (isset($mak03[1]) && $mak03[1]=='1'?'Setuju':''); ?></strong>
                <br/>
                <p>Menyatakan tidak akan membuka hasil pekerjaan yang saya peroleh karena penugasan saya sebagai asesor
                    dalam pekerjaan Asesmen kepada siapapun atau organisasi apapun selain kepada pihak yang berwenang sehubungan 
                    dengan kewajiban saya sebagai Asesor yang ditugaskan oleh LSP. 
                </p> 
            </td>

        </tr>
        <tr>
            <td colspan="4" ><strong>Asesi: <?php echo (isset($mak03[0]) && $mak03[0]=='1'?'Setuju':''); ?></strong>
                <br/>
                <p>Saya setuju mengikuti asesmen dengan pemahaman bahwa informasi yang dikumpulkan hanya digunakan untuk 
                    pengembangan profesional dan hanya dapat diakses oleh orang tertentu saja. 
                </p> 
            </td>

        </tr>

        <tr>
            <td colspan="4">  
                <br/>
                <br/>
                Tanda tangan Peserta  : <qrcode value="<?php echo $qr_asesi; ?>" ec="Q" style="width: 15mm;"></qrcode>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal : <?= tgl_indo($data_asesi->tanggal) ?>
        <br/>
        <br/>
        <br/>
        <br/>
        Tanda tangan Asesor   : <qrcode value="<?php echo $ttd_asesor_uji; ?>" ec="Q" style="width: 15mm;"></qrcode>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal :  <?= tgl_indo($data_asesi->tanggal) ?>
        <br/><br/>
        </td>
        </tr>



    </table>

</page>