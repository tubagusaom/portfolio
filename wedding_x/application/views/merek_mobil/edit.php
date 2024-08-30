<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <table class="table-data">
                <tr>
                    <td style="width: 150px;">Merek Mobil : </td>
                    <td>
                        <input id="merek_mobil" name="merek_mobil" style="width: 200px;" class="easyui-textbox" data-options="required: true" value="<?php echo $data->merek_mobil ?>">
                    </td>
                </tr>

                <tr>
                    <td style="width: 100px;">Tahun : </td>
                    <td>
                        <input id="id_tahun" name="id_tahun" style="width: 200px;" class="easyui-textbox" data-options="required: true" value="<?php echo $data->id_tahun ?>">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<script type="text/javascript">
	<?php
		echo $tahun_grid;
	?>
</script>
