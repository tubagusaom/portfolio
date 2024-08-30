<script type="text/javascript">
function ebe() {
    return window.open('module/penagihan/view/cetak.php?Penagihan=Export&&period='+document.forms[0][0].value,'_blank');
}
</script>

<form class="" action="?Aprove" method="post">
<table>
  <tr>
    <td colspan="3">
      <h1>
        <?php
          if ($_GET['aprove']=='oright') {
            echo "APROVE PENYELESAIAN ANGGOTA DETAIL";
          }else {
            echo "DETAIL ANGGOTA KELUAR";
          }
        ?>
      </h1>
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
        $kodeschm=$_GET['ids'];

        $sqlpinjam	  ="SELECT * FROM `pinjam` WHERE id_schm='$kodeschm' AND ket_pinjam NOT LIKE '3' AND ket_pinjam NOT LIKE '4'";
        $querypinjam	=mysqli_query($koneksi,$sqlpinjam);
        $datapinjam	  =mysqli_fetch_array($querypinjam);

        if (isset($datapinjam)) {
          $confirpinjam="return confirm('Anggota mempunyai sisa angsuran pinjaman apakah sudah dilunasi !? Proses APROVE akan merubah status pinjaman anggota menjadi LUNAS, Apakah anda yakin !?')";
        }else {
          $confirpinjam="return confirm('Apakah penyelesaian anggota akan di Aprove ?')";
        }

        // onclick=""

        if ($akses=='default' OR $akses=='superuser' OR $akses=='ketua' OR $akses=='akunting'){
          if ($_GET['aprove']=='oright') {
      ?>

        <input type="submit" name="aprovepenyelesaian" value="Aprove" onclick="<?=$confirpinjam ?>">

      <?php }else{echo "";}}else{echo "";} ?>

      <a href="module/penyelesaian/view/cetak.php?Penyelesaian=Cetak&&reff=<?php echo "$_GET[id];"; ?>&&ids=<?php echo "$_GET[ids]"; ?>" target="_blank">
        <input type="button" name="cetak" value="Cetak">
      </a>

      <a href="module/penyelesaian/view/cetak.php?Penyelesaian=Export&&reff=<?php echo "$_GET[id];"; ?>&&ids=<?php echo "$_GET[ids]"; ?>" target="_blank">
				<input type="button" name="export" value="export" class="export">
			</a>
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

    $sqlx	  ="SELECT id_schm, SUM(p_simpan) AS pokok, SUM(w_simpan) AS wajib, SUM(s_simpan) AS rela, YEAR(efv_simpan) AS tahun  FROM `trans_simpan` WHERE id_schm = '$kodeschm' GROUP BY YEAR(efv_simpan)";
    $queryx	=mysqli_query($koneksi,$sqlx);
    while($datax  =mysqli_fetch_array($queryx)){

  	$sqltshu	  ="SELECT SUM(value_shu) AS hasil FROM `shu` WHERE id_schm='$kodeschm' AND periode_shu='$datax[4]'";
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
			  $rupiah2=number_format($datax[2]+$datatshu[0],0,',','.');
			  echo "$rupiah2";
			?>
		</td>
		<td align="right">
      <?php
			  $rupiah3=number_format($datax[3],0,',','.');
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
  <?php
    $nop++;}

    if ($nop1==0) {
      $tralign='align="left"';
      $acuannop1="<td colspan='3'><h6 style='font-weight:700'>Tidak Ada Penarikan . . .</h6></td>";
      $titlebotom="";
      $isitotalpenarikan='';
    }else {
      $tralign='align="right"';
      $acuannop1="";
      $titlebotom="<td colspan='2'>Total Keseluruhan:</td>";

      $tdx='<td style="color:darkblue"><i>';
      $tdy=number_format($nop1,0,',','.');
      $tdz="</i></td>";

      $isitotalpenarikan=$tdx.$tdy.$tdz;
    }
  ?>
  <tr <?=$tralign ?>>
    <?php
      echo $acuannop1;
      echo $titlebotom;
      echo $isitotalpenarikan;
    ?>
  </tr>
</table>
<!-- //////////////////////////////////////////////////////////////////////////////// -->

<!-- //////////////////////////////////////////////////////////////////////////////// -->
<?php
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
      <?php
        $p1=$datapinjam[1]-(($datapinjam[1]/$datapinjam[7])*$datax[1]);
        echo number_format($p1,0,',','.');

        $angsur_selesai=$datapinjam[7]-$datax[1];
      ?>
      <input type="hidden" name="idpinjam" value="<?php echo $datapinjam[0]; ?>">
      <input type="hidden" name="angsur_selesai" value="<?php echo $angsur_selesai; ?>">
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
<input type="hidden" name="angsur_selesai" value="">

<?php
  }

  if (isset($_GET['statusschm'])) {

    $sqlpinjamend	  ="SELECT * FROM `pinjam` WHERE id_schm='$kodeschm' ORDER BY id DESC";
    $querypinjamend	=mysqli_query($koneksi,$sqlpinjamend);
    $datapinjamend	=mysqli_fetch_array($querypinjamend);

    $trtdhpA='<tr><td colspan="7"><h6 style="font-weight:';
    $trtdhpB='700">Tidak Ada History Pinjaman Te';
    $trtdhpC='rakhir . . .</h6></td></tr>';
    $trtdhp=$trtdhpA.$trtdhpB.$trtdhpC;
?>
<!-- //////////////////////////////////////////////////////////////////////////////// -->

<table>
	<tr>
		<td colspan="7"><h1>History Pinjaman Terakhir</h1></td>
	</tr>

  <tr align="center">
		<th>No</th>
    <th>Pinjaman</th>
		<th>Jangka Waktu</th>
    <th>Angsuran/Bln</th>
    <th>Jasa Koprasi <font style="font-size:10px">( <?php echo $datapinjamend[8]; ?> % )</font></th>
    <th>Tgl Pinjaman</th>
    <th>Status</th>
	</tr>

  <?php if (isset($datapinjamend)) { ?>

  <tr class="hover">
    <td>1. </td>
    <td align="center"><?php echo number_format($datapinjamend[1]),',','-'; ?></td>
    <td align="center"><?php echo $datapinjamend[7]; ?> Bln</td>
    <td align="center">
      <?php
        $tapend=(($datapinjamend[1]/$datapinjamend[7]));
        echo number_format($tapend),',','-';
      ?>
    </td>
    <td align="center">
      <?php
        $tjpend=(($datapinjamend[1]*$datapinjamend[8])/100);
        echo number_format($tjpend),',','-';
      ?>
    </td>
    <td align="center">
      <?php
        $a=substr($datapinjamend[3],8);
        $b=substr($datapinjamend[3],5,2);
        $c=substr($datapinjamend[3],0,4);
        echo "$a-$b-$c";
      ?>
    </td>
    <td align="center">
      <?php
        if ($datapinjamend[9]==1) {
          echo "<font style='color:red'>Belum Lunas</font>";
				}elseif ($datapinjamend[9]==2) {
					echo "<font style='color:gold'>Proses Pelunasan</font>";
				}elseif ($datapinjamend[9]==3 OR $datapinjamend[9]==4) {
					echo "<font style='font-weight:700'>Lunas";
				}
			?>
    </td>
  </tr>

<?php }else{ echo $trtdhp; }}else { echo ""; } ?>

</table>

<script type="text/javascript">
  function k0Pi() {
    confirm('Anggota mempunyai sisa angsuran pinjaman apakah sudah dilunasi !? Proses APROVE akan merubah status pinjaman anggota menjadi LUNAS, Apakah anda yakin !?');
  }
</script>
