<script language="JavaScript" type="text/javascript">
    function checkform ( form )
    {
			if (form.kodeacount.value == "") {
        alert( "Pilih kode acount.!!" );
        form.kodeacount.focus();
        return false ;
      }else if (form.fbulan.value == "") {
        alert( "Pilih Bulan.!!" );
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
		<td colspan="9"><h1>Buku Besar</h1></td>
	</tr>

	<tr>
		<td colspan="4">
			<?php
        // include 'model/modul/casedate.php';
				if (isset($_POST['pencarian'])) {
          $dsum=0;
          $ksum=0;
          $kodekirim=$_POST['kodeacount'];
          $fbulan=$_POST['fbulan'];
          $ftahun=$_POST['ftahun'];
          $ketacount=substr($kodekirim,3,1);
          $descacount=substr($kodekirim,4);

          if ($fbulan=='All') {
            $acuanbt="YEAR(efv_trans)='$ftahun' AND";
            $acuanbtsum="YEAR(efv_trans)<'$ftahun' AND";
          }else {
            $acuanbt="MONTH(efv_trans)='$fbulan' AND YEAR(efv_trans)='$ftahun' AND";
            $acuanbtsum="efv_trans<'$ftahun-$fbulan-01' AND";
          }

          if ($ketacount=='M') {
            $kodeacount=substr($kodekirim,0,1);
          }else {
            $kodeacount=substr($kodekirim,0,3);
          };
				}else {
          $kodeacount='';
          $kodeacount1='';
          $acuanbt='';
          $acuanbtsum="";
				}

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
                    ORDER BY id DESC
                  ";

				$query	=mysqli_query($koneksi,$sql);
				$hitung = mysqli_num_rows($query);

				if (isset($_POST['pencarian'])) {
          if ($fbulan=='All') {
            $abaa='January s/d Desember';
          }else {
            $abaa=bulan(date($fbulan));
          }

          $kka=substr($kodekirim,0,3);
					if ($hitung==0) {
						echo "<font style='font-size:12px;'>Filter berdasarkan kode account <b style='text-decoration:underline; color:darkblue'>$kka</b> <br> Bulan <b style='text-decoration:underline; color:darkblue'>$abaa</b>, Tahun <b style='text-decoration:underline; color:darkblue'>$ftahun</b> Tidak ditemukan</font>";
					}else {
						echo "<font style='font-size:12px;'>Filter berdasarkan kode account <b style='text-decoration:underline; color:darkblue'>$kka</b> <br> Bulan <b style='text-decoration:underline; color:darkblue'>$abaa</b>, Tahun <b style='text-decoration:underline; color:darkblue'>$ftahun</b> jumlah <b style='text-decoration:underline; color:darkblue'>$hitung</b> data</font>";
					}
				}else {
				  echo "<b style='font-size:12px;'>Filter data :</b>";
				}
			?>
		</td>

		<td colspan="5">
			<?php
				if (isset($_POST['pencarian'])) {

          $sqlsum	  =
                    "SELECT
                      `jenis_trans`,
                      `saldo_trans`
                    FROM trans WHERE
                      stts_trans NOT LIKE '3' AND
                      $acuanbtsum
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

          $saldoawal=$dsum-$ksum;

					if ($akses=='default' OR $akses=='superuser' OR $akses=='akunting') {
            if ($hitung==0) {
              echo "";
            }else {
			?>
        <!-- aom -->
				<a href="module/laporan/view/cetak.php?kka=<?php echo $kka ?>&&descacount=<?php echo $descacount ?>&&fbulan=<?php echo $fbulan ?>&&ftahun=<?php echo $ftahun ?>&&ketacount=<?php echo $ketacount ?>&&saldoawal=<?php echo $saldoawal ?>" target="_blank">
					<input type="button" name="cetak" value="Cetak">
				</a>

        <?php } ?>

				<a href="?Buku-Besar&&header=Laporan">
					<input type="button" class="bback" name="back" value="Kembali">
				</a>

			<?php
				}else{
			?>

				<a href="?Data-Jurnal&&header=Laporan">
					<input type="button" class="bback" name="back" value="Kembali">
				</a>

			<?php
				}}else {
			?>

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
          <option value="" style="color:darkblue; font-weight:700">Bulan</option>
          <option value="All">ALL</option>
          <?php
            for($fb=1; $fb<=12; $fb++)
            {
              $bulan=$fb;
              if ($bulan<10)
              {$bulan="0$fb";}
              $aba=bulan(date($bulan));
              echo"<option value='$bulan'>$aba</option>";
            }
          ?>
        </select>

				<select class="acount" name="kodeacount">
					<option value="" style="color:darkblue; font-weight:700">- Kode Acount -</option>
					<?php
						$sqlx	  ="SELECT `kd_acount`, `desc_acount`, `jenis_acount`, `type_acount` FROM acount WHERE stts_acount NOT LIKE '3' ORDER BY kd_acount ASC";
						$queryx	=mysqli_query($koneksi,$sqlx);
						while($datax=mysqli_fetch_array($queryx)){
							if(fmod($datax['type_acount'], 2)==M){
								$font='0';
							}else{
								$font='700';
							}
              $dataxtiga=substr($datax['type_acount'],0,1);
							echo "<option value='$datax[0]$dataxtiga$datax[1]' style='font-weight:$font'>$datax[0] - $datax[1]</option>";
						}
					?>
				</select>

			<?php } ?>
		</td>
	</tr>

  <?php
    if (isset($_POST['pencarian'])) {
  ?>

  <tr>
    <td colspan="9" align="right" style="background-color:#ddd; border-top:2px solid #999">
      Saldo Awal : &nbsp; <b><?php echo number_format($saldoawal,0,',','.'); ?></b>
    </td>
  </tr>

  <?php }else{echo "";} ?>

	<tr align="center">
		<th rowspan="2">No</th>
		<th rowspan="2" width="5%">Inisial</th>
		<th rowspan="2">Account</th>
		<th rowspan="2">Kode Reff.</th>
		<th rowspan="2">Keterangan</th>
		<th rowspan="2" width="8%">Actual Date</th>

    <?php
      if (isset($_POST['pencarian'])) {
        $colspan=3;
        $acuansa=$saldoawal; //SA
      }else {
        $colspan=2;
      }
    ?>

		<th colspan="<?php echo $colspan ?>">Value Rp.</th>
	</tr>
	<tr align="center">
		<th>D</th>
		<th>K</th>

    <?php if (isset($_POST['pencarian'])) { ?>

    <th>Saldo</th>

    <?php }else{ echo "";} ?>

	</tr>

	<?php
		$no=1;
		$d=0;
		$k=0;
		while($data=mysqli_fetch_array($query)){
			if(fmod($no,2)==1)
				{$warna="ghostwhite";}
			else
				{$warna="whitesmoke";}
	?>

	<tr class="hover" bgcolor="<?php echo $warna ?>">
		<td><?php echo $no; ?>.</td>
		<td><?php echo "$data[1]"; ?></td>
		<td>
			<?php
				$sqla	  ="SELECT `id`, `kd_acount`, `desc_acount`, `jenis_acount`, `type_acount`, `stts_acount`, `c_acount` FROM acount WHERE kd_acount='$data[8]'";
				$querya	=mysqli_query($koneksi,$sqla);
				$dataa	=mysqli_fetch_array($querya);

				echo "$data[8]";
				echo " - ";
				echo "$dataa[2]";
			?>
		</td>
		<td><?php echo "$data[4]"; ?></td>
		<td><?php echo "$data[5]"; ?></td>
		<td>
			<?php
				$a=substr($data[6],8);
				$b=substr($data[6],5,2);
				$c=substr($data[6],0,4);

				echo "$a-$b-$c";
			?>
		</td>
		<td align="right" width="10%">
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
		<td align="right" width="10%">
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

    <?php if (isset($_POST['pencarian'])) { ?>
    <td align="right" width="10%">
			<?php
        $acuansa=$acuansa-$kredit+$debit;
        echo number_format($acuansa,0,',','.');
      ?>
		</td>
    <?php }else{echo "";} ?>

	</tr>

	<?php
		$no++;};

    if (isset($_POST['pencarian'])) {
      if ($hitung==0) {
        echo "";
      }else {
	?>

	<tr>
    <td colspan="6" style="color:darkblue">>>> Mutasi dan saldo akhir</td>
		<td align="right" style="color:darkblue">
			<?php
				$rupiahdebit=number_format($d,0,',','.');
				echo "$rupiahdebit";
			?>
		</td>
		<td align="right" style="color:darkblue">
			<?php
				$rupiahkredit=number_format($k,0,',','.');
				echo "$rupiahkredit";
			?>
		</td>
    <td align="right" style="color:darkblue">
			<?php echo number_format($acuansa,0,',','.'); ?>
		</td>
	</tr>

  <?php
    }}else {
      echo "";
    }
  ?>

</table>
</form>
