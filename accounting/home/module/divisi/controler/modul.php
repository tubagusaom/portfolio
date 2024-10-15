<?php
	if(isset($_GET['Input-Divisi'])){
			include "module/".$_MODULE[$i]."/view/tambah_div.php";
	}
	elseif(isset($_GET['Proses-Tambah-Divisi'])){
			include "module/".$_MODULE[$i]."/model/tambah_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Data-Divisi'])){
			include "module/".$_MODULE[$i]."/view/detail_div.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Edit-Divisi'])){
			include "module/".$_MODULE[$i]."/view/ubah_div.php";
	}
	elseif(isset($_GET['Proses-Edit-Divisi'])){
			include "module/".$_MODULE[$i]."/model/ubah_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Hapus-Divisi'])){
			include "module/".$_MODULE[$i]."/model/hapus_proses.php";
	}
?>
