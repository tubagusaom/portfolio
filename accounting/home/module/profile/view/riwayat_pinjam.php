<?php
  $nodpr = 2;
  $sqlpinjam_riwayat="SELECT
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
      -- trans_pinjam.angsur_pinjam,
      -- trans_pinjam.jenis_pinjam,
      -- trans_pinjam.schm_jasa
    FROM pinjam
    -- LEFT JOIN trans_pinjam b ON b.id_pinjam = a.id
    WHERE pinjam.id_schm='$kodeschm' AND
          pinjam.id NOT LIKE $datapinjam[id]

          -- pinjam.ket_pinjam = 2
    ORDER BY pinjam.id DESC
    -- GROUP BY pinjam.id
    ";
  $querypinjam_riwayat	= mysqli_query($koneksi,$sqlpinjam_riwayat);
  while($datapinjam_riwayat=mysqli_fetch_array($querypinjam_riwayat)){
  // var_dump($datapinjam['id']);

  $dpk_r  = $datapinjam_riwayat['ket_pinjam'];

  if ($dpk_r == 3 OR $dpk_r == 4) {
    $sdpk_r = "Lunas";
    $bcoloraco_r = "rgba(105, 255, 0, 0.2)";
  }elseif ($dpk == 2) {
    $sdpk_r = "Pelunasan";
    $bcoloraco_r = "rgba(255, 237, 0, 0.2)";
  }elseif ($dpk == 1) {
    $sdpk_r = "Belum lunas";
    $bcoloraco_r = "rgba(255, 0, 0, 0.2)";
  }
?>

<table class="accordion" style="background:<?=$bcoloraco_r?>">
  <tr>
    <td style="width:2%;vertical-align:top;"> <b> <?=$nodpr++?>.</b></td>
    <td style="font-size:14px;">
      Pinjaman Rp.<?=angka_rupiah($datapinjam_riwayat['jumlah_pinjam'])?> <br>
      <b style="font-size:11px;"> <?=$sdpk_r?> </b>
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
    				$xr=$datapinjam_riwayat['jumlah_pinjam'];
    				$yr=$datapinjam_riwayat['jangka_pinjam'];
    				$zr=$datapinjam_riwayat['jasa_pinjam'];
    				echo "Rp. "; echo number_format($xr,0,',','.');
    			?>
    		</td>
    	</tr>
    	<tr>
    		<th align="left">Total Jasa Koperasi</th>
    		<td colspan="4"><?php echo "Rp. "; echo $cijasr=number_format((($xr*$zr)/100),0,',','.'); ?></td>
    	</tr>
    	<tr>
    		<th align="left">Jangka Waktu</th>
    		<td colspan="4"><?php echo $yr; ?> Bulan</td>
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
    				$cipokr=$xr/$yr;
    				echo "Rp."; echo number_format($cipokr,0,',','.');
    			?>
    		</td>
    		<td align="center" colspan="2">
    			<?php
    				$cijasr=(($xr*$zr)/100)/$yr;
    				echo "Rp."; echo number_format($cijasr,0,',','.');
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
    			$sisabulanr=$yr-$datapinjam_riwayat['angsur_pinjam'];
    			if ($sisabulanr==0) {
    		?>

    		<td colspan="4" align="center">
          <b style="color:darkblue">
    			<?php
            $keteranganpinjamr = $datapinjam_riwayat['ket_pinjam'];

    				if ($keteranganpinjamr==2) {
    					echo "<h2>PROSES PELUNASAN</h2>";
    				}elseif ($keteranganpinjamr==3 OR $keteranganpinjamr==4) {
    					echo "<h2>LUNAS</h2>";
    				}
    			?>
    		  </b>
        </td>

    		<?php
          }else{
        ?>

    		<td align="center">
    			<?php echo "$sisabulanr"; ?> Bln
    		</td>
    		<td align="center">
    			<?php
    				$eber=$cipokr*$sisabulanr;
    				echo "Rp."; echo number_format($eber,0,',','.');
    			?>
    		</td>
    		<td align="center">
    			<?php
    				$aomr=$cijasr*$sisabulanr;
    				echo "Rp."; echo number_format($aomr,0,',','.');
    			?>
    		</td>
    		<td align="center">
    			<b>
    				<?php
    					$sisatotalr=$eber+$aomr;
    					echo "Rp."; echo number_format($sisatotalr,0,',','.');
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
            require_once ('detail_angsuran_riwayat.php');
          ?>

          <!-- ////////////////////////////////////////////////////////////////////////////////////// -->
        </td>
      </tr>

    </table>
  </p>
</div>

<?php } ?>
