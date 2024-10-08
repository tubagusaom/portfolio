<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform" enctype="multipart/form-data" action="<?php echo $url ?>">
            
            <div id="tips" style="background-color: aqua;">
                <ol >
                    <li><a href="javascript:void(0)" id="mb" class="easyui-menubutton" 
                           data-options="menu:'#mm',iconCls:'icon-print'">Lihat Dokumen</a>
                        <div id="mm" style="width:auto;">
                            <div data-options="iconCls:'icon-print'"><a target="_blank" href="<?php echo base_url($data->id) ?>">PDF</a></div>
                        </div>
                    </li>
                </ol>
            </div>
            
            <table class="table-data">
                <tr>
                    <td style="width: 120px;">Nama Dokumen : </td>
                    <td>
                        <input value="<?php echo $data->nama_dokumen ?>" id="nama_dokumen" name="nama_dokumen" style="width: 250px;" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Keterangan : </td>
                    <td>
                        <textarea id="keterangan" name="keterangan" style="width: 250px;"><?php echo $data->keterangan ?></textarea>
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