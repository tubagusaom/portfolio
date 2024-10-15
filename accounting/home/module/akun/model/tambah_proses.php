<?php //*fungsi simpan
	if (isset($_POST['simpan']))
	{
		date_default_timezone_set('Asia/Jakarta');
		$id			=$_POST['acuan'];
		$kda		=$_POST['kodeanggota'];
		$nm			=$_POST['nama'];
		$almt		=$_POST['almt'];
		$tlp		=$_POST['tlp'];
		$divisi	=$_POST['divisi'];
		$comp		=$_POST['comp'];
		$dept		=$_POST['dept'];
		$lokasi	=$_POST['lokasi'];
		$sp			=$_POST['sp'];
		$angkap	= str_replace(".", "", $sp);
		$sw			=$_POST['sw'];
		$angkaw	= str_replace(".", "", $sw);
		$sr			=$_POST['sr'];
		$angkas	= str_replace(".", "", $sr);
		$nabank	=$_POST['nabank'];
		$norek	=$_POST['norek'];
		$perek	=$_POST['perek'];
		$date		=date("Y-m-d H:i:s");
		$tgl_perusahaan	=$_POST['tgl_perusahaan'];
		$tgl_koperasi	=$_POST['tgl_koperasi'];

		$sqla="INSERT INTO akun (`Id`, `kd_akun`, `nm_akun`, `almt_akun`, `tlp_akun`, `stts_akun`, `c_akun`, `kd_comp`, `kd_divisi`, `tgl_perusahaan`, `tgl_koperasi`) VALUES('$id','$kda','$nm','$almt','$tlp',1,'$date','$comp','$divisi','$tgl_perusahaan','$tgl_koperasi')";
		$querya=mysqli_query($koneksi,$sqla);

		if ($querya) {

			$sqlb="INSERT INTO schm (`Id`, `p_schm`, `w_schm`, `s_schm`, `norek_schm`, `efv_schm`, `stts_schm`, `c_schm`, `Id_akun`, `Id_dept`, `Id_lokasi`,`ket_schm`,`bank_schm`,`pemilik_schm`) VALUES('','$angkap','$angkaw','$angkas',$norek,CURDATE(),1,'$date','$id','$dept','$lokasi','1','$nabank','$perek')";
			$queryb=mysqli_query($koneksi,$sqlb);

			echo "<script>alert('Anggota Berhasil Ditambahkan'); location.href='?Data-Anggota&&header=Anggota';</script>";

		}else {
			echo "<script>alert('Anggota Gagal Ditambahkan'); location.href='?Pendaftaran-Anggota&&header=Anggota'</script>";
		}

		if ($querya AND $queryb AND $queryc)
		{echo "<script>alert('Anggota Berhasil Ditambahkan'); location.href='?Data-Anggota&&header=Anggota';</script>";}
		else {echo "<script>alert('Anggota Gagal Ditambahkan'); location.href='?Pendaftaran-Anggota&&header=Anggota'</script>";}
	};
?>
