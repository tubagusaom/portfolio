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
		$no_r		  =1;
    $sa_r			=0;
    $sb_r			=0;
    $sc_r			=0;
    $idpin_r = $datapinjam_riwayat['id'];

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

    $sqlt_p	  ="SELECT * FROM trans_pinjam WHERE id_pinjam='$idpin_r' AND jenis_pinjam='angsuran' ORDER BY id ASC";
		$queryt_p	=mysqli_query($koneksi,$sqlt_p);
		while($datat_p=mysqli_fetch_array($queryt_p))
		{
			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}

      $sqla	  ="SELECT * FROM pinjam WHERE id='$datat_p[5]' ORDER BY id ASC";
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
        $cicilan_r=$dataa[1]/$dataa[7];
				$rupiah1_r=number_format($cicilan_r,0,',','.');
				echo "$rupiah1_r";
			?>
      <input type="hidden" name="" value="<?php echo $acuana_r=$cicilan_r; ?>">
      <?php $sa_r += $acuana_r; ?>
		</td>
		<td align="right">
			<?php
			// $jasa=(($dataa[1]*$dataa[8])/100)/$dataa[7];
			// $rupiah2=number_format($jasa,0,',','.');
			// echo "$rupiah2";

      if ($datat_p[6]==0) {
				$jasa_r=(($dataa[1]*$dataa[8])/100)/$dataa[7];
				$rupiah2_r=number_format($jasa_r,0,',','.');
				echo "$rupiah2_r";
			}else {
				$jasa_r=(($dataa[1]*$datat_p[6])/100)/$dataa[7];
				$rupiah2_r=number_format($jasa_r,0,',','.');
				echo "$rupiah2_r";
			}
			?>
      <input type="hidden" name="" value="<?php echo $acuanb_r=$jasa_r; ?>">
      <?php $sb_r += $acuanb_r; ?>
		</td>
		<td align="right">
      <input type="hidden" name="" value="<?php echo $acuanc_r=$cicilan_r+$jasa_r; ?>">
      <b>
			<?php
				$total_r=$cicilan_r+$jasa_r;
				echo number_format($total_r,0,',','.');

				$sc_r += $acuanc_r;
			?>
      </b>
    </td>
	</tr>

	<?php
		$no++;};
	?>

<!-- //////////////////////////////////////////////////////////////////////////////// -->
	<?php
		$sqltpd	  ="SELECT * FROM trans_pinjam WHERE id_pinjam='$idpin_r' AND jenis_pinjam NOT LIKE 'angsuran' AND jenis_pinjam NOT LIKE 'proses' ORDER BY id DESC";
		$querytpd	=mysqli_query($koneksi,$sqltpd);
		$datatpd	=mysqli_fetch_array($querytpd);

		if (isset($datatpd)) {
	?>
	<tr class="hover">
		<td><?php echo $no++; ?></td>
		<td><?php echo $datatpd[2]; ?></td>
		<td>
			<?php echo $datatpd[1]; ?>
			<?php $tsa_r=$dataa['jangka_pinjam']-$datatpd[1]; ?>
		</td>
		<td><?php echo $datatpd[3]; ?></td>
    <td align="right">
			<?php
				$p1_r=$dataa['jumlah_pinjam']-$sa_r;
				echo number_format($p1_r,0,',','.');
			?>
		</td>
		<td align="right">
			<?php
				$p2_r=(($dataa['jumlah_pinjam']*$dataa['jasa_pinjam'])/100)-$sb_r;
				echo number_format($p2_r,0,',','.');
			?>
		</td>
		<td align="right">
			<i><b>
				<?php
					$p3_r=$p1_r+$p2_r;
					echo number_format($p3_r,0,',','.');
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
					$rupiahh1_r=number_format($sa_r+$p1_r,0,',','.');
					echo "$rupiahh1_r";
				?>
			</b>
    </td>
		<td align="right">
      <b>
				<?php
					$rupiahh2_r=number_format($sb_r+$p2_r,0,',','.');
					echo "$rupiahh2_r";
				?>
			</b>
    </td>
		<td align="right">
			<i><b>
				<?php
					$rupiahh3_r=number_format($sc_r+$p3_r,0,',','.');
					echo "$rupiahh3_r";
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
					$rupiahh1_r=number_format($sa_r,0,',','.');
					echo "$rupiahh1_r";
				?>
			</b>
		</td>
		<td align="right">
			<b>
				<?php
					$rupiahh2_r=number_format($sb_r,0,',','.');
					echo "$rupiahh2_r";
				?>
			</b>
		</td>
		<td align="right">
			<i><b>
				<?php
					$rupiahh3_r=number_format($sc_r,0,',','.');
					echo "$rupiahh3_r";
				?>
			</b></i>
		</td>
	</tr>
	</table>
<?php } ?>
