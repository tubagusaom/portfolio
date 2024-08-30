<script language="JavaScript" type="text/javascript">
    function checkform ( form )
    {
			if (form.fbulana.value == "") {
        alert( "Pilih Bulan Awal.!!" );
        form.fbulana.focus();
        return false ;
      }else if (form.fbulanb.value == "") {
        alert( "Pilih Bulan Akhir.!!" );
        form.fbulanb.focus();
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
		<td colspan="60"><h1>Neraca Lajur</h1></td>
	</tr>

	<tr>
		<td colspan="10">
			<?php
        // include 'model/modul/casedate.php';
				if (isset($_POST['pencarian'])) {

          $ftahun=$_POST['ftahun'];
          $fbulana=$_POST['fbulana'];
          $fbulanb=$_POST['fbulanb'];

          $aba=bulan(date($fbulana));
          $abb=bulan(date($fbulanb));

					echo "Filter berdasarkan Bulan <b style='text-decoration:underline; color:darkblue'>$aba</b> s/d <b style='text-decoration:underline; color:darkblue'>$abb</b>, Tahun <b style='text-decoration:underline; color:darkblue'>$ftahun</b>";
				}else {
				  echo "<b>Filter data :</b>";
				}
			?>
		</td>

		<td colspan="50">
			<?php if (isset($_POST['pencarian'])) { ?>

				<a href="module/laporan/view/cetak-neraca-lajur.php?bulanawal=<?php echo $fbulana ?>&&bulanakhir=<?php echo $fbulanb ?>&&tahun=<?php echo $ftahun ?>" target="_blank">
					<input type="button" name="cetak" value="Cetak">
				</a>

				<a href="?Neraca-Lajur&&header=Laporan">
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

        <select class="acount" name="fbulanb">
          <option value="" style="color:darkblue; font-weight:700">Bulan Akhir</option>
          <?php
            for($fbb=1; $fbb<=12; $fbb++)
            {
              $bulanb=$fbb;
              if ($bulanb<10)
              {$bulanb="0$fbb";}
              $abab=bulan(date($bulanb));
              echo"<option value='$bulanb'>$abab</option>";
            }
          ?>
        </select>

        <select class="acount" name="fbulana">
          <option value="" style="color:darkblue; font-weight:700">Bulan Awal</option>
          <?php
            for($fba=1; $fba<=12; $fba++)
            {
              $bulana=$fba;
              if ($bulana<10){$bulana="0$fba";}
              $abaa=bulan(date($bulana));
              echo"<option value='$bulana'>$abaa</option>";
            }
          ?>
        </select>

			<?php } ?>
		</td>
	</tr>

  <?php if (isset($_POST['pencarian'])) { ?>

	<tr align="center">
		<th rowspan="2">Rek</th>
		<th rowspan="2" width="30%">Nama Rekening</th>
    <th rowspan="2" width="1%"></th>
    <th colspan="2" width="14%">Saldo Awal</th>

    <?php
      $aom=1;
      $ft=$fbulana;
      while ($ft<=$fbulanb)
      {
        $dsaldo[$ft]=0;
        $ksaldo[$ft]=0;

        // tubagus
        if(fmod($aom,3)==1)
          {$ebe="rgba(0,0,0,0.6)";}
        elseif(fmod($aom,3)==2)
          {$ebe="rgba(0,0,0,0.5)";}
        else
          {$ebe="rgba(0,0,0,0.4)";}
    ?>

		<th colspan="2" width="14%" style="background:<?php echo "$ebe" ?>; color:#fff">Mutasi <?php echo $blna=bulan(date("$ft")); ?></th>

    <?php $aom++;$ft=$ft+1;} ?>

    <th colspan="2" width="14%" style="background:rgb(240, 181, 195)">Total Mutasi</th>
		<th colspan="2" width="14%" style="background:rgb(224, 245, 142)">Laba Rugi <?php echo "$ftahun"; ?></th>
    <th colspan="2" width="14%" style="background:rgb(184, 240, 181)">Neraca 31/12/<?php echo "$ftahun"; ?></th>
  </tr>

  <tr align="center">

    <th>Debet</th>
    <th>Kredit</th>

    <?php
      $aom=1;
      $ft=$fbulana;
      while ($ft<=$fbulanb)
      {
        // tubagus
        if(fmod($aom,3)==1)
          {$ebe="rgba(0,0,0,0.6)";}
        elseif(fmod($aom,3)==2)
          {$ebe="rgba(0,0,0,0.5)";}
        else
          {$ebe="rgba(0,0,0,0.4)";}
    ?>

    <th style="background:<?php echo "$ebe" ?>; color:#fff">Debet</th>
    <th style="color:#fff">Kredit</th>

    <?php $aom++;$ft=$ft+1;} ?>

    <th style="background:rgba(0,0,0,0.2)">Debet</th>
    <th>Kredit</th>
    <th style="background:rgba(0,0,0,0.2)">Debet</th>
    <th>Kredit</th>
    <th style="background:rgba(0,0,0,0.2)">Debet</th>
    <th>Kredit</th>
  </tr>

  <?php
    $no=1;
    $tdsaldoawal=0;
    $tksaldoawal=0;
    $lrd=0;
    $lrk=0;
    $tnd=0;
    $tnk=0;

    $acuantrans="AND efv_trans BETWEEN '$ftahun-$fbulana-01' AND '$ftahun-$fbulanb-31'";
    $acuansaldo="AND efv_trans<'$ftahun-$fbulana-01'";

    $sql  	="SELECT `id_acount`, `jenis_conf` FROM `conf_acount` WHERE stts_conf NOT LIKE '3' ORDER BY id_acount ASC";
    $query	=mysqli_query($koneksi,$sql);
    while($data=mysqli_fetch_array($query))
    {
      if(fmod($no,2)==1)
      {$warna="ghostwhite";}
      else
      {$warna="whitesmoke";}

      $sqlac	  ="SELECT `kd_acount`, `desc_acount`, `jenis_acount` FROM acount WHERE stts_acount NOT LIKE '3' AND kd_acount=$data[0]";
      $queryac	=mysqli_query($koneksi,$sqlac);
      $dataac   =mysqli_fetch_array($queryac);

      $sqlsaldo=
                "SELECT
                  SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS DEBIT,
                  SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS KREDIT
                FROM trans WHERE
                  stts_trans NOT LIKE '3' AND
                  kd_acount = $data[0]
                  $acuansaldo
                ";
      $querysaldo	=mysqli_query($koneksi,$sqlsaldo);
      $datasaldo=mysqli_fetch_array($querysaldo);
  ?>

  <tr class="hover" bgcolor="<?php echo "$warna" ?>">
    <td><?php echo "$data[0]"; ?></td>
    <td><?php echo "$dataac[1]"; ?></td>
    <td><?php echo "$dataac[2]"; ?></td>

    <!-- saldo awal -->
    <td align="right" width="7%">
      <?php
        $saldodebit=$datasaldo['DEBIT'];
        if ($saldodebit==0) {
          echo "-";
        }else {
          echo number_format($saldodebit,0,',','.');
        }
        $tdsaldoawal += $saldodebit;
      ?>
    </td>
    <td align="right" width="7%">
      <?php
        $saldokredit=$datasaldo['KREDIT'];
        if ($saldokredit==0) {
          echo "-";
        }else {
          echo number_format($saldokredit,0,',','.');
        }
        $tksaldoawal += $saldokredit;
      ?>
    </td>
    <!-- end saldo awal -->

    <!-- while mutasi -->
    <?php
      $totalmutasid[$no]=0;
      $totalmutasik[$no]=0;
      $ft=$fbulana;
      while ($ft<=$fbulanb){
        $sqltrans=
                  "SELECT
                    SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS TRANSDEBIT,
                    SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS TRANSKREDIT
                  FROM trans WHERE
                    stts_trans NOT LIKE '3' AND
                    kd_acount = $data[0] AND
                    MONTH(efv_trans)='$ft'
                    $acuantrans
                  ";
        $querytrans	=mysqli_query($koneksi,$sqltrans);
        $datatrans  =mysqli_fetch_array($querytrans);

        $totalmutasid[$no] += $datatrans[0];
        $totalmutasik[$no] += $datatrans[1];

    ?>

    <td align="right" width="7%" style="background:rgba(178, 193, 235, 0.2)">
      <?php
        $tstd=$datatrans['TRANSDEBIT'];
        if ($datatrans['TRANSDEBIT']==0) {
          echo "-";
        }else {
					echo number_format($tstd,0,',','.');
        }
        $dsaldo[$ft] += $tstd;
      ?>
    </td>
    <td align="right" width="7%">
      <?php
        $tstk=$datatrans['TRANSKREDIT'];
        if ($datatrans['TRANSKREDIT']==0) {
          echo "-";
        }else {
            echo number_format($tstk,0,',','.');
        }
        $ksaldo[$ft] += $tstk;
      ?>
    </td>

    <?php $ft=$ft+1;} ?>
    <!-- end while mutasi -->

    <!-- start total mutasi -->
    <td align="right" width="7%" style="background:rgba(240, 181, 195, 0.2)">
      <?php
        if ($totalmutasid[$no]==0) {
          echo "-";
        }else {
          echo number_format($totalmutasid[$no],0,',','.');
        }
      ?>
    </td>
    <td align="right" width="7%">
      <?php
        if ($totalmutasik[$no]==0) {
          echo "-";
        }else {
          echo number_format($totalmutasik[$no],0,',','.');
        }
      ?>
    </td>
    <!-- end total mutasi -->

    <!-- laba-rugi -->
    <td align="right" width="7%" style="background:rgba(224, 245, 142, 0.3)">
      <?php
        $sqlreport  	="SELECT `kd_report` FROM `report` WHERE kd_report = '101' AND stts_report NOT LIKE '3'";
        $queryreport	=mysqli_query($koneksi,$sqlreport);
        $datareport   =mysqli_fetch_array($queryreport);

        $sqlgroup  	="SELECT `kd_group`, `kd_acount` FROM `report_group` WHERE kd_acount = $data[0] AND kd_report='$datareport[0]' AND stts_group NOT LIKE '3'";
        $querygroup	=mysqli_query($koneksi,$sqlgroup);
        $datagroup   =mysqli_fetch_array($querygroup);

        if (isset($datagroup)) {
          $toforD=0;
          $toforK=0;

          $sqlformula  	="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE kd_group = '$datagroup[0]' AND stts_formula NOT LIKE '3'";
          $queryformula	=mysqli_query($koneksi,$sqlformula);
          while($dataformula=mysqli_fetch_array($queryformula)){

            $sqlformulamutasi=
                      "SELECT
                        SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS FTMDEBIT,
                        SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS FTMKREDIT
                      FROM trans WHERE
                        stts_trans NOT LIKE '3' AND
                        kd_acount = $dataformula[0]
                        $acuantrans
                      ";
            $queryformulamutasi	=mysqli_query($koneksi,$sqlformulamutasi);
            $dataformulamutasi  =mysqli_fetch_array($queryformulamutasi);

            $sqlformulasaldoawal=
                      "SELECT
                        SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS FSADEBIT,
                        SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS FSAKREDIT
                      FROM trans WHERE
                        stts_trans NOT LIKE '3' AND
                        kd_acount = $dataformula[0]
                        $acuansaldo
                      ";
            $queryformulasaldoawal	=mysqli_query($koneksi,$sqlformulasaldoawal);
            $dataformulasaldoawal   =mysqli_fetch_array($queryformulasaldoawal);

            if ($dataformula[2]=='D') {
              $totalformulaD=(($dataformulasaldoawal['FSADEBIT']+$dataformulamutasi['FTMDEBIT'])-($dataformulasaldoawal['FSAKREDIT']+$dataformulamutasi['FTMKREDIT']));
              $toforD += $totalformulaD;
            }else {
              $totalformulaK=(($dataformulasaldoawal['FSAKREDIT']+$dataformulamutasi['FTMKREDIT'])-($dataformulasaldoawal['FSADEBIT']+$dataformulamutasi['FTMDEBIT']));
              $toforK += $totalformulaK;
            }
          }

            $labarugikredit=$datasaldo['KREDIT']+$totalmutasik[$no]-$totalmutasid[$no];
            $labarugidebit=$datasaldo['DEBIT']+$totalmutasid[$no]-$totalmutasik[$no];
            $tofor = $toforK-$toforD;

              if ($dataac[2]=="D") {
                $hasilformula=$tofor+$labarugidebit;
              }else {
                $hasilformula=$tofor+$labarugikredit;
              }

            echo "<b>"; echo number_format($hasilformula,0,',','.'); echo "</b>";
          }else {

          if ($dataac[2]=="D") {
            if ($data[1]==1) {
              $labarugidebit=($datasaldo['DEBIT']+$totalmutasid[$no])-($datasaldo['KREDIT']+$totalmutasik[$no]);
              $potonglrd=substr($labarugidebit,0,1);

              if ($labarugidebit==0) {
                echo "-";
              }else {
                if ($potonglrd=="-") {
                  Echo "<font style=color:red>"; echo number_format($labarugidebit,0,',','.'); Echo "</font>";
                }else {
                  echo number_format($labarugidebit,0,',','.');
                }
              }

              $lrd += $labarugidebit;
            }else {
              echo "";
            }
          }else {
            echo "";
          }
        }
      ?>
    </td>
    <td align="right" width="7%">
      <?php
        if ($dataac[2]=="K") {
          if ($data[1]==1) {
            $labarugikredit=($datasaldo['KREDIT']+$totalmutasik[$no])-($datasaldo['DEBIT']+$totalmutasid[$no]);
            $potonglrk=substr($labarugikredit,0,1);

            if ($labarugikredit==0) {
              echo "-";
            }else {
              if ($potonglrk=="-") {
                Echo "<font style=color:red>"; echo number_format($labarugikredit,0,',','.'); Echo "</font>";
              }else {
                echo number_format($labarugikredit,0,',','.');
              }
            }

            $lrk += $labarugikredit;
          }else {
            echo "";
          }
        }else {
          echo "";
        }
      ?>
    </td>
    <!-- end laba-rugi -->

    <!-- neraca -->
    <td align="right" width="7%" style="background:rgba(184, 240, 181, 0.3)">
      <?php
        if (isset($datagroup)) {
          if ($dataac[2]=="D") {
            $totalneraca=$tofor+$labarugidebit;
            if ($totalneraca==0) {
              echo "-";
            }else {
              echo number_format($totalneraca,0,',','.');
            }
          }else {
            $totalneraca="";
          }
        }

        if ($dataac[2]=="D") {
          if ($data[1]==2) {
            $nd=($datasaldo['DEBIT']+$totalmutasid[$no])-($datasaldo['KREDIT']+$totalmutasik[$no]);
            $potongnd=substr($nd,0,1);

            if ($nd==0) {
              echo "-";
            }else {
              if ($potongnd=="-") {
                Echo "<font style=color:red>"; echo number_format($nd,0,',','.'); Echo "</font>";
              }else {
                echo number_format($nd,0,',','.');
              }
            }

            $tnd += $nd;
          }else {
            echo "";
          }
        }else {
          echo "";
        }
      ?>
    </td>

    <td align="right" width="7%">
      <?php
        if (isset($datagroup)) {
          if ($dataac[2]=="K") {
            $totalneraca=$tofor+$labarugikredit;
            if ($totalneraca==0) {
              echo "-";
            }else {
              echo number_format($totalneraca,0,',','.');
            }
          }else {
            $totalneraca="";
          }
        }

        if ($dataac[2]=="K") {
          if ($data[1]==2) {
            $nk=($datasaldo['KREDIT']+$totalmutasik[$no])-($datasaldo['DEBIT']+$totalmutasid[$no]);
            $potongnk=substr($nk,0,1);

            if ($nk==0) {
              echo "-";
            }else {
              if ($potongnk=="-") {
                Echo "<font style=color:red>"; echo number_format($nk,0,',','.'); Echo "</font>";
              }else {
                echo number_format($nk,0,',','.');
              }
            }

            $tnk += $nk;
          }else {
            echo "";
          }
        }else {
          echo "";
        }
      ?>
    </td>
    <!-- end neraca -->
  </tr>

  <?php $no++;} ?>

  <!-- start total saldo awal -->
  <tr>
    <td colspan="4" align="right">
      <?php
        if ($tdsaldoawal==0) {
          echo "-";
        }else {
          echo number_format($tdsaldoawal,0,',','.');
        }
      ?>
    </td>
    <td align="right">
      <?php
        if ($tksaldoawal==0) {
          echo "-";
        }else {
          echo number_format($tksaldoawal,0,',','.');
        }
      ?>
    </td>
    <!-- end total saldo awal -->

    <!-- start jumlah mutasi -->
    <?php
      $ft=$fbulana;
      $mutasidebit=0;
      $mutasikredit=0;
      while ($ft<=$fbulanb)
      {
    ?>

    <td align="right" style="background:rgba(178, 193, 235, 0.4)">
      <?php
        $mutasid=$dsaldo[$ft];

        if ($mutasid==0) {
          echo "-";
        }else {
          echo number_format($mutasid,0,',','.');
        }

        $mutasidebit += $mutasid;
      ?>
    </td>
    <td align="right">
      <?php
        $mutasik=$ksaldo[$ft];

        if ($mutasik==0) {
          echo "-";
        }else {
          echo number_format($mutasik,0,',','.');
        }

        $mutasikredit += $mutasik;
      ?>
    </td>

    <?php $ft=$ft+1;} ?>
    <!-- end start jumlah mutasi -->

    <!-- start total mutasi -->
    <td align="right" style="background:rgba(240, 181, 195, 0.4)">
      <?php
        if ($mutasidebit==0) {
          echo "-";
        }else {
          echo number_format($mutasidebit,0,',','.');
        }
      ?>
    </td>
    <td align="right">
      <?php
        if ($mutasikredit==0) {
          echo "-";
        }else {
          echo number_format($mutasikredit,0,',','.');
        }
      ?>
    </td>
    <!-- end total mutasi -->

    <!-- start total laba-rugi -->
    <td align="right" style="background:rgba(224, 245, 142, 0.4)">
      <?php
        $totallrplus=$lrd+$hasilformula;
        $potongtotallrplus=substr($totallrplus,0,1);

        if ($totallrplus==0) {
          echo "-";
        }else {
          if ($potongtotallrplus=="-") {
            Echo "<font style=color:red>"; echo number_format($totallrplus,0,',','.'); Echo "</font>";
          }else {
            echo number_format($totallrplus,0,',','.');
          }
        }
      ?>
      </td>
    <td align="right">
      <?php
        $potonglrk=substr($lrk,0,1);

        if ($lrk==0) {
          echo "-";
        }else {
          if ($potonglrk=="-") {
            Echo "<font style=color:red>"; echo number_format($lrk,0,',','.'); Echo "</font>";
          }else {
            echo number_format($lrk,0,',','.');
          }
        }
      ?>
    </td>
    <!-- end total laba-rugi -->

    <!-- start total neraca -->
    <td align="right" style="background:rgba(184, 240, 181, 0.8)">
      <?php
        $potongtnd=substr($tnd,0,1);

        if ($tnd==0) {
          echo "-";
        }else {
          if ($potongtnd=="-") {
            Echo "<font style=color:red>"; echo number_format($tnd,0,',','.'); Echo "</font>";
          }else {
            echo number_format($tnd,0,',','.');
          }
        }
      ?>
    </td>
    <td align="right">
      <?php
        $totalnplus=$tnk+$totalneraca;
        $potongtotalnplus=substr($totalnplus,0,1);

        if ($totalnplus==0) {
          echo "-";
        }else {
          if ($potongtotalnplus=="-") {
            Echo "<font style=color:red>"; echo number_format($totalnplus,0,',','.'); Echo "</font>";
          }else {
            echo number_format($totalnplus,0,',','.');
          }
        }
      ?>
    </td>
    <!-- end total neraca -->
  </tr>

  <?php }else{echo "";} ?>

</table>
</form>
