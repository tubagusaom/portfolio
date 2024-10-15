<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
         <form id="myform">
            <table class="table-data">
                <tr>
                    <td style="width: 100px;">Iklan : </td>
                    <td>
                        <input type="hidden" id="kode_hidden" value="<?php echo $data->id ?>" />
                        <input id="adsense" name="adsense" style="width: 300px;" class="easyui-textbox" data-options="required: true" value="<?php echo $data->adsense ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Posisi : </td>
                    <td>
                        <?php echo form_dropdown('id_posisi', $posisi, $data->id_posisi, 'id="id_posisi" class="easyui-combobox" style="width: 300px;"  data-options="required: true"'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Script : </td>
                    <td>
                        <textarea id="script_adsense" name="script_adsense" class="easyui-text" rows="5" style="width: 300px;"><?php echo $data->script_adsense ?></textarea>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
