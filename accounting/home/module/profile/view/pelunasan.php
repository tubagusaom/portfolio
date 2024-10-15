<script language="JavaScript" type="text/javascript">
    function checkform ( form )
    {
			if (form.tape.value == "") {
        alert( "Tentukan Tanggal Pelunasan.!!" );
        form.tape.focus();
        return false ;
      }
      return true ;
    }
</script>

<form class="" action="?Pelunasan-Proses" method="post" onsubmit="return checkform(this);">
<table>

	<tr>
		<td colspan="6"><h1>Pelunasan</h1></td>
	</tr>

	<?php if ($datax[2]=="pelunasan") { ?>

	<tr>
		<td><b>LOADING...</b></td>
	</tr>

<?php }else { ?>

	<tr align="center">
		<th>-</th>
		<th>Sisa Angsuran Pokok</th>
		<th>Sisa Jasa Koprasi</th>
		<th>Total</th>
		<th>Tanggal Pelunasan</th>
	</tr>

	<tr class="hover" align="center">
		<td>1</td>
    <td>
			<input type="hidden" name="ta" value="<?php echo $datapinjam['jangka_pinjam']; ?>">
			<input type="hidden" name="kp" value="<?php echo $datapinjam['id']; ?>">
			<?php
				echo "Rp."; echo number_format($ebe,0,',','.');
			?>
		</td>
		<td>
			<?php
				echo "Rp."; echo number_format($aom,0,',','.');
			?>
		</td>
		<td>
			<b>
				<?php
					$tpp=$ebe+$aom;
					echo number_format($tpp,0,',','.');
				?>
			</b>
		</td>
		<td><input type="date" name="tape" value="<?=date('Y-m-d')?>" placeholder="format Thn-Bln-Tgl ( Contoh:2017-08-17 )"></td>
	</tr>
	<tr>
		<td colspan="6" style="border-top:2px solid #999">
			<input type="submit" name="" value="Pelunasan" onclick="return confirm('Apakah sisa pinjaman <?php echo $_GET['namaa'] ?> akan dilunasi ???')">
		</td>
	</tr>

	<?php } ?>

</table>
<!-- <br> -->
</form>
