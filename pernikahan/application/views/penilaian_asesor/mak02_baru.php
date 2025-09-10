<table style="width:100%;border-collapse: collapse;" border="1"  >
    <tr>
        <td style="width:30%; padding: 5px;"> <strong>Skema Sertifikasi (Unit/Klaster/Kualifikasi)</strong> </td>
        <td style="width:3%;text-align: center;"> : </td>
        <td style="width:65%; padding: 5px;"><?= $data->skema ?></td>

    </tr>
    <tr>
        <td style="width:30%; padding: 5px;"> <strong>Nomor Skema Sertifikasi   </strong> </td>
        <td style="width:3%;text-align: center;"> : </td>
        <td style="width:65%; padding: 5px;"><?= $data->kode_skema ?></td> 
    </tr>
    <tr>
        <td style="width:30%; padding: 5px;"> <strong>TUK   </strong> </td>
        <td style="width:3%;text-align: center;"> : </td>
        <td style="width:65%; padding: 5px;"><?= $data->tuk ?></td> 
    </tr>
    <tr>
        <td style="width:30%; padding: 5px;"> <strong>Nama Asesor   </strong> </td>
        <td style="width:3%;text-align: center;"> : </td>
        <td style="width:65%; padding: 5px;"><?= $data->users ?></td> 
    </tr>
    <tr>
        <td style="width:30%; padding: 5px;"> <strong>Nama Peserta   </strong> </td>
        <td style="width:3%;text-align: center;"> : </td>
        <td style="width:65%; padding: 5px;"><?= ucwords(strtolower($data->nama_lengkap)) ?></td> 
    </tr>
    <tr>
        <td style="width:30%; padding: 5px;"> <strong>Tanggal   </strong> </td>
        <td style="width:3%;text-align: center;"> : </td>
        <td style="width:65%; padding: 5px;"><?= tgl_indo($data->tanggal) ?></td> 
    </tr>
</table>
<h3>Pencapaian Kompetensi:</h3>
<table style="width:100%;border-collapse: collapse;" border="1"  >
    <tr align="center">
        <td style="width:4%;text-align:center;" rowspan="2"><strong> No</strong></td>
        <td style="width:40%;" rowspan="2"><strong> Kode Unit <br/>Judul Unit Kompetensi</strong></td>
        <td style="width:30%;" rowspan="2"><strong> Bukti-bukti</strong></td>
        <td style="width:7%;" rowspan="2"><strong> Jenis<br/>Bukti</strong></td>
        <td colspan="2" style="width:10%;"><strong style="font-size: 10px;"> Pencapaian</strong></td>
        <td colspan="2" style="width:10%;"><strong style="font-size: 10px;"> Keputusan</strong></td>
    </tr>
    <tr align="center">
        <td style="width:5%;border-left:0px solid red;">Ya</td>
        <td style="width:5%;">Tdk</td>
        <td style="width:5%;">K</td>
        <td style="width:5%;">BK</td>
    </tr>
    <?php
    if ($data->pencapaian_mak02 == '0') {
        $array_pencapaian_mak02 = array('y', 'y', 'y', 'y', 'y', 'y', 'y');
    } else {
        $array_pencapaian_mak02 = $data->pencapaian_mak02;
    }
    if ($data->keputusan_mak02 == '0') {
        $array_keputusan_mak02 = array('y', 'y', 'y', 'y', 'y', 'y', 'y');
    } else {
        $array_keputusan_mak02 = $data->keputusan_mak02;
    }

    $pencapaian_mak = unserialize($array_pencapaian_mak02);
    $keputusan_mak = unserialize($array_keputusan_mak02);
    //    var_dump($data->keputusan_mak02);
    $index1 = 0;
    $index2 = 1;
    if($data->metode_asesmen=='2'){
            $rekomendasi1 = 'Hasil Verifikasi Portofolio';
            $rekomendasi2 = 'Hasil rekaman Tes wawancara';
            $perangkat_rekomendasi1 = 'CLP';
            $perangkat_rekomendasi2 = 'DPW';
        }else{
            $rekomendasi1 = 'Hasil Rekaman Observasi';
            $rekomendasi2 = 'Hasil Rekaman Tes lisan/tulis';
            $perangkat_rekomendasi1 = 'CLO';
            $perangkat_rekomendasi2 = 'DPT/DPL';
        }
    foreach ($unit_kompetensi as $key => $value) {
        $index1 = $key * 2;
        $index2 = $key * 2 + 1;
        
        ?>
        <tr>
            <td style="text-align: center" rowspan="2"><?= ($key + 1) ?></td>
            <td rowspan="2" style="width:40%;"><b><?= $value->id_unit_kompetensi ?></b><br/><?= $value->unit_kompetensi ?></td>
            <td style="width:30%;"><?=$rekomendasi1?></td>
            <td style="text-align: center"><?=$perangkat_rekomendasi1?></td>
            <td align="center"><input type="radio" class="ch_pencapaian" name="pencapaian_mak02[<?= ($index1) ?>]" value="y" <?php echo isset($pencapaian_mak[$index1]) && $pencapaian_mak[$index1] == 'y' ? 'checked' : ''; ?>></td>
            <td align="center"><input type="radio"  class="ch_pencapaian_n" name="pencapaian_mak02[<?= ($index1) ?>]" value="n" <?php echo isset($pencapaian_mak[$index1]) && $pencapaian_mak[$index1] == 'n' ? 'checked' : ''; ?>></td>
            <td align="center"><input type="radio"  class="ch_pencapaian" name="keputusan_mak02[<?= ($index1) ?>]" value="y" <?php echo isset($keputusan_mak[$index1]) && $keputusan_mak[$index1] == 'y' ? 'checked' : ''; ?>></td>
            <td align="center"><input type="radio"  class="ch_pencapaian_n" name="keputusan_mak02[<?= ($index1) ?>]" value="n" <?php echo isset($keputusan_mak[$index1]) && $keputusan_mak[$index1] == 'n' ? 'checked' : ''; ?>></td>
        </tr>
        <tr>
            <td style="width:30%;border-left: 0px solid;"><?=$rekomendasi2?></td>
            <td style="text-align: center"><?=$perangkat_rekomendasi2?></td>
            <td align="center"> <input type="radio"  class="ch_pencapaian" name="pencapaian_mak02[<?= ($index2) ?>]" value="y" <?php echo isset($pencapaian_mak[$index2]) && $pencapaian_mak[$index2] == 'y' ? 'checked' : ''; ?>></td>
            <td align="center"><input type="radio"  class="ch_pencapaian_n" name="pencapaian_mak02[<?= ($index2) ?>]" value="n" <?php echo isset($pencapaian_mak[$index2]) && $pencapaian_mak[$index2] == 'n' ? 'checked' : ''; ?>></td>
            <td align="center"><input type="radio"  class="ch_pencapaian" name="keputusan_mak02[<?= ($index2) ?>]" value="y" <?php echo isset($keputusan_mak[$index2]) && $keputusan_mak[$index2] == 'y' ? 'checked' : ''; ?>></td>
            <td align="center"><input type="radio"  class="ch_pencapaian_n" name="keputusan_mak02[<?= ($index2) ?>]" value="n" <?php echo isset($keputusan_mak[$index2]) && $keputusan_mak[$index2] == 'n' ? 'checked' : ''; ?>></td>

        </tr>
        <?php
        
        //$index2 = $index2 + (1 + $key);
        //var_dump($key * 2);
        //$index1 = $index1 +  $key + $index2;
    }
    ?>
</table>
<br><br>
<!-- <table style="width:100%;border-collapse: collapse;" border="1" cellpadding="4" cellspacing="4"   >

    <tr>
        <td style="width:100%;"><b>Umpan balik terhadap pencapaian unjuk kerja: </b> 
            <input  id="hidden_kuk" type="hidden" name="kesenjangan_kuk" value="<?=$data->kesenjangan_kuk?>" />
            <input  id="hidden_unit" type="hidden" name="asesmen_lanjut" value="<?=$data->asesmen_lanjut?>" />
            
        </td>
    </tr>
    <tr>
        <td style="width:100%;"> 
            <input class="ch_umpan_balik_y" <?= $data->pencapaian_unjuk_kerja == 'y' ? 'checked' : ''; ?> type="radio" value="y" name="pencapaian_unjuk_kerja" style="margin-right: 5px;margin-left: 10px;" /> Seluruh Elemen Kompetensi/Kriteria Unjuk Kerja (KUK) yang diujikan telah tercapai
        </td>
    </tr>
    <tr>
        <td style="width:100%;"> 
            <input class="ch_umpan_balik_n" <?= $data->pencapaian_unjuk_kerja == 'n' ? 'checked' : ''; ?> type="radio" value="n" name="pencapaian_unjuk_kerja" style="margin-right: 5px;margin-left: 10px;" /> Terdapat Elemen Kompetensi/Kriteria Unjuk Kerja (KUK) yang diujikan belum tercapai 
        </td>
    </tr>
</table>
<br>
<table style="width:100%;border-collapse: collapse;" border="1" cellpadding="4" cellspacing="4"   >
    <tr>
        <td style="width:100%;"><b>Saran tindak lanjut hasil asesmen: </b> 

        </td>
    </tr>
    <tr>
        <td style="width:100%;">
            <input class="ch_saran_y" <?= $data->saran_tindak_lanjut == 'y' ? 'checked' : ''; ?> type="radio" value="y" name="saran_tindak_lanjut" style="margin-right: 5px;margin-left: 10px;" />  Tidak ada kesenjangan
        </td>
    </tr>
    <tr>
        <td style="width:100%;"> 
            <input class="ch_saran_n" onclick="buka_elemen(<?= $data->skema_sertifikasi ?>)" <?= $data->saran_tindak_lanjut == 'n' ? 'checked' : ''; ?> type="radio" value="n" name="saran_tindak_lanjut" style="margin-right: 5px;margin-left: 10px;" />  Ditemukan kesenjangan pencapaian, sebagai berikut pada Unit Kompetensi / Elemen / KUK: 
            <div id="div_unit_kesenjangan" style="margin-left: 30px;margin-top: 10px;">
                <div id="unit_kesenjangan">
                    <?=$table_pilihan?>
                </div></div>
        </td>
    </tr>
</table>


<br>
<table style="width:100%;border-collapse: collapse;" border="1" cellpadding="4" cellspacing="4"   >

    <tr>
        <td style="width:100%;"><b>Identifikasi kesenjangan pencapaian unjuk kerja: </b> 

        </td>
    </tr>
    <tr>
        <td style="width:100%;"> 
            <input class="ch_identifikasi_y" <?= $data->pelihara_kompetensi == 'y' ? 'checked' : ''; ?> type="radio" value="y" name="pelihara_kompetensi" style="margin-right: 5px;margin-left: 10px;" /> Agar memelihara kompetensi yang telah dicapai
             
        </td>
    </tr>
    <tr>
        <td style="width:100%;"> 
            <input class="ch_identifikasi_n" onclick="buka_unit(<?= $data->skema_sertifikasi ?>)" <?= $data->pelihara_kompetensi == 'n' ? 'checked' : ''; ?> type="radio" value="n" name="pelihara_kompetensi" style="margin-right: 5px;margin-left: 10px;" />  Perlu dilakukan asesmen ulang pada:: 
            <div id="div_asesmen_ulang" style="margin-left: 30px;margin-top: 10px;">
                <div id="asesmen_ulang">
                    <?=$table_asesmen_ulang?>
                </div></div>
            
            
        </td>
    </tr>
</table>
<div id="dd_elemen" ><div id="div_elemen"></div></div>
<div id="dd_unit" ><div id="div_unit"></div></div> -->

<script type="text/javascript">
//$('#pra_asesmen_date').datebox('setValue', '6/1/2012');   

    var base_url = "<?php echo base_url() ?>";
    $('#dd_elemen').dialog({
        title: 'Detail Unit Kompetensi, Elemen dan KUK',
        width: 800,
        height: 400,
        closed: true,
        cache: false,
        modal: true,
        toolbar: [{
                text: 'Pilih KUK',
                iconCls: 'icon-edit',
                handler: function () {
                    pilih_kuk()
                }
            }]
    });
    $('#dd_unit').dialog({
        title: 'Detail Unit Kompetensi',
        width: 800,
        height: 400,
        closed: true,
        cache: false,
        modal: true,
        toolbar: [{
                text: 'Pilih Unit Kompetensi',
                iconCls: 'icon-edit',
                handler: function () {
                    pilih_unit()
                }
            }]
    });
    function buka_elemen(skema) {
        $('#dd_elemen').dialog('open');
        var dt = {skema: skema};
        $.ajax({
            type: "POST",
            url: base_url + "penilaian_asesor/proses",
            data: dt,
            success: function (result) {
                $('#div_inner').remove();
                $('#div_elemen').append('<div id="div_inner"></div>');
                $('#div_inner').append(result);
            }
        })
    }
    function buka_unit(skema) {
        $('#dd_unit').dialog('open');
        var dt = {skema: skema};
        $.ajax({
            type: "POST",
            url: base_url + "penilaian_asesor/proses/1",
            data: dt,
            success: function (result) {
                $('#div_unit').remove();
                $('#dd_unit').append('<div id="div_unit"></div>');
                $('#div_unit').append(result);
            }
        })
    }
    function pilih_kuk() {
        //var pilihan_kuk = $('.pilih_kuk').val();

        var checkboxValues = $('.pilih_kuk:checked').map(function () {
            return $(this).val();
        }).get();
        $('#hidden_kuk').val(checkboxValues.join('#'));
        //console.log(checkboxValues);
        var unit_kompetensi = "";
        var table_pilihan = '<table border="1" style="width:95%;" cellpadding="2" cellsapcing="2"><tr><td><b>Unit Kompetensi</b></td><td><b>Aspek Kritis</b></td></tr>';
        $.each(checkboxValues, function (index, value) {
            var result = value.split('|');
            //alert(result[1]);
            if (unit_kompetensi != result[0]) {
                table_pilihan = table_pilihan.concat('<tr><td><b>'+result[0]+'</b></td><td>'+result[2]+'</td></tr><tr><td colspan="2">'+result[1]+'</td></tr>');
            } else {
                table_pilihan = table_pilihan.concat('<tr><td colspan="2">'+result[1]+'</td></tr>');
            }
            unit_kompetensi = result[0];
            //alert(index + ": " + value);
        });
        var table_pilihan = table_pilihan.concat('</table>');
        
        //table_piliha
        $('#dd_elemen').dialog('close');
        $('#unit_kesenjangan').remove();
        //var hasil_kesenjangan = checkboxValues.join('<br/>');
        $('#div_unit_kesenjangan').append('<div id="unit_kesenjangan">' + table_pilihan + '</div>');
    }
    function pilih_unit() {
        var checkboxValues = $('.pilih_unit:checked').map(function () {
            return $(this).val();
        }).get();
        $('#hidden_unit').val(checkboxValues.join('#'));
        //console.log(checkboxValues);
        var unit_kompetensi = "";
        var table_pilihan = '<table border="1" style="width:95%;" cellpadding="2" cellsapcing="2"><tr><td><b>Kode Unit Kompetensi</b></td><td><b>Unit Kompetensi</b></td></tr>';
        $.each(checkboxValues, function (index, value) {
            var result = value.split('|');
                table_pilihan = table_pilihan.concat('<tr><td>'+result[0]+'</td><td>'+result[1]+'</td></tr>');
        });
        var table_pilihan = table_pilihan.concat('</table>');
        
        //table_piliha
        $('#dd_unit').dialog('close');
        $('#asesmen_ulang').remove();
        //var hasil_kesenjangan = checkboxValues.join('<br/>');
        $('#div_asesmen_ulang').append('<div id="asesmen_ulang">' + table_pilihan + '</div>');
    }
</script>
