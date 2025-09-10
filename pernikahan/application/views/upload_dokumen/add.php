<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform" enctype="multipart/form-data" action="<?php echo $url ?>">
            <table class="table-data">
                <tr>
                    <td style="width: 120px;">Nama Dokumen : </td>
                    <td>
                        <input id="nama_dokumen" name="nama_dokumen" style="width: 250px;" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>
                <tr>
                    <td style="width: 120px;">TUK : </td>
                    <td>
                        <input id="nama_dokumen" name="nama_dokumen" style="width: 250px;" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Keterangan : </td>
                    <td>
                        <textarea id="keterangan" name="keterangan" style="width: 250px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width: 120px;">Unggah Dokumen: </td>
                    <td>
                        <input id="fileToUpload" class="easyui-filebox" name="fileToUpload" style="width: 250px;" data-options="buttonText: 'Pilih File'" /> 
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>