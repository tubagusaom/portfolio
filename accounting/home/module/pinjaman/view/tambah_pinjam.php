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

<form action="?Proses-Tambah-Pinjaman" method="post" onsubmit="return checkform(this);" class="form_input">
	<table>
		<tr>
			<td colspan="2"><h1>Formulir Pinjaman</h1></td>
		</tr>
		<tr>
			<td>Anggota</td>
			<td>
        <select name="nama" required oninvalid="this.setCustomValidity('Silahkan Pilih Anggota')" oninput="setCustomValidity('')" onchange="filtanggota()" id="idschm">
					<option value="" selected>-</option>
					<?php

            if ($akses == "admin") {
              $wheredivisi = "AND kd_divisi IN ('1','2')";
            //   $wherejoindivisi = "AND `schm`.`id_divisi` IN ('1','2')";
              $wherejoindivisi = "AND `akun`.`kd_divisi` IN ('1','2')";
            }elseif($akses == "sekertaris"){
              $wheredivisi = "AND kd_divisi IN ('3','4')";
            //   $wherejoindivisi = "AND `schm`.`id_divisi` IN ('3','4')";
              $wherejoindivisi = "AND `akun`.`kd_divisi` IN ('3','4')";
            }else {
              $wheredivisi     = "";
              $wherejoindivisi = "";
            }

            $sql_a="SELECT
              schm.id AS IDSCHM,
              schm.id_akun AS IDAKUN,
              pinjam.id AS IDPINJAM
              FROM
                `schm`
              LEFT JOIN pinjam ON schm.id = pinjam.id_schm
              LEFT JOIN pinjam_them ON schm.id = pinjam_them.id_schm
              JOIN akun ON schm.id_akun = akun.id
              WHERE
                (pinjam_them.id IS NULL AND
                pinjam.id IS NULL AND
                schm.stts_schm NOT LIKE '3' AND
                schm.stts_schm NOT LIKE '4' AND
                schm.stts_schm NOT LIKE '5' $wherejoindivisi AND
                schm.stts_schm NOT LIKE '6') OR
                (pinjam.ket_pinjam='3' AND
                pinjam_them.id IS NULL AND
                schm.stts_schm NOT LIKE '3' AND
                schm.stts_schm NOT LIKE '4' AND
                schm.stts_schm NOT LIKE '5' $wherejoindivisi AND
                schm.stts_schm NOT LIKE '6')
            ";

	          $query_a=mysqli_query($koneksi,$sql_a);
	          while($dataa=mysqli_fetch_array($query_a))
	          {
              $sql_s="SELECT * from akun WHERE id='".$dataa[IDAKUN]."'";
              $query_s=mysqli_query($koneksi,$sql_s);
              $datas=mysqli_fetch_array($query_s);

	            echo "<option value='$dataa[IDSCHM]'>$datas[1] - $datas[2] </option>";
	          };
	        ?>
				</select>

			</td>
		</tr>
    <tr>
			<td width="30%" style="border-top:2px solid #999;">Jumlah Uang</td>
			<td width="70%" style="border-top:2px solid #999">
				 <input type="text" name="jumb" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
			</td>
		</tr>
		<tr>
			<td>Keperluan</td>
			<td>
				<textarea name="perlu" rows="80" cols="40" required oninvalid="this.setCustomValidity('Silahkan Masukan Keperluan')" oninput="setCustomValidity('')"></textarea>
			</td>
		</tr>
		<tr>
			<td>Tgl Diperlukan</td>
			<td>
				<input type="date" name="tgl" value="" required oninvalid="this.setCustomValidity('Silahkan Masukan Tanggal')" oninput="setCustomValidity('')" placeholder="format Thn-Bln-Tgl ( Contoh:1945-08-17 )">
			</td>
		</tr>

    <tr>
      <td style="border-top:2px solid #999">Rekening Transfer</td>
      <td style="border-top:2px solid #999">
        <div id="detailrek">
          <!-- Rekening Transfer -->

        </div>
      </td>
    </tr>



    <!-- <tr>
			<td style="border-top:2px solid #999">Rekening Transfer</td>
			<td style="border-top:2px solid #999">
        <input type="text" name="nabank" id="nabank" value="" placeholder="nama bank" required oninvalid="this.setCustomValidity('Silahkan Masukan Nama Bank')" oninput="setCustomValidity('')">
			</td>
		</tr>
    <tr>
      <td></td>
      <td>
        <input type="text" name="norek" id="norek" value="<?=isset($data)?$data['norek_schm']:''?>" placeholder="No Rekening" required oninvalid="this.setCustomValidity('Silahkan Masukan No Rekening')" oninput="setCustomValidity('')">
			</td>
		</tr>
    <tr>
      <td></td>
      <td>
        <input type="text" name="napem" id="napem" value="" placeholder="Nama Pemilik" required oninvalid="this.setCustomValidity('Silahkan Masukan Nama Pemilik')" oninput="setCustomValidity('')">
			</td>
		</tr> -->



    <tr>
			<td style="border-top:2px solid #999">Periode Pelunasan</td>
      <td style="border-top:2px solid #999">
        <select class="" name="periode">
          <option value="">Pilih Periode</option>
          <?php
            // $d=1;
            // while ($d<=100)
            // {
            //   echo"<option value='$d'> $d Bulan</option>";
            //   $d=$d+1;
            // }
          ?>

          <option value="6">6 Bulan</option>
          <option value="12">12 Bulan</option>
          <option value="18">18 Bulan</option>
          <option value="24">24 Bulan</option>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
  function filtanggota(){
      var schmid = $("#idschm").val();

      if (schmid != '') {

        $.ajax({
          type 	: 'POST',
          url		: 'module/pinjaman/model/sql.php',
          data	:"idper="+schmid ,
        }).success(function (data) {

          obj = document.getElementById("detailrek").innerHTML=data;
          // alert(obj);

        });
      }
      else if (schmid == '') {
        document.getElementById("detailrek").innerHTML = "";
        return;
      }
  }
</script>
