<!-- framework bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!-- datepicker bootstrap -->
<link rel="stylesheet" href="<?=base_url()?>bootstrap-datepicker/css/bootstrap-datepicker.min.css">
<script src="<?=base_url()?>bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url()?>bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"></script>

<script>
	$( function(){
		$( "#date" ).datepicker({
			autoclose:true,
			todayHighlight:true,
			format:'yyyy/mm/dd',
			language: 'id'
		});
	});
</script>

<style>
	#navi .core ul label > li.menuaktif {
		width: 250px;
	}
	.alert{
		padding:0px!important;
	}
</style>

<form action="?Proses-Ubah-Jurnal" method="post" class="form_input">
	<table>
		<tr>
			<td colspan="2"><h1>Ubah Data Transaksi Jurnal</h1></td>
		</tr>
		<tr>
			<td>Inisial</td>
			<td>
				<input type="hidden" name="acuan_kode" value="<?php echo $_GET['id']; ?>">
				<input type="text" name="" value="<?php echo $_GET['inisial']; ?>" disabled>
				<input type="hidden" name="idakun" value="<?php echo $idakun=$_SESSION['id_akun']; ?>">
			</td>
		</tr>
		<tr>
			<td>Account</td>
			<td>
				<select name="account">
					<option value="<?php echo $kdacunt=$_GET['account']; ?>" selected>
						<?php
							$sql	  ="SELECT `id`, `kd_acount`, `desc_acount`, `jenis_acount`, `type_acount`, `stts_acount`, `c_acount` FROM acount WHERE kd_acount='$kdacunt'";
							$query	=mysqli_query($koneksi,$sql);
							$data		=mysqli_fetch_array($query);

							echo $kdacunt; echo " - "; echo $data['2'];;
						?>
					</option>
					<?php
						$sql	  ="SELECT `kd_acount`, `desc_acount`, `jenis_acount` FROM acount WHERE stts_acount NOT LIKE '3' AND type_acount NOT LIKE 'M' ORDER BY kd_acount ASC";
						$query	=mysqli_query($koneksi,$sql);
						while($data=mysqli_fetch_array($query))
						{
							echo "<option value=$data[0]>$data[0] - $data[1]</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td>
	      <select name="jenis">
					<option value="<?php echo $jenis=$_GET['jenis']; ?>" selected>
						<?php
							if ($jenis=="D") {
								echo "Debit";
							} else {
								echo "Kredit";
							}
						?>
					</option>
					<!-- <option value="D">Debit</option>
					<option value="K">Kredit</option> -->
				</select>
			</td>
		</tr>
		<tr>
			<td>Value	Rp.</td>
			<td>
				<input type="text" name="saldo" value="<?php $rupiah1=number_format($_GET['saldo'],0,',','.'); echo "$rupiah1"; ?>" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
			</td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>
				<input type="text" name="ket" value="<?php echo $_GET['ket']; ?>">
			</td>
		</tr>
		<tr>
			<td>Kode Reffrensi</td>
			<td>
				<input type="text" name="reff" value="<?php echo $_GET['reff']; ?>">
			</td>
		</tr>
		<tr>
			<td>Actual Date</td>
			<td>
				<!-- <input type="date" name="date" value="<?php echo $_GET['date']; ?>"> -->
				<input type="text" name="date" readonly class="form-control" id="date" value="<?php echo $_GET['date']; ?>">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="simpan" value="Simpan">
                
                <a href="?Data-Jurnal&&header=Jurnal">
					<input type="button" class="bback" name="back" value="Kembali">
				</a>
			</td>
		</tr>
	</table>
</form>
