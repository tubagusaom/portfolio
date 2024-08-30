<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform" enctype="multipart/form-data" action="<?php echo $url ?>">
            <table class="table-data">
                <tr>
                    <td style="width: 180px;">Nama Dokumen: </td>
                    <td>
                        <input id="nama_dokumen" class="easyui-textbox" name="nama_dokumen" style="width: 200px;" /> 
                    </td>
                </tr>            
            	<input type="hidden" name="id_asesi" value="<?= $this->id_asesi ?>">
                <tr>
                    <td style="width: 180px;">File Dokumen: </td>
                    <td>
                        <input id="fileToUpload" class="easyui-filebox" name="fileToUpload" style="width: 200px;" data-options="buttonText: 'Pilih File'" /> 
                    </td>
                </tr>
                <tr>
                    <td style="width: 80px;">Jenis Dokumen : </td>
                    <td>
                        <?php echo form_dropdown('jenis_dok', $jenis_dok, '', 'id="jenis_dok" style="width: 200px;" class="easyui-combobox"  data-options="required: true"'); ?>
                    </td>
                </tr>                
            </table>
        </form>
    </div>
</div>
