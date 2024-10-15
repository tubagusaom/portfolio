<?php
	$id = $_GET['id'];

	$sql	  =
	"SELECT
		a.`Id`,
		a.`kd_akun`,
		a.`nm_akun`,
		a.`almt_akun`,
		a.`tlp_akun`,
		a.`stts_akun`,
		a.`c_akun`,
		a.`kd_comp`,
		a.`kd_divisi`,
		a.`tgl_perusahaan`,
		a.`tgl_koperasi`,
		b.`p_schm`,
		b.`w_schm`,
		b.`s_schm`,
		b.`bank_schm`,
		b.`norek_schm`,
		b.`pemilik_schm`
	FROM akun a
	LEFT JOIN schm b ON b.id_akun = a.id
	WHERE a.id = $id ";
	$query	=mysqli_query($koneksi,$sql);
	$data=mysqli_fetch_array($query);

?>

<form action="?Proses-Edit-Anggota" method="post" class="form_input">
	<table>
		<tr>
			<td colspan="2"><h1>Ubah Data Anggota</h1></td>
		</tr>

		<tr>
			<td>Tanggal Bergabung di perusahaan</td>
			<td>
				<input type="date" name="tgl_perusahaan" value="<?=$data['tgl_perusahaan']; ?>" required oninvalid="this.setCustomValidity('Silahkan Pilih Tanggal Bergabung di perusahaan')" oninput="setCustomValidity('')">

			</td>
		</tr>
		<tr>
			<td>Tanggal bergabung di koperasi</td>
			<td>
				<input type="date" name="tgl_koperasi" value="<?=$data['tgl_koperasi']; ?>" required oninvalid="this.setCustomValidity('Silahkan Pilih Tanggal Bergabung di koperasi')" oninput="setCustomValidity('')">
			</td>
		</tr>

		<tr>
			<td style="border-top:2px solid #999">NIK</td>
			<td style="border-top:2px solid #999">
				<input type="text" name="kodeanggota" value="<?=$data['kd_akun']; ?>" required oninvalid="this.setCustomValidity('Silahkan Masukan NIK')" oninput="setCustomValidity('')">
			</td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>
				<input type="hidden" name="kodes" value="<?php echo $_GET['ids']; ?>">
				<input type="hidden" name="kodea" value="<?=$_GET['id']; ?>">
				<input type="hidden" name="url_get" value="<?=get_url()?>">
				<input type="text" name="nama" value="<?=$data['nm_akun']; ?>" required oninvalid="this.setCustomValidity('Silahkan Masukan Nama')" oninput="setCustomValidity('')">
			</td>
		</tr>
		<tr>
			<td>Alamat Email</td>
			<td>
				<textarea name="almt" rows="8" cols="40" required oninvalid="this.setCustomValidity('Silahkan Masukan Alamat Email')" oninput="setCustomValidity('')"><?=$data['almt_akun']; ?></textarea>
			</td>
		</tr>
		<tr>
			<td>No Hp (WhatsApp)</td>
			<td>
				<input type="text" name="tlp" value="<?=$data['tlp_akun']; ?>" required oninvalid="this.setCustomValidity('Silahkan Masukan No Hp (WhatsApp)')" oninput="setCustomValidity('')">
			</td>
		</tr>

		<tr>
			<td style="border-top:2px solid #999">Perusahaan</td>
			<td style="border-top:2px solid #999">
				<select name="comp" required oninvalid="this.setCustomValidity('Silahkan Pilih Perusahaan')" oninput="setCustomValidity('')">
					<option value="<?php echo $_GET['idcomp']; ?>" selected><?php echo $_GET['comp']; ?></option>
					<?php
	          $sql_c="select * from company  WHERE stts_comp NOT LIKE '3' AND id != $_GET[idcomp]";
	          $query_c=mysqli_query($koneksi,$sql_c);
	          while($datac=mysqli_fetch_array($query_c))
	          {
	            echo "<option value='$datac[0]'>$datac[1]</option>";
	          };
	        ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Divisi <b style="font-size:10px;">( Bisnis unit )</b></td>
			<td>
				<select name="divisi" required oninvalid="this.setCustomValidity('Silahkan Pilih Bisnis unit')" oninput="setCustomValidity('')">
					<option value="<?php echo $_GET['iddivisi']; ?>" selected><?php echo $_GET['divisi']; ?></option>
					<?php
	          $sql_dv="select * from divisi  WHERE stts_divisi NOT LIKE '3' AND id != $_GET[iddivisi]";
	          $query_dv=mysqli_query($koneksi,$sql_dv);
	          while($datadv=mysqli_fetch_array($query_dv))
	          {
	            echo "<option value='$datadv[0]'>$datadv[1]</option>";
	          };
	        ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Departemen</td>
			<td>
				<select name="dept" required oninvalid="this.setCustomValidity('Silahkan Pilih Departemen')" oninput="setCustomValidity('')">
					<option value="<?php echo $_GET['iddept']; ?>" selected><?php echo $_GET['dept']; ?></option>
					<?php
	          $sql_a="select * from dept  WHERE stts_dept NOT LIKE '3' AND id != $_GET[iddept]";
	          $query_a=mysqli_query($koneksi,$sql_a);
	          while($dataa=mysqli_fetch_array($query_a))
	          {
	            echo "<option value='$dataa[0]'>$dataa[1]</option>";
	          };
	        ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Lokasi</td>
			<td>
				<select name="lokasi" required oninvalid="this.setCustomValidity('Silahkan Pilih Lokasi')" oninput="setCustomValidity('')">
					<option value="<?php echo $_GET['idlok']; ?>" selected><?php echo $_GET['lokasi']; ?></option>
					<?php
	          $sql_b="select * from lokasi WHERE stts_lokasi NOT LIKE '3' AND id != $_GET[idlok]";
	          $query_b=mysqli_query($koneksi,$sql_b);
	          while($datab=mysqli_fetch_array($query_b))
	          {
	            echo "<option value='$datab[0]'>$datab[1]</option>";
	          };
	        ?>
				</select>
			</td>
		</tr>

		<tr>
			<td style="border-top:2px solid #999">Simpanan Pokok Rp.</td>
			<td style="border-top:2px solid #999">
				<input type="text" name="sp" value="<?=angka_rupiah($data['p_schm'])?>" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
			</td>
		</tr>
		<tr>
			<td>Simpanan Wajib Rp.</b></td>
			<td>
				<input type="text" name="sw" value="<?=angka_rupiah($data['w_schm'])?>" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
			</td>
		</tr>
		<tr>
			<td>Simpanan Sukarela Rp.</b></td>
			<td>
				<input type="text" name="sr" value="<?=angka_rupiah($data['s_schm'])?>" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
			</td>
		</tr>

		<tr>
			<td style="border-top:2px solid #999">Rekening</td>
			<td style="border-top:2px solid #999">
				<input type="text" name="nabank" value="<?=$data['bank_schm']?>" required oninvalid="this.setCustomValidity('Silahkan Masukan Nama Bank')" oninput="setCustomValidity('')" placeholder="Bank">
			</td>
		</tr>
		<tr>
			<td>&nbsp;</b></td>
			<td>
				<input type="number" name="norek" value="<?=$data['norek_schm']?>" required oninvalid="this.setCustomValidity('Silahkan Masukan No Rekening')" oninput="setCustomValidity('')" placeholder="No Rekening">
			</td>
		</tr>
		<tr>
			<td>&nbsp;</b></td>
			<td>
				<input type="text" name="perek" value="<?=$data['pemilik_schm']?>" required oninvalid="this.setCustomValidity('Silahkan Masukan Pemilik Rekening')" oninput="setCustomValidity('')" placeholder="Pemilik">
			</td>
		</tr>

		<tr>
			<td colspan="2">
				<input type="submit" name="simpan" value="Ubah" style="width:100%;">
			</td>
		</tr>
	</table>
</form>
