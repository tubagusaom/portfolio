<?php
	if (isset($_POST['simpan']))
	{
		date_default_timezone_set('Asia/Jakarta');
		$hidden	=$_POST['acuan_kode'];
		$nm			=$_POST['nama'];
		$jns		=$_POST['jenis'];
		$date		=date("Y-m-d H:i:s");
		$sql="UPDATE reff SET jumlah_reff='$nm',stts_reff=2 where id='$hidden'";
		$query=mysqli_query($koneksi,$sql);
		if ($query)
		{echo "<script>alert('Ketentuan konfigurasi $jns berhasil diubah'); location.href='?Refferensi&&header=Konfigurasi'</script>";}
		else {echo "<script>alert('Ketentuan konfigurasi $jns gagal diubah'); location.href='?Refferensi&&header=Konfigurasi'</script>";}
	};
?>
