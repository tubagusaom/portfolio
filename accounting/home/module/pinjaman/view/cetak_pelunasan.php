<title>Pelunasan Pinjaman Koperasi Karyawan Otsuka Bhakti</title>
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
  <p><strong>Pelunasan Pinjaman Koperasi Karyawan Otsuka Bhakti</strong></p>
</div>

<?php
  include "../../../model/config/master_koneksi.php";

  function bulan($bln){
    $bulan=$bln;
    switch ($bulan) {
      case 1:$bulan="Januari";
      break;
      case 2:$bulan="Februari";
      break;
      case 3:$bulan="Maret";
      break;
      case 4:$bulan="April";
      break;
      case 5:$bulan="Mei";
      break;
      case 6:$bulan="Juni";
      break;
      case 7:$bulan="Juli";
      break;
      case 8:$bulan="Agustus";
      break;
      case 9:$bulan="September";
      break;
      case 10:$bulan="Oktober";
      break;
      case 11:$bulan="November";
      break;
      case 12:$bulan="Desember";
      break;
    }return $bulan;
  }
?>

  <?php
    $reff="$_GET[reff]";
    $sql	  ="SELECT * FROM pinjam WHERE id='$reff'";
    $query	=mysqli_query($koneksi,$sql);
    $data   =mysqli_fetch_array($query);

    $sqla	  ="SELECT * FROM trans_pinjam WHERE jenis_pinjam='pelunasan' AND id_pinjam=$data[0]";
    $querya	=mysqli_query($koneksi,$sqla);
    $dataa	=mysqli_fetch_array($querya);

    $sqlb	  ="SELECT * FROM schm WHERE stts_schm NOT LIKE '3' AND id=$data[11]";
    $queryb	=mysqli_query($koneksi,$sqlb);
    $datab	=mysqli_fetch_array($queryb);

    $sqlc	  ="SELECT * FROM akun WHERE stts_akun NOT LIKE '3' AND id=$datab[11]";
    $queryc	=mysqli_query($koneksi,$sqlc);
    $datac	=mysqli_fetch_array($queryc);
  ?>

<div style="float:right;width:100%" align="center">
  <hr>
</div>

<div style="float:right;width:100%;font-family: sans-serif">
<div style="width:50%;float:left">
<table border="0" cellspacing="0" cellpadding="0" width="100%" style="font-size:14px">
  <tr>
    <td width="103" valign="top"><p>Perihal</p></td>
    <td width="19" valign="top"><p>:</p></td>
    <td width="237" valign="top"><p><u>Pelunasan Pinjaman</u></p></td>
  </tr>
  <tr>
    <td width="103" valign="top"><p>Tanggal Pelunasan</p></td>
    <td width="19" valign="top"><p>:</p></td>
    <td width="237" valign="top"><p>
      <?php
        $a=substr($data[3],8);
        $b=substr($data[3],5,2);
        $c=substr($data[3],0,4);

        echo "$a/$b/$c";
      ?>
    </p></td>
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
    <td width="54%" valign="top"><p><?php echo "$datac[1]"; ?></p></td>
  </tr>

  <tr>
    <td valign="top">Nama</td>
    <td width="5%" valign="top"><p>:</p></td>
    <td valign="top"><?php echo "$datac[2]"; ?></td>
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
    <th colspan="4" align="left">
      Rekening<hr style="margin:0; padding:0">
    </th>
  </tr>
  <tr>
    <td>Bank</td>
    <td width="1%">:</td>
    <td><div align="right">&nbsp;</div></td>
    <td>
      <div><?php echo "$data[4]"; ?></div>
    </td>
  </tr>
  <tr>
    <td width="25%">Norek</td>
    <td width="1%">:</td>
    <td width=""><div align="right">&nbsp;</div></td>
    <td width="15%">
      <div><?php echo "$data[5]"; ?></div>
    </td>
  </tr>
  <tr>
    <td>Pemilik</td>
    <td>:</td>
    <td><div align="right">&nbsp;</div></td>
    <td>
      <div><?php echo "$data[6]"; ?></div>
    </td>
  </tr>
  <tr>
    <th colspan="4">
      &nbsp;
    </th>
  </tr>
  <tr>
    <th colspan="4" align="left">
      Pelunasan<hr style="margin:0; padding:0">
    </th>
  </tr>
  <tr>
    <td>Sisa Angsuran Pokok</td>
    <td width="1%">:</td>
    <td><div align="right">Rp.</div></td>
    <td>
      <div align="right" style="padding-right:5px">
        <?php
  				$sqld	  ="SELECT * FROM trans_pinjam WHERE jenis_pinjam='angsuran' AND id_pinjam=$data[0] ORDER BY id DESC";
  				$queryd	=mysqli_query($koneksi,$sqld);
  				$datad	=mysqli_fetch_array($queryd);

  				$sisa=$data[7]-$datad[1];
  				$ap=($data[1]/$data[7])*$sisa;
  				$rupiah1=number_format($ap,0,',','.');
  				echo "$rupiah1";
  			?>
      </div>
    </td>
  </tr>
  <tr>
    <td>Sisa Jasa Koperasi</td>
    <td>:</td>
    <td><div align="right">Rp.</div></td>
    <td>
      <div align="right" style="padding-right:5px">
        <?php
  				$jk=((($data[1]*$data[8])/100)/$data[7])*$sisa;
  				$rupiah2=number_format($jk,0,',','.');
  				echo "$rupiah2";
  			?>
      </div>
    </td>
  </tr>
  <tr>
    <td><b><i>Total Pelunasan</i></b></td>
    <td>&nbsp;</td>
    <td><div align="right"><b><i>Rp.</i></b></div></td>
    <td>
      <div align="right" style="padding-right:5px">
        <hr style="margin:0; padding:0">
        <b>
          <i>
            <?php
    					$total=$ap+$jk;
    					echo number_format($total,0,',','.');
    				?>
          </i>
        </b>
      </div>
    </td>
  </tr>
  <tr>
    <th colspan="4"><hr style="border:1px solid"></th>
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
		<p align="center" style="margin-top:0"><strong><?php echo "$datac[2]"; ?></strong></p>
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

<!-- <script>
   window.print();
</script> -->
