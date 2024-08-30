<form class="" action="" method="post">
<table>
	<tr>
		<td colspan="3"><h1>Data Department</h1></td>
	</tr>

	<tr>
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

	<tr align="center">
		<th>No</th>
		<th>Nama Department</th>
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
		$sql	  ="SELECT * FROM dept WHERE nm_dept LIKE '%$cari%' AND stts_dept NOT LIKE '3' ORDER BY id ASC";
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
			<a href="?Edit-Department&&header=<?php echo "Departmen" ?>&&id=<?php echo "$data[0]" ?>&&dept=<?php echo "$data[1]" ?>">Edit</a> |
			<a onclick="return confirm('apakah anda yakin')" href="?Hapus-Department&&id=<?php echo "$data[0]" ?>">Hapus</a>
		</td>
		<?php }else {echo "";} ?>
	</tr>

	<?php
		$no++;};
	?>

</table>
</form>
