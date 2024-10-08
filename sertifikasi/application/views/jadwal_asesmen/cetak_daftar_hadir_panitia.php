
<style>
    td,th{
        padding: 1mm;
    }
</style>
<page backtop="10mm" backbottom="10mm" backleft="5mm" backright="5mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: center;    width: 20%"><img src="<?php echo base_url() . 'assets/img/logo1.png'; ?>" width="60px;" /></td>
                <td style="text-align: center;    width: 80%;"><b><?= $konfigurasi->nama_unit ?></b><br>
                    <?= $konfigurasi->alamat ?><br>
                    Telp. <?= $konfigurasi->no_telpon ?><br>
                    Email: <?= $konfigurasi->alamat_email ?>, Website: www.it-konsultan.com
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 20%"><?= $konfigurasi->singkatan_unit ?> :
                </td>
                <td style="text-align: left;    width: 35%"> <?= $konfigurasi->alamat ?> <?= $konfigurasi->no_telpon ?></td>
                <td style="text-align: right;    width: 45%">Halaman [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>

    <h4 style="margin-top:50px; text-align: center">DAFTAR KEHADIRAN PANITIA UJI KOMPETENSI<br>
        PROGRAM PELAKSANAAN SERTIFIKASI KOMPETENSI KERJA (PSKK) TAHUN 2019</h4>
    <?php
    $noxx = 1;
    $no_urut = 1;
    $datax = '';
    foreach ($daftar_hadir_panitia as $key => $value) {
        $datax .= '<tr height="500">
	<td style="width:5%;text-align:center"> ' . $noxx . '  <br> </td>
	<td style="width:60%;"> ' . strtoupper($value) . '   <br> </td>';
        if ($noxx % 2 != 0) {
            $datax .= '<td style="width:17%;" rowspan="2"> ' . $no_urut . '......   <br> </td>
        	<td style="width:18%;" rowspan="2"> ' . ($no_urut + 1) . '......   <br> </td>
        ';
        }
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
            <td style="width:60%;text-align: center;"> NAMA LENGKAP </td>
            <td colspan="2" style="width:35%;text-align: center;"> TANDA TANGAN </td>
        </tr>
        <?= $datax ?>
    </table>
</page>
