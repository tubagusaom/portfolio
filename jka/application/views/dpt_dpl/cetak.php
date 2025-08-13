<page backtop="35mm" backbottom="20mm" backleft="20mm" backright="20mm">
    <page_header>
        <div style="margin-left: 25px; ">
            <img src="<?php echo path_image() . 'assets/img/logo.png'; ?>" width="150" height="90" />
        </div>
    </page_header>
    <page_footer >
        <div style="margin-left: -25px;margin-bottom: 0px; ">
            <img src="<?php echo path_image() . 'assets/img/kop_bawah.png'; ?>" width="820" height="60" />
        </div>
    </page_footer>
    <h4>FR-MPA-02.3. DAFTAR PERTANYAAN TES LISAN</h4>


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
            <td style="width: 70%;padding: 5px;"> <?= $query_soal_dpt_dpl[0]->waktu_pengerjaan ?> Menit</td>
        </tr>
        <tr  nobr="true">
            <td style="font-weight: bold;padding: 5px;" valign="middle">Tanggal Asesmen</td>
            <td style="padding: 5px;"><?= tgl_indo($data_asesi->tanggal) ?>
            </td>
        </tr>
    </table>
    <br/><br/>
   <?= $dpt_dpl ?>
    <br/>
    <table style="width:100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
        <tr nobr="true">
            <td rowspan="7" style="width: 50%;"> <strong>Rekomendasi Asesor</strong> <br/>
                Peserta  
                <b><?php echo $data_asesi->is_dpl_kompeten == '1' ? 'Kompeten' : 'Belum Kompeten'; ?></b>
                pada Tes Lisan

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
