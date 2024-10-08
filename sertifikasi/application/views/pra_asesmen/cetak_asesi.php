<style>
    td,th{
        padding: 1mm;
    }
</style>

<page backtop="15mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 5%"><img src="<?php echo base_url() . 'assets/img/logo48.png'; ?>" /></td>
                <td style="text-align: left;    width: 64%;font-weight: lighter;"><?= $aplikasi->nama_unit ?></td>

            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 11%"><?= $aplikasi->singkatan_unit ?> :
                </td>
                <td style="text-align: left;    width: 49%"> <?= $aplikasi->alamat ?> <?= $aplikasi->no_telpon ?></td>
                <td style="text-align: right;    width: 40%">Halaman [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
    <h3>FR-APL-02 ASESMEN MANDIRI</h3>
    <br/><br/>
    <table style="width:100%">
        <tr  nobr="true">
            <td style="width: 20%;font-weight: bold;"> Nama Peserta</td>
            <td style="width: 35%;">: <?= strtoupper($data_asesi->nama_lengkap) ?></td>
            <td style="width: 20%;font-weight: bold;">Tanggal/Waktu</td>
            <td style="width: 25%;">: <?= $data_asesi->u_date_create ?></td>
        </tr>
        <tr  nobr="true">
            <td style="width: 20%;font-weight: bold;"> Nama Asesor</td>
            <td style="width: 35%;">: <?= $asesor_pra_asesmen->users ?> </td>
            <td style="width: 20%;font-weight: bold;">TUK</td>
            <td style="width: 25%;">: <?= $data_asesi->tuk ?></td>
        </tr>
    </table>
    <br/>
    <div style="left: -10px;">
        Pada bagian ini, anda diminta untuk menilai diri sendiri terhadap unit(unit-unit) kompetensi yang akan di-ases.
        <br/>
        <table cellpadding="2" style="border-collapse: collapse;">
            <tr  nobr="true">
                <td style="width: 3%;">1.</td>
                <td style="width: 95%;text-align: justify;">Pelajari seluruh standar Kriteria Unjuk Kerja (KUK), batasan variabel, panduan penilaian dan aspek kritis serta yakinkan bahwa anda sudah benar-benar memahami seluruh isinya.</td>
            </tr>
            <tr  nobr="true">
                <td style="width: 3%;">2.</td>
                <td style="width: 95%;text-align: justify;">Laksanakan penilaian mandiri dengan mempelajari dan menilai kemampuan yang anda miliki secara obyektif terhadap seluruh
                    daftar pertanyaan yang ada, serta tentukan apakah sudah kompeten (K) atau belum kompeten (BK) dengan mencantumkan tanda <B>V</b>
                    dan tuliskan bukti-bukti pendukung yang anda anggap relevan terhadap setiap elemen/KUK unit kompetensi.
                </td>
            </tr>
            <tr  nobr="true">
                <td style="width: 3%;">3.</td>
                <td style="width: 95%;text-align: justify;">Asesor dan Peserta menandatangani form Asesmen Mandiri</td>
            </tr>
        </table>
        <br />
    </div>


    <table border="1" cellpadding="2" style="border-collapse: collapse;" >

        <tr  nobr="true">
            <td style="font-weight: bolder;width: 30%;font-weight: bold;">Nomor Skema Sertifikasi</td>
            <td style="width: 70%;"> <?= $data_asesi->kode_skema ?> </td>
        </tr>
        <tr  nobr="true">
            <td style="font-weight: bolder;font-weight: bold;">Judul Skema Sertifikasi</td>
            <td><?= $data_asesi->skema ?></td>
        </tr>

    </table>
    <br/>
    <table border="1"  cellpadding="2" style="border-collapse: collapse;width: 100%;font-size: 10px;">
        <tr  nobr="true">
            <td rowspan="2" style="text-align: center;font-weight: bold;width: 15%;background-color: #5DC8CD;">Unit Kompetensi</td>
            <td rowspan="2" style="text-align: center;font-weight: bold;width: 40%;background-color: #5DC8CD;">Daftar Pertanyaan <br/> (Assesmen Mandiri/Self Assesment)</td>
            <td colspan="2" style="text-align: center;font-weight: bold;width: 8%;background-color: #5DC8CD;">Penilaian</td>
            <td rowspan="2" style="text-align: center;font-weight: bold;width: 25%;background-color: #5DC8CD;">Bukti-bukti Pendukung</td>
            <td colspan="4" style="text-align: center;font-weight: bold;width: 10%;background-color: #5DC8CD;">Diisi Asesor</td>
        </tr>
        <tr  nobr="true">
            <td style="text-align: center;font-weight: bold;background-color: #5DC8CD;width: 4%;">K</td>
            <td style="text-align: center;font-weight: bold;background-color: #5DC8CD;width: 4%;">BK</td>
            <td style="text-align: center;font-weight: bold;background-color: #5DC8CD;width: 5%;">V</td>
            <td style="text-align: center;font-weight: bold;background-color: #5DC8CD;width: 5%;">A</td>
            <td style="text-align: center;font-weight: bold;background-color: #5DC8CD;width: 5%;">T</td>
            <td style="text-align: center;font-weight: bold;background-color: #5DC8CD;width: 5%;">M</td>
        </tr>
        <?php
        $checklist = '<img style="width: 10px;" src="assets/img/cl.png" />';
        if($data_asesi->metode_asesmen=='2'){

            foreach ($detail_asesi as $key => $value) {
            ?>
                <tr>
                    <td style="width: 15%;text-align: center;" ><?= $value->unit_kompetensi_id ?></td>
                    <td style="width: 40%;"><?= $value->elemen ?></td>
                    <td style="text-align: center;width: 4%;">K</td>
                    <td style="text-align: center;width: 4%;"></td>
                    <td style="text-align: center;width: 25%;"><?= $jenis_bukti ?></td>
                    <td style="text-align: center"><?=$checklist?> </td>
                    <td style="text-align: center"> <?=$checklist?>  </td>
                    <td style="text-align: center"> <?=$checklist?>  </td>
                    <td style="text-align: center"> <?=$checklist?> </td>
                </tr>
                <?php
            }
        }else{
            foreach ($detail_asesi as $key => $value) {
            ?>
                <tr>
                    <td style="width: 15%;text-align: center;" ><?= $value->unit_kompetensi_id ?></td>
                    <td style="width: 40%;"><?= $value->elemen ?></td>
                    <td style="text-align: center;width: 4%;">K</td>
                    <td style="text-align: center;width: 4%;"></td>
                    <td style="text-align: center;width: 25%;"><?= $jenis_bukti ?></td>
                    <td style="text-align: center"><?=$checklist?> </td>
                    <td style="text-align: center"> <?=$checklist?>  </td>
                    <td style="text-align: center"> <?=$checklist?>  </td>
                    <td style="text-align: center">  </td>
                </tr>
                <?php
            }
        }

        ?>
    </table>
    <br />
    <table style="width:100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
        <tr nobr="true">
            <td rowspan="3" style="width: 50%;"> <strong>Rekomendasi Asesor</strong> : <?= $data_asesi->pra_asesmen_description ?></td>
            <td colspan="2" style="width: 50%;"> <strong>Pemohon :</strong> </td>
        </tr>

        <tr nobr="true">

            <td style="width: 25%;"> Nama </td>
            <td style="width: 25%;"> <?= $data_asesi->nama_lengkap ?> </td>
        </tr>


        <tr nobr="true">

            <td> Tanda Tangan / Tanggal </td>
            <td style="height: 35px;"> <qrcode value="<?php echo $ttd_asesor; ?>" ec="Q" style="width: 15mm;"></qrcode><br/>     <?=$data_asesi->u_date_create?></td>
        </tr>

        <tr nobr="true">
            <td rowspan="4"> <strong>Catatan :</strong> </td>
            <td colspan="2"> <strong>Asesor  :</strong> </td>
        </tr>

        <tr nobr="true">

            <td> Nama </td>
            <td> <?= $asesor_pra_asesmen->users ?> </td>
        </tr>

        <tr nobr="true">

            <td> No.Reg </td>
            <td>  <?= $asesor_pra_asesmen->no_reg ?></td>
        </tr>


        <tr nobr="true">

            <td> Tanda Tangan / Tanggal </td>
            <td style="height: 35px;"> <qrcode value="<?php echo $ttd_asesor; ?>" ec="Q" style="width: 15mm;"></qrcode> <br/>
        <?=$data_asesi->pra_asesmen_date?></td>
        </tr>



    </table>
</page>
