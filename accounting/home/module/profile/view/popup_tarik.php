

<?php
// if (isset($_POST['tarik'])) {
  $sqly	  ="SELECT * FROM reff WHERE jenis_reff='penarikan'";
  $queryy	=mysqli_query($koneksi,$sqly);
  $datay	=mysqli_fetch_array($queryy);
?>

<form class="" action="?Penarikan-simpanan" onSubmit="return validasi_tarik(this)"  method="post">
<table>

	<tr>
		<td colspan="5"> <br>
      <h1 style="color:#0276b3;font-size: 19px;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
        <!-- Penarikan Simpanan Sukarela -->
        <?=$dataakun['nm_akun']?>
      </h1>
    </td>
	</tr>

	<?php
		$sqltpd1	  ="SELECT * FROM trans_ambil WHERE id_schm='$kodeschm' AND stts_ambil NOT LIKE '2' ORDER BY id DESC";
		$querytpd1	=mysqli_query($koneksi,$sqltpd1);
		$datatpd1		=mysqli_fetch_array($querytpd1);

		if (isset($datatpd1)) {
	?>

	<tr>
		<td colspan="5" align="center" style="color:red; font-size:14px;">
      <b>PENARIKAN SEBELUMNYA SEDANG DIPROSES , Tunggu Aprove !</b>
    </td>
	</tr>

	<?php
		}else {
	?>

  <tr>
    <td style="font-size: 13px;padding-left:20px;">
      <b> Simpanan sukarela ditahan (<?php echo "$datay[2]"; ?> Bln)</b>
    </td>
  </tr>
  <tr>
    <td style="font-size: 13px;padding-left:20px;">Rp.
      <?php
				$tahan=0;
				$sqlx	  ="SELECT s_simpan FROM trans_simpan WHERE id_schm='$kodeschm' ORDER BY id DESC LIMIT $datay[2]";
				$queryx	=mysqli_query($koneksi,$sqlx);
				while($datax	=mysqli_fetch_array($queryx)){
					$tahan +=$datax[0];
				}

				$ssrdt=number_format($tahan,0,',','.');
				echo "$ssrdt";
			?>
    </td>
  </tr>

  <tr>
    <td style="font-size: 13px;padding-left:20px;border-top:1px solid #999;">
      <b>Sisa simpanan sukarela yang dapat diambil</b>
    </td>
    </td>
  </tr>
  <tr>
    <td style="font-size: 13px;padding-left:20px;">Rp.
      <?php
				$tssp=($datav[3]-$dataw[0])-$tahan;
				$sssrrr=number_format($tssp,0,',','.');
				echo $sssrrr;
			?>
      <input type="hidden" id="SssRrr" value="<?=$sssrrr?>">
			<input type="hidden" name="ssr" value="<?php echo "$tssp" ?>" id="pw1">
			<input type="hidden" name="kode" value="<?php echo "$kodeschm" ?>">
			<input type="hidden" name="kodea" value="<?php echo "$dataakun[kd_akun]" ?>">
			<input type="hidden" name="namaa" value="<?php echo "$dataakun[nm_akun]" ?>">
    </td>
  </tr>

  <tr>
    <td style="font-size: 13px;padding-left:20px;border-top:1px solid #999;">
      <b>Jumlah Penarikan</b>
    </td>
  </tr>
  <tr>
    <td>
      <input type="text" name="jumpen" value="" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
    </td>
  </tr>

  <tr>
    <td style="font-size: 13px;padding-left:20px;border-top:1px solid #999;">
      <b>Tanggal Penarikan</b>
    </td>
  </tr>
  <tr>
    <td>
      <input type="date" name="tglp" value="" placeholder="Exp: Thn-Bln-Tgl (1945-08-17)">
    </td>
  </tr>

	<tr>
		<td style="border-top:2px solid #999;padding-left:20px;">
			<input type="submit" name="prosss" value="Ajukan Penarikan" style="width:100%;">
		</td>
	</tr>

	<?php } ?>

</table>
</form>

<script type="text/javascript">
	function validasi_tarik( form ){

    var sssrrr = document.getElementById("SssRrr").value;
    var jumlahPenarikan = document.getElementById("inputku").value;
    var someElement = document.getElementById("inputku").value;
    var someElementToString = someElement.toString();

		if (form.jumpen.value == "") {
			alert( "Silahkan Masukan Jumlah Penarikan.!!" );
			form.jumpen.focus();
			return false ;
		}else{

      var sisa  = sssrrr.replaceAll('.', "");
      var tarik = jumlahPenarikan.replaceAll('.', "");

      if (parseInt(tarik) > parseInt(sisa)) {
        alert( "Saldo tidak cukup !!!" );
        form.jumpen.focus();
        return false ;
      }
    }

    if (form.tglp.value == "") {
			alert( "Tentukan Tanggal Penarikan.!!" );
			form.tglp.focus();
			return false ;
		}


    // if (jumlahPenarikan > sssrrr) {
    //   alert( sssrrr );
    //   return false ;
    // }

    // alert( tarik );
    // return false ;
  }
</script>
