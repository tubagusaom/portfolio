<?php //*fungsi simpan
	if (isset($_POST['simpan']))
	{
		date_default_timezone_set('Asia/Jakarta');
		$nama		=$_POST['nama'];
		$jumb		=$_POST['jumb'];
		$angkap	= str_replace(".", "", $jumb);
		$perlu	=$_POST['perlu'];
		$tgl		=$_POST['tgl'];
		$nabank	=$_POST['nabank'];
		$norek	=$_POST['norek'];
		$napem	=$_POST['napem'];
		$periode  =$_POST['periode'];
		$ketentuan=$_POST['jasa'];
		$jasa=($ketentuan*$periode)/12;
		$date		=date("Y-m-d H:i:s");

		$sqla="INSERT INTO pinjam_them (`id`, `jumlah_pinjam`, `keperluan_pinjam`, `tgl_pinjam`, `bank_pinjam`, `norek_pinjam`, `pemilik_pinjam`, `jangka_pinjam`, `jasa_pinjam`,`ket_pinjam`, `c_pinjam`, `id_schm`) VALUES('','$angkap','$perlu','$tgl','$nabank',$norek,'$napem','$periode','$jasa',1,'$date','$nama')";
		$querya=mysqli_query($koneksi,$sqla);

		if ($querya) {
			echo "<script>alert('Pinjaman Berhasil Ditambahkan tunggu aprove, !'); location.href='?Data-Peminjaman&&header=Pinjaman';</script>";
		}else {
			echo "<script>alert('Pinjaman Gagal Ditambahkan'); location.href='?Pinjaman-Anggota&&header=PINJAMAN'</script>";
		}
	};
?>
