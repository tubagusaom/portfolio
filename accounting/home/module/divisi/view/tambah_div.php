<form  action="?Proses-Tambah-Divisi" method="post" class="form_input">
	<table>
		<tr>
			<td colspan="2"><h1>Tambah Divisi</h1></td>
		</tr>
		<tr>
			<td>Nama Divisi</td>
			<td>
				<input type="text" name="nama" value="" placeholder="max 20 character" required>
			</td>
		</tr>
		<tr>
			<td>Company</td>
			<td>
				<select name="comp" required oninvalid="this.setCustomValidity('Silahkan Pilih dept')" oninput="setCustomValidity('')">
					<option value="" selected>-</option>
					<?php
	          $sql_c="select * from company WHERE stts_comp NOT LIKE '3'";
	          $query_c=mysqli_query($koneksi,$sql_c);
	          while($datac=mysqli_fetch_array($query_c))
	          {
	            echo "<option value='$datac[0]'>$datac[1]</option>";
	          };
	        ?>
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
