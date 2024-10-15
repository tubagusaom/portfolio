<!-- <form class="" action="" method="post"> -->

<?php
	$nos=1;
	$sshu=0;
	$sqlshu="SELECT * FROM shu
		WHERE
			periode_shu LIKE '%$cari%' AND
			id_schm = '$kodeschm'
		ORDER BY id DESC";

	$queryshu	=mysqli_query($koneksi,$sqlshu);


?>

<table>
	<tr>
		<td colspan="3"><h1> SHU</h1></td>
	</tr>
	<tr align="center">
		<th style="font-size:13px;">No</th>
		<th style="font-size:13px;">Periode</th>
		<th style="font-size:13px;">Jumlah SHU</th>
	</tr>
	<?php


		while($datashu=mysqli_fetch_array($queryshu)){
			if(fmod($nos,2)==1)
			{$warnas="ghostwhite";}
			else
			{$warnas="whitesmoke";}
	?>
	<tr class="hover" bgcolor="<?php echo $warnas ?>">
		<td align="center" style="font-size:13px;"><?php echo $nos; ?></td>
		<td align="right" style="font-size:13px;"><?php echo $datashu[2]; ?></td>
		<td align="right" style="font-size:13px;">
			<?php
				$rupiahshu=number_format($datashu[1],0,',','.');
				echo "$rupiahshu";
				$sshu += $datashu[1];
			?>
		</td>
	</tr>
	<?php
		$nos++;};
	?>
	<tr>
		<td colspan="3" align="right" style="font-size:13px;">
			<b style="color:darkblue">
			<?php
				$rupiahshu1=number_format($sshu,0,',','.');
				echo "$rupiahshu1";
			?>
		</b>
		</td>
	</tr>
</table>
<!-- </form> -->
