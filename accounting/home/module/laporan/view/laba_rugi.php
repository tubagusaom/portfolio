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
		<td colspan="9"><h1>Laba Rugi</h1></td>
	</tr>

	<tr>
		<td colspan="3">
			<?php
        // include 'model/modul/casedate.php';

        if (isset($_POST['pencarian'])) {
          $fbulan=$_POST['fbulan'];
          $ftahun=$_POST['ftahun'];
          $Set_Last_Date=date("t - F - Y",strtotime("01-$fbulan-$ftahun"));
          $Set_Last_Date_Num=date("Y-m-t",strtotime("01-$fbulan-$ftahun"));

          // REVISI PERUBAHAN
          //
          // $acuansaldo="AND efv_trans<'$ftahun-$fbulan-31'";
          $acuansaldo="AND efv_trans<='$Set_Last_Date_Num'";

          $aba=bulan(date($fbulan));
          // .date("t - m - y", strtotime(1-$fbulan-$ftahun))
					echo "Laba-Rugi s/d <b style='text-decoration:underline'>$Set_Last_Date</b>";
				}else {
          $acuansaldo='';

				  echo "<b>Filter data :</b>";
				}
			?>
		</td>

		<td colspan="6">
			<?php if (isset($_POST['pencarian'])) { ?>

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
  <?php
    $aom=1;
    $sqlreport  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE type_report='300' AND stts_report NOT LIKE '3'";
    $queryreport	=mysqli_query($koneksi,$sqlreport);
    while($datareport=mysqli_fetch_array($queryreport)){
  ?>
  <tr bgcolor="#ddd">
    <td colspan="2"><b><?php echo $datareport[1]; ?></b></td>
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
  <tr class="hover" bgcolor="#fff">
    <td><?php echo "$dataacount[1]"; ?></td>
    <td align="right">
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

  <tr bgcolor="#ddd">
    <td><b>Total <?php echo $datareport[1]; ?></b></td>
    <td align="right"><b>
      <?php echo number_format($ebe[$aom],0,',','.'); ?>
    </b></td>
  </tr>
  <tr bgcolor="whitesmoke"><td colspan="2">&nbsp;</td></tr>
  <?php $aom++;} ?>
  <tr bgcolor="#ddd">
    <td><b>Pendapatan (Defisit) - Bersih</b></td>
    <td align="right">
      <b style="border-top:1px solid #000; border-bottom:1px solid #000; padding-top:3px; padding-left:5px; padding-bottom:3px">
        <?php echo number_format($ebe[1]-$ebe[2],0,',','.'); ?>
      </b>
    </td>
  </tr>
</table>

<?php }else{echo "";} ?>
