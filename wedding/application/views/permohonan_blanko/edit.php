<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <table class="table-data">
                <tr>
                    <td style="width: 200px;">Nomor Permohonan Blanko : </td>
                    <td>
                        <input type="hidden" name="jadwal_id"  value="<?php echo $data->jadwal_id; ?>"/>
                        <input id="nomor_permohonan" name="nomor_permohonan" style="width: 250px;" readonly value="<?= $data->nomor_permohonan ?>" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">Nomor Keputusan LSP : </td>
                    <td>
                        <input id="nomor_keputusan" name="nomor_keputusan" style="width: 250px;" readonly value="<?php echo implode(',', json_decode($data->nomor_keputusan, true)) ?>" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">Tanggal Permohonan Blanko : </td>
                    <td>
                        <input id="tgl_permohonan" name="tgl_permohonan" style="width: 250px;" value="<?php echo  date('d/m/Y', strtotime($data->tgl_permohonan)) ?>" class="easyui-datebox" data-options="required: true">
                    </td>
                </tr>
                <?php
                        if($data->jadwal_id != ""){
                            $jadwal = json_decode($data->jadwal_id);

                        }else{
                            $jadwal = array();    
                        }


                ?>
                <tr>
                    <td style="width: 200px;">Jadwal Uji Kompetensi : </td>
                    <td>
                        <select multiple name="jadwal_id[]" style="height: 200px;">
                            <?php
                                foreach ($select_jadwal as $key => $value) {
                                    if (in_array($value->id, $jadwal)) {
                                    //if ($perangkat_asesmen[$key] == $key) {
                                        $selected = 'selected';
                                        //$test = $perangkat_asesmen[$key];
                                    }else{
                                        $selected = '';
                                        //$test = '00';
                                    }
                                    echo '<option value="'.$value->id.'" '. $selected .'>'.$value->jadual.'</option>';
				}
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
        </form>

    </div>
</div>
<script type="text/javascript">
<?php
echo $jadwal;
?>
</script>
