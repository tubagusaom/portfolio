<form  action="?Proses-Tambah-Company" method="post" class="form_input">
	<table>
		<tr>
			<td colspan="2"><h1>Tambah  <?= $_GET['header'] ?></h1></td>
		</tr>
		<tr>
			<td>Nama  <?= $_GET['header'] ?></td>
			<td>
				<input type="text" name="nm_comp" value="" placeholder="max 20 character" required>
			</td>
		</tr>
		<tr>
			<td>Alamat </td>
			<td>
				<!-- <input type="text" name="alamat_comp" value="" placeholder="max 20 character" required> -->
				<textarea name="alamat_comp" rows="8" cols="80"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="simpan" value="Simpan">
			</td>
		</tr>
	</table>
</form>
