<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Kerangka Unit Kerja (KUK) : </td>
                    <td>
                        <input id="kuk" name="kuk" style="width: 200px;" class="easyui-textbox" data-options="required: true" >
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Elemen Kompetensi : </td>
                    <td>
                        <?php echo form_dropdown('id_elemen_kompetensi', $elemen, '', 'id="id_elemen_kompetensi" class="easyui-combobox"  data-options="required: true" style="width:150px"'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 80px;">Pertanyaan : </td>
                    <td>
                        <input id="pertanyaan" name="pertanyaan" style="width: 200px;" class="easyui-textbox" >
                    </td>
                </tr>
                <tr>
                    <td style="width: 80px;">Jawaban : </td>
                    <td>
                        <input id="jawaban" name="jawaban" style="width: 200px;" class="easyui-textbox"  >
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
