<table>
	<tr>
		<td colspan="8"><h1>Aprove Penyelesaian Anggota</h1></td>
	</tr>

	<tr align="center">
		<th>No</th>
		<th>Kode Anggota</th>
		<th>Nama</th>
		<th>Mail</th>
		<th>No Tlp</th>
		<th>dept</th>
		<th>Lokasi</th>
		<th align="center">-</th>
	</tr>

	<?php

		$no=1;

		if ($akses=='default' OR $akses=='superuser') {
			$acuan="";
		}elseif ($akses=='ketua') {
			$acuan="AND schm.stts_schm NOT LIKE '4'";
		}else {
			$acuan="AND schm.stts_schm NOT LIKE '6'";
		}

		$sql	  ="SELECT * from schm WHERE schm.stts_schm NOT LIKE '1' AND schm.stts_schm NOT LIKE '2' AND schm.stts_schm NOT LIKE '3' AND schm.stts_schm NOT LIKE '5' $acuan";
		$query	=mysqli_query($koneksi,$sql);
		while($data=mysqli_fetch_array($query))
		{
			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}

			$sqls	  ="SELECT * FROM akun where id=$data[11]";
			$querys	=mysqli_query($koneksi,$sqls);
			$datas	=mysqli_fetch_array($querys);

			$sqld	  ="SELECT * FROM dept where id=$data[12]";
			$queryd	=mysqli_query($koneksi,$sqld);
			$datad	=mysqli_fetch_array($queryd);

			$sqll	  ="SELECT * FROM lokasi where id=$data[13]";
			$queryl	=mysqli_query($koneksi,$sqll);
			$datal	=mysqli_fetch_array($queryl);

			$sqlpinjam	  ="SELECT * FROM `pinjam` WHERE id_schm='$data[0]' AND ket_pinjam NOT LIKE '3'";
			$querypinjam	=mysqli_query($koneksi,$sqlpinjam);
			$datapinjam	  =mysqli_fetch_array($querypinjam);

			if ($akses=='default' OR $akses=='superuser' OR $akses=='ketua') {
				$kodepinjaman=$datapinjam[0];
				$angsuran=$datapinjam[7];
			}else {
				$kodepinjaman='';
				$angsuran='';
			}
	?>

	<tr class="hover" bgcolor="<?php echo $warna ?>">
		<td><?php echo "$no"; ?>.</td>
		<td><?php echo "$datas[1]"; ?></td>
		<td><?php echo "$datas[2]"; ?></td>
		<td><?php echo "$datas[3]"; ?></td>
		<td><?php echo "$datas[4]"; ?></td>
		<td><?php echo "$datad[1]"; ?></td>
		<td><?php echo "$datal[1]"; ?></td>
		<td align="center">
			<a href="?Detail-Anggota_Keluar&&header=<?php echo "Penyelesaian" ?>&&aprove=oright&&id=<?php echo "$datas[0]" ?>&&ids=<?php echo "$data[0]" ?>&&kodeanggota=<?php echo "$datas[1]" ?>&&nm=<?php echo "$datas[2]" ?>">Detail</a>
		</td>
	</tr>

	<?php
		$no++;};
	?>

</table>
