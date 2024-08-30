<?php
	if (isset($_GET['Export-SHU'])) {

	$periode=$_GET['periode'];
	 include "../../../model/config/master_koneksi.php";

	 header("Content-Type: application/xls");
	 header("Content-Disposition: attachment; filename=SHU-$periode.xls");
	 header("Pragma: no-cache");
	 header("Expires: 0");
?>

<table border="1">
	<tr>
		<th colspan="13" align="center">
			<b style="font-size:20px">DAFTAR SHU ANGGOTA "KOPERASI KARYAWAN OTSUKA BHAKTI" TAHUN <?php echo $periode; ?></b>
		</th>
	</tr>
	<tr>
		<th align="center" rowspan="2">No</th>
		<th align="center" rowspan="2" style="color:red">ID</th>
		<th align="center" rowspan="2">No Anggota</th>
		<th align="center" rowspan="2">Nama</th>
		<th align="center" rowspan="2">Tanggal Masuk</th>
		<th align="center" colspan="3">Simpanan Perbulan</th>
		<th align="center" colspan="3" style="background-color:#999">&nbsp; Saldo Simpanan Periode <?php echo $periode; ?> &nbsp;</th>
		<th align="center" rowspan="2" style="background-color:#999">&nbsp; Total Simpanan &nbsp;</th>
		<th align="center" rowspan="2">&nbsp; Total SHU &nbsp;</th>
	</tr>
	<tr>
		<th align="center">Pokok</th>
		<th align="center">Wajib</th>
		<th align="center">Sukarela</th>
		<th align="center" style="background-color:#999">Pokok</th>
		<th align="center" style="background-color:#999">Wajib</th>
		<th align="center" style="background-color:#999">Sukarela</th>
	</tr>

	<?php
		$no		  =1;
		$sql	  ="SELECT * FROM schm WHERE stts_schm NOT LIKE '3' AND stts_schm NOT LIKE '5' ORDER BY id ASC";
		$query	=mysqli_query($koneksi,$sql);
		while($data=mysqli_fetch_array($query))
		{
			$sqlx	  ="SELECT SUM(p_simpan) AS pokok, SUM(w_simpan) AS wajib, SUM(s_simpan) AS rela FROM `trans_simpan` WHERE YEAR(efv_simpan) <= $periode AND id_schm = '$data[0]'";
			$queryx	=mysqli_query($koneksi,$sqlx);
			$datax	=mysqli_fetch_array($queryx);

			$sqly	  ="SELECT id_schm, SUM(jumlah_ambil) AS ambil FROM `trans_ambil` WHERE YEAR(efv_ambil) <= $periode AND id_schm = '$data[0]' AND stts_ambil NOT LIKE '1'";
			$queryy	=mysqli_query($koneksi,$sqly);
			$datay=mysqli_fetch_array($queryy);

			// INI SHU
			$sqltshu	  ="SELECT SUM(value_shu) AS hasil FROM `shu` WHERE YEAR(periode_shu) <= $periode AND id_schm = '$data[0]'";
			$querytshu	=mysqli_query($koneksi,$sqltshu);
			$datatshu  =mysqli_fetch_array($querytshu);

			$sqla	  ="SELECT * FROM akun WHERE stts_akun NOT LIKE '3' AND id=$data[11]";
			$querya	=mysqli_query($koneksi,$sqla);
			$dataa	=mysqli_fetch_array($querya);
	?>

	<tr>
		<td align="center"><?php echo "$no"; ?></td>
		<td align="center" style="color:red"><?php echo "$data[0]"; ?></td>
		<td align="left"><?php echo $dataa[1]; ?></td>
		<td align="left"><?php echo $dataa[2]; ?></td>
		<td align="center">
			<?php
				$a=substr($data[7],8);
				$b=substr($data[7],5,2);
				$c=substr($data[7],0,4);

				echo "$a-$b-$c";
			?>
		</td>
		<td align="right">
			<?php
				$sx=$data[1];
					echo "$sx";
			?>
		</td>
		<td align="right">
			<?php
				$sy=$data[2];
					echo "$sy";
			?>
		</td>
		<td align="right">
			<?php
				$sz=$data[3];
					echo "$sz";
			?>
		</td>
		<td align="right" style="background-color:#ddd">
			<?php
				$sp=$datax[0];
					echo "$sp";
			?>
		</td>
		<td align="right" style="background-color:#ddd">
			<?php
				$sw=$datax[1]+$datatshu[0];
					echo "$sw";
			?>
		</td>
		<td align="right" style="background-color:#ddd">
			<?php
				$ss=($datax[2]-$datay[1]);
					echo "$ss";
			?>
		</td>
		<td align="right" style="background-color:#ddd">
			<?php
				$ts=$sp+$sw+$ss;
					echo "$ts";
			?>
		</td>
		<td align="right"></td>
	</tr>

	<?php
		$no++;};
	?>
</table>

<?php }elseif (!isset($_GET['Export-SHU'])) { ?>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<form action="" method="post">
<table>
	<tr>
		<td colspan="8"><h1>Export / Import Laporan Simpanan Anggota</h1></td>
	</tr>
	<tr>
		<td colspan="8">
			<?php if (isset($_POST['pencarian'])) { ?>

			<a href="?Laporan-Simpanan&&header=Simpanan">
				<input type="button" class="bback" name="import" value="Kembali">
			</a>

			<?php }else{ ?>

			<a href="?Import-SHU&&header=<?php echo "Simpanan" ?>">
				<input type="button" class="import" name="import" value="Import SHU">
			</a>

			<?php } ?>

			<select class="acount" name="search" style="float:left" required oninvalid="this.setCustomValidity('Tentukan Tahun Periode')" oninput="setCustomValidity('')">
				<option value="">Tahun Periode</option>
				<?php
					$d=thn_awal();
					while ($d<=thn_akhir())
					{
						echo"<option value='$d'> $d</option>";
						$d=$d+1;
					}
				?>
			</select>
			<button type="submit" name="pencarian" class="cari" style="float:left">
				<i class="fa fa-search"></i>
			</button>
		</td>
	</tr>
	</table>

	<?php if (isset($_POST['pencarian'])) { ?>

	<table>
	<tr>
		<td colspan="4">
			<h5 style="margin:0; padding:0; padding-left:6px">
				<b>Laporan simpanan periode <?php echo $periode=$_POST['search']  ?></b>
			</h5>
		</td>
		<td colspan="4">
			<a onclick="return confirm('Apakah laporan simpanan anggota periode <?php echo $periode ?> akan di EXPORT ?')" href="module/simpanan/view/laporan_simpanan.php?Export-SHU&&periode=<?php echo $periode ?>">
				<input type="button" class="export" name="export" value="Export Format SHU">
			</a>
		</td>
	</tr>

	<tr align="center">
		<th>No</th>
		<th>Kode Anggota</th>
		<th>Nama</th>
		<th width="10%">Tanggal Masuk</th>
		<th>Simpanan Pokok</th>
		<th>Simpanan Wajib</th>
		<th>Simpanan Sukarela</th>
		<th>Total Simpanan</th>
	</tr>

	<?php
		if (isset($_POST['pencarian'])) {
			$cari=$_POST['search'];
		}else {
			$cari='';
		}

		$no		  =1;
		$s1			=0;
		$s2			=0;
		$s3			=0;
		$s4			=0;

		$sql	  ="SELECT `id`, `efv_schm`, `id_akun` FROM schm WHERE stts_schm NOT LIKE '3' AND stts_schm NOT LIKE '5' ORDER BY id ASC";
		$query	=mysqli_query($koneksi,$sql);
		while($data=mysqli_fetch_array($query))
		{
			// INI SIMPAN
			$sqlx	  ="SELECT SUM(p_simpan) AS pokok, SUM(w_simpan) AS wajib, SUM(s_simpan) AS rela FROM `trans_simpan` WHERE YEAR(efv_simpan) <= $cari AND id_schm = '$data[0]'";
			$queryx	=mysqli_query($koneksi,$sqlx);
			$datax	=mysqli_fetch_array($queryx);

			// INI TARIK
			$sqly	  ="SELECT id_schm, SUM(jumlah_ambil) AS ambil FROM `trans_ambil` WHERE  YEAR(efv_ambil) <= $cari AND id_schm = '$data[0]' AND stts_ambil NOT LIKE '1'";
			$queryy	=mysqli_query($koneksi,$sqly);
			$datay=mysqli_fetch_array($queryy);

			// INI SHU
			$sqltshu	  ="SELECT SUM(value_shu) AS hasil FROM `shu` WHERE periode_shu LIKE '%$cari%' AND id_schm = '$data[0]'";
			$querytshu	=mysqli_query($koneksi,$sqltshu);
			$datatshu  =mysqli_fetch_array($querytshu);

			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}

			$sqla	  ="SELECT * FROM akun WHERE stts_akun NOT LIKE '3' AND id=$data[2]";
			$querya	=mysqli_query($koneksi,$sqla);
			$dataa	=mysqli_fetch_array($querya);

			// INI LAMA KEANGGOTAAN (BULAN)
			// $timeStart = strtotime($data[1]);
			// $timeEnd = strtotime($cari."-12-31");
			// Menambah bulan ini + semua bulan pada tahun sebelumnya
			// $numBulan = 1+(date("Y",$timeEnd)-date("Y",$timeStart))*12;
			// menghitung selisih bulan
			// $numBulan += date("m",$timeEnd)-date("m",$timeStart);
			//
			// $count=substr($numBulan,0,1);
			//
			// if ($count=='-') {
			// 	$keanggotaan=0;
			// }else {
			// 	$keanggotaan=$numBulan;
			// }
	?>

	<tr class="hover" bgcolor="<?php echo $warna ?>">
		<td><?php echo "$no"; ?>.</td>
		<td><?php echo "$dataa[1]"; ?></td>
		<td><?php echo "$dataa[2]"; ?></td>
		<td align="center">
			<?php
				$a=substr($data[1],8);
				$b=substr($data[1],5,2);
				$c=substr($data[1],0,4);

				echo "$a-$b-$c";
			?>
		</td>
		<td align="right">
			<?php
				$sp=$datax[0];
				$rupiah1=number_format($sp,0,',','.');
					echo "$rupiah1";

				$s1 += $sp;
			?>
		</td>
		<td align="right">
			<?php
				$sw=$datax[1]+$datatshu[0];
				$rupiah2=number_format($sw,0,',','.');
					echo "$rupiah2";

				$s2 += $sw;
			?>
		</td>
		<td align="right">
			<?php
				$ss=($datax[2]-$datay[1]);
				$rupiah3=number_format(($ss),0,',','.');
					echo "$rupiah3";

				$s3 += $ss;
			?>
		</td>
		<td align="right">
			<?php
				$ts=$sp+$sw+$ss;
				$rupiahh=number_format($ts,0,',','.');
					echo "$rupiahh";

				$s4 += $ts;
			?>
		</td>
	</tr>

	<?php
		$no++;};
	?>
	<tr align="center" bgcolor="#ddd">
		<td rowspan="1" colspan="4" align="left"><b>Total Keseluruhan :</b></td>
		<td rowspan="1" align="right">
			<b><?php echo $rupiah4=number_format($s1,0,',','.'); ?></b>
		</td>
		<td rowspan="1" align="right">
			<b><?php echo $rupiah5=number_format($s2,0,',','.'); ?></b>
		</td>
		<td rowspan="1" align="right">
			<b><?php echo $rupiah6=number_format($s3,0,',','.'); ?></b>
		</td>
		<td rowspan="1" align="right">
			<b><?php echo $rupiah7=number_format($s4,0,',','.'); ?></b>
		</td>
	</tr>
</table>
</form>

<?php
	}else{echo "";}
?>

<?php } ?>
