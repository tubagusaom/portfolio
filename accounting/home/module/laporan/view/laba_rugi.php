<script language="JavaScript" type="text/javascript">
    function checkform ( form )
    {
			if (form.fbulan.value == "") {
        alert( "Pilih Bulan Akhir.!!" );
        form.fbulan.focus();
        return false ;
      }else if (form.ftahun.value == "") {
        alert( "Pilih Tahun.!!" );
        form.ftahun.focus();
        return false ;
      }
      return true ;
    }
</script>

<style>
	.export-excel {
		background-color: #1d6d43;
		color: #fff;
		font-size: 13px;
		height: 27px;
		border: 1px solid #144e30;
		margin-right: 5px;
		border-radius: 4px;
		float: right;
		cursor: pointer;
	}
</style>

<form class="" action="" method="post" onsubmit="return checkform(this);">
<table>
	<tr>
		<td colspan="9"><h1>Laba Rugi</h1></td>
	</tr>

	<tr>
		<td colspan="3">
			<?php
        // include 'model/modul/casedate.php';

        if (isset($_POST['pencarian'])) {
          $fbulan=$_POST['fbulan'];
          $ftahun=$_POST['ftahun'];
          $Set_Last_Date=date("t F Y",strtotime("01-$fbulan-$ftahun"));
          $Set_Last_Date_Num=date("Y-m-t",strtotime("01-$fbulan-$ftahun"));

          

          // REVISI PERUBAHAN
          //
          // $acuansaldo="AND efv_trans<'$ftahun-$fbulan-31'";
          // $acuansaldo="AND efv_trans<='$Set_Last_Date_Num'";
          $acuansaldo="AND efv_trans BETWEEN '$ftahun-01-01' AND '$Set_Last_Date_Num'";

          $aba=bulan(date($fbulan));
          // .date("t - m - y", strtotime(1-$fbulan-$ftahun))

          // var_dump($Set_Last_Date_Num); die();

					echo "Laba-Rugi <b style='text-decoration:underline'>01 January $ftahun</b> s/d <b style='text-decoration:underline'>$Set_Last_Date</b>";
				}else {
          $acuansaldo='';

				  echo "<b>Filter data :</b>";
				}
			?>
		</td>

		<td colspan="6">
			<?php if (isset($_POST['pencarian'])) { ?>

        <a onclick="return confirm('EXPORT Laba-Rugi ?')"
					href="module/laporan/view/export_laba_rugi.php?Export-Laba-Rugi&&bulan=<?php echo $fbulan ?>&&tahun=<?php echo $ftahun ?>">
					<button type="button" class="export-excel" name="export">
            Export <i class="fa fa-file-excel-o"></i>
          </button>
				</a>

        <a href="module/laporan/view/cetak-laba-rugi.php?bulan=<?php echo $fbulan ?>&&tahun=<?php echo $ftahun ?>" target="_blank">
					<input type="button" name="cetak" value="Cetak">
				</a>

				<a href="?Laba-Rugi&&header=Laporan">
					<input type="button" class="bback" name="back" value="Kembali">
				</a>

			<?php }else { ?>

				<button type="submit" name="pencarian" class="cari">
					<i class="fa fa-search"></i>
				</button>

        <select class="acount" name="ftahun">
          <option value="" style="color:darkblue; font-weight:700">Tahun</option>
          <?php
            $ft=thn_awal();
            while ($ft<=thn_akhir())
            {
              echo"<option value='$ft'> $ft </option>";
              $ft=$ft+1;
            }
          ?>
        </select>

        <select class="acount" name="fbulan">
          <option value="" style="color:darkblue; font-weight:700">Bulan Akhir</option>
          <?php
            for($fb=1; $fb<=12; $fb++)
            {
              $bulan=$fb;
              if ($bulan<10){
                $bulan="0$fb";
              }

              $aba=bulan(date($bulan));
              echo"<option value='$bulan'>$aba</option>";
            }
          ?>
        </select>

			<?php } ?>
		</td>
	</tr>
</table>
</form>


<?php if (isset($_POST['pencarian'])) { ?>

<table>

  <!-- start Laba Rugi 1 -->
  <?php
    $sqlreport1  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report='301' AND stts_report NOT LIKE '3'";
    $queryreport1	=mysqli_query($koneksi,$sqlreport1);
    // while($datareport=mysqli_fetch_array($queryreport)){
    $datareport1=mysqli_fetch_array($queryreport1);
  ?>
  <tr bgcolor="#ddd">
    <td colspan="2"><b><?php echo strtoupper($datareport1[1]); ?></b></td>
  </tr>

  <?php
    $ebe1=0;
		$sqlgroup1	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE `stts_group` NOT LIKE '3' AND kd_report = '$datareport1[0]' ORDER BY id ASC";
    // $sqlgroup1	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE `stts_group` NOT LIKE '3' AND kd_report='301' ORDER BY id ASC";
		$querygroup1	=mysqli_query($koneksi,$sqlgroup1);
		while($datagroup1=mysqli_fetch_array($querygroup1)){

      $sqlacount1	  ="SELECT `kd_acount`, `desc_acount` FROM acount WHERE `kd_acount` = '$datagroup1[1]'";
      $queryacount1	=mysqli_query($koneksi,$sqlacount1);
      $dataacount1   =mysqli_fetch_array($queryacount1);

      $sf1=0;
      $tnr1=0;
      $sqlformula1	  ="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE `stts_formula` NOT LIKE '3' AND kd_group = '$datagroup1[0]'";
      $queryformula1	=mysqli_query($koneksi,$sqlformula1);
      while($dataformula1=mysqli_fetch_array($queryformula1)){

        $sqlsumformula1=
                  "SELECT
                    SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS DEBIT1,
                    SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS KREDIT1
                  FROM trans WHERE
                    stts_trans NOT LIKE '3' AND
                    kd_acount = $dataformula1[0]
                    $acuansaldo
                  ";
        $querysumformula1	=mysqli_query($koneksi,$sqlsumformula1);
        $datasumformula1  =mysqli_fetch_array($querysumformula1);

        if ($dataformula1[2]=='D') {
          $totalmutasi1=$datasumformula1['DEBIT1']-$datasumformula1['KREDIT1'];
        }else {
          $totalmutasi1=$datasumformula1['KREDIT1']-$datasumformula1['DEBIT1'];
        }
        $sf1 += $totalmutasi1;
      }

      if ($sf1==0) {
        echo "";
      }else {
	?>
  <tr class="hover" bgcolor="#fff">
    <td><?php echo "$dataacount1[1]"; ?></td>
    <td align="right">
      <?php
        $labarugi1=$sf1;
        $potonglabarugi1=substr($labarugi1,0,1);
        if ($labarugi1==0) {
          echo "-";
        }else {
          if ($potonglabarugi1=="-") {
            Echo "<font style=color:red>"; echo number_format($labarugi1,0,',','.'); Echo "</font>";
          }else {
            echo number_format($labarugi1,0,',','.');
          }
        }

        $ebe1 += $labarugi1;
      ?>
    </td>
  </tr>
  <?php 
    }
  }
?>

  <tr bgcolor="#ddd">
    <td><b>Jumlah <?php echo $datareport1[1]; ?></b></td>
    <td align="right"><b>
      <?php echo number_format($ebe1,0,',','.'); ?>
    </b></td>
  </tr>

  <!-- batas -->
  <tr bgcolor="whitesmoke"><td colspan="2">&nbsp;</td></tr>
  <!-- batas -->






  <!-- start Laba Rugi 2 -->
<?php
    $sqlreport2  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report='302' AND stts_report NOT LIKE '3'";
    $queryreport2	=mysqli_query($koneksi,$sqlreport2);
    $datareport2=mysqli_fetch_array($queryreport2);
  ?>
  <tr bgcolor="#ddd">
    <td colspan="2"><b><?php echo strtoupper($datareport2[1]); ?></b></td>
  </tr>

  <?php
    $ebe2=0;
		$sqlgroup2	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE `stts_group` NOT LIKE '3' AND kd_report = '$datareport2[0]' ORDER BY id ASC";
		$querygroup2	=mysqli_query($koneksi,$sqlgroup2);
		while($datagroup2=mysqli_fetch_array($querygroup2)){

      $sqlacount2	  ="SELECT `kd_acount`, `desc_acount` FROM acount WHERE `kd_acount` = '$datagroup2[1]'";
      $queryacount2	=mysqli_query($koneksi,$sqlacount2);
      $dataacount2   =mysqli_fetch_array($queryacount2);

      $sf2=0;
      $tnr2=0;
      $sqlformula2	  ="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE `stts_formula` NOT LIKE '3' AND kd_group = '$datagroup2[0]'";
      $queryformula2	=mysqli_query($koneksi,$sqlformula2);
      while($dataformula2=mysqli_fetch_array($queryformula2)){

        $sqlsumformula2=
                  "SELECT
                    SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS DEBIT2,
                    SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS KREDIT2
                  FROM trans WHERE
                    stts_trans NOT LIKE '3' AND
                    kd_acount = $dataformula2[0]
                    $acuansaldo
                  ";
        $querysumformula2	=mysqli_query($koneksi,$sqlsumformula2);
        $datasumformula2  =mysqli_fetch_array($querysumformula2);

        if ($dataformula2[2]=='D') {
          $totalmutasi2=$datasumformula2['DEBIT2']-$datasumformula2['KREDIT2'];
        }else {
          $totalmutasi2=$datasumformula2['KREDIT2']-$datasumformula2['DEBIT2'];
        }
        $sf2 += $totalmutasi2;
      }

      if ($sf2==0) {
        echo "";
      }else {
	?>
  <tr class="hover" bgcolor="#fff">
    <td><?php echo "$dataacount2[1]"; ?></td>
    <td align="right">
      <?php
        $labarugi2=$sf2;
        $potonglabarugi2=substr($labarugi2,0,1);
        if ($labarugi2==0) {
          echo "-";
        }else {
          if ($potonglabarugi2=="-") {
            Echo "<font style=color:red>"; echo number_format($labarugi2,0,',','.'); Echo "</font>";
          }else {
            echo number_format($labarugi2,0,',','.');
          }
        }

        $ebe2 += $labarugi2;
      ?>
    </td>
  </tr>
  <?php 
    }
  }
?>

  <tr bgcolor="#ddd">
    <td><b>Jumlah <?php echo $datareport2[1]; ?></b></td>
    <td align="right"><b>
      <?php echo number_format($ebe2,0,',','.'); ?>
    </b></td>
  </tr>

  <!-- batas -->
  <tr bgcolor="whitesmoke"><td colspan="2">&nbsp;</td></tr>
  <!-- batas -->
  
  <tr bgcolor="#999">
    <td><b>Laba (Rugi) Kotor</b></td>
    <td align="right">
      <b style="border-top:1px solid #000; border-bottom:1px solid #000; padding-top:3px; padding-left:5px; padding-bottom:3px">
      <?php
          $jumlah1=$ebe1-$ebe2;
          echo number_format($jumlah1,0,',','.');
      ?>
      </b>
    </td>
  </tr>

  <!-- batas -->
  <tr bgcolor="whitesmoke"><td colspan="2">&nbsp;</td></tr>
  <!-- batas -->








<!-- start Laba Rugi 3 -->
<?php
    $sqlreport3  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report='303' AND stts_report NOT LIKE '3'";
    $queryreport3	=mysqli_query($koneksi,$sqlreport3);
    $datareport3=mysqli_fetch_array($queryreport3);
  ?>
  <tr bgcolor="#ddd">
    <td colspan="2"><b><?php echo strtoupper($datareport3[1]); ?></b></td>
  </tr>

  <?php
    $ebe3=0;
		$sqlgroup3	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE `stts_group` NOT LIKE '3' AND kd_report = '$datareport3[0]' ORDER BY id ASC";
		$querygroup3	=mysqli_query($koneksi,$sqlgroup3);
		while($datagroup3=mysqli_fetch_array($querygroup3)){

      $sqlacount3	  ="SELECT `kd_acount`, `desc_acount` FROM acount WHERE `kd_acount` = '$datagroup3[1]'";
      $queryacount3	=mysqli_query($koneksi,$sqlacount3);
      $dataacount3   =mysqli_fetch_array($queryacount3);

      $sf3=0;
      $tnr3=0;
      $sqlformula3	  ="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE `stts_formula` NOT LIKE '3' AND kd_group = '$datagroup3[0]'";
      $queryformula3	=mysqli_query($koneksi,$sqlformula3);
      while($dataformula3=mysqli_fetch_array($queryformula3)){

        $sqlsumformula3=
                  "SELECT
                    SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS DEBIT3,
                    SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS KREDIT3
                  FROM trans WHERE
                    stts_trans NOT LIKE '3' AND
                    kd_acount = $dataformula3[0]
                    $acuansaldo
                  ";
        $querysumformula3	=mysqli_query($koneksi,$sqlsumformula3);
        $datasumformula3  =mysqli_fetch_array($querysumformula3);

        if ($dataformula3[2]=='D') {
          $totalmutasi3=$datasumformula3['DEBIT3']-$datasumformula3['KREDIT3'];
        }else {
          $totalmutasi3=$datasumformula3['KREDIT3']-$datasumformula3['DEBIT3'];
        }
        $sf3 += $totalmutasi3;
      }

      if ($sf3==0) {
        echo "";
      }else {
	?>
  <tr class="hover" bgcolor="#fff">
    <td><?php echo "$dataacount3[1]"; ?></td>
    <td align="right">
      <?php
        $labarugi3=$sf3;
        $potonglabarugi3=substr($labarugi3,0,1);
        if ($labarugi3==0) {
          echo "-";
        }else {
          if ($potonglabarugi3=="-") {
            Echo "<font style=color:red>"; echo number_format($labarugi3,0,',','.'); Echo "</font>";
          }else {
            echo number_format($labarugi3,0,',','.');
          }
        }

        $ebe3 += $labarugi3;
      ?>
    </td>
  </tr>
  <?php 
    }
  }
?>

  <tr bgcolor="#ddd">
    <td><b>Jumlah <?php echo $datareport3[1]; ?></b></td>
    <td align="right"><b>
      <?php echo number_format($ebe3,0,',','.'); ?>
    </b></td>
  </tr>

  <!-- batas -->
  <tr bgcolor="whitesmoke"><td colspan="2">&nbsp;</td></tr>
  <!-- batas -->

  <!-- start Laba Rugi 4 -->
<?php
    $sqlreport4  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report='304' AND stts_report NOT LIKE '3'";
    $queryreport4	=mysqli_query($koneksi,$sqlreport4);
    $datareport4=mysqli_fetch_array($queryreport4);
  ?>
  <tr bgcolor="#ddd">
    <td colspan="2"><b><?php echo strtoupper($datareport4[1]); ?></b></td>
  </tr>

  <?php
    $ebe4=0;
		$sqlgroup4	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE `stts_group` NOT LIKE '3' AND kd_report = '$datareport4[0]' ORDER BY id ASC";
		$querygroup4	=mysqli_query($koneksi,$sqlgroup4);
		while($datagroup4=mysqli_fetch_array($querygroup4)){

      $sqlacount4	  ="SELECT `kd_acount`, `desc_acount` FROM acount WHERE `kd_acount` = '$datagroup4[1]'";
      $queryacount4	=mysqli_query($koneksi,$sqlacount4);
      $dataacount4   =mysqli_fetch_array($queryacount4);

      $sf4=0;
      $tnr4=0;
      $sqlformula4	  ="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE `stts_formula` NOT LIKE '3' AND kd_group = '$datagroup4[0]'";
      $queryformula4	=mysqli_query($koneksi,$sqlformula4);
      while($dataformula4=mysqli_fetch_array($queryformula4)){

        $sqlsumformula4=
                  "SELECT
                    SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS DEBIT4,
                    SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS KREDIT4
                  FROM trans WHERE
                    stts_trans NOT LIKE '3' AND
                    kd_acount = $dataformula4[0]
                    $acuansaldo
                  ";
        $querysumformula4	=mysqli_query($koneksi,$sqlsumformula4);
        $datasumformula4  =mysqli_fetch_array($querysumformula4);

        if ($dataformula4[2]=='D') {
          $totalmutasi4=$datasumformula4['DEBIT4']-$datasumformula4['KREDIT4'];
        }else {
          $totalmutasi4=$datasumformula4['KREDIT4']-$datasumformula4['DEBIT4'];
        }
        $sf4 += $totalmutasi4;
      }

      if ($sf4==0) {
        echo "";
      }else {
	?>
  <tr class="hover" bgcolor="#fff">
    <td><?php echo "$dataacount4[1]"; ?></td>
    <td align="right">
      <?php
        $labarugi4=$sf4;
        $potonglabarugi4=substr($labarugi4,0,1);
        if ($labarugi4==0) {
          echo "-";
        }else {
          if ($potonglabarugi4=="-") {
            Echo "<font style=color:red>"; echo number_format($labarugi4,0,',','.'); Echo "</font>";
          }else {
            echo number_format($labarugi4,0,',','.');
          }
        }

        $ebe4 += $labarugi4;
      ?>
    </td>
  </tr>
  <?php 
    }
  }
?>

  <tr bgcolor="#ddd">
    <td><b>Jumlah <?php echo $datareport4[1]; ?></b></td>
    <td align="right"><b>
      <?php echo number_format($ebe4,0,',','.'); ?>
    </b></td>
  </tr>

  <!-- batas -->
  <tr bgcolor="whitesmoke"><td colspan="2">&nbsp;</td></tr>
  <!-- batas -->



  <tr bgcolor="#999">
    <td><b>Laba (Rugi) Bersih</b></td>
    <td align="right">
      <b style="border-top:1px solid #000; border-bottom:1px solid #000; padding-top:3px; padding-left:5px; padding-bottom:3px">
      <?php
          // $jumlah2=$ebe4;
          $jumlah2=$jumlah1-$ebe3+$ebe4;
          echo number_format($jumlah2,0,',','.');
      ?>
      </b>
    </td>
  </tr>
</table>

<?php }else{echo "";} ?>
