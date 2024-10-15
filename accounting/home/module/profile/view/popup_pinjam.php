<script language="JavaScript" type="text/javascript">
    function checkform ( form )
    {
			if (form.jumb.value == "") {
        alert( "Silahkan Masukan Jumlah Peminjaman.!!" );
        form.jumb.focus();
        return false ;
      }
      else {
         return confirm('pastikan data sudah terisi dengan benar !');
         return false ;
      }
      return true ;
    }
</script>



<form action="?<?=isset($datapinjamthem) ? 'Proses-Ubah-Pinjaman':'Proses-Formulir-Pinjaman'?>" method="post" onsubmit="return checkform(this);" class="form_input">
	<table>
		<tr>
			<td colspan="2"><h1>Formulir Pinjaman</h1></td>
		</tr>
		<tr>
			<td>Anggota</td>
			<td>
        <select name="nama" readonly style="background:#ddd">
					<?php
            $sql_a="SELECT
              schm.id AS IDSCHM,
              schm.id_akun AS IDAKUN,
              schm.bank_schm ,
              schm.norek_schm ,
              schm.pemilik_schm ,
              pinjam.id AS IDPINJAM,
              akun.nm_akun,
              akun.kd_akun
              FROM
                `schm`
              LEFT JOIN pinjam ON schm.id = pinjam.id_schm
              LEFT JOIN pinjam_them ON schm.id = pinjam_them.id_schm
              LEFT JOIN akun ON schm.id_akun = akun.id
              WHERE
                (pinjam_them.id IS NULL AND
                pinjam.id IS NULL AND
                schm.stts_schm NOT LIKE '3' AND
                schm.stts_schm NOT LIKE '4' AND
                schm.stts_schm NOT LIKE '5' AND
                schm.id = $kodeschm AND
                schm.stts_schm NOT LIKE '6') OR
                (pinjam.ket_pinjam='3' AND
                pinjam_them.id IS NULL AND
                schm.stts_schm NOT LIKE '3' AND
                schm.stts_schm NOT LIKE '4' AND
                schm.stts_schm NOT LIKE '5' AND
                schm.id = $kodeschm AND
                schm.stts_schm NOT LIKE '6')
            ";

	          $query_a=mysqli_query($koneksi,$sql_a);
            $dataa=mysqli_fetch_array($query_a);

	          echo "<option value='$kodeschm'>$dataakun[kd_akun] - $dataakun[nm_akun] </option>";
	        ?>
				</select>
        <input type="hidden" name="kodes" value="<?=$datapinjamthem['id']?>">
			</td>
		</tr>
    <tr>
			<td style="border-top:2px solid #999">Rekening Transfer</td>
			<td style="border-top:2px solid #999">
        <input type="text" name="nabank" value="<?=isset($datapinjamthem) ? $datapinjamthem['bank_pinjam']:$dataa['bank_schm']?>" placeholder="nama bank" required oninvalid="this.setCustomValidity('Silahkan Masukan Nama Bank')" oninput="setCustomValidity('')">
			</td>
		</tr>
    <tr>
      <td></td>
      <td>
        <input type="text" name="norek" value="<?=isset($datapinjamthem) ? $datapinjamthem['norek_pinjam']:$dataa['norek_schm']?>" placeholder="No Rekening" required oninvalid="this.setCustomValidity('Silahkan Masukan No Rekening')" oninput="setCustomValidity('')">
			</td>
		</tr>
    <tr>
      <td></td>
      <td>
        <input type="text" name="napem" value="<?=isset($datapinjamthem) ? $datapinjamthem['pemilik_pinjam']:$dataa['pemilik_schm']?>" placeholder="Nama Pemilik" required oninvalid="this.setCustomValidity('Silahkan Masukan Nama Pemilik')" oninput="setCustomValidity('')">
			</td>
		</tr>
    <tr>
			<td style="border-top:2px solid #999">Jumlah Uang</td>
			<td style="border-top:2px solid #999">
				 <input type="text" name="jumb" id="inputku" value="<?=isset($datapinjamthem) ? angka_rupiah($datapinjamthem['jumlah_pinjam']):''?>" required onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
			</td>
		</tr>
		<tr>
			<td>Keperluan</td>
			<td>
				<textarea name="perlu" rows="80" cols="40" required oninvalid="this.setCustomValidity('Silahkan Isi Keperluan')" oninput="setCustomValidity('')"><?=isset($datapinjamthem) ? $datapinjamthem['keperluan_pinjam']:''?></textarea>
			</td>
		</tr>
		<tr>
			<td>Tgl Diperlukan</td>
			<td>
				<input type="date" name="tgl" value="<?=isset($datapinjamthem) ? $datapinjamthem['tgl_pinjam']:''?>" required oninvalid="this.setCustomValidity('Silahkan Masukan Tanggal')" oninput="setCustomValidity('')" placeholder="format Thn-Bln-Tgl ( Contoh:1945-08-17 )">
			</td>
		</tr>
    <tr>
			<td style="border-top:2px solid #999">Periode Pelunasan</td>
      <td style="border-top:2px solid #999">
        <select class="" name="periode" required  oninvalid="this.setCustomValidity('Silahkan pilih periode pelunasan')">
          <option value="">Pilih Jangka Waktu</option>
          <?php
            $d=1;
            while ($d<=100)
            {
            //   echo"<option value='$datapinjamthem[jangka_pinjam]' ".$datapinjamthem['jangka_pinjam'] == $d ? 'selected':''."'> $d Bulan</option>";
            //   $d=$d+1;
            // }
          ?>
          <option value="<?=$d?>" <?=$datapinjamthem['jangka_pinjam'] == $d ? 'selected':''?>><?=$d?> Bulan</option>

          <?php $d=$d+1; } ?>
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
				<input type="submit" name="simpan" value="<?=isset($datapinjamthem) ? 'Ubah Pinjaman':'Ajukan Pinjaman'?>" style="width:100%;">
			</td>
		</tr>
	</table>
</form>
