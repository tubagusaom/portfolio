<?php //*fungsi simpan
	if (isset($_POST['simpan']))
	{
		date_default_timezone_set('Asia/Jakarta');
		$nm		=$_POST['nama'];
		$comp	=$_POST['comp'];
		$date	=date("Y-m-d H:i:s");
		$sql="INSERT INTO divisi VALUES('','$nm',1,'$date','$comp')";
		$query=mysqli_query($koneksi,$sql);
		if ($query)
		{echo "<script>alert('Divisi Berhasil Ditambahkan'); location.href='?Data-Divisi&&header=DIVISI';</script>";}
		else {echo "<script>alert('Divisi Gagal Ditambahkan'); location.href='?Input-Divisi&&header=DIVISI'</script>";}
	};
?>
