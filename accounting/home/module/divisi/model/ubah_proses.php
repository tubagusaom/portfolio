<?php

	if (isset($_POST['simpan']))
	{
		date_default_timezone_set('Asia/Jakarta');
		$hidden	=$_POST['acuan_kode'];
		$nm			=$_POST['nama'];
		$comp		=$_POST['comp'];
		$date		=date("Y-m-d H:i:s");

		$sql="UPDATE divisi SET nm_divisi='$nm',kd_comp='$comp',stts_divisi=1,c_divisi='$date' where id='$hidden'";
		$query=mysqli_query($koneksi,$sql);
		if ($query)
		{echo "<script>alert('DATA DIVISI BERHASIL DIUBAH'); location.href='?Data-Divisi&&header=DIVISI'</script>";}
		else {echo "<script>alert('DATA DIVISI GAGAL DIUBAH'); location.href='?Edit-Divisi&&header=DIVISI'</script>";}
	};
?>
