<?php
	if(isset($_GET['Penyelesaian'])){
			include "module/".$_MODULE[$i]."/view/penyelesaian.php";
	}
	if(isset($_GET['Detail-Anggota'])){
			include "module/".$_MODULE[$i]."/view/detail.php";
	}
	if(isset($_GET['Data-Penyelesaian'])){
			include "module/".$_MODULE[$i]."/view/data.php";
	}
	if(isset($_GET['Data-Anggota-Keluar'])){
			include "module/".$_MODULE[$i]."/view/keluar.php";
	}
	if(isset($_GET['Detail-Anggota_Keluar'])){
			include "module/".$_MODULE[$i]."/view/detail_keluar.php";
	}
	//---------------------------------------------------------- //
	elseif(isset($_GET['Proses-Penyelesaian'])){
			include "module/".$_MODULE[$i]."/model/penyelesaian_proses.php";
	}
	elseif(isset($_GET['Aprove'])){
			include "module/".$_MODULE[$i]."/model/aprove_proses.php";
	}
?>
