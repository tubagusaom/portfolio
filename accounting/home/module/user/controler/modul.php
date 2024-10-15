<?php
	if(isset($_GET['Input-User'])){
			include "module/".$_MODULE[$i]."/view/tambah_user.php";
	}
	elseif(isset($_GET['Proses-Tambah-User'])){
			include "module/".$_MODULE[$i]."/model/tambah_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Data-User'])){
			include "module/".$_MODULE[$i]."/view/detail_user.php";
	}
	elseif(isset($_GET['Data-User-Anggota'])){
			include "module/".$_MODULE[$i]."/view/anggota_user.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Edit-User'])){
			include "module/".$_MODULE[$i]."/view/ubah_user.php";
	}
	elseif(isset($_GET['Proses-Edit-User'])){
			include "module/".$_MODULE[$i]."/model/ubah_proses.php";
	}
	elseif(isset($_GET['Reset-Password'])){
			include "module/".$_MODULE[$i]."/model/reset_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Hapus-User'])){
			include "module/".$_MODULE[$i]."/model/hapus_user.php";
	}
?>
