<?php
	$hidden	=$_GET['id'];
	$sql_hapus="DELETE FROM trans_them where id='$hidden'";
	$query_h=mysqli_query($koneksi,$sql_hapus);

	if ($query_h){
	echo "<script>alert('JURNAL SEMENTARA BERHASIL DIHAPUS'); location.href='?Input-Jurnal&&header=Jurnal'</script>";}
	else {echo "<script>alert('JURNAL SEMENTARA GAGAL DIHAPUS'); location.href='?Input-Jurnal&&header=Jurnal'</script>";}
?>
