<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform" enctype="multipart/form-data" action="<?php echo $url ?>">
            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Kode Skema: </td>
                    <td>
                        <input id="kode_skema" name="kode_skema" style="width: 200px;" class="easyui-textbox" data-options="required: true" value="<?php echo $data->kode_skema ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Skema Sertifikasi: </td>
                    <td>
                        <input id="skema" name="skema" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->skema ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Title of Skema : </td>
                    <td>
                        <input id="title_skema" name="title_skema" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->title_skema ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Jumlah Unit: </td>
                    <td>
                        <input id="jumlah_unit" name="jumlah_unit" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->jumlah_unit ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Link Download Dokumen Skema: </td>
                    <td>
                        <input id="link_download" name="link_download" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->link_download ?>">
                        <a href="<?php echo $data->link_download ?>" target="_blank" >Download</a>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Link Download SKKNI: </td>
                    <td>
                        <input id="link_skkni" name="link_skkni" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->link_skkni ?>">
                        <a href="<?php echo $data->link_skkni ?>" target="_blank" >Download</a>
                    </td>
                </tr>

                <tr>
                    <td style="width: 150px;">Kategori : </td>
                    <td>
                        <?php echo form_dropdown('kategori_skema', $kategori_skema, $data->kategori_skema, 'id="kategori_skema" class="easyui-combobox"  data-options="required: true"'); ?>
                    </td>
                </tr>
                 <tr>
                    <td style="width: 150px;">KBLUI : </td>
                    <td>
                        <input id="kblui" name="kblui" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->kblui ?>">
                    </td>
                </tr>
                 <tr>
                    <td style="width: 150px;">KBJI: </td>
                    <td>
                        <input id="kbji" name="kbji" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->kbji ?>">
                    </td>
                </tr>
                 <tr>
                    <td style="width: 150px;">Jenjang KKNI : </td>
                    <td>
                        <input id="jenjang" name="jenjang" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->jenjang ?>">
                    </td>
                </tr>
                 <tr>
                    <td style="width: 150px;">Bidang : </td>
                    <td>
                        <input id="bidang" name="bidang" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->bidang ?>">
                    </td>
                </tr>
                 <tr>
                    <td style="width: 150px;">Area : </td>
                    <td>
                        <input id="bidang_title" name="bidang_title" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->bidang_title ?>">
                    </td>
                </tr>
                 <tr>
                    <td style="width: 150px;">Kode Sektor : </td>
                    <td>
                        <input id="kode_sektor" name="kode_sektor" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->kode_sektor ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Description : </td>
                    <td>
                        <textarea rows="4" cols="40" name="description" id="description" ><?php echo $data->description ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Icon: </td>
                    <td>
                        <input id="fileToUpload" class="easyui-filebox" name="fileToUpload" style="width: 250px;" data-options="buttonText: 'Pilih File'"  />

                        <input type="hidden" name="foto_hidden" id="foto_hidden" value="<?php echo $data->foto ?>" />
                </tr>
            </table>
        </form>
    </div>
</div>
<script>
$("#description").cleditor({
        width:550, height:230
    });
</script>
