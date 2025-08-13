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
     <h3>FR-MAK-04. UMPAN BALIK DARI PESERTA</h3>
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
      <table style="width: 97%; border-collapse: collapse; font-size: 15px; margin-top: 15px;" border="1">
        <tr>
          <td rowspan="2" style="width: 55%; font-weight: bold; text-align: center; padding: 5px;">
            Komponen Umpan Balik
          </td>
          <td colspan="2" style="width: 14%; font-weight: bold; text-align: center; padding: 5px;">
            Hasil
          </td>

          <td rowspan="2" style="width: 27%; font-weight: bold; text-align: center; padding: 5px;">
            Catatan/Komentar Peserta            
          </td>
        </tr>
        <tr>
          <td style="width: 9%; text-align: center; font-weight: bold; padding: 5px; border-left: 0px;">Ya</td>
          <td style="width: 9%; text-align: center; font-weight: bold; padding: 5px;">Tidak</td>
        </tr>
        <tr>
          <td style="width: 55%; padding: 5px;">Saya mendapatkan penjelasan yang cukup memadai mengenai proses asesmen/ uji kompetensi</td>
          <td style="text-align: center;"><?=(isset($mak05[0]) && $mak05[0]=='Y'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td style="text-align: center;"><?=(isset($mak05[0]) && $mak05[0]=='N'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td><?=(isset($mak05a[0])?$mak05a[0]:'')?></td>
        </tr>
        <tr>
          <td style="width: 55%; padding: 5px;">Saya diberikan kesempatan untuk mempelajari standar kompetensi yang akan diujikan dan menilai diri sendiri terhadap pencapaiannya</td>
          <td style="text-align: center;"><?=(isset($mak05[1]) && $mak05[1]=='Y'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td style="text-align: center;"><?=(isset($mak05[1]) && $mak05[1]=='N'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td><?=(isset($mak05a[1])?$mak05a[1]:'')?></td>
        </tr>
        <tr>
          <td style="width: 55%; padding: 5px;">Asesor memberikan kesempatan untuk mendiskusikan/menegosiasikan metoda, instrument dan sumber asesmen serta jadwal asesmen</td>
          <td style="text-align: center;"><?=(isset($mak05[2]) && $mak05[2]=='Y'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td style="text-align: center;"><?=(isset($mak05[2]) && $mak05[2]=='N'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td><?=(isset($mak05a[2])?$mak05a[2]:'')?></td>
        </tr>
        <tr>
          <td style="width: 55%; padding: 5px;">Asesor berusaha menggali seluruh bukti pendukung yang sesuai dengan latar belakang pelatihan dan pengalaman yang saya miliki</td>
          <td style="text-align: center;"><?=(isset($mak05[3]) && $mak05[3]=='Y'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td style="text-align: center;"><?=(isset($mak05[3]) && $mak05[3]=='N'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td><?=(isset($mak05a[3])?$mak05a[3]:'')?></td>
        </tr>
        <tr>
          <td style="width: 55%; padding: 5px;">Saya mendapatkan jaminan kerahasiaan hasil asesmen serta penjelasan penanganan dokumen asesmen</td>
          <td style="text-align: center;"><?=(isset($mak05[4]) && $mak05[4]=='Y'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td style="text-align: center;"><?=(isset($mak05[4]) && $mak05[4]=='N'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td><?=(isset($mak05a[4])?$mak05a[4]:'')?></td>
        </tr>
        <tr>
          <td style="width: 55%; padding: 5px;">Saya sepenuhnya diberikan kesempatan untuk mendemonstrasikan kompetensi yang saya miliki selama asesmen</td>
          <td style="text-align: center;"><?=(isset($mak05[5]) && $mak05[5]=='Y'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td style="text-align: center;"><?=(isset($mak05[5]) && $mak05[5]=='N'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td><?=(isset($mak05a[5])?$mak05a[5]:'')?></td>
        </tr>
        <tr>
          <td style="width: 55%; padding: 5px;">Saya mendapatkan penjelasan yang memadai mengenai keputusan asesmen</td>
          <td style="text-align: center;"><?=(isset($mak05[6]) && $mak05[6]=='Y'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td style="text-align: center;"><?=(isset($mak05[6]) && $mak05[6]=='N'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td><?=(isset($mak05a[6])?$mak05a[6]:'')?></td>
        </tr>
        <tr>
          <td style="width: 55%; padding: 5px;">Asesor memberikan umpan balik yang  mendukung setelah asesmen serta tindak lanjutnya</td>
          <td style="text-align: center;"><?=(isset($mak05[7]) && $mak05[7]=='Y'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td style="text-align: center;"><?=(isset($mak05[7]) && $mak05[7]=='N'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td><?=(isset($mak05a[7])?$mak05a[7]:'')?></td>
        </tr>
        <tr>
          <td style="width: 55%; padding: 5px;">Asesor menggunakan keterampilan komunikasi yang  efektif selamaasesmen</td>
          <td style="text-align: center;"><?=(isset($mak05[8]) && $mak05[8]=='Y'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td style="text-align: center;"><?=(isset($mak05[8]) && $mak05[8]=='N'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td><?=(isset($mak05a[8])?$mak05a[8]:'')?></td>
        </tr>
        <tr>
          <td style="width: 55%; padding: 5px;">Asesor bersama saya menandatangani semua dokumen hasil asesmen</td>
          <td style="text-align: center;"><?=(isset($mak05[9]) && $mak05[9]=='Y'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td style="text-align: center;"><?=(isset($mak05[9]) && $mak05[9]=='N'?'<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />':'')?></td>
          <td><?=(isset($mak05a[9])?$mak05a[9]:'')?></td>
        </tr>   
        <tr>
          <td colspan="4" style="width: 97%; padding-top: 5px; padding-left: 5px; padding-right: 5px; padding-bottom: 50px;">Catatan/komentar lainnya (apabila ada) :</td>
        </tr>                                                                     
      </table>
 </page>