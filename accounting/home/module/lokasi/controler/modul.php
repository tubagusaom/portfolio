<?php
	if(isset($_GET['Input-Lokasi'])){
			include "module/".$_MODULE[$i]."/view/tambah_lok.php";
	}
	elseif(isset($_GET['Proses-Tambah-Lokasi'])){
			include "module/".$_MODULE[$i]."/model/tambah_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Data-Lokasi'])){
			include "module/".$_MODULE[$i]."/view/detail_lok.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Edit-Lokasi'])){
			include "module/".$_MODULE[$i]."/view/ubah_lok.php";
	}
	elseif(isset($_GET['Proses-Edit-Lokasi'])){
			include "module/".$_MODULE[$i]."/model/ubah_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Hapus-Lokasi'])){
			include "module/".$_MODULE[$i]."/model/hapus_lok.php";
	}
?>
