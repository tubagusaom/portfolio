<?php
		if (isset($_POST['aprovepenyelesaian'])) {

		date_default_timezone_set('Asia/Jakarta');
		$date		=date("Y-m-d H:i:s");
		$tape		=date("Y-m-d");

		$acuan	=$_POST['kodeakun'];
		$schm		=$_POST['kodeschm'];
		$idp		=$_POST['idpinjam'];
		$angsur	=$_POST['angsur_selesai'];

		if ($akses=='superuser' OR $akses=='ketua'){
			$ket=5;
		}else {
			$ket=6;
		}


		$sqla="UPDATE akun SET	stts_akun='$ket' where id='$acuan'";
		$querya=mysqli_query($koneksi,$sqla);

		if ($querya) {
			$sqls="UPDATE schm SET	stts_schm='$ket' where id='$schm'";
			$querys=mysqli_query($koneksi,$sqls);

			$sqldu="SELECT id FROM user WHERE id_akun='$acuan' ORDER BY id DESC";
			$querydu=mysqli_query($koneksi,$sqldu);
			$datadu=mysqli_fetch_array($querydu);

			if (isset($datadu)) {
				$sqluser="UPDATE user SET	stts_user='$ket' where id='$datadu[0]'";
				$queryuser=mysqli_query($koneksi,$sqluser);
			}else {
				echo "";
			}

			if ($akses=='superuser' OR $akses=='ketua'){
				if ($idp==''){
					echo "";
				}else {

					$sql="INSERT INTO `trans_pinjam`(`id`, `angsur_pinjam`, `jenis_pinjam`, `c_pinjam`, `id_pinjam`, `efv_pinjam`) VALUES ('', '$angsur', 'penyelesaian', '$date', '$idp', '$tape')";
				  $query=mysqli_query($koneksi,$sql);

					if ($query){
						$sqlus="UPDATE pinjam SET ket_pinjam='3' where id='$idp'";
					  $queryus=mysqli_query($koneksi,$sqlus);
					}else {
						echo "";
					}
				}

				echo "<script>alert('ANGGOTA BERHASIL DISELESAIKAN.'); location.href='?Data-Penyelesaian&&header=Penyelesaian'</script>";
			}else {
				echo "<script>alert('APROVE BERHASIL, MENUNGGU PEMBAYARAN UNTUK PROSES PENYELESAIAN !'); location.href='?Data-Penyelesaian&&header=Penyelesaian'</script>";
			}
		}else {
			echo "<script>alert('APROVE GAGAL !!!'); location.href='?Penyelesaian&&header=Penyelesaian'</script>";
		}
	}else {
		echo "<script>location.href='?Oops&&header=Oops!'</script>";
	}
?>
