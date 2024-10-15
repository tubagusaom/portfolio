<form class="" action="" method="post">
<table>
	<tr>
		<td colspan="7"><h1>Data Account GL</h1></td>
	</tr>
	<tr>
		<td colspan="2">
			<?php
				if (isset($_POST['submit'])) {
					if ($_POST['search']=='') {
						echo "";
					}
					else{
						echo "Pencarian berdasarkan kode account master <b>$_POST[search]</b>";
					}
				}
			?>
		</td>

		<td colspan="5">
			<button type="submit" name="submit" class="cari">
				<i class="fa fa-search"></i>
			</button>
			<input type="number" name="search" placeholder="Kode Account Master" class="acount">
		</td>
	</tr>

	<tr>
		<th>No</th>
		<th>Kode Account</th>
		<th>Nama Account</th>
		<th>Jenis Account</th>
		<th>Type Account</th>
		<th align="center" width="10%">-</th>
	</tr>

	<?php
		if (isset($_POST['submit'])) {
			$cari=$_POST['search'];
		}else {
			$cari='';
		}

		$no		  =1;
		$sql	  ="SELECT `id`, `kd_acount`, `desc_acount`, `jenis_acount`, `type_acount`, `stts_acount`, `c_acount` FROM acount WHERE kd_acount LIKE '%$cari%' AND stts_acount NOT LIKE '3' AND type_acount = 'M' ORDER BY kd_acount ASC";
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
		<td style="font-weight:700">
			<?php

			echo "$data[1]";
			?>
		</td>

		<td style="font-weight:700"><?php echo "$data[2]"; ?></td>
		<td style="font-weight:700">
			<?php
			if ($data[3]=="D") {
				echo "Debit";
			} else {
				echo "Kredit";
			}?>
		</td>
		<td style="font-weight:700">
			<?php
			if ($data[4]=="M") {
				echo "Master";
			} else {
				echo "Sub";
			}?>
		</td>
		<td align="center">
			<a href="?Edit-Account-Master&&header=<?php echo "Account" ?>&&id=<?php echo $data[0] ?>&&kode=<?php echo $data[1] ?>&&nama=<?php echo $data[2] ?>&&jenis=<?php echo $data[3] ?>&&type=<?php echo $data[4] ?>">Edit</a> |
			<a onclick="return confirm('apakah anda yakin')" href="?Hapus-Account-Master&&id=<?php echo "$data[0]" ?>&&type=<?php echo "$data[1]" ?>">Hapus</a>
		</td>
	</tr>

	<?php
		$sql_sub	  ="SELECT `id`, `kd_acount`, `desc_acount`, `jenis_acount`, `type_acount`, `stts_acount`, `c_acount` FROM acount WHERE stts_acount NOT LIKE '3' AND type_acount = '$data[1]' ORDER BY id ASC";
		$query_sub	=mysqli_query($koneksi,$sql_sub);
		while($data_sub=mysqli_fetch_array($query_sub))
		{$no++;
			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}
	?>

		<tr class="hover" bgcolor="<?php echo $warna ?>">
			<td><?php echo $no; ?>.</td>
			<td style="padding-left:10px">-
				<?php
					echo "$data_sub[1]";
				?>
			</td>

			<td style="padding-left:10px">- <?php echo "$data_sub[2]"; ?></td>
			<td style="padding-left:10px">-
				<?php
				if ($data_sub[3]=="D") {
					echo "Debit";
				} else {
					echo "Kredit";
				}?>
			</td>
			<td style="padding-left:10px">- <?php echo "Sub"; ?></td>
			<td align="center">
				<a href="?Edit-Account-Sub&&header=<?php echo "Account" ?>&&id=<?php echo $data_sub[0] ?>&&kode=<?php echo $data_sub[1] ?>&&nama=<?php echo $data_sub[2] ?>&&jenis=<?php echo $data_sub[3] ?>&&type=<?php echo $data_sub[4] ?>">Edit</a> |
				<a onclick="return confirm('apakah anda yakin')" href="?Hapus-Account-Sub&&id=<?php echo "$data_sub[0]" ?>">Hapus</a>
			</td>
		</tr>

	<?php
	}
		$no++;};
	?>

</table>
</form>
