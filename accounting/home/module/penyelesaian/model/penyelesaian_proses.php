<?php
		$idschm	=$_POST['kodeschm'];
		$idakun	=$_POST['kodeakun'];
		$idp		=$_POST['idpinjam'];
		$ket		=4;
		$ketb		=2;

	if (isset($_POST['selesai'])){

		$sqla="UPDATE akun SET stts_akun='$ket' where id='$idakun'";
		$querya=mysqli_query($koneksi,$sqla);

		$sqls="UPDATE schm SET stts_schm='$ket' where id='$idschm'";
		$querys=mysqli_query($koneksi,$sqls);

		$sqldu="SELECT id FROM user WHERE id_akun='$idakun' ORDER BY id DESC";
		$querydu=mysqli_query($koneksi,$sqldu);
		$datadu=mysqli_fetch_array($querydu);

		if ($querya AND $querys){

			if (isset($datadu)) {
				$sqluser="UPDATE user SET	stts_user='$ket' where id='$datadu[0]'";
				$queryuser=mysqli_query($koneksi,$sqluser);
			}else {
				echo "";
			}

			if (isset($idp)) {
				$sqlus="UPDATE pinjam SET ket_pinjam='2' where id='$idp'";
				$queryus=mysqli_query($koneksi,$sqlus);
			}else {
				echo "";
			}

			echo "<script>alert('Penyelesaian Berhasil diproses, Tunggu Aprove.'); location.href='?Penyelesaian&&header=Penyelesaian'</script>";
		}else {
			echo "<script>alert('DATA GAGAL DIPROSES'); location.href='?Penyelesaian&&header=Penyelesaian'</script>";
		}
	}

	elseif (isset($_POST['batalkan'])){

		$sqla="UPDATE akun SET stts_akun='$ketb' where id='$idakun'";
		$querya=mysqli_query($koneksi,$sqla);

		$sqls="UPDATE schm SET stts_schm='$ketb' where id='$idschm'";
		$querys=mysqli_query($koneksi,$sqls);

		$sqldu="SELECT id FROM user WHERE id_akun='$idakun' ORDER BY id DESC";
		$querydu=mysqli_query($koneksi,$sqldu);
		$datadu=mysqli_fetch_array($querydu);

		if ($querya AND $querys){

			if (isset($datadu)) {
				$sqluser="UPDATE user SET	stts_user='$ketb' where id='$datadu[0]'";
				$queryuser=mysqli_query($koneksi,$sqluser);
			}else {
				echo "";
			}

			if (isset($idp)) {
				$sqlus="UPDATE pinjam SET ket_pinjam='1' where id='$idp'";
				$queryus=mysqli_query($koneksi,$sqlus);
			}else {
				echo "";
			}

			echo "<script>alert('Penyelesaian Berhasil dibatalkan.'); location.href='?Penyelesaian&&header=Penyelesaian'</script>";
		}else {
			echo "<script>alert('DATA GAGAL DIPROSES'); location.href='?Penyelesaian&&header=Penyelesaian'</script>";
		}
	}
?>
