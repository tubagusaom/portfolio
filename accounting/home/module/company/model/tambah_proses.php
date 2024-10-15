<?php //*fungsi simpan
	if (isset($_POST['simpan']))
	{
		date_default_timezone_set('Asia/Jakarta');
		$nm		=$_POST['nm_comp'];
		$almt	=$_POST['alamat_comp'];
		$date	=date("Y-m-d H:i:s");
		$sql="INSERT INTO company VALUES('','$nm',1,'$date','$almt')";
		$query=mysqli_query($koneksi,$sql);
		if ($query)
		{echo "<script>alert('Company Berhasil Ditambahkan'); location.href='?Data-Company&&header=Company';</script>";}
		else {echo "<script>alert('Company Gagal Ditambahkan'); location.href='?Input-Company&&header=Company'</script>";}
	};
?>
