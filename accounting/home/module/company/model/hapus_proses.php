<?php
	date_default_timezone_set('Asia/Jakarta');
	$hidden	=$_GET['id'];
	$date		=date("Y-m-d H:i:s");
	$sql		="UPDATE company SET stts_comp=3,c_comp='$date' where id='$hidden'";
	$query	=mysqli_query($koneksi,$sql);
	if ($query)
	{echo "<script>alert('DATA BERHASIL DIHAPUS'); location.href='?Data-Company&&header=Company'</script>";}
	else
	{echo "<script>alert('DATA GAGAL DIHAPUS'); location.href='?Data-Company&&header=Company'</script>";}
?>
