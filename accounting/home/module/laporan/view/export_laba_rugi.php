<?php
	if (isset($_GET['Export-Laba-Rugi'])) {

        include "../../../model/config/master_koneksi.php";
        include '../../../model/modul/casedate.php';

        $bulan=$_GET['bulan'];
        $tahun=$_GET['tahun'];
        $Set_Last_Date=date("t F Y",strtotime("01-$bulan-$tahun"));
        $Set_Last_Date_Num=date("Y-m-t",strtotime("01-$bulan-$tahun"));

        // $acuansaldo="AND efv_trans<='$Set_Last_Date_Num'";
        $acuansaldo="AND efv_trans BETWEEN '$tahun-01-01' AND '$Set_Last_Date_Num'";

        $name_file = "Laba-Rugi 01 January $tahun sd $Set_Last_Date";

	header("Content-Type: application/xls");
	header("Content-Disposition: attachment; filename=$name_file.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>

<table width="90%" align="center" style="font-family:sans-serif; font-size:13px">

<tr align="center">
    <td colspan="2" style="padding-top:10px;padding-bottom:40px;">
    <div align="center" style="width:100%;font-size:15px; font-family:sans-serif">
      <p style="margin-bottom:5px">PT JASINTEK KARYA ABADI</p>
    </div>
    <div align="center" style="width:100%;font-size:15px; font-family:sans-serif; margin-bottom:0px">
      <p style="margin-top:0px;margin-bottom:5px">LAPORAN PENDAPATAN DAN BEBAN OPERASIONAL</p>
      <p style="margin-top:0px;margin-bottom:0px">
        Untuk Periode 01 January <?=$tahun?> s/d <?php echo $blna=$Set_Last_Date; ?>
      </p>
      <hr style="border: 1px solid">
    </div>
    </td>
</tr>

      <!-- start Laba Rugi 1 -->
      <?php
        $sqlreport_1  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report='301' AND stts_report NOT LIKE '3'";
        $queryreport_1	=mysqli_query($koneksi,$sqlreport_1);
        $datareport_1=mysqli_fetch_array($queryreport_1);
      ?>

      <tr>
        <td colspan="2" style="background:#ddd;padding-top:5px;padding-bottom:5px;padding-left:10px"><b><?php echo strtoupper($datareport_1[1]); ?></b></td>
      </tr>

      <?php
        $ebe_1=0;
    		$sqlgroup_1	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE `stts_group` NOT LIKE '3' AND kd_report = '$datareport_1[0]' ORDER BY id ASC";
    		$querygroup_1	=mysqli_query($koneksi,$sqlgroup_1);
    		while($datagroup_1=mysqli_fetch_array($querygroup_1)){

          $sqlacount_1	  ="SELECT `kd_acount`, `desc_acount` FROM acount WHERE `kd_acount` = '$datagroup_1[1]'";
          $queryacount_1	=mysqli_query($koneksi,$sqlacount_1);
          $dataacount_1   =mysqli_fetch_array($queryacount_1);

          $sf_1=0;
          $tnr_1=0;
          $sqlformula_1	  ="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE `stts_formula` NOT LIKE '3' AND kd_group = '$datagroup_1[0]'";
          $queryformula_1	=mysqli_query($koneksi,$sqlformula_1);
          while($dataformula_1=mysqli_fetch_array($queryformula_1)){

            $sqlsumformula_1=
                      "SELECT
                        SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS DEBIT_1,
                        SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS KREDIT_1
                      FROM trans WHERE
                        stts_trans NOT LIKE '3' AND
                        kd_acount = $dataformula_1[0]
                        $acuansaldo
                      ";
            $querysumformula_1	=mysqli_query($koneksi,$sqlsumformula_1);
            $datasumformula_1  =mysqli_fetch_array($querysumformula_1);

            if ($dataformula_1[2]=='D') {
              $totalmutasi_1=$datasumformula_1['DEBIT_1']-$datasumformula_1['KREDIT_1'];
            }else {
              $totalmutasi_1=$datasumformula_1['KREDIT_1']-$datasumformula_1['DEBIT_1'];
            }
            $sf_1 += $totalmutasi_1;
          }

          if ($sf_1==0) {
            echo "";
          }else {
    	?>
      <tr bgcolor="#fff">
        <td style="padding-left:15px; border-bottom:1px solid #ddd"><?php echo "$dataacount_1[1]"; ?></td>
        <td align="right" style="padding-right:10px; border-bottom:1px solid #ddd">
          <?php
            $labarugi_1=$sf_1;
            $potonglabarugi_1=substr($labarugi_1,0,1);
            if ($labarugi_1==0) {
              echo "-";
            }else {
              if ($potonglabarugi_1=="-") {
                Echo "<font style=color:red>"; echo number_format($labarugi_1,0,',','.'); Echo "</font>";
              }else {
                echo number_format($labarugi_1,0,',','.');
              }
            }

            $ebe_1 += $labarugi_1;
          ?>
        </td>
      </tr>
      <?php }} ?>

      <tr>
        <td style="background:#ddd;padding-top:5px;padding-bottom:5px;padding-left:10px"><b>Total <?php echo $datareport_1[1]; ?></b></td>
        <td align="right" style="background:#ddd;padding-top:5px;padding-bottom:5px;padding-right:10px"><b>
          <?php echo number_format($ebe_1,0,',','.'); ?>
        </b></td>
      </tr>
      <tr><td colspan="2">&nbsp;</td></tr>

      <!-- batas -->



<!-- start Laba Rugi 2 -->
<?php
        $sqlreport_2  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report='302' AND stts_report NOT LIKE '3'";
        $queryreport_2	=mysqli_query($koneksi,$sqlreport_2);
        $datareport_2=mysqli_fetch_array($queryreport_2);
      ?>

      <tr>
        <td colspan="2" style="background:#ddd;padding-top:5px;padding-bottom:5px;padding-left:10px"><b><?php echo strtoupper($datareport_2[1]); ?></b></td>
      </tr>

      <?php
        $ebe_2=0;
    		$sqlgroup_2	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE `stts_group` NOT LIKE '3' AND kd_report = '$datareport_2[0]' ORDER BY id ASC";
    		$querygroup_2	=mysqli_query($koneksi,$sqlgroup_2);
    		while($datagroup_2=mysqli_fetch_array($querygroup_2)){

          $sqlacount_2	  ="SELECT `kd_acount`, `desc_acount` FROM acount WHERE `kd_acount` = '$datagroup_2[1]'";
          $queryacount_2	=mysqli_query($koneksi,$sqlacount_2);
          $dataacount_2   =mysqli_fetch_array($queryacount_2);

          $sf_2=0;
          $tnr_2=0;
          $sqlformula_2	  ="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE `stts_formula` NOT LIKE '3' AND kd_group = '$datagroup_2[0]'";
          $queryformula_2	=mysqli_query($koneksi,$sqlformula_2);
          while($dataformula_2=mysqli_fetch_array($queryformula_2)){

            $sqlsumformula_2=
                      "SELECT
                        SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS DEBIT_2,
                        SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS KREDIT_2
                      FROM trans WHERE
                        stts_trans NOT LIKE '3' AND
                        kd_acount = $dataformula_2[0]
                        $acuansaldo
                      ";
            $querysumformula_2	=mysqli_query($koneksi,$sqlsumformula_2);
            $datasumformula_2  =mysqli_fetch_array($querysumformula_2);

            if ($dataformula_2[2]=='D') {
              $totalmutasi_2=$datasumformula_2['DEBIT_2']-$datasumformula_2['KREDIT_2'];
            }else {
              $totalmutasi_2=$datasumformula_2['KREDIT_2']-$datasumformula_2['DEBIT_2'];
            }
            $sf_2 += $totalmutasi_2;
          }

          if ($sf_2==0) {
            echo "";
          }else {
    	?>
      <tr bgcolor="#fff">
        <td style="padding-left:15px; border-bottom:1px solid #ddd"><?php echo "$dataacount_2[1]"; ?></td>
        <td align="right" style="padding-right:10px; border-bottom:1px solid #ddd">
          <?php
            $labarugi_2=$sf_2;
            $potonglabarugi_2=substr($labarugi_2,0,1);
            if ($labarugi_2==0) {
              echo "-";
            }else {
              if ($potonglabarugi_2=="-") {
                Echo "<font style=color:red>"; echo number_format($labarugi_2,0,',','.'); Echo "</font>";
              }else {
                echo number_format($labarugi_2,0,',','.');
              }
            }

            $ebe_2 += $labarugi_2;
          ?>
        </td>
      </tr>
      <?php }} ?>

      <tr bgcolor="whitesmoke">
        <td style="background:#ddd;padding-top:5px;padding-bottom:5px;padding-left:10px"><b>Total <?php echo $datareport_2[1]; ?></b></td>
        <td align="right" style="background:#ddd;padding-top:5px;padding-bottom:5px;padding-right:10px"><b>
          <?php echo number_format($ebe_2,0,',','.'); ?>
        </b></td>
      </tr>
      <tr><td colspan="2">&nbsp;</td></tr>

      

      <tr bgcolor="whitesmoke">
        <td style="background:#bbb;padding-top:5px;padding-bottom:5px;padding-left:10px"><b>Laba (Rugi) Kotor</b></td>
        <td align="right" style="background:#bbb;padding-top:5px;padding-bottom:5px;padding-right:10px">
          <b style="border-top:1px solid #000; border-bottom:1px solid #000; padding-top:3px; padding-left:5px; padding-bottom:3px">
            <?php
              // echo number_format($ebe_1,0,',','.');
              $jumlah_1=$ebe_1-$ebe_2;
              echo number_format($jumlah_1,0,',','.');
            ?>
          </b>
        </td>
      </tr>

      <!-- batas -->
      <tr bgcolor="whitesmoke"><td colspan="2">&nbsp;</td></tr>
      <!-- batas -->
      
      





<!-- start Laba Rugi 3 -->
<?php
        $sqlreport_3  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report='303' AND stts_report NOT LIKE '3'";
        $queryreport_3	=mysqli_query($koneksi,$sqlreport_3);
        $datareport_3=mysqli_fetch_array($queryreport_3);
      ?>

      <tr>
        <td colspan="2" style="background:#ddd;padding-top:5px;padding-bottom:5px;padding-left:10px"><b><?php echo strtoupper($datareport_3[1]); ?></b></td>
      </tr>

      <?php
        $ebe_3=0;
    		$sqlgroup_3	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE `stts_group` NOT LIKE '3' AND kd_report = '$datareport_3[0]' ORDER BY id ASC";
    		$querygroup_3	=mysqli_query($koneksi,$sqlgroup_3);
    		while($datagroup_3=mysqli_fetch_array($querygroup_3)){

          $sqlacount_3	  ="SELECT `kd_acount`, `desc_acount` FROM acount WHERE `kd_acount` = '$datagroup_3[1]'";
          $queryacount_3	=mysqli_query($koneksi,$sqlacount_3);
          $dataacount_3   =mysqli_fetch_array($queryacount_3);

          $sf_3=0;
          $tnr_3=0;
          $sqlformula_3	  ="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE `stts_formula` NOT LIKE '3' AND kd_group = '$datagroup_3[0]'";
          $queryformula_3	=mysqli_query($koneksi,$sqlformula_3);
          while($dataformula_3=mysqli_fetch_array($queryformula_3)){

            $sqlsumformula_3=
                      "SELECT
                        SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS DEBIT_3,
                        SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS KREDIT_3
                      FROM trans WHERE
                        stts_trans NOT LIKE '3' AND
                        kd_acount = $dataformula_3[0]
                        $acuansaldo
                      ";
            $querysumformula_3	=mysqli_query($koneksi,$sqlsumformula_3);
            $datasumformula_3  =mysqli_fetch_array($querysumformula_3);

            if ($dataformula_3[2]=='D') {
              $totalmutasi_3=$datasumformula_3['DEBIT_3']-$datasumformula_3['KREDIT_3'];
            }else {
              $totalmutasi_3=$datasumformula_3['KREDIT_3']-$datasumformula_3['DEBIT_3'];
            }
            $sf_3 += $totalmutasi_3;
          }

          if ($sf_3==0) {
            echo "";
          }else {
    	?>
      <tr bgcolor="#fff">
        <td style="padding-left:15px; border-bottom:1px solid #ddd"><?php echo "$dataacount_3[1]"; ?></td>
        <td align="right" style="padding-right:10px; border-bottom:1px solid #ddd">
          <?php
            $labarugi_3=$sf_3;
            $potonglabarugi_3=substr($labarugi_3,0,1);
            if ($labarugi_3==0) {
              echo "-";
            }else {
              if ($potonglabarugi_3=="-") {
                Echo "<font style=color:red>"; echo number_format($labarugi_3,0,',','.'); Echo "</font>";
              }else {
                echo number_format($labarugi_3,0,',','.');
              }
            }

            $ebe_3 += $labarugi_3;
          ?>
        </td>
      </tr>
      <?php }} ?>

      <tr>
        <td style="background:#ddd;padding-top:5px;padding-bottom:5px;padding-left:10px"><b>Total <?php echo $datareport_3[1]; ?></b></td>
        <td align="right" style="background:#ddd;padding-top:5px;padding-bottom:5px;padding-right:10px"><b>
          <?php echo number_format($ebe_3,0,',','.'); ?>
        </b></td>
      </tr>
      <tr><td colspan="2">&nbsp;</td></tr>

      <!-- batas -->






      <!-- start Laba Rugi 4 -->
<?php
        $sqlreport_4  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report='304' AND stts_report NOT LIKE '3'";
        $queryreport_4	=mysqli_query($koneksi,$sqlreport_4);
        $datareport_4=mysqli_fetch_array($queryreport_4);
      ?>

      <tr>
        <td colspan="2" style="background:#ddd;padding-top:5px;padding-bottom:5px;padding-left:10px"><b><?php echo strtoupper($datareport_4[1]); ?></b></td>
      </tr>

      <?php
        $ebe_4=0;
    		$sqlgroup_4	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE `stts_group` NOT LIKE '3' AND kd_report = '$datareport_4[0]' ORDER BY id ASC";
    		$querygroup_4	=mysqli_query($koneksi,$sqlgroup_4);
    		while($datagroup_4=mysqli_fetch_array($querygroup_4)){

          $sqlacount_4	  ="SELECT `kd_acount`, `desc_acount` FROM acount WHERE `kd_acount` = '$datagroup_4[1]'";
          $queryacount_4	=mysqli_query($koneksi,$sqlacount_4);
          $dataacount_4   =mysqli_fetch_array($queryacount_4);

          $sf_4=0;
          $tnr_4=0;
          $sqlformula_4	  ="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE `stts_formula` NOT LIKE '3' AND kd_group = '$datagroup_4[0]'";
          $queryformula_4	=mysqli_query($koneksi,$sqlformula_4);
          while($dataformula_4=mysqli_fetch_array($queryformula_4)){

            $sqlsumformula_4=
                      "SELECT
                        SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS DEBIT_4,
                        SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS KREDIT_4
                      FROM trans WHERE
                        stts_trans NOT LIKE '3' AND
                        kd_acount = $dataformula_4[0]
                        $acuansaldo
                      ";
            $querysumformula_4	=mysqli_query($koneksi,$sqlsumformula_4);
            $datasumformula_4  =mysqli_fetch_array($querysumformula_4);

            if ($dataformula_4[2]=='D') {
              $totalmutasi_4=$datasumformula_4['DEBIT_4']-$datasumformula_4['KREDIT_4'];
            }else {
              $totalmutasi_4=$datasumformula_4['KREDIT_4']-$datasumformula_4['DEBIT_4'];
            }
            $sf_4 += $totalmutasi_4;
          }

          if ($sf_4==0) {
            echo "";
          }else {
    	?>
      <tr bgcolor="#fff">
        <td style="padding-left:15px; border-bottom:1px solid #ddd"><?php echo "$dataacount_4[1]"; ?></td>
        <td align="right" style="padding-right:10px; border-bottom:1px solid #ddd">
          <?php
            $labarugi_4=$sf_4;
            $potonglabarugi_4=substr($labarugi_4,0,1);
            if ($labarugi_4==0) {
              echo "-";
            }else {
              if ($potonglabarugi_4=="-") {
                Echo "<font style=color:red>"; echo number_format($labarugi_4,0,',','.'); Echo "</font>";
              }else {
                echo number_format($labarugi_4,0,',','.');
              }
            }

            $ebe_4 += $labarugi_4;
          ?>
        </td>
      </tr>
      <?php }} ?>

      <tr>
        <td style="background:#ddd;padding-top:5px;padding-bottom:5px;padding-left:10px"><b>Total <?php echo $datareport_4[1]; ?></b></td>
        <td align="right" style="background:#ddd;padding-top:5px;padding-bottom:5px;padding-right:10px"><b>
          <?php echo number_format($ebe_4,0,',','.'); ?>
        </b></td>
      </tr>
      <tr><td colspan="2">&nbsp;</td></tr>










      <tr bgcolor="whitesmoke">
        <td style="background:#bbb;padding-top:5px;padding-bottom:5px;padding-left:10px;"><b>Laba (Rugi) Bersih</b></td>
        <td align="right" style="background:#bbb;padding-top:5px;padding-bottom:5px;padding-right:10px;">
          <b style="border-top:1px solid #000; border-bottom:1px solid #000; padding-top:3px; padding-left:5px; padding-bottom:3px">
            <?php
              // $jumlah_2=$ebe_4;
              $jumlah_2=$jumlah_1-$ebe_3+$ebe_4;
              echo number_format($jumlah_2,0,',','.');
            ?>
          </b>
        </td>
      </tr>

      <!-- batas -->
      <tr bgcolor="white"><td colspan="2">&nbsp;</td></tr>
      <!-- batas -->



    </table>

<?php } ?>