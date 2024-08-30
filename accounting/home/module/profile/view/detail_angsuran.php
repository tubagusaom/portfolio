<?php
	if ($datapinjam['ket_pinjam'] == 1) {
?>

<table>
	<tr>
    <td colspan="5" style="width:100%;">
      <input type="submit" name="simpan" style="width:100%;font-size:18px;padding:8px 0 28px 0;" value="Pelunasan" style="width:100%;cursor:pointer;"  onclick="window.location='<?=base_url()?>?Profile-Pinjaman&&pelunasan=Lunas&&header=Profile';">
    </td>
  </tr>
</table>

<?php } ?>

<table style="margin-bottom:5px;">
	<tr>
		<td colspan="8"><h1>Detail Angsuran</h1></td>
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
    $idpin = $datapinjam['id'];

		// $sqlt_p	  ="SELECT
    //     trans_pinjam.id,
    //     trans_pinjam.angsur_pinjam,
    //     trans_pinjam.jenis_pinjam,
    //     trans_pinjam.efv_pinjam,
    //     trans_pinjam.c_pinjam,
    //     trans_pinjam.id_pinjam,
    //     trans_pinjam.schm_jasa
    //     -- pinjam.jumlah_pinjam,
    //     -- pinjam.keperluan_pinjam,
    //     -- pinjam.tgl_pinjam,
    //     -- pinjam.bank_pinjam,
    //     -- pinjam.norek_pinjam,
    //     -- pinjam.pemilik_pinjam,
    //     -- pinjam.jangka_pinjam,
    //     -- pinjam.jasa_pinjam,
    //     -- pinjam.ket_pinjam,
    //     -- pinjam.c_pinjam
    //
    //   FROM trans_pinjam a
    //   -- LEFT JOIN pinjam b ON b.id = a.id_pinjam
    //   WHERE trans_pinjam.id_pinjam=$idpin AND
    //         trans_pinjam.jenis_pinjam='angsuran'
    //   ORDER BY trans_pinjam.id ASC
    //   ";

    $sqlt_p	  ="SELECT * FROM trans_pinjam WHERE id_pinjam='$idpin' AND jenis_pinjam='angsuran' ORDER BY id ASC";
		$queryt_p	=mysqli_query($koneksi,$sqlt_p);
		while($datat_p=mysqli_fetch_array($queryt_p))
		{
			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}

      $sqla	  ="SELECT * FROM pinjam WHERE id=$datat_p[5] ORDER BY id ASC";
  		$querya	=mysqli_query($koneksi,$sqla);
      $dataa  =mysqli_fetch_array($querya);
	?>

	<tr class="hover" bgcolor="<?php echo $warna ?>">
		<td><?php echo "$no"; ?>.</td>
		<td><?php echo "$datat_p[2]"; ?></td>
		<td><?php echo "$datat_p[1]"; ?></td>
		<td><?php echo "$datat_p[3]"; ?></td>
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
		$sqltpd	  ="SELECT * FROM trans_pinjam WHERE id_pinjam='$idpin' AND jenis_pinjam NOT LIKE 'angsuran' AND jenis_pinjam NOT LIKE 'proses' ORDER BY id DESC";
		$querytpd	=mysqli_query($koneksi,$sqltpd);
		$datatpd	=mysqli_fetch_array($querytpd);

		if (isset($datatpd)) {
	?>
	<tr class="hover">
		<td><?php echo $no++; ?></td>
		<td><?php echo $datatpd[2]; ?></td>
		<td>
			<?php echo $datatpd[1]; ?>
			<?php $tsa=$datatpd['angsur_pinjam']-$datatpd[1]; ?>
		</td>
		<td><?php echo $datatpd[3]; ?></td>
    <td align="right">
			<?php
				$p1=$cipok*$datatpd['angsur_pinjam'];
				echo number_format($p1,0,',','.');
				// echo $cipok;
			?>
		</td>
		<td align="right">
			<?php
				$p2=(($datapinjam['jumlah_pinjam']*$cijas)/100);
				echo number_format($p2,0,',','.');
				// echo $datapinjam['jumlah_pinjam'];
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
	<?php
		}
	?>
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
