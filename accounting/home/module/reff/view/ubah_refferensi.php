<form action="?Proses-Edit-Ketentuan" method="post" class="form_input">
	<table>
		<tr>
			<td colspan="2"><h1>Edit Konfigurasi <?php echo $jenis=$_GET['jenis']; ?></h1></td>
		</tr>
		<tr>
			<td>
				Ketentuan
				<?php
					echo $jenis;

					if ($jenis=='jasa') {
						$reff=' %';
					}else {
						$reff=' Bln';
					}
				?>
			</td>
			<td>
				<input type="hidden" name="acuan_kode" value="<?php echo $_GET['id']; ?>">
				<input type="hidden" name="jenis" value="<?php echo $_GET['jenis']; ?>">
        <select class="" name="nama">
          <option value="<?php echo $_GET['ketentuan']; ?>">
						<?php echo $_GET['ketentuan']; echo "$reff"; ?>
					</option>
          <?php
            $d=1;
            while ($d<=50){
              echo"<option value='$d'> $d $reff</option>";
              $d=$d+1;
            }
          ?>
        </select>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="simpan" value="Simpan">
			</td>
		</tr>
	</table>
</form>
