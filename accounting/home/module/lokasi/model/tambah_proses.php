<?php //*fungsi simpan
	if (isset($_POST['simpan']))
	{
		date_default_timezone_set('Asia/Jakarta');
		$nm		=$_POST['nama'];
		$date	=date("Y-m-d H:i:s");
		$sql="INSERT INTO lokasi (`id`, `nm_lokasi`, `stts_lokasi`, `c_lokasi`) VALUES ('','$nm',1,'$date')";
		$query=mysqli_query($koneksi,$sql);
		if ($query)
		{echo "<script>alert('Lokasi Berhasil Ditambahkan'); location.href='?Data-Lokasi&&header=LOKASI';</script>";}
		else {echo "<script>alert('Lokasi Gagal Ditambahkan'); location.href='?Input-Lokasi&&header=LOKASI'</script>";}
	};
?>
