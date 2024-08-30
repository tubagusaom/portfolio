<?php
	if(isset($_GET['Pendaftaran-Anggota'])){
			include "module/".$_MODULE[$i]."/view/tambah_akun.php";
	}
	elseif(isset($_GET['Proses-Tambah-Anggota'])){
			include "module/".$_MODULE[$i]."/model/tambah_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Data-Anggota'])){
			include "module/".$_MODULE[$i]."/view/detail_akun.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Edit-Anggota'])){
			include "module/".$_MODULE[$i]."/view/ubah_akun.php";
	}
	elseif(isset($_GET['Proses-Edit-Anggota'])){
			include "module/".$_MODULE[$i]."/model/ubah_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Hapus-Anggota'])){
			include "module/".$_MODULE[$i]."/model/hapus_akun.php";
	}
?>
