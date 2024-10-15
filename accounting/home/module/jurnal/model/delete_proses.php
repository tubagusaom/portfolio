<?php
	$hidden	=$_GET['id'];
	$sql_hapus="DELETE FROM trans where id='$hidden'";
	$query_h=mysqli_query($koneksi,$sql_hapus);

	if ($query_h){
	echo "<script>alert('JURNAL BERHASIL DIHAPUS'); location.href='?Data-Jurnal&&header=Jurnal'</script>";}
	else {echo "<script>alert('JURNAL GAGAL DIHAPUS'); location.href='?Data-Jurnal&&header=Jurnal'</script>";}
?>
