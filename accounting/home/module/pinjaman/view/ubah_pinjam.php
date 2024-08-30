<script language="JavaScript" type="text/javascript">
    function checkform ( form )
    {
			if (form.sp.value == "") {
        alert( "Silahkan Masukan Jumlah Peminjaman.!!" );
        form.sp.focus();
        return false ;
      }
      return true ;
    }
</script>

<form  action="?Proses-Edit-Pinjaman" method="post" onsubmit="return checkform(this);" class="form_input">
	<table>
		<tr>
			<td colspan="2"><h1>Ubah Data Pinjaman</h1></td>
		</tr>
		<tr>
			<td>Anggota</td>
			<td>
				<input type="hidden" name="kodes" value="<?php echo $_GET['idp']; ?>">
				<input type="text" name="nama" value="<?php echo $_GET['kda']; echo ' - '; echo $_GET['nm']; ?>" readonly style="background-color:whitesmoke">
			</td>
		</tr>
		<tr>
			<td style="border-top:2px solid #999">Jumlah Uang</td>
			<td style="border-top:2px solid #999">
				 <input type="text" name="sp" value="<?php echo number_format($_GET['sp'],0,',','.'); ?>" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
			</td>
		</tr>
		<tr>
			<td>Tanggal Diperlukan</td>
			<td>
				 <input type="date" name="sr" value="<?php echo $_GET['sr']; ?>" required oninvalid="this.setCustomValidity('Silahkan Masukan Tanggal')" oninput="setCustomValidity('')" placeholder="format Thn-Bln-Tgl ( Contoh:1945-08-17 )">
			</td>
		</tr>
		<tr>
			<td style="border-top:2px solid #999">No Rekening</td>
			<td style="border-top:2px solid #999">
				<input type="text" name="nabank" value="<?php echo $_GET['bank']; ?>" placeholder="nama bank" required oninvalid="this.setCustomValidity('Silahkan Masukan No Rekening')" oninput="setCustomValidity('')">
			</td>
		</tr>
		<tr>
      <td></td>
      <td>
        <input type="text" name="norek" value="<?php echo $_GET['norek']; ?>" placeholder="No Rekening" required oninvalid="this.setCustomValidity('Silahkan Masukan No Rekening')" oninput="setCustomValidity('')">
			</td>
		</tr>
    <tr>
      <td></td>
      <td>
        <input type="text" name="napem" value="<?php echo $_GET['an']; ?>" placeholder="Nama Pemilik" required oninvalid="this.setCustomValidity('Silahkan Masukan Nama Pemilik')" oninput="setCustomValidity('')">
			</td>
		</tr>
		<tr>
			<td style="border-top:2px solid #999">Periode Pelunasan</td>
      <td style="border-top:2px solid #999">
        <select class="" name="periode">
          <option value="<?php echo $_GET['jangka'] ?>"><?php echo $_GET['jangka'] ?></option>
          <?php
            $d=1;
            while ($d<=100)
            {
              echo"<option value='$d'> $d Bulan</option>";
              $d=$d+1;
            }
          ?>
        </select>

        <?php
          $sqla	  ="SELECT * FROM reff WHERE jenis_reff='jasa' AND stts_reff NOT LIKE '3'";
          $querya	=mysqli_query($koneksi,$sqla);
          $dataa	=mysqli_fetch_array($querya);
        ?>

        <input type="hidden" name="jasa" value="<?php echo $dataa[2] ?>">
      </td>
		</tr>
		<tr>
			<td colspan="2" style="border-top:2px solid #999">
				<input type="submit" name="simpan" value="Simpan">
			</td>
		</tr>
	</table>
</form>
