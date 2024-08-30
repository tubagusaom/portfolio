<?php
	date_default_timezone_set('Asia/Jakarta');
	$hidden	=$_GET['id'];
	$date		=date("Y-m-d H:i:s");
	$sql="UPDATE lokasi SET stts_lokasi=3,c_lokasi='$date' where id='$hidden'";
	$query=mysqli_query($koneksi,$sql);
	if ($query)
	{echo "<script>alert('DATA LOKASI BERHASIL DIHAPUS'); location.href='?Data-Lokasi&&header=LOKASI'</script>";}
	else {echo "<script>alert('DATA LOKASI GAGAL DIHAPUS'); location.href='?Data-Lokasi&&header=LOKASI'</script>";}
?>
