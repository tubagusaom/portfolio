<?php //*fungsi simpan
	if (isset($_POST['simpan']))
	{
		if (isset($_GET['Proses-Tambah-Account-Master'])) {
			date_default_timezone_set('Asia/Jakarta');
			$kd		=$_POST['kode'];
			$nm		=$_POST['nama'];
			$jn		=$_POST['jenis'];
			$tp		="M";
			$date	=date("Y-m-d H:i:s");
			$sql="INSERT INTO acount (`id`, `kd_acount`, `desc_acount`, `jenis_acount`, `type_acount`, `stts_acount`, `c_acount`)VALUES('','$kd','$nm','$jn','$tp',1,'$date')";
			$query=mysqli_query($koneksi,$sql);
			if ($query)
			{echo "<script>alert('Master Account Berhasil Ditambahkan'); location.href='?Data-Account&&header=Account';</script>";}
			else {echo "<script>alert('Master Account Gagal Ditambahkan'); location.href='?Input-Account_master&&header=Account'</script>";}
		}elseif (isset($_GET['Proses-Tambah-Account-sub'])) {
			date_default_timezone_set('Asia/Jakarta');
			$exp	=explode("-",$_POST['type']);
			$kd		=$_POST['kode'];
			$nm		=$_POST['nama'];
			$jn		=$exp[1];
			$tp		=$exp[0];
			$date	=date("Y-m-d H:i:s");
			$sql="INSERT INTO acount (`id`, `kd_acount`, `desc_acount`, `jenis_acount`, `type_acount`, `stts_acount`, `c_acount`)VALUES('','$kd','$nm','$jn','$tp',1,'$date')";
			$query=mysqli_query($koneksi,$sql);
			if ($query)
			{echo "<script>alert('Master Account Berhasil Ditambahkan'); location.href='?Data-Account&&header=Account';</script>";}
			else {echo "<script>alert('Master Account Gagal Ditambahkan'); location.href='?Input-Account_master&&header=Account'</script>";}
		}
	};
?>
