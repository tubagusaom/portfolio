<?php
	if(isset($_GET['Input-Company'])){
			include "module/".$_MODULE[$i]."/view/tambah_company.php";
	}
	elseif(isset($_GET['Proses-Tambah-Company'])){
			include "module/".$_MODULE[$i]."/model/tambah_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Data-Company'])){
			include "module/".$_MODULE[$i]."/view/detail_company.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Edit-Company'])){
			include "module/".$_MODULE[$i]."/view/ubah_company.php";
	}
	elseif(isset($_GET['Proses-Edit-Company'])){
			include "module/".$_MODULE[$i]."/model/ubah_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Hapus-Company'])){
			include "module/".$_MODULE[$i]."/model/hapus_proses.php";
	}
?>
