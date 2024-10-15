<link rel="stylesheet" href="<?=url_berkas() ?>css/popup.css">

		<div id="DetailPopup">
		  <div class="popup-content">
		    <div class="popup-header">
					<a href="<?=base_url()?>?Profile-Simpanan=0&&header=Profile" class="close-button" data-title="close">x</a>
		      <h2 style="color: #004a71;text-shadow: 1px 1px 3px #000, 0 0 3px #ddd;font-size: 21px;padding-top:20px;text-align:center;" >
						PENARIKAN SIMPANAN SUKARELA
					</h2>
		    </div>
		    <div class="popup-body">
          <?php require_once "popup_tarik.php" ?>
				</div>
				<a href="<?=url_copyright()?>" target="_blank" style="cursor: default;"><div class="popup-footer"> © <?=copyright()?>  2021 </div> </a>
		  </div>
			<a href="<?=base_url()?>?Profile-Simpanan&&header=Profile" class="tooltip">
		  	<div class="overlay"></div>
				<div class="tooltiptext">klik sembarang untuk close</div>
			</a>
		</div>

<!-- <form class="" action="" method="post"> -->
<table style="margin-bottom:30px;">
	<tr>

	</tr>
	<tr>
		<td colspan="5"><h1> PENARIKAN </h1></td>
	</tr>

	<?php
		$sqlstatus	  ="SELECT * FROM trans_ambil WHERE id_schm = '$kodeschm' AND stts_ambil NOT LIKE '2' ORDER BY id DESC";
		$querystatus	=mysqli_query($koneksi,$sqlstatus);
		$datastatus		=mysqli_fetch_array($querystatus);

		$tds = count($datastatus[0]);
		if ($tds == 0) {
	?>

	<tr>
		<td colspan="5">
			<input type="submit" name="tarik" value="Penarikan Simpanan Sukarela"  style="width:100%;cursor:pointer; font-size:20px;padding:10px 0 35px 0;" onclick="window.location='<?=base_url()?>?Profile-Simpanan&&header=Profile#DetailPopup';">
		</td>
	</tr>

	<?php } ?>

	<tr align="center">
		<th style="width:18%;">Status</th>
		<!-- <th style="font-size:13px;">No</th> -->
		<!-- <th style="font-size:13px;">Jenis</th> -->
		<th style="font-size:13px;width:25%;">Tanggal Penarikan</th>
		<th style="font-size:13px;">Jumlah Penarikan</th>
	</tr>

	<?php if ($tds > 0) { ?>

	<tr style="background:rgba(255, 255, 0, 0.4);">
		<td align="center" style="font-size:13px;border-bottom: 3px solid #999;">
			<?php
				$statusambildata = $datastatus[2];

				$ar_status_data = array(
					'' => "",
					'2' => "<i class='fa fa-check-square' style='color:green;'></i>",
					'3' => "Menunggu Aprove <br> <b style='font-size:10px;'>Bendahara Koperasi</b>",
					'1' => "Menunggu Aprove <br> <b style='font-size:10px;'>Ketua Koperasi</b>"
				);

				echo $ar_status_data[$statusambildata];
			?>
		</td>
		<!-- <td align="center" style="font-size:13px;">-</td> -->
		<td align="center" style="font-size:13px;border-bottom: 3px solid #999;">
			<?php echo tgl_indo($datastatus[3]); ?>
		</td>
		<td align="right" style="font-size:13px;border-bottom: 3px solid #999;">
			<?php
				$pds=$datastatus[1];
				echo number_format($pds,0,',','.');
			?>
		</td>

	</tr>


	<?php
		}

		$nob=1;
		$sc	=0;
		$sqltpd	  ="SELECT * FROM trans_ambil
									WHERE efv_ambil LIKE '%$cari%' AND
												id_schm = '$kodeschm'
												AND
												stts_ambil NOT LIKE '1'
												AND
												stts_ambil NOT LIKE '3'
									ORDER BY id DESC";

		$querytpd	=mysqli_query($koneksi,$sqltpd);
		// $datarow=mysqli_fetch_row($querytpd);

		// $totalpenarikan = count($datarow);

		while($datatpd=mysqli_fetch_array($querytpd)){
			if(fmod($nob,2)==1)
			{$warnaa="ghostwhite";}
			else
			{$warnaa="whitesmoke";}
	?>
	<tr class="hover" bgcolor="<?php echo $warnaa ?>">
		<td align="center" style="font-size:17px;">
			<?php
				$statusambil = $datatpd[2];

				$ar_status = array(
					'' => "",
					'2' => "<i class='fa fa-check-square' style='color:green;'></i>",
					'3' => "Menunggu Aprove <br> <b style='font-size:10px;'>Bendahara Koperasi</b>",
					'1' => "Menunggu Aprove <br> <b style='font-size:10px;'>Ketua Koperasi</b>"
				);

				echo $ar_status[$statusambil];
			?>
		</td>
		<!-- <td align="center" style="font-size:13px;"><?php echo $nob; ?></td> -->
		<!-- <td style="font-size:13px;">Penarikan</td> -->
		<td align="center" style="font-size:13px;">
			<?php echo tgl_indo($datatpd[3]); ?>
		</td>
		<td align="right" style="font-size:13px;">
		<input type="hidden" name="" value="<?php echo $acuantotall=$datatpd[1]; ?>">
			<?php
				$p1=$datatpd[1];
				echo number_format($p1,0,',','.');

				$sc += $acuantotall;
			?>
		</td>
	</tr>
	<?php
		$nob++;};

		// if ($datarow > 0) {
	?>
	<tr>
		<!-- <td>Total</td> -->
		<td colspan="3" align="right" style="font-size:13px;">
			<b style="color:darkblue">
				<?php
					$rupiahh=number_format($sc,0,',','.');
					echo "$rupiahh";
				?>
			</b>
		</td>
	</tr>
	<?php
		// }
	?>
</table>
<!-- </form> -->
