
<style>
    td,th{
        padding: 1mm;
    }
</style>
<page backtop="35mm" backbottom="10mm" backleft="5mm" backright="5mm">
<page_header>
        <div>
            <img src="<?php echo site_url().'assets/img/kop_atas.jpg';?>" width="750" height="149" />
        </div>
        <br />
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: right;    width: 45%">Halaman [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
    <h4 style="margin-top:50px; text-align: center">DAFTAR HADIR PESERTA ASESMEN/UJI KOMPETENSI<br>
        PELAKSANAAN SERTIFIKASI TAHUN <?=date("Y",strtotime($jadwal->tanggal)); ?><br>
        <?=$konfigurasi->nama_unit?></h4>
    <?php
    $noxx = 1;
    $no_urut = 1;
    $datax = '';
    foreach ($daftar_hadir as $key => $value) {
        // var_dump($daftar_hadir);die();
        $ttd_asesis = $no_urut.".".$value->nama_lengkap . " - " . $value->organisasi . " - " . $konfigurasi->url_aplikasi . "/qrcode/asesi";
        // $ttd_asesi = ($no_urut + 1).".".$daftar_hadir[$no_urut]->nama_lengkap . " - " . $daftar_hadir[$no_urut]->organisasi . " - " . $konfigurasi->url_aplikasi . "/qrcode/asesi";

        $datax .= '<tr height="500">
	                <td style="width:5%;text-align:center"> ' . $noxx . '  <br> </td>
	                <td style="width:40%;"> ' . strtoupper($value->nama_lengkap) . '   <br> </td>
                    <td style="width:40%;text-align:center"> ' . $value->organisasi . '  <br> </td>'
                    .'<td style="width:15%;text-align:center"> ' . $no_urut . '. <qrcode value="'.$ttd_asesis.'" ec="Q" style="width: 15mm;"></qrcode> <br> </td>'
                ;
        // if ($noxx % 2 != 0) {
        //     $datax .= '<td style="width:15%;" rowspan="2"> ' . $no_urut . '. <qrcode value="'.$ttd_asesis.'" ec="Q" style="width: 15mm;"></qrcode>  <br> </td>
        // 	<td style="width:18%;" rowspan="2"> ' . ($no_urut + 1) . '.<qrcode value="'.$ttd_asesi.'" ec="Q" style="width: 15mm;"></qrcode>  </td>
        // ';
        // }
        $datax .= '</tr>';
        $noxx++;
        $no_urut++;
    }
    ?> 
    <table>
        <tr>
            <td>Nama Jadwal</td>
            <td>:</td>
            <td><?= $jadwal->jadual ?></td>
        </tr>
        <tr>
            <td>TUK</td>
            <td>:</td>
            <td><?= $tuk->tuk ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?= $tuk->alamat ?></td>
        </tr>
        <tr>
            <td>Tanggal Uji Kompetensi</td>
            <td>:</td>
            <td><?= tgl_indo($jadwal->tanggal) . ' - ' . tgl_indo($jadwal->tanggal_akhir) ?></td>
        </tr>
        <tr>
            <td>Jumlah Asesi</td>
            <td>:</td>
            <td><?= count($daftar_hadir); ?> Orang</td>
        </tr>
    </table>

    <table style="width:100%;" border="1" cellpadding="3" cellspacing="0" >
        <tr style="font-weight:bold;">
            <td style="width:5%;text-align: center;"> No </td>
            <td style="width:40%;text-align: center;"> NAMA LENGKAP </td>
            <td style="width:40%;text-align: center;"> ORGANISASI </td>
            <td style="width:15%;text-align: center;"> TANDA TANGAN </td>
            <!-- <td colspan="2" style="width:35%;text-align: center;"> TANDA TANGAN </td> -->
        </tr> 
        <?= $datax ?>  
    </table>
</page>