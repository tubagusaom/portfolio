<script type="text/javascript">
	function ShowHide() {
		if (document.getElementById('cek').checked) {
			document.getElementById('password').type = 'text';
		} else {
			document.getElementById('password').type = 'password';
		}
	}

	function HideTB(){
		if (document.getElementById('cek').checked) {
			alert('Ho Ho Ho Ho :p');
		}
	}
</script>

<form action="?Proses-Ubah-Password" method="post" class="form_input">
	<table>
		<tr>
			<td colspan="2"><h1>Akun Pribadi</h1></td>
		</tr>
		<tr>
			<td>Nama Anggota</td>
			<td>
        <?php
          $id=$_SESSION['id'];
          $akun=$_SESSION['id_akun'];

          $sql="SELECT * from user WHERE id='$id' ";
          $query=mysqli_query($koneksi,$sql);
          $data=mysqli_fetch_array($query);

          $sql_a="SELECT * from akun WHERE id='$akun' ";
          $query_a=mysqli_query($koneksi,$sql_a);
          $dataa=mysqli_fetch_array($query_a);

        	if ($akses=="default") {
        ?>

				<input type="text" name="" value="Anonimouse" disabled>

				<?php }elseif ($akses=="superuser") { ?>

        <input type="text" name="" value="Rumah Produktif" disabled>

        <?php }else{ ?>

				<input type="text" name="" value="<?php echo $dataa[2] ?>" disabled>

        <?php } ?>
			</td>
		</tr>
		<tr>
			<td>Username</td>
			<td><input type="text" name="" value="<?php echo $data[1] ?>" disabled></td>
		</tr>
    <tr>
			<td>Hak Akses</td>
			<?php

				$hak=$this_login->akses_users($data[3]);

					// echo $data[3];

					if ($akses=="default" || $akses=="superuser") {
						$pass = "HO HO HO HO";
						$show = "none";
						$dis = "disabled";
					}else {
						$pass = $data[7];
						$show = "block";
						$dis = "";
					}
			?>
			<td><input type="text" name="" value="<?= $hak ?>" disabled></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
        <input type="hidden" name="id" value="<?php echo $data[0] ?>">
				<?php

				?>
        <input type="password" <?=$dis?> name="pws" value="<?php echo $pass ?>" required id="password">
				<label for="cek" class="input-box fa fa-eye" style="display:<?=$show ?>">
					<input type="checkbox" id="cek" name="radio2" value="on" onchange="ShowHide();"> Tampil / Sembunyikan Password
				</label>
      </td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="simpan" value="Simpan Perubahan" style="width:100%;" onclick="return confirm('Password akan dirubah ? ,Pastikan kembali password baru anda!')">
			</td>
		</tr>
	</table>
</form>
