<form  action="" method="post">
<table>
	<tr>
		<td colspan="10"><h1>Data Skema Penarikan Simpanan</h1></td>
	</tr>

	<tr>
		<td colspan="10">* Harap dicetak dahulu sebelum di aprove</td>
	</tr>

	<tr align="center">
		<th rowspan="2">No</th>
		<th rowspan="2">Tanggal Pengambilan</th>
		<th rowspan="2">Kode Anggota</th>
		<th rowspan="2">Nama</th>
		<th colspan="3">Rekening</th>
		<th rowspan="2">Penarikan</th>
		<th rowspan="2" width="10%">-</th>
	</tr>
	<tr align="center">
		<th>Bank</th>
		<th>Norek</th>
		<th>Pemilik</th>
	</tr>

	<?php
		$no		  =1;

		if ($akses=='default' OR $akses=='superuser') {
			$notlike="";
		}elseif ($akses=='ketua') {
			$notlike="AND stts_ambil NOT LIKE '3'";
		}elseif ($akses=='akunting') {
			$notlike="AND stts_ambil NOT LIKE '1'";
		}else {
			$notlike="AND stts_ambil NOT LIKE '1' AND stts_ambil NOT LIKE '3'";
		}

		$sql ="SELECT `id`, `jumlah_ambil`, `stts_ambil`, `efv_ambil`, `c_ambil`, `id_schm` FROM trans_ambil WHERE stts_ambil NOT LIKE '2' $notlike ORDER BY id DESC";
		$query=mysqli_query($koneksi,$sql);
		$notifikasi = array ();
		while($data=mysqli_fetch_array($query)){
			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}

			$sqlb	  ="SELECT * FROM schm WHERE stts_schm NOT LIKE '3' AND id=$data[id_schm]";
			$queryb	=mysqli_query($koneksi,$sqlb);
			$datab	=mysqli_fetch_array($queryb);

			$sqlc	  ="SELECT * FROM akun WHERE stts_akun NOT LIKE '3' AND id=$datab[11]";
			$queryc	=mysqli_query($koneksi,$sqlc);
			$datac	=mysqli_fetch_array($queryc);

			$count[] = $data;
			$notifikasi = COUNT($count);
	?>

	<tr class="hover" bgcolor="<?php echo $warna ?>">
		<td><?php echo "$no"; ?>.</td>
		<td><?php echo "$data[3]"; ?></td>
		<td>
			<?php echo "$datac[1]"; ?>
		</td>
		<td><?php echo "$datac[2]"; ?></td>
		<td align="center"><?php echo "$datab[4]"; ?></td>
		<td align="center"><?php echo "$datab[5]"; ?></td>
		<td align="center"><?php echo "$datab[6]"; ?></td>
		<td align="right" width="10%">
			<?php
				$rupiah2=number_format($data[1],0,',','.');
				echo "$rupiah2";
			?>
		</td>
		</td>
		<td align="center">
			<a href="module/simpanan/view/cetak.php?reff=<?php echo "$data[0]" ?>" target="_blank">Cetak</a> -
			<a href="?Aprove_Penarikan&&reff=<?php echo "$data[0]" ?>" onclick="return confirm('Data penarikan <?php echo "$datac[2]"; ?> akan aprove ???')">Aprove</a>
		</td>
	</tr>

	<?php
		$no++;};
		// echo $notifikasi;
	?>

</table>
</form>
