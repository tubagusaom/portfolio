<form class="" action="?Proses-Penyelesaian" method="post">
<table>
  <tr>
    <td colspan="3">
      <h1>DETAIL SKEMA ANGGOTA</h1>
    </td>
  </tr>
  <tr bgcolor="#ddd" style="color:darkblue; font-weight:700">
		<td>Kode : <?php echo $ka=$_GET['kodeanggota']; ?></td>
    <td>
      Nama : <?php echo $kn=$_GET['nm']; ?>
      <input type="hidden" name="kodeschm" value="<?php echo $_GET['ids']; ?>">
      <input type="hidden" name="kodeakun" value="<?php echo $_GET['id']; ?>">
    </td>
		<td>

      <?php
				$reff=$_GET['id'];
        $sqlakun	  ="SELECT `Id`, `kd_akun`, `nm_akun`, `almt_akun`, `tlp_akun`, `stts_akun`, `c_akun` FROM akun WHERE stts_akun NOT LIKE '5' AND id='$reff' ORDER BY id ASC";
        $queryakun	=mysqli_query($koneksi,$sqlakun);
        $dataakun   =mysqli_fetch_array($queryakun);

        if ($dataakun[5]==4 OR $dataakun[5]==6) {
      ?>

      <input type="submit" name="batalkan" value="Batalkan Penyelesaian" onclick="return confirm('apakah anda yakin ?')" style="color: darkblue; background-color:yellow; border-color:#999">

      <?php }else{ ?>

			<input type="submit" name="selesai" value="Penyelesaian" onclick="return confirm('apakah anda yakin ?')">

      <?php } ?>

      <a href="module/penyelesaian/view/cetak.php?Penyelesaian=Cetak&&reff=<?php echo "$reff"; ?>&&ids=<?php echo "$_GET[ids]"; ?>" target="_blank"><input type="button" name="cetak" value="Cetak"></a>
		</td>
	</tr>

</table>

<!-- //////////////////////////////////////////////////////////////////////////////// -->
<table>
	<tr>
		<td colspan="6"><h1>Simpanan</h1></td>
	</tr>
	<tr align="center">
		<th>No</th>
    <th>Tahun</th>
		<th>Simpanan Pokok</th>
		<th>Simpanan Wajib</th>
    <th>Simpanan Sukarela</th>
		<th>Total Simpanan</th>
	</tr>

	<?php
    $nos=1;
    $nos1=0;
    $kodeschm=$_GET['ids'];
    $sqlx	  ="SELECT id_schm, SUM(p_simpan) AS pokok, SUM(w_simpan) AS wajib, SUM(s_simpan) AS rela, YEAR(efv_simpan) AS tahun FROM `trans_simpan` WHERE id_schm ='$kodeschm' GROUP BY YEAR(efv_simpan)";
    $queryx	=mysqli_query($koneksi,$sqlx);
    while($datax  =mysqli_fetch_array($queryx)){

  	$sqltshu	  ="SELECT SUM(value_shu) AS hasil FROM `shu` WHERE id_schm='$datax[0]' AND periode_shu='$datax[4]'";
  	$querytshu	=mysqli_query($koneksi,$sqltshu);
  	$datatshu   =mysqli_fetch_array($querytshu);
	?>

	<tr bgcolor="whitesmoke" class="hover">
		<td><?php echo $nos ?>.</td>
    <td><?php echo "$datax[tahun]"; ?></td>
    <td align="right">
      <?php
			  $rupiah1=number_format($datax[1],0,',','.');
			  echo "$rupiah1";
			?>
		</td>
    <td align="right">
      <?php
			  $rupiah2=number_format($datax[2],0,',','.');
			  echo "$rupiah2";
			?>
		</td>
		<td align="right">
      <?php
			  $rupiah3=number_format($datax[3]+$datatshu[0],0,',','.');
			  echo "$rupiah3";
			?>
		</td>
    <td align="right">
        <?php
  			  $rupiah4=$datax[1]+$datax[2]+$datax[3]+$datatshu[0];
  			  echo number_format($rupiah4,0,',','.');

          $nos1 +=$rupiah4;
  			?>
		</td>
	</tr>
  <?php $nos++;} ?>
  <tr align="right">
    <td colspan="5">Total Keseluruhan:</td>
    <td style="color:darkblue">
      <i>
        <?php echo number_format($nos1,0,',','.'); ?>
      </i>
    </td>
  </tr>
</table>
<!-- //////////////////////////////////////////////////////////////////////////////// -->

<!-- //////////////////////////////////////////////////////////////////////////////// -->
<table>
	<tr>
		<td colspan="3"><h1>penarikan</h1></td>
	</tr>
	<tr align="center">
		<th>No</th>
    <th>Tahun</th>
		<th width="25%">Total Penarikan</th>
	</tr>
	<?php
    $nop=1;
    $nop1=0;
		$sqltpd	  ="SELECT SUM(jumlah_ambil) AS jumlah, YEAR(efv_ambil) AS tahun FROM trans_ambil WHERE id_schm='$kodeschm' AND stts_ambil NOT LIKE '1' GROUP BY YEAR(efv_ambil)";
		$querytpd	=mysqli_query($koneksi,$sqltpd);
		while($datatpd=mysqli_fetch_array($querytpd)){
	?>
	<tr class="hover" bgcolor="whitesmoke">
		<td><?php echo "$nop"; ?>.</td>
    <td><?php echo "$datatpd[tahun]";?></td>
		<td align="right">
			<?php
				$p1=$datatpd[0];
				echo number_format($p1,0,',','.');

        $nop1 +=$datatpd[0];
			?>
		</td>
	</tr>
<?php $nop++;} ?>

<tr align="right">
  <td colspan="2">Total Keseluruhan:</td>
  <td style="color:darkblue">
    <i>
      <?php echo number_format($nop1,0,',','.'); ?>
    </i>
  </td>
</tr>
</table>
<!-- //////////////////////////////////////////////////////////////////////////////// -->

<!-- //////////////////////////////////////////////////////////////////////////////// -->
<?php
  $sqlpinjam	  ="SELECT * FROM `pinjam` WHERE id_schm='$kodeschm' AND ket_pinjam NOT LIKE '3' AND ket_pinjam NOT LIKE '4'";
	$querypinjam	=mysqli_query($koneksi,$sqlpinjam);
	$datapinjam	  =mysqli_fetch_array($querypinjam);

	if (isset($datapinjam)) {
    $sqlx	  ="SELECT * FROM trans_pinjam WHERE id_pinjam='$datapinjam[0]' ORDER BY id DESC";
		$queryx	=mysqli_query($koneksi,$sqlx);
		$datax	=mysqli_fetch_array($queryx);
?>

<table>
	<tr>
		<td colspan="5"><h1>pinjaman</h1></td>
	</tr>
	<tr align="center">
		<th>No</th>
		<th>Jenis</th>
		<th>Sisa Angsuran Pokok</th>
		<th>Sisa Jasa Koprasi</th>
		<th>Total Sisa Pinjaman</th>
	</tr>
	<tr class="hover" bgcolor="whitesmoke">
		<td>1.</td>
		<td>Pinjaman</td>
		<td align="right">
      <input type="hidden" name="idpinjam" value="<?php echo $datapinjam[0]; ?>">
      <?php
        $p1=$datapinjam[1]-(($datapinjam[1]/$datapinjam[7])*$datax[1]);
        echo number_format($p1,0,',','.');
      ?>
		</td>
		<td align="right">
			<?php
				$p2=(($datapinjam[1]*$datapinjam[8])/100)-(((($datapinjam[1]*$datapinjam[8])/100)/$datapinjam[7])*$datax[1]);
				echo number_format($p2,0,',','.');
			?>
		</td>
    <td align="right">
			<b style="color:darkblue">
				<?php
					$p3=$p1+$p2;
					echo number_format($p3,0,',','.');
				?>
			</b>
		</td>
	</tr>
</table>
</form>

<?php }else{ ?>

<input type="hidden" name="idpinjam" value="">

<?php } ?>
<!-- //////////////////////////////////////////////////////////////////////////////// -->
