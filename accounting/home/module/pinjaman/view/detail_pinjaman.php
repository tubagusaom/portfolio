<table>
	<tr>
		<td colspan="5"><h1>Detail Pinjaman Anggota</h1></td>
	</tr>
	<tr>
		<th style="width:20%">Kode Anggota</th>
		<td colspan="3"><?php echo $_GET['kodea']; ?></td>
	</tr>
	<tr>
		<th style="width:20%">Nama</th>
		<td colspan="3"><?php echo $_GET['namaa']; ?></td>
	</tr>
	<tr>
		<th>Total Pinjaman</th>
		<td colspan="3">
			<?php
				$x=$_GET['jp'];
				$y=$_GET['angsur'];
				$z=$_GET['jasa'];
				echo "Rp. "; echo number_format($_GET['jp'],0,',','.');
			?>
		</td>
	</tr>
	<tr>
		<th>Total Jasa Koperasi[xx]</th>
		<td colspan="3"><?php echo "Rp. "; echo $cijas=number_format((($x*$z)/100),0,',','.'); ?></td>
	</tr>
	<tr>
		<th>Jangka Waktu</th>
		<td colspan="3"><?php echo $_GET['angsur']; ?> Bulan</td>
	</tr>
	<tr>
		<th>Cicilan Perbulan</th>
		<td bgcolor="whitesmoke" align="center" colspan="2"><b>Pokok</b></td>
		<td bgcolor="whitesmoke" align="center" colspan="2"><b>Jasa Koprasi</b></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="center" colspan="2">
			<?php
				$cipok=$x/$y;
				echo "Rp."; echo number_format($cipok,0,',','.');
			?>
		</td>
		<td align="center" colspan="2">
			<?php
				$cijas=(($x*$z)/100)/$y;
				echo "Rp."; echo number_format($cijas,0,',','.');
			?>
		</td>
	</tr>
	<tr>
		<th>Sisa Pinjaman</th>
		<td bgcolor="whitesmoke" align="center"><b>Bulan</b></td>
		<td bgcolor="whitesmoke" align="center"><b>Pokok</b></td>
		<td bgcolor="whitesmoke" align="center"><b>Jasa</b></td>
		<td bgcolor="whitesmoke" align="center"><b style="color:darkblue">Total</b></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<?php
			$kodepinjam=$_GET['kode'];
			$keteranganpinjam=$_GET['ketpinjam'];
			$sqlx	  ="SELECT id,angsur_pinjam,jenis_pinjam,schm_jasa FROM trans_pinjam WHERE id_pinjam='$kodepinjam' ORDER BY id DESC";
			$queryx	=mysqli_query($koneksi,$sqlx);
			$datax	=mysqli_fetch_array($queryx);

			$sisabulan=$_GET['angsur']-$datax[1];

			if ($sisabulan==0) {
		?>

		<td colspan="4" align="center"><b style="color:darkblue">
			<?php
				if ($keteranganpinjam==2) {
					echo "<h2>PROSES PELUNASAN</h2>";
				}elseif ($keteranganpinjam==3 OR $keteranganpinjam==4) {
					echo "<h2>LUNAS</h2>";
				}
			?>
		</b></td>

		<?php }else{ ?>

		<td align="center">
			<?php echo "$sisabulan"; ?> Bln
		</td>
		<td align="center">
			<?php
				$ebe=$cipok*$sisabulan;
				echo "Rp."; echo number_format($ebe,0,',','.');
			?>
		</td>
		<td align="center">
			<?php
				$aom=$cijas*$sisabulan;
				echo "Rp."; echo number_format($aom,0,',','.');
			?>
		</td>
		<td align="center">
			<b>
				<?php
					$sisatotal=$ebe+$aom;
					echo "Rp."; echo number_format($sisatotal,0,',','.');
				?>
			</b>
		</td>

		<?php } ?>
	</tr>
</table>
<br>
<!-- ////////////////////////////////////////////////////////////////////////////////////// -->

<!-- //////////////////////////////////////////////////////////////////////////////// -->
<?php
	if (isset($_GET['xxx'])=='pelunasann') {
?>

<script language="JavaScript" type="text/javascript">
    function checkform ( form )
    {
			if (form.tape.value == "") {
        alert( "Tentukan Tanggal Pelunasan.!!" );
        form.tape.focus();
        return false ;
      }
      return true ;
    }
</script>

<form class="" action="?Proses-Pelunasan" method="post" onsubmit="return checkform(this);">
<table>

	<tr>
		<td colspan="6"><h1>Pelunasan</h1></td>
	</tr>

	<?php if ($datax[2]=="pelunasan") { ?>

	<tr>
		<td><b>LOADING...</b></td>
	</tr>

<?php }else { ?>

	<tr align="center">
		<th>-</th>
		<th>Sisa Angsuran Pokok</th>
		<th>Sisa Jasa Koprasi</th>
		<th>Total</th>
		<th>Tanggal Pelunasan</th>
	</tr>

	<tr class="hover" align="center">
		<td>1</td>
    <td>
			<input type="hidden" name="ta" value="<?php echo $_GET['angsur']; ?>">
			<input type="hidden" name="kp" value="<?php echo $kodepinjam; ?>">
			<?php
				echo "Rp."; echo number_format($ebe,0,',','.');
			?>
		</td>
		<td>
			<?php
				echo "Rp."; echo number_format($aom,0,',','.');
			?>
		</td>
		<td>
			<b>
				<?php
					$tpp=$ebe+$aom;
					echo number_format($tpp,0,',','.');
				?>
			</b>
		</td>
		<td><input type="date" name="tape" value="" placeholder="format Thn-Bln-Tgl ( Contoh:2017-08-17 )"></td>
	</tr>
	<tr>
		<td colspan="6" style="border-top:2px solid #999">
			<input type="submit" name="" value="Pelunasan" onclick="return confirm('Apakah sisa pinjaman <?php echo $_GET['namaa'] ?> akan dilunasi ???')">
		</td>
	</tr>

	<?php } ?>

</table>
<br>
</form>

<?php }else{echo "";} ?>
<!-- //////////////////////////////////////////////////////////////////////////////// -->


<table>
	<tr>
		<td colspan="8"><h1>Detail Angsuran Pinjaman</h1></td>
	</tr>
	<tr align="center">
		<th>No</th>
		<th>Jenis</th>
		<th>Angsuran ke</th>
		<th>Tanggal Transfer</th>
		<th>Angsuran Pokok</th>
		<th>Jasa Koprasi</th>
		<th>Total</th>
	</tr>

	<?php
		$no		  =1;
    $sa			=0;
    $sb			=0;
    $sc			=0;

		$sql	  ="SELECT * FROM trans_pinjam WHERE id_pinjam='$kodepinjam' AND jenis_pinjam='angsuran' ORDER BY id ASC";
		$query	=mysqli_query($koneksi,$sql);
		while($data=mysqli_fetch_array($query))
		{
			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}

      $sqla	  ="SELECT * FROM pinjam WHERE id='$data[5]' ORDER BY id ASC";
  		$querya	=mysqli_query($koneksi,$sqla);
      $dataa  =mysqli_fetch_array($querya);
	?>

	<tr class="hover" bgcolor="<?php echo $warna ?>">
		<td><?php echo "$no"; ?>.</td>
		<td><?php echo "$data[2]"; ?></td>
		<td><?php echo "$data[1]"; ?></td>
		<td><?php echo "$data[3]"; ?></td>
		<td align="right">
			<?php
        $cicilan=$dataa[1]/$dataa[7];
				$rupiah1=number_format($cicilan,0,',','.');
				echo "$rupiah1";
			?>
      <input type="hidden" name="" value="<?php echo $acuana=$cicilan; ?>">
      <?php $sa += $acuana; ?>
		</td>
		<td align="right">
			<?php
			// $jasa=(($dataa[1]*$dataa[8])/100)/$dataa[7];
			// $rupiah2=number_format($jasa,0,',','.');
			// echo "$rupiah2";

			if ($data[6]==0) {
				$jasa=(($dataa[1]*$dataa[8])/100)/$dataa[7];
				$rupiah2=number_format($jasa,0,',','.');
				echo "$rupiah2";
			}else {
				$jasa=(($dataa[1]*$data[6])/100)/$dataa[7];
				$rupiah2=number_format($jasa,0,',','.');
				echo "$rupiah2";
			}
			?>
      <input type="hidden" name="" value="<?php echo $acuanb=$jasa; ?>">
      <?php $sb += $acuanb; ?>
		</td>
		<td align="right">
      <input type="hidden" name="" value="<?php echo $acuanc=$cicilan+$jasa; ?>">
      <b>
			<?php
				$total=$cicilan+$jasa;
				echo number_format($total,0,',','.');

				$sc += $acuanc;
			?>
      </b>
    </td>
	</tr>

	<?php
		$no++;};
	?>

<!-- //////////////////////////////////////////////////////////////////////////////// -->
	<?php
		$sqltpd	  ="SELECT * FROM trans_pinjam WHERE id_pinjam='$kodepinjam' AND jenis_pinjam NOT LIKE 'angsuran' AND jenis_pinjam NOT LIKE 'proses' ORDER BY id DESC";
		$querytpd	=mysqli_query($koneksi,$sqltpd);
		$datatpd	=mysqli_fetch_array($querytpd);

		if (isset($datatpd)) {
	?>
	<tr class="hover">
		<td><?php echo $no++; ?></td>
		<td><?php echo $datatpd[2]; ?></td>
		<td>
			<?php echo $datatpd[1]; ?>
			<?php $tsa=$_GET['angsur']-$datatpd[1]; ?>
		</td>
		<td><?php echo $datatpd[3]; ?></td>
    <td align="right">
			<?php
				$p1=$_GET['jp']-$sa;
				echo number_format($p1,0,',','.');
			?>
		</td>
		<td align="right">
			<?php
				$p2=(($_GET['jp']*$_GET['jasa'])/100)-$sb;
				echo number_format($p2,0,',','.');
			?>
		</td>
		<td align="right">
			<i><b>
				<?php
					$p3=$p1+$p2;
					echo number_format($p3,0,',','.');
				?>
			</b></i>
		</td>
	</tr>
	<?php }else{echo "";} ?>
<!-- //////////////////////////////////////////////////////////////////////////////// -->


<!-- //////////////////////////////////////////////////////////////////////////////// -->
	<?php if (isset($datatpd)) { ?>
  <tr align="right" bgcolor="whitesmoke" style="color:darkblue">
		<td colspan="4" align="left">
			<b>Total Keseluruhan :</b>
		</td>
    <td align="right">
      <b>
				<?php
					$rupiahh1=number_format($sa+$p1,0,',','.');
					echo "$rupiahh1";
				?>
			</b>
    </td>
		<td align="right">
      <b>
				<?php
					$rupiahh2=number_format($sb+$p2,0,',','.');
					echo "$rupiahh2";
				?>
			</b>
    </td>
		<td align="right">
			<i><b>
				<?php
					$rupiahh3=number_format($sc+$p3,0,',','.');
					echo "$rupiahh3";
				?>
			</b></i>
		</td>
	</tr>
</table>
<?php }else { ?>
	<tr align="right" bgcolor="#ddd" style="color:darkblue">
		<td colspan="4" align="left">
			<b>Total Keseluruhan :</b>
		</td>
		<td align="right">
			<b>
				<?php
					$rupiahh1=number_format($sa,0,',','.');
					echo "$rupiahh1";
				?>
			</b>
		</td>
		<td align="right">
			<b>
				<?php
					$rupiahh2=number_format($sb,0,',','.');
					echo "$rupiahh2";
				?>
			</b>
		</td>
		<td align="right">
			<i><b>
				<?php
					$rupiahh3=number_format($sc,0,',','.');
					echo "$rupiahh3";
				?>
			</b></i>
		</td>
	</tr>
	</table>
<?php } ?>
<!-- //////////////////////////////////////////////////////////////////////////////// -->
