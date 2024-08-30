<link rel="stylesheet" href="<?=base_url().'assets/css/dropzone.css'?>" />
<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Dokumen Customer</a></li>
                </ol>
            </div>

            <?php
              foreach ($jenis_komponen as $key => $jenis) {
                if ($jenis->id == "6") {
                  $value="2";
                }else {
                  $value="1";
                }
            ?>

            <table width="95%" border="1" style="border-collapse: collapse; margin-bottom:15px" align="center">
              <tr>
                <th style="padding: 5px; background: #ddd; text-align: center">-</th>
                <th style="padding: 5px; background: #ddd"><?=$jenis->nama_jenis ?></th>
                <th style="padding: 5px; background: #ddd; text-align: center">Status Tampil</th>
              </tr>

              <?php
                $nodokumen=1;
                foreach ($data_kendaraan as $key => $dokumen) {
                  if ($jenis->id == $dokumen->id_jenis) {

                    if($dokumen->status_tampil == '1'){
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
                  <input id="st" type="checkbox" name="st[<?=$dokumen->id ?>]" value="<?=$value ?>" <?=$checked ?>>
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

                <?php
                  if ($data->harga_kendaraan == "") {
                    $harga="0";
                  }else{
                    $harga=$data->harga_kendaraan;
                  };

                  if ($data->harga_awal == "") {
                    $hargaawal="0";
                  }else{
                    $hargaawal=$data->harga_awal;
                  };
                ?>
                <input type="hidden" name="harga_kendaraan" value="<?=$harga ?>">
                <input type="hidden" name="harga_awal" value="<?=$hargaawal ?>">
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
                  <li><a href="javascript: void(0)">Rekomendasi</a></li>
              </ol>
          </div>

          <table width="95%" border="0" style="border-collapse: collapse; margin-bottom:15px" align="center">
            <tr>
              <th style="width: 25%">Rekomendasi</th>
              <td style="width: 150px; padding: 5px ">
                :
                <select class="easyui-combobox" name="status_rekomendasi">
                  <option <?= $data->status_rekomendasi == '0' ? 'selected' : ''; ?>  value="0">-</option>
                  <option <?= $data->status_rekomendasi == '1' ? 'selected' : ''; ?>  value="1">Ditolak</option>
                  <option <?= $data->status_rekomendasi == '2' ? 'selected' : ''; ?>  value="2">Diterima</option>
                </select>
              </td>
            </tr>
            <!-- <tr>
              <th>Harga Kendaraan</th>
              <td style="width: 150px; padding: 5px ">: </td>
            </tr>
            <tr>
              <th>Status Lelang</th>
              <td style="width: 150px; padding: 5px ">: </td>
            </tr> -->
          </table>

          </form>
      </div>
  </div>

  <script src="<?php echo base_url() ?>assets/js/dropzone.js"></script>


  <script type="text/javascript">
    var base_url = "<?php echo base_url() ?>";

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
</script>
