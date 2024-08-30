<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Skenario</a></li>
                </ol>
            </div>

                <table class="table-data" style="border-collapse: collapse; width: 99%" border="1">
                  <tr>
                    <th width="5%" style="text-align: center">No</th>
                    <th>Skenario</th>
                    <th width="10%" style="text-align: center">Soal</th>
                    <th width="15%" style="text-align: center">Jawaban</th>
                  </tr>

                  <?php foreach ($query_soal_observasi as $key => $value) { ?>
                  <tr>
                    <td style="text-align: center"><?=$key +1 ?></td>
                    <td><?=$value->pertanyaan ?></td>
                    <td style="text-align: center">
                      <a target="_blank" href="<?=base_url('assets/files/soal/'.$value->file_soal.'') ?>">Unduh</a>
                    </td>
                    <td style="text-align: center">
                      <?php
                        $jawaban_observasi;
                        $no_j = 0;
                        foreach ($jawaban_observasi as $keys => $values) {
                          if ($no_j == $key) {

                      ?>
                      <a target="_blank" href="<?=base_url('assets/files/jawaban/'.$values.'') ?>">
                        Jawaban No <?php echo $no_j+1; ?>
                      </a>

                      <?php
                        }
                          $no_j++;}
                      ?>
                    </td>
                  </tr>
                  <?php } ?>

                </table>

            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Biodata Peserta</a></li>
                </ol>
            </div>
            <table class="table-data">
                <tr>
                     <input type="hidden" id="skema_sertifikasi" name="skema_sertifikasi" value="<?php echo $data->skema_sertifikasi ?>" />
                     <input type="hidden" id="is_observasi" name="is_observasi" value="<?php echo $data->is_observasi ?>" />
                     <input type="hidden" id="id_asesor" name="id_asesor" value="<?php echo $data->id_asesor ?>" />
                     <input type="hidden" id="id_perangkat" name="id_perangkat" value="<?php echo $data->id_perangkat ?>" />
                     <input type="hidden" id="u_date_create" name="u_date_create" value="<?php echo $data->u_date_create ?>" />

                    <td style="width: 150px;">Nama Lengkap: </td>
                    <td> <h3><?php echo $data->nama_lengkap ?></h3>
                        <input id="nama_lengkap" name="nama_lengkap" type="hidden" value="<?php echo $data->nama_lengkap ?>">
                    </td>
                </tr>

                <tr>
                    <td style="width: 150px;">Kompetensi: </td>
                    <td>
                        <?php echo form_dropdown('is_observasi_kompeten', array('-Pilih-','K','BK'), $data->is_observasi_kompeten, 'id="is_observasi_kompeten" class="easyui-combobox"  data-options="required: true"'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Catatan: </td>
                    <td>
                        <textarea rows="4" cols="40" name="catatan_observasi" id="catatan_observasi" ><?php echo $data->catatan_observasi ?></textarea>
                    </td>
                </tr>
            </table>

            <!-- <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">soal observasi</a></li>
                </ol>
            </div>

            <table class="table-data" border="1" style="width: 98%">
              <tr>
                <th style="width: 50%;text-align: left;">File Soal</th>
                <th style="width: 50%;text-align: left;">File Jawaban</th>
              </tr>
              <tr>
                <td style="text-align: left;">
                  <input type="file" name="file_observasi" value="<?php echo $data->file_observasi ?>">
                  <input type="hidden" name="foto_hidden" id="foto_hidden" value="<?php echo $data->file_observasi ?>" />
                </td>
                <td></td>
              </tr>
            </table> -->

            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Langkah Kerja dan Checklist Observasi </a></li>
                </ol>
            </div>
            <?=$checklist_observasi?>
        </form>
    </div>
</div>


<script type="text/javascript">
    var base_url = "<?= base_url(); ?>";
    $("#is_observasi_kompeten").combobox({
        onChange: function(newVal, oldVal){
            //alert(newVal);
            if(newVal=='1'){
                $('.ch_ch_observasi_y').prop("checked", true);
                $('#catatan_observasi').val('Kompeten');
            }else if(newVal=='2'){
                $('.ch_ch_observasi_n').prop("checked", true);
                $('#catatan_observasi').val('Belum Kompeten, lanjut dengan perangkat bukti tambahan');
                //$('.ch_vat,.ch_memadai_n').prop("checked", true);
            }
        }
    })
</script>
