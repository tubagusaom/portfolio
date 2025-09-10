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
        <h3>FR-MAK-06.  MENINJAU PROSES ASESMEN</h3>
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
      <p>
        <span style="font-size: 17px; font-weight: bold;">Penjelasan : </span>
        <ol type="1">
          <li>
            Meninjau proses sesmen adalah kegiatan kaji ulang yang dilaksanakan oleh Asesor Kompetensi yang ditugskan terhadap proses pelaksanaan asesmen.
          </li>
          <li>
            Kaji ulang dilakukan terhadap proses asesmen pada satu skema sertifikasi.
          </li>
        </ol>
      </p>
      <table border="1" style="width: 100%; border-collapse: collapse; font-size: 15px;">
        <tr>
          <td rowspan="2" style="width: 5%; text-align: center; font-weight: bold; padding: 3px; background-color: #c0eff5;">No.</td>
          <td rowspan="2" style="width: 40%; text-align: center; font-weight: bold; padding: 3px; background-color: #c0eff5;">Aspek Yang dikaji Ulang</td>
          <td colspan="3" style="width: 42%; text-align: center; font-weight: bold; padding: 3px; background-color: #c0eff5;">Hasil Kaji Ulang</td>
        </tr>
        <tr>
          <i>
          <td style="width: 7%; text-align: center; padding: 3px; background-color: #c0eff5; border-right: 0px; border-top: 0px;border-left:none;">Ya</td>
          <td style="width: 7%; text-align: center; padding: 3px; background-color: #c0eff5; border-right: 0px; border-top: 0px;">Blm</td>
          <td style="width: 28%; text-align: center; padding: 3px; background-color: #c0eff5; border-top: 0px;">Rekomendasi Perbaikan</td>
          </i>
        </tr>
        <tr>
          <td style="width: 5%; text-align: center; padding: 5px;">1</td>
          <td style="width: 50%; padding: 5px;" align="justify">
            Apakah rencana asesmen memuat rencana pengumpulan bukti seperti yang digambarkan pada standar kompetensi yang diukur ?
          </td>
          <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
          <td></td>
          <td>Tidak Ada</td>
        </tr>
        <tr>
          <td style="width: 5%; text-align: center; padding: 5px;">2</td>
          <td style="width: 50%; padding: 5px;" align="justify">
            Apakah rencana asesmen memastikan bukti yang dikumpulkan memenuhi kriteria bukti berkualitas ?
          </td>
          <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
          <td></td>
          <td>Tidak Ada</td>
        </tr>
        <tr>
          <td style="width: 5%; text-align: center; padding: 5px;">3</td>
          <td style="width: 50%; padding: 5px;" align="justify">
            Apakah metoda yang dipilih dapat secara konsisten mengumpulkan bukti yang berkualitas ?            
          </td>
          <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
          <td></td>
          <td>Tidak Ada</td>
        </tr>
        <tr>
          <td style="width: 5%; text-align: center; padding: 5px;">4</td>
          <td style="width: 50%; padding: 5px;" align="justify">
            Apakah metoda yang dipilih dapat secara fleksibel menguji peserta sesuai dengan latar belakangnya ?        
          </td>
          <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
          <td></td>
          <td>Tidak Ada</td>
        </tr>
        <tr>
          <td style="width: 5%; text-align: center; padding: 5px;">5</td>
          <td style="width: 50%; padding: 5px;" align="justify">
            Apakah metoda yang dipilih dapat membantu peserta untuk memperlihatkan kompetensinya ?            
          </td>
          <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
          <td></td>
          <td>Tidak Ada</td>
        </tr>
        <tr>
          <td style="width: 5%; text-align: center; padding: 5px;">6</td>
          <td style="width: 50%; padding: 5px;" align="justify">
            Apakah sumber daya asesmen yang ditetapkan dapat secara konsisten membantu peserta untuk memperlihatkan kompetensinya ?            
          </td>
          <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
          <td></td>
          <td>Tidak Ada</td>
        </tr>
        <tr>
          <td style="width: 5%; text-align: center; padding: 5px;">7</td>
          <td style="width: 50%; padding: 5px;" align="justify">
            Apakah waktu asesmen yang ditetapkan sudah memenuhi standar kinerja yang sesuai ?            
          </td>
          <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
          <td></td>
          <td>Tidak Ada</td>
        </tr>
        <tr>
          <td style="width: 5%; text-align: center; padding: 5px;">8</td>
          <td style="width: 50%; padding: 5px;" align="justify">
            Apakah perangkat asesmen konsisten mengukur yang seharusnya diukur sesuai dengan tuntutan standar kompetensi ?            
          </td>
          <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
          <td></td>
          <td>Tidak Ada</td>
        </tr>
        <tr>
          <td style="width: 5%; text-align: center; padding: 5px;">9</td>
          <td style="width: 50%; padding: 5px;" align="justify">
            Apakah perangkat asesmen merefleksikan tuntutan standar terbaik yang ditetapkan di tempat kerja ?
          </td>
          <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
          <td></td>
          <td>Tidak Ada</td>
        </tr>
        <tr>
          <td style="width: 5%; text-align: center; padding: 5px;">10</td>
          <td style="width: 50%; padding: 5px;" align="justify">
            Apakah konsultasi pra asesmen yang dilaksanakan dapat membantu peserta mempersiapkan diri untuk memperlihatkan kompetensinya ?
          </td>
          <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
          <td></td>
          <td>Tidak Ada</td>
        </tr>
        <tr>
          <td style="width: 5%; text-align: center; padding: 5px;">11</td>
          <td style="width: 50%; padding: 5px;" align="justify">
            Apakah bukti yang dikumpulkan selama asesmen secara konsisten mengunakan metoda yang dipilih dalam rencana asesmen ?            
          </td>
          <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
          <td></td>
          <td>Tidak Ada</td>
        </tr>
        <tr>
          <td style="width: 5%; text-align: center; padding: 5px;">12</td>
          <td style="width: 50%; padding: 5px;" align="justify">
            Apakah bukti yang dikumpulkan telah memenuhi aspek pengumpulan bukti VATM ?
          </td>
          <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
          <td></td>
          <td>Tidak Ada</td>
        </tr>
        <tr>
          <td style="width: 5%; text-align: center; padding: 5px;">13</td>
          <td style="width: 50%; padding: 5px;" align="justify">
            Apakah keputusan asesmen dilakukan melalui proses mengkaji bukti yang dikumpulkan terhadap  terhadap kriteria bukti berkualitas ?
          </td>
          <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
          <td></td>
          <td>Tidak Ada</td>
        </tr>
                                                                                                                <tr>
          <td style="width: 5%; text-align: center; padding: 5px;">14</td>
          <td style="width: 50%; padding: 5px;" align="justify">
            Apakah keputusan asesmen dibuat mengacu pada aspek pengumpulan bukti Valid Asli Terkini dan Memadai ?
          </td>
          <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
          <td></td>
          <td>Tidak Ada</td>
        </tr>
        <tr>
          <td style="width: 5%; text-align: center; padding: 5px;">15</td>
          <td style="width: 50%; padding: 5px;" align="justify">
            Apakah peserta diberikan umpan balik  hasil asesmen secara konstruktif ?            
          </td>
          <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
          <td></td>
          <td>Tidak Ada</td>
        </tr>
        <tr>
          <td style="width: 5%; text-align: center; padding: 5px;">16</td>
          <td style="width: 50%; padding: 5px;" align="justify">
            Apabila keputusan asesmen belum kompeten, apakah peserta menerima keputusan dan tahu apa yang seharusnya ditindaklanjuti             
          </td>
          <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
          <td></td>
          <td>Tidak Ada</td>
        </tr>
      </table>
      <table style="width: 100%; font-size: 15px; border-collapse: collapse; margin-top: 25px;" border="1">
        <tr>
          <td rowspan="2" style="width: 37%; padding: 5px; font-weight: bold; background-color: #c0eff5; text-align: center;">Aspek yang dikaji Ulang</td>
          <td colspan="5" style="width: 60%; padding: 5px; font-weight: bold; background-color: #c0eff5; text-align: center;">Bukti Pemenuhan terhadap Dimensi Kompetensi (tuliskan jenis bukti & jenis perangkatnya)</td>
        </tr>
        <tr>
          <i>
          <td style="width: 12%; background-color: #c0eff5; text-align: center; padding: 5px; border-top: 0px; border-left: 0px;">Task Skill</td>
          <td style="width: 12%; background-color: #c0eff5; text-align: center; padding: 5px; border-top: 0px; border-left: 0px;">Task Mgmnt Skill</td>
          <td style="width: 12%; background-color: #c0eff5; text-align: center; padding: 5px; border-top: 0px; border-left: 0px;" >Conti<br>ngency Mgmnt Skill</td>
          <td style="width: 12%; background-color: #c0eff5; text-align: center; padding: 5px; border-top: 0px; border-left: 0px;">Job Role / Environ<br>ment Skill</td>
          <td style="width: 12%; background-color: #c0eff5; text-align: center; padding: 5px; border-top: 0px; border-left: 0px;">Transfer Skill</td>
          </i>
        </tr>
        <tr>
          <td style="width: 37%; padding: 5px;">
            <STRONG>Konsistensi keputusan asesmen </STRONG>
            <br>
            <br>
            Apakah bukti kompetensi yang dikumpulkan dari hasil asesmen memenuhi dimensi kompetensi
          </td>
          <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
         <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
         <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
          <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
          <td style="text-align: center;"><img style="width: 10px;" src="<?=assets_url().'assets/img/cl.png'?>" /></td>
        </tr>
        <tr>
          <td style="padding-top: 5px; padding-left: 5px; padding-right: 5px; padding-bottom: 75px;" colspan="6">
            Rekomendasi perbaikan : Tidak Ada
          </td>
        </tr>
      </table>


      <table style="margin-top: 20px; width: 100%; border-collapse: collapse;" border="1">
        <tr>
          <td colspan="2" style="width: 50%; padding: 10px;">
            <strong>Bagian Sertifikasi</strong>
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
          <td style="width: 20%; padding: 10px;">No. Reg</td>
          <td style="width: 25%; padding: 10px;"></td>
          <td style="width: 20%; padding: 10px;">No. Reg</td>
          <td style="width: 25%; padding: 10px;"><?=$no_reg_asesor?></td>
        </tr>
        <tr>
          <td style="width: 23%; padding-top: 10px; padding-left: 10px; padding-right: 10px; padding-bottom: 80px;">
            Tanda tangan / Tanggal                
          </td>
          <td style="width: 22%; padding-top: 10px; padding-left: 10px; padding-right: 10px; padding-bottom: 80px;"><qrcode value="<?php echo $ttd_admin_lsp; ?>" ec="Q" style="width: 15mm;"></qrcode><br/><?=tgl_indo($data_asesi->tanggal_mulai)?>
          </td>
          <td style="width: 23%; padding-top: 10px; padding-left: 10px; padding-right: 10px; padding-bottom: 80px;">
            Tanda tangan / Tanggal                
          </td>
          <td style="width: 22%; padding-top: 10px; padding-left: 10px; padding-right: 10px; padding-bottom: 80px;"><qrcode value="<?php echo $qr_asesi; ?>" ec="Q" style="width: 15mm;"></qrcode><br/><?=tgl_indo($data_asesi->tanggal_mulai)?>
          </td>          
        </tr>
      </table>
</page>