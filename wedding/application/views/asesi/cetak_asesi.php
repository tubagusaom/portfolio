<style>
td,th{
    padding: 1mm;
}
</style>
<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 5%"><img src="<?php echo base_url().'assets/img/logo48.png';?>" /></td>
                <td style="text-align: left;    width: 64%;font-weight: lighter;">
                    <?=$aplikasi->nama_unit?>
                </td>

            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 11%"><?=$aplikasi->singkatan_unit?> :
                </td>
                <td style="text-align: left;    width: 49%"> <?=$aplikasi->alamat?> <?=$aplikasi->no_telpon?></td>
                <td style="text-align: right;    width: 40%">Halaman [[page_cu]]/[[page_nb]]</td>
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
    <td width="60%;"> <?php echo $data_asesi->tempat_lahir.', '.tgl_indo($data_asesi->tgl_lahir) ?> </td>
  </tr>

  <tr nobr="true">
    <td style="width:4%;"> </td>
    <td width="30%">Jenis Kelamin</td>
    <td width="3%;"> :  </td>
    <td width="60%;"> <?php echo $data_asesi->jenis_kelamin=='1' ?'Laki-Laki':'Wanita' ?>   </td>

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
    <td width="60%;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp; &nbsp; Kode Pos : _________________  </td>
  </tr>

   <tr nobr="true">
    <td style="width:4%;"> </td>
    <td>Nomor Telepon/HP/Email</td>
    <td width="3%;"> :  </td>
    <td width="60%;"> <?php echo $data_asesi->telp.' / '.$data_asesi->email ?></td>
  </tr>

   <tr nobr="true">
    <td style="width:4%;"> </td>
    <td>Pendidikan Terakhir</td>
    <td width="3%;"> :  </td>
    <td width="60%;"> <?php echo strtoupper($pilihan_pendidikan[$data_asesi->pendidikan_terakhir]) ?> </td>
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
    <td width="60%;"> <?php echo $data_asesi->organisasi ?></td>

  </tr>
  <tr nobr="true">
    <td style="width:4%;"> </td>
    <td width="30%">Alamat</td>
    <td width="3%;"> :  </td>
    <td width="60%;"> <?=$data_asesi->alamat_company?></td>

  </tr>


   <tr nobr="true">
    <td style="width:4%;"> </td>
    <td>Nomor Telepon/Email</td>
    <td width="3%;"> :  </td>
    <td width="60%;"> Telp :<?=$data_asesi->telp_company?> &nbsp; &nbsp; Fax : <?=$data_asesi->telp_company?> </td>
  </tr>

   <tr nobr="true">
    <td colspan="3"> </td>

    <td width="60%;"> Email : <?=$data_asesi->email_company?> </td>
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
    <td width="60%;"> Okupasi</td>

  </tr>
  <tr nobr="true">
    <td style="width:4%;"> </td>
    <td width="30%">Kontak Asesmen </td>
    <td width="3%;"> :  </td>
    <td width="60%;"> TUK <?=$data_asesi->jenis_tuk?> </td>
 </tr>
 <tr nobr="true">
    <td style="width:4%;"> </td>
    <td width="30%">Acuan Pembanding </td>
    <td width="3%;"> :  </td>
    <td width="60%;"> SKKNI </td>
 </tr>
 <tr nobr="true">
    <td style="width:4%;"> </td>
    <td width="30%">TUK </td>
    <td width="3%;"> :  </td>
    <td width="60%;"> <?=$data_asesi->tuk?> </td>
 </tr>

  <tr nobr="true">
    <td style="width:100%;border: 1px solid;text-align: justify;" colspan="4" >
        PERNYATAAN : Dalam rangka mengikuti kegiatan uji kompetensi yang di adakan oleh <?=$aplikasi->nama_unit?>, dengan ini
        saya menyatakan dengan sesungguhnya bahwa dokumen-dokumen serta informasi yang saya berikan dalam formulir online
        pendaftaran Uji Kompetensi ini adalah sah dan benar. Apabila di kemudian hari terbukti bahwa dokumen yang telah saya sampaikan ternyata tidak sah dan manipulasi, saya bersedia untuk diproses melalui jalur hukum sesuai dengan ketentuan yang telah di tetapkan. Sesuai dengan ketentuan LSP, dokumen ini telah di tanda tangani secara elektronik sehinga tidak diperlukan lagi tanda tangan basah.</td>

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
    <td width="60%;" style="font-weight: bold;"><?php echo 'Jakarta, '.tgl_indo(date("Y-m-d", strtotime($data_asesi->u_date_create))) ?> </td>
  </tr>
  <tr nobr="true">
    <td style="width:4%;height: 35px;"> </td>
    <td width="30%"> </td>
    <td width="3%;">  </td>
    <td width="60%;"><qrcode value="<?php echo $msg; ?>" ec="Q" style="width: 30mm;"></qrcode> </td>
  </tr>

  <tr nobr="true">
    <td style="width:4%;height: 20px;"> </td>
    <td width="30%"> </td>
    <td width="3%;">  </td>
    <td width="60%;"> <b><?=$data_asesi->nama_lengkap?></b></td>
  </tr>

</table>


</page>

<page backtop="15mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 5%"><img src="<?php echo base_url().'assets/img/logo48.png';?>" /></td>
                <td style="text-align: left;    width: 64%;font-weight: lighter;"><?=$aplikasi->nama_unit?></td>

            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 11%"><?=$aplikasi->singkatan_unit?> :
                </td>
                <td style="text-align: left;    width: 49%"> <?=$aplikasi->alamat?> <?=$aplikasi->no_telpon?></td>
                <td style="text-align: right;    width: 40%">Halaman [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
    <h4>Bagian  2 :  Daftar Unit Kompetensi</h4>
    <div style="text-align: justify;">
    Pada bagian 2 ini berisikan Unit Kompetensi yang anda ajukan untuk dinilai/diuji kompetensi dalam rangka mendapatkan pengakuan sesuai dengan latar belakang pendidikan, pelatihan serta pengalaman kerja yang anda miliki.   Unit kompetensi yang diajukan sesuai dengan Skema Sertifikasi
    </div>
    <div style="margin-top: 15px;padding: 1mm;">Judul Skema : <?=$data_asesi->skema?></div>
    <div style="padding: 1mm;">No Skema : <?=$data_asesi->kode_skema?></div>
    <table  style="width: 100%;border: solid 1px ; border-collapse: collapse; margin-top: 25px;" cellpadding="3"   >
        <thead>
            <tr>
                <th style="width: 5%; text-align: left; border: solid 1px;text-align:center;background-color: #5DC8CD; ">No</th>
                <th style="width: 25%; text-align: left; border: solid 1px;text-align:center;background-color: #5DC8CD; ">Kode Unit Kompetensi</th>
                <th style="width: 45%; text-align: left; border: solid 1px;text-align:center;background-color: #5DC8CD; ">Unit Kompetensi</th>
                <th style="width: 25%; text-align: left; border: solid 1px;text-align:center;background-color: #5DC8CD; ">Jenis Standar (Standar Khusus/Standar Internasional/SKKNI)</th>
            </tr>
        </thead>
        <tbody>
<?php
    foreach ($unit_kompetensi as $key=>$value) {
?>
            <tr>
                <td style="width: 5%; text-align: center; border: solid 1px ;">
                    <?=$key+1?>
                </td>
                <td style="width: 25%; text-align: center; border: solid 1px ">
                    <?=$value->id_unit_kompetensi?>
                </td>
                <td style="width: 45%; text-align: left; border: solid 1px ">
                    <?=$value->unit_kompetensi?></td>
                <td style="width: 25%; text-align: center; border: solid 1px ">
                    SKKNI</td>
            </tr>
<?php
    }
?>
        </tbody>

    </table>
    <h4>Bagian  3 :  Bukti Kelengkapan Pemohon</h4>
    <table  style="width: 100%;border: solid 1px ; border-collapse: collapse; margin-top: 25px;" cellpadding="3"   >
        <thead>
            <tr>
                <th style="width: 5%; text-align: left; border: solid 1px;text-align:center;background-color: #5DC8CD; ">No</th>
                <th style="width: 50%; text-align: left; border: solid 1px;text-align:center;background-color: #5DC8CD; ">Unit/Elemen Kompetensi </th>
                <th style="width: 45%; text-align: left; border: solid 1px;text-align:center;background-color: #5DC8CD; ">Bukti (paling relevan) :
                Rincian Pendidikan/Pelatihan,    Pengalaman Kerja, Pengalaman Hidup
                </th>

            </tr>
        </thead>
        <tbody>
<?php
    foreach ($listing_elemen_kompetensi as $key=>$value) {
?>
            <tr>
                <td style="width: 5%; text-align: center; border: solid 1px ;">
                    <?=$key+1?>
                </td>
                <td style="width: 50%; text-align: left; border: solid 1px ">
                    <?=$value->elemen_kompetensi?>
                </td>
                <td style="width: 45%; border: solid 1px; margin-right: 20px">
                    <?php
                      // $jumlah_karakter = strlen($jenis_bukti);
                      // echo $ganti = str_replace(",", "<br>", $jenis_bukti);
                      // echo $jenis_bukti;
                      echo str_replace("skk,", "skk,<br>", $jenis_bukti);

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
    <td rowspan="3" style="width: 50%;"> <strong>Rekomendasi</strong>
        <br/><?=$data_asesi->rekomendasi_apl01=='1'?'Permohonan Diterima':''?>
     </td>
    <td colspan="2" style="width: 50%;"> <strong>Pemohon :</strong> </td>
 </tr>

<tr nobr="true">

    <td style="width: 25%;"> Nama </td>
    <td style="width: 25%;"> <?=$data_asesi->nama_lengkap?> </td>
 </tr>


<tr nobr="true">

    <td> Tanda Tangan / Tanggal </td>
    <td style="height: 35px;"> <qrcode value="<?php echo $msg; ?>" ec="Q" style="width: 20mm;"><br/>
        <?=$data_asesi->u_date_create?>
    </qrcode> </td>
 </tr>

 <tr nobr="true">
    <td rowspan="4"> <strong>Catatan :</strong>
    <br/><?=$data_asesi->rekomendasi_apl01=='1'? $data_asesi->catatan_rekomendasi_apl01:''?>
</td>
    <td colspan="2"> <strong>Asesor /Admin LSP  :</strong> </td>
 </tr>

<tr nobr="true">

    <td> Nama </td>
    <td>  <?=$aplikasi->admin_lsp?></td>
 </tr>

<tr nobr="true">

    <td> No.Reg </td>
    <td> <?=$aplikasi->no_reg_admin_lsp?> </td>
 </tr>


<tr nobr="true">

    <td> Tanda Tangan / Tanggal </td>
    <td style="height: 35px;">  <qrcode value="<?php echo $msg_admin; ?>" ec="Q" style="width: 20mm;"><br/>
        <?=$data_asesi->pra_asesmen_date?>
    </qrcode>
    </td>
 </tr>



</table>
</page>
