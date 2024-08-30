<?php
	date_default_timezone_set('Asia/Jakarta');
	$hidden	=$_GET['id'];
	$date		=date("Y-m-d H:i:s");
	$sql		="UPDATE akun SET stts_akun=3,c_akun='$date' where id='$hidden';"; //<<<<<<
	$sql		.="UPDATE schm SET stts_schm=3,c_schm='$date' where id_akun='$hidden';"; //<<<<<<
	$sql		.="UPDATE user SET stts_user=3,c_user='$date' where id_akun='$hidden'"; //<<<<<<

	$query =mysqli_multi_query($koneksi,$sql);

	if ($query)
	{echo "<script>alert('DATA BERHASIL DIHAPUS'); location.href='?Data-Anggota&&header=ANGGOTA'</script>";}
	else
	{echo "<script>alert('DATA GAGAL DIHAPUS'); location.href='?Data-Anggota&&header=ANGGOTA'</script>";}
?>
