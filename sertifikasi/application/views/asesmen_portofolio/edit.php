<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Dokumen Upload Asesi</a></li>
                </ol>
            </div>
            <table width="95%" border="1" style="border-collapse: collapse; margin-left: 15px;" align="center">
                <th style="padding: 5px;">Jenis Dokumen</th>
                <th style="padding: 5px;">Dokumen</th>
                <th style="padding: 5px;text-align: center;">Valid</th>
                <th style="padding: 5px;text-align: center;">Asli</th>
                <th style="padding: 5px;text-align: center;">Terkini</th>

                <?php
                //var_dump($data->bukti_pendukung); die();
                $vat_portofolio = is_null($data->vat_portofolio) ? array() : unserialize($data->vat_portofolio);
            
                $buktiPendukung = str_replace("|", '"', $data->bukti_pendukung);
                $bukti_pendukung = json_decode($buktiPendukung);
                if (!empty($bukti_pendukung)) {
                    $no_urut = 0;
                    foreach ($bukti_pendukung as $key => $pendukung) {
                        if($key!='foto' & $key != 'ktp' & $key != 'ijazah'){
                        ?>
                        <tr>
                            <td width="20%" style="padding: 5px;"> <?= strtoupper($key) ?> </td>
                            <td width="40%" style="padding: 5px;">
                                <?php
                                if (is_array($pendukung)) {
                                    $pendukung = $pendukung[0];
                                    $extFile = explode(".", @$pendukung);
                                    $jmlArr = count($extFile) - 1;
                                    switch ($extFile[$jmlArr]) {
                                        case "ppt":
                                        case "pptx":
                                        case "doc":
                                        case "docx":
                                        case "xls":
                                        case "pdf":
                                        case "zip":
                                        case "rar":
                                        case "xlsx":
                                            // $linkFile = "<a href='" . base_url('assets/files/asesi/' . @$pendukung) . "' target='_blank'>" . @$pendukung . "</a>";
                                            // break;
                                        default:
                                            $linkFile = "<a href='javascript:void(0);' onclick='buka(\"" . @$pendukung . "\");'>" . @$pendukung . "</a>";
                                            break;
                                    }
                                } else {
                                    $extFile = explode(".", @$pendukung);
                                    $jmlArr = count($extFile) - 1;
                                    switch ($extFile[$jmlArr]) {
                                        case "ppt":
                                        case "pptx":
                                        case "doc":
                                        case "docx":
                                        case "xls":
                                        case "pdf":
                                        case "zip":
                                        case "rar":
                                        case "xlsx":
                                            // $linkFile = "<a href='" . base_url('assets/files/asesi/' . @$pendukung) . "' target='_blank'>" . @$pendukung . "</a>";
                                            // break;
                                        default:
                                            $linkFile = "<a href='javascript:void(0);' onclick='buka(\"" . @$pendukung . "\");'>" . @$pendukung . "</a>";
                                            break;
                                    }
                                }
                                ?>
                                <?= $linkFile; ?>
                            </td>
                            <td style="text-align: center" width="50px;"><input class="ch_vat" type="checkbox" name="vat_portofolio[<?=10+$no_urut+1?>]" value="1" <?=isset($vat_portofolio[10+$no_urut+1]) && $vat_portofolio[10+$no_urut+1]=='1' ? 'checked' : '' ?> /></td>
                            <td style="text-align: center" width="50px;"><input class="ch_vat" type="checkbox" name="vat_portofolio[<?=20+$no_urut+1?>]" value="1" <?=isset($vat_portofolio[20+$no_urut+1]) && $vat_portofolio[20+$no_urut+1]=='1' ? 'checked' : '' ?> /></td>
                            <td style="text-align: center" width="50px;"><input class="ch_vat" type="checkbox" name="vat_portofolio[<?=30+$no_urut+1?>]" value="1" <?=isset($vat_portofolio[30+$no_urut+1]) && $vat_portofolio[30+$no_urut+1]=='1' ? 'checked' : '' ?> /></td>
                        </tr>



                        <?php 
                        $no_urut++;
                        }
                    }
                }
                if(isset($data->id_users)){
					foreach ($repo as $keys => $values){
                                    $extFile = explode(".", @$values->nama_file);
                                    $jmlArr = count($extFile) - 1;
                                    switch ($extFile[$jmlArr]) {
                                        case "ppt":
                                        case "pptx":
                                        case "doc":
                                        case "docx":
                                        case "xls":
                                        case "pdf":
                                        case "zip":
                                        case "rar":
                                        case "xlsx":
                                            $link = "<a href='" . base_url('assets/files/asesi/' . @$values->nama_file) . "' target='_blank'>" . @$values->nama_file . "</a>";
                                            break;
                                        default:
                                            $link = "<a href='javascript:void(0);' onclick='buka(\"" . @$values->nama_file . "\");'>" . @$values->nama_file . "</a>";
                                            break;
                                    }						
                ?>
					<tr>
						<td width="20%" style="padding: 5px;"> <?= strtoupper($values->nama_dokumen) ?>: </td>
						<td width="40%" style="padding: 5px;"> <?= $link ?> </td>
					</tr>
                <?php } } ?>                
                
            </table>

            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Biodata Peserta</a></li>
                </ol>
            </div>
            <table class="table-data">
                <tr>
                     <input type="hidden" id="skema_sertifikasi" name="skema_sertifikasi" value="<?php echo $data->skema_sertifikasi ?>" />
                     <input type="hidden" id="is_portofolio" name="is_portofolio" value="<?php echo $data->is_portofolio ?>" />
                     <input type="hidden" id="id_asesor" name="id_asesor" value="<?php echo $data->id_asesor ?>" />
                     <input type="hidden" id="u_date_create" name="u_date_create" value="<?php echo $data->u_date_create ?>" />  
                    <td style="width: 150px;">Nama Lengkap: </td>
                    <td>
                        <input id="nama_lengkap" name="nama_lengkap" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->nama_lengkap ?>">
                    </td>
                </tr>
            
                <tr>
                    <td style="width: 150px;">Memadai: </td>
                    <td>
                        <?php echo form_dropdown('is_memadai', array('Pilih','Memadai','Belum Memadai'), $data->is_memadai, 'id="is_memadai" class="easyui-combobox"  data-options="required: true"'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Catatan: </td>
                    <td>
                        <textarea rows="4" cols="40" name="catatan_portofolio" id="catatan_portofolio" ><?php echo $data->catatan_portofolio ?></textarea>
                    </td>
                </tr>


            </table>
            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Isi dari dokumen portofolio telah menunjukkan kemampuan peserta sertifikasi (memadai/<i>sufficient</i>) terhadap setiap elemen kompetensi/kriteria unjuk kerja sebagai beriku </a></li>
                </ol>
            </div>
            <?=$vatm?>
        </form>
    </div>
</div>

<div id="vFile" >
    <input type="hidden">
</div>



<script type="text/javascript">
    var base_url = "<?= base_url(); ?>";

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
        $('#vFile').dialog('refresh', base_url + 'asesi/show_file?nmfile=' + data);
        //return false;
    }
    $("#is_memadai").combobox({
        onChange: function(newVal, oldVal){
            //alert(newVal);
            if(newVal=='1'){
                $('.ch_vat,.ch_memadai_y').prop("checked", true);  
                $('#catatan_portofolio').val('Kompeten');
            }else if(newVal=='2'){
                $('.ch_vat,.ch_memadai_n').prop("checked", true);  
                $('#catatan_portofolio').val('Belum Memadai, lanjut dengan UJI KOMPETENSI');
                //$('.ch_vat,.ch_memadai_n').prop("checked", true);  
            }
        }
    })
</script>
