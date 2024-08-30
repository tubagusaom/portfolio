
<div id="head">
	<label for="hide_nav">
		<div class="nav fa fa-bars"></div>
	</label>
	<div id="idbaner" class="baner">
		<?=get_header()?>
	</div>
	<!-- <div class="alert">
		<div class="users fa fa-user">
		</div>
		<div class="bell fa fa-bell">
			<div class="on_alert"></div>
		</div>
	</div> -->
	<div class="alert">
		<!-- <a href="?Logout" onclick="return confirm('Apakah anda yakin ingin keluar ?')">
			<div class="logout fa fa-sign-out"></div>
		</a> -->

		<?php
			if ($akses=='default') {
				$colbor = "red";
				$colus = "yellow";
			}else {
				$colbor = "";
				$colus = "";
			}
		?>

		<div class="users fa fa-user" style="color:<?=$colus?>;border-color:<?=$colbor?>;"></div>
		<div class="anggota">
			<?php
				if (isset($_SESSION['id_akun'])) {
					$akun=$_SESSION['id_akun'];
				}else {
					$akun = '';
				}

				$sql_a="SELECT nm_akun AS NAMA from akun WHERE id='$akun' ";
				$query_a=mysqli_query($koneksi,$sql_a);
				$dataa=mysqli_fetch_array($query_a);

				if ($akses=='superuser') {
					echo "<font style='color:yellow'>Rumah Produktif</font>";
				}else {
					echo "$dataa[NAMA]";
				}
			?>
		</div>
		<div class="ebe-content">
	    <div class="isi-content">
				<div class="aom">
					<table>
						<tr>
							<td style="vertical-align: top;">Nama</td>
							<td style="vertical-align: top;">:</td>
							<td>
								<?php
									if ($akses=='default') {
										echo "Anonimouse";
									}elseif ($akses=='superuser') {
										echo "Rumah Produktif";
									}else {
										echo "$dataa[NAMA]";
									}
								?>
							</td>
						</tr>
						<tr>
							<td>Akses</td>
							<td>:</td>
							<td>
								<u>
									<?php
										// $aksesusr = array(
										// 	'' => '',
										// 	'ketua' => 'Ketua Koperasi',
										// 	'admin' => 'Sekertaris 1',
										// 	'sekertaris' => 'Sekertaris 2',
										// 	'akunting' => 'Bendahara 1',
										// 	'analis' => 'Bendahara 2',
										// 	'superuser' => 'Superuser',
							      //   'anggota' => 'Anggota Koperasi',
							      //   'kredit' => 'Panitia Kredit',
							      //   'pengawas' => 'Pengawas'
										// );

										if (isset($akses)) {
											echo $aksesusr;
										}else {
											echo "Tidak Ada Akses";
										}

									?>
								</u>
							</td>
						</tr>
					</table>
				</div>
				<a href="?Logout" onclick="return confirm('Apakah anda yakin ingin keluar ?')">
					<div class="logout fa fa-sign-out" title="Logout">keluar</div>
				</a>
	    </div>
	  </div>
	</div>
</div>

<div id="conten">
	<?php
		if (!empty(get_url())) {
			include_once 'controler/modul.php';
		}else {
	?>
	<!-- <img class="image-conten" src="<?=base_url() ?>images/logokoperasi_p.jpeg" alt=""> -->
	<iframe style="visibility: hidden;position: absolute;left: 0; top: 0;height:100%; width:100%;border: none;" src="<?=url_tb() ?>"></iframe>

	<?php
		}
			// require_once 'fs_bottom.php';
	?>
</div>

<div id="footer">
	<?php
			require_once 'fs_bottom.php';
	?>
</div>
