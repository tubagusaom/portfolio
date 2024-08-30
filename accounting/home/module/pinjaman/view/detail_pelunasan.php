<form  action="" method="post">
<table>
	<tr>
		<td colspan="10"><h1>Data Skema Pelunasan Pinjaman</h1></td>
	</tr>

	<?php if ($akses=='default' OR $akses=='superuser' AND $akses=='ketua') {?>
	<tr><td colspan="10">* Harap dicetak dahulu sebelum di aprove</td></tr>
	<?php }else { echo ""; } ?>
	<tr align="center">
		<th rowspan="2">No</th>
		<th rowspan="2">Kode Anggota</th>
		<th rowspan="2">Nama</th>
		<th colspan="3">Rekening</th>
		<th rowspan="2">Angsuran Pokok</th>
		<th rowspan="2">Jasa Koprasi</th>
		<th rowspan="2">Total</th>

		<?php if ($akses=='default' OR $akses=='superuser' OR $akses=='ketua' OR $akses=='akunting' OR $akses=='admin' OR $akses=='sekertaris') {?>
		<th rowspan="2" width="10%">-</th>
		<?php }else { echo ""; } ?>
	</tr>
	<tr align="center">
		<th>Bank</th>
		<th>Norek</th>
		<th>Pemilik</th>
	</tr>

	<?php
		$no		  =1;
		$sb			=0;

		if ($akses=="admin") {
			$ketentuan_where="AND c.kd_divisi IN ('1','2')";
		}elseif ($akses=="sekertaris"){
			$ketentuan_where="AND c.kd_divisi IN ('3','4')";
		}else {
			$ketentuan_where="";
		}

		$sql	  ="SELECT
								a.*
							FROM pinjam a
							JOIN schm b ON b.id = a.id_schm
							JOIN akun c ON c.id = b.id_akun
							WHERE
								a.ket_pinjam='2'
								$ketentuan_where
							ORDER BY a.id DESC";
		$query	=mysqli_query($koneksi,$sql);
		while($data=mysqli_fetch_array($query))
		{
			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}

			$sqla	  ="SELECT * FROM trans_pinjam WHERE jenis_pinjam='pelunasan' AND id_pinjam=$data[0]";
			$querya	=mysqli_query($koneksi,$sqla);
			$dataa	=mysqli_fetch_array($querya);

			$sqlb	  ="SELECT * FROM schm WHERE stts_schm NOT LIKE '3' AND id=$data[11]";
			$queryb	=mysqli_query($koneksi,$sqlb);
			$datab	=mysqli_fetch_array($queryb);

			$sqlc	  ="SELECT * FROM akun WHERE stts_akun NOT LIKE '3' AND id=$datab[11]";
			$queryc	=mysqli_query($koneksi,$sqlc);
			$datac	=mysqli_fetch_array($queryc);
	?>

	<tr class="hover" bgcolor="<?php echo $warna ?>">
		<td><?php echo "$no"; ?>.</td>
		<td>
			<?php echo "$datac[1]"; ?>
		</td>
		<td><?php echo "$datac[2]"; ?></td>
		<td align="center"><?php echo "$data[4]"; ?></td>
		<td align="center"><?php echo "$data[5]"; ?></td>
		<td align="center"><?php echo "$data[6]"; ?></td>
		<td align="right">
			<?php
				$sqld	  ="SELECT * FROM trans_pinjam WHERE jenis_pinjam='angsuran' AND id_pinjam=$data[0] ORDER BY id DESC";
				$queryd	=mysqli_query($koneksi,$sqld);
				$datad	=mysqli_fetch_array($queryd);

				$sisa=$data[7]-$datad[1];
				$ap=($data[1]/$data[7])*$sisa;
				$rupiah1=number_format($ap,0,',','.');
				echo "$rupiah1";
			?>
		</td>
		<td align="right" width="10%">
			<?php
				$jk=((($data[1]*$data[8])/100)/$data[7])*$sisa;
				$rupiah2=number_format($jk,0,',','.');
				echo "$rupiah2";
			?>
		</td>
		<td align="right">
			<b>
				<?php
					$total=$ap+$jk;
					echo number_format($total,0,',','.');
				?>
			</b>
		</td>

		<?php
			if ($akses=='default' OR $akses=='superuser' OR $akses=='akunting') {
		?>

		<td align="center">
			<a href="module/pinjaman/view/cetak_pelunasan.php?reff=<?php echo "$data[0]" ?>" target="_blank">Cetak</a> -
			<a href="?Aprove-Pelunasan&&reff=<?php echo "$data[0]" ?>" onclick="return confirm('Data pelunasan <?php echo "$datac[2]"; ?> akan aprove ???')">Aprove</a>
		</td>

		<?php
			}elseif($akses=='ketua' OR $akses=='admin' OR $akses=='sekertaris'){
		?>

		<td align="center">
			<a href="module/pinjaman/view/cetak_pelunasan.php?reff=<?php echo "$data[0]" ?>" target="_blank">Cetak</a>
		</td>

		<?php
			}else{echo "";}
		?>
	</tr>

	<?php
		$no++;};
	?>

</table>
</form>
