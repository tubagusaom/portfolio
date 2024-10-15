	<form  action="?Proses-Edit-Account-Sub" method="post" class="form_input">
		<table>
			<tr>
				<td colspan="2"><h1>Edit Sub Account</h1></td>
			</tr>
			<tr>
				<td>Master Account</td>

				<?php
						$sql	  ="SELECT `kd_acount`, `desc_acount`, `jenis_acount` FROM acount WHERE stts_acount NOT LIKE '3' AND type_acount='M' ORDER BY id ASC";
						$query	=mysqli_query($koneksi,$sql);
						$data		=mysqli_fetch_array($query);
				?>

				<td>
					<input type="text" name="" disabled value="<?php echo $_GET['type']; echo " - "; echo $data['1'];  ?>">
					<input type="hidden" name="type" value="<?php echo $_GET['type']; echo " - "; echo $data['1'];  ?>">
				</td>
			</tr>
			<tr>
				<td>Kode Sub Account</td>
				<td>
					<input type="hidden" name="acuan_kode" value="<?php echo $_GET['id']; ?>">
					<input type="hidden" name="kode" value="<?php echo $_GET['kode']; ?>" placeholder="max 20 character">
					<input type="text" name="kode_dis" value="<?php echo $_GET['kode']; ?>" placeholder="max 20 character" disabled="">
				</td>
			</tr>
			<tr>
				<td>Nama Sub Account</td>
				<td>
					<input type="text" name="nama" value="<?php echo $_GET['nama']; ?>" placeholder="max 20 character" required>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="simpan" value="Simpan">
				</td>
			</tr>
		</table>
	</form>
