<?php

	$akun = $_SESSION['id_akun'];
	$user = $_SESSION['kd_user'];
	$role = $_SESSION['akses'];

	$sqlakun = "SELECT
        a.*,
        b.id AS idschm
     FROM akun a
     LEFT JOIN schm b ON b.id_akun = a.id
      WHERE
        a.stts_akun NOT LIKE '3' AND
        a.stts_akun NOT LIKE '4' AND
        a.stts_akun NOT LIKE '5' AND
        a.id = $akun
  ";
  $queryakun	= mysqli_query($koneksi,$sqlakun);
  $dataakun	  = mysqli_fetch_array($queryakun);

  $kodeschm = $dataakun['idschm'];

	// echo "<br>";
  // var_dump($kodeschm);
  // echo "<br><br>";

	if(isset($_GET['warning_akses'])){

?>

	<br>
	<div class="box-warning">
		<h2>
			<i class="fa fa-exclamation-triangle"></i> PERINGATAN
		</h2>

		<b><?=strtoupper($aksesusr[$akses])?></b>
		TIDAK DIBERIKAN AKSES UNTUK
		<b><?=str_replace('_',' ', strtoupper($_GET['warning_akses']))?></b>
	</div>

<?php

	}

	// ---------------------------------------------------------- //
	elseif(isset($_GET['Detail-Akun'])){
			include "module/".$_MODULE[$i]."/view/detail_akun.php";
	}
	elseif(isset($_GET['Profile-Simpanan'])){
			include "module/".$_MODULE[$i]."/view/simpanan.php";
	}
	elseif(isset($_GET['Profile-Pinjaman'])){
			include "module/".$_MODULE[$i]."/view/pinjaman.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Proses-Ubah-Password'])){
			include "module/".$_MODULE[$i]."/model/password_proses.php";
	}
	elseif(isset($_GET['Logout'])){
			$this_login->sesiOn($_SESSION['akses_user'],TRUE);
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Penarikan-simpanan'])){
			include "module/".$_MODULE[$i]."/model/proses_penarikan.php";
	}
	elseif(isset($_GET['Proses-Formulir-Pinjaman'])){
			include "module/".$_MODULE[$i]."/model/tambah_proses.php";
	}
	elseif(isset($_GET['Proses-Ubah-Pinjaman'])){
			include "module/".$_MODULE[$i]."/model/ubah_pinjam.php";
	}
	elseif(isset($_GET['Pelunasan-Proses'])){
			include "module/".$_MODULE[$i]."/model/pelunasan_proses.php";
	}

?>
