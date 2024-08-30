<?php
	if(isset($_GET['Data-Penagihan'])){
			include "module/".$_MODULE[$i]."/view/detail_penagihan.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Proses-Aprove'])){
			include "module/".$_MODULE[$i]."/model/aprove_proses.php";
	}
	// ---------------------------------------------------------- //
?>
