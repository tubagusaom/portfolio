<?php //*fungsi simpan
	if (isset($_POST['simpan']))
	{
		date_default_timezone_set('Asia/Jakarta');
		$nm		=$_POST['nama'];
		$date	=date("Y-m-d H:i:s");
		$sql="INSERT INTO dept VALUES('','$nm',1,'$date')";
		$query=mysqli_query($koneksi,$sql);
		if ($query)
		{echo "<script>alert('Department Berhasil Ditambahkan'); location.href='?Data-Department&&header=DEPARTMENT';</script>";}
		else {echo "<script>alert('Department Gagal Ditambahkan'); location.href='?Input-Department&&header=DEPARTMENT'</script>";}
	};
?>
