<form action="?Proses-Edit-Company" method="post" class="form_input">
	<table>
		<tr>
			<td colspan="2"><h1>Edit Company</h1></td>
		</tr>
		<tr>
			<td>Nama Company</td>
			<td>
				<input type="hidden" name="acuan_kode" value="<?php echo $_GET['id']; ?>">
				<input type="text" name="nm_comp" value="<?php echo $_GET['comp']; ?>" placeholder="max 20 character">
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>
				<textarea name="alamat_comp" rows="8" cols="80"><?php echo $_GET['almt']; ?></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="simpan" value="Simpan">
			</td>
		</tr>
	</table>
</form>
