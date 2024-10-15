<form action="?Proses-Edit-Account-Master" method="post" class="form_input">
	<table>
		<tr>
			<td colspan="2"><h1>Edit Master Account</h1></td>
		</tr>
		<tr>
			<td>Kode Account</td>
			<td>
				<input type="hidden" name="acuan_kode" value="<?php echo $_GET['id']; ?>">
				<input type="hidden" name="kode" value="<?php echo $_GET['kode']; ?>" placeholder="max 20 character">
				<input type="text" name="kode_dis" value="<?php echo $_GET['kode']; ?>" placeholder="max 20 character" disabled="">
			</td>
		</tr>
		<tr>
			<td>Nama Account</td>
			<td>
				<input type="text" name="nama" value="<?php echo $_GET['nama']; ?>" placeholder="max 20 character">
			</td>
		</tr>
		<tr>
			<td>Jenis Account</td>
			<td>
				<select  name="jenis">
					<option value="D" <?php if($_GET['jenis']=='D'){echo "selected";} ?>>Debit</option>
					<option value="K" <?php if($_GET['jenis']=='K'){echo "selected";} ?>>Kredit</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="simpan" value="Simpan">
			</td>
		</tr>
	</table>
</form>
