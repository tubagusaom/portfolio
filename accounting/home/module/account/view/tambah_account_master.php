<form  action="?Proses-Tambah-Account-Master" method="post" class="form_input">
	<table>
		<tr>
			<td colspan="2"><h1>Tambah Master Account</h1></td>
		</tr>
		<tr>
			<td>Kode Account</td>
			<td>
				<input type="text" name="kode" value="" placeholder="max 10 character" required>
			</td>
		</tr>
		<tr>
			<td>Nama Account</td>
			<td>
				<input type="text" name="nama" value="" required>
			</td>
		</tr>
		<tr>
			<td>Jenis Account</td>
			<td>
				<select class="" name="jenis">
					<option value="D">Debit</option>
					<option value="K">Kredit</option>
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
