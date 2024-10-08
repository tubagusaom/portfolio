<link rel="stylesheet" href="<?=base_url().'assets/css/ujikom/input.css'?>" />

<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">

      <form id="myform">

        <input type="hidden" id="u_date_create" name="u_date_create" value="<?php echo $data->u_date_create ?>">
        <input type="hidden" id="id_users" name="id_users" value="<?php echo $data->id_users ?>">
        <input type="hidden" id="skema_sertifikasi" name="skema_sertifikasi" value="<?php echo $data->skema_sertifikasi ?>">
        <input type="hidden" id="pra_asesmen" name="pra_asesmen" value="<?php echo $data->pra_asesmen ?>">
        <input type="hidden" id="pra_asesmen_checked" name="pra_asesmen_checked" value="<?php echo $data->pra_asesmen_checked ?>">
        <input type="hidden" id="pra_asesmen_date" name="pra_asesmen_date" value="<?php echo $data->pra_asesmen_date ?>">
        <input type="hidden" id="pra_asesmen_description" name="pra_asesmen_description" value="<?php echo $data->pra_asesmen_description ?>">
        <input type="hidden" id="no_identitas" name="no_identitas" value="<?php echo $data->no_identitas ?>">
        <input type="hidden" id="no_uji_kompetensi" name="no_uji_kompetensi" value="<?php echo $data->no_uji_kompetensi ?>">
        <input type="hidden" id="nama_lengkap" name="nama_lengkap" value="<?php echo $data->nama_lengkap ?>">
        <input type="hidden" id="telp" name="telp" value="<?php echo $data->telp ?>">
        <input type="hidden" id="email" name="email" value="<?php echo $data->email ?>">
        <input type="hidden" id="tempat_lahir" name="tempat_lahir" value="<?php echo $data->tempat_lahir ?>">
        <input type="hidden" id="tgl_lahir" name="tgl_lahir" value="<?php echo $data->tgl_lahir ?>">
        <input type="hidden" id="alamat" name="alamat" value="<?php echo $data->alamat ?>">
        <input type="hidden" id="metode_asesmen" name="metode_asesmen" value="<?php echo $data->metode_asesmen ?>">
        <input type="hidden" id="jadwal_id" name="jadwal_id" value="<?php echo $data->jadwal_id ?>">

        <div class="easyui-accordion" style="width:98%;height:483px;">
            <div title="FR-MAPA-01" data-options="
                collapsed:false,
                collapsible:false,
                tools:'#divbtn'
              ">

              <table width="100%" style="padding:4px 0 4px 4px;">
                <tr>
                  <td>Asesi :</td>
                  <td>Skema :</td>
                  <td colspan="6" width="23%">Perangkat Uji :</td>
                </tr>

                <tr>
                  <th rowspan="4" style="padding-left:5px;vertical-align: top;"><?=$data->nama_lengkap ?></th>
                  <th rowspan="4" style="padding-left:5px;vertical-align: top;"><?=$asesi->skema ?></th>
                </tr>
                <?php
               foreach ($files_asesi as $key => $val_dokuemen){?>
                <input type="hidden" name="validitas_dokumen_pra_asesmen[]" value="<?=$validitas_dokumen_pra_asesmen[$key]?>">
               <?php } ?>
                <?php
                  foreach ($data_perangkat as $key => $perangkat) {
                ?>
                <tr>
                  <th width="3%" style="padding-left:10px;vertical-align: top;">
                    <?=($key+1)?>.
                  </th>
                  <th><?=$perangkat?>
                  <input type="hidden" name="perangkat_yang_digunakan[]" value="<?=$idperangkat[$key]?>">
                  </th>
                </tr>
                <?php } ?>
              </table>
            </div>

            <!-- <div id="divpanel" class="easyui-accordion" style="display:block!important"> -->

            <div title="1. Pendekatan Asesmen" data-options="selected:true" style="padding:10px;background:whitesmoke;">
              <?php $this->load->view('rencana_asesmen/1_pendekatan') ?>
            </div>

            <div title="2. Persiapan Asesmen" data-options="selected:true" style="padding:10px;background:whitesmoke;">
              <?php $this->load->view('rencana_asesmen/2_persiapan') ?>
            </div>

            <div title="3. Rencana Asesmen" data-options="selected:true" style="padding:10px;background:whitesmoke;">
              <?php $this->load->view('rencana_asesmen/3_rencana') ?>
            </div>

            <!-- </div> -->

            <div id="divbtn" style="right: -111px!important;">
              <a href="<?php echo base_url() . 'pra_asesmen/cetak_mapa01/'.$data->id?>" target="_blank" class="icon-print" style="color:#688195;text-decoration: none;width:111px!important;font-weight:bold;">CETAK</a>
            </div>

        </div>

      </form>

  </div>
</div>
