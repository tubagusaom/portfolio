<?php
  $sqlpinjam="SELECT
      pinjam.id,
      pinjam.jumlah_pinjam,
      pinjam.keperluan_pinjam,
      pinjam.tgl_pinjam,
      pinjam.bank_pinjam,
      pinjam.norek_pinjam,
      pinjam.pemilik_pinjam,
      pinjam.jangka_pinjam,
      pinjam.jasa_pinjam,
      pinjam.ket_pinjam
    FROM pinjam
    WHERE pinjam.id_schm='$kodeschm'
          -- pinjam.ket_pinjam IN ('1')
          -- pinjam.ket_pinjam NOT LIKE 4
    ORDER BY pinjam.id DESC
    ";
  $querypinjam	= mysqli_query($koneksi,$sqlpinjam);
  $datapinjam	  = mysqli_fetch_array($querypinjam);
  // while($datapinjam=mysqli_fetch_array($querypinjam)){
  // var_dump($datapinjam);
?>

<table>
  <tr>
    <td><h1>PINJAMAN</h1></td>
  </tr>

<?php if ($datapinjam['ket_pinjam'] == 3 OR $datapinjam['ket_pinjam'] == 4) { ?>


  <tr>
    <td colspan="5" style="width:100%;">
      <input type="submit" name="simpan" style="width:100%;font-size:18px;padding:8px 0 28px 0;" value="<?=isset($datapinjamthem) ? 'UBAH PINJAMAN':'AJUKAN PINJAMAN'?>" style="width:100%;cursor:pointer;"  onclick="window.location='<?=base_url()?>?Profile-Pinjaman&&header=Profile#DetailPopup';">
    </td>
  </tr>

<?php } ?>
</table>

  <?php
    $dptk = $datapinjamthem['ket_pinjam'];
    $dpk  = $datapinjam['ket_pinjam'];

    if ($dptk == 3 OR $dptk == 4) {
      $sdptk = "Aproval Ketua Koperasi";
    }elseif ($dptk == 2) {
      $sdptk = "Aproval Bendahara 2";
    }elseif ($dptk == 1) {
      $sdptk = "Aproval Bendahara 1";
    }

    if ($dpk == 3 OR $dpk == 4) {
      $sdpk = "Lunas";
      $bcoloracor = "rgba(105, 255, 0, 0.2)";
    }elseif ($dpk == 2) {
      $sdpk = "Pelunasan";
      $bcoloracor = "rgba(255, 237, 0, 0.2)";
    }elseif ($dpk == 1) {
      $sdpk = "Belum lunas";
      $bcoloracor = "rgba(255, 0, 0, 0.2)";
    }
  ?>

<table class="accordion" style="background:<?=$bcoloracor?>">
  <tr>
    <td style="width:2%;vertical-align:top;"> <b> 1.</b></td>
    <td style="font-size:14px;">
      Pinjaman Rp.<?=angka_rupiah($datapinjam['jumlah_pinjam'])?> <br>
      <b style="font-size:11px;"> <?= isset($datapinjamthem) ? $sdptk:$sdpk; ?></b>
    </td>
    <td align="right" style="font-size:14px;">
      <b class="iacord"></b>
    </td>
  </tr>
</table>

<div class="panel">
  <p>
    <table>
    	<tr>
    		<th align="left" style="width:20%">Kode Anggota</th>
    		<td colspan="3">
          <?php echo $dataakun['kd_akun']; ?>
        </td>
    	</tr>
    	<tr>
    		<th align="left" style="width:20%">Nama</th>
    		<td colspan="3">
          <?php echo $dataakun['nm_akun']; ?>
        </td>
    	</tr>
    	<tr>
    		<th align="left">Total Pinjaman</th>
    		<td colspan="4">
    			<?php
    				$x=isset($datapinjamthem) ? $datapinjamthem['jumlah_pinjam']:$datapinjam['jumlah_pinjam'];
    				$y=isset($datapinjamthem) ? $datapinjamthem['jangka_pinjam']:$datapinjam['jangka_pinjam'];
    				$z=isset($datapinjamthem) ? $datapinjamthem['jasa_pinjam']:$datapinjam['jasa_pinjam'];
    				echo "Rp. "; echo number_format($x,0,',','.');
    			?>
    		</td>
    	</tr>
    	<tr>
    		<th align="left">Total Jasa Koperasi</th>
    		<td colspan="4"><?php echo "Rp. "; echo $cijas=number_format((($x*$z)/100),0,',','.'); ?></td>
    	</tr>
    	<tr>
    		<th align="left">Jangka Waktu</th>
    		<td colspan="4"><?php echo $y; ?> Bulan</td>
    	</tr>
    	<tr>
    		<th align="left">Cicilan Perbulan</th>
    		<td bgcolor="whitesmoke" align="center" colspan="2"><b>Pokok</b></td>
    		<td bgcolor="whitesmoke" align="center" colspan="2"><b>Jasa Koprasi</b></td>
    	</tr>
    	<tr>
    		<td>&nbsp;</td>
    		<td align="center" colspan="2">
    			<?php
    				$cipok=$x/$y;
    				echo "Rp."; echo number_format($cipok,0,',','.');
    			?>
    		</td>
    		<td align="center" colspan="2">
    			<?php
    				$cijas=(($x*$z)/100)/$y;
    				echo "Rp."; echo number_format($cijas,0,',','.');
    			?>
    		</td>
    	</tr>
    	<tr>
    		<th align="left">Sisa Pinjaman</th>
    		<td bgcolor="whitesmoke" align="center"><b>Bulan</b></td>
    		<td bgcolor="whitesmoke" align="center"><b>Pokok</b></td>
    		<td bgcolor="whitesmoke" align="center"><b>Jasa</b></td>
    		<td bgcolor="whitesmoke" align="center"><b style="color:darkblue">Total</b></td>
    	</tr>
    	<tr>
    		<td>&nbsp;</td>
    		<?php
    			$sisabulan=$y-$datapinjam['angsur_pinjam'];
    			if ($sisabulan==0) {
    		?>

    		<td colspan="4" align="center">
          <b style="color:darkblue">
    			<?php
            $keteranganpinjam = $datapinjam['ket_pinjam'];

    				if ($keteranganpinjam==2) {
    					echo "<h2>PROSES PELUNASAN</h2>";
    				}elseif ($keteranganpinjam==3 OR $keteranganpinjam==4) {
    					echo "<h2>LUNAS</h2>";
    				}
    			?>
    		  </b>
        </td>

    		<?php
          }else{
        ?>

    		<td align="center">
    			<?php echo "$sisabulan"; ?> Bln
    		</td>
    		<td align="center">
    			<?php
    				$ebe=$cipok*$sisabulan;
    				echo "Rp."; echo number_format($ebe,0,',','.');
    			?>
    		</td>
    		<td align="center">
    			<?php
    				$aom=$cijas*$sisabulan;
    				echo "Rp."; echo number_format($aom,0,',','.');
    			?>
    		</td>
    		<td align="center">
    			<b>
    				<?php
    					$sisatotal=$ebe+$aom;
    					echo "Rp."; echo number_format($sisatotal,0,',','.');
    				?>
    			</b>
    		</td>

    		<?php
          }
        ?>
    	</tr>

      <tr>
        <td colspan="5">
          <!-- //////////////////////////////////////////////////////////////////////////////// -->
          <?php
            require_once ('detail_angsuran.php');
          ?>
          <!-- ////////////////////////////////////////////////////////////////////////////////////// -->
        </td>
      </tr>

    </table>
  </p>
</div>

<!-- //////////////////////////////////////////////////////////////////////////////// -->
<?php
  if (isset($_GET['pelunasan'])=='Lunas') {
    require_once ('pelunasan.php');
  }else {
    echo "";
  }
?>
<!-- //////////////////////////////////////////////////////////////////////////////// -->

<!-- //////////////////////////////////////////////////////////////////////////////// -->
<?php require_once ('riwayat_pinjam.php'); ?>
<!-- //////////////////////////////////////////////////////////////////////////////// -->
