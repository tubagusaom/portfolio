<link rel="stylesheet" href="<?=base_url().'assets/css/dropzone.css'?>" />
<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">

          <div id="tips">
              <ol class="rounded-list">
                  <li><a href="javascript: void(0)">Dokumen Customer</a></li>
              </ol>
          </div>

          <?php foreach ($jenis_komponen as $key => $jenis) { ?>

          <table width="95%" border="1" style="border-collapse: collapse; margin-bottom:15px" align="center">
            <tr>
                <th style="padding: 5px; background: #ddd">-</th>
                <th style="padding: 5px; background: #ddd"><?=$jenis->nama_jenis ?></th>
                <th style="padding: 5px; background: #ddd; text-align: center">Tampak Depan</th>
            </tr>

            <?php
              $nodokumen=1;
              foreach ($data_kendaraan as $key => $dokumen) {
                if ($jenis->id == $dokumen->id_jenis) {

                  if($dokumen->status_gambar == '1'){
                      $checked = 'checked';
                  }else{
                      $checked = '';
                  }
            ?>

            <tr>
              <td style="width:5%; text-align: center"><?=$nodokumen ?>.</td>
              <td style="padding: 5px ">
                <a href="<?=base_url(); ?>assets/files/member/<?=$dokumen->file_komponen ?>" target="_blank">
                    <?= @$dokumen->nama_komponen; ?>
                </a>
              </td>
              <td style="width: 18%; padding: 5px; text-align: center">
                <input id="sg" type="radio" name="sg" value="<?=$dokumen->id ?>" <?=$checked ?> required="true">
              </td>
            </tr>

            <?php $nodokumen++;}} ?>

          </table>

        <?php } ?>

          <div id="tips">
              <ol class="rounded-list">
                  <li><a href="javascript: void(0)">Detail Kendaraan</a></li>
              </ol>
          </div>

          <table width="95%" border="0" style="border-collapse: collapse; margin-bottom:15px" align="center">
            <tr>
              <th style="width: 25%">Customer</th>
              <td style="width: 150px; padding: 5px ">:
                <?=$detail_kendaraan->nama_member ?>
                <input type="hidden" name="id_member" value="<?=$data->id_member ?>">
              </td>
            </tr>
            <tr>
              <th>Tahun</th>
              <td style="width: 150px; padding: 5px ">:
                <?=$detail_kendaraan->tahun_mobil ?>
                <input type="hidden" name="id_tahun" value="<?=$data->id_tahun ?>">
              </td>
            </tr>
            <tr>
              <th>Merek</th>
              <td style="width: 150px; padding: 5px ">:
                <?=$detail_kendaraan->merek_mobil ?>
                <input type="hidden" name="id_merek" value="<?=$data->id_merek ?>">
              </td>
            </tr>
            <tr>
              <th>Model</th>
              <td style="width: 150px; padding: 5px ">:
                <?=$detail_kendaraan->model_mobil ?>
                <input type="hidden" name="id_model" value="<?=$data->id_model ?>">
              </td>
            </tr>
            <tr>
              <th>Transmisi</th>
              <td style="width: 150px; padding: 5px ">:
                <?=$detail_kendaraan->transmisi_mobil ?>
                <input type="hidden" name="id_transmisi" value="<?=$data->id_transmisi ?>">
              </td>
            </tr>
            <tr>
              <th>Nopol</th>
              <td style="width: 150px; padding: 5px ">:
                <?=$data->nopol_kendaraan ?>
                <input type="hidden" name="nopol_kendaraan" value="<?=$data->nopol_kendaraan ?>">
              </td>
            </tr>
            <tr>
              <th>Jenis Kendaraan</th>
              <td style="width: 150px; padding: 5px ">:
                <?=$data->jenis_kendaraan ?>
                <input type="hidden" name="jenis_kendaraan" value="<?=$data->jenis_kendaraan ?>">
              </td>
            </tr>
            <tr>
              <th>Jumlah Bangku</th>
              <td style="width: 150px; padding: 5px ">:
                <?=$data->jumlah_bangku ?>
                <input type="hidden" name="jumlah_bangku" value="<?=$data->jumlah_bangku ?>">
              </td>
            </tr>
            <tr>
              <th>Spidometer</th>
              <td style="width: 150px; padding: 5px ">:
                <?=$data->spidometer_kendaraan ?>
                <input type="hidden" name="spidometer_kendaraan" value="<?=$data->spidometer_kendaraan ?>">
              </td>
            </tr>
            <tr>
              <th>Bahan Bakar</th>
              <td style="width: 150px; padding: 5px ">:
                <?=$data->bbm_kendaraan ?>
                <input type="hidden" name="bbm_kendaraan" value="<?=$data->bbm_kendaraan ?>">
              </td>
            </tr>
            <tr>
              <th>Jumlah Kepemilikan</th>
              <td style="width: 150px; padding: 5px ">:
                Tangan Ke-<?=$data->jumlah_kepemilikan_kendaraan ?>
                <input type="hidden" name="jumlah_kepemilikan_kendaraan" value="<?=$data->jumlah_kepemilikan_kendaraan ?>">
              </td>
            </tr>
            <tr>
              <th>Pajak Kendaraan</th>
              <td style="width: 150px; padding: 5px ">:
                <?php
                  if ($data->status_pajak_kendaraan == 1) {
                    echo "Hidup";
                  }elseif ($data->status_pajak_kendaraan == 2) {
                    echo "Mati";
                  }else {
                    echo "-";
                  }
                ?>
                <input type="hidden" name="status_pajak_kendaraan" value="<?=$data->status_pajak_kendaraan ?>">
              </td>
            </tr>
            <tr>
              <th>Pajak Ditanggung</th>
              <td style="width: 150px; padding: 5px ">:
                <?php
                  if ($data->pajak_ditanggung_kendaraan == 1) {
                    echo "Ditanggung";
                  }elseif ($data->pajak_ditanggung_kendaraan == 2) {
                    echo "Tidak";
                  }else {
                    echo "-";
                  }
                ?>
                <input type="hidden" name="pajak_ditanggung_kendaraan" value="<?=$data->pajak_ditanggung_kendaraan ?>">
              </td>
            </tr>
            <tr>
              <th>Asuransi</th>
              <td style="width: 150px; padding: 5px ">:
                <?php
                  if ($data->asuransi_kendaraan == 1) {
                    echo "Ya";
                  }elseif ($data->asuransi_kendaraan == 2) {
                    echo "Tidak";
                  }else {
                    echo "-";
                  }
                ?>
                <input type="hidden" name="asuransi_kendaraan" value="<?=$data->asuransi_kendaraan ?>">
              </td>
            </tr>
            <tr>
              <th>Catatan</th>
              <td style="width: 150px; padding: 5px ">:
                <?=$data->catatan_kendaraan ?>
                <input type="hidden" name="catatan_kendaraan" value="<?=$data->catatan_kendaraan ?>">
              </td>
            </tr>
          </table>

          <div id="tips">
              <ol class="rounded-list">
                  <li><a href="javascript: void(0)">Pelelangan</a></li>
              </ol>
          </div>

          <table width="95%" border="0" style="border-collapse: collapse; margin-bottom:15px" align="center">

            <?php
              function rupiah($angka){
                $hasil_rupiah = number_format($angka,0,',','.');
                return $hasil_rupiah;
              }

              $harga_awal=rupiah($data->harga_awal);
              $harga_kendaraan=rupiah($data->harga_kendaraan);
            ?>

            <tr>
              <th>Harga Awal</th>
              <td style="width: 150px; padding: 5px ">:
                <input id="rupiah1" value="<?=$harga_awal ?>" readonly style="width: 207px; padding: 5px "/>
              </td>
            </tr>

            <tr>
              <th>Harga Kendaraan</th>
              <td style="width: 150px; padding: 5px ">:

                <!-- <input id="harga_kendaraan" name="harga_kendaraan" value="<?=$harga_kendaraan ?>" style="width: 162px;" data-options="required: true"> -->
                <input id="rupiah" name="harga_kendaraan" value="<?=$harga_kendaraan ?>" style="width: 207px; padding: 5px "/>
              </td>
            </tr>
            <tr>
              <th>Jam</th>
              <td style="width: 150px; padding: 5px ">:
                <input id="jam_awal" name="jam_awal" value="<?=$data->jam_awal; ?>" style="width: 90px;" class="easyui-timespinner" data-options="min:'00:00',showSeconds:true"> <b> s/d </b>
                <input id="jam_akhir" name="jam_akhir" value="<?=$data->jam_akhir; ?>" style="width: 90px;" class="easyui-timespinner" data-options="min:'00:00',showSeconds:true">
              </td>
            </tr>

            <tr>
              <th style="width: 25%">Status Lelang</th>
              <td style="width: 150px; padding: 5px ">:
                <?php echo form_dropdown('status_lelang', $status_lelang, $data->status_lelang, 'id="status_lelang" style="width: 207px;" class="easyui-combobox" data-options="required: true"'); ?>
              </td>
            </tr>

            <tr id="tr_keterangan" style="display:none">
              <th>Keterangan</th>
              <td style="width: 150px; padding: 5px ">:
                <input class="easyui-textbox" style="width: 207px;" value="Lelang Ke-" name="keteranganlelang" id="KeteranganLelang" data-options="readonly: true">
              </td>
            </tr>

          </table>

          </form>
      </div>
  </div>

  <script src="<?php echo base_url() ?>assets/js/dropzone.js"></script>


  <script type="text/javascript">
    var base_url = "<?php echo base_url() ?>";
    var KeteranganLelang = document.getElementById("KeteranganLelang").value;

    function buka(data) {
        $('#vFile').empty();
        $('#vFile').dialog({
            title: 'View File ' + data,
            width: 900,
            height: 500,
            closed: true,
            cache: false,
            modal: true
        });

        $('#vFile').dialog('open');
        $('#vFile').dialog('refresh', base_url + 'rekomendasi/show_file?nmfile=' + data);
        //return false;
    }

    var rupiah1 = document.getElementById('rupiah1');
    var rupiah = document.getElementById('rupiah');
    rupiah1.addEventListener('keyup', function(e){
      rupiah1.value = formatRupiah(this.value, 'Rp. ');
    });
    rupiah.addEventListener('keyup', function(e){
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix){
  var number_string = angka.replace(/[^,\d]/g, '').toString(),
  split   		= number_string.split(','),
  sisa     		= split[0].length % 3,
  rupiah     		= split[0].substr(0, sisa),
  ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if(ribuan){
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }

  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
  return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
}

</script>
