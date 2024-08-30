<form  action="?Proses-Tambah-Account-sub" method="post" class="form_input">
	<table>
		<tr>
			<td colspan="2"><h1>Tambah Sub Account</h1></td>
		</tr>
		<tr>
			<td>Master Account</td>
			<td>

				<select class="" name="type">
					<?php
						$sql	  ="SELECT `kd_acount`, `desc_acount`, `jenis_acount` FROM acount WHERE stts_acount NOT LIKE '3' AND type_acount='M' ORDER BY kd_acount ASC";
						$query	=mysqli_query($koneksi,$sql);
						while($data=mysqli_fetch_array($query))
						{
							echo "<option value=\"".$data[0]."-".$data[2]."\">$data[0] - $data[1]</option>";
						} ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Kode Sub Account</td>
			<td>
				<input type="text" name="kode" value="" placeholder="max 10 character" required>
			</td>
		</tr>
		<tr>
			<td>Nama Sub Account</td>
			<td>
				<input type="text" name="nama" value="" required>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="simpan" value="Simpan">
			</td>
		</tr>
	</table>
</form>
