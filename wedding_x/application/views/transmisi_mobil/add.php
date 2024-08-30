<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <table class="table-data">
                <tr>
                    <td style="width: 120px;">Transmisi : </td>
                    <td>
                        <input id="transmisi_mobil" name="transmisi_mobil" style="width: 300px;" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>
                <tr>
                    <td style="width: 120px;">Detail Transmisi : </td>
                    <td>
                        <input id="description" name="description" style="width: 300px;" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>

                <tr>
                    <td style="width: 120px;">Mobil : </td>
                    <td>
                        <input id="id_model" name="id_model" style="width: 300px;" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>

<script type="text/javascript">
	<?php
		echo $model_grid;
	?>
</script>
