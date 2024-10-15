<form class="" action="" method="post" class="form_input">
<table>
	<tr>
		<td colspan="14"><h1>Data Skema Pinjaman</h1></td>
	</tr>

	<tr>
		<td colspan="14">
			<?php
				if (isset($_POST['submit'])) {
					if ($_POST['search']=='') {
						echo "";
					}
					else{
						echo "Pencarian berdasarkan <b>$_POST[search]</b>";
					}
				}
			?>
			<button type="submit" name="submit" class="cari">
				<i class="fa fa-search"></i>
			</button>
			<input type="text" name="search" placeholder="Nama Anggota" class="acount">
		</td>
	</tr>

	<tr align="center">
		<th rowspan="2">No</th>
		<th rowspan="2">Kode Anggota</th>
		<th rowspan="2">Nama</th>
		<th rowspan="2">
			Divisi <br>
			<font style="font-size:9px;"> Bisnis Unit </font>
		</th>
		<th rowspan="2">Perusahaan</th>
		<th rowspan="2">Jumlah Uang</th>
		<th rowspan="2">Tanggal Transfer</th>
		<th colspan="3">Rekening</th>
		<th rowspan="2">Dilunasi Selama</th>
		<th rowspan="2">Jasa Koprasi</th>
		<th rowspan="2">Status</th>
		<th rowspan="2" align="center" width="8%">-</th>
	</tr>
	<tr align="center">
		<th>Bank</th>
		<th>Norek</th>
		<th>Pemilik</th>
	</tr>

	<?php
		if (isset($_POST['submit'])) {
			$cari=$_POST['search'];
		}else {
			$cari='';
		}

		// echo $akses;

		// if ($akses == "admin") {
		// 	$wherejoindivisi = "WHERE akun.kd_divisi = '1' OR akun.kd_divisi = '2'";
		// 	$wheredivisi     = "kd_divisi = '1' OR kd_divisi = '2' AND";
		// }elseif($akses == "sekertaris"){
		// 	$wherejoindivisi = "WHERE akun.kd_divisi = '3' OR akun.kd_divisi = '4'";
		// 	$wheredivisi     = "kd_divisi = '3' OR kd_divisi = '4' AND";
		// }else {
		// 	$wheredivisi     = "";
		// 	$wherejoindivisi = "";
		// }

		if ($akses == "admin") {
			$wheredivisi = "WHERE c.kd_divisi IN ('1','2')";
		}elseif($akses == "sekertaris"){
			$wheredivisi = "WHERE c.kd_divisi IN ('3','4')";
		}else {
			$wheredivisi = "";
		}

		$no		  =1;
		$sql	  ="SELECT
								a.id,
								a.jumlah_pinjam,
								a.keperluan_pinjam,
								a.tgl_pinjam,
								a.bank_pinjam,
								a.norek_pinjam,
								a.pemilik_pinjam,
								a.jangka_pinjam,
								a.jasa_pinjam,
								a.ket_pinjam,
								a.c_pinjam,
								a.id_schm,
								d.nm_comp,
								e.nm_divisi
							FROM pinjam a
							LEFT JOIN schm b ON b.id = a.id_schm
							LEFT JOIN akun c ON c.id = b.id_akun
							LEFT JOIN company d ON d.id = c.kd_comp
							LEFT JOIN divisi e ON e.id = c.kd_divisi
							$wheredivisi
							ORDER BY a.ket_pinjam = '2' DESC, a.ket_pinjam = '1' DESC";
		$query	=mysqli_query($koneksi,$sql);
		while($data=mysqli_fetch_array($query))
		{
			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}

			$sqla	  ="SELECT * FROM schm WHERE id=$data[11] AND stts_schm NOT LIKE '3'";
			$querya	=mysqli_query($koneksi,$sqla);
			$dataa	=mysqli_fetch_array($querya);

			$sqlb	  ="SELECT a.* FROM akun a WHERE a.nm_akun LIKE '%$cari%' AND a.id=$dataa[11] AND a.stts_akun NOT LIKE '3'";
			$queryb	=mysqli_query($koneksi,$sqlb);
			while($datab	=mysqli_fetch_array($queryb)){
	?>

	<tr class="hover" bgcolor="<?php echo $warna ?>">
		<td><?php echo "$no"; ?>.</td>
		<td><?php echo "$datab[1]"; ?></td>
		<td><?php echo "$datab[2]"; ?></td>
		<td style="text-align: left; font-size:8.5px"><?php echo "$data[nm_divisi]"; ?></td>
		<td style="text-align: left; font-size:8.5px"><?php echo "$data[nm_comp]"; ?></td>
		<td align="right">
			<?php
				$rupiah1=number_format($data[1],0,',','.');
				echo "$rupiah1";
			?>
		</td>
		<td align="center">
			<?php
				$a=substr($data[3],8);
				$b=substr($data[3],5,2);
				$c=substr($data[3],0,4);

				echo "$a-$b-$c";
			?>
		</td>
		<td><?php echo "$data[4]"; ?></td>
		<td><?php echo "$data[5]"; ?></td>
		<td><?php echo "$data[6]"; ?></td>
		<td><?php echo "$data[7]"; ?> Bulan</td>
		<td align="right"><?php echo "$data[8]"; ?> %</td>

		<?php if ($akses=='default' OR $akses=='superuser' OR $akses=='admin' OR $akses=='sekertaris') { ?>
		<td>
			<?php if ($data[9]==1) { ?>

			<a href="?Detail-Pinjaman&&header=<?php echo "Pinjaman" ?>&&kode=<?php echo "$data[0]" ?>&&kodea=<?php echo "$datab[1]"?>&&namaa=<?php echo "$datab[2]"?>&&jp=<?php echo "$data[1]"?>&&angsur=<?php echo "$data[7]"?>&&jasa=<?php echo "$data[8]"?>&&ketpinjam=<?php echo "$data[9]"?>&&xxx=pelunasan">Pelunasan</a>

			<?php
				}elseif ($data[9]==2) {
					echo "Proses";
				}elseif ($data[9]==3 OR $data[9]==4) {
					echo "Lunas";
				}
			?>
		</td>
		<?php }else{ ?>
			<td width="8%" align="center">
				<?php
					if ($data[9]==1) {
						echo "Belum Lunas";
					}elseif ($data[9]==2) {
						echo "Proses";
					}elseif ($data[9]==3 OR $data[9]==4) {
						echo "Lunas";
					}
				?>
			</td>
		<?php } ?>

		<td align="center">
			<?php if ($akses=='default' OR $akses=='superuser') { ?>
			<a href="?Edit-Pinjaman&&header=<?php echo "Pinjaman" ?>&&idp=<?php echo "$data[0]" ?>&&kda=<?php echo "$datab[1]" ?>&&nm=<?php echo "$datab[2]" ?>&&sp=<?php echo "$data[1]" ?>&&sw=<?php echo "$data[2]" ?>&&sr=<?php echo "$data[3]" ?>&&bank=<?php echo "$data[4]" ?>&&norek=<?php echo "$data[5]" ?>&&an=<?php echo "$data[6]" ?>&&jangka=<?php echo "$data[7]" ?>&&jasa=<?php echo "$data[8]" ?>">Edit</a> |
			<a href="?Detail-Pinjaman&&header=<?php echo "Pinjaman" ?>&&kode=<?php echo "$data[0]" ?>&&kodea=<?php echo "$datab[1]"?>&&namaa=<?php echo "$datab[2]"?>&&jp=<?php echo "$data[1]"?>&&angsur=<?php echo "$data[7]"?>&&jasa=<?php echo "$data[8]"?>&&ketpinjam=<?php echo "$data[9]"?>">Detail</a>
			<?php }else{ ?>
			<a href="?Detail-Pinjaman&&header=<?php echo "Pinjaman" ?>&&kode=<?php echo "$data[0]" ?>&&kodea=<?php echo "$datab[1]"?>&&namaa=<?php echo "$datab[2]"?>&&jp=<?php echo "$data[1]"?>&&angsur=<?php echo "$data[7]"?>&&jasa=<?php echo "$data[8]"?>&&ketpinjam=<?php echo "$data[9]"?>">Detail</a>
			<?php } ?>
		</td>
	</tr>

	<?php
		$no++;}};
	?>

</table>
</form>
