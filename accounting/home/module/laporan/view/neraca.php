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
		<td colspan="9"><h1>Neraca</h1></td>
	</tr>

	<tr>
		<td colspan="3">
			<?php
        // include 'model/modul/casedate.php';

				if (isset($_POST['pencarian'])) {
          $fbulan=$_POST['fbulan'];
          $ftahun=$_POST['ftahun'];

          // Revisi Perubahan
          $Set_Last_Date=date("t - F - Y",strtotime("01-$fbulan-$ftahun"));
          $Set_Last_Date_Num=date("Y-m-t",strtotime("01-$fbulan-$ftahun"));

          $acuansaldo="AND efv_trans<='$Set_Last_Date_Num'";

          $aba=bulan(date($fbulan));
					echo "Neraca s/d <b style='text-decoration:underline'>$Set_Last_Date</b>";
				}else {
          $acuansaldo='';

				  echo "<b>Filter data :</b>";
				}
			?>
		</td>

		<td colspan="6">
			<?php if (isset($_POST['pencarian'])) { ?>
        <!-- aom -->
        <a onclick="return confirm('EXPORT Neraca ?')"
					href="module/laporan/view/export_neraca.php?Export-Neraca&&bulan=<?php echo $fbulan ?>&&tahun=<?php echo $ftahun ?>">
					<button type="button" class="export-excel" name="export">
            Export <i class="fa fa-file-excel-o"></i>
          </button>
				</a>

				<a href="module/laporan/view/cetak-neraca.php?bulan=<?php echo $fbulan ?>&&tahun=<?php echo $ftahun ?>" target="_blank">
					<input type="button" name="cetak" value="Cetak">
				</a>

				<a href="?Neraca&&header=Laporan">
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

<?php
  if (isset($_POST['pencarian'])) {
?>

<table>
  <tr>
    <td colspan="2"><h1>AKTIVA</h1></td>
    <td colspan="2"><h1>KEWAJIBAN DAN EKUITAS</h1></td>
  </tr>
  <tr>
    <!-- start judul aktiva lancar -->
    <?php
      $sqlreport1  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report='201' AND stts_report NOT LIKE '3'";
      $queryreport1	=mysqli_query($koneksi,$sqlreport1);
      $datareport1  =mysqli_fetch_array($queryreport1);
    ?>
    <th colspan="2"><?php echo "$datareport1[1]"; ?></th>
    <!-- end judul aktiva lancar -->

    <!-- start judul kewajiban lancar -->
    <?php
      $sqlreport2  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report='202' AND stts_report NOT LIKE '3'";
      $queryreport2	=mysqli_query($koneksi,$sqlreport2);
      $datareport2  =mysqli_fetch_array($queryreport2);
    ?>
    <th colspan="2"><?php echo "$datareport2[1]"; ?></th>
    <!-- end judul kewajiban lancar -->
  </tr>

  <tr>
    <!-- start aktiva lancar -->
    <td colspan="2" width="50%" style="background:#fff">
      <table style="background:#fff">
        <?php
          $tnr1=0;
      		$sqlgroup1	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE stts_group NOT LIKE '3' AND kd_report = '$datareport1[0]' ORDER BY id ASC";
      		$querygroup1	=mysqli_query($koneksi,$sqlgroup1);
      		while($datagroup1=mysqli_fetch_array($querygroup1))
      		{
            $sqlacountg1	  ="SELECT `desc_acount` FROM `acount` WHERE stts_acount NOT LIKE '3' AND kd_acount = '$datagroup1[1]'";
        		$queryacountg1	=mysqli_query($koneksi,$sqlacountg1);
        		$dataacountg1   =mysqli_fetch_array($queryacountg1);

            $sf1=0;
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
          <td style="border-bottom:1px solid #ddd">
            <?php echo "$dataacountg1[0]"; ?>
          </td>
          <td align="right" style="border-bottom:1px solid #ddd">
            <?php
              $neraca1=$sf1;
              $tnr1 += $neraca1;
              $potongneraca1=substr($neraca1,0,1);

              if ($potongneraca1=="-") {
                Echo "<font style=color:red>"; echo number_format($neraca1,0,',','.'); Echo "</font>";
              }else {
                echo number_format($neraca1,0,',','.');
              }
            ?>
          </td>
        </tr>
        <?php }} ?>
      </table>
    </td>
    <!-- end aktiva lancar -->

    <!-- start Kewajiban Lancar -->
    <td colspan="2" width="50%" style="background:#fff">
      <table style="background:#fff">
        <?php
          $tnr2=0;
      		$sqlgroup2	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE stts_group NOT LIKE '3' AND kd_report = '$datareport2[0]' ORDER BY id ASC";
      		$querygroup2	=mysqli_query($koneksi,$sqlgroup2);
      		while($datagroup2=mysqli_fetch_array($querygroup2))
      		{
            $sqlacountg2	  ="SELECT `desc_acount` FROM `acount` WHERE stts_acount NOT LIKE '3' AND kd_acount = '$datagroup2[1]'";
        		$queryacountg2	=mysqli_query($koneksi,$sqlacountg2);
        		$dataacountg2   =mysqli_fetch_array($queryacountg2);

            $sf2=0;
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
          <td style="border-bottom:1px solid #ddd"><?php echo "$dataacountg2[0]"; ?></td>
          <td align="right" style="border-bottom:1px solid #ddd">
            <?php
              $neraca2=$sf2;
              $tnr2 += $neraca2;
              $potongneraca2=substr($neraca2,0,1);
              if ($neraca2==0) {
                echo "-";
              }else {
                if ($potongneraca2=="-") {
                  Echo "<font style=color:red>"; echo number_format($neraca2,0,',','.'); Echo "</font>";
                }else {
                  echo number_format($neraca2,0,',','.');
                }
              }
            ?>
          </td>
        </tr>
        <?php }} ?>
      </table>
    </td>
    <!-- end Kewajiban Lancar -->
  </tr>

  <tr bgcolor="#ddd">
    <!-- start jumlah aktiva lancar -->
    <td style="padding-left:10px"><b>Jumlah <?php echo "$datareport1[1]"; ?></b></td>
    <td align="right" style="padding-right:10px"><b>
      <?php
        $potongtnr1=substr($tnr1,0,1);
        if ($tnr1==0) {
          echo "-";
        }else {
          if ($potongtnr1=="-") {
            Echo "<font style=color:red>"; echo number_format($tnr1,0,',','.'); Echo "</font>";
          }else {
            echo number_format($tnr1,0,',','.');
          }
        }
      ?>
    </b></td>
    <!-- end jumlah aktiva lancar -->

    <!-- start jumlah Kewajiban Lancar -->
    <td style="padding-left:10px"><b>Jumlah <?php echo "$datareport2[1]"; ?></b></td>
    <td align="right" style="padding-right:10px"><b>
      <?php
        $potongtnr2=substr($tnr2,0,1);
        if ($tnr2==0) {
          echo "-";
        }else {
          if ($potongtnr2=="-") {
            Echo "<font style=color:red>"; echo number_format($tnr2,0,',','.'); Echo "</font>";
          }else {
            echo number_format($tnr2,0,',','.');
          }
        }
      ?>
    </b></td>
    <!-- end jumlah Kewajiban Lancar -->
  </tr>

  <!-- batas -->
  <tr bgcolor="whitesmoke"><td colspan="4">&nbsp;</td></tr>
  <!-- batas -->






  


  <tr>
    <!-- start judul Aset Tetap -->
    <?php
      $sqlreport5  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report='205' AND stts_report NOT LIKE '3'";
      $queryreport5	=mysqli_query($koneksi,$sqlreport5);
      $datareport5  =mysqli_fetch_array($queryreport5);
    ?>
    <th colspan="2"><?php echo "$datareport5[1]"; ?></th>
    <!-- end judul Aset Tetap -->

    <!-- start judul Kewajiban Jangka Panjang -->
    <?php
      $sqlreport6  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report='206' AND stts_report NOT LIKE '3'";
      $queryreport6	=mysqli_query($koneksi,$sqlreport6);
      $datareport6  =mysqli_fetch_array($queryreport6);
    ?>
    <th colspan="2"><?php echo "$datareport6[1]"; ?></th>
    <!-- end judul Kewajiban Jangka Panjang -->
  </tr>

  <tr>
    <!-- start Aset Tetap -->
    <td colspan="2" width="50%" style="background:#fff">
      <table style="background:#fff">
        <?php
          $tnr5=0;
      		$sqlgroup5	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE stts_group NOT LIKE '3' AND kd_report = '$datareport5[0]' ORDER BY id ASC";
      		$querygroup5	=mysqli_query($koneksi,$sqlgroup5);
      		while($datagroup5=mysqli_fetch_array($querygroup5))
      		{
            $sqlacountg5	  ="SELECT `desc_acount` FROM `acount` WHERE stts_acount NOT LIKE '3' AND kd_acount = '$datagroup5[1]'";
        		$queryacountg5	=mysqli_query($koneksi,$sqlacountg5);
        		$dataacountg5   =mysqli_fetch_array($queryacountg5);

            $sf5=0;
            $sqlformula5	  ="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE `stts_formula` NOT LIKE '3' AND kd_group = '$datagroup5[0]'";
            $queryformula5	=mysqli_query($koneksi,$sqlformula5);
            while($dataformula5=mysqli_fetch_array($queryformula5)){

              $sqlsumformula5=
                        "SELECT
                          SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS DEBIT5,
                          SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS KREDIT5
                        FROM trans WHERE
                          stts_trans NOT LIKE '3' AND
                          kd_acount = $dataformula5[0]
                          $acuansaldo
                        ";
              $querysumformula5	=mysqli_query($koneksi,$sqlsumformula5);
              $datasumformula5  =mysqli_fetch_array($querysumformula5);

              if ($dataformula5[2]=='D') {
                $totalmutasi5=$datasumformula5['DEBIT5']-$datasumformula5['KREDIT5'];
              }else {
                $totalmutasi5=$datasumformula5['KREDIT5']-$datasumformula5['DEBIT5'];
              }
              $sf5 += $totalmutasi5;
            }

            if ($sf5==0) {
              echo "";
            }else {
      	?>
        <tr class="hover" bgcolor="#fff">
          <td style="border-bottom:1px solid #ddd">
            <?php echo "$dataacountg5[0]"; ?>
          </td>
          <td align="right" style="border-bottom:1px solid #ddd">
            <?php
              $neraca5=$sf5;
              $tnr5 += $neraca5;
              $potongneraca5=substr($neraca5,0,1);

              if ($potongneraca5=="-") {
                Echo "<font style=color:red>"; echo number_format($neraca5,0,',','.'); Echo "</font>";
              }else {
                echo number_format($neraca5,0,',','.');
              }
            ?>
          </td>
        </tr>
        <?php }} ?>
      </table>
    </td>
    <!-- end Aset Tetap -->

    <!-- start Kewajiban Jangka Panjang -->
    <td colspan="2" width="50%" style="background:#fff">
      <table style="background:#fff">
        <?php
          $tnr6=0;
      		$sqlgroup6	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE stts_group NOT LIKE '3' AND kd_report = '$datareport6[0]' ORDER BY id ASC";
      		$querygroup6	=mysqli_query($koneksi,$sqlgroup6);
      		while($datagroup6=mysqli_fetch_array($querygroup6))
      		{
            $sqlacountg6	  ="SELECT `desc_acount` FROM `acount` WHERE stts_acount NOT LIKE '3' AND kd_acount = '$datagroup6[1]'";
        		$queryacountg6	=mysqli_query($koneksi,$sqlacountg6);
        		$dataacountg6   =mysqli_fetch_array($queryacountg6);

            $sf6=0;
            $sqlformula6	  ="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE `stts_formula` NOT LIKE '3' AND kd_group = '$datagroup6[0]'";
            $queryformula6	=mysqli_query($koneksi,$sqlformula6);
            while($dataformula6=mysqli_fetch_array($queryformula6)){

              $sqlsumformula6=
                        "SELECT
                          SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS DEBIT6,
                          SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS KREDIT6
                        FROM trans WHERE
                          stts_trans NOT LIKE '3' AND
                          kd_acount = $dataformula6[0]
                          $acuansaldo
                        ";
              $querysumformula6	=mysqli_query($koneksi,$sqlsumformula6);
              $datasumformula6  =mysqli_fetch_array($querysumformula6);

              if ($dataformula6[2]=='D') {
                $totalmutasi6=$datasumformula6['DEBIT6']-$datasumformula6['KREDIT6'];
              }else {
                $totalmutasi6=$datasumformula6['KREDIT6']-$datasumformula6['DEBIT6'];
              }
              $sf6 += $totalmutasi6;
            }

            if ($sf6==0) {
              echo "";
            }else {
      	?>
        <tr class="hover" bgcolor="#fff">
          <td style="border-bottom:1px solid #ddd"><?php echo "$dataacountg6[0]"; ?></td>
          <td align="right" style="border-bottom:1px solid #ddd">
            <?php
              $neraca6=$sf6;
              $tnr6 += $neraca6;
              $potongneraca6=substr($neraca6,0,1);
              if ($neraca6==0) {
                echo "-";
              }else {
                if ($potongneraca6=="-") {
                  Echo "<font style=color:red>"; echo number_format($neraca6,0,',','.'); Echo "</font>";
                }else {
                  echo number_format($neraca6,0,',','.');
                }
              }
            ?>
          </td>
        </tr>
        <?php }} ?>
      </table>
    </td>
    <!-- end Kewajiban Jangka Panjang -->
  </tr>

  <tr bgcolor="#ddd">
    <!-- start jumlah Aset Tetap -->
    <td style="padding-left:10px"><b>Jumlah <?php echo "$datareport5[1]"; ?></b></td>
    <td align="right" style="padding-right:10px"><b>
      <?php
        $potongtnr5=substr($tnr5,0,1);
        if ($tnr5==0) {
          echo "-";
        }else {
          if ($potongtnr5=="-") {
            Echo "<font style=color:red>"; echo number_format($tnr5,0,',','.'); Echo "</font>";
          }else {
            echo number_format($tnr5,0,',','.');
          }
        }
      ?>
    </b></td>
    <!-- end jumlah Aset Tetap -->

    <!-- start jumlah Kewajiban Jangka Panjang -->
    <td style="padding-left:10px"><b>Jumlah <?php echo "$datareport6[1]"; ?></b></td>
    <td align="right" style="padding-right:10px"><b>
      <?php
        $potongtnr6=substr($tnr6,0,1);
        if ($tnr6==0) {
          echo "-";
        }else {
          if ($potongtnr6=="-") {
            Echo "<font style=color:red>"; echo number_format($tnr6,0,',','.'); Echo "</font>";
          }else {
            echo number_format($tnr6,0,',','.');
          }
        }
      ?>
    </b></td>
    <!-- end jumlah Kewajiban Jangka Panjang -->
  </tr>

  <!-- batas -->
  <tr bgcolor="whitesmoke"><td colspan="4">&nbsp;</td></tr>
  <!-- batas -->








  


  <tr>
    <!-- start judul Aktiva Lain-Lain -->
    <?php
      $sqlreport3  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report='203' AND stts_report NOT LIKE '3'";
      $queryreport3	=mysqli_query($koneksi,$sqlreport3);
      $datareport3  =mysqli_fetch_array($queryreport3);
    ?>
    <th colspan="2"><?php echo "$datareport3[1]"; ?></th>
    <!-- end judul Aktiva Lain-Lain -->

    <!-- start judul ekuitas -->
    <?php
      $sqlreport4  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report='204' AND stts_report NOT LIKE '3'";
      $queryreport4	=mysqli_query($koneksi,$sqlreport4);
      $datareport4  =mysqli_fetch_array($queryreport4);
    ?>
    <th colspan="2"><?php echo "$datareport4[1]"; ?></th>
    <!-- end judul ekuitas -->
  </tr>

  <tr>
    <!-- start aktiva lain-lain -->
    <td colspan="2" width="50%" style="background:#fff">
      <table style="background:#fff">
        <?php
          $tnr3=0;
      		$sqlgroup3	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE stts_group NOT LIKE '3' AND kd_report = '$datareport3[0]' ORDER BY id ASC";
      		$querygroup3	=mysqli_query($koneksi,$sqlgroup3);
      		while($datagroup3=mysqli_fetch_array($querygroup3))
      		{
            $sqlacountg3	  ="SELECT `desc_acount` FROM `acount` WHERE stts_acount NOT LIKE '3' AND kd_acount = '$datagroup3[1]'";
        		$queryacountg3	=mysqli_query($koneksi,$sqlacountg3);
        		$dataacountg3   =mysqli_fetch_array($queryacountg3);

            $sf3=0;
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
          <td style="border-bottom:1px solid #ddd"><?php echo "$dataacountg3[0]"; ?></td>
          <td align="right" style="border-bottom:1px solid #ddd">
            <?php
              $neraca3=$sf3;
              $tnr3 += $neraca3;
              $potongneraca3=substr($neraca3,0,1);
              if ($neraca3==0) {
                echo "-";
              }else {
                if ($potongneraca3=="-") {
                  Echo "<font style=color:red>"; echo number_format($neraca3,0,',','.'); Echo "</font>";
                }else {
                  echo number_format($neraca3,0,',','.');
                }
              }
            ?>
          </td>
        </tr>
        <?php }} ?>
      </table>
    </td>
    <!-- end aktiva lain-lain -->

    <!-- start ekuitas -->
    <td colspan="2" width="50%" style="background:#fff">
      <table style="background:#fff">
        <?php
          $tnr4=0;
      		$sqlgroup4	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE stts_group NOT LIKE '3' AND kd_report = '$datareport4[0]' ORDER BY id ASC";
      		$querygroup4	=mysqli_query($koneksi,$sqlgroup4);
      		while($datagroup4=mysqli_fetch_array($querygroup4))
      		{
            $sqlacountg4	  ="SELECT `desc_acount` FROM `acount` WHERE stts_acount NOT LIKE '3' AND kd_acount = '$datagroup4[1]'";
        		$queryacountg4	=mysqli_query($koneksi,$sqlacountg4);
        		$dataacountg4   =mysqli_fetch_array($queryacountg4);

            $sf4=0;
            $sqlformula4	  ="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE `stts_formula` NOT LIKE '3' AND kd_group = '$datagroup4[0]'";
            $queryformula4	=mysqli_query($koneksi,$sqlformula4);
            while($dataformula4=mysqli_fetch_array($queryformula4)){

              // start ketentuan ekuitas - laba kotor tubagus aom
              $sqlreporttb_lb_1  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE type_report='400' AND stts_report NOT LIKE '3'";
              $queryreporttb_lb_1	=mysqli_query($koneksi,$sqlreporttb_lb_1);
              $datareporttb_lb_1=mysqli_fetch_array($queryreporttb_lb_1);

                $sqlgrouptb_lb_1  	="SELECT `kd_group`, `kd_acount` FROM `report_group` WHERE kd_acount = $dataformula4[0] AND kd_report='$datareporttb_lb_1[0]' AND stts_group NOT LIKE '3'";
                $querygrouptb_lb_1	=mysqli_query($koneksi,$sqlgrouptb_lb_1);
                $datagrouptb_lb_1  =mysqli_fetch_array($querygrouptb_lb_1);

                // if ($dataformula4[0]==$datagrouptb[1]) {
                  $hasilformulatb_lb_1=0;
                  $toforD_lb_1=0;
                  $toforK_lb_1=0;
                if (isset($datagrouptb_lb_1)) {

                  $sqlformulatb_lb_1  	="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE kd_group = '$datagrouptb_lb_1[0]' AND stts_formula NOT LIKE '3'";
                  $queryformulatb_lb_1	=mysqli_query($koneksi,$sqlformulatb_lb_1);
                  while($dataformulatb_lb_1=mysqli_fetch_array($queryformulatb_lb_1)){
                    $sqlformulastb_lb_1=
                              "SELECT
                                SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS TBDEBIT_lb_1,
                                SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS TBKREDIT_lb_1
                              FROM trans WHERE
                                stts_trans NOT LIKE '3' AND
                                kd_acount = $dataformulatb_lb_1[0]
                                $acuansaldo
                              ";
                    $queryformulastb_lb_1	=mysqli_query($koneksi,$sqlformulastb_lb_1);
                    $dataformulastb_lb_1   =mysqli_fetch_array($queryformulastb_lb_1);

                    if ($dataformulatb_lb_1[2]=='D') {
                      $totalformulaD_lb_1=$dataformulastb_lb_1['TBDEBIT_lb_1']-$dataformulastb_lb_1['TBKREDIT_lb_1'];
                      $toforD_lb_1 += $totalformulaD_lb_1;
                    }else {
                      $totalformulaK_lb_1=$dataformulastb_lb_1['TBKREDIT_lb_1']-$dataformulastb_lb_1['TBDEBIT_lb_1'];
                      $toforK_lb_1 += $totalformulaK_lb_1;
                    }
                  }

                  $hasilformulatb_lb_1 = $toforK_lb_1+$toforD_lb_1;
                }
              // end ketentuan ekuitas - laba kotor tubagus aom

              // start ketentuan ekuitas - laba bersih tubagus aom
              $sqlreporttb_lb_2  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE type_report='100' AND stts_report NOT LIKE '3'";
              $queryreporttb_lb_2	=mysqli_query($koneksi,$sqlreporttb_lb_2);
              $datareporttb_lb_2=mysqli_fetch_array($queryreporttb_lb_2);

                $sqlgrouptb_lb_2  	="SELECT `kd_group`, `kd_acount` FROM `report_group` WHERE kd_acount = $dataformula4[0] AND kd_report='$datareporttb_lb_2[0]' AND stts_group NOT LIKE '3'";
                $querygrouptb_lb_2	=mysqli_query($koneksi,$sqlgrouptb_lb_2);
                $datagrouptb_lb_2  =mysqli_fetch_array($querygrouptb_lb_2);

                // if ($dataformula4[0]==$datagrouptb[1]) {
                  $toforD_lb_2=0;
                  $toforK_lb_2=0;
                if (isset($datagrouptb_lb_2)) {

                  $sqlformulatb_lb_2  	="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE kd_group = '$datagrouptb_lb_2[0]' AND stts_formula NOT LIKE '3'";
                  $queryformulatb_lb_2	=mysqli_query($koneksi,$sqlformulatb_lb_2);
                  while($dataformulatb_lb_2=mysqli_fetch_array($queryformulatb_lb_2)){
                    $sqlformulastb_lb_2=
                              "SELECT
                                SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS TBDEBIT_lb_2,
                                SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS TBKREDIT_lb_2
                              FROM trans WHERE
                                stts_trans NOT LIKE '3' AND
                                kd_acount = $dataformulatb_lb_2[0]
                                $acuansaldo
                              ";
                    $queryformulastb_lb_2	=mysqli_query($koneksi,$sqlformulastb_lb_2);
                    $dataformulastb_lb_2   =mysqli_fetch_array($queryformulastb_lb_2);

                    if ($dataformulatb_lb_2[2]=='D') {
                      $totalformulaD_lb_2=$dataformulastb_lb_2['TBDEBIT_lb_2']-$dataformulastb_lb_2['TBKREDIT_lb_2'];
                      $toforD_lb_2 += $totalformulaD_lb_2;
                    }else {
                      $totalformulaK_lb_2=$dataformulastb_lb_2['TBKREDIT_lb_2']-$dataformulastb_lb_2['TBDEBIT_lb_2'];
                      $toforK_lb_2 += $totalformulaK_lb_2;
                    }
                  }

                  $hasilformulatb_lb_2 = $toforD_lb_2+$toforK_lb_2;
                }
              // end ketentuan ekuitas - laba bersih tubagus aom

              // start ketentuan laba kotor - laba bersih tubagus aom
              // $hasilketentuantb = $hasilformulatb_lb_2;
              $hasilketentuantb = $hasilformulatb_lb_1-$toforD_lb_2+$toforK_lb_2;
              // end ketentuan laba kotor - laba bersih tubagus aom

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
                if (isset($hasilformulatb_lb_2)) {
                  $totalmutasi4=$datasumformula4['DEBIT4']-$datasumformula4['KREDIT4']+$hasilketentuantb;
                }else {
                  $totalmutasi4=$datasumformula4['DEBIT4']-$datasumformula4['KREDIT4'];
                }
              }else {
                if (isset($hasilformulatb_lb_2)) {
                  $totalmutasi4=$datasumformula4['KREDIT4']-$datasumformula4['DEBIT4']+$hasilketentuantb;
                }else {
                  $totalmutasi4=$datasumformula4['KREDIT4']-$datasumformula4['DEBIT4'];
                }
              }
              $sf4 += $totalmutasi4;
            }

            if ($sf4==0) {
              echo "";
            }else {
      	?>
        <tr class="hover" bgcolor="#fff">
          <td style="border-bottom:1px solid #ddd"><?php echo "$dataacountg4[0]"; ?></td>
          <td align="right" style="border-bottom:1px solid #ddd">
            <?php
                $neraca4=$sf4;
                $tnr4 += $neraca4;
                $potongneraca4=substr($neraca4,0,1);
                if ($neraca4==0) {
                  echo "-";
                }else {
                  if ($potongneraca4=="-") {
                    echo "<font style=color:red>"; echo number_format($neraca4,0,',','.'); Echo "</font>";
                  }else {
                    echo number_format($neraca4,0,',','.');
                  }
                }
            ?>
          </td>
        </tr>
        <?php }} ?>
      </table>
    </td>
    <!-- end ekuitas -->
  </tr>

  <tr bgcolor="#ddd">
    <!-- start jumlah aktiva lain-lain -->
    <td style="padding-left:10px"><b>Jumlah <?php echo "$datareport3[1]"; ?></b></td>
    <td align="right" style="padding-right:10px"><b>
      <?php
        $potongtnr3=substr($tnr3,0,1);
        if ($tnr3==0) {
          echo "-";
        }else {
          if ($potongtnr3=="-") {
            Echo "<font style=color:red>"; echo number_format($tnr3,0,',','.'); Echo "</font>";
          }else {
            echo number_format($tnr3,0,',','.');
          }
        }
      ?>
    </b></td>
    <!-- end jumlah aktiva lain-lain -->

    <!-- start jumlah ekuitas -->
    <td style="padding-left:10px"><b>Jumlah <?php echo "$datareport4[1]"; ?></b></td>
    <td align="right" style="padding-right:10px"><b>
      <?php
        $potongtnr4=substr($tnr4,0,1);
        if ($tnr4==0) {
          echo "-";
        }else {
          if ($potongtnr4=="-") {
            Echo "<font style=color:red>"; echo number_format($tnr4,0,',','.'); Echo "</font>";
          }else {
            echo number_format($tnr4,0,',','.');
          }
        }
      ?>
    </b></td>
    <!-- end jumlah ekuitas -->

  <!-- batas -->
  <tr bgcolor="whitesmoke"><td colspan="4">&nbsp;</td></tr>
  <!-- batas -->










  <tr bgcolor="#ddd">
    <!-- start total aktiva -->
    <td width="50%"><b>TOTAL AKTIVA</b></td>
    <td align="right" style="border-top:1px solid #000; border-bottom:1px solid #000">
      <b>
        <?php
          $ebe=$tnr1+$tnr5+$tnr3;
          // $ebe=$tnr5;
          $potongebe=substr($ebe,0,1);

          if ($ebe==0) {
            echo "-";
          }else {
            if ($potongebe=="-") {
              Echo "<font style=color:red>"; echo number_format($ebe,0,',','.'); Echo "</font>";
            }else {
              echo number_format($ebe,0,',','.');
            }
          }
        ?>
      </b>
    </td>
    <!-- end strt aktiva -->

    <!-- start total kewajiban -->
    <td width="50%"><b>TOTAL KEWAJIBAN DAN EKUITAS</b></td>
    <td align="right" style="border-top:1px solid #000; border-bottom:1px solid #000">
      <b>
        <?php
          $aom=$tnr2+$tnr6+$tnr4;
          $potongaom=substr($aom,0,1);

          if ($aom==0) {
            echo "-";
          }else {
            if ($potongaom=="-") {
              Echo "<font style=color:red>"; echo number_format($aom,0,',','.'); Echo "</font>";
            }else {
              echo number_format($aom,0,',','.');
            }
          }
        ?>
      </b>
    </td>
    <!-- end total kewajiban -->
  </tr>
</table>

<?php }else{echo "";} ?>
