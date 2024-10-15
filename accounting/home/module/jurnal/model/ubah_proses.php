<?php

	if (isset($_POST['simpan']))
	{
		date_default_timezone_set('Asia/Jakarta');
		$hidden			=$_POST['acuan_kode'];
		$account		=$_POST['account'];
		$jenis			=$_POST['jenis'];
		$saldo			=$_POST['saldo'];
		$angka			= str_replace(".", "", $saldo);
		$reff				=$_POST['reff'];
		$ket				=$_POST['ket'];
		$efv				=$_POST['date'];
		$session		=$_POST['idakun'];
		$date				=date("Y-m-d H:i:s");

		$sql="UPDATE trans_them SET id_akun='$session',kd_acount='$account',jenis_trans='$jenis',saldo_trans='$angka',reff_trans='$reff',ket_trans='$ket',efv_trans='$efv',stts_trans=2,c_trans='$date' where id='$hidden'";
		$query=mysqli_query($koneksi,$sql);
		if ($query)
		{echo "<script>alert('JURNAL SEMENTARA BERHASIL DIUBAH'); location.href='?Input-Jurnal&&header=Jurnal'</script>";}
		else {echo "<script>alert('JURNAL SEMENTARA GAGAL DIUBAH'); location.href='?Input-Jurnal&&header=Jurnal'</script>";}
	};
?>
