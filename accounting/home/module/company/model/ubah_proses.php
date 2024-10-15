<?php

	if (isset($_POST['simpan']))
	{
		date_default_timezone_set('Asia/Jakarta');
		$hidden	=$_POST['acuan_kode'];
		$nm			=$_POST['nm_comp'];
		$almt		=$_POST['alamat_comp'];
		$date		=date("Y-m-d H:i:s");
		$sql="UPDATE company SET nm_comp='$nm',alamat_comp='$almt',stts_comp=1,c_comp='$date' where id='$hidden'";
		$query=mysqli_query($koneksi,$sql);
		if ($query)
		{echo "<script>alert('DATA COMPANY BERHASIL DIUBAH'); location.href='?Data-Company&&header=Company'</script>";}
		else {echo "<script>alert('DATA COMPANY GAGAL DIUBAH'); location.href='?Edit-Company&&header=Company'</script>";}
	};
?>
