<form class="" action="" method="post">
<table>
	<tr>
		<td colspan="3"><h1>Data Lokasi</h1></td>
	</tr>

	<tr align="center">
		<td colspan="3">
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
			<input type="text" name="search" placeholder="Nama Department" class="acount">
		</td>
	</tr>

	<tr>
		<th>No</th>
		<th>Nama Lokasi</th>
		<?php if ($akses=='default' OR $akses=='superuser' OR $akses=='ketua') { ?>
		<th align="center" width="10%">-</th>
		<?php }else {echo "";} ?>
	</tr>

	<?php
		if (isset($_POST['submit'])) {
			$cari=$_POST['search'];
		}else {
			$cari='';
		}

		$no		  =1;
		$sql	  ="SELECT * FROM lokasi  WHERE nm_lokasi LIKE '%$cari%' AND stts_lokasi NOT LIKE '3' ORDER BY id ASC";
		$query	=mysqli_query($koneksi,$sql);
		while($data=mysqli_fetch_array($query))
		{
			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}
	?>

	<tr class="hover" bgcolor="<?php echo $warna ?>">
		<td><?php echo $no; ?>.</td>
		<td><?php echo "$data[1]"; ?></td>
		<?php if ($akses=='default' OR $akses=='superuser' OR $akses=='ketua') { ?>
		<td align="center">
			<a href="?Edit-Lokasi&&header=<?php echo "Lokasi" ?>&&id=<?php echo "$data[0]" ?>&&lokasi=<?php echo "$data[1]" ?>">Edit</a> |
			<a onclick="return confirm('apakah anda yakin')" href="?Hapus-Lokasi&&id=<?php echo "$data[0]" ?>">Hapus</a>
		</td>
		<?php }else {echo "";} ?>
	</tr>

	<?php
		$no++;};
	?>

</table>
</form>
