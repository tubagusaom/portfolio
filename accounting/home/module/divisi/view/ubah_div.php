<form action="?Proses-Edit-Divisi" method="post" class="form_input">
	<table>
		<tr>
			<td colspan="2"><h1>Edit Divisi</h1></td>
		</tr>
		<tr>
			<td>Nama Divisi</td>
			<td>
				<input type="hidden" name="acuan_kode" value="<?php echo $_GET['id']; ?>">
				<input type="text" name="nama" value="<?php echo $_GET['divisi']; ?>" placeholder="max 20 character">
			</td>
		</tr>
		<tr>
			<td style="border-top:2px solid #999">Company</td>
			<td style="border-top:2px solid #999">
				<select name="comp" required oninvalid="this.setCustomValidity('Silahkan Pilih Company')" oninput="setCustomValidity('')">
					<option value="<?php echo $_GET['kdcomp']; ?>" selected><?php echo $_GET['comp']; ?></option>
					<?php
	          $sql_c="select * from company  WHERE stts_comp NOT LIKE '3'";
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
