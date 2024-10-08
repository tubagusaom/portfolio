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
       <h4> FR-MAK- 02. KEPUTUSAN DAN UMPAN BALIK ASESMEN </h4>
<br>
<table style="width:100%;border-collapse: collapse;" border="1"  >
  <tr>
    <td style="width:30%; padding: 5px;"> <strong>Skema Sertifikasi (Unit/klaster/kualifikasi)</strong> </td>
    <td style="width:3%;text-align: center;"> : </td>
    <td style="width:65%; padding: 5px;"><?=$skema_sertifikasi->skema?></td>
     
  </tr>
  <tr>
    <td style="width:30%; padding: 5px;"> <strong>Nomor Skema Sertifikasi   </strong> </td>
    <td style="width:3%;text-align: center;"> : </td>
    <td style="width:65%; padding: 5px;"><?= $skema_sertifikasi->kode_skema ?></td> 
  </tr>
  <tr>
    <td style="width:30%; padding: 5px;"> <strong>TUK   </strong> </td>
    <td style="width:3%;text-align: center;"> : </td>
    <td style="width:65%; padding: 5px;"><?=$data_asesi->tuk?></td> 
  </tr>
  <tr>
    <td style="width:30%; padding: 5px;"> <strong>Nama Asesor   </strong> </td>
    <td style="width:3%;text-align: center;"> : </td>
    <td style="width:65%; padding: 5px;"><?=$nama_asesor?></td> 
  </tr>
  <tr>
    <td style="width:30%; padding: 5px;"> <strong>Nama Peserta   </strong> </td>
    <td style="width:3%;text-align: center;"> : </td>
    <td style="width:65%; padding: 5px;"><?=strtoupper($data_asesi->nama_lengkap)?></td> 
  </tr>
  <tr>
    <td style="width:30%; padding: 5px;"> <strong>Tanggal   </strong> </td>
    <td style="width:3%;text-align: center;"> : </td>
    <td style="width:65%; padding: 5px;"><?=tgl_indo($data_asesi->tanggal_mulai)?></td> 
  </tr>
</table>
<br>
<div style="left: -10px;">
    Asesor diminta untuk :
<br/>
    <table cellpadding="2" style="border-collapse: collapse;">
        <tr  nobr="true">
            <td style="width: 3%;">1.</td>
            <td style="width: 95%;text-align: justify;">Mengkaji ulang dan menilai bukti kompetensi peserta yang dikumpulkan, apakah bukti kompetensi tersebut memenuhi aturan bukti Valid, Asli, Terkini dan Memadai (VATM).</td>
        </tr>
        <tr  nobr="true">
            <td style="width: 3%;">2.</td>
            <td style="width: 95%;text-align: justify;">Membuat keputusan Asesmen atas penilaian bukti kompetensi Peserta, bila Peserta dinyatakan Kompeten tuliskan tanda centang pada kolom (K), dan bila dinyatakan Belum Kompeten tuliskan tanda centang pada kolom (BK) untuk setiap unit kompetensi sesuai dengan skema sertifikasi.
            </td>
        </tr>
        <tr  nobr="true">
            <td style="width: 3%;">3.</td>
            <td style="width: 95%;text-align: justify;">Memberikan umpan balik kepada Peserta mengenai pencapaian unjuk kerja dan Peserta juga diminta untuk memberikan umpan balik terhadap proses asesmen yang dilaksanakan (kuesioner)</td>
        </tr>
        <tr  nobr="true">
            <td style="width: 3%;">4.</td>
            <td style="width: 95%;text-align: justify;">Asesor dan Peserta bersama-sama menandatangani keputusan asesmen</td>
        </tr>
    </table>
    <br />
</div>
<h3>Pencapaian Kompetensi:</h3>
<br>
<br>

<table style="width:100%;border-collapse: collapse;" border="1"  >
    <tr align="center" style="">
    <td style="background-color:#c0eff5;width:4%;text-align:center;" rowspan="2"><strong> No</strong></td>
    <td style="background-color:#c0eff5;width:40%;" rowspan="2"><strong> Kode Unit <br/>Judul Unit Kompetensi</strong></td>
    <td style="background-color:#c0eff5;width:30%;" rowspan="2"><strong> Bukti-bukti</strong></td>
    <td style="background-color:#c0eff5;width:7%;" rowspan="2"><strong> Jenis<br/>Bukti</strong></td>
    <td colspan="2" style="background-color:#c0eff5;width:10%;"><strong style="font-size: 10px;"> Pencapaian</strong></td>
    <td colspan="2" style="background-color:#c0eff5;width:10%;"><strong style="font-size: 10px;"> Keputusan</strong></td>
  </tr>
  <tr align="center">
    <td style="background-color:#c0eff5;width:5%;border-left:0px solid red;">Ya</td>
    <td style="background-color:#c0eff5;width:5%;">Tdk</td>
    <td style="background-color:#c0eff5;width:5%;">K</td>
    <td style="background-color:#c0eff5;width:5%;">BK</td>
  </tr>
  <?php foreach ($unit_kompetensi as $key=>$value){ 
$checklist_pencapaian_mak02_l = $pencapaian_mak02[($key * 2)] == 'y' ? '<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />' : '';
$checklist_pencapaian_mak02_lbk = $pencapaian_mak02[($key * 2)] == 'n' ? '<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />' : '';


$checklist_keputusan_mak02_l = $keputusan_mak02[($key * 2)] == 'y' ? '<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />' : '';
$checklist_keputusan_mak02_lbk = $keputusan_mak02[($key * 2)] == 'n' ? '<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />' : '';


$checklist_pencapaian_mak02_t = $pencapaian_mak02[($key * 2) + 1] == 'y' ? '<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />' : '';
 $checklist_pencapaian_mak02_tbk = $pencapaian_mak02[($key * 2)] == 'n' ? '<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />' : ''; 
$checklist_keputusan_mak02_t = $keputusan_mak02[($key * 2) + 1] == 'y' ? '<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />' : '';
 $checklist_keputusan_mak02_tbk = $keputusan_mak02[($key * 2)] == 'n' ? '<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />' : ''; 


    ?>
  <tr>
      <td style="text-align: center" rowspan="2"><?=($key + 1)?></td>
      <td rowspan="2" style="width:40%;"><b><?=$value->id_unit_kompetensi?></b><br/><?=$value->unit_kompetensi?></td>
      <td style="width:30%;">Hasil Rekaman Observasi</td>
      <td style="text-align: center">L</td>
    <td style="text-align: center"><?=$checklist_pencapaian_mak02_l?></td>
    <td style="text-align: center"><?=$checklist_pencapaian_mak02_lbk?></td>
    <td style="text-align: center"><?=$checklist_keputusan_mak02_l?></td>
    <td style="text-align: center"><?=$checklist_keputusan_mak02_lbk?></td>
  </tr>
  <tr>
      <td style="width:30%;border-left: 0px solid;">Hasil Rekaman Tes tertulis</td>
    <td style="text-align: center">T</td>
    <td style="text-align: center"><?=$checklist_pencapaian_mak02_t?></td>
    <td style="text-align: center"><?=$checklist_pencapaian_mak02_tbk?></td>
    <td style="text-align: center"><?=$checklist_keputusan_mak02_t?></td>
    <td style="text-align: center"><?=$checklist_keputusan_mak02_tbk?></td>
  </tr>
  <?php } ?>
</table>

<br>


<table style="width:100%;border-collapse: collapse;" border="1" cellpadding="4" cellspacing="4"   >
 
  <tr>
      <td style="width:100%;"><b>Umpan balik terhadap pencapaian unjuk kerja: </b> 
        
    </td>
  </tr>
  <tr>
    <td style="width:100%;"> 
      <?php if($data_asesi->pencapaian_unjuk_kerja =='y'){ ?>
        <img style="width: 10px;margin-left: 10px;" src="<?=base_url().'assets/img/cl.png';?>" /> 
      <?php }else{ ?>
        <input type="checkbox" style="margin-right: 5px;margin-left: 10px;" />
        <?php
          }
        ?>Seluruh Elemen Kompetensi/Kriteria Unjuk Kerja (KUK) yang diujikan telah tercapai
    </td>
  </tr>
  <tr>
    <td style="width:100%;"> 
      <?php if($data_asesi->pencapaian_unjuk_kerja =='n'){ ?>
        <img style="width: 10px;margin-left: 10px;" src="<?=base_url().'assets/img/cl.png';?>" /> 
      <?php }else{ ?>
        <input type="checkbox" style="margin-right: 5px;margin-left: 10px;" />
        <?php
          }
        ?>
        Terdapat Elemen Kompetensi/Kriteria Unjuk Kerja (KUK) yang diujikan belum tercapai 
    </td>
  </tr>
</table>

<br>
<table style="width:100%;border-collapse: collapse;" border="1" cellpadding="4" cellspacing="4"   >
 
  <tr>
      <td><b>Saran tindak lanjut hasil asesmen: </b> 
        
    </td>
  </tr>
  <tr>
    <td style="width:100%;"> 
        <?php if($data_asesi->saran_tindak_lanjut =='y'){ ?>
        <img style="width: 10px;margin-left: 10px;" src="<?=base_url().'assets/img/cl.png';?>" /> 
      <?php }else{ ?>
        <input type="checkbox" style="margin-right: 5px;margin-left: 10px;" />
        <?php
          }
        ?>
        Tidak ada kesenjangan 
    </td>
  </tr>
  <tr>
    <td > 
        <?php if($data_asesi->saran_tindak_lanjut =='n'){ ?>
        <img style="width: 10px;margin-left: 10px;" src="<?=base_url().'assets/img/cl.png';?>" /> 
        Ditemukan kesenjangan pencapaian, sebagai berikut pada : <br/>
        <?=$table_kesenjangan_kuk?>
      <?php }else{ ?>
        <input type="checkbox" style="margin-right: 5px;margin-left: 10px;" />
        Ditemukan kesenjangan pencapaian
        <?php

          }
        ?> 
        
    </td>
  </tr>
</table>


<br>
<table style="width:100%;border-collapse: collapse;" border="1" cellpadding="4" cellspacing="4"   >
 
  <tr>
      <td style="width:100%;"><b>Identifikasi kesenjangan pencapaian unjuk kerja: </b> 
        
    </td>
  </tr>
  <tr>
    <td style="width:100%;"> 
      <?php if($data_asesi->pelihara_kompetensi =='y'){ ?>
        <img style="width: 10px;margin-left: 10px;" src="<?=base_url().'assets/img/cl.png';?>" /> 
      <?php }else{ ?>
        <input type="checkbox" style="margin-right: 5px;margin-left: 10px;" />
        <?php
          }
        ?>
        Agar memelihara kompetensi yang telah dicapai  

        
    </td>
  </tr>
  <tr>
    <td style="width:100%;"> 
      <?php if($data_asesi->pelihara_kompetensi =='n'){ ?>
        <img style="width: 10px;margin-left: 10px;" src="<?=base_url().'assets/img/cl.png';?>" /> 
        Perlu dilakukan asesmen ulang pada : <br/>
        <?=$table_kesenjangan_unit?>
      <?php }else{ ?>
        <input type="checkbox" style="margin-right: 5px;margin-left: 10px;" />
        Perlu dilakukan asesmen ulang
        <?php

          }
        ?> 

        
    </td>
  </tr>
</table>
<br />

 <table style="width:100%; align:center" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
 <tr>
  <td rowspan="8" style="width: 50%;"> Rekomendasi Asesor : <br/>

      Peserta direkomendasikan <strong><?=$rekomendasi_asesor?> </strong> <br/>
pada skema sertifikasi yang diujikan

	
  </td>
  <td style="width: 50%;text-align: center" colspan="2"> <b>Asesor</b> </td>
 </tr>


<tr nobr="true">
  <td style="width: 20%;border-left:0px solid red;"> Nama </td>
  <td style="width: 30%;"> <?=$nama_asesor?> </td>
 </tr>
 <tr nobr="true">
  <td style="width: 20%;border-left:0px solid red;"> No. Reg. </td>
  <td style="width: 30%;"> <?=$no_reg_asesor?> </td>
 </tr>
 <tr nobr="true">
     <td style="width: 20%;border-left:0px solid red;"> Tanda Tangan & <br/> Tanggal. </td>
  <td style="width: 30%;height: 50px;" ><qrcode value="<?php echo $ttd_asesor_uji; ?>" ec="Q" style="width: 15mm;"></qrcode><?=tgl_indo($data_asesi->tanggal_mulai)?>  </td>
 </tr>

 <tr nobr="true">
     <td style="width: 50%;text-align: center;border-left:0px solid red;" colspan="2"> <b>Peserta</b> </td>
 </tr>
<tr nobr="true">
  <td style="width: 20%;border-left:0px solid red;"> Nama </td>
  <td style="width: 30%;"> <?=strtoupper($data_asesi->nama_lengkap)?> </td>
 </tr>
 <tr nobr="true">
  <td style="width: 20%;border-left:0px solid red;"> No. Reg. </td>
  <td style="width: 30%;"><?=$data_asesi->no_registrasi?>  </td>
 </tr>
 <tr nobr="true">
     <td style="width: 20%;border-left:0px solid red;"> Tanda Tangan & <br/> Tanggal. </td>
  <td style="width: 30%;height: 50px;" > <qrcode value="<?php echo $qr_asesi; ?>" ec="Q" style="width: 15mm;"></qrcode><?=tgl_indo($data_asesi->tanggal_mulai)?> </td>
 </tr>
 
</table>
 </page>