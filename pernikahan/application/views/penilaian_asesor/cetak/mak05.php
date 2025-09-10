 <page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
   <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td><img src="<?php echo '/var/www/html/lspp2barat/assets/img/logo48.png';?>" /></td>
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
        <h3>FR-MAK-05. FORMULIR LAPORAN ASESMEN</h3>
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
          <td style="width: 47%; padding: 5px;"><?=$data_asesi->tuk?></td>
        </tr>
        <tr>
          <td colspan="2" style="width: 45%; padding: 5px;">
            Nama Asesor
          </td>
          <td style="width: 5%; text-align: center;">:</td>
          <td style="width: 47%; padding: 5px;"><?=$nama_asesor?></td>
        </tr>
        <tr>
          <td colspan="2" style="width: 45%; padding: 5px;">
            Nama Peserta
          </td>
          <td style="width: 5%; text-align: center;">:</td>
          <td style="width: 47%; padding: 5px;"><?=strtoupper($data_asesi->nama_lengkap)?></td>
        </tr>
        <tr>
          <td colspan="2" style="width: 45%; padding: 5px;">Tanggal</td>
          <td style="width: 5%; text-align: center;">:</td>
          <td style="width: 47%; padding: 5px;"><?=tgl_indo($data_asesi->tanggal_mulai)?></td>
        </tr>
      </table>
      <i>* Coret yang tidak perlu</i>
      <table style="width: 100%; border-collapse: collapse; margin-top: 25px; font-size: 15px;" border="1">
        <tr>
          <td style="width: 5%; text-align: center; font-weight: bold; padding: 10px;">
            No.
          </td>
          <td style="width: 50%; text-align: center; font-weight: bold; padding: 10px;">
            Nama Peserta
          </td>
          <td style="width: 8%; text-align: center; font-weight: bold; padding: 10px;">
            K
          </td>
          <td style="width: 9%; text-align: center; font-weight: bold; padding: 10px;">
            BK
          </td>
          <td style="width: 22%; text-align: center; font-weight: bold; padding: 10px;">
            Keterangan**)
          </td>
        </tr>
        <tr>
          <td style="text-align: center; padding: 10px;">1.</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td style="text-align: center; padding: 10px;">2.</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td style="text-align: center; padding: 10px;">3.</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td style="text-align: center; padding: 10px;">4.</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td style="text-align: center; padding: 10px;">5.</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table>
      **) tuliskan Kode dan Judul Unit Kompetensi yang dinyatakan BK

      <table style="margin-top: 25px; font-size: 15px; font-weight: bold; border-collapse: collapse; width: 100%;" border="1">
        <tr>
          <td style="width: 32%; text-align: center; background-color:#<?=$aplikasi->warna_default_table?>;">
            Aspek Negatif dan Positif Dalam asesemen
          </td>
          <td style="width: 32%; text-align: center; background-color:#<?=$aplikasi->warna_default_table?>;">
            Pencatatan Penolakan Hasil Asesmen
          </td>
          <td style="width: 33%; text-align: center; background-color:#<?=$aplikasi->warna_default_table?>;">
            Saran Perbaikan :
(Asesor/Personil Terkait)
          </td>
        </tr>
        <tr>
          <td style="width: 30%; padding-bottom: 100px;"></td>
          <td style="width: 30%; padding-bottom: 100px;"></td>
          <td style="width: 33%; padding-bottom: 100px;"></td>
        </tr>
      </table>
      <table style="margin-top: 20px; width: 100%; border-collapse: collapse;" border="1">
        <tr>
          <td colspan="2" style="width: 50%; padding: 10px;">
            <strong>Penanggung Jawab <br>Pelaksanaan Asesmen :</strong>
          </td>
          <td colspan="2" style="width: 45%; padding: 10px;">
            <strong>Asesor  :</strong>
          </td>
        </tr>
        <tr>
          <td style="width: 20%; padding: 10px;">Nama</td>
          <td style="width: 25%; padding: 10px;"></td>
          <td style="width: 20%; padding: 10px;">Nama</td>
          <td style="width: 25%; padding: 10px;"></td>
        </tr>
        <tr>
          <td style="width: 20%; padding: 10px;">Jabatan</td>
          <td style="width: 25%; padding: 10px;"></td>
          <td style="width: 20%; padding: 10px;">No. Reg</td>
          <td style="width: 25%; padding: 10px;"></td>
        </tr>
        <tr>
          <td colspan="2" style="width: 47%; padding-top: 10px; padding-left: 10px; padding-right: 10px; padding-bottom: 100px;"></td>
          <td style="width: 23%; padding-top: 10px; padding-left: 10px; padding-right: 10px; padding-bottom: 80px;">
Tanda tangan / Tanggal
          </td>
          <td style="width: 22%; padding-top: 10px; padding-left: 10px; padding-right: 10px; padding-bottom: 80px;">
          </td>
        </tr>
      </table>
 </page>
