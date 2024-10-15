<?php
  include '../../../model/modul/casedate.php';
  include "../../../model/config/master_koneksi.php";
  $bulanawal=$_GET['bulanawal'];
  $bulanakhir=$_GET['bulanakhir'];
  $tahun=$_GET['tahun'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Neraca Lajur periode <?php echo "$bulanawal"; ?> s/d <?php echo "$bulanakhir"; ?> tahun <?php echo "$tahun"; ?></title>
    <link href="../../../images/b_print.png" rel="icon" type="image/png" />
  </head>

  <body>
    <div align="center" style="width:100%;font-size:15px; font-family:sans-serif">
      <p style="margin-bottom:5px">PT JASINTEK KARYA ABADI</p>
    </div>
    <div align="center" style="width:100%;font-size:15px; font-family:sans-serif; margin-bottom:0px">
      <p style="margin-top:0px;margin-bottom:5px">NERACA LAJUR</p>
      <p style="margin-top:0px;margin-bottom:0px">
        TAHUN <?php echo $tahun; ?>
      </p>
      <hr style="border: 1px solid">
    </div>

    <table border="1" style="font-family:sans-serif; border:1px solid #000; font-size:11px" width="100%">
      <tr align="center">
        <td rowspan="2" width="2%">Rek</td>
        <td rowspan="2">Nama Rekening</td>
        <td rowspan="2" width="1%">-</td>
        <td colspan="2" style="background:#ddd">Saldo Awal</td>

        <?php
          $aom=1;
          $ft=$bulanawal;
          while ($ft<=$bulanakhir)
          {
            $dsaldo[$ft]=0;
            $ksaldo[$ft]=0;

            // tubagus
            if(fmod($aom,3)==1)
              {$ebe="rgba(178, 193, 235, 0.8)";}
            elseif(fmod($aom,3)==2)
              {$ebe="rgba(178, 193, 235, 0.6)";}
            else
              {$ebe="rgba(178, 193, 235, 0.4)";}
        ?>

        <td colspan="2" style="background:<?php echo "$ebe" ?>">Mutasi <?php echo $blna=bulan(date("$ft")); ?></td>

        <?php $aom++;$ft=$ft+1;} ?>

        <td colspan="2" style="background:rgb(240, 181, 195)">Total Mutasi</td>
        <td colspan="2" style="background:rgb(224, 245, 142)">Laba Rugi <?php echo "$tahun"; ?></td>
        <td colspan="2" style="background:rgb(184, 240, 181)">Neraca 31/12/<?php echo "$tahun"; ?></td>
      </tr>

      <tr align="center">
        <td style="background:#ddd">Debit</td>
        <td>Kredit</td>

        <?php
          $aom=1;
          $ft=$bulanawal;
          while ($ft<=$bulanakhir)
          {
            // tubagus
            if(fmod($aom,3)==1)
              {$ebe="rgba(178, 193, 235, 0.8)";}
            elseif(fmod($aom,3)==2)
              {$ebe="rgba(178, 193, 235, 0.6)";}
            else
              {$ebe="rgba(178, 193, 235, 0.4)";}
        ?>

        <td style="background:<?php echo "$ebe" ?>">Debit</td>
        <td>Kredit</td>

        <?php $aom++;$ft=$ft+1;} ?>

        <td style="background:rgb(240, 181, 195)">Debit</td>
        <td>Kredit</td>
        <td style="background:rgb(224, 245, 142)">Debit</td>
        <td>Kredit</td>
        <td style="background:rgb(184, 240, 181)">Debit</td>
        <td>Kredit</td>
      </tr>

      <?php
        $no=1;
        $tdsaldoawal=0;
        $tksaldoawal=0;
        $lrd=0;
        $lrk=0;
        $tnd=0;
        $tnk=0;

        $jumlahformulaD=0;
        $jumlahformulaK=0;

        $acuantrans="AND efv_trans BETWEEN '$tahun-$bulanawal-01' AND '$tahun-$bulanakhir-31'";
        $acuansaldo="AND efv_trans<'$tahun-$bulanawal-01'";


        // start formula laba bersih

        $labarugilb_1=0;
        $sqlreportlb_1  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report='301' AND stts_report NOT LIKE '3'";
        $queryreportlb_1	=mysqli_query($koneksi,$sqlreportlb_1);
        $datareportlb_1=mysqli_fetch_array($queryreportlb_1);

        $sqlgrouplb_1	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE `stts_group` NOT LIKE '3' AND kd_report = '$datareportlb_1[0]' ORDER BY id ASC";
        $querygrouplb_1	=mysqli_query($koneksi,$sqlgrouplb_1);
        while($datagrouplb_1=mysqli_fetch_array($querygrouplb_1)){

          $sqlacountlb_1	  ="SELECT `kd_acount`, `desc_acount` FROM acount WHERE `kd_acount` = '$datagrouplb_1[1]'";
          $queryacountlb_1	=mysqli_query($koneksi,$sqlacountlb_1);
          $dataacountlb_1   =mysqli_fetch_array($queryacountlb_1);

          $sflb_1=0;
          $sqlformulalb_1	  ="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE `stts_formula` NOT LIKE '3' AND kd_group = '$datagrouplb_1[0]'";
          $queryformulalb_1	=mysqli_query($koneksi,$sqlformulalb_1);
          while($dataformulalb_1=mysqli_fetch_array($queryformulalb_1)){

            $sqlsumformulalb_1=
                      "SELECT
                        SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS DEBITLB_1,
                        SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS KREDITLB_1
                      FROM trans WHERE
                        stts_trans NOT LIKE '3' AND
                        kd_acount = $dataformulalb_1[0]
                        $acuantrans
                      ";
            $querysumformulalb_1	=mysqli_query($koneksi,$sqlsumformulalb_1);
            $datasumformulalb_1  =mysqli_fetch_array($querysumformulalb_1);

            $sqlformulasaldoawallb_1=
                      "SELECT
                        SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS FSADEBITLB_1,
                        SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS FSAKREDITLB_1
                      FROM trans WHERE
                        stts_trans NOT LIKE '3' AND
                        kd_acount = $dataformulalb_1[0]
                        $acuansaldo
                      ";
            $queryformulasaldoawallb_1	=mysqli_query($koneksi,$sqlformulasaldoawallb_1);
            $dataformulasaldoawallb_1   =mysqli_fetch_array($queryformulasaldoawallb_1);

            if ($dataformulalb_1[2]=='D') {
              $totalformulalb_1=(($dataformulasaldoawallb_1['FSADEBITLB_1']+$datasumformulalb_1['DEBITLB_1'])-($dataformulasaldoawallb_1['FSAKREDITLB_1']+$datasumformulalb_1['KREDITLB_1']));
            }else {
              $totalformulalb_1=(($dataformulasaldoawallb_1['FSAKREDITLB_1']+$datasumformulalb_1['KREDITLB_1'])-($dataformulasaldoawallb_1['FSADEBITLB_1']+$datasumformulalb_1['DEBITLB_1']));
            }
            $labarugilb_1 += $totalformulalb_1;
          }
        }

        $labarugilb_2=0;
        $sqlreportlb_2  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report='302' AND stts_report NOT LIKE '3'";
        $queryreportlb_2	=mysqli_query($koneksi,$sqlreportlb_2);
        $datareportlb_2=mysqli_fetch_array($queryreportlb_2);

        $sqlgrouplb_2	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE `stts_group` NOT LIKE '3' AND kd_report = '$datareportlb_2[0]' ORDER BY id ASC";
        $querygrouplb_2	=mysqli_query($koneksi,$sqlgrouplb_2);
        while($datagrouplb_2=mysqli_fetch_array($querygrouplb_2)){

          $sqlacountlb_2	  ="SELECT `kd_acount`, `desc_acount` FROM acount WHERE `kd_acount` = '$datagrouplb_2[1]'";
          $queryacountlb_2	=mysqli_query($koneksi,$sqlacountlb_2);
          $dataacountlb_2   =mysqli_fetch_array($queryacountlb_2);

          $sflb_2=0;
          $sqlformulalb_2	  ="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE `stts_formula` NOT LIKE '3' AND kd_group = '$datagrouplb_2[0]'";
          $queryformulalb_2	=mysqli_query($koneksi,$sqlformulalb_2);
          while($dataformulalb_2=mysqli_fetch_array($queryformulalb_2)){

            $sqlsumformulalb_2=
                      "SELECT
                        SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS DEBITLB_2,
                        SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS KREDITLB_2
                      FROM trans WHERE
                        stts_trans NOT LIKE '3' AND
                        kd_acount = $dataformulalb_2[0]
                        $acuantrans
                      ";
            $querysumformulalb_2	=mysqli_query($koneksi,$sqlsumformulalb_2);
            $datasumformulalb_2  =mysqli_fetch_array($querysumformulalb_2);

            $sqlformulasaldoawallb_2=
                      "SELECT
                        SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS FSADEBITLB_2,
                        SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS FSAKREDITLB_2
                      FROM trans WHERE
                        stts_trans NOT LIKE '3' AND
                        kd_acount = $dataformulalb_2[0]
                        $acuansaldo
                      ";
            $queryformulasaldoawallb_2	=mysqli_query($koneksi,$sqlformulasaldoawallb_2);
            $dataformulasaldoawallb_2   =mysqli_fetch_array($queryformulasaldoawallb_2);

            if ($dataformulalb_2[2]=='D') {
              $totalformulalb_2=(($dataformulasaldoawallb_2['FSADEBITLB_2']+$datasumformulalb_2['DEBITLB_2'])-($dataformulasaldoawallb_2['FSAKREDITLB_2']+$datasumformulalb_2['KREDITLB_2']));
            }else {
              $totalformulalb_2=(($dataformulasaldoawallb_2['FSAKREDITLB_2']+$datasumformulalb_2['KREDITLB_2'])-($dataformulasaldoawallb_2['FSADEBITLB_2']+$datasumformulalb_2['DEBITLB_2']));
            }
            $labarugilb_2 += $totalformulalb_2;
          }
        }

        $labarugilb_3=0;
        $sqlreportlb_3  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report='303' AND stts_report NOT LIKE '3'";
        $queryreportlb_3	=mysqli_query($koneksi,$sqlreportlb_3);
        $datareportlb_3=mysqli_fetch_array($queryreportlb_3);

        $sqlgrouplb_3	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE `stts_group` NOT LIKE '3' AND kd_report = '$datareportlb_3[0]' ORDER BY id ASC";
        $querygrouplb_3	=mysqli_query($koneksi,$sqlgrouplb_3);
        while($datagrouplb_3=mysqli_fetch_array($querygrouplb_3)){

          $sqlacountlb_3	  ="SELECT `kd_acount`, `desc_acount` FROM acount WHERE `kd_acount` = '$datagrouplb_3[1]'";
          $queryacountlb_3	=mysqli_query($koneksi,$sqlacountlb_3);
          $dataacountlb_3   =mysqli_fetch_array($queryacountlb_3);

          $sflb_3=0;
          $sqlformulalb_3	  ="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE `stts_formula` NOT LIKE '3' AND kd_group = '$datagrouplb_3[0]'";
          $queryformulalb_3	=mysqli_query($koneksi,$sqlformulalb_3);
          while($dataformulalb_3=mysqli_fetch_array($queryformulalb_3)){

            $sqlsumformulalb_3=
                      "SELECT
                        SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS DEBITLB_3,
                        SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS KREDITLB_3
                      FROM trans WHERE
                        stts_trans NOT LIKE '3' AND
                        kd_acount = $dataformulalb_3[0]
                        $acuantrans
                      ";
            $querysumformulalb_3	=mysqli_query($koneksi,$sqlsumformulalb_3);
            $datasumformulalb_3  =mysqli_fetch_array($querysumformulalb_3);

            $sqlformulasaldoawallb_3=
                      "SELECT
                        SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS FSADEBITLB_3,
                        SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS FSAKREDITLB_3
                      FROM trans WHERE
                        stts_trans NOT LIKE '3' AND
                        kd_acount = $dataformulalb_3[0]
                        $acuansaldo
                      ";
            $queryformulasaldoawallb_3	=mysqli_query($koneksi,$sqlformulasaldoawallb_3);
            $dataformulasaldoawallb_3   =mysqli_fetch_array($queryformulasaldoawallb_3);

            if ($dataformulalb_3[2]=='D') {
              $totalformulalb_3=(($dataformulasaldoawallb_3['FSADEBITLB_3']+$datasumformulalb_3['DEBITLB_3'])-($dataformulasaldoawallb_3['FSAKREDITLB_3']+$datasumformulalb_3['KREDITLB_3']));
            }else {
              $totalformulalb_3=(($dataformulasaldoawallb_3['FSAKREDITLB_3']+$datasumformulalb_3['KREDITLB_3'])-($dataformulasaldoawallb_3['FSADEBITLB_3']+$datasumformulalb_3['DEBITLB_3']));
            }
            $labarugilb_3 += $totalformulalb_3;
          }
        }

        $labarugilb_4=0;
        $sqlreportlb_4  	="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report='304' AND stts_report NOT LIKE '3'";
        $queryreportlb_4	=mysqli_query($koneksi,$sqlreportlb_4);
        $datareportlb_4=mysqli_fetch_array($queryreportlb_4);

        $sqlgrouplb_4	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE `stts_group` NOT LIKE '3' AND kd_report = '$datareportlb_4[0]' ORDER BY id ASC";
        $querygrouplb_4	=mysqli_query($koneksi,$sqlgrouplb_4);
        while($datagrouplb_4=mysqli_fetch_array($querygrouplb_4)){

          $sqlacountlb_4	  ="SELECT `kd_acount`, `desc_acount` FROM acount WHERE `kd_acount` = '$datagrouplb_4[1]'";
          $queryacountlb_4	=mysqli_query($koneksi,$sqlacountlb_4);
          $dataacountlb_4   =mysqli_fetch_array($queryacountlb_4);

          $sflb_4=0;
          $sqlformulalb_4	  ="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE `stts_formula` NOT LIKE '3' AND kd_group = '$datagrouplb_4[0]'";
          $queryformulalb_4	=mysqli_query($koneksi,$sqlformulalb_4);
          while($dataformulalb_4=mysqli_fetch_array($queryformulalb_4)){

            $sqlsumformulalb_4=
                      "SELECT
                        SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS DEBITLB_4,
                        SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS KREDITLB_4
                      FROM trans WHERE
                        stts_trans NOT LIKE '3' AND
                        kd_acount = $dataformulalb_4[0]
                        $acuantrans
                      ";
            $querysumformulalb_4	=mysqli_query($koneksi,$sqlsumformulalb_4);
            $datasumformulalb_4  =mysqli_fetch_array($querysumformulalb_4);

            $sqlformulasaldoawallb_4=
                      "SELECT
                        SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS FSADEBITLB_4,
                        SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS FSAKREDITLB_4
                      FROM trans WHERE
                        stts_trans NOT LIKE '3' AND
                        kd_acount = $dataformulalb_4[0]
                        $acuansaldo
                      ";
            $queryformulasaldoawallb_4	=mysqli_query($koneksi,$sqlformulasaldoawallb_4);
            $dataformulasaldoawallb_4   =mysqli_fetch_array($queryformulasaldoawallb_4);

            if ($dataformulalb_4[2]=='D') {
              $totalformulalb_4=(($dataformulasaldoawallb_4['FSADEBITLB_4']+$datasumformulalb_4['DEBITLB_4'])-($dataformulasaldoawallb_4['FSAKREDITLB_4']+$datasumformulalb_4['KREDITLB_4']));
            }else {
              $totalformulalb_4=(($dataformulasaldoawallb_4['FSAKREDITLB_4']+$datasumformulalb_4['KREDITLB_4'])-($dataformulasaldoawallb_4['FSADEBITLB_4']+$datasumformulalb_4['DEBITLB_4']));
            }
            $labarugilb_4 += $totalformulalb_4;
          }
        }

        $jumlah1=$labarugilb_1-$labarugilb_2;
        $jumlah2=$jumlah1-$labarugilb_3+$labarugilb_4;
        $hasillababersih = ($jumlah2);

        // end formula laba bersih


        $sql  	="SELECT `id_acount`, `jenis_conf` FROM `conf_acount` WHERE stts_conf NOT LIKE '3' ORDER BY id_acount ASC";
        $query	=mysqli_query($koneksi,$sql);
        while($data=mysqli_fetch_array($query)) {

          $dataconf = isset($data[0]) ? $data[0] : '';

          if(fmod($no,2)==1)
          {$warna="ghostwhite";}
          else
          {$warna="white";}

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

      <tr bgcolor="<?php echo "$warna" ?>">
        <td><?php echo "$data[0]"; ?></td>
        <td style="padding-left:3px"><?php echo "$dataac[1]"; ?></td>
        <td><?php echo "$dataac[2]"; ?></td>

        <!-- saldo awal -->
        <td align="right" style="padding-right:3px; background:whitesmoke">
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
        <td align="right" style="padding-right:3px">
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
        <!-- saldo awal -->

        <!-- while mutasi -->
        <?php
          $totalmutasid[$no]=0;
          $totalmutasik[$no]=0;
          $ft=$bulanawal;
          while ($ft<=$bulanakhir){
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
        <td align="right" style="padding-right:3px; background:rgba(178, 193, 235, 0.1)">
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
        <td align="right" style="padding-right:3px">
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
        <!-- while mutasi -->

        <!-- start total mutasi -->
        <td align="right" style="padding-right:3px; background:rgba(240, 181, 195, 0.1)">
          <?php
            if ($totalmutasid[$no]==0) {
              echo "-";
            }else {
              echo number_format($totalmutasid[$no],0,',','.');
            }
          ?>
        </td>
        <td align="right" style="padding-right:3px">
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

        <?php
        
          $sqlreport_1  	="SELECT `kd_report` FROM `report` WHERE kd_report = '301' AND stts_report NOT LIKE '3'";
          $queryreport_1	=mysqli_query($koneksi,$sqlreport_1);
          $datareport_1   =mysqli_fetch_array($queryreport_1);
    
          $sqlgroup_1  	="SELECT `kd_group`, `kd_acount` FROM `report_group` WHERE kd_acount = $dataconf AND kd_report='$datareport_1[0]' AND stts_group NOT LIKE '3'";
          $querygroup_1	=mysqli_query($koneksi,$sqlgroup_1);
          $datagroup_1   =mysqli_fetch_array($querygroup_1);

          $datagroupv_1 = isset($datagroup_1[0]) ? $datagroup_1[0] : '';
    
          $toforD_1=0;
          $toforK_1=0;
    
          $sqlformula_1  	="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE kd_group = '$datagroupv_1' AND stts_formula NOT LIKE '3'";
          $queryformula_1	=mysqli_query($koneksi,$sqlformula_1);
          while($dataformula_1=mysqli_fetch_array($queryformula_1)){
    
          $sqlformulamutasi_1=
            "SELECT
              SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS FTMDEBIT_1,
              SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS FTMKREDIT_1
            FROM trans WHERE
              stts_trans NOT LIKE '3' AND
              kd_acount = $dataformula_1[0]
            $acuantrans
          ";
                
            $queryformulamutasi_1	=mysqli_query($koneksi,$sqlformulamutasi_1);
            $dataformulamutasi_1  =mysqli_fetch_array($queryformulamutasi_1);
    
            $sqlformulasaldoawal_1=
              "SELECT
                SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS FSADEBIT_1,
                SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS FSAKREDIT_1
              FROM trans WHERE
                stts_trans NOT LIKE '3' AND
                kd_acount = $dataformula_1[0]
              $acuansaldo
            ";
            $queryformulasaldoawal_1	=mysqli_query($koneksi,$sqlformulasaldoawal_1);
            $dataformulasaldoawal_1   =mysqli_fetch_array($queryformulasaldoawal_1);
    
            if ($dataformula_1[2]=='D') {
              $totalformulaD_1=(($dataformulasaldoawal_1['FSADEBIT_1']+$dataformulamutasi_1['FTMDEBIT_1'])-($dataformulasaldoawal_1['FSAKREDIT_1']+$dataformulamutasi_1['FTMKREDIT_1']));
              $toforD_1 += $totalformulaD_1;
            }else {
              $totalformulaK_1=(($dataformulasaldoawal_1['FSAKREDIT_1']+$dataformulamutasi_1['FTMKREDIT_1'])-($dataformulasaldoawal_1['FSADEBIT_1']+$dataformulamutasi_1['FTMDEBIT_1']));
              $toforK_1 += $totalformulaK_1;
            }
          }

          // batas formula laba rugi
          
          $sqlreport_2  	="SELECT `kd_report` FROM `report` WHERE kd_report = '302' AND stts_report NOT LIKE '3'";
          $queryreport_2	=mysqli_query($koneksi,$sqlreport_2);
          $datareport_2   =mysqli_fetch_array($queryreport_2);
    
          $sqlgroup_2  	="SELECT `kd_group`, `kd_acount` FROM `report_group` WHERE kd_acount = $dataconf AND kd_report='$datareport_2[0]' AND stts_group NOT LIKE '3'";
          $querygroup_2	=mysqli_query($koneksi,$sqlgroup_2);
          $datagroup_2   =mysqli_fetch_array($querygroup_2);

          $datagroupv_2 = isset($datagroup_2[0]) ? $datagroup_2[0] : '';
    
          $toforD_2=0;
          $toforK_2=0;
    
          $sqlformula_2  	="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE kd_group = '$datagroupv_2' AND stts_formula NOT LIKE '3'";
          $queryformula_2	=mysqli_query($koneksi,$sqlformula_2);
          while($dataformula_2=mysqli_fetch_array($queryformula_2)){
    
          $sqlformulamutasi_2=
            "SELECT
              SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS FTMDEBIT_2,
              SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS FTMKREDIT_2
            FROM trans WHERE
              stts_trans NOT LIKE '3' AND
              kd_acount = $dataformula_2[0]
            $acuantrans
          ";
                
            $queryformulamutasi_2	=mysqli_query($koneksi,$sqlformulamutasi_2);
            $dataformulamutasi_2  =mysqli_fetch_array($queryformulamutasi_2);
    
            $sqlformulasaldoawal_2=
              "SELECT
                SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS FSADEBIT_2,
                SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS FSAKREDIT_2
              FROM trans WHERE
                stts_trans NOT LIKE '3' AND
                kd_acount = $dataformula_2[0]
              $acuansaldo
            ";
            $queryformulasaldoawal_2	=mysqli_query($koneksi,$sqlformulasaldoawal_2);
            $dataformulasaldoawal_2   =mysqli_fetch_array($queryformulasaldoawal_2);
    
            if ($dataformula_2[2]=='D') {
              $totalformulaD_2=(($dataformulasaldoawal_2['FSADEBIT_2']+$dataformulamutasi_2['FTMDEBIT_2'])-($dataformulasaldoawal_2['FSAKREDIT_2']+$dataformulamutasi_2['FTMKREDIT_2']));
              $toforD_2 += $totalformulaD_2;
            }else {
              $totalformulaK_2=(($dataformulasaldoawal_2['FSAKREDIT_2']+$dataformulamutasi_2['FTMKREDIT_2'])-($dataformulasaldoawal_2['FSADEBIT_2']+$dataformulamutasi_2['FTMDEBIT_2']));
              $toforK_2 += $totalformulaK_2;
            }
          }

          // batas formula laba rugi

          $sqlreport_3  	="SELECT `kd_report` FROM `report` WHERE kd_report = '303' AND stts_report NOT LIKE '3'";
          $queryreport_3	=mysqli_query($koneksi,$sqlreport_3);
          $datareport_3   =mysqli_fetch_array($queryreport_3);
    
          $sqlgroup_3  	="SELECT `kd_group`, `kd_acount` FROM `report_group` WHERE kd_acount = $dataconf AND kd_report='$datareport_3[0]' AND stts_group NOT LIKE '3'";
          $querygroup_3	=mysqli_query($koneksi,$sqlgroup_3);
          $datagroup_3   =mysqli_fetch_array($querygroup_3);

          $datagroupv_3 = isset($datagroup_3[0]) ? $datagroup_3[0] : '';
    
          $toforD_3=0;
          $toforK_3=0;
    
          $sqlformula_3  	="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE kd_group = '$datagroupv_3' AND stts_formula NOT LIKE '3'";
          $queryformula_3	=mysqli_query($koneksi,$sqlformula_3);
          while($dataformula_3=mysqli_fetch_array($queryformula_3)){
    
          $sqlformulamutasi_3=
            "SELECT
              SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS FTMDEBIT_3,
              SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS FTMKREDIT_3
            FROM trans WHERE
              stts_trans NOT LIKE '3' AND
              kd_acount = $dataformula_3[0]
            $acuantrans
          ";
                
            $queryformulamutasi_3	=mysqli_query($koneksi,$sqlformulamutasi_3);
            $dataformulamutasi_3  =mysqli_fetch_array($queryformulamutasi_3);
    
            $sqlformulasaldoawal_3=
              "SELECT
                SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS FSADEBIT_3,
                SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS FSAKREDIT_3
              FROM trans WHERE
                stts_trans NOT LIKE '3' AND
                kd_acount = $dataformula_3[0]
              $acuansaldo
            ";
            $queryformulasaldoawal_3	=mysqli_query($koneksi,$sqlformulasaldoawal_3);
            $dataformulasaldoawal_3   =mysqli_fetch_array($queryformulasaldoawal_3);
    
            if ($dataformula_3[2]=='D') {
              $totalformulaD_3=(($dataformulasaldoawal_3['FSADEBIT_3']+$dataformulamutasi_3['FTMDEBIT_3'])-($dataformulasaldoawal_3['FSAKREDIT_3']+$dataformulamutasi_3['FTMKREDIT_3']));
              $toforD_3 += $totalformulaD_3;
            }else {
              $totalformulaK_3=(($dataformulasaldoawal_3['FSAKREDIT_3']+$dataformulamutasi_3['FTMKREDIT_3'])-($dataformulasaldoawal_3['FSADEBIT_3']+$dataformulamutasi_3['FTMDEBIT_3']));
              $toforK_3 += $totalformulaK_3;
            }
          }

          // batas formula laba rugi

          $sqlreport_4  	="SELECT `kd_report` FROM `report` WHERE kd_report = '304' AND stts_report NOT LIKE '3'";
          $queryreport_4	=mysqli_query($koneksi,$sqlreport_4);
          $datareport_4   =mysqli_fetch_array($queryreport_4);
    
          $sqlgroup_4  	="SELECT `kd_group`, `kd_acount` FROM `report_group` WHERE kd_acount = $dataconf AND kd_report='$datareport_4[0]' AND stts_group NOT LIKE '3'";
          $querygroup_4	=mysqli_query($koneksi,$sqlgroup_4);
          $datagroup_4   =mysqli_fetch_array($querygroup_4);

          $datagroupv_4 = isset($datagroup_4[0]) ? $datagroup_4[0] : '';
    
          $toforD_4=0;
          $toforK_4=0;
    
          $sqlformula_4  	="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE kd_group = '$datagroupv_4' AND stts_formula NOT LIKE '3'";
          $queryformula_4	=mysqli_query($koneksi,$sqlformula_4);
          while($dataformula_4=mysqli_fetch_array($queryformula_4)){
    
          $sqlformulamutasi_4=
            "SELECT
              SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS FTMDEBIT_4,
              SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS FTMKREDIT_4
            FROM trans WHERE
              stts_trans NOT LIKE '3' AND
              kd_acount = $dataformula_4[0]
            $acuantrans
          ";
                
            $queryformulamutasi_4	=mysqli_query($koneksi,$sqlformulamutasi_4);
            $dataformulamutasi_4  =mysqli_fetch_array($queryformulamutasi_4);
    
            $sqlformulasaldoawal_4=
              "SELECT
                SUM(IF(`jenis_trans` = 'D',`saldo_trans`,0)) AS FSADEBIT_4,
                SUM(IF(`jenis_trans` = 'K',`saldo_trans`,0)) AS FSAKREDIT_4
              FROM trans WHERE
                stts_trans NOT LIKE '3' AND
                kd_acount = $dataformula_4[0]
              $acuansaldo
            ";
            $queryformulasaldoawal_4	=mysqli_query($koneksi,$sqlformulasaldoawal_4);
            $dataformulasaldoawal_4   =mysqli_fetch_array($queryformulasaldoawal_4);
    
            if ($dataformula_4[2]=='D') {
              $totalformulaD_4=(($dataformulasaldoawal_4['FSADEBIT_4']+$dataformulamutasi_4['FTMDEBIT_4'])-($dataformulasaldoawal_4['FSAKREDIT_4']+$dataformulamutasi_4['FTMKREDIT_4']));
              $toforD_4 += $totalformulaD_4;
            }else {
              $totalformulaK_4=(($dataformulasaldoawal_4['FSAKREDIT_4']+$dataformulamutasi_4['FTMKREDIT_4'])-($dataformulasaldoawal_4['FSADEBIT_4']+$dataformulamutasi_4['FTMDEBIT_4']));
              $toforK_4 += $totalformulaK_4;
            }
          }

          // batas formula laba rugi

          $jumlahformulaD += ($toforD_1+$toforD_2)+($toforD_3+$toforD_4);
          $jumlahformulaK += ($toforK_1+$toforK_2)+($toforK_3+$toforK_4);

          // batas formula laba rugi

          
        ?>

        <td align="right" style="padding-right:3px; background:rgba(224, 245, 142, 0.3)">

          <?php
            if (isset($datagroup_1)) {
              if ($toforD_1==0) {
                echo "-";
              }else {
                $potonghasilformulaD_1=substr($toforD_1,0,1);
                if ($potonghasilformulaD_1=="-") {
                  echo "<font style='color:red'>"; echo number_format($toforD_1,0,',','.'); echo "</font>";
                }else {
                  echo "<font>"; echo number_format($toforD_1,0,',','.'); echo "</font>";
                }
              }
            }

            if (isset($datagroup_2)) {
              if ($toforD_2==0) {
                echo "-";
              }else {
                $potonghasilformulaD_2=substr($toforD_2,0,1);
                if ($potonghasilformulaD_2=="-") {
                  echo "<font style='color:red'>"; echo number_format($toforD_2,0,',','.'); echo "</font>";
                }else {
                  echo "<font>"; echo number_format($toforD_2,0,',','.'); echo "</font>";
                }
              }
            }

            if (isset($datagroup_3)) {
              if ($toforD_3==0) {
                echo "-";
              }else {
                $potonghasilformulaD_3=substr($toforD_3,0,1);
                if ($potonghasilformulaD_3=="-") {
                  echo "<font style='color:red'>"; echo number_format($toforD_3,0,',','.'); echo "</font>";
                }else {
                  echo "<font>"; echo number_format($toforD_3,0,',','.'); echo "</font>";
                }
              }
            }

            if (isset($datagroup_4)) {
              if ($toforD_4==0) {
                echo "-";
              }else {
                $potonghasilformulaD_4=substr($toforD_4,0,1);
                if ($potonghasilformulaD_4=="-") {
                  echo "<font style='color:red'>"; echo number_format($toforD_4,0,',','.'); echo "</font>";
                }else {
                  echo "<font>"; echo number_format($toforD_4,0,',','.'); echo "</font>";
                }
              }
            }

          ?>
        </td>

        <td align="right" style="padding-right:3px">
          <!-- hasil laba bersih -->
          <?php
            $sqlreport_5  	="SELECT `kd_report` FROM `report` WHERE kd_report = '801' AND stts_report NOT LIKE '3'";
            $queryreport_5	=mysqli_query($koneksi,$sqlreport_5);
            $datareport_5   =mysqli_fetch_array($queryreport_5);

            $sqlgroup_5  	="SELECT `kd_group`, `kd_acount` FROM `report_group` WHERE kd_acount = $data[0] AND kd_report='$datareport_5[0]' AND stts_group NOT LIKE '3'";
            $querygroup_5	=mysqli_query($koneksi,$sqlgroup_5);
            $datagroup_5   =mysqli_fetch_array($querygroup_5);

            $datagroupv_5 = isset($datagroup_5[0]) ? $datagroup_5[0] : '';

            $toforD_5=0;
            $toforK_5=0;

            $sqlformula_5  	="SELECT `kd_acount`, `kd_group`, `jenis_formula` FROM `report_formula` WHERE kd_group = '$datagroupv_5' AND stts_formula NOT LIKE '3'";
            $queryformula_5	=mysqli_query($koneksi,$sqlformula_5);
            while($dataformula_5=mysqli_fetch_array($queryformula_5)){
              echo "<b>"; echo number_format($hasillababersih,0,',','.'); echo "</b>";
            }
          ?>
          <!-- hasil laba bersih -->

          <?php
            if (isset($datagroup_1)) {
              if ($toforK_1==0) {
                echo "-";
              }else {
                $potonghasilformulaK_1=substr($toforK_1,0,1);
                if ($potonghasilformulaK_1=="-") {
                  echo "<font style='color:red'>"; echo number_format($toforK_1,0,',','.'); echo "</font>";
                }else {
                  echo "<font>"; echo number_format($toforK_1,0,',','.'); echo "</font>";
                }
              }
            }

            if (isset($datagroup_2)) {
              if ($toforK_2==0) {
                echo "-";
              }else {
                $potonghasilformulaK_2=substr($toforK_2,0,1);
                if ($potonghasilformulaK_2=="-") {
                  echo "<font style='color:red'>"; echo number_format($toforK_2,0,',','.'); echo "</font>";
                }else {
                  echo "<font>"; echo number_format($toforK_2,0,',','.'); echo "</font>";
                }
              }
            }

            if (isset($datagroup_3)) {
              if ($toforK_3==0) {
                echo "-";
              }else {
                $potonghasilformulaK_3=substr($toforK_3,0,1);
                if ($potonghasilformulaK_3=="-") {
                  echo "<font style='color:red'>"; echo number_format($toforK_3,0,',','.'); echo "</font>";
                }else {
                  echo "<font>"; echo number_format($toforK_3,0,',','.'); echo "</font>";
                }
              }
            }

            if (isset($datagroup_4)) {
              if ($toforK_4==0) {
                echo "-";
              }else {
                $potonghasilformulaK_4=substr($toforK_4,0,1);
                if ($potonghasilformulaK_4=="-") {
                  echo "<font style='color:red'>"; echo number_format($toforK_4,0,',','.'); echo "</font>";
                }else {
                  echo "<font>"; echo number_format($toforK_4,0,',','.'); echo "</font>";
                }
              }
            }

          ?>
        </td>
        <!-- end laba-rugi -->

        <!-- neraca -->
        <td align="right" style="padding-right:3px; background:rgba(184, 240, 181, 0.2)">
          <?php
            if (isset($datagroup_1)) {
              if ($dataac[2]=="D") {
                $totalneraca=$tofor_1+$labarugidebit_1;
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
        <td align="right" style="padding-right:3px">
          <?php
            if (isset($datagroup_5)) {
              if ($dataac[2]=="K") {
                $totalneraca=$hasillababersih;
                if ($totalneraca==0) {
                  echo "-";
                }else {
                  // echo number_format($totalneraca,0,',','.');
                  echo "<b>"; echo number_format($totalneraca,0,',','.'); echo "</b>";
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





      

      <tr>
        <th colspan="3">&nbsp;</th>

        <!-- start total saldo awal -->
        <th align="right" style="padding-right:3px; background:whitesmoke">
          <?php
            if ($tdsaldoawal==0) {
              echo "-";
            }else {
              echo number_format($tdsaldoawal,0,',','.');
            }
          ?>
        </th>
        <th align="right" style="padding-right:3px">
          <?php
            if ($tksaldoawal==0) {
              echo "-";
            }else {
              echo number_format($tksaldoawal,0,',','.');
            }
          ?>
        </th>
        <!-- end total saldo awal -->

        <!-- start jumlah mutasi -->
        <?php
          $ft=$bulanawal;
          $mutasidebit=0;
          $mutasikredit=0;
          while ($ft<=$bulanakhir)
          {
        ?>
        <th align="right" style="padding-right:3px; background:rgba(178, 193, 235, 0.3)">
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
        <th align="right" style="padding-right:3px">
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
        <th align="right" style="padding-right:3px; background:rgba(224, 245, 142, 0.3)">
          <?php
            if ($mutasidebit==0) {
              echo "-";
            }else {
              echo number_format($mutasidebit,0,',','.');
            }
          ?>
        </td>
        <th align="right" style="padding-right:3px">
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
        <th align="right" style="padding-right:3px; background:rgba(224, 245, 142, 0.3)">
          <?php
            echo number_format($jumlahformulaD,0,',','.');
          ?>
        </td>
        <th align="right" style="padding-right:3px">
          <?php
            $jfkhlb = $jumlahformulaK-$hasillababersih;
            echo number_format($jfkhlb,0,',','.');
          ?>
        </td>
        <!-- end total laba-rugi -->

        <!-- start total neraca -->
        <th align="right" style="padding-right:3px; background:rgba(184, 240, 181, 0.3)">
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
        <th align="right" style="padding-right:3px">
        <?php
          $totalnplus=$tnk+$hasillababersih;
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
    </table>
  </body>
</html>

<script>
  window.print();
</script>
