<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <table class="table-data">
                <tr>
                    <td style="width: 140px;">Nama Asesor : </td>
                    <td>
                        <input id="users" name="users" style="width: 250px;" class="easyui-textbox" data-options="required: true" value="<?php echo $data->users ?>">
                        <input type="hidden" id="is_users" name="is_users" value="<?php echo $data->is_users ?>">
                        <input type="hidden" name="id_group_users" value="6">
                    </td>
                </tr>
                <tr>
                    <td style="width: 140px;">No Registrasi : </td>
                    <td>
                        <input id="no_reg" name="no_reg" style="width: 250px;" class="easyui-textbox" data-options="required: true" value="<?php echo $data->no_reg ?>" >
                    </td>
                </tr>
                <tr>
                    <td style="width: 140px;">Email : </td>
                    <td>
                        <input id="email" name="email" style="width: 250px;" class="easyui-textbox" data-options="required: true" value="<?php echo $data->email ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 140px;">HP : </td>
                    <td>
                        <input id="hp" name="hp" style="width: 250px;" class="easyui-textbox"  value="<?php echo $data->hp ?>">
                    </td>
                </tr>
                 <tr>
                    <td style="width: 140px;">Masa Berlaku Sertifikat Askom : </td>
                    <td><?php
                            if($data->masa_berlaku_asesor == ""){
                                $masa_berlaku_asesor = date('d/m/Y', strtotime(date('Y-m-d')));
                            }else{
                                $masa_berlaku_asesor = date('d/m/Y', strtotime($data->masa_berlaku_asesor));
                            }
                            //var_dump($data->pra_asesmen_date);
                        ?>
                        <input id="tgl_expired" name="tgl_expired" style="width: 200px;" class="easyui-datebox" value="<?php echo $masa_berlaku_asesor ?>">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>