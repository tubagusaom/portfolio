<?php

	if (isset($_POST['simpan']))
	{
		date_default_timezone_set('Asia/Jakarta');
		$hidden	=$_POST['acuan_kode'];
		$nm			=$_POST['nama'];
		$date		=date("Y-m-d H:i:s");
		$sql="UPDATE lokasi SET nm_lokasi='$nm',stts_lokasi=1 where id='$hidden'";
		$query=mysqli_query($koneksi,$sql);
		if ($query)
		{echo "<script>alert('DATA LOKASI BERHASIL DIUBAH'); location.href='?Data-Lokasi&&header=LOKASI'</script>";}
		else {echo "<script>alert('DATA LOKASI GAGAL DIUBAH'); location.href='?Edit-Lokasi&&header=LOKASI'</script>";}
	};
?>
