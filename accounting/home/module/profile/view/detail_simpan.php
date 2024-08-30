<form class="" action="" method="post">
<table>

	<tr>
		<td colspan="9" style="border-bottom:1px solid #999;font-size:13px;">
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
			<select class="acount" name="search" style="font-size:13px;">
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

	<!-- <tr>
		<td colspan="9">
			<h1> SIMPANAN</h1>
		</td>
	</tr> -->

	<tr align="center">
		<th style="font-size:13px;">No</th>
		<!-- <th style="font-size:13px;">Jenis</th> -->
		<th style="font-size:13px;">Tahun</th>
		<th style="font-size:13px;">Simpanan Pokok</th>
		<th style="font-size:13px;">Simpanan Wajib</th>
		<th style="font-size:13px;">Simpanan Sukarela</th>
		<th style="font-size:13px;">Total</th>
	</tr>

	<?php
		if (isset($_POST['pencarian'])) {
			$cari=$_POST['search'];
		}else {
			$cari='';
		}

		$no		  =1;

		$sqldetail = "SELECT
      id_schm,
      SUM(p_simpan) AS pokok,
      SUM(w_simpan) AS wajib,
      SUM(s_simpan) AS rela,
      YEAR(efv_simpan) AS tahun
      FROM `trans_simpan`
      WHERE efv_simpan LIKE '%$cari%' AND
        id_schm='$kodeschm' AND
        stts_simpan NOT LIKE '3'
      GROUP BY YEAR(efv_simpan)
      ORDER BY YEAR(efv_simpan) ASC
      ";
		$querydetail	=mysqli_query($koneksi,$sqldetail);
		while($datadetail=mysqli_fetch_array($querydetail))
		{
			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}

			$sqltshu1	  ="SELECT SUM(value_shu) AS SHU1 FROM `shu` WHERE id_schm = '$kodeschm' AND periode_shu = '$datadetail[tahun]'";
			$querytshu1	=mysqli_query($koneksi,$sqltshu1);
			$datatshu1  =mysqli_fetch_array($querytshu1);
	?>

	<tr class="hover" bgcolor="<?php echo $warna ?>">
		<td align="center" style="font-size:13px;"><?php echo "$no"; ?>.</td>
		<!-- <td style="font-size:13px;">Simpanan</td> -->
		<td align="right" style="font-size:13px;"><?php echo "$datadetail[tahun]"; ?></td>
		<td align="right" style="font-size:13px;">
			<?php
				$rupiah1=number_format($datadetail['pokok'],0,',','.');
				echo "$rupiah1";
			?>
		</td>
		<td align="right" style="font-size:13px;">
			<?php
				$rupiah2=number_format($datadetail['wajib']+$datatshu1['SHU1'],0,',','.');
				echo "$rupiah2";
			?>
		</td>
		<td align="right" style="font-size:13px;">
			<?php
				$rupiah3=number_format($datadetail['rela'],0,',','.');
				echo "$rupiah3";
			?>
		</td>
		<td align="right" style="font-size:13px;">
      <b>
			<?php
				$total=$datadetail['pokok']+$datadetail['wajib']+$datadetail['rela']+$datatshu1['SHU1'];
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
