
<table>
	<tr>
		<td colspan="4"><h1>Data General</h1></td>
	</tr>

	<tr align="center">
		<th>No</th>
		<th>jenis</th>
		<th>Ketentuan</th>
		<?php if ($akses=='default' OR $akses=='superuser' OR $akses=='ketua'){ ?>
		<th align="center" width="5%">-</th>
		<?php } ?>
	</tr>

	<?php

		$no		  =1;
		$sql	  ="SELECT * FROM reff WHERE stts_reff NOT LIKE '3' ORDER BY id ASC";
		$query	=mysqli_query($koneksi,$sql);
		while($data=mysqli_fetch_array($query)){
			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}
	?>

	<tr class="hover" bgcolor="<?php echo $warna ?>">
		<td><?php echo $no; ?>.</td>
		<td><?php echo "$data[1]"; ?></td>
		<td>
			<?php
				echo "$data[2]";

				if ($data[1]=='jasa') {
					echo " %";
				}else {
					echo " Bln";
				}
			?>
		</td>

		<?php if ($akses=='default' OR $akses=='superuser' OR $akses=='ketua'){ ?>
		<td align="center">
			<a href="?Edit-Refferensi&&header=<?php echo "Konfigurasi" ?>&&id=<?php echo "$data[0]" ?>&&jenis=<?php echo "$data[1]" ?>&&ketentuan=<?php echo "$data[2]" ?>">Edit</a>
		</td>
		<?php } ?>
	</tr>

	<?php
		$no++;};
	?>

</table>
