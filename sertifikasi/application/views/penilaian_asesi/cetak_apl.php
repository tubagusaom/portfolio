<style>
    td,th{
        padding: 1mm;
    }
    .hr_cover{
        height: 10px;
        background-color: #165d89;
        border: #165d89;
    }
</style>

<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 5%"><img src="<?php echo base_url() . 'assets/img/logo48.png'; ?>" /></td>
                <td style="text-align: left;    width: 50%;font-weight: lighter;"><?= $aplikasi->nama_unit ?></td>

            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 25%"><?=$aplikasi->singkatan_unit?> :
                </td>
                <td style="text-align: left;    width: 55%"> <?=$aplikasi->alamat?> <?=$aplikasi->no_telpon?></td>
                <td style="text-align: right;    width: 20%">Halaman [[page_cu]] / [[page_nb]]</td>
            </tr>
        </table>
    </page_footer>

    <br />
    <table style="width:100%;" border="0" cellpadding="4" cellspacing="3">
        <tr>
            <td style="width: 50%;"></td>
            <td style="width: 50%;font-size: 35px;font-weight: bold;border-bottom-color: beige 4px;">
                <hr class="hr_cover"/>APL 01 - APL 02
            </td>

        </tr>
        <tr>
            <td style="width: 50%;"></td>
            <td style="width: 50%;font-size: 20px;font-weight: bold;border-bottom-color: beige 4px;">
                <hr class="hr_cover"/>SKEMA SERTIFIKASI :<br />
                <font style="font-size: 16px;"><?= $data_asesi->skema ?></font>
            </td>

        </tr>
        <tr>
            <td style="width: 50%;"></td>
            <td style="width: 50%;font-size: 14px;font-weight: bold;border-bottom-color: beige 4px;"><hr class="hr_cover"/>TUK <?= $data_asesi->tuk ?><br /><?= $data_asesi->alamat_tuk ?><br /><?= $data_asesi->telp_tuk ?></td>

        </tr>
        <tr>
            <td style="width: 50%;"></td>
            <td style="width: 50%;font-size: 14px;font-weight: bold;border-bottom-color: beige 4px;"><hr class="hr_cover"/>Tanggal <?= tgl_indo($data_asesi->tanggal_mulai) ?> - <?= tgl_indo($data_asesi->tanggal_mulai) ?></td>

        </tr>
        <tr>
            <td style="width: 50%;"></td>
            <td style="width: 50%;font-size: 50px;font-weight: bold;border-bottom-color: beige 4px;"><hr class="hr_cover"/><?php echo date('Y', strtotime($data_asesi->tanggal_mulai)); ?><hr class="hr_cover"/></td>

        </tr>
        <tr>
            <td colspan="2" style="text-align: center;font-size: 40px;height: 100px;font-style: italic;vertical-align: bottom;"><?= $data_asesi->nama_lengkap ?><hr /></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;font-size: 30px;font-style: italic;">
                <?= $data_asesi->no_uji_kompetensi ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <qrcode value="<?php echo $qr_asesi; ?>" ec="Q" style="width: 35mm;"></qrcode>
            </td>
        </tr>

    </table>

</page>

<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 5%"><img src="<?php echo base_url() . 'assets/img/logo48.png'; ?>" /></td>
                <td style="text-align: left;    width: 50%;font-weight: lighter;"><?= $aplikasi->nama_unit ?></td>

            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 25%"><?=$aplikasi->singkatan_unit?> :
                </td>
                <td style="text-align: left;    width: 55%"> <?=$aplikasi->alamat?> <?=$aplikasi->no_telpon?></td>
                <td style="text-align: right;    width: 20%">Halaman [[page_cu]] / [[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
    <h4> FR-APL-01.FORMULIR PERMOHONAN SERTIFIKASI KOMPETENSI </h4>
    <table style="width:100%;" border="0" cellpadding="4" cellspacing="3">
        <tr nobr="true">
            <td colspan="6"><strong>Bagian 1 : Rincian Data Pemohon Sertifikasi</strong></td>

        </tr>
        <tr nobr="true">
            <td colspan="6">Pada Bagian ini, cantumkan data pribadi, data pendidikan formal serta data pekerjaan anda pada saat ini</td>

        </tr>
        <tr nobr="true">
            <td style="width:4%;"><strong>a.</strong></td>
            <td width="30%"><strong>Data Pribadi</strong></td>
            <td colspan="4"> </td>

        </tr>
        <tr nobr="true">
            <td style="width:4%;"> </td>
            <td width="30%">Nama Lengkap</td>
            <td width="3%;"> :  </td>
            <td width="60%;"> <?php echo strtoupper($data_asesi->nama_lengkap) ?> </td>

        </tr>
        <tr nobr="true">
            <td style="width:4%;"> </td>
            <td width="30%">Tempat / Tgl.Lahir</td>
            <td width="3%;"> :  </td>
            <td width="60%;"> <?php echo $data_asesi->tempat_lahir . ', ' . tgl_indo($data_asesi->tgl_lahir) ?> </td>
        </tr>

        <tr nobr="true">
            <td style="width:4%;"> </td>
            <td width="30%">Jenis Kelamin</td>
            <td width="3%;"> :  </td>
            <td width="60%;"> <?php echo $data_asesi->jenis_kelamin == '1' ? 'Laki-Laki' : 'Wanita' ?>   </td>

        </tr>
        <tr nobr="true">
            <td style="width:4%;"> </td>
            <td width="30%">Kebangsaan</td>
            <td width="3%;"> :  </td>
            <td width="60%;"> Indonesia   </td>
        </tr>

        <tr nobr="true">
            <td style="width:4%;"> </td>
            <td>Alamat Rumah</td>
            <td width="3%;"> :  </td>
            <td width="60%;"> <?php echo $data_asesi->alamat ?>  </td>
        </tr>

        <tr nobr="true">
            <td style="width:4%;"> </td>
            <td width="30%"></td>
            <td width="3%;">  </td>
            <td width="60%;">&nbsp;
            <!-- &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp; &nbsp; Kode Pos : _________________ -->
            </td>
        </tr>

        <tr nobr="true">
            <td style="width:4%;"> </td>
            <td>Nomor Telepon/HP/Email</td>
            <td width="3%;"> :  </td>
            <td width="60%;"> <?php echo $data_asesi->telp . ' / ' . $data_asesi->email ?></td>
        </tr>

        <tr nobr="true">
            <td style="width:4%;"> </td>
            <td>Pendidikan Terakhir</td>
            <td width="3%;"> :  </td>
            <td width="60%;">
                <?=$data_asesi->id_pendidikan==0?'-':''. strtoupper($data_asesi->pendidikan) .''?>
            </td>
        </tr>



        <tr nobr="true">
            <td style="width:4%;"><strong>b.</strong></td>
            <td width="30%"><strong>Data Pekerjaan Sekarang</strong></td>
            <td colspan="4"> </td>

        </tr>
        <tr nobr="true">
            <td style="width:4%;"> </td>
            <td width="30%">Nama Lembaga / Perusahaan</td>
            <td width="3%;"> :  </td>
            <td width="60%;">
                <?php
                  echo
                    $data_asesi->pekerjaan;
                ?>
            </td>

        </tr>
        <tr nobr="true">
            <td style="width:4%;"> </td>
            <td width="30%">Alamat</td>
            <td width="3%;"> :  </td>
            <td width="60%;"> <?= $data_asesi->alamat_company ?></td>

        </tr>
        <tr nobr="true">
            <td style="width:4%;"> </td>
            <td>Nomor Telepon/Email</td>
            <td width="3%;"> :  </td>
            <td width="60%;">
                Telp : <?= $data_asesi->telp_company ?> &nbsp; &nbsp; Fax : <?= $data_asesi->telp_company ?>
            </td>
        </tr>

        <tr nobr="true">
            <td colspan="3"> </td>

            <td width="60%;"> Email : <?= $data_asesi->email_company ?> </td>
        </tr>



        <tr nobr="true">
            <td style="width:4%;"><strong>c.</strong></td>
            <td width="30%"><strong>Data Permohonan Sertifikasi</strong></td>
            <td colspan="4"> </td>

        </tr>
        <tr nobr="true">
            <td style="width:4%;"> </td>
            <td width="30%">Tujuan Assessment </td>
            <td width="3%;"> :  </td>
            <td width="60%;">Sertifikasi</td>

        </tr>

        <tr nobr="true">
            <td style="width:4%;"> </td>
            <td width="30%">Skema Sertifikasi </td>
            <td width="3%;"> :  </td>
            <td width="60%;"> Okupasi </td>

        </tr>
        <tr nobr="true">
            <td style="width:4%;"> </td>
            <td width="30%">Kontak Asesmen </td>
            <td width="3%;"> :  </td>
            <td width="60%;"> TUK Mandiri </td>
        </tr>
        <tr nobr="true">
            <td style="width:4%;"> </td>
            <td width="30%">Acuan Pembanding </td>
            <td width="3%;"> :  </td>
            <td width="60%;"> SKKNI</td>
        </tr>
        <tr nobr="true">
            <td style="width:4%;"> </td>
            <td width="30%">TUK </td>
            <td width="3%;"> :  </td>
            <td width="60%;"> <?= $data_asesi->tuk ?> </td>
        </tr>

        <tr nobr="true">
            <td style="width:100%;border: 1px solid;text-align: justify;" colspan="4" >
                PERNYATAAN : Dalam rangka mengikuti kegiatan uji kompetensi yang di adakan oleh <?= $aplikasi->nama_unit ?>, dengan ini
                saya menyatakan dengan sesungguhnya bahwa dokumen-dokumen serta informasi yang saya berikan dalam formulir online
                pendaftaran Uji Kompetensi ini adalah sah dan benar. Apabila di kemudian hari terbukti bahwa dokumen yang telah saya sampaikan ternyata tidak sah dan manipulasi, saya bersedia untuk diproses melalui jalur hukum sesuai dengan ketentuan yang telah di tetapkan. Sesuai dengan ketentuan LSP, dokumen ini telah di tanda tangani secara elektronik sehinga tidak diperlukan lagi tanda tangan basah.

            </td>

        </tr>
        <tr nobr="true">
            <td style="width:4%;height: 2px;"> </td>
            <td width="30%"> </td>
            <td width="3%;">  </td>
            <td width="60%;"> </td>
        </tr>
        <tr nobr="true">
            <td style="width:4%;"> </td>
            <td width="30%"> </td>
            <td width="3%;">  </td>
            <td width="60%;" style="font-weight: bold;"><?php echo 'Jakarta, ' . tgl_indo(date("Y-m-d", strtotime($data_asesi->u_date_create))) ?> </td>
        </tr>

        <tr nobr="true">
            <td style="width:4%;"> </td>
            <td width="30%"> </td>
            <td width="3%;">  </td>
            <td width="60%;"><qrcode value="<?php echo $qr_asesi; ?>" ec="Q" style="width: 30mm;"></qrcode></td>
        </tr>
        <tr nobr="true">
            <td style="width:4%;height: 20px;"> </td>
            <td width="30%"> </td>
            <td width="3%;">  </td>
            <td width="60%;"> <b><?= $data_asesi->nama_lengkap ?></b></td>
        </tr>

    </table>

</page>



<page backtop="15mm" backbottom="15mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 5%"><img src="<?php echo base_url() . 'assets/img/logo48.png'; ?>" /></td>
                <td style="text-align: left;    width: 54%;font-weight: lighter;"><?= $aplikasi->nama_unit ?></td>

            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 25%"><?=$aplikasi->singkatan_unit?> :
                </td>
                <td style="text-align: left;    width: 55%"> <?=$aplikasi->alamat?> <?=$aplikasi->no_telpon?></td>
                <td style="text-align: right;    width: 20%">Halaman [[page_cu]] / [[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
    <h4>Bagian  2 :  Daftar Unit Kompetensi</h4>
    <div style="text-align: justify;">
        Pada bagian 2 ini berisikan Unit Kompetensi yang anda ajukan untuk dinilai/diuji kompetensi dalam rangka mendapatkan pengakuan sesuai dengan latar belakang pendidikan, pelatihan serta pengalaman kerja yang anda miliki.   Unit kompetensi yang diajukan sesuai dengan Skema Sertifikasi
    </div>
    <div style="margin-top: 15px;padding: 1mm;">Judul Skema : <?= $data_asesi->skema ?></div>
    <div style="padding: 1mm;">No Skema : <?= $data_asesi->kode_skema ?></div>
    <table  style="width: 100%;border: solid 1px ; border-collapse: collapse; margin-top: 25px;" cellpadding="3"   >
        <thead>
            <tr>
                <th style="width: 5%; text-align: left; border: solid 1px;text-align:center;background-color: #66c4ff; ">No</th>
                <th style="width: 25%; text-align: left; border: solid 1px;text-align:center;background-color: #66c4ff; ">Kode Unit Kompetensi</th>
                <th style="width: 45%; text-align: left; border: solid 1px;text-align:center;background-color: #66c4ff; ">Unit Kompetensi</th>
                <th style="width: 25%; text-align: left; border: solid 1px;text-align:center;background-color: #66c4ff; ">Jenis Standar (Standar Khusus/Standar Internasional/SKKNI)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($unit_kompetensi as $key => $value) {
                ?>
                <tr>
                    <td style="width: 5%; text-align: center; border: solid 1px ;">
                        <?= $key + 1 ?>
                    </td>
                    <td style="width: 25%; text-align: center; border: solid 1px ">
                        <?= $value->id_unit_kompetensi ?>
                    </td>
                    <td style="width: 45%; text-align: left; border: solid 1px ">
                        <?= $value->unit_kompetensi ?></td>
                    <td style="width: 25%; text-align: center; border: solid 1px ">
                        SKKNI</td>
                </tr>
                <?php
            }
            ?>
        </tbody>

    </table>
    <h4>Bagian  3 :  Bukti Kelengkapan Pemohon</h4>
    <table  style="width: 100%;border: solid 1px ; border-collapse: collapse; margin-top: 10px;" cellpadding="3">
        <thead>
            <tr>
                <th style="width: 5%; text-align: left; border: solid 1px;text-align:center;background-color: #66c4ff; ">No</th>
                <th style="width: 50%; text-align: left; border: solid 1px;text-align:center;background-color: #66c4ff; ">Unit/Elemen Kompetensi </th>
                <th style="width: 45%; text-align: left; border: solid 1px;text-align:center;background-color: #66c4ff; ">Bukti (paling relevan) :
                    Rincian Pendidikan/Pelatihan,    Pengalaman Kerja, Pengalaman Hidup
                </th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($asesi_detail as $key => $value) {
                ?>
                <tr>
                    <td style="width: 5%; text-align: center; border: solid 1px ;">
                        <?= $key + 1 ?>
                    </td>
                    <td style="width: 50%; text-align: left; border: solid 1px ">
                        <?= $value->elemen ?>
                    </td>
                    <td style="width: 45%; border: solid 1px; ">
                        <?php
                            foreach($files_asesi as $value){
                                echo '- '.str_replace('_', ' ', $value->nama_dokumen).'<br>';
                            }
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>

    </table>
    <br />
    <table style="width:100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
        <tr nobr="true">
            <td rowspan="3" style="width: 50%;">
                <strong>Rekomendasi</strong> <br/>&nbsp;
                <?php
                  if ($data_asesi->pra_asesmen == 1) {
                     echo "Lanjut";
                  }else{
                    echo "-";
                  }
                ?>
            </td>
            <td colspan="2" style="width: 50%;"> <strong>Pemohon :</strong> </td>
        </tr>

        <tr nobr="true">

            <td  style="width: 25%;"> Nama </td>
            <td style="width: 25%;"> <?= $data_asesi->nama_lengkap ?> </td>
        </tr>


        <tr nobr="true">

            <td> Tanda Tangan / Tanggal </td>
            <td style="height: 35px;"> <qrcode value="<?php echo $qr_asesi; ?>" ec="Q" style="width: 15mm;"></qrcode>  </td>
        </tr>

        <tr nobr="true">
            <td rowspan="4"> <strong>Catatan :</strong> <br/>&nbsp;<?=$data_asesi->pra_asesmen_description?> </td>
            <td colspan="2"> <strong>Asesor /Admin LSP  :</strong> </td>
        </tr>

        <tr nobr="true">

            <td> Nama </td>
            <td> <?= $asesor_pra_asesmen->users ?> </td>
        </tr>

        <tr nobr="true">

            <td> No.Reg </td>
            <td> <?= $asesor_pra_asesmen->no_reg ?> </td>
        </tr>


        <tr nobr="true">

            <td> Tanda Tangan / Tanggal </td>
            <td style="height: 35px;"> <qrcode value="<?php echo $ttd_asesor; ?>" ec="Q" style="width: 15mm;"></qrcode> </td>
        </tr>



    </table>
</page>

<page backtop="15mm" backbottom="15mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 5%"><img src="<?php echo base_url() . 'assets/img/logo48.png'; ?>" /></td>
                <td style="text-align: left;    width: 54%;font-weight: lighter;"><?= $aplikasi->nama_unit ?></td>

            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 25%"><?=$aplikasi->singkatan_unit?> :
                </td>
                <td style="text-align: left;    width: 55%"> <?=$aplikasi->alamat?> <?=$aplikasi->no_telpon?></td>
                <td style="text-align: right;    width: 20%">Halaman [[page_cu]] / [[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
    <h3>FR-APL-02 ASESMEN MANDIRI</h3>
    <br/>
    <table style="width: 100%;">
        <tr  nobr="true">
            <td style="width: 20%;font-weight: bold;"> Nama Peserta</td>
            <td style="width: 35%;">: <?= strtoupper($data_asesi->nama_lengkap) ?></td>
            <td style="width: 20%;font-weight: bold;">Tanggal/Waktu</td>
            <td style="width: 25%;">: <?= tgl_indo($data_asesi->tanggal_mulai) ?></td>
        </tr>
        <tr  nobr="true">
            <td style="width: 20%;font-weight: bold;"> Nama Asesor</td>
            <td style="width: 35%;">:  <?= $asesor_pra_asesmen->users ?></td>
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
                    daftar pertanyaan yang ada, serta tentukan apakah sudah kompeten (K) atau belum kompeten (BK) dengan mencantumkan tanda <B><?=$checklist?></b>
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


    <table border="1" cellpadding="2" style="border-collapse: collapse;width: 100%;" >

        <tr  nobr="true">
            <td style="font-weight: bolder;width: 30%;font-weight: bold;">Nomor Skema Sertifikasi</td>
            <td style="width: 70%;"> <?= $data_asesi->kode_skema ?> </td>
        </tr>
        <tr  nobr="true">
            <td style="font-weight: bolder;font-weight: bold;">Judul Skema Sertifikasi</td>
            <td><?= $data_asesi->skema ?></td>
        </tr>
        <tr  nobr="true">
            <td style="font-weight: bolder;font-weight: bold;" valign="middle">Kode Unit Kompetensi</td>
            <td style="margin-left: 20px;"><?= $kode_unit ?>
            </td>
        </tr>
        <tr  nobr="true">
            <td style="font-weight: bold;" valign="middle">Judul Unit Kompetensi</td>
            <td><?= $unit ?>
            </td>
        </tr>
    </table>
    <br/>
    <table border="1"  cellpadding="2" style="border-collapse: collapse;width: 100%;font-size: 10px;">
        <tr  nobr="true">
            <td rowspan="2" style="text-align: center;font-weight: bold;width: 15%;background-color: #66c4ff;">Unit Kompetensi</td>
            <td rowspan="2" style="text-align: center;font-weight: bold;width: 40%;background-color: #66c4ff;">Daftar Pertanyaan <br/> (Assesmen Mandiri/Self Assesment)</td>
            <td colspan="2" style="text-align: center;font-weight: bold;width: 9%;background-color: #66c4ff;">Penilaian</td>
            <td rowspan="2" style="text-align: center;font-weight: bold;width: 14.5%;background-color: #3aabf2;">Bukti-bukti Pendukung</td>
            <td colspan="4" style="text-align: center;font-weight: bold;width: 10%;background-color: #3aabf2;">Diisi Asesor</td>
        </tr>
        <tr  nobr="true">
            <td style="text-align: center;font-weight: bold;background-color: #3aabf2;width: 4%;">K</td>
            <td style="text-align: center;font-weight: bold;background-color: #3aabf2;width: 4%;">BK</td>
            <td style="text-align: center;font-weight: bold;background-color: #3aabf2;width: 5%;">V</td>
            <td style="text-align: center;font-weight: bold;background-color: #3aabf2;width: 5%;">A</td>
            <td style="text-align: center;font-weight: bold;background-color: #3aabf2;width: 5%;">T</td>
            <td style="text-align: center;font-weight: bold;background-color: #3aabf2;width: 5%;">M</td>
        </tr>
        <?php
        foreach ($asesi_detail as $key => $value) {
            ?>
            <tr>
                <td style="width: 15%;text-align: center;" ><?= $value->unit_kompetensi_id ?></td>
                <td style="width: 40%;"><?= $value->elemen ?></td>
                <td style="text-align: center;width: 4%;"><?= ($value->is_kompeten == "k" ? "K" : "") ?></td>
                <td style="text-align: center;width: 4%;"><?= ($value->is_kompeten == "bk" ? "BK" : "") ?></td>
                <td style="width: 15.5%;">
                    <?php
                        foreach($files_asesi as $value){
                            echo '- '.str_replace('_', ' ', $value->nama_dokumen).'<br>';
                        }
                    ?>
                </td>
                <td style="text-align: center"><?= $value->v = '1' ? $checklist : '' ?> </td>
                <td style="text-align: center"> <?= $value->a = '1' ? $checklist : '' ?> </td>
                <td style="text-align: center"> <?= $value->t = '1' ? $checklist : '' ?> </td>
                <td style="text-align: center"> <?= $value->m = '1' ? $checklist : '' ?> </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <br />
    <table style="width:100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
        <tr nobr="true">
            <td rowspan="3" style="width: 50%;">
                <strong>Rekomendasi Asesor</strong> <br/><br/>
                <?php
                    $ra = $data_asesi->rekomendasi_asesor;
                    if ($ra == 2) {
                      echo "Belum Kompeten";
                    }elseif ($ra == 1)  {
                      echo "Kompeten";
                    }else {
                      echo "-";
                    }
                ?>
              </td>
            <td colspan="2" style="width: 50%;"> <strong>Pemohon :</strong> </td>
        </tr>

        <tr nobr="true">

            <td style="width: 25%;"> Nama </td>
            <td style="width: 25%;"> <?= $data_asesi->nama_lengkap ?> </td>
        </tr>


        <tr nobr="true">

            <td> Tanda Tangan / Tanggal </td>
            <td style="height: 35px;"> <qrcode value="<?php echo $qr_asesi; ?>" ec="Q" style="width: 15mm;"></qrcode> </td>
        </tr>

        <tr nobr="true">
            <td rowspan="4" style="width: 50%;">
                <strong>Catatan :</strong> <br/><br/><?=$data_asesi->rekomendasi_description?>
            </td>
            <td colspan="2" style="width: 50%;"> <strong>Asesor /Admin LSP  :</strong> </td>
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
            <td style="height: 35px;">  <qrcode value="<?php echo $ttd_asesor; ?>" ec="Q" style="width: 15mm;"></qrcode> </td>
        </tr>



    </table>
</page>
