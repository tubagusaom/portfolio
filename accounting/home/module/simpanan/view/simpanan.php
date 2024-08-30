<form class="" action="" method="post">
<table>
	<tr>
		<td colspan="11"><h1>Data Skema Simpanan</h1></td>
	</tr>

	<tr>
		<td colspan="11">
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
		<th rowspan="2">Divisi</th>
		<th rowspan="2">Simpanan Pokok</th>
		<th rowspan="2">Simpanan Wajib</th>
		<th rowspan="2">Simpanan Sukarela</th>
		<th colspan="3">Rekening</th>
		<th rowspan="2" width="8%">-</th>
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

		if ($akses == "admin") {
				$wheredivisi = "AND kd_divisi IN ('1','2')";
		}elseif($akses == "sekertaris"){
			$wheredivisi = "AND kd_divisi IN ('3','4')";
		}else {
			$wheredivisi = "";
		}

		$no		  =1;
		$sqla	  =
			"SELECT * FROM akun
				WHERE nm_akun LIKE '%$cari%' AND
				 			stts_akun NOT LIKE '3' AND
							stts_akun NOT LIKE '4' AND
							stts_akun NOT LIKE '5' AND
							stts_akun NOT LIKE '6' $wheredivisi
		";
		$querya	=mysqli_query($koneksi,$sqla);
		while($dataa	=mysqli_fetch_array($querya)){
			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}

		$sql	  ="SELECT * FROM schm WHERE id_akun=$dataa[0] ORDER BY id ASC";
		$query	=mysqli_query($koneksi,$sql);
		$data		=mysqli_fetch_array($query);

		$sqldv	  ="SELECT * FROM divisi where id=$dataa[8]";
		$querydv	=mysqli_query($koneksi,$sqldv);
		$datadv		=mysqli_fetch_array($querydv);
	?>

	<tr class="hover" bgcolor="<?php echo $warna ?>">
		<td><?php echo "$no"; ?>.</td>
		<td><?php echo "$dataa[1]"; ?></td>
		<td><?php echo "$dataa[2]"; ?></td>
		<td><?php echo "$datadv[1]"; ?></td>
		<td align="right">
			<?php
				$rupiah1=number_format($data[1],0,',','.');
				echo "$rupiah1";
			?>
		</td>
		<td align="right">
			<?php
				$rupiah2=number_format($data[2],0,',','.');
				echo "$rupiah2";
			?>
		</td>
		<td align="right">
			<?php
				$rupiah3=number_format($data[3],0,',','.');
				echo "$rupiah3";
			?>
		</td>
		<td><?php echo "$data[4]"; ?></td>
		<td><?php echo "$data[5]"; ?></td>
		<td><?php echo "$data[6]"; ?></td>


		<td align="center">
			<?php if ($akses=='default' OR $akses=='superuser' OR $akses=='admin' OR $akses=='sekertaris' OR $akses=='akunting') { ?>
			<a href="?Edit-Simpanan&&header=<?php echo "Simpanan" ?>&&ids=<?php echo "$data[0]" ?>&&kda=<?php echo "$dataa[1]" ?>&&nm=<?php echo "$dataa[2]" ?>&&sp=<?php echo "$data[1]" ?>&&sw=<?php echo "$data[2]" ?>&&sr=<?php echo "$data[3]" ?>&&nabank=<?php echo "$data[4]" ?>&&norek=<?php echo "$data[5]" ?>&&perek=<?php echo "$data[6]" ?>">Edit</a> |
			<a href="?Detail-Simpanan&&header=<?php echo "Simpanan" ?>&&kode=<?php echo "$data[0]" ?>&&kodea=<?php echo "$dataa[1]"?>&&namaa=<?php echo "$dataa[2]"?>">Detail</a>
		<?php }elseif($akses=='kredit'){ ?>
			<a href="?Edit-Simpanan&&header=<?php echo "Simpanan" ?>&&ids=<?php echo "$data[0]" ?>&&kda=<?php echo "$dataa[1]" ?>&&nm=<?php echo "$dataa[2]" ?>&&sp=<?php echo "$data[1]" ?>&&sw=<?php echo "$data[2]" ?>&&sr=<?php echo "$data[3]" ?>&&nabank=<?php echo "$data[4]" ?>&&norek=<?php echo "$data[5]" ?>&&perek=<?php echo "$data[6]" ?>">Edit</a>
		<?php }else{ ?>
			<a href="?Detail-Simpanan&&header=<?php echo "Simpanan" ?>&&kode=<?php echo "$data[0]" ?>&&kodea=<?php echo "$dataa[1]"?>&&namaa=<?php echo "$dataa[2]"?>">Detail</a>
		<?php } ?>
		</td>

	</tr>

	<?php
		$no++;};
	?>

</table>
</form>
