<page backtop="35mm" backbottom="20mm" backleft="20mm" backright="20mm">
    <page_header>
        <div style="margin-left: 25px; ">
            <img src="<?php echo path_image() . 'assets/img/kop_atas.png'; ?>" width="680" height="110" />
        </div>
    </page_header>
    
    <h4>FR-MPA.02.5. DAFTAR PERTANYAAN WAWANCARA</h4>


    <table border="1" cellpadding="2" style="border-collapse: collapse;" cellpadding="10" cellspacing="10" >

        <tr  nobr="true">
            <td style="font-weight: bolder;width: 30%;font-weight: bold;padding: 5px;">Nomor Skema Sertifikasi</td>
            <td style="width: 70%;padding: 5px;"> <?= $data_asesi->kode_skema ?> </td>
        </tr>
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
            <td style="font-weight: bold;padding: 5px;" valign="middle">Tanggal Asesmen</td>
            <td style="padding: 5px;"><?= tgl_indo($data_asesi->tanggal) ?>
            </td>
        </tr>
    </table>
    <br/><br/>
    <b>Petunjuk pengerjaan:</b>
    <ol type="1">
        <li>Asesor memberikan penjelasan tentang proses wawancara kepada peserta</li>
        <li>Asesor mengajukan pertanyaan kepada peserta sesuai Daftar Pertanyaan Wawancara  yang telah disiapkan</li>
        <li>Peserta menjawab sesuai dengan pertanyaan dari asesor</li>
        <li>Asesor mencatat secara ringkas dan akurat kesimpulan jawaban peserta</li>
        <li>Asesor menentukan hasil wawancara kompeten atau belum kompeten</li>
    </ol>
    <b>Bukti Portofolio:</b>
    <table border="1" style="border-collapse: collapse; " align="center">
        <tr>
            <th style="padding: 5px;text-align: center;">No</th>
            <th style="padding: 5px;">Jenis Dokumen</th>
            <th style="padding: 5px;">Nama File</th>
        </tr>
        <?php
        //var_dump($data->bukti_pendukung);die();
        $buktiPendukung = str_replace("|", '"', $data->bukti_pendukung);
        $bukti_pendukung = json_decode($buktiPendukung);
        if (!empty($bukti_pendukung)) {
            $no_urut = 1;
            foreach ($bukti_pendukung as $key => $pendukung) {
                if($key!='foto' & $key != 'ktp' & $key != 'ijazah'){
                ?>
                <tr>
                    <td style="text-align: center;width: 5%;"><?= $no_urut ?></td>
                    <td style="padding: 5px;width: 25%;"> <?= strtoupper($key) ?> </td>
                    <td style="padding: 5px;width: 70%;font-size: 10px;"><?=$pendukung[0] ?></td>
                </tr>
                <?php
                $no_urut++;
                }
            }
        }
        ?>                
    </table>
    <?= $vatm ?>
    <br/>
    <table style="width:100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
        <tr nobr="true">
            <td rowspan="3" style="width: 50%;"> <strong>Rekomendasi Asesor</strong> <br/>
                Peserta dinyatakan
                <b><?php echo $data_asesi->is_memadai == '1' ? 'Kompeten' : 'Belum Kompeten'; ?></b><br/>
                Pada wawancara
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
            <td rowspan="4"> <strong>Catatan : </strong> <br/>
                <?= $data_asesi->catatan_portofolio ?></td>
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
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 100%"><img style="margin-left: 38px;" src="<?php echo path_image() . 'assets/img/kop_atas.png'; ?>" width="680" height="110" /></td>
            </tr>
        </table>
    </page_header>
   
    <h4>FR-MPA 6 :  DAFTAR CEK VERIFIKASI PORTO FOLIO</h4>


    <table border="1" cellpadding="2" style="border-collapse: collapse;" cellpadding="10" cellspacing="10" >

        <tr  nobr="true">
            <td style="font-weight: bolder;width: 30%;font-weight: bold;padding: 5px;">Perangkat asesmen</td>
            <td style="width: 70%;padding: 5px;"> Daftar Cek Verifikasi Porto Folio </td>
        </tr>
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
            <td style="width: 70%;padding: 5px;"> <?= $query_soal_wawancara[0]->waktu_pengerjaan ?> Menit</td>
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
    <table border="1" style="border-collapse: collapse; " align="center">
        <tr>
            <th colspan="2" rowspan="2" style="padding: 5px;text-align: center;width: 58%;">Dokumen bukti/ portofolio telah menunjukan 
                pemenuhan terhadap aturan bukti : </th>
            <th style="padding: 5px;text-align: center;" colspan="2">Valid</th>
            <th style="padding: 5px;text-align: center;" colspan="2">Asli</th>
            <th style="padding: 5px;text-align: center;" colspan="2">Terkini</th>
        </tr>
        <tr>
            <th style="padding: 5px;text-align: center;width: 6%;border-left:none;">Ya</th>
            <th style="padding: 2px;text-align: center;width: 6%;font-size:10px;">Tidak</th>
            <th style="padding: 5px;text-align: center;width: 6%;">Ya</th>
            <th style="padding: 2px;text-align: center;width: 6%;font-size:10px;">Tidak</th>
            <th style="padding: 5px;text-align: center;width: 6%;">Ya</th>
            <th style="padding: 2px;text-align: center;width: 6%;font-size:10px;">Tidak</th>
        </tr>
        <?php
        $checklist = '<img style="width: 10px;" src="assets/img/cl.png" />';
        $buktiPendukung = str_replace("|", '"', $data->bukti_pendukung);
        $bukti_pendukung = json_decode($buktiPendukung);
        if (!empty($bukti_pendukung)) {
            $no_urut = 1;
            foreach ($bukti_pendukung as $key => $pendukung) {
                if($key!='foto' & $key != 'ktp' & $key != 'ijazah'){
                ?>
                <tr>
                    <td style="text-align: center;width: 5%;"><?= $no_urut ?></td>
                    <td style="padding: 5px;width: 58%;"> <?= strtoupper($key) ?> </td>
                    <td style="padding: 5px;width: 5%;"><?=isset($vat_portofolio[10+$no_urut]) ? $checklist:'';?></td>
                    <td style="padding: 5px;width: 5%;"><?=isset($vat_portofolio[10+$no_urut]) ? '':$checklist;?></td>
                    <td style="padding: 5px;width: 5%;"><?=isset($vat_portofolio[20+$no_urut]) ? $checklist:'';?></td>
                    <td style="padding: 5px;width: 5%;"><?=isset($vat_portofolio[20+$no_urut]) ? '':$checklist;?></td>
                    <td style="padding: 5px;width: 5%;"><?=isset($vat_portofolio[30+$no_urut]) ? $checklist:'';?></td>
                    <td style="padding: 5px;width: 5%;"><?=isset($vat_portofolio[30+$no_urut]) ? '':$checklist;?></td>
                </tr>
                <?php
                $no_urut++;
                }
            }
        }
        ?>                
    </table>
    <table><tr><td>Isi dari dokumen portofolio telah menunjukkan kemampuan peserta sertifikasii (memadai/ sufficient) terhadap setiap elemen kompetensi/kriteria unjuk kerja sebagai berikut : </td></tr></table>
    
    <?= $vatm_cetak ?>
    <br/>
    <table style="width:100%" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse;">
        <tr nobr="true">
            <td rowspan="7" style="width: 50%;"> <strong>Rekomendasi Asesor</strong> <br/>
                Peserta telah 
                <b><?php echo $data_asesi->is_memadai == '1' ? 'Memenuhi' : 'Belum Memenuhi'; ?></b><br/>
                pencapaian seluruh kriteria unjuk kerja, direkomendasikan
                <b><?php echo $data_asesi->is_memadai == '1' ? 'Kompeten' : 'Uji Kompetensi'; ?></b>
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