<style>
    td,th{
        padding: 1mm;
    }
    div,p{
        font-family: arial;
    }
</style>
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">

    <page_header>
        <div align="center">
            <img src="<?php echo path_image() . 'assets/img/kop_atas.png'; ?>" height="100px" width="620px;" />
        </div>
    </page_header>

    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: right;    width: 45%">Halaman [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
    <h2 style="text-decoration: underline; margin-top: 100px;" align="center">SURAT TUGAS</h2>

    <h5 align="center" style="margin-top: -15px;">No: <?= $no_st ?></h5>

    <table  border="0" style="width:100%;" >
        <tr>
            <td style="width:17%;vertical-align: top;">Pertimbangan :</td>
            <td style="width:5%;vertical-align: top;">1.</td>
            <td style="width:77%;text-align: justify;">Pelaksanaan Uji Kompetensi oleh TUK <?= $tuk ?></td>
        </tr>
        <tr>
            <td style="width:17%;vertical-align: top;"></td>
            <td style="width:5%;vertical-align: top;">2.</td>
            <?php foreach ($array_skema as $key => $value) { ?>
                <td style="width:77%;text-align: justify;">Surat Keputusan Kepala/Direktur <?= $aplikasi->singkatan_unit ?> Nomor: KEP 02/PSKK/LSP-ITK_/V/2019 Tentang
                    Pelaksanaan Uji Kompetensi untuk <?= $value ?> di TUK <?= $tuk ?> pada Program Pelaksanaan Sertifikasi Kompetensi Kerja (PSKK)-ITK_ Tahun 2019.</td>
            <?php } ?>
        </tr>
        <tr>
            <td style="width:17%;vertical-align: top;">Dasar :</td>
            <td style="width:5%;vertical-align: top;">1.</td>
            <td style="width:82%;text-align: justify;">Perjanjian Program Pelaksanaan Sertifikasi Kompetensi Kerja (PSKK)
                antara Pejabat Pembuat Komitmen Sekretariat Badan Nasional Sertifikasi
                Profesi
                (BNSP)
                dengan <?= $aplikasi->nama_unit ?> selaku Pelaksana Program PSKK, Nomor: KEP 02/PSKK/LSP-ITK_/V/2019, tanggal 2 bulan Mei tahun 2019.</td>
        </tr>
        <tr>
            <td style="width:17%;vertical-align: top;"></td>
            <td style="width:5%;vertical-align: top;">2.</td>
            <td style="width:82%;text-align: justify;">Surat Perintah Mulai Kerja Nomor: SPMK.214/PSKK/SET-BNSP/V/2019, tanggal 3 bulan Mei tahun 2019.</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center;">M e n u g a s k a n </td>
        </tr>
        <tr>
            <td style="width:17%;vertical-align: top;">Kepada :</td>
            <td colspan="2" style="width:82%;text-align: justify;">Para Petugas yang namanya tercantum pada lampiran Surat Tugas ini</td>
        </tr>
        <tr>
            <td style="width:17%;vertical-align: top;">Untuk :</td>
            <td style="width:5%;vertical-align: top;">1.</td>
            <td style="width:77%;text-align: justify;">Mempersiapkan sarana dan prasarana Uji Kompetensi mulai dari tanggal <?= $tanggal_persiapan ?></td>
        </tr>
        <tr>
            <td style="width:17%;vertical-align: top;"></td>
            <td style="width:5%;vertical-align: top;">2.</td>
            <td style="width:77%;text-align: justify;">Dalam melaksanakan tugasnya perlu memperhatikan hal-hal sebagai berikut <br/>
                <ol style="margin-bottom: -10px;margin-top: -10px;margin-left: -20px;list-style: none;list-style-type: lower-alpha;">
                    <li>Data kelengkapan Uji Kompetensi</li>
                    <li>Menjelang Pelaksanaan Uji Kompetensi diadakan Rapat Persiapan Uji antara Penanggung Jawab, Penyelenggara dan Asesor</li>
                    <li>Uji Kompetensi diadakan pada <?= tgl_indo($jadual_asesmen->tanggal) ?> s.d. <?= tgl_indo($jadual_asesmen->tanggal_akhir) ?> 06.30 s.d. 17.00 WIB</li>
                </ol>
            </td>
        </tr>
        <tr>
            <td style="width:17%;vertical-align: top;"></td>
            <td style="width:5%;vertical-align: top;">3.</td>
            <td style="width:77%;text-align: justify;">Melaksanakan tugas dengan sebaik-baiknya dan melaporkan hasil pelaksanaan tugasnya kepada Ketua/Direktur <?= $aplikasi->singkatan_unit ?></td>
        </tr>
        <tr>
            <td style="width:17%;vertical-align: top;"></td>
            <td style="width:5%;vertical-align: top;">4.</td>
            <td style="width:77%;text-align: justify;">Semua biaya yang timbul akibat dikeluarkannya Surat Perintah Tugas ini dibebankan kepada Anggaran Program Pelaksanaan Sertifikasi Kompetensi Kerja (PSKK) - BNSP Tahun 2019 melalui LSP it-konsultan.</td>
        </tr>
    </table>

    <div style="margin-left: 400px;">
        Dikeluarkan di: J a k a r t a
        <p style="text-decoration: underline;">
            Pada tanggal: <?= tgl_indo($jadual_asesmen->tanggal) ?></p>
        <p style="margin-left: 20px; font-weight: bold;">
            Direktur <?= $aplikasi->singkatan_unit ?>
        </p>
        <div style="font-weight: bold; margin-left: 50px; "><qrcode style="margin-left: 150px;" value="<?php echo $qr_ketua_lsp; ?>" ec="Q" style="width: 20mm;"></qrcode></div>
        <div style="font-weight: bold; margin-left: 30px; margin-top: 10px;"><?= $aplikasi->ketua ?></div>
    </div>
    <div style="text-decoration: underline; font-style: italic; font-weight: bold;">Disampaikan kepada Yth</div>
    Para Penanggung Jawab, Penyelenggara, Asesor<div></div>
    <div style="text-decoration: underline; font-style: italic; font-weight: bold;">Tembusan kepada Yth </div>
    Arsip
</page>

<page backtop="35mm" backbottom="20mm" backleft="20mm" backright="20mm">
    <page_header>
        <div align="center">
            <img src="<?php echo path_image() . 'assets/img/kop_atas.png'; ?>" height="100px" width="620px;" />
        </div>
    </page_header>

    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: right;    width: 45%">Halaman [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
    <div style="font-family: arial, sans-serif; margin-top: 5px; font-size: 16px; margin-left: 300px;">
        Lampiran Surat Tugas <div></div>
        Nomor &nbsp;&nbsp;: <?= $no_st ?> <div></div>
        Tanggal : <?= tgl_indo($jadual_asesmen->tanggal) ?>
    </div>
    <?php foreach ($array_skema as $key => $value) { ?>
        <div style="font-weight: bold; text-transform: uppercase; font-size: 16px; padding-top:25px;">
            <?= $value ?>
        </div><div style="font-size: 14px;"> Terdiri dari <?php echo count($unit_kompetensi[$key]) ?> (<?=kekata(count($unit_kompetensi[$key]))?>) unit sebagai berikut:</div>

        <table border="1" style="margin-top: 10px;width: 100%; border-collapse: collapse; text-align: center;">
            <tr>
                <th>NO</th>
                <th>KODE UNIT</th>
                <th>JUDUL UNIT KOMPETENSI</th>
            </tr>
            <?php foreach ($unit_kompetensi[$key] as $keys => $values) { ?>

                <tr>
                    <td style="width: 5%;"><?= ($keys + 1) ?></td>
                    <td style="width: 25%;"><?= $values['id_unit_kompetensi'] ?></td>
                    <td style="width: 70%;text-align: left;"><?= $values['unit_kompetensi'] ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>

</page>
 <?php
 //var_dump($data['asesor_kompetensi']);die();
 //var_dump($asesor_kompetensi);
 foreach ($asesor_kompetensi as $keyx => $valuex) { ?>
<page backtop="35mm" backbottom="20mm" backleft="20mm" backright="20mm">
    <page_header>
        <div align="center">
            <img src="<?php echo path_image() . 'assets/img/kop_atas.png'; ?>" height="100px" width="620px;" />
        </div>
    </page_header>
    <page_footer>

            <p>
            <div style="color: red; font-size: 20px; font-weight:bold; text-align: center;">Sekretariat</div>
            <div style="text-align: center; font-weight: bold;"><?=$aplikasi->alamat?></div>
            <div style="text-align: center; font-weight: bold;">Telp./Fax.: <?=$aplikasi->no_telpon?>/<?=$aplikasi->no_fax?></div>
            <div style="text-align: center; font-weight: bold; font-style: italic;">e-mail: <?=$aplikasi->alamat_email?> , web-site : www.<?=$aplikasi->url_aplikasi?></div>
            </p>
    </page_footer>
    <h2 style="text-decoration: underline; margin-top: 20px;" align="center">SURAT PERINTAH TUGAS</h2>

    <h5 align="center" style="margin-top: -15px;">No: <?=$no_st?></h5>


    <div style="font-family: arial, sans-serif; text-transform: uppercase; font-size: 12px; padding-top:25px;">
        Yang bertanda tangan dibawah ini, Ketua LSP ITK_, memberikan tugas kepada:</div>

    <table>
        <tr><td>Nama</td><td>:</td><td><?=$valuex->users?></td></tr>
        <tr><td>Profesi</td><td>:</td><td>Asesor Kompetensi</td></tr>
        <tr><td>No Registrasi</td><td>:</td><td><?=$valuex->no_reg?></td></tr>
    </table>


    <table border="1" style="width: 100%; border-collapse: collapse; text-align: center; margin-top: 10px;">
                <tbody>
            <tr>
                <td style="width: 5%; font-weight: bold;">NO</td>
                <td style="width: 25%; font-weight: bold;">NO KTP/KK</td>
                <td style="width: 40%; font-weight: bold;">NAMA LENGKAP</td>
                <td style="width: 30%; font-weight: bold;">TANGGAL</td>
            </tr>
            <?php

            $tanggal_asesmen = $jadual_asesmen->tanggal == $jadual_asesmen->tanggal_akhir ? $jadual_asesmen->tanggal : substr($jadual_asesmen->tanggal,8,2).' s.d. '.tgl_indo($jadual_asesmen->tanggal_akhir);
            foreach ($data_asesi[$keyx] as $keyxx => $valuexx) {

                ?>
            <tr>
                <td><?=($keyxx + 1)?></td>
                <td><?=$valuexx->no_identitas?></td>
                <td><?=$valuexx->nama_lengkap?></td>
                <td><?=$tanggal_asesmen?></td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br/>
    Rencana pelaksanaan di TUK: <?=$tuk?><br/>
Demikian surat tugas ini dibuat untuk dilaksanakan sebaik-baiknya.
<div style="margin-top:10px;" >
        Dikeluarkan di: J a k a r t a
        <p style="text-decoration: underline;">
        Pada tanggal: <?=tgl_indo($jadual_asesmen->tanggal)?></p>
        <p style="margin-left: 60px; font-weight: bold;">
            Ketua <?=$aplikasi->singkatan_unit?>
        </p>
        <div style="font-weight: bold; margin-left: 70px; "><qrcode style="margin-left: 150px;" value="<?php echo $qr_ketua_lsp; ?>" ec="Q" style="width: 20mm;"></qrcode></div>
        <div style="font-weight: bold; margin-left: 30px; margin-top: 10px;"><?=$aplikasi->ketua?></div>
    </div>
</page>
 <?php } ?>
