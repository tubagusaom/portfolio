<form class="" action="?Proses-Configurasi" method="post">
<table>
	<tr>
		<td colspan="8"><h1>Detail Konfigurasi</h1></td>
	</tr>

	<tr>
		<td colspan="8">
      <?php if (isset($_GET['Acount'])=='Configurasi') {echo "";}else{ ?>
        <a href="?Configurasi-Account&&header=<?php echo "Account" ?>&Acount=Configurasi">
          <input type="button" name="simpan" value="Configurasi">
        </a>
      <?php } ?>
		</td>
	</tr>

  <?php if (isset($_GET['Acount'])=='Configurasi') { ?>
  <tr>
    <td colspan="8">
      <table style="margin-top:0px;margin-bottom:15px">
        <tr>
    			<td>Acount</td>
    			<td>
    				<select name="acount" required oninvalid="this.setCustomValidity('Silahkan Pilih Acount')" oninput="setCustomValidity('')">
    					<option value="" selected>-</option>
    					<?php
                $sql_a="SELECT acount.kd_acount,acount.desc_acount from acount LEFT JOIN conf_acount ON acount.kd_acount = conf_acount.id_acount WHERE acount.stts_acount NOT LIKE '3' AND acount.type_acount NOT LIKE 'M' AND conf_acount.id_acount is NULL OR conf_acount.stts_conf='3' ORDER BY acount.kd_acount ASC";
    	          $query_a=mysqli_query($koneksi,$sql_a);
    	          while($dataa=mysqli_fetch_array($query_a))
    	          {
    	            echo "<option value='$dataa[0]'>$dataa[0]-$dataa[1]</option>";
    	          };
    	        ?>
    				</select>
    			</td>
    		</tr>
    		<tr>
    			<td>Jenis</td>
    			<td>
            <select name="jenis" required oninvalid="this.setCustomValidity('Silahkan Pilih Jenis Konfigurasi')" oninput="setCustomValidity('')">
    					<option value="" selected>-</option>
              <option value="<?php echo '1'; ?>">Laba-Rugi</option>
    					<option value="<?php echo '2'; ?>">Neraca</option>
    				</select>
    			</td>
    		</tr>
    		<tr>
    			<td colspan="2">
    				<input type="submit" name="simpan" value="Simpan">
            <a href="?Configurasi-Account&&header=<?php echo "Account" ?>">
              <input type="button" name="simpan" value="Batal" class="bback">
            </a>
    			</td>
    		</tr>
    	</table>
    </td>
  </tr>
  <?php }else{echo "";} ?>

	<tr>
		<th>No</th>
		<th>Acount</th>
		<th>Jenis</th>
		<th align="center">-</th>

	</tr>

	<?php
		if (isset($_POST['submit'])) {
			$cari=$_POST['search'];
		}else {
			$cari='';
		}

		$no		  =1;
		$sql	  ="SELECT `id`, `jenis_conf`, `id_acount`, `stts_conf`, `c_conf` FROM `conf_acount` WHERE stts_conf NOT LIKE '3' ORDER BY id_acount ASC";
		$query	=mysqli_query($koneksi,$sql);
		while($data=mysqli_fetch_array($query)){
			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}

			$sqls	  ="SELECT * FROM acount where kd_acount=$data[2]";
			$querys	=mysqli_query($koneksi,$sqls);
			$datas	=mysqli_fetch_array($querys);
	?>
	<tr class="hover" bgcolor="<?php echo $warna ?>">
		<td><?php echo "$no"; ?>.</td>
		<td><?php echo "$datas[1] - $datas[2]"; ?></td>
		<td width="25%">
      <?php
				if (isset($_GET['Edit'])=='Konfigurasi') {
					if ($data[0]==$_GET['id']) {
			?>
			<input type="hidden" name="acuanedit" value="<?php echo $_GET['id']; ?>">
			<select name="editjenis" autofocus>
				<option value="<?php echo $data[1]; ?>">
					<?php
						if ($data[1]==1) {
							echo "Laba-Rugi";
						}else {
							echo "Neraca";
						}
					?>
				</option>
				<option value="<?php echo '1'; ?>">Laba-Rugi</option>
				<option value="<?php echo '2'; ?>">Neraca</option>
			</select>
			<?php
					}else {
						if ($data[1]==1) {
		          echo "Laba-Rugi";
		        }else {
		          echo "Neraca";
		        }
					}
				}else {
					if ($data[1]==1) {
						echo "Laba-Rugi";
					}else {
						echo "Neraca";
					}
				}
      ?>
    </td>

		<td align="center" width="12%">
			<?php
				if (isset($_GET['Edit'])=='Konfigurasi') {
					if ($data[0]==$_GET['id']) {
			?>
				<input type="submit" name="simpanperubahan" value="Simpan">
				<a href="?Configurasi-Account&&header=<?php echo "Account" ?>">
					<input type="button" name="batal" value="Batal" class="bback">
				</a>
		<?php }else{ ?>
			<a href="?Configurasi-Account&&header=Account&&Edit=Konfigurasi&&id=<?php echo "$data[0]" ?>">Edit</a> |
			<a href="?Proses-Configurasi&&Hapus=Konfigurasi&&id=<?php echo "$data[0]" ?>" onclick="return confirm('apakah anda yakin')" href="#">Hapus</a>
		<?php }}else{ ?>
			<a href="?Configurasi-Account&&header=Account&&Edit=Konfigurasi&&id=<?php echo "$data[0]" ?>">Edit</a> |
			<a href="?Proses-Configurasi&&id=<?php echo "$data[0]" ?>" onclick="return confirm('apakah anda yakin')" href="#">Hapus</a>
			<?php }	 ?>
		</td>
	</tr>

	<?php
		$no++;};
	?>

</table>
</form>
