<?php
  session_start();
  include '../../../model/modul/casedate.php';
  include "../../../model/config/master_koneksi.php";
  $bulan=$_GET['bulan'];
  $tahun=$_GET['tahun'];
  $Set_Last_Date=date("t - F - Y",strtotime("01-$bulan-$tahun"));
  $Set_Last_Date_Num=date("Y-m-t",strtotime("01-$bulan-$tahun"));

  $acuansaldo="AND efv_trans<='$Set_Last_Date_Num'";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Laba-Rugi s/d <?php echo "$Set_Last_Date"; ?></title>
    <link href="../../../images/b_print.png" rel="icon" type="image/png" />
  </head>

  <body>
    <div align="center" style="width:100%;font-size:15px; font-family:sans-serif">
      <p style="margin-bottom:5px">KOPERASI KARYAWAN OTSUKA BHAKTI</p>
    </div>
    <div align="center" style="width:100%;font-size:15px; font-family:sans-serif; margin-bottom:0px">
      <p style="margin-top:0px;margin-bottom:5px">LAPORAN PENDAPATAN DAN BEBAN OPERASIONAL</p>
      <p style="margin-top:0px;margin-bottom:0px">
        Untuk Periode yang Berakhir Tanggal  <?php echo $blna=$Set_Last_Date; ?>
      </p>
      <hr style="border: 1px solid">
    </div>

    <table width="90%" align="center" style="font-family:sans-serif; font-size:13px">
      <?php
        $aom=1;
        $sqlreport  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE type_report='300' AND stts_report NOT LIKE '3'";
        $queryreport	=mysqli_query($koneksi,$sqlreport);
        while($datareport=mysqli_fetch_array($queryreport)){
      ?>

      <tr bgcolor="whitesmoke">
        <td colspan="2" style="padding-left:10px"><b><?php echo $datareport[1]; ?></b></td>
      </tr>

      <?php
        $ebe[$aom]=0;
    		$sqlgroup	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE `stts_group` NOT LIKE '3' AND kd_report = '$datareport[0]' ORDER BY id ASC";
    		$querygroup	=mysqli_query($koneksi,$sqlgroup);
    		while($datagroup=mysqli_fetch_array($querygroup)){

          $sqlacount	  ="SELECT `kd_acount`, `desc_acount` FROM acount WHERE `kd_acount` = '$datagroup[1]'";
          $queryacount	=mysqli_query($koneksi,$sqlacount);
          $dataacount   =mysqli_fetch_array($queryacount);

          $sf=0;
          $tnr=0;
          $sqlformula	  ="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE `stts_formula` NOT LIKE '3' AND kd_group = '$datagroup[0]'";
          $queryformula	=mysqli_query($koneksi,$sqlformula);
          while($dataformula=mysqli_fetch_array($queryformula)){

            $sqlsumformula=
                      "SELECT
                        SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS DEBIT,
                        SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS KREDIT
                      FROM trans WHERE
                        stts_trans NOT LIKE '3' AND
                        kd_acount = $dataformula[0]
                        $acuansaldo
                      ";
            $querysumformula	=mysqli_query($koneksi,$sqlsumformula);
            $datasumformula  =mysqli_fetch_array($querysumformula);

            if ($dataformula[2]=='D') {
              $totalmutasi=$datasumformula['DEBIT']-$datasumformula['KREDIT'];
            }else {
              $totalmutasi=$datasumformula['KREDIT']-$datasumformula['DEBIT'];
            }
            $sf += $totalmutasi;
          }

          if ($sf==0) {
            echo "";
          }else {
    	?>
      <tr bgcolor="#fff">
        <td style="padding-left:15px; border-bottom:1px solid #ddd"><?php echo "$dataacount[1]"; ?></td>
        <td align="right" style="padding-right:10px; border-bottom:1px solid #ddd">
          <?php
            $labarugi=$sf;
            $potonglabarugi=substr($labarugi,0,1);
            if ($labarugi==0) {
              echo "-";
            }else {
              if ($potonglabarugi=="-") {
                Echo "<font style=color:red>"; echo number_format($labarugi,0,',','.'); Echo "</font>";
              }else {
                echo number_format($labarugi,0,',','.');
              }
            }

            $ebe[$aom] += $labarugi;
          ?>
        </td>
      </tr>
      <?php }} ?>

      <tr bgcolor="whitesmoke">
        <td style="padding-left:10px"><b>Total <?php echo $datareport[1]; ?></b></td>
        <td align="right" style="padding-right:10px"><b>
          <?php echo number_format($ebe[$aom],0,',','.'); ?>
        </b></td>
      </tr>
      <tr><td colspan="2">&nbsp;</td></tr>

      <?php $aom++;} ?>

      <tr bgcolor="whitesmoke">
        <td style="padding-left:10px"><b>Pendapatan (Defisit) - Bersih</b></td>
        <td align="right" style="padding-right:10px">
          <b style="border-top:1px solid #000; border-bottom:1px solid #000; padding-top:3px; padding-left:5px; padding-bottom:3px">
            <?php echo number_format($ebe[1]-$ebe[2],0,',','.'); ?>
          </b>
        </td>
      </tr>
    </table>

    <div style="float:right;width:100%; font-family:sans-serif; font-size:14px; padding-top:50px">
    	<div style="width:30%;float:left; padding-left:10%">
        <p align="left">
          <?php
            date_default_timezone_set("Asia/Jakarta");

            $tgl=date("d");
            $bln=bulan(date("m"));
            $thn=date("Y");
            echo "Jakarta, $tgl $bln $thn";
          ?>
        </p>
        <p align="left">Dibuat oleh :</p>
    		<p align="center">&nbsp;</p>
    		<p align="center">&nbsp;</p>
        <p align="center">&nbsp;</p>
    		<hr style="margin:0;">
    		<p align="center" style="margin-top:0; margin-bottom:0">
          <?php
            $akses=$_SESSION['akses_user'];
            $idakun=$_SESSION['id_akun'];

            $sqlakun	  ="SELECT `nm_akun` FROM `akun` WHERE id='$idakun'";
            $queryakun	=mysqli_query($koneksi,$sqlakun);
            $dataakun   =mysqli_fetch_array($queryakun);

            if ($akses=='ketua'){
    					$hak="Ketua Koperasi";
              $bgcolor="";
            }
    				elseif ($akses=='akunting'){
    					$hak="Akunting";
              $bgcolor="";
            }
    				elseif ($akses=='default'){
    					$hak="Root";
              $bgcolor="";
            }
    				elseif ($akses=='superuser'){
    					$hak="Programmer";
              $bgcolor="";
            }
    				else{
    					$hak="<b style=color:yellow>WARNING</b>";
              $bgcolor="RED";
            }

            if ($idakun==0) {
              echo "Rumah Produktif";
            }else {
              echo $dataakun[0];
            }
          ?>
        </p>
        <p align="center" style="background:<?php Echo "$bgcolor"; ?> ;margin-top:0; margin-bottom:0">
          <?php echo "$hak"; ?>
        </p>
    	</div>
      <div style="width:30%;float:right; padding-right:10%">
        <p align="right">&nbsp;</p>
        <p align="left">Disetujui oleh :</p>
    		<p align="center">&nbsp;</p>
        <p align="center">&nbsp;</p>
    		<p align="center">&nbsp;</p>
    		<hr style="margin:0;">
    		<p align="center" style="margin-top:0; margin-bottom:0">Aropah Heri</p>
        <p align="center" style="margin-top:0; margin-bottom:0">Ketua Koperasi</p>
    	</div>
    </div>
  </body>
</html>
