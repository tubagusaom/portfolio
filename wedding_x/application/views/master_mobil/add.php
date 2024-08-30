<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
            <table class="table-data">
                <tr>
                    <td style="width: 100px;">Tahun : </td>
                    <td>
                        <input id="id_tahun" name="id_tahun" style="width: 250px;">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Merek : </td>
                    <td>
                        <input id="id_merek" name="id_merek" style="width: 250px;">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Model : </td>
                    <td>
                        <input id="id_model" name="id_model" style="width: 250px;">
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">Transmisi : </td>
                    <td>
                        <input id="id_transmisi" name="id_transmisi" style="width: 250px;">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<script type="text/javascript">
	<?php
		echo $tahun_grid;
    echo $merek_grid;
    echo $model_grid;
    echo $transmisi_grid;
	?>
</script>
