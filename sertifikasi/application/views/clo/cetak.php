<page backtop="35mm" backbottom="20mm" backleft="20mm" backright="20mm">
    <page_header>
        <div style="margin-left: 25px; ">
            <img src="<?php echo base_url() . 'assets/img/kop_atas.jpg'; ?>" height="100px" width="620px;" />
        </div>
    </page_header>
    <h4>FR-MPA-02.2.  CEKLIS OBSERVASI-DEMONSTRASI/PRAKTEK</h4>


    <table border="1" cellpadding="2" style="border-collapse: collapse;" cellpadding="10" cellspacing="10" >


        <tr  nobr="true">
            <td style="font-weight: bolder;font-weight: bold;padding: 5px;">Judul Skema Sertifikasi</td>
            <td style="padding: 5px;"><?= $data_asesi->skema ?></td>
        </tr>
        <tr  nobr="true">
            <td style="font-weight: bolder;font-weight: bold;padding: 5px;" valign="middle">TUK</td>
            <td style="margin-left: 20px;padding: 5px;"><?= $data_asesi->tuk ?>
            </td>
        </tr>
        <tr  nobr="true">
            <td style="font-weight: bold;padding: 5px;" valign="middle">Nama Asesor</td>
            <td style="padding: 5px;"><?= $data_asesi->users ?>
            </td>
        </tr>
        <tr  nobr="true">
            <td style="font-weight: bold;padding: 5px;" valign="middle">Nama Peserta</td>
            <td style="padding: 5px;"><?= $data_asesi->nama_lengkap ?>
            </td>
        </tr>
        <tr  nobr="true">
            <td style="font-weight: bolder;width: 30%;font-weight: bold;padding: 5px;">Waktu</td>
            <td style="width: 70%;padding: 5px;"> <?= $query_soal_clo[0]->waktu_pengerjaan ?> Menit</td>
        </tr>
        <tr  nobr="true">
            <td style="font-weight: bold;padding: 5px;" valign="middle">Tanggal Asesmen</td>
            <td style="padding: 5px;"><?= tgl_indo($data_asesi->tanggal) ?>
            </td>
        </tr>
    </table>
    <br/><br/>
    <?php
    $vat_portofolio = is_null($data_asesi->vat_portofolio) ? array() : unserialize($data_asesi->vat_portofolio);
    //var_dump($vat_portofolio);
    ?>

    <?= $clo ?>
    <br/>
    <table style="width:100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
        <tr nobr="true">
            <td rowspan="7" style="width: 50%;"> <strong>Rekomendasi Asesor</strong> <br/>
                Peserta  
                <b><?php echo $data_asesi->is_observasi_kompeten == '1' ? 'Kompeten' : 'Belum Kompeten'; ?></b>
                pada observasi demonstrasi

            </td>
            <td colspan="2" style="width: 50%;"> <strong>Pemohon :</strong> </td> 
        </tr>

        <tr nobr="true">

            <td style="width: 25%;border-left:none;"> Nama </td>
            <td style="width: 25%;"> <?= $data_asesi->nama_lengkap ?> </td> 
        </tr>


        <tr nobr="true">

            <td style="border-left:none;"> Tanda Tangan / Tanggal </td>
            <td style="height: 35px;"> <qrcode value="<?php echo $msg; ?>" ec="Q" style="width: 15mm;"></qrcode> </td> 
        </tr>

        <tr nobr="true">

            <td colspan="2"> <strong>Asesor /Admin LSP  :</strong> </td> 
        </tr>

        <tr nobr="true">

            <td style="border-left:none;"> Nama </td>
            <td> <?= $data_asesi->nama_user ?> </td> 
        </tr>

        <tr nobr="true">

            <td style="border-left:none;"> No.Reg </td>
            <td>  <?= $data_asesi->no_reg ?></td> 
        </tr>
        <tr nobr="true">

            <td style="border-left:none;"> Tanda Tangan / Tanggal </td>
            <td style="height: 35px;"> <qrcode value="<?php echo $ttd_asesor; ?>" ec="Q" style="width: 15mm;"></qrcode> </td> 
        </tr>
    </table>
</page>


<page backtop="35mm" backbottom="20mm" backleft="20mm" backright="20mm">
    <page_header>
        <div style="margin-left: 25px; ">
            <img src="<?php echo base_url() . 'assets/img/kop_atas.jpg'; ?>" height="100px" width="620px;" />
        </div>
    </page_header>
   
    <h4>FR-MPA.02.2.L  TUGAS PRAKTEK-DEMONSTRASI/PRAKTEK</h4>


    <table border="1" cellpadding="2" style="border-collapse: collapse;" cellpadding="10" cellspacing="10" >


        <tr  nobr="true">
            <td style="font-weight: bolder;font-weight: bold;padding: 5px;">Judul Skema Sertifikasi</td>
            <td style="padding: 5px;"><?= $data_asesi->skema ?></td>
        </tr>
        <tr  nobr="true">
            <td style="font-weight: bolder;font-weight: bold;padding: 5px;" valign="middle">TUK</td>
            <td style="margin-left: 20px;padding: 5px;"><?= $data_asesi->tuk ?>
            </td>
        </tr>
        <tr  nobr="true">
            <td style="font-weight: bold;padding: 5px;" valign="middle">Nama Asesor</td>
            <td style="padding: 5px;"><?= $data_asesi->users ?>
            </td>
        </tr>
        <tr  nobr="true">
            <td style="font-weight: bold;padding: 5px;" valign="middle">Nama Peserta</td>
            <td style="padding: 5px;"><?= $data_asesi->nama_lengkap ?>
            </td>
        </tr>
        <tr  nobr="true">
            <td style="font-weight: bolder;width: 30%;font-weight: bold;padding: 5px;">Waktu</td>
            <td style="width: 70%;padding: 5px;"> <?= $query_soal_clo[0]->waktu_pengerjaan ?> Menit</td>
        </tr>
        <tr  nobr="true">
            <td style="font-weight: bold;padding: 5px;" valign="middle">Tanggal Asesmen</td>
            <td style="padding: 5px;"><?= tgl_indo($data_asesi->tanggal) ?>
            </td>
        </tr>
    </table>
    <br/><br/>
    <h4>A. Petunjuk</h4>

    <ol type="1">
        <li>Baca dan pelajari setiap instruksi kerja di bawah ini dengan cermat sebelum melaksanakan praktek</li>
        <li>Klarifikasi kepada Asesor apabila ada hal-hal yang belum jelas</li>
        <li>Laksanakan pekerjaan sesuai dengan urutan proses yang sudah ditetapkan</li>
        <li>Seluruh proses kerja mengacu kepada SOP/WI yang dipersyaratkan</li>

    </ol>

    <br/><br/>
    <h4>B. Skenario Tugas</h4>
    <ul>
        <?php
        foreach ($query_soal_clo as $key => $value) {
            echo '<li>' . $value->pertanyaan . '</li>';
        }
        ?>
    </ul>
    
    <br/><br/>
    <h4>C. Langkah Kerja</h4>
    <ol type="1">
    <?php        foreach ($langkah_kerja as $key=>$value){
        echo '<li>'. $value . '</li>';
    }?>
    </ol>
</page>