<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
	<div class="x-panel-bwrap">
		<form id="myform">
			<table class="table-data">
				<?php if($jenis_user!='2'){?>
				<tr>
					<td style="width: 150px;">Nama Asesor : </td>
					<td>
						<input id="id_asesor" name="id_asesor" style="width: 200px;"  >
					</td>
				</tr>
			<?php }else{
				$user_id = $this->auth->get_user_data()->pegawai_id;
					echo '<input type="hidden"  name="id_asesor" value="'.$user_id.'"   >';
			}
			?>
				<tr>
                    <td style="width: 100px;">Available Date : </td>
                    <td>
                        <input id="tanggal_bersedia" name="tanggal_bersedia" style="width: 250px;" class="easyui-datebox" data-options="">
                    </td>
                </tr>
			</table>
		</form>
	</div>
</div>
<script type="text/javascript">
<?php
echo $asesor_grid;
?>
</script>
