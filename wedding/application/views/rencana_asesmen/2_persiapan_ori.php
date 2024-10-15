<!-- persiapan `perangkat uji` terhadap `KUK` berdasarkan `dimensi perangkat` -->
<style media="screen">
  .tabeltb{
    width:100%;
    font-size: 12px;
    border-collapse:
    collapse;
    table-layout: fixed;
    margin: 10px 0 15px 10px;
    background: #fff;
  }
  .tx-center{
    text-align:center;
  }
  .borderr-n{
    border-right: 1px solid transparent!important;
  }
</style>

    <table class="tabeltb" border="1" cellpadding="5" cellspacing="5">
        <?php
        $no_unit = 1;
        foreach ($unit_kompetensi as $keyu => $unit) :
            $elemen = $this->asesi_model->elemen($unit->id_unit_kompetensi);
            $no_unit = $keyu+1;
        ?>
      <tr>
        <td rowspan="2" style="width:38%;background:#ddd;">Unit Kompetensi No. <?=$no_unit?> </td>
        <td colspan="3" style="width:12%;background:#ddd;">Kode Unit</td>
        <td colspan="6" style="width:50%;background:#ddd;">: <?=$unit->id_unit_kompetensi?></td>
      </tr>
      <tr>
        <td colspan="3" style="background:#ddd;">Judul Unit</td>
        <td colspan="6" style="background:#ddd;">: <?=$unit->unit_kompetensi?></td>
      </tr>
        <?php
        $no_elemen = 1;
        foreach ($elemen as $keye => $elemen) :
            $query_kuk = $this->asesi_model->kuk($elemen->id);
        ?>
      <tr>
        <td colspan="10" class="tx-bold" style="font-size:9pt;">
          Elemen &nbsp; &nbsp; &nbsp; &nbsp; : <?=$no_elemen?>. <?=$elemen->elemen_kompetensi?>
        </td>
      </tr>
      <tr>
        <td rowspan="3" class="tx-center tx-bold" style="font-size:9pt;">
          Kriteria Unjuk<br>
          Kerja
        </td>
        <!-- <td rowspan="3" class="tx-center" style="font-size:9pt;"><b>Bukti-Bukti</b><br>
            (Kinerja,<br>produk,
            <br>Portofolio, dan
            <br>/ atau hafalan)
            <br>diidentifikasi
            <br>berdasarkan
            <br>Kriteria Unjuk
            <br>Kerja dan
            <br>pendekatan
            <br>asesmen
        </td> -->
        <td colspan="3" rowspan="2" class="tx-center tx-bold" style="width:28%">Jenis<br>Bukti</td>
        <td colspan="6" class="tx-bold tx-center" style="font-size:9pt; width:30%;">Metode dan Perangkat Asesmen</td>
      </tr>
      <tr>
        <td style="font-size:8pt; text-align:justify; width:30%;" colspan="6"> <b>CL (Daftar Periksa), DIT (Daftar Instruksi Terstruktur), DPL (Daftar Pertanyaan Lisan), DPT (Daftar Pertanyaan Tertulis), VP (Verifikasi Portofolio), CUP (Ceklis Ulasan Produk), CLO (Ceklis Observasi), PW (Pertanyaan Wawancara).</b> </td>
      </tr>
      <tr>
        <td class="tx-center" style="font-size:9pt; width:6%;">L</td>
        <td class="tx-center" style="font-size:9pt; width:6%;">TL</td>
        <td class="tx-center" style="font-size:9pt; width:6%;">T</td>
        <td class="rotate tx-center" style="font-size:6pt; width:9%;">
          <b>Obsevasi langsung</b>
          <br>(kerja nyata/ aktivitas waktu
          <br>nyata di tempat kerja
          <br>dilingkungan tempat kerja yang
          <br>di simulasikan)
        </td>
        <td style="font-size:6pt; width:9%;" class="rotate tx-center">
          <b>Kegiatan Struktur</b>
          <br>(latihan simulasi dan bermain
          <br>peran, proyek,  presentasi,
          <br>lembar kegiatan)
        </td>
        <td style="font-size:6pt; width:9%;" class="rotate tx-center">
          <b>Tanya Jawab</b>
          <br>(pertanyaan tertulis,
          <br>wawancara, asesmen diri,
          <br>tanya jawab lisan, angket,
          <br>ujian lisan atau tertulis)
        </td>
        <td style="font-size:6pt; width:9%;" class="rotate tx-center">
          <b>Verifikasi Portfolio</b>
          <br>(sampel pekerjaaan yang
          <br>disusun oleh kandidat, produk
          <br>dengan dokumentasi pendukung,
          <br>bukti sejarah, jurnal atau catatan, informasi tentang
          <br>pengalaman hidup)
        </td>
        <td style="font-size:6pt; width:9%;" class="rotate tx-center">
          <b>Review produk</b>
          <br>(testimoni dan laporan dari
          <br>atasan dan atasan, bukti
          <br>pelatihan, otentikasi pencapaian sebelumnya, wawancara
          <br>dengan atasan, atasan, atau
          <br>rekan kerja)
        </td>
        <td style="font-size:6pt; width:9%;" class="rotate tx-center">
          <b>Lainnya ......</b>
        </td>
      </tr>
        <?php
            foreach ($query_kuk as $keyk => $kuk) :
              $nokuk = $keyk+1;
              $noelkuk = $no_elemen.'.'.$nokuk;
              $nuek = $no_unit.$no_elemen.$nokuk;
        ?>

      <tr>
        <td style="font-size:9pt; width:14%;" class="tx-top">
          <?=$noelkuk.'. '.$kuk->kuk ?>
        </td>

        <td class="tx-center" style="width:6%;">
          <!-- l -->
          <input type="checkbox" name="l[<?=$nuek?>]" <?=isset($array_jenis_bukti_l[$nuek])?'checked':'' ?> value="0">
        </td>
        <td class="tx-center" style="width:6%;">
          <!-- tl -->
          <input type="checkbox" name="tl[<?=$nuek?>]" <?=isset($array_jenis_bukti_tl[$nuek])?'checked':'' ?> value="1">
        </td>
        <td class="tx-center" style="width:6%;">
          <!-- t -->
          <input type="checkbox" name="t[<?=$nuek?>]" <?=isset($array_jenis_bukti_t[$nuek])?'checked':'' ?> value="2">
        </td>

        <td class="tx-center borderr-n">
          <!-- cl -->
          <input type="checkbox" id="CL[<?=$nuek?>]" name="cl[<?=$nuek?>]" <?=isset($array_metode_cl[$nuek])?'checked':'' ?> value="0">CLO
        </td>
        <td class="tx-center borderr-n">
          <!-- dit -->
          <input type="checkbox" id="DIT[<?=$nuek?>]" name="dit[<?=$nuek?>]" <?=isset($array_metode_dit[$nuek])?'checked':'' ?> value="1">DIT
        </td>
        <td class="tx-center borderr-n">
          <!-- pw -->
          <input type="checkbox" id="PW[<?=$nuek?>]" name="pw[<?=$nuek?>]" <?=isset($array_metode_pw[$nuek])?'checked':'' ?> value="2">PW
        </td>
        <td class="tx-center borderr-n">
          <!-- vp -->
          <input type="checkbox" id="VP[<?=$nuek?>]" name="vp[<?=$nuek?>]" <?=isset($array_metode_vp[$nuek])?'checked':'' ?>  value="3">VP
        </td>
        <td class="tx-center">
          <!-- cup -->
          <input type="checkbox" id="CUP[<?=$nuek?>]" name="cup[<?=$nuek?>]" <?=isset($array_metode_cup[$nuek])?'checked':'' ?> value="4">CUP
        </td>

        <td class="tx-center" style="width:9%;"><textarea style="width:100%" name="lainnya[<?=$nuek?>]"><?=isset($array_metode_lainnya[$nuek])?$array_metode_lainnya[$nuek]:''?></textarea></td>
      </tr>
      <!-- <tr>
        <td style="font-size:9pt; width:18%;"></td>
        <td class="tx-center" style="width:6%;"><input type="checkbox" name="t" value="0"></td>
        <td class="tx-center" style="width:6%;"><input type="checkbox" name="tl" value="1"></td>
        <td class="tx-center" style="width:6%;"><input type="checkbox" name="l" value="2"></td>
        <td class="tx-center" style="width:9%;"><input type="checkbox" name="cl" value="CL"></td>
        <td class="tx-center" style="width:9%;"><input type="checkbox" name="cl" value="CL"></td>
        <td class="tx-center" style="width:9%;"><input type="checkbox" name="cl" value="CL"></td>
        <td class="tx-center" style="width:9%;"><input type="checkbox" name="cl" value="CL"></td>
        <td class="tx-center" style="width:9%;"><input type="checkbox" name="cl" value="CL"></td>
        <td class="tx-center" style="width:9%;"><textarea style="width:100%" name="lainnya"></textarea></td>
      </tr>     -->
    <?php endforeach;?>
    <?php $no_elemen++; endforeach;?>
    <?php endforeach; ?>
  </table>
