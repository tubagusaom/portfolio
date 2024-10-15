<form class="" action="" method="post">
<table>
	<tr>
		<td colspan="4"><h1>Data Divisi</h1></td>
	</tr>

	<tr>
		<td colspan="4">
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
			<input type="text" name="search" placeholder="Nama Divisi" class="acount">
		</td>
	</tr>

	<tr align="center">
		<th>No</th>
		<th>Nama Divisi</th>
		<th>Company</th>
		<?php if ($akses=='default' OR $akses=='superuser' OR $akses=='ketua') { ?>
		<th width="10%">-</th>
		<?php }else {echo "";} ?>
	</tr>

	<?php
		if (isset($_POST['submit'])) {
			$cari=$_POST['search'];
		}else {
			$cari='';
		}

		$no		  =1;
		$sql	  ="SELECT * FROM divisi WHERE nm_divisi LIKE '%$cari%' AND stts_divisi NOT LIKE '3' ORDER BY id ASC";
		$query	=mysqli_query($koneksi,$sql);
		while($data=mysqli_fetch_array($query))
		{
			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}

			$sqlc	  ="SELECT * FROM company where id=$data[4]";
			$queryc	=mysqli_query($koneksi,$sqlc);
			$datac	=mysqli_fetch_array($queryc);
	?>

	<tr class="hover" bgcolor="<?php echo $warna ?>">
		<td style="text-align: center"><?php echo $no; ?>.</td>
		<td><?php echo "$data[1]"; ?></td>
		<td><?php echo "$datac[1]"; ?></td>
		<?php if ($akses=='default' OR $akses=='superuser' OR $akses=='ketua') { ?>
		<td align="center">
			<a href="?Edit-Divisi&&header=<?php echo "Divisi" ?>&&id=<?php echo "$data[0]" ?>&&divisi=<?php echo "$data[1]" ?>&&comp=<?php echo "$datac[1]" ?>">Edit</a> |
			<a onclick="return confirm('apakah anda yakin')" href="?Hapus-Divisi&&id=<?php echo "$data[0]" ?>">Hapus</a>
		</td>
		<?php }else {echo "";} ?>
	</tr>

	<?php
		$no++;};
	?>

</table>
</form>
