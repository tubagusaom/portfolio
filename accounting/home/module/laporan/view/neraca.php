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

              // start ketentuan tubagus aom
              $sqlreporttb  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE type_report='100' AND stts_report NOT LIKE '3'";
              $queryreporttb	=mysqli_query($koneksi,$sqlreporttb);
              $datareporttb=mysqli_fetch_array($queryreporttb);

                $sqlgrouptb  	="SELECT `kd_group`, `kd_acount` FROM `report_group` WHERE kd_acount = $dataformula4[0] AND kd_report='$datareporttb[0]' AND stts_group NOT LIKE '3'";
                $querygrouptb	=mysqli_query($koneksi,$sqlgrouptb);
                $datagrouptb  =mysqli_fetch_array($querygrouptb);

                // if ($dataformula4[0]==$datagrouptb[1]) {
                if (isset($datagrouptb)) {

                  $toforD=0;
                  $toforK=0;

                  $sqlformulatb  	="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE kd_group = '$datagrouptb[0]' AND stts_formula NOT LIKE '3'";
                  $queryformulatb	=mysqli_query($koneksi,$sqlformulatb);
                  while($dataformulatb=mysqli_fetch_array($queryformulatb)){
                    $sqlformulastb=
                              "SELECT
                                SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS TBDEBIT,
                                SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS TBKREDIT
                              FROM trans WHERE
                                stts_trans NOT LIKE '3' AND
                                kd_acount = $dataformulatb[0]
                                $acuansaldo
                              ";
                    $queryformulastb	=mysqli_query($koneksi,$sqlformulastb);
                    $dataformulastb   =mysqli_fetch_array($queryformulastb);

                    if ($dataformulatb[2]=='D') {
                      $totalformulaD=$dataformulastb['TBDEBIT']-$dataformulastb['TBKREDIT'];
                      $toforD += $totalformulaD;
                    }else {
                      $totalformulaK=$dataformulastb['TBKREDIT']-$dataformulastb['TBDEBIT'];
                      $toforK += $totalformulaK;
                    }
                  }

                  $hasilformulatb = $toforK-$toforD;
                }
              // end ketentuan tubagus aom

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
                if (isset($hasilformulatb)) {
                  $totalmutasi4=$datasumformula4['DEBIT4']-$datasumformula4['KREDIT4']+$hasilformulatb;
                }else {
                  $totalmutasi4=$datasumformula4['DEBIT4']-$datasumformula4['KREDIT4'];
                }
              }else {
                if (isset($hasilformulatb)) {
                  $totalmutasi4=$datasumformula4['KREDIT4']-$datasumformula4['DEBIT4']+$hasilformulatb;
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
  </tr>

  <tr bgcolor="whitesmoke"><td colspan="4">&nbsp;</td></tr>

  <tr bgcolor="#ddd">
    <!-- start total aktiva -->
    <td width="50%"><b>Jumlah Aktiva</b></td>
    <td align="right" style="border-top:1px solid #000; border-bottom:1px solid #000">
      <b>
        <?php
          $ebe=$tnr1+$tnr3;
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
    <td width="50%"><b>JUMLAH KEWAJIBAN DAN EKUITAS</b></td>
    <td align="right" style="border-top:1px solid #000; border-bottom:1px solid #000">
      <b>
        <?php
          $aom=$tnr2+$tnr4;
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
