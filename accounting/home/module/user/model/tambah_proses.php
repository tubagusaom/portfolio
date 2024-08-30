<?php //*fungsi simpan
	if (isset($_POST['simpan']))
	{
		date_default_timezone_set('Asia/Jakarta');
		$agt		=$_POST['anggota'];
		$usr		=$_POST['user'];
		$pw			=$_POST['pws'];
		$aks		=$_POST['akses'];
		$date	=date("Y-m-d H:i:s");
		$pwmd5 = md5($pw);

		$aksesr = array(
			'4' => 'ketua',
			'5' => 'admin',
			'16' => 'sekertaris',
			'17' => 'akunting',
			'18' => 'analis',
			'66' => 'anggota',
			'20' => 'kredit',
			'21' => 'pengawas'
		);

		$akses = $aksesr[$aks];

		$status_user		= $_POST['status_user'];

		if ($status_user == 1) {
			$url_data = "Input-User";
		}else {
			$url_data = "Data-User";
		}

		// echo $status_user;
		// echo "<br>";
		//
		// echo $agt;
		// echo "$pwmd5";

		$sqluser="SELECT id FROM user WHERE id_akun='$agt' AND kd_user='$usr' ORDER BY id DESC";
		$queryuser=mysqli_query($koneksi,$sqluser);
		$datauser=mysqli_fetch_array($queryuser);

		if (isset($datauser)) {
			echo "<script>alert('Username sudah pernah digunakan sebelumnya.!'); location.href='?Input-User&&header=User'</script>";
		}else {
			$sql="INSERT INTO user (`id`, `kd_user`, `pw_user`, `akses_user`, `stts_user`, `c_user`, `id_akun`, `pw_asli`) VALUES('','$usr','$pwmd5','$akses',1,'$date','$agt','$pw')";
			$query=mysqli_query($koneksi,$sql);

			if ($query === TRUE) {
				$id_user = $koneksi->insert_id;
				$sqlr="INSERT INTO t_user_role (`id`, `kd_user`, `kd_role`, `stts_ur`, `c_ur`) VALUES('','$id_user','$aks',1,'$date')";
				$queryr=mysqli_query($koneksi,$sqlr);

				// if ($queryr === TRUE) {
					$sqls="UPDATE akun SET stts_user='$status_user' where id='$agt'";
					$querys=mysqli_query($koneksi,$sqls);
				// }else {echo "";}

				echo "<script>alert('User Berhasil Ditambahkan'); location.href='?$url_data&&header=User';</script>";
			}else {
				echo "<script>alert('User Gagal Ditambahkan, pastikan username belum pernah digunakan sebelumnya.!'); location.href='?Input-User&&header=User'</script>";
			}
		}

	};
?>
