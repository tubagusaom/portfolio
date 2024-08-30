<?php
	$kodeschm=$_GET['kode'];
	$sqlv	  ="SELECT id_schm, SUM(p_simpan) AS pokok, SUM(w_simpan) AS wajib, SUM(s_simpan) AS rela FROM `trans_simpan` WHERE id_schm = '$kodeschm'";
	$queryv	=mysqli_query($koneksi,$sqlv);
	$datav  =mysqli_fetch_array($queryv);

	$sqlw	  ="SELECT SUM(jumlah_ambil) AS ambil FROM `trans_ambil` WHERE id_schm = '$kodeschm' AND stts_ambil NOT LIKE '1'";
	$queryw	=mysqli_query($koneksi,$sqlw);
	$dataw  =mysqli_fetch_array($queryw);

	$sqltshu	  ="SELECT SUM(value_shu) AS hasil FROM `shu` WHERE id_schm = '$kodeschm'";
	$querytshu	=mysqli_query($koneksi,$sqltshu);
	$datatshu  =mysqli_fetch_array($querytshu);
?>

<table>
	<tr>
		<td colspan="6"><h1>Detail Simpanan <?php echo $kn=$_GET['namaa']; ?></h1></td>
	</tr>
	<tr>
		<th style="width:20%">Kode Anggota</th>
		<td colspan="5"><?php echo $ka=$_GET['kodea']; ?></td>
	</tr>
	<tr>
		<th style="width:20%">Nama</th>
		<td colspan="5"><?php echo $kn=$_GET['namaa']; ?></td>
	</tr>
	<tr>
		<th>Total Simpanan</th>
		<td bgcolor="whitesmoke" align="center"><b>Simpanan Pokok</b></td>
		<td bgcolor="whitesmoke" align="center"><b>Simpanan Wajib</b></td>
		<td bgcolor="whitesmoke" align="center"><b>Simpanan Sukarela</b></td>
		<!-- <td bgcolor="whitesmoke" align="center"><b>Penarikan</b></td> -->
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>Rp.
			<?php
				$rupiahw=number_format($datav[1],0,',','.');
				echo "$rupiahw";
			?>
		</td>
		<td>Rp.
			<?php
				$rupiahx=number_format($datav[2]+$datatshu[0],0,',','.');
				echo "$rupiahx";
			?>
		</td>
		<td>Rp.
			<?php
				$rupiahy=number_format($datav[3],0,',','.');
				echo "$rupiahy";
			?>
		</td>
		<!-- <td>Rp. -->
			<?php
				// $rupiahz=number_format($dataw[0],0,',','.');
				// echo "$rupiahz";
			?>
		<!-- </td> -->
	</tr>
	<tr>
		<th style="width:20%">Sisa Simpanan</th>
		<td colspan="5" style="border-top:1px solid #999">
			<b>Rp.
				<?php
					$sisasimpanan=($datav[1]+$datav[2]+$datav[3]+$datatshu[0])-$dataw[0];
					$rupiahsisa=number_format($sisasimpanan,0,',','.');
					echo "$rupiahsisa";
				?>
			</b>
		</td>
	</tr>
</table>

<!-- //////////////////////////////////////////////////////////////////////////////// -->
<?php
	if (isset($_POST['tarik'])) {
		$sqly	  ="SELECT * FROM reff WHERE jenis_reff='penarikan'";
		$queryy	=mysqli_query($koneksi,$sqly);
		$datay	=mysqli_fetch_array($queryy);
?>
<form class="" action="?Penarikan" onSubmit="return validasi_tarik(this)"  method="post">
<table>

	<tr>
		<td colspan="5"><h1>Penarikan Simpanan Sukarela</h1></td>
	</tr>



	<?php
		$sqltpd1	  ="SELECT * FROM trans_ambil WHERE id_schm='$kodeschm' AND stts_ambil NOT LIKE '2' ORDER BY id DESC";
		$querytpd1	=mysqli_query($koneksi,$sqltpd1);
		$datatpd1		=mysqli_fetch_array($querytpd1);

		if (isset($datatpd1)) {
	?>

	<tr>
		<td colspan="5" align="center" style="color:red; font-size:14px;"><b>PENARIKAN SEBELUMNYA SEDANG DIPROSES , Tunggu Aprove !</b></td>
	</tr>

	<?php
		}else {
	?>

	<tr align="center">
		<th>-</th>
		<th>Simpanan sukarela ditahan (<?php echo "$datay[2]"; ?> Bln)</th>
		<th>Sisa simpanan sukarela yang dapat diambil</th>
		<th>Jumlah Penarikan</th>
		<th>Tanggal Penarikan</th>
	</tr>

	<tr align="center">
		<td>&nbsp;</td>
		<td>Rp.
			<?php
				$tahan=0;
				$sqlx	  ="SELECT s_simpan FROM trans_simpan WHERE id_schm='$kodeschm' ORDER BY id DESC LIMIT $datay[2]";
				$queryx	=mysqli_query($koneksi,$sqlx);
				while($datax	=mysqli_fetch_array($queryx)){
					$tahan +=$datax[0];
				}

				$ssrdt=number_format($tahan,0,',','.');
				echo "$ssrdt";
			?>
		</td>
    <td>Rp.
			<?php
				$tssp=($datav[3]-$dataw[0])-$tahan;
				$sssrrr=number_format($tssp,0,',','.');
				echo $sssrrr;
			?>
			<input type="hidden" name="ssr" value="<?php echo "$tssp" ?>" id="pw1">
			<input type="hidden" name="kode" value="<?php echo "$kodeschm" ?>">
			<input type="hidden" name="kodea" value="<?php echo "$ka" ?>">
			<input type="hidden" name="namaa" value="<?php echo "$kn" ?>">
		</td>
		<td>
			<input type="text" name="jumpen" value="" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
		</td>
		<td><input type="date" name="tglp" value="" placeholder="Exp: Thn-Bln-Tgl (1945-08-17)"></td>
	</tr>
	<tr>
		<td colspan="5" style="border-top:2px solid #999">
			<input type="submit" name="prosss" value="Proses">
		</td>
	</tr>

	<?php } ?>

</table>
</form>

<?php }else{echo "";} ?>
<!-- //////////////////////////////////////////////////////////////////////////////// -->

<form class="" action="" method="post">
<table>
	<tr>
		<td colspan="9" style="border-top:1px solid #999">
			<?php
				if (isset($_POST['pencarian'])) {
					if ($_POST['search']=='') {
						echo "";
					}
					else{
						echo "Filter data berdasarkan tahun <b>$_POST[search]</b>";
					}
				}
			?>
			<button type="submit" name="pencarian" class="cari">
				<i class="fa fa-search"></i>
			</button>
			<select class="acount" name="search">
				<option value="">Filter berdasarkan Tahun</option>
				<?php
					$d=thn_awal();
					while ($d<=thn_akhir())
					{
						echo"<option value='$d'> $d</option>";
						$d=$d+1;
					}
				?>
			</select>
		</td>
	</tr>

	<tr align="center">
		<th>No</th>
		<th>Jenis</th>
		<th>Tahun</th>
		<th>Simpanan Pokok</th>
		<th>Simpanan Wajib</th>
		<th>Simpanan Sukarela</th>
		<th>Total</th>
	</tr>

	<?php
		if (isset($_POST['pencarian'])) {
			$cari=$_POST['search'];
		}else {
			$cari='';
		}

    $kodeschm=$_GET['kode'];
		$no		  =1;

		$sql	  ="SELECT id_schm, SUM(p_simpan) AS pokok, SUM(w_simpan) AS wajib, SUM(s_simpan) AS rela, YEAR(efv_simpan) AS tahun FROM `trans_simpan` WHERE efv_simpan LIKE '%$cari%' AND id_schm='$kodeschm' AND stts_simpan NOT LIKE '3' GROUP BY YEAR(efv_simpan) ORDER BY YEAR(efv_simpan) DESC";
		$query	=mysqli_query($koneksi,$sql);
		while($data=mysqli_fetch_array($query))
		{
			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}

			$sqltshu1	  ="SELECT SUM(value_shu) AS SHU1 FROM `shu` WHERE id_schm = '$data[0]' AND periode_shu = '$data[tahun]'";
			$querytshu1	=mysqli_query($koneksi,$sqltshu1);
			$datatshu1  =mysqli_fetch_array($querytshu1);
	?>

	<tr class="hover" bgcolor="<?php echo $warna ?>">
		<td><?php echo "$no"; ?>.</td>
		<td>Simpanan</td>
		<td><?php echo "$data[tahun]"; ?></td>
		<td align="right">
			<?php
				$rupiah1=number_format($data['pokok'],0,',','.');
				echo "$rupiah1";
			?>
		</td>
		<td align="right">
			<?php
				$rupiah2=number_format($data['wajib']+$datatshu1['SHU1'],0,',','.');
				echo "$rupiah2";
			?>
		</td>
		<td align="right">
			<?php
				$rupiah3=number_format($data['rela'],0,',','.');
				echo "$rupiah3";
			?>
		</td>
		<td align="right">
      <b>
			<?php
				$total=$data['pokok']+$data['wajib']+$data['rela']+$datatshu1['SHU1'];
				echo number_format($total,0,',','.');
			?>
      </b>
    </td>
	</tr>

	<?php
		$no++;};
	?>

</table>
</form>

<!-- //////////////////////////////////////////////////////////////////////////////// -->
<?php
	if ($akses=='default' OR $akses=='superuser' OR $akses=='ketua') {
?>
<br>
<form class="" action="" method="post">
<table>
	<tr>
		<td colspan="3"><h1>Detail SHU <?php echo $kn=$_GET['namaa']; ?></h1></td>
	</tr>
	<tr align="center">
		<th>No</th>
		<th>Periode</th>
		<th>Jumlah SHU</th>
	</tr>
	<?php
		$nos=1;
		$sshu=0;
		$sqlshu="SELECT * FROM shu
			WHERE
				periode_shu LIKE '%$cari%' AND
				id_schm = '$kodeschm'
			ORDER BY id DESC";

		$queryshu	=mysqli_query($koneksi,$sqlshu);

		while($datashu=mysqli_fetch_array($queryshu)){
			if(fmod($nos,2)==1)
			{$warnas="ghostwhite";}
			else
			{$warnas="whitesmoke";}
	?>
	<tr class="hover" bgcolor="<?php echo $warnas ?>">
		<td><?php echo $nos; ?></td>
		<td align="right"><?php echo $datashu[2]; ?></td>
		<td align="right">
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
		<td colspan="3" align="right">
			<b style="color:darkblue">
			<?php
				$rupiahshu1=number_format($sshu,0,',','.');
				echo "$rupiahshu1";
			?>
			</b>
		</td>
	</tr>
</table>
</form>
<?php
	}else {echo "";}
?>
<!-- //////////////////////////////////////////////////////////////////////////////// -->

<!-- //////////////////////////////////////////////////////////////////////////////// -->
<br>
<form class="" action="" method="post">
<table>
	<tr>
		<td colspan="5"><h1>Detail Penarikan <?php echo $kn=$_GET['namaa']; ?></h1></td>
	</tr>

	<?php if ($akses=='default' OR $akses=='superuser' OR $akses=='admin' OR $akses=='sekertaris') { ?>
	<td colspan="5">
		<input type="submit" name="tarik" value="Penarikan">
	</td>
	<?php }else{echo "";} ?>

	<tr align="center">
		<th>No</th>
		<th>Jenis</th>
		<th>Tanggal Penarikan</th>
		<th>Jumlah Penarikan</th>
		<!-- <th>Status</th> -->
	</tr>
	<?php
		$nob=1;
		$sc	=0;
		$sqltpd	  ="SELECT * FROM trans_ambil
			WHERE efv_ambil LIKE '%$cari%' AND
						id_schm='$kodeschm'
						AND stts_ambil NOT LIKE '1' AND
						stts_ambil NOT LIKE '3'
			ORDER BY id DESC";

		$querytpd	=mysqli_query($koneksi,$sqltpd);
		while($datatpd=mysqli_fetch_array($querytpd)){
			if(fmod($nob,2)==1)
			{$warnaa="ghostwhite";}
			else
			{$warnaa="whitesmoke";}
	?>
	<tr class="hover" bgcolor="<?php echo $warnaa ?>">
		<td><?php echo $nob; ?></td>
		<td>Penarikan</td>
		<td>
			<?php echo tgl_indo($datatpd[3]); ?>
		</td>
		<td align="right">
		<input type="hidden" name="" value="<?php echo $acuantotall=$datatpd[1]; ?>">
			<?php
				$p1=$datatpd[1];
				echo number_format($p1,0,',','.');

				$sc += $acuantotall;
			?>
		</td>
		<!-- <td align="center"> -->
			<?php
				// $statusambil = $datatpd[2];
				//
				// $ar_status = array(
				// 	'' => "",
				// 	'2' => "Disetujui",
				// 	'3' => "Ditinjau"
				// );
				//
				// echo $ar_status[$statusambil];
			?>
		<!-- </td> -->
	</tr>
	<?php
		$nob++;};
	?>
	<tr>
		<td colspan="4" align="right">
			<b style="color:darkblue">
				<?php
					$rupiahh=number_format($sc,0,',','.');
					echo "$rupiahh";
				?>
			</b>
		</td>
	</tr>
</table>
</form>
<!-- //////////////////////////////////////////////////////////////////////////////// -->

<script type="text/javascript">
	function validasi_tarik( form ){
		if (form.jumpen.value == "") {
			alert( "Silahkan Masukan Jumlah Penarikan.!!" );
			form.jumpen.focus();
			return false ;
		}
		else if (form.tglp.value == "") {
			alert( "Tentukan Tanggal Penarikan.!!" );
			form.tglp.focus();
			return false ;
		}
  }
</script>
