<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform" action="<?php echo $url ?>">
            <table class="table-data">
                <tr>
                    <td style="width: 80px;">Kerangka Unit Kerja (KUK) : </td>
                    <td>
                        <textarea id="isi" name="kuk">
                            <?php echo $data->kuk ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Elemen Kompetensi : </td>
                    <td>
                        <?php echo form_dropdown('id_elemen_kompetensi', $elemen, $data->id_elemen_kompetensi, 'id="id_elemen_kompetensi" class="easyui-combobox" style="width: 250px;"  data-options="required: true"'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 80px;">Pertanyaan : </td>
                    <td>
                        <textarea id="isi2" name="pertanyaan">
                            <?php echo $data->pertanyaan ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width: 80px;">Jawaban : </td>
                    <td>
                        <textarea id="isi3" name="jawaban">
                            <?php echo $data->jawaban ?>
                        </textarea>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<script>
    $(function(){
        $("#isi").cleditor({
        width:450, height:230
    });
    })
    $(function(){
        $("#isi2").cleditor({
        width:450, height:230
    });
    })
    $(function(){
        $("#isi3").cleditor({
        width:450, height:230
    });
    })
</script>