<link rel="stylesheet" href="<?=base_url().'assets/css/ujikom/input.css'?>" />

<style>
  .icons-check {
      background: url('<?=base_url().'assets/img/icons/check.png'?>') no-repeat center center;
  }
  .icons-no_check {
      background: url('<?=base_url().'assets/img/icons/no_check.png'?>') no-repeat center center;
  }

  textarea{
    border-radius: 5px;
    border: 1px solid #95B8E7;
    padding: 5px;
    resize: vertical;
  }
</style>

<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">

      <form id="myform">
        <div class="easyui-accordion" style="width:98%;">
            <div title="REKOMENDASI" data-options="
                collapsed:false,
                collapsible:false,
                tools:'#divbtn'
              ">

              <h3 style="padding:0 0 4px 4px;margin:4px"><?=$data->nama_lengkap ?></h3>


              <input type="hidden" id="administrasi_ujk" name="administrasi_ujk" value="<?php echo $data->administrasi_ujk ?>">
              <input type="hidden" id="skema_sertifikasi" name="skema_sertifikasi" value="<?php echo $data->skema_sertifikasi ?>">
              <input type="hidden" id="pra_asesmen_checked" name="pra_asesmen_checked" value="<?php echo $data->pra_asesmen_checked ?>">
              <input type="hidden" id="id_users" name="id_users" value="<?php echo $data->id_users ?>">
              <input type="hidden" id="telp" name="telp" value="<?php echo $data->telp ?>">
              <input type="hidden" name="jadwal_id"  value="<?php echo $data->jadwal_id ?>" readonly="true">

              <input type="hidden" id="nama_lengkap" name="nama_lengkap" value="<?php echo $data->nama_lengkap ?>">
              <input type="hidden" id="no_uji_kompetensi" name="no_uji_kompetensi" value="<?php echo $data->no_uji_kompetensi ?>">
              <input type="hidden" name="id_asesor" value="<?php echo $data->id_asesor ?>">
              <input type="hidden" name="id_tuk" value="<?php echo $data->id_tuk ?>">
              <input type="hidden" id="is_perpanjangan" name="is_perpanjangan" value="<?php echo $data->is_perpanjangan ?>">
              <input type="hidden" id="xxx" name="xxx" value="<?php echo $data->xxx ?>">
            </div>
            <!-- <div id="divpanel" class="easyui-accordion" style="display:block!important"> -->

            <div title="FR.AK.01 - Persetujuan Asesmen dan Kerahasiaan" data-options="selected:true" style="padding:10px;background:whitesmoke;height:230px;">
              <?php $this->load->view('rekomendasi_asesor/fr_ak01'); ?>
            </div>

            <div title="FR.AK.02 - Rekaman Asesmen" data-options="selected:true" style="padding:10px;background:whitesmoke;height:430px;">
              <?php $this->load->view('rekomendasi_asesor/fr_ak02')?>
            </div>

            <div title="FR.AK.03 - Umpan Balik & Catatan Asesmen" data-options="selected:true" style="padding:10px;background:whitesmoke;">
              <?php $this->load->view('rekomendasi_asesor/fr_ak03'); ?>
            </div>

            <div title="FR.AK.04 - Banding Asesmen" data-options="selected:true" style="padding:10px;background:whitesmoke;">
              <?php $this->load->view('rekomendasi_asesor/fr_ak04'); ?>
            </div>

            <div title="FR.AK.05 - Laporan Asesmen" data-options="selected:true" style="padding:10px;background:whitesmoke;">
              <?php $this->load->view('rekomendasi_asesor/fr_ak05'); ?>
            </div>

            <div title="FR.AK.06 - Meninjau Proses Asesmen" data-options="selected:true" style="padding:10px;background:whitesmoke;">
              <?php $this->load->view('rekomendasi_asesor/fr_ak06'); ?>
            </div>

            <div title="REKOMENDASI HASIL ASESMEN" data-options="selected:true" style="width:98%;padding:10px;background:whitesmoke;">
              <table style="">
                <tr>
                  <td class="tx-bold" style="width:35%;padding:10px 0 0 10px;">Rekomendasi</td>
                  <td style="width:65%;padding:10px 0 0 10px;" disabled>
                    <?php echo form_dropdown('rekomendasi_asesor', $rekomendasi_asesor, $data->rekomendasi_asesor , 'id="rekomendasi_asesor" style="width:98%;" class="easyui-combobox"'); ?>
                  </td>
                </tr>

                <tr>
                  <td style="width:35%;padding:10px 0 0 10px;"><b>Tindak lanjut yang dibutuhkan</b></br>(Masukkan pekerjaan tambahan dan asesmen yang diperlukan untuk mencapai kompetensi) </td>
                  <td style="width:65%;padding:10px 0 0 10px;">
                    <textarea name="rekomendasi_description" id="rekomendasi_description" rows="3" cols="58"><?=$data->rekomendasi_description?></textarea>
                  </td>
                </tr>

                <tr>
                  <td class="tx-bold" style="width:35%;padding:10px 0 0 10px;">Komentar/Observasi oleh <br> asesor</td>
                  <td style="width:65%;padding:10px 0 10px 10px;">
                    <textarea name="komentar_observasi" id="komentar_observasi" cols="58"><?=$data->komentar_observasi?></textarea>
                  </td>
                </tr>
              </table>
            </div>

            <!-- </div> -->

            <div style="right: -111px!important;">
              <a href="<?php echo base_url() . 'penilaian_asesor/cetak_ak02/'.$data->id?>" target="_blank" class="icon-print" style="color:#688195;text-decoration: none;width:111px!important;font-weight:bold;">CETAK</a>
            </div>
            <div id="divbtn">
            <a href="#" class="easyui-menubutton" style="color:#688195;text-decoration: none;width:111px;height:10px;" data-options="menu:'#mm'"><b>CETAK FORM</b></a>
            <div id="mm" style="width:150px;">
                <div data-options="iconCls:'icon-print'"><a href="<?php echo base_url() . 'penilaian_asesor/cetak_ak/1/'.$data->id?>" target="_blank">FR.AK.01</a></div>
                <div data-options="iconCls:'icon-print'"><a href="<?php echo base_url() . 'penilaian_asesor/cetak_ak/2/'.$data->id?>" target="_blank">FR.AK.02</a></div>
                <div data-options="iconCls:'icon-print'"><a href="<?php echo base_url() . 'penilaian_asesor/cetak_ak/3/'.$data->id?>" target="_blank">FR.AK.03</a></div>
                <div data-options="iconCls:'icon-print'"><a href="<?php echo base_url() . 'penilaian_asesor/cetak_ak/4/'.$data->id?>" target="_blank">FR.AK.04</a></div>
                <div data-options="iconCls:'icon-print'"><a href="<?php echo base_url() . 'penilaian_asesor/cetak_ak/5/'.$data->id?>" target="_blank">FR.AK.05</a></div>
                <div data-options="iconCls:'icon-print'"><a href="<?php echo base_url() . 'penilaian_asesor/cetak_ak/6/'.$data->id?>" target="_blank">FR.AK.06</a></div>
                <!-- <div data-options="iconCls:'icon-print'"><a href="#">CETAK SEMUA</a></div> -->
            </div>
            </div>
          </div>

      </form>

  </div>
</div>

<script type="text/javascript">
function mak___1(){
    if($("#box_mak01").is(':checked')){
        $('.box1').prop("checked", true);
    }else{
        $('.box1').prop("checked", false);
    }
}
function alertsv(){
    if($("#v_all").is(':checked')){
        $('.v_all').prop("checked", true);
    }else{
        $('.v_all').prop("checked", false);
    }
}
function alertsa(){
    if($("#a_all").is(':checked')){
        $('.a_all').prop("checked", true);
    }else{
        $('.a_all').prop("checked", false);
    }
}
function alertst(){
    if($("#t_all").is(':checked')){
        $('.t_all').prop("checked", true);
    }else{
        $('.t_all').prop("checked", false);
    }
}
function alertsm(){
    if($("#m_all").is(':checked')){
        $('.m_all').prop("checked", true);
    }else{
        $('.m_all').prop("checked", false);
    }
}


<?php
echo $jadwal_grid;
echo $asesor_grid;
echo $tuk_grid;
?>
$("#rekomendasi_asesor").combobox({
        onChange: function(newVal, oldVal){
            if(newVal=='1'){
                $('#rekomendasi_description').val('Direkomendasikan kompeten untuk skema yang telah di uji. Tingkatkan dengan skema yang lebih tinggi!');
                $('#komentar_observasi').val('...');
            }else if(newVal=='2'){
                $('#rekomendasi_description').val('Silahkan melakukan banding sesuai dengan rekomendasi perbaikan dari asesor. Atau melaksanakan asesmen lanjutan!');
                $('#komentar_observasi').val('...!');
            }else{
                $('#rekomendasi_description').val('');
                $('#komentar_observasi').val('');
            }
        }
})

</script>
