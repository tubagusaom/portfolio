<?php
	if(isset($_GET['Hapus-Account-Master'])){
		date_default_timezone_set('Asia/Jakarta');
		$hidden	=$_GET['id'];
		$type		=$_GET['type'];
		$date		=date("Y-m-d H:i:s");
		$sql		="UPDATE acount SET stts_acount=3,c_acount='$date' where id='$hidden';";
		$sql		.="UPDATE acount SET stts_acount=3,c_acount='$date' where type_acount='$type'";
		$query	=mysqli_multi_query($koneksi,$sql);
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Hapus-Account-Sub'])){
		date_default_timezone_set('Asia/Jakarta');
		$hidden	=$_GET['id'];
		$date		=date("Y-m-d H:i:s");
		$sql		="UPDATE acount SET stts_acount=3,c_acount='$date' where id='$hidden'";
		$query	=mysqli_query($koneksi,$sql);
	}
	if ($query)
	{echo "<script>alert('DATA BERHASIL DIHAPUS'); location.href='?Data-Account&&header=Account'</script>";}
	else
	{echo "<script>alert('DATA GAGAL DIHAPUS'); location.href='?Data-Account&&header=Account'</script>";}
?>
