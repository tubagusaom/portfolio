<?php
	if (isset($_GET['Export-Buku-Besar'])) {

        $descacount=$_GET['descacount'];
        $ketacount=$_GET['ketacount'];
        $fbulan=$_GET['fbulan'];
        $ftahun=$_GET['ftahun'];
        $kka=$_GET['kka'];
        $saldoawal=$_GET['saldoawal'];
        $acuansa=$saldoawal;

        include "../../../model/config/master_koneksi.php";
        include '../../../model/modul/casedate.php';

        if ($fbulan=='All') {
            $name_file = "Buku Besar Jan-Des $ftahun";
      
        } else{
            $bln=bulan(date("$fbulan")); $pb=substr($bln,0,3);
            $name_file = "Buku Besar $pb - $ftahun";
            // Periode : echo "$pb - $ftahun";
      
        }

	header("Content-Type: application/xls");
	header("Content-Disposition: attachment; filename=$name_file.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>

<div align="center" style="width:100%;font-size:20px; font-family:sans-serif">
    <p style="margin-bottom:5px">PT JASINTEK KARYA ABADI</p>
  </div>
  <div align="center" style="width:100%;font-size:20px; font-family:sans-serif; margin-bottom:0px">
    <p style="margin-top:0px;margin-bottom:0px">
      BUKU BESAR TAHUN <?php echo $ftahun; ?>
    </p> <br>

    <div style="font-size:14px;">

      <?php if ($fbulan=='All') { ?>

      Periode : 1 Jan s/d 31 Des

      <?php }else{ $bln=bulan(date("$fbulan")); $pb=substr($bln,0,3);?>

      Periode : <?php echo "$pb - $ftahun";?>

      <?php } ?>

    </div>

    <hr style="border: 1px solid">
  </div>

  <div style="width:100%;font-size:13px; font-family:sans-serif">
    <div style="float:left;font-size:14px;">
        <table border="0" width="100%" style="font-size:13px; font-family:sans-serif">
        <tr>
          <td width="37%"><b>Account</b></td>
          <td width="1%"><b>:</b></td>
          <td align="right"><b><?php echo "$kka" . " - " ."$descacount"; ?></b></td>
        </tr>
        </table>
    </div>
    <div style="float:right; width:40%; padding-right:20px; margin-bottom:30px">
      <table border="0" width="100%" style="font-size:13px; font-family:sans-serif">

        <?php
          $dsum=0;
          $ksum=0;

          if ($fbulan=='All') {
            $acuanbt="YEAR(efv_trans)='$ftahun' AND";
          }else {
            $acuanbt="MONTH(efv_trans)='$fbulan' AND YEAR(efv_trans)='$ftahun' AND";
          }

          if ($ketacount=='M') {
            $kodeacount=substr($kka,0,1);
          }else {
            $kodeacount=substr($kka,0,3);
          };

          $sqlsum	  =
                    "SELECT
                      `jenis_trans`,
                      `saldo_trans`
                    FROM trans WHERE
                      stts_trans NOT LIKE '3' AND
                      $acuanbt
                      kd_acount LIKE '$kodeacount%'
                      ORDER BY id DESC
                    ";
          $querysum	=mysqli_query($koneksi,$sqlsum);
          while($datasum=mysqli_fetch_array($querysum)){
            if ($datasum[0]=='D') {
              $debitsum=$datasum[1];
              $dsum += $debitsum;
            }elseif ($datasum[0]=='K') {
    					$kreditsum=$datasum[1];
    					$ksum += $kreditsum;
    				}
          }
        ?>

        <tr>
          <td width="37%"><b>Saldo Awal</b></td>
          <td width="1%"><b>:</b></td>
          <td align="right"><b><?php echo number_format($saldoawal,0,',','.');; ?></b></td>
        </tr>
        <tr>
          <td>Mutasi Debet</td>
          <td>:</td>
          <td align="right">
            <?php
              if (isset($debitsum)) {
                echo number_format($dsum,0,',','.');
              }else {
                echo "0";
              }
            ?>
          </td>
        </tr>
        <tr>
          <td>Mutasi Kredit</td>
          <td>:</td>
          <td align="right">
            <?php
              if (isset($kreditsum)) {
                echo number_format($ksum,0,',','.');
              }else {
                echo "0";
              }
            ?>
          </td>
        </tr>
        <tr>
          <td><b>Saldo Akhir</b></td>
          <td><b>:</b></td>
          <td align="right" style="border-top:1px solid #000; border-bottom:1px solid #000">
            <b>
              <?php
                $saldoakhir=$saldoawal-$ksum+$dsum;
                echo number_format($saldoakhir,0,',','.');
              ?>
            </b>
          </td>
        </tr>
        <tr>
          <td colspan="3"><br></td>
        </tr>
        <!-- <tr>
          <td colspan="3">Tanggal Cetak</td>
        </tr> -->
      </table>
    </div>
  </div>

  <body>
    <table style="width:100%;font-size:13px; font-family:sans-serif; border: 1px solid #999">
      

      <tr style="background-color:rgba(0, 0, 0, 0.1)">
        <th width="2%" style="border-top:1px solid #999; border-right:1px solid #999">No</th>
        <th width="11%" style="border-top:1px solid #999; border-right:1px solid #999">Tanggal</th>
        <th style="border-top:1px solid #999; border-right:1px solid #999">Keterangan</th>
        <th style="border-top:1px solid #999; border-right:1px solid #999">Debet</th>
        <th style="border-top:1px solid #999; border-right:1px solid #999">Kredit</th>
        <th style="border-top:1px solid #999">Saldo</th>
      </tr>

      <?php
        $d=0;
        $k=0;
        $no=1;
        $sql	  =
                  "SELECT
                    `id`,
                    `init_trans`,
                    `saldo_trans`,
                    `jenis_trans`,
                    `reff_trans`,
                    `ket_trans`,
                    `efv_trans`,
                    `id_schema`,
                    `kd_acount`,
                    `stts_trans`,
                    `c_trans`,
                    `id_akun`
                  FROM trans WHERE
                    stts_trans NOT LIKE '3' AND
                    $acuanbt
                    kd_acount LIKE '$kodeacount%'
                    ORDER BY
                      efv_trans ASC
                  ";

        $query	=mysqli_query($koneksi,$sql);
    		while($data=mysqli_fetch_array($query)){
      ?>

      <tr>
        <td align="center" style="border-top:1px solid #999; border-right:1px solid #999"><?php echo $no; ?></td>
        <td align="right" style="border-top:1px solid #999; border-right:1px solid #999; padding-right:5px">
          <?php
    				$a=substr($data[6],8);
    				$b=substr($data[6],5,2);
    				$c=substr($data[6],0,4);

    				echo "$a-$b-$c";
    			?>
        </td>
        <td style="border-top:1px solid #999; border-right:1px solid #999; padding-left:5px">
          <?php
    				$sqla	  ="SELECT `id`, `kd_acount`, `desc_acount`, `jenis_acount`, `type_acount`, `stts_acount`, `c_acount` FROM acount WHERE kd_acount='$data[8]'";
    				$querya	=mysqli_query($koneksi,$sqla);
    				$dataa	=mysqli_fetch_array($querya);

    				echo "$dataa[2]";
    			?>
        </td>
        <td align="right" style="border-top:1px solid #999; border-right:1px solid #999; padding-right:5px">
          <?php
    				if ($data[3]=='D') {
    					$debit=$data[2];
    					echo number_format($debit,0,',','.');

    					$d += $debit;
    				}else {
    					$debit=0;
              echo "-";
    				}
    			?>
        </td>
        <td align="right" style="border-top:1px solid #999; border-right:1px solid #999; padding-right:5px">
          <?php
    				if ($data[3]=='K') {
    					$kredit=$data[2];
    					echo number_format($kredit,0,',','.');

    					$k += $kredit;
    				}else {
    					$kredit=0;
              echo "-";
    				}
    			?>
        </td>
        <td align="right" style="border-top:1px solid #999; padding-right:5px">
          <?php
            $acuansa=$acuansa-$kredit+$debit;
            echo number_format($acuansa,0,',','.');
          ?>
        </td>
      </tr>

      <?php $no++;} ?>

      <tr>
        <th align="left" colspan="3" style="border-top:1px solid #999; border-right:1px solid #999; padding-left:5px">&nbsp;</th>
        <th align="right" align="right" style="border-top:1px solid #999; border-right:1px solid #999; padding-right:5px">&nbsp;</th>
        <th align="right" align="right" style="border-top:1px solid #999; border-right:1px solid #999; padding-right:5px">&nbsp;</th>
        <th align="right" align="right" style="border-top:1px solid #999; padding-right:5px">&nbsp;</th>
      </tr>

      <tr>
        <th align="left" colspan="3" style="border-top:1px solid #999; border-right:1px solid #999; padding-left:5px"> >>> Mutasi dan saldo akhir</th>
        <th align="right" align="right" style="border-top:1px solid #999; border-right:1px solid #999; padding-right:5px">
          <?php
    				$rupiahdebit=number_format($d,0,',','.');
    				echo "$rupiahdebit";
    			?>
        </th>
        <th align="right" align="right" style="border-top:1px solid #999; border-right:1px solid #999; padding-right:5px">
          <?php
    				$rupiahkredit=number_format($k,0,',','.');
    				echo "$rupiahkredit";
    			?>
        </th>
        <th align="right" align="right" style="border-top:1px solid #999; padding-right:5px">
          <?php
            echo number_format($acuansa,0,',','.');
          ?>
        </th>
      </tr>
    </table>

<?php } ?>