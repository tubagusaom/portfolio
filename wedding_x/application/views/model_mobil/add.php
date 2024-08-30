<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <table class="table-data">
                <tr>
                    <td style="width: 100px;">Model Mobil : </td>
                    <td>
                        <input id="model_mobil" name="model_mobil" style="width: 250px;" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>

                <tr>
                    <td style="width: 100px;">Merek : </td>
                    <td>
                        <input id="id_merek" name="id_merek" style="width: 250px;" class="easyui-textbox" data-options="required: true">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<script type="text/javascript">
	<?php
		echo $merek_grid;
	?>
</script>
