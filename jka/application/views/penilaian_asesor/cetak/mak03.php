   <page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm" ">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td><img style="width: <?= $aplikasi->lebar_logo ?>px;height:<?= $aplikasi->tinggi_logo ?>" src="<?php echo path_image() . 'assets/img/' . $aplikasi->path; ?>" /></td>
                <td style="text-align: left;    width: 54%;font-weight: lighter;"><?= $aplikasi->nama_unit ?></td>

            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: <?= $aplikasi->lebar_caption_lsp ?>%"><?= $aplikasi->singkatan_unit ?> :
                </td>
                <td style="text-align: left;    width: 60%"> <?= $aplikasi->alamat ?> <?= $aplikasi->no_telpon ?></td>
                <td style="text-align: right;    width: 17%">Halaman [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer> <h3>FR-MAK-03.  FORMULIR BANDING ASESMEN</h3>
      <table width="100%" style="border-collapse: collapse;" border="1">
        <tr>
          <td rowspan="2" style="width: 25%; text-align: center; padding: 5px;">Skema Sertifikasi / Klaster Asesmen</td>
          <td style="width: 20%; padding: 5px;">Judul</td>
          <td style="width: 5%; text-align: center; padding: 5px;">:</td>
          <td style="width: 47%; padding: 5px;"><strong><?= $skema_sertifikasi->skema ?></strong></td>
        </tr>
        <tr>
          <td style="width: 20%; padding: 5px; border-left: 0px;">Nomor</td>
          <td style="width: 5%; text-align: center;">:</td>
          <td style="width: 47%; padding: 5px;"><strong><?= $skema_sertifikasi->kode_skema ?></strong></td>
        </tr>
        <tr>
          <td colspan="2" style="width: 45%; padding: 5px;">
            TUK
          </td>
          <td style="width: 5%; text-align: center;">:</td>
          <td style="width: 47%; padding: 5px;">Sewaktu/Tempat Kerja/Mandiri*</td>
        </tr>
        <tr>
          <td colspan="2" style="width: 45%; padding: 5px;">
            Nama Asesor
          </td>
          <td style="width: 5%; text-align: center;">:</td>
          <td style="width: 47%; padding: 5px;"></td>
        </tr>   
        <tr>
          <td colspan="2" style="width: 45%; padding: 5px;">
            Nama Peserta
          </td>
          <td style="width: 5%; text-align: center;">:</td>
          <td style="width: 47%; padding: 5px;"></td>
        </tr>   
        <tr>
          <td colspan="2" style="width: 45%; padding: 5px;">Tanggal</td>
          <td style="width: 5%; text-align: center;">:</td>
          <td style="width: 47%; padding: 5px;"></td>
        </tr>
      </table>   
      * Coret yang tidak perlu
      <table style="border-collapse: collapse; width: 100%; margin-top: 25px; font-size: 15px;" border="1">
        <tr>
          <td style="width: 70%; padding: 5px; background-color: #<?=$aplikasi->warna_default_table?>;">Jawablah dengan <b>Ya</b> atau <b>Tidak</b> pertanyaan-pertanyaan berikut ini :</td>
          <td style="width: 13%; padding: 5px; background-color: #<?=$aplikasi->warna_default_table?>; text-align: center;">YA</td>
          <td style="width: 14%; padding: 5px; background-color: #<?=$aplikasi->warna_default_table?>; text-align: center;">TIDAK</td>
        </tr>
        <tr>
          <td style="width: 70%; padding: 5px;">Apakah Proses Banding telah dijelaskan kepada Anda? </td>
          <td style="width: 13%; padding: 5px;"></td>
          <td style="width: 14%; padding: 5px;"></td>
        </tr>
        <tr>
          <td style="width: 70%; padding: 5px;">Apakah Anda telah mendiskusikan Banding dengan Asesor? </td>
          <td style="width: 13%; padding: 5px;"></td>
          <td style="width: 14%; padding: 5px;"></td>
        </tr>
        <tr>
          <td style="width: 70%; padding: 5px;">Apakah Anda mau melibatkan “orang lain” membantu Anda dalam Proses Banding? </td>
          <td style="width: 13%; padding: 5px;"></td>
          <td style="width: 14%; padding: 5px;"></td>
        </tr>      
        <tr>
          <td colspan="3" style="width: 97%; padding: 5px;">
            Banding ini diajukan atas Keputusan Asesmen yang dibuat pada Unit Kompetensi sebagai berikut :
          </td>
        </tr>                
      </table> 
      <table border="1" style="border-collapse: collapse; width: 100%;">
               
        <tr>
          <td colspan="2" style="width: 97%; padding-bottom: 50px; padding-left: 5px; padding-right: 5px; padding-top: 5px;">
            Alasan pengajuan banding sebagai berikut :
          </td>
        </tr>
        <tr>
          <td colspan="2" style="width: 97%; padding-bottom: 5px; padding-left: 5px; padding-right: 5px; padding-top: 50px;">
            Tanda tangan Peserta : …………………………………………. 
            <br>
            <br>
            Tanggal : …………………………….
          </td>
        </tr>
      </table>
   </page>