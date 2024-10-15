<?php
	if (isset($_POST['simpan']))
	{
		date_default_timezone_set('Asia/Jakarta');
		$acuan	=$_POST['kodes'];
		$jumlah	=$_POST['sp'];
		$angkap	= str_replace(".", "", $jumlah);
		$tgl		=$_POST['sr'];
		$nbank	=$_POST['nabank'];
		$norek	=$_POST['norek'];
		$napem	=$_POST['napem'];
		$jangka	=$_POST['periode'];
		$ketentuan=$_POST['jasa'];
		$jasa=($ketentuan*$jangka)/12;
		$date		=date("Y-m-d H:i:s");

		$sqls="UPDATE pinjam_them SET jumlah_pinjam='$angkap',tgl_pinjam='$tgl',bank_pinjam='$nbank',norek_pinjam='$norek',pemilik_pinjam='$napem',jangka_pinjam='$jangka',jasa_pinjam='$jasa',c_pinjam='$date' where id='$acuan'";
		$querys=mysqli_query($koneksi,$sqls);

		if ($querys)
		{echo "<script>alert('DATA PINJAMAN BERHASIL DIUBAH'); location.href='?Data-Peminjaman&&header=Pinjaman'</script>";}
		else {echo "<script>alert('DATA PINJAMAN GAGAL DIUBAH'); location.href='?Data-Peminjaman&&header=Pinjaman'</script>";}
	};
?>
