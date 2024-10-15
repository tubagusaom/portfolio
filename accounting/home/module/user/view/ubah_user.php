<script type="text/javascript">
	function ShowHide() {
		if (document.getElementById('cek').checked) {
			document.getElementById('password').type = 'text';
		} else {
			document.getElementById('password').type = 'password';
		}
	}
</script>

<form action="?Proses-Edit-User" method="post" class="form_input">
	<table>
		<tr>
			<td colspan="2"><h1>Ubah User</h1></td>
		</tr>
		<tr>
			<td style="padding-bottom:20px;">Nama Anggota</td>
			<td>
				<?php
					$idakun=$_GET['akun'];
					$sql_aa="SELECT id,nm_akun FROM akun WHERE id='$idakun'";
					$query_aa=mysqli_query($koneksi,$sql_aa);
					$dataaa=mysqli_fetch_array($query_aa);

					// echo "$dataaa[1]";
				?>
				<input type="hidden" name="anggota" value="<?php echo $dataaa['id']; ?>">
				<div style="margin:0 0 0 35px;padding-bottom:15px;text-shadow: 1px 1px 1px #000;"> <?php echo $dataaa['nm_akun']; ?> </div>
			</td>
		</tr>

		<?php
			$iduser=$_GET['id'];
			$sql_detail="SELECT id,id_akun,kd_user,pw_asli,akses_user FROM user WHERE id=$iduser";
			$query_detail=mysqli_query($koneksi,$sql_detail);
			$datadetail=mysqli_fetch_array($query_detail);
		?>

		<tr>
			<td style="padding-bottom:5px;">Username</td>
			<td>
				<input type="hidden" name="acuan" value="<?php echo $_GET['id']; ?>">
				<input type="hidden" name="akun" value="<?php echo $datadetail['id_akun']; ?>">
				<input type="hidden" name="user" value="<?php echo $datadetail['kd_user']; ?>">
				<font style="margin:0 0 0 35px;text-shadow: 1px 1px 1px #000;"> <?php echo $datadetail['kd_user']; ?> </font>
			</td>
		</tr>
		<tr>
			<td  style="padding-top:20px;">Hak Akses</td>
			<td>
				<select name="akses" required style="margin-top:20px;">

					<?php
						$akses = $datadetail['akses_user'];

						$kdakses = array(
							'ketua' => '4',
							'admin' => '5',
							'sekertaris' => '16',
							'akunting' => '17',
							'analis' => '18',
							'kredit' => '20',
							'pengawas' => '21',
							'anggota' => '66'
						);
					?>

					<option value="<?php echo $kdakses[$akses]; ?>" selected>
						<?php
							$aksesuser = array(
								'ketua' => 'Ketua Koperasi',
								'admin' => 'Sekretaris 1',
								'sekertaris' => 'Sekretaris 2',
								'akunting' => 'Bendahara 1',
								'analis' => 'Bendahara 2',
								'anggota' => 'Anggota Koperasi',
								'kredit' => 'Panitia Kredit',
								'pengawas' => 'Pengawas',
							);

							if (isset($aksesuser[$akses])) {
								echo $aksesuser[$akses];
							}else {
								echo "Tidak Ada Akses";
							};
						?>
					</option>

					<?php
	          $sql_r="SELECT t_role.id,t_role.nama_peran,t_role.keterangan FROM `t_role`
											WHERE t_role.id > '3' AND t_role.nama_peran NOT LIKE '$akses'
									 ";
	          $query_r=mysqli_query($koneksi,$sql_r);
	          while($datar=mysqli_fetch_array($query_r))
	          {
	            echo "<option value='$datar[0]'>$datar[2]</option>";
	          };
	        ?>

				</select>
			</td>
		</tr>

		<tr>
			<td>Password</td>
			<td>
				<input style="margin-top:15px;" type="password" name="pws" value="<?php echo $datadetail['pw_asli']; ?>" required id="password">
				<label for="cek" class="input-box fa fa-eye">
					<input type="checkbox" id="cek" name="radio2" value="on" onchange="ShowHide();"> Tampil / Sembunyikan Password
				</label>
			</td>
		</tr>

		<tr>
			<td colspan="2">
				<input type="submit" name="simpan" value="Simpan">
			</td>
		</tr>
	</table>
</form>
