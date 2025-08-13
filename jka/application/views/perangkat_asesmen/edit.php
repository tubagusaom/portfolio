<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
         <form id="myform" enctype="multipart/form-data" action="<?php echo base_url() ?>perangkat_asesmen/edit_upload/<?=$data->id?>">
             <table class="table-data">
                <tr>
                    <td style="width: 140px;">Skema Sertifikasi : </td>
                    <td>
                        <?php echo form_dropdown('skema_perangkat', $skema_perangkat, $data->skema_perangkat, 'id="skema_perangkat" class="easyui-combobox" style="width:250px;"  data-options="required: true"'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 140px;">Nama Perangkat : </td>
                    <td>
                        <input data-options="required: true" id="nama_perangkat" name="nama_perangkat" style="width: 250px;" class="easyui-textbox" value="<?php echo $data->nama_perangkat; ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Kode Perangkat : </td>
                    <td>
                        <input id="no_perangkat" name="no_perangkat" style="width: 250px;" class="easyui-textbox" value="<?php echo $data->no_perangkat; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td style="width: 100px;">Versi : </td>
                    <td>
                        <input id="versi" name="versi" style="width: 250px;" class="easyui-textbox" value="<?php echo $data->versi; ?>">
                    </td>
                </tr>
               
                <tr>
                    <td style="width: 100px;">Description : </td>
                    <td>
                        <input id="description" name="description" style="width: 250px;" class="easyui-textbox" value="<?php echo $data->description; ?>">
                    </td>
                </tr>
                 <tr>
                    <td style="width: 80px;text-align: right; margin-left: 0;">Browse : </td>
                    <td>
                        <input type="hidden" name="foto_hidden" value="<?php echo $data->file_perangkat; ?>">
                        <input id="fileToUpload" class="easyui-filebox" name="fileToUpload" style="width: 250px;" data-options="buttonText: 'Pilih File'">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


