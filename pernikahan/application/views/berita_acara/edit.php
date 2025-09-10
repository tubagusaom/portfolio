<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
<form id="myform">
            <table class="table-data">
                <tr>
                    <td style="width: 180px;"><b>Kode Jadwal:</b> </td>
                    <td>
                        <input id="kode_jadwal" name="kode_jadwal" style="width: 330px;" class="easyui-textbox" value="<?php echo $data->kode_jadwal ?>">
                        <input type="hidden" name="nomor_keputusan" id="nomor_keputusan" value="<?=$nomor_keputusan ?>" />
                        <input type="hidden" name="nomor_permohonan" id="nomor_permohonan" value="<?=$nomor_permohonan ?>" />
                    </td>
                </tr>
                <tr>
                    <td style="width: 180px;">Nama Jadwal Asesmen: </td>
                    <td>
                         <input type="hidden" name="tanggal" id="tanggal" value="<?php echo $data->tanggal ?>" />
                         <input id="jadual" name="jadual" style="width: 330px;" class="easyui-textbox" value="<?php echo $data->jadual ?>">
                    </td>
                </tr>

                <tr>
                    <td style="width: 180px;">Tanggal Permohonan Blanko : </td>
                    <td>
                        <input id="tgl_permohonan" name="tgl_permohonan" value="<?php echo date('d/m/Y', strtotime($data->tgl_permohonan)) ?>" style="width: 330px;" class="easyui-datebox" data-options="required: true">
                    </td>
                </tr>

                 <tr>
                    <td style="width: 180px;">Status Jadwal: </td>
                    <td>
                        <?php echo form_dropdown('status_jadwal', $status_jadwal, $data->status_jadwal, 'id="status_jadwal" class="easyui-combobox" style="width: 330px;" data-options="required: true"'); ?>
                    </td>
                </tr>
                 <tr>
                    <td style="width: 180px;">Ringkasan : </td>
                    <td>
                        <textarea rows="4" cols="40" name="ringkasan_asesmen" id="ringkasan_asesmen" ><?php echo $data->ringkasan_asesmen ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width: 180px;">Dokumen Lampiran : </td>
                    <td>
                        <input id="fileToUpload" class="easyui-filebox" name="fileToUpload" style="width: 330px;" data-options="buttonText: 'Pilih File'"  />
                        <input type="hidden" name="dokumen_berita_acara" id="dokumen_berita_acara" value="<?php echo $data->dokumen_berita_acara ?>" />
                    </td>
                </tr>

            </table> <br> <br>
            <table class="easyui-datagrid" style="width: 97%;" data-options="nowrap:false,striped:true,rownumbers:true">
            <thead>
                <tr><th data-options="field:'kode_unit'" style="width: 52%;">Nama Peserta Uji</th>
                <th data-options="field:'nama_unit',align:'center'" style="width: 25%;">Rekomendasi Asesor</th>
                <th data-options="field:'nama_unit2',align:'center'" style="width: 15%;">
                  Sertifikat
                  <br /><input type="checkbox" id="sertifikat_all" onclick="alertssertifikat()" />
                </th>

            </thead>
            <tbody>
                <?php
                foreach($asesi_kompeten as $value){
                        if($value->rekomendasi_asesor=='1'){
                            $rekomendasi = 'Kompeten';
                        }else if($value->rekomendasi_asesor=='2'){
                            $rekomendasi = 'Belum Kompeten';
                        }else{
                            $rekomendasi = '-';
                        }
                        echo '<tr><td>'.$value->nama_lengkap.'</td><td>'.$rekomendasi.'</td>
                        <td style="text-align:center;">
                        <input class="sertifikat_all" type="checkbox" name="terbitkan_sertifikat['.$value->id.']" value="1" '.($value->terbitkan_sertifikat=='on'?"checked":"").'/></td>
                        </tr>';
                    }
                ?>
            </tbody>
            </table>
        </form>
    </div>
</div>
<script type="text/javascript">
<?php
echo $pra_asesmen_grid;
?>

function alertssertifikat(){
    if($("#sertifikat_all").is(':checked')){
        $('.sertifikat_all').prop("checked", true);
    }else{
        $('.sertifikat_all').prop("checked", false);
    }
}

</script>
