<?php foreach ($array_jadwal as $key => $value) { ?>
<page backtop="50mm" backbottom="10mm" backleft="15mm" backright="15mm">
    <page_header>
        <div>
            <img src="<?php echo site_url().'assets/img/kop_atas.jpg';?>" width="750" height="149" />
        </div>
        <br />
    </page_header>
    <page_footer>
    </page_footer>
    <h4 style="font-size: 15px;text-align: center; margin-top: -45px;">
    BERITA ACARA ASESMEN / UJI KOMPETENSI <BR> PELAKSANAAN SERTIFIKASI TAHUN <?= substr($info_jadwal[$value]->tanggal, 0, 4)?><BR>
    <?=$aplikasi->nama_unit?>
    </h4>
    <div style="font-size: 12px; text-align: justify;">
    Pada hari ini <?= getday($info_jadwal[$value]->tanggal_akhir,'-') ?> tanggal <?php echo terbilang(date('d', strtotime($info_jadwal[$value]->tanggal_akhir))) ?> Bulan <?php echo getBulan(substr($info_jadwal[$value]->tanggal_akhir, 5, 2)) ?> Tahun <?= substr($info_jadwal[$value]->tanggal, 0, 4)?>, bertempat di
    <?= $info_jadwal[$value]->tuk ?>; <?= $info_jadwal[$value]->alamat ?> telah dilakukan Uji Kompetensi <font style="color: #012e4f"><?= $skema_uji[$value]->skema.' ('.$info_jadwal[$value]->jadual ?>)</font> yang diikuti sebanyak
<font style="color: #012e4f"><?= count($asesi_ba[$value]); ?> peserta</font> dengan penjelasan sebagai berikut:    </div>
    <p style="text-indent: 0.3in;font-size: 12px">
        Asesor :
    </p>
    <table style="width: 100%; border-collapse: collapse;" border="0">
        <?php 
            foreach ($asesor_uji[$value] as $keys => $list_asesor){ 
                    echo '
                    <tr style="font-size: 12px">
                        <td style="width: 3%;">'.($keys + 1).'.</td>
                        <td style="width: 42%;">'.$list_asesor->users.'</td>
                        <td style="width: 20%;">No. Reg. Sertifikat</td>
                        <td style="width: 30%;">'.$list_asesor->no_reg.'</td>
                    </tr>
                                                        
                    ';
                
            } 
        ?>
    </table>
    <p style="font-size: 12px">
Berdasarkan hasil penilaian Asesor, dengan ini menetapkan hasil uji kompetensi unit kompetensi
terhadap peserta sebagai berikut :        
    </p>
    <table border="1" style="border-collapse: collapse;">
        <thead style="font-size: 12px">
            <tr>
                <th style="width: 5%; font-weight: bold; padding: 2px;" align="center">No. </th>
        <th style="width: 35%; font-weight: bold; padding: 2px;" align="center">Nama Asesi </th>
        <th style="width: 35%; font-weight: bold; padding: 2px;" align="center">Organisasi </th>        
        <th style="width: 25%; font-weight: bold; padding: 2px;" align="center">Hasil (Kompeten / Belum Kompeten) </th>     
       </tr>
    </thead> 
    <tbody style="font-size: 12px">
    <?php foreach ($asesi_ba[$value] as $no => $values){ ?>
    <tr>
            <td style="padding: 2px; width: 5%;" align="center"> <?= ($no+1).'.' ?> </td>
            <td style="padding: 2px; width: 35%;" valign="middle"><?= ucwords(strtolower($values->nama_lengkap)) ?> </td>
            <td style="padding: 2px; width: 35%;" valign="middle"><?= ucwords(strtolower($values->organisasi)) ?> </td>      
            <td style="padding: 2px; width: 25%;" align="center" valign="middle"><?= ($values->rekomendasi_asesor == '1' ? 'Kompeten' : 'Belum Kompeten') ?> </td>       
    </tr>
    <?php } ?>
    </tbody>
    </table>
    <p style="font-size: 12px">
        Demikian berita acara Asesmen/uji kompetensi dibuat untuk sebagai pengambil keputusan oleh tim
Asesor <?=$aplikasi->nama_unit?>
    </p>
    <p align="right">
    <table style="width: 100%;" border="0" align="right">
        <tbody style="font-size: 12px">
        <tr>
            <td style="width: 40%;"></td>
            <td style="width: 30%; text-align: left;">Jakarta, <?= tgl_indo($info_jadwal[$value]->tanggal_akhir) ?></td>
        </tr>
        <tr>
            <td style="width: 40%; text-align: left;">Asesor Kompetensi</td>
            <td style="width: 30%;"></td>
        </tr>
        <?php
            foreach ($asesor_uji[$value] as $key => $list_asesor){ 
                    echo '
                        <tr>
                            <td style="width: 40%; text-align: left; padding: 2px; ">'.($key+1).'.  '.$list_asesor->users.'</td>
                            <td style="width: 30%; padding: 2px; text-align: right;">(ttd)</td>
                        </tr>
                                            
                     ';
                
            }
        ?>
        </tbody>
    </table>
    </p>
</page>
<?php } ?>