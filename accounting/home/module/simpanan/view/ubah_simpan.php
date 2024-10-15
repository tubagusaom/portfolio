
<form  action="?Proses-Edit-Simpanan" method="post" class="form_input">
	<table>
		<tr>
			<td colspan="2"><h1>Ubah Data Simpanan</h1></td>
		</tr>
		<tr>
			<td>Anggota</td>
			<td>
				<input type="hidden" name="kodes" value="<?php echo $_GET['ids']; ?>">
				<input type="text" name="nama" value="<?php echo $_GET['kda']; echo ' - '; echo $_GET['nm']; ?>" readonly style="background-color:whitesmoke">
			</td>
		</tr>
		<tr>
			<td style="border-top:2px solid #999">Simpanan Pokok</td>
			<td style="border-top:2px solid #999">
				 Rp.<input type="text" name="sp" value="<?php echo number_format($_GET['sp'],0,',','.'); ?>" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
			</td>
		</tr>
		<tr>
			<td>Simpanan Wajib</td>
			<td>
				 Rp.<input type="text" name="sw" value="<?php echo number_format($_GET['sw'],0,',','.'); ?>" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
			</td>
		</tr>
		<tr>
			<td>Simpanan Sukarela</td>
			<td>
				 Rp.<input type="text" name="sr" value="<?php echo number_format($_GET['sr'],0,',','.'); ?>" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
			</td>
		</tr>
		<tr>
			<td style="border-top:2px solid #999">Rekening</td>
			<td style="border-top:2px solid #999">
				<input type="text" name="nabank" placeholder="Nama Bank" value="<?php echo $_GET['nabank']; ?>" required oninvalid="this.setCustomValidity('Silahkan Masukan Nama Bank')" oninput="setCustomValidity('')">
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<input type="number" name="norek" placeholder="No Rekening" value="<?php echo $_GET['norek']; ?>" required oninvalid="this.setCustomValidity('Silahkan Masukan No Rekening')" oninput="setCustomValidity('')">
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<input type="text" name="perek" placeholder="Pemilik Rekening" value="<?php echo $_GET['perek']; ?>" required oninvalid="this.setCustomValidity('Silahkan Masukan Pemilik Rekening')" oninput="setCustomValidity('')">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="simpan" value="Simpan">
			</td>
		</tr>
	</table>
</form>
