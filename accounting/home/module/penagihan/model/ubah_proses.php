<?php
	if (isset($_POST['simpan']))
	{
		date_default_timezone_set('Asia/Jakarta');
		$acuan	=$_POST['kodes'];
		$sp			=$_POST['sp'];
		$sw			=$_POST['sw'];
		$sr			=$_POST['sr'];
		$angkap	= str_replace(".", "", $sp);
		$angkaw	= str_replace(".", "", $sw);
		$angkas	= str_replace(".", "", $sr);
		$norekk	=$_POST['norek'];
	  $stts   =2;
		$date		=date("Y-m-d H:i:s");

		$sqls="UPDATE schm SET	p_schm='$angkap',w_schm='$angkaw',s_schm='$angkas',norek_schm='$norekk',stts_schm='$stts',c_schm='$date',efv_schm=CURDATE() where id='$acuan'";
		$querys=mysqli_query($koneksi,$sqls);

		if ($querys)
		{echo "<script>alert('DATA SIMPANAN BERHASIL DIUBAH'); location.href='?Data-Simpanan&&header=SIMPANAN'</script>";}
		else {echo "<script>alert('DATA SIMPANAN GAGAL DIUBAH'); location.href='?Data-Simpanan&&header=SIMPANAN'</script>";}
	};
?>
