<?php
	if(isset($_GET['Input-Department'])){
			include "module/".$_MODULE[$i]."/view/tambah_dept.php";
	}
	elseif(isset($_GET['Proses-Tambah-Department'])){
			include "module/".$_MODULE[$i]."/model/tambah_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Data-Department'])){
			include "module/".$_MODULE[$i]."/view/detail_dept.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Edit-Department'])){
			include "module/".$_MODULE[$i]."/view/ubah_dept.php";
	}
	elseif(isset($_GET['Proses-Edit-Department'])){
			include "module/".$_MODULE[$i]."/model/ubah_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Hapus-Department'])){
			include "module/".$_MODULE[$i]."/model/hapus_proses.php";
	}
?>
