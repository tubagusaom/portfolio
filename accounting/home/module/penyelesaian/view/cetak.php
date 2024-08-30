

<?php
  include "../../../model/config/master_koneksi.php";
  include '../../../model/modul/casedate.php';

  $reff="$_GET[ids]";

  $sqla	  ="SELECT * FROM schm WHERE id=$reff";
  $querya	=mysqli_query($koneksi,$sqla);
  $dataa	=mysqli_fetch_array($querya);

  $sqlb	  ="SELECT * FROM akun WHERE id=$dataa[11]";
  $queryb	=mysqli_query($koneksi,$sqlb);
  $datab	=mysqli_fetch_array($queryb);

  if ($_GET['Penyelesaian']=='Cetak') {
    if ($dataa['stts_schm']==4) {
?>

<title>Pengajuan Penyelesaian Anggota Koperasi Karyawan Otsuka Bhakti</title>

<?php }else { ?>

<title>Penyelesaian Anggota Koperasi Karyawan Otsuka Bhakti</title>

<?php } ?>

<link href="../../../images/b_print.png" rel="icon" type="image/png" />

<div style="width:100%">
  <div style="float:left">
    <img src="../../../images/logokoperasi_k.jpeg" width="5%" align="center" style="margin:10">
    <b style="font-family:sans-serif; text-shadow: 1px 1px 3px maroon;">
      <lable style="color:red;">KOPERASI</lable>
      <lable style="color:darkblue;">OBS</lable>
    </b>
  </div>
  <hr style="border: 2px double">
</div>

<div align="center" style="float:right;width:100%;font-size:17px; font-family:sans-serif">
  <p><strong>Penyelesaian Anggota Koperasi Karyawan Otsuka Bhakti</strong></p>
</div>

<div style="float:right;width:100%" align="center">
  <hr>
</div>

<div style="float:right;width:100%;font-family: sans-serif">
<div style="width:50%;float:left">
<table border="0" cellspacing="0" cellpadding="0" width="100%" style="font-size:14px">
  <tr>
    <td width="103" valign="top"><p>Perihal</p></td>
    <td width="19" valign="top"><p>:</p></td>
    <td width="237" valign="top"><p><u>Penyelesaian Anggota</u></p></td>
  </tr>
  <tr>
    <td valign="top"><p>Lampiran </p></td>
    <td valign="top"><p>:</p></td>
    <td valign="top"><p>-</p></td>
  </tr>
</table>
</div>

<div style="width:35%;float:right">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-size:14px">
  <tr>
    <td width="45%" valign="top"><p>Kode Anggota</p></td>
    <td width="5%" valign="top"><p>:</p></td>
    <td width="54%" valign="top"><p><?php echo "$datab[1]"; ?></p></td>
  </tr>

  <tr>
    <td valign="top">Nama</td>
    <td width="5%" valign="top"><p>:</p></td>
    <td valign="top"><?php echo "$datab[2]"; ?></td>
  </tr>

</table>
</div>
</div>

<div style="float:right;width:100%" align="center">
  <hr>
</div>

<div style="float:right;width:100%;font-family: sans-serif; margin-top:10">
<div style="float:left;width:100%;">
<table width="100%" border="0"  style="font-size:14px">
  <tr>
    <th colspan="6" align="left">
      Rekening<hr style="margin:0; padding:0">
    </th>
  </tr>
  <tr>
    <td>Bank</td>
    <td width="2%">:</td>
    <td colspan="4">
      <div><?php echo "$dataa[4]"; ?></div>
    </td>
  </tr>
  <tr>
    <td>Norek</td>
    <td>:</td>
    <td colspan="4">
      <div><?php echo "$dataa[5]"; ?></div>
    </td>
  </tr>
  <tr>
    <td>Pemilik</td>
    <td>:</td>
    <td colspan="4">
      <div><?php echo "$dataa[6]"; ?></div>
    </td>
  </tr>
  <tr>
    <th colspan="6">
      <hr>
    </th>
  </tr>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////// -->
  <tr>
    <th colspan="6" align="left">
      Simpanan<hr style="margin:0; padding:0">
    </th>
  </tr>
  <tr>
    <th width="20%" colspan="2" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="right">Tahun</th>
    <th width="20%" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="right">Simpanan Pokok</th>
    <th width="20%" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="right">Simpanan Wajib</th>
    <th width="20%" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="right">Simpanan Sukarela</th>
    <th width="20%" style="border-bottom:1px solid #999" align="right">Total Simpanan</th>
  </tr>

  <?php
    $nos1=0;
    $kodeschm=$_GET['ids'];
    $sqlx	  ="SELECT id_schm, SUM(p_simpan) AS pokok, SUM(w_simpan) AS wajib, SUM(s_simpan) AS rela, YEAR(efv_simpan) AS tahun FROM `trans_simpan` WHERE id_schm = '$kodeschm' GROUP BY YEAR(efv_simpan)";
    $queryx	=mysqli_query($koneksi,$sqlx);
    while($datax  =mysqli_fetch_array($queryx)){

  	$sqltshu	  ="SELECT SUM(value_shu) AS hasil FROM `shu` WHERE id_schm='$datax[0]' AND periode_shu='$datax[4]'";
  	$querytshu	=mysqli_query($koneksi,$sqltshu);
  	$datatshu   =mysqli_fetch_array($querytshu);
	?>

  <tr>
    <td align="right" colspan="2" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php
			  echo "$datax[4]";
			?>
    </td>
    <td align="right" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php
			  $rupiah1=number_format($datax[1]);
			  echo "$rupiah1";
			?>
    </td>
    <td align="right" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php
			  $rupiah2=number_format($datax[2]+$datatshu[0]);
			  echo "$rupiah2";
			?>
    </td>
    <td align="right" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php
			  $rupiah3=number_format($datax[3]);
			  echo "$rupiah3";
			?>
    </td>
    <td align="right" style="border-bottom:1px solid #999;">
        <?php
          $totalsimpanan=$datax[1]+$datax[2]+$datax[3]+$datatshu[0];
          echo number_format($totalsimpanan);

          $nos1 +=$totalsimpanan;
        ?>
    </td>
  </tr>
<?php } ?>
<tr>
  <td colspan="5" align="right">Total Keseluruhan Simpanan :</td>
  <td align="right">
    <b><i><?php echo number_format($nos1); ?></i></b>
  </td>
</tr>

<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
<tr>
  <th colspan="6" align="left">
    <hr style="margin:0; padding:0; margin-bottom:20px">
  </th>
</tr>
<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->

  <tr>
    <th colspan="6" align="left">
      Penarikan<hr style="margin:0; padding:0">
    </th>
  </tr>

  <tr>
    <th style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="right" colspan="2">Tahun</th>
    <th style="border-bottom:1px solid #999" align="right" colspan="4">Total Penarikan</th>
  </tr>
  <?php
    $nop1=0;
    $sqltpd	  ="SELECT SUM(jumlah_ambil) AS jumlah, YEAR(efv_ambil) AS tahun FROM trans_ambil WHERE id_schm='$kodeschm' AND stts_ambil NOT LIKE '1' GROUP BY YEAR(efv_ambil)";
    $querytpd	=mysqli_query($koneksi,$sqltpd);
    while($datatpd=mysqli_fetch_array($querytpd)){
	?>

  <tr>
    <td align="right" colspan="2" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php echo "$datatpd[1]"; ?>
    </td>
    <td align="right" colspan="4" style="border-bottom:1px solid #999;">
        <?php
  				$totalpenarikan=$datatpd[0];
  				echo number_format($totalpenarikan);

          $nop1 +=$totalpenarikan;
  			?>
    </td>
  </tr>
<?php } ?>

<tr>
  <td colspan="5" align="right">Total Keseluruhan Penarikan :</td>
  <td align="right">
    <b><i><?php echo number_format($nop1); ?></i></b>
  </td>
</tr>

  <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
  <tr>
    <th colspan="6" align="left">
      <hr style="margin:0; padding:0; margin-bottom:20px">
    </th>
  </tr>
  <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->

  <?php
    $sqlpinjam	  ="SELECT * FROM `pinjam` WHERE id_schm='$kodeschm' AND ket_pinjam NOT LIKE '3' AND ket_pinjam NOT LIKE '4'";
  	$querypinjam	=mysqli_query($koneksi,$sqlpinjam);
  	$datapinjam	  =mysqli_fetch_array($querypinjam);

  	if (isset($datapinjam)) {
      $sqlx	  ="SELECT * FROM trans_pinjam WHERE id_pinjam='$datapinjam[0]' ORDER BY id DESC";
  		$queryx	=mysqli_query($koneksi,$sqlx);
  		$datax	=mysqli_fetch_array($queryx);
  ?>

  <tr>
    <th colspan="6" align="left">
      Detail Pinjaman<hr style="margin:0; padding:0">
    </th>
  </tr>

  <tr>
    <th colspan="3" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="right">
      Total Pinjaman <font style="font-size:10px">( <?php echo $datapinjam[7]; ?> Bln )</font>
      </th>
    <th colspan="2" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="right">
      Total Jasa Koprasi <font style="font-size:10px">( <?php echo $datapinjam[7]; ?> Bln )</font>
    </th>
    <th  style="border-bottom:1px solid #999" align="right">Tanggal Pinjaman</th>
  </tr>

  <tr>
    <td colspan="3" align="right" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php echo number_format($datapinjam[1]); ?>
    </td>
    <td colspan="2" align="right" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php
        $tjp=(($datapinjam[1]*$datapinjam[8])/100);
        echo number_format($tjp);
      ?>
    </td>
    <td align="right" style="border-bottom:1px solid #999; ">
      <?php
        $a=substr($datapinjam[3],8);
        $b=bulan(substr($datapinjam[3],5,2));
        $c=substr($datapinjam[3],0,4);
        echo "$a $b $c";
      ?>
    </td>
  </tr>

  <tr>
    <th colspan="6" align="left" style="padding-top:15px">
      Detail Penyelesaian Pinjaman<hr style="margin:0; padding:0">
    </th>
  </tr>

  <tr>
    <th colspan="3" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="right">
      <?php
        $jap=count($datax[0]);
        $sap=$datapinjam[7]-$jap;
      ?>
      Sisa Angsuran Pokok <font style="font-size:10px">( *<?=$sap; ?> Bln )</font>
    </th>
    <th colspan="2" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="right">Sisa Jasa Koprasi <font style="font-size:10px">( *<?=$sap; ?> Bln )</th>
    <th style="border-bottom:1px solid #999" align="right">Total Sisa Pinjaman</th>
  </tr>

  <tr>
    <td align="right" colspan="3" style="border-right:1px solid #999; padding-right:5px">
      <?php
        $p1=$datapinjam[1]-(($datapinjam[1]/$datapinjam[7])*$datax[1]);
        echo number_format($p1);
      ?>
    </td>
    <td colspan="2" align="right" style="border-right:1px solid #999; padding-right:5px">
      <?php
				$p2=(($datapinjam[1]*$datapinjam[8])/100)-(((($datapinjam[1]*$datapinjam[8])/100)/$datapinjam[7])*count($datax[0]));
				echo number_format($p2);
			?>
    </td>
    <td align="right">
      <b>
        <?php
          $totalpinjaman=$p1+$p2;
          echo number_format($totalpinjaman);
        ?>
      </b>
    </td>
  </tr>

  <?php
    }else{echo "";}

    if ($dataa['stts_schm']==5) {

      $sqlpinjamend	  ="SELECT * FROM `pinjam` WHERE id_schm='$kodeschm' ORDER BY id DESC";
    	$querypinjamend	=mysqli_query($koneksi,$sqlpinjamend);
    	$datapinjamend	=mysqli_fetch_array($querypinjamend);

      if (isset($datapinjamend)) {
  ?>
  <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->

  <tr>
    <th colspan="6" align="left">
      History Pinjaman Terakhir<hr style="margin:0; padding:0">
    </th>
  </tr>

  <tr>
    <th style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="center" width="13%">Pinjaman</th>
    <th style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="center" width="17%">Jangka Waktu</th>
    <th style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="center">Angsuran/Bln</th>
    <th style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="center">
      Jasa Koprasi <font style="font-size:10px">( <?php echo $datapinjamend[8]; ?> % )</font>
    </th>
    <th style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="center">Tgl Pinjaman</th>
    <th style="border-bottom:1px solid #999" align="center">Status</th>
  </tr>

  <tr>
    <td align="right" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php echo number_format($datapinjamend[1]); ?>
    </td>
    <td align="right" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php echo $datapinjamend[7]; ?> Bln
    </td>
    <td align="right" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php
        $tapend=(($datapinjamend[1]/$datapinjamend[7]));
        echo number_format($tapend);
      ?>
    </td>
    <td align="right" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php
        $tjpend=(($datapinjamend[1]*$datapinjamend[8])/100);
        echo number_format($tjpend);
      ?>
    </td>
    <td align="right" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php
        $a=substr($datapinjamend[3],8);
        $b=bulan(substr($datapinjamend[3],5,2));
        $c=substr($datapinjamend[3],0,4);
        echo "$a $b $c";
      ?>
    </td>
    <td align="right" style="border-bottom:1px solid #999; ">
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

  <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
  <?php }}else { echo ""; } ?>

  <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
  <tr>
    <th colspan="6" align="left">
      <hr style="margin:0; padding:0; margin-bottom:20px">
    </th>
  </tr>
  <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->

  <tr>
    <?php
      if (isset($totalpinjaman)) {
        $penyelesaian=($nos1-$nop1)-$totalpinjaman;
      }else {
        $penyelesaian=($nos1-$nop1);
      }

      $acuantitle =substr($penyelesaian,0,1);

      if ($acuantitle=="-") {
        $color="red";
      }else {
        $color="#000";
      }
    ?>

    <td colspan="3" style="background:#ddd; padding-left:5px">Jumlah penyelesaian :</td>
    <td colspan="3" align="right" style="background:#ddd; padding-top:5px; padding-bottom:5px; padding-right:5px; ">
      <b>
        <i style="color:<?=$color ?>">
          <?php echo "Rp. "; echo number_format($penyelesaian); ?>
        </i>
      </b>
    </td>
  </tr>

  <tr>
    <th colspan="6"><hr style="border:1px solid"></th>
  </tr>
</table>
<div class="">
  <p align="left">&nbsp;</p>
</div>
<div style="float:right;width:100%; font-family:sans-serif; font-size:14px">
	<div style="width:30%;float:left; padding-left:10%">
    <p align="left">&nbsp;</p>
    <p align="left">Diketahui oleh :</p>
		<p align="center">&nbsp;</p>
		<p align="center">&nbsp;</p>
		<hr style="margin:0;">
		<p align="center" style="margin-top:0"><strong><?php echo "$datab[2]"; ?></strong></p>
	</div>
  <div style="width:30%;float:right; padding-right:10%">
    <p align="right">
      <?php
        date_default_timezone_set("Asia/Jakarta");

        $tgl=date("d");
        $bln=bulan(date("m"));
        $thn=date("Y");
        echo "Jakarta, $tgl $bln $thn";
      ?>
    </p>
    <p align="left">&nbsp;</p>
		<p align="center">&nbsp;</p>
		<p align="center">&nbsp;</p>
		<hr style="margin:0;">
		<p align="center" style="margin-top:0"><strong>Ketua Koperasi</strong></p>
	</div>
</div>

</div>
</div>


<!-- ________________________________________ BATAS ________________________________________ -->


<?php
  }elseif ($_GET['Penyelesaian']=='Export') {
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Penyelesaian-$datab[2].xls");
    header("Pragma: no-cache");
    header("Expires: 0");
?>

<div align="center" style="float:right;width:100%;font-size:17px; font-family:sans-serif">
  <p><strong>Penyelesaian Anggota Koperasi Karyawan Otsuka Bhakti</strong></p>
</div>

<div style="float:right;width:100%;font-family: sans-serif; margin-top:10">
<div style="float:left;width:100%;">
<table width="100%" border="0"  style="font-size:14px">
  <tr>
    <td>Perihal</td>
    <td width="2%">:</td>
    <td colspan="4">
      <div><u>Penyelesaian Anggota</u></div>
    </td>
  </tr>
  <tr>
    <td>Lampiran</td>
    <td>:</td>
    <td colspan="4">
      <div>-</div>
    </td>
  </tr>
  <tr>
    <td>Kode Anggota</td>
    <td>:</td>
    <td colspan="4">
      <div align="left"><?php echo "$datab[1]"; ?></div>
    </td>
  </tr>
  <tr>
    <td style="border-bottom: 1px solid #999">Nama</td>
    <td style="border-bottom: 1px solid #999">:</td>
    <td colspan="4" style="border-bottom: 1px solid #999">
      <div><?php echo "$datab[2]"; ?></div>
    </td>
  </tr>
  <tr>
    <th colspan="6">
      <hr>
    </th>
  </tr>

  <tr>
    <th colspan="6" align="left">
      Rekening<hr style="margin:0; padding:0">
    </th>
  </tr>
  <tr>
    <td>Bank</td>
    <td width="2%">:</td>
    <td colspan="4" align="left">
      <div><?php echo "$dataa[4]"; ?></div>
    </td>
  </tr>
  <tr>
    <td>Norek</td>
    <td>:</td>
    <td colspan="4" align="left">
      <div><?php echo "$dataa[5]"; ?></div>
    </td>
  </tr>
  <tr>
    <td style="border-bottom: 1px solid #999">Pemilik</td>
    <td style="border-bottom: 1px solid #999">:</td>
    <td colspan="4" align="left" style="border-bottom: 1px solid #999">
      <div><?php echo "$dataa[6]"; ?></div>
    </td>
  </tr>
  <tr>
    <th colspan="6">
      <hr>
    </th>
  </tr>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////// -->
  <tr>
    <th colspan="6" align="left">
      Simpanan<hr style="margin:0; padding:0">
    </th>
  </tr>
  <tr>
    <th width="20%" colspan="2" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="right">Tahun</th>
    <th width="20%" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="right">Simpanan Pokok</th>
    <th width="20%" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="right">Simpanan Wajib</th>
    <th width="20%" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="right">Simpanan Sukarela</th>
    <th width="20%" style="border-bottom:1px solid #999; padding-right:5px" align="right">Total Simpanan</th>
  </tr>

  <?php
    $nos1=0;
    $kodeschm=$_GET['ids'];
    $sqlx	  ="SELECT id_schm, SUM(p_simpan) AS pokok, SUM(w_simpan) AS wajib, SUM(s_simpan) AS rela, YEAR(efv_simpan) AS tahun FROM `trans_simpan` WHERE id_schm = '$kodeschm' GROUP BY YEAR(efv_simpan)";
    $queryx	=mysqli_query($koneksi,$sqlx);
    while($datax  =mysqli_fetch_array($queryx)){

  	$sqltshu	  ="SELECT SUM(value_shu) AS hasil FROM `shu` WHERE id_schm='$datax[0]' AND periode_shu='$datax[4]'";
  	$querytshu	=mysqli_query($koneksi,$sqltshu);
  	$datatshu   =mysqli_fetch_array($querytshu);
	?>

  <tr>
    <td align="right" colspan="2" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php
			  echo "$datax[4]";
			?>
    </td>
    <td align="right" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php
			  $rupiah1=$datax[1];
			  echo "$rupiah1";
			?>
    </td>
    <td align="right" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php
			  $rupiah2=$datax[2]+$datatshu[0];
			  echo "$rupiah2";
			?>
    </td>
    <td align="right" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php
			  $rupiah3=$datax[3];
			  echo "$rupiah3";
			?>
    </td>
    <td align="right" style="border-bottom:1px solid #999; padding-right:5px">
        <?php
          $totalsimpanan=$datax[1]+$datax[2]+$datax[3]+$datatshu[0];
          echo $totalsimpanan;

          $nos1 +=$totalsimpanan;
        ?>
    </td>
  </tr>
<?php } ?>
<tr>
  <td colspan="5" align="right">Total Keseluruhan :</td>
  <td align="right" style="border-top:1px solid #999">
    <b>
      <?php
        echo $nos1;
      ?>
    </b>
  </td>
</tr>

<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
<tr>
  <th colspan="6" align="left">
    <hr style="margin:0; padding:0; margin-bottom:20px">
  </th>
</tr>
<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->

  <tr>
    <th colspan="6" align="left">
      Penarikan<hr style="margin:0; padding:0">
    </th>
  </tr>

  <tr>
    <th style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="right" colspan="2">Tahun</th>
    <th style="border-bottom:1px solid #999; padding-right:5px" align="right" colspan="4">Total Penarikan</th>
  </tr>
  <?php
    $nop1=0;
    $sqltpd	  ="SELECT SUM(jumlah_ambil) AS jumlah, YEAR(efv_ambil) AS tahun FROM trans_ambil WHERE id_schm='$kodeschm' AND stts_ambil NOT LIKE '1' GROUP BY YEAR(efv_ambil)";
    $querytpd	=mysqli_query($koneksi,$sqltpd);
    while($datatpd=mysqli_fetch_array($querytpd)){
	?>

  <tr>
    <td align="right" colspan="2" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php echo "$datatpd[1]"; ?>
    </td>
    <td align="right" colspan="4" style="border-bottom:1px solid #999; padding-right:5px">
        <?php
  				$totalpenarikan=$datatpd[0];
  				echo $totalpenarikan;

          $nop1 +=$totalpenarikan;
  			?>
    </td>
  </tr>
<?php } ?>

<tr>
  <td colspan="5" align="right">Total Keseluruhan :</td>
  <td align="right" style="border-top:1px solid #999">
    <b>
      <?php
        echo $nop1;
      ?>
    </b>
  </td>
</tr>

  <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
  <tr>
    <th colspan="6" align="left">
      <hr style="margin:0; padding:0; margin-bottom:20px">
    </th>
  </tr>
  <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->

  <?php
    $sqlpinjam	  ="SELECT * FROM `pinjam` WHERE id_schm='$kodeschm' AND ket_pinjam NOT LIKE '3' AND ket_pinjam NOT LIKE '4'";
  	$querypinjam	=mysqli_query($koneksi,$sqlpinjam);
  	$datapinjam	  =mysqli_fetch_array($querypinjam);

  	if (isset($datapinjam)) {
      $sqlx	  ="SELECT * FROM trans_pinjam WHERE id_pinjam='$datapinjam[0]' ORDER BY id DESC";
  		$queryx	=mysqli_query($koneksi,$sqlx);
  		$datax	=mysqli_fetch_array($queryx);
  ?>

  <tr>
    <th colspan="6" align="left">
      Pinjaman<hr style="margin:0; padding:0">
    </th>
  </tr>

  <tr>
    <th colspan="4" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="right">Sisa Angsuran Pokok</th>
    <th style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="right">Sisa Jasa Koprasi</th>
    <th style="border-bottom:1px solid #999; padding-right:5px" align="right">Total Sisa Pinjaman</th>
  </tr>

  <tr>
    <td align="right" colspan="4" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php
        $p1=$datapinjam[1]-(($datapinjam[1]/$datapinjam[7])*$datax[1]);
        echo $p1;
      ?>
    </td>
    <td align="right" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php
				$p2=(($datapinjam[1]*$datapinjam[8])/100)-(((($datapinjam[1]*$datapinjam[8])/100)/$datapinjam[7])*$datax[1]);
				echo $p2;
			?>
    </td>
    <td align="right" style="border-bottom:1px solid #999; padding-right:5px">
      <b>
        <?php
          $totalpinjaman=$p1+$p2;
          echo $totalpinjaman;
        ?>
      </b>
    </td>
  </tr>

  <?php
    }else{echo "";}

    if ($dataa['stts_schm']==5) {

      $sqlpinjamend	  ="SELECT * FROM `pinjam` WHERE id_schm='$kodeschm' ORDER BY id DESC";
    	$querypinjamend	=mysqli_query($koneksi,$sqlpinjamend);
    	$datapinjamend	=mysqli_fetch_array($querypinjamend);

      if (isset($datapinjamend)) {
  ?>

  <tr>
    <th colspan="6" align="left">
      History Pinjaman Terakhir<hr style="margin:0; padding:0">
    </th>
  </tr>

  <tr>
    <th style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="center" width="13%">Pinjaman</th>
    <th style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="center" width="17%">Jangka Waktu</th>
    <th style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="center">Angsuran/Bln</th>
    <th style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="center">
      Jasa Koprasi <font style="font-size:10px">( <?php echo $datapinjamend[8]; ?> % )</font>
    </th>
    <th style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px" align="center">Tgl Pinjaman</th>
    <th style="border-bottom:1px solid #999" align="center">Status</th>
  </tr>

  <tr>
    <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php echo $datapinjamend[1]; ?>
    </td>
    <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php echo $datapinjamend[7]; ?> Bln
    </td>
    <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php
        $tapend=(($datapinjamend[1]/$datapinjamend[7]));
        echo $tapend;
      ?>
    </td>
    <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php
        $tjpend=(($datapinjamend[1]*$datapinjamend[8])/100);
        echo $tjpend;
      ?>
    </td>
    <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999; padding-right:5px">
      <?php
        $a=substr($datapinjamend[3],8);
        $b=bulan(substr($datapinjamend[3],5,2));
        $c=substr($datapinjamend[3],0,4);
        echo "$a $b $c";
      ?>
    </td>
    <td align="center" style="border-bottom:1px solid #999; ">
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

  <?php }}else { echo ""; } ?>

  <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
  <tr>
    <th colspan="6" align="left">
      <hr style="margin:0; padding:0; margin-bottom:20px">
    </th>
  </tr>
  <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->

  <tr>
    <td colspan="3" style="background:#ddd; padding-left:5px; padding-top:5px; padding-bottom:5px">Jumlah Penyelesaian :</td>
    <td colspan="3" align="right" style="background:#ddd; padding-right:5px">
      <b>
        <i>
          <?php
            if (isset($totalpinjaman)) {
              $penyelesaian=($nos1-$nop1)-$totalpinjaman;
              echo "Rp. "; echo $penyelesaian;
            }else {
              $penyelesaian=($nos1-$nop1);
              echo "Rp. "; echo $penyelesaian;
            }
          ?>
        </i>
      </b>
    </td>
  </tr>

  <tr>
    <th colspan="6"><hr style="border:1px solid"></th>
  </tr>
</table>

</div>
</div>

<?php } ?>

<!-- <script>
   window.print();
</script> -->
