<script src="<?= base_url(); ?>assets/boots/emotion-ratings.js" charset="utf-8"></script>
<style media="screen">
  .tabeltb{
    width:98%;
    font-size: 12px;
    border-collapse:
    collapse;
    margin: 10px 0 15px 10px;
    background: #fff;
  }
  .tabeltb, .tabeltb th, .tabeltb td{
    padding: 5px;
    border-color:#777;
  }
  .tabeltbl .inputan textarea{
    margin-top:5px;
  }
</style>

<table class="tabeltb" border="1" cellpadding="5" cellspacing="5">
  <tr>
    <th rowspan="7" style="padding: 5px;width: 5%;text-align: center;vertical-align: top;">1.1</th>
    <td style="width: 14%;padding: 5px;vertical-align: top;">Kandidat</td>
    <td colspan="3" style="width: 78%;padding: 5px;">
      <input id="is_kandidat-1" type="radio" name="is_kandidat" <?=$data_uji->is_kandidat == 1?'checked':'' ?> value="1">
      <label for="is_kandidat-1"><span><span></span></span> Hasil pelatihan dan / atau pendidikan</label> <br>

      <input id="is_kandidat-2" type="radio" name="is_kandidat" <?=$data_uji->is_kandidat == 2?'checked':'' ?> value="2">
      <label for="is_kandidat-2"><span><span></span></span> Pekerja berpengalaman</label> <br>

      <input id="is_kandidat-3" type="radio" name="is_kandidat" <?=$data_uji->is_kandidat == 3?'checked':'' ?> value="3">
      <label for="is_kandidat-3"><span><span></span></span> Pelatihan / Belajar mandiri</label>
      <!-- <?= form_dropdown('', array('- Pilih -','Hasil pelatihan dan / atau pendidikan','Pekerja berpengalaman','Pelatihan / Belajar mandiri'), '',  'class="easyui-combobox" style="width:100%"  data-options="required: true"'); ?> -->
    </td>
  </tr>

  <tr>
    <td style="padding: 5px;">Tujuan Asesmen</td>
    <td colspan="3" style="padding: 5px;">

      <?php
        if (isset($data_uji->is_perpanjangan)) {
          $perpanjangan = $data_uji->is_perpanjangan;
        }else {
          $perpanjangan = $data->is_perpanjangan;
        }
      ?>

      <input id="is_perpanjangan-1" type="radio" name="is_perpanjangan" <?=$perpanjangan == 0?'checked':'' ?> value="0">
      <label for="is_perpanjangan-1"><span><span></span></span> Sertifikasi</label>

      <input id="is_perpanjangan-2" type="radio" name="is_perpanjangan" <?=$perpanjangan == 1?'checked':'' ?> value="1" style="margin-left:5px;">
      <label for="is_perpanjangan-2"><span><span></span></span> RCC</label>

      <input id="is_perpanjangan-3" type="radio" name="is_perpanjangan" <?=$perpanjangan == 2?'checked':'' ?> value="2" style="margin-left:5px;">
      <label for="is_perpanjangan-3"><span><span></span></span> RPL</label>

      <input id="is_perpanjangan-4" type="radio" name="is_perpanjangan" <?=$perpanjangan == 3?'checked':'' ?> value="3" style="margin-left:5px;">
      <label for="is_perpanjangan-4"><span><span></span></span> Hasil pelatihan / proses pembelajaran</label>

      <input id="is_perpanjangan-5" type="radio" name="is_perpanjangan" <?=$perpanjangan == 4?'checked':'' ?> value="4" style="margin-left:5px;">
      <label for="is_perpanjangan-5"><span><span></span></span> Lainnya</label>
    </td>
  </tr>

  <tr>
    <td rowspan="4" style="padding: 5px;vertical-align: top;">Konteks Asesmen</td>
    <td style="padding: 5px;width: 20%">Lingkungan</td>
    <td style="padding: 5px;">
      <input id="is_lingkungan-1" type="radio" name="is_lingkungan" <?=$data_uji->is_lingkungan == 1?'checked':'' ?> value="1">
      <label for="is_lingkungan-1"><span><span></span></span> Tempat kerja nyata</label>
    </td>
    <td style="padding: 5px;">
      <input id="is_lingkungan-2" type="radio" name="is_lingkungan" <?=$data_uji->is_lingkungan == 2?'checked':'' ?> value="2">
      <label for="is_lingkungan-2"><span><span></span></span> Tempat kerja simulasi</label>
    </td>
  </tr>

  <tr>
    <td style="padding: 5px;">Peluang untuk mengumpulkan bukti dalam sejumlah situasi</td>
    <td style="padding: 5px;">
      <input id="is_peluang_bukti-1" type="radio" name="is_peluang_bukti" <?=$data_uji->is_peluang_bukti == 1?'checked':'' ?> value="1">
      <label for="is_peluang_bukti-1"><span><span></span></span> Tersedia</label>
    </td>
    <td style="padding: 5px;">
      <input id="is_peluang_bukti-2" type="radio" name="is_peluang_bukti" <?=$data_uji->is_peluang_bukti == 2?'checked':'' ?> value="2">
      <label for="is_peluang_bukti-2"><span><span></span></span> Terbatas</label>
    </td>
  </tr>

  <tr>
    <td style="padding: 5px;vertical-align: top;">Hubungan antara standar kompetensi dan:</td>
    <td colspan="2">
      <span style="float: left;">
        <input id="is_hubungan_kompetensi-1" class="is_hubungan" type="radio" name="is_hubungan_kompetensi" <?=$data_uji->is_hubungan_kompetensi == 1?'checked':'' ?> value="1">
        <label for="is_hubungan_kompetensi-1" style="padding-right:10px;"><span><span></span></span> Bukti untuk mendukung asesmen/RPL</label>:&nbsp;
      </span>
      <b id="rating1"></b><br>

      <span style="float: left;">
        <input id="is_hubungan_kompetensi-2" class="is_hubungan" type="radio" name="is_hubungan_kompetensi" <?=$data_uji->is_hubungan_kompetensi == 2?'checked':'' ?> value="2">
        <label for="is_hubungan_kompetensi-2" style="padding-right:8px;"><span><span></span></span> Aktivitas kerja ditempat kerja kandidat</label>:&nbsp;
      </span>
      <b id="rating2"></b><br>

      <span style="float: left;">
        <input id="is_hubungan_kompetensi-3" class="is_hubungan" type="radio" name="is_hubungan_kompetensi" <?=$data_uji->is_hubungan_kompetensi == 3?'checked':'' ?> value="3">
        <label for="is_hubungan_kompetensi-3" style="padding-right:90px;"><span><span></span></span> Kegiatan pembelajaran</label>:&nbsp;
      </span>
      <b id="rating3"></b>
    </td>
  </tr>

  <tr>
    <td style="padding: 5px;vertical-align: top;">Siapa yang melakukan asesmen / RPL</td>
    <td colspan="2" style="padding: 5px;">
      <input id="is_lembaga-1" type="radio" name="is_lembaga" <?=$data_uji->is_lembaga == 1?'checked':'' ?> value="1">
      <label for="is_lembaga-1"><span><span></span></span> Oleh Lembaga Sertifikasi</label><br>

      <input id="is_lembaga-2" type="radio" name="is_lembaga" <?=$data_uji->is_lembaga == 2?'checked':'' ?> value="2">
      <label for="is_lembaga-2"><span><span></span></span> Oleh Organisasi Pelatihan</label><br>

      <input id="is_lembaga-3" type="radio" name="is_lembaga" <?=$data_uji->is_lembaga == 3?'checked':'' ?> value="3">
      <label for="is_lembaga-3"><span><span></span></span> Oleh Asesor Perusahaan</label>
    </td>
  </tr>

  <tr>
    <td style="padding: 5px;vertical-align: top;">Org yg relevan untuk dikonfirmasi</td>
    <td colspan="3" style="padding: 5px;">
      <input id="is_relevan_asesor-1" type="radio" name="is_relevan_asesor" <?=$data_uji->is_relevan_asesor == 1?'checked':'' ?> value="1">
      <label for="is_relevan_asesor-1"><span><span></span></span> Manajer sertifikasi LSP</label><br>

      <input id="is_relevan_asesor-2" type="radio" name="is_relevan_asesor" <?=$data_uji->is_relevan_asesor == 2?'checked':'' ?> value="2">
      <label for="is_relevan_asesor-2"><span><span></span></span> Master Asesor / Master Trainer / Asesor Utama Komepetensi</label><br>

      <input id="is_relevan_asesor-3" type="radio" name="is_relevan_asesor" <?=$data_uji->is_relevan_asesor == 3?'checked':'' ?> value="3">
      <label for="is_relevan_asesor-3"><span><span></span></span> Manajer pelatihan Lembaga Training terakreditasi / Lembaga Training terdaftar</label><br>

      <input id="is_relevan_asesor-4" type="radio" name="is_relevan_asesor" <?=$data_uji->is_relevan_asesor == 4?'checked':'' ?> value="4">
      <label for="is_relevan_asesor-4"><span><span></span></span> Lainnya</label>
    </td>
  </tr>

  <tr>
    <th style="padding: 5px;text-align: center;vertical-align: top;">1.2</th>
    <td style="padding: 5px;vertical-align: top;">Tolak ukur asesmen</td>
    <td colspan="3" style="padding: 5px;">
      <input id="is_tolak_ukur-1" type="radio" name="is_tolak_ukur" <?=$data_uji->is_tolak_ukur == 1?'checked':'' ?> value="1">
      <label for="is_tolak_ukur-1"><span><span></span></span> SKKNI</label><br>

      <input id="is_tolak_ukur-2" type="radio" name="is_tolak_ukur" <?=$data_uji->is_tolak_ukur == 2?'checked':'' ?> value="2">
      <label for="is_tolak_ukur-2"><span><span></span></span> Kriteria asesmen dari kurikulum pelatihan</label><br>

      <input id="is_tolak_ukur-3" type="radio" name="is_tolak_ukur" <?=$data_uji->is_tolak_ukur == 3?'checked':'' ?> value="3">
      <label for="is_tolak_ukur-3"><span><span></span></span> Spesifikasi kinerja suatu perusahaan atau industri</label><br>

      <input id="is_tolak_ukur-4" type="radio" name="is_tolak_ukur" <?=$data_uji->is_tolak_ukur == 4?'checked':'' ?> value="4">
      <label for="is_tolak_ukur-4"><span><span></span></span> Spesifikasi Produk</label><br>

      <input id="is_tolak_ukur-5" type="radio" name="is_tolak_ukur" <?=$data_uji->is_tolak_ukur == 5?'checked':'' ?> value="5">
      <label for="is_tolak_ukur-5"><span><span></span></span> Pedoman Khusus</label>
    </td>
  </tr>

  <!-- <tr>
    <td colspan="5">
      <input id="aom1" type="radio" name="radiosname" value="1" onchange="doSomething(this)"/>
      <label for="aom1"><span><span></span></span> aaa</label>

      <input id="aom2" type="radio" name="radiosname" value="2" id="radiowithval2"/>
      <label for="aom2"><span><span></span></span> bbb</label>

      <input id="aom3" type="radio" name="radiosname" value="3" />
      <label for="aom3"><span><span></span></span> ccc</label>
    </td>
  </tr> -->

</table>



<?php
  echo $datar1 = $data_uji->rating1 == ''?'undefined':$data_uji->rating1;
  echo $datar2 = $data_uji->rating2 == ''?'undefined':$data_uji->rating2;
  echo $datar3 = $data_uji->rating3 == ''?'undefined':$data_uji->rating3;
?>

<script type="text/javascript">



  var emotionsArray = ['disappointed','meh','smile'];
  var titleArray = ['disappointed','meh','smile'];


  var options1 = $("#rating1").emotionsRating({
      emotions: emotionsArray,
      inputName: "rating1",
      initialRating: ["<?=$datar1?>"],
      disabled: false
    });
  var options2 = $("#rating2").emotionsRating({
      emotions: emotionsArray,
      inputName: "rating2",
      initialRating: ["<?=$datar2?>"],
      disabled: false
    });
  var options3 = $("#rating3").emotionsRating({
      emotions: emotionsArray,
      inputName: "rating3",
      initialRating: ["<?=$datar3?>"],
      disabled: false
    });

  $("#rating1").emotionsRating(options1);
  $("#rating1").click(function() {
    var data1 = $("input[name=rating1]").val();
    // console.log('The current value: ' + data1);
  });

  $("#rating2").emotionsRating(options2);
  $("#rating2").click(function() {
    var data2 = $("input[name=rating2]").val();
  });

  $("#rating3").emotionsRating(options3);
  $("#rating3").click(function() {
    var data3 = $("input[name=rating3]").val();
  });



</script>
