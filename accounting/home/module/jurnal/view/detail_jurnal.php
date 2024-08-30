<?php
	if (isset($_GET['Export-JURNAL'])) {

	$awal=$_GET['tglawal'];
	$akhir=$_GET['tglakhir'];
	$a=substr($awal,8);
	$b=substr($awal,5,2);
	$c=substr($awal,0,4);
	$d=substr($akhir,8);
	$e=substr($akhir,5,2);
	$f=substr($akhir,0,4);
	 include "../../../model/config/master_koneksi.php";

	 header("Content-Type: application/xls");
	 header("Content-Disposition: attachment; filename=JURNAL-tgl-$a-$b-$c-s/d-$d-$e-$f.xls");
	 header("Pragma: no-cache");
	 header("Expires: 0");
?>

<table border="1">
	<tr>
		<th colspan="8" align="center">
			<b style="font-size:20px">JURNAL</b>
		</th>
	</tr>
	<tr>
		<th colspan="8" align="left">
			<b style="font-size:12px">Per Tgl <?php echo "$a-$b-$c"; ?> s/d <?php echo "$d-$e-$f"; ?></b>
		</th>
	</tr>
	<tr>
		<th align="center" rowspan="2">No</th>
		<th align="center" rowspan="2">Inisial</th>
		<th align="center" rowspan="2">Account</th>
		<th align="center" rowspan="2">Kode Reff.</th>
		<th align="center" rowspan="2">Keterangan</th>
		<th align="center" rowspan="2">Actual Date</th>
		<th align="center" colspan="2">Value Rp.</th>
	</tr>
	<tr>
		<th align="center">D</th>
		<th align="center">K</th>
	</tr>

	<?php
		$no =1;
		$d=0;
		$k=0;
		$sql	  ="SELECT `id`, `init_trans`, `saldo_trans`, `jenis_trans`, `reff_trans`, `ket_trans`, `efv_trans`, `id_schema`, `kd_acount`, `stts_trans`, `c_trans`, `id_akun` FROM trans WHERE efv_trans BETWEEN '$awal' and '$akhir' AND stts_trans NOT LIKE '3' ORDER BY id DESC";
		$query	=mysqli_query($koneksi,$sql);
		while($data=mysqli_fetch_array($query))
		{
	?>

	<tr>
		<td><?php echo $no; ?>.</td>
		<td><?php echo "$data[1]"; ?></td>
		<td>
			<?php
				$sqla	  ="SELECT `id`, `kd_acount`, `desc_acount`, `jenis_acount`, `type_acount`, `stts_acount`, `c_acount` FROM acount WHERE kd_acount='$data[8]'";
				$querya	=mysqli_query($koneksi,$sqla);
				$dataa	=mysqli_fetch_array($querya);

				echo "$data[8]";
				echo " - ";
				echo "$dataa[2]";
			?>
		</td>
		<td><?php echo "$data[4]"; ?></td>
		<td><?php echo "$data[5]"; ?></td>
		<td>
			<?php
				$a=substr($data[6],8);
				$b=substr($data[6],5,2);
				$c=substr($data[6],0,4);

				echo "$a-$b-$c";
			?>
		</td>
		<td align="right">
			<?php
				if ($data[3]=='D') {
					$debit=$data[2];
					echo $debit;

					$d += $debit;
				}else {
					echo "-";
				}
			?>
		</td>
		<td align="right">
			<?php
				if ($data[3]=='K') {
					$kredit=$data[2];
					echo $kredit;

					$k += $kredit;
				}else {
					echo "-";
				}
			?>
		</td>
	</tr>

	<?php
		$no++;};
	?>

	<tr>
		<td colspan="7" align="right" style="color:darkblue">
			<?php
				$rupiahdebit=$d;
				echo "$rupiahdebit";
			?>
		</td>
		<td align="right" style="color:darkblue">
			<?php
				$rupiahkredit=$k;
				echo "$rupiahkredit";
			?>
		</td>
	</tr>
</table>

<?php }elseif (!isset($_GET['Export-JURNAL'])) { ?>

<script language="JavaScript" type="text/javascript">
    function checkform ( form )
    {
			if (form.tgl1.value == "") {
        alert( "Tentukan Tgl Awal.!!" );
        form.tgl1.focus();
        return false ;
      }
			else if (form.tgl2.value == "") {
        alert( "Tentukan Tgl Akhir.!!" );
        form.tgl2.focus();
        return false ;
      }
      return true ;
    }
</script>

<form class="" action="" method="post" onsubmit="return checkform(this);">
<table>
	<tr>
		<td colspan="9"><h1>Data Transaksi Jurnal</h1></td>
	</tr>

	<tr>
		<td colspan="9">
			<?php
				if (isset($_POST['pencarian'])) {
					$tgl1=$_POST['tgl1'];
					$tgl2=$_POST['tgl2'];
				}else {
					$tgl1='2000-01-01';
					$tgl2='2050-12-30';
				}

				$sql	  ="SELECT `id`, `init_trans`, `saldo_trans`, `jenis_trans`, `reff_trans`, `ket_trans`, `efv_trans`, `id_schema`, `kd_acount`, `stts_trans`, `c_trans`, `id_akun` FROM trans WHERE efv_trans BETWEEN '$tgl1' and '$tgl2' AND stts_trans NOT LIKE '3' ORDER BY id DESC";
				$query	=mysqli_query($koneksi,$sql);
				$hitung = mysqli_num_rows($query);

				if (isset($_POST['pencarian'])) {
					if ($_POST['tgl1']=='' AND $_POST['tgl2']=='') {
						echo "";
					}
					else{
						$u=substr($_POST['tgl1'],8);
						$v=substr($_POST['tgl1'],5,2);
						$w=substr($_POST['tgl1'],0,4);
						$x=substr($_POST['tgl2'],8);
						$y=substr($_POST['tgl2'],5,2);
						$z=substr($_POST['tgl2'],0,4);
						echo "Filter data pertanggal <b style=color:red><u>$u-$v-$w</u></b> s/d <b style=color:darkblue><u>$x-$y-$z</u></b>";
					}
				}
			?>

			<?php
				if (isset($_POST['pencarian'])) {
					if ($akses=='default' OR $akses=='superuser' OR $akses=='akunting') {
						if ($hitung==0) {
							echo "";
						}else {
			?>

				<a onclick="return confirm('Apakah Data Transaksi Jurnal akan di EXPORT ?')" href="module/jurnal/view/detail_jurnal.php?Export-JURNAL&&tglawal=<?php echo $_POST['tgl1'] ?>&&tglakhir=<?php echo $_POST['tgl2'] ?>">
					<input type="button" class="import" name="export" value="Export">
				</a>

				<?php } ?>

				<a href="?Data-Jurnal&&header=Jurnal">
					<input type="button" class="bback" name="import" value="Kembali">
				</a>

			<?php
				}else{
			?>

				<a href="?Data-Jurnal&&header=Jurnal">
					<input type="button" class="bback" name="import" value="Kembali">
				</a>

			<?php
				}}else {
			?>

				<button type="submit" name="pencarian" class="cari">
					<i class="fa fa-search"></i>
				</button>
				<input type="date" name="tgl2" value="" class="acount" placeholder="Tanggal akhir ( Contoh:1945-08-17 )">
				<input type="date" name="tgl1" value="" class="acount" placeholder="tanggal awal ( Contoh:1945-08-17 )">

			<?php } ?>
		</td>
	</tr>

	<?php
		if (isset($_POST['pencarian'])) {
			if ($_POST['tgl1']=='' AND $_POST['tgl2']=='') {
				echo "";
			}
			else{
	?>

	<?php }} ?>

	<tr align="center">
		<th rowspan="2">No</th>
		<th rowspan="2" width="5%">Inisial</th>
		<th rowspan="2">Account</th>
		<th rowspan="2">Kode Reff.</th>
		<th rowspan="2">Keterangan</th>
		<th rowspan="2" width="8%">Actual Date</th>
		<th colspan="2">Value Rp.</th>
	</tr>
	<tr align="center">
		<th>D</th>
		<th>K</th>
	</tr>

	<?php
		$no=1;
		$d=0;
		$k=0;
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
		<td>
			<?php
				$sqla	  ="SELECT `id`, `kd_acount`, `desc_acount`, `jenis_acount`, `type_acount`, `stts_acount`, `c_acount` FROM acount WHERE kd_acount='$data[8]'";
				$querya	=mysqli_query($koneksi,$sqla);
				$dataa	=mysqli_fetch_array($querya);

				echo "$data[8]";
				echo " - ";
				echo "$dataa[2]";
			?>
		</td>
		<td><?php echo "$data[4]"; ?></td>
		<td><?php echo "$data[5]"; ?></td>
		<td>
			<?php
				$a=substr($data[6],8);
				$b=substr($data[6],5,2);
				$c=substr($data[6],0,4);

				echo "$a-$b-$c";
			?>
		</td>
		<td align="right" width="10%">
			<?php
				if ($data[3]=='D') {
					$debit=$data[2];
					echo number_format($debit,0,',','.');

					$d += $debit;
				}else {
					echo "-";
				}
			?>
		</td>
		<td align="right" width="10%">
			<?php
				if ($data[3]=='K') {
					$kredit=$data[2];
					echo number_format($kredit,0,',','.');

					$k += $kredit;
				}else {
					echo "-";
				}
			?>
		</td>
	</tr>

	<?php
		$no++;};
	?>

	<tr>
		<td colspan="7" align="right" style="color:darkblue">
			<?php
				$rupiahdebit=number_format($d,0,',','.');
				echo "$rupiahdebit";
			?>
		</td>
		<td align="right" style="color:darkblue">
			<?php
				$rupiahkredit=number_format($k,0,',','.');
				echo "$rupiahkredit";
			?>
		</td>
	</tr>

</table>
</form>

<?php } ?>
