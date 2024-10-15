<?php

	if (isset($_POST['simpan']))
	{
		date_default_timezone_set('Asia/Jakarta');
		$hidden	= $_POST['acuan'];
		$akun		= $_POST['akun'];
		$usr		= $_POST['user'];
		$pw			= $_POST['pws'];
		$aks		= $_POST['akses'];
		$date		= date("Y-m-d H:i:s");

		$pwmd5 	= md5($pw);

		$aksesr = array(
			'4' => 'ketua',
			'5' => 'admin',
			'16' => 'sekertaris',
			'17' => 'akunting',
			'18' => 'analis',
			'20' => 'kredit',
			'21' => 'pengawas',
			'66' => 'anggota'
		);
		$aksesusr = $aksesr[$aks];

		// echo $aks;
		if ($aks == 66) {
			$url_data = "Data-User-Anggota";
		}else {
			$url_data = "Data-User";
		}

		$sql="UPDATE user SET kd_user='$usr',pw_asli='$pw',pw_user='$pwmd5',akses_user='$aksesusr',stts_user=2,c_user='$date',id_akun='$akun' where id='$hidden'";
		$query=mysqli_query($koneksi,$sql);

		// echo mysqli_error($koneksi);

		if ($query){
			$sqlr="UPDATE t_user_role SET kd_role='$aks', c_ur='$date',stts_ur=2 where kd_user='$hidden'";
			$queryr=mysqli_query($koneksi,$sqlr);

			echo "<script>alert('DATA USER BERHASIL DIUBAH'); location.href='?$url_data&&header=User&&id=$hidden&&akun=$akun'</script>";
		}
		else {
			// echo "<script>alert('DATA USER GAGAL DIUBAH');</script>";
			echo "<script>alert('DATA USER GAGAL DIUBAH'); location.href='?Edit-User&&header=User&&id=$hidden&&akun=$akun'</script>";
		}
	};
?>
