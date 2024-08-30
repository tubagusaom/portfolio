<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Tahun Mobil : </td>
                    <td>
                        <input id="tahun_mobil" name="tahun_mobil" style="width: 200px;" class="easyui-textbox" data-options="required: true" value="<?php echo $data->tahun_mobil ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Description: </td>
                    <td>
                        <input id="description" name="description" style="width: 200px;" class="easyui-textbox" value="<?php echo $data->description ?>">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
