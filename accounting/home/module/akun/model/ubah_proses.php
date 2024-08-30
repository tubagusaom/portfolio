<?php

	if (isset($_POST['simpan']))
	{
		date_default_timezone_set('Asia/Jakarta');
		$kda		=$_POST['kodea'];
		$agt		=$_POST['kodeanggota'];
		$nm			=$_POST['nama'];
		$almt		=$_POST['almt'];
		$tlp		=$_POST['tlp'];
		$divisi	=$_POST['divisi'];
		$kd_comp=$_POST['comp'];

	  $stts   =2;
		$date		=date("Y-m-d H:i:s");

		$tgl_perusahaan	=$_POST['tgl_perusahaan'];
		$tgl_koperasi	=$_POST['tgl_koperasi'];

		$dept		=$_POST['dept'];
		$lokasi	=$_POST['lokasi'];
		$kds		=$_POST['kodes'];

		$sp		    = normal_rupiah($_POST['sp']);
		$sw		    = normal_rupiah($_POST['sw']);
		$sr		    = normal_rupiah($_POST['sr']);
		$nabank		= $_POST['nabank'];
		$norek		= $_POST['norek'];
		$perek		= $_POST['perek'];


		$sql	  =
		"SELECT
			a.*
		FROM divisi a
		WHERE a.id = $divisi ";
		$query	=mysqli_query($koneksi,$sql);
		$data=mysqli_fetch_array($query);

		$sqlcomp	  =
		"SELECT
			a.*
		FROM company a
		WHERE a.id = $kd_comp ";
		$querycomp	=mysqli_query($koneksi,$sqlcomp);
		$datacomp=mysqli_fetch_array($querycomp);

		$sqldept	  =
		"SELECT
			a.*
		FROM dept a
		WHERE a.id = $dept ";
		$querydept	=mysqli_query($koneksi,$sqldept);
		$datadept=mysqli_fetch_array($querydept);

		$sqllok	  =
		"SELECT
			a.*
		FROM lokasi a
		WHERE a.id = $lokasi ";
		$querylok	=mysqli_query($koneksi,$sqllok);
		$datalok=mysqli_fetch_array($querylok);


    $url_get    = $_POST['url_get'];

		$url_array  = explode('&&', $url_get);
    $a_url = "$url_array[4]&&$url_array[5]&&$url_array[6]&&$url_array[7]&&$url_array[8]&&$url_array[9]&&$url_array[10]&&$url_array[11]";
    $b_url = "iddept=$dept&&iddivisi=$divisi&&divisi=$data[1]&&idcomp=$kd_comp&&comp=$datacomp[1]&&dept=$datadept[1]&&idlok=$lokasi&&lokasi=$datalok[1]";

    $r_url = str_replace($a_url, $b_url, $url_get);

    // echo $url_get;
    // echo "<br><br>";
    // echo $datacomp[1];
    // echo "<br><br>";
    // echo $r_url;

		// echo $sr;

		$sqla="UPDATE akun SET kd_akun='$agt',nm_akun='$nm',almt_akun='$almt',tlp_akun='$tlp',stts_akun='$stts',c_akun='$date',kd_comp='$kd_comp',kd_divisi='$divisi',tgl_koperasi='$tgl_koperasi',tgl_perusahaan='$tgl_perusahaan' where id='$kda'";
		$querya=mysqli_query($koneksi,$sqla);

		$sqls="UPDATE schm SET p_schm='$sp',w_schm='$sw',s_schm='$sr',bank_schm='$nabank',norek_schm='$norek',pemilik_schm='$perek',id_dept='$dept',id_lokasi='$lokasi' where id='$kds'";
		$querys=mysqli_query($koneksi,$sqls);

		if ($querya AND $querys)
		{echo "<script>alert('DATA ANGGOTA BERHASIL DIUBAH'); location.href='?$r_url'</script>";}
		else {echo "<script>alert('DATA ANGGOTA GAGAL DIUBAH'); location.href='?$r_url'</script>";}
	};
?>
