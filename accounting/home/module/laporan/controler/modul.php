<?php
	if(isset($_GET['Buku-Besar'])){
			include "module/".$_MODULE[$i]."/view/bukubesar.php";
	}
	elseif(isset($_GET['Neraca-Lajur'])){
			include "module/".$_MODULE[$i]."/view/neracalajur.php";
	}
	elseif(isset($_GET['Neraca'])){
			include "module/".$_MODULE[$i]."/view/neraca.php";
	}
	elseif(isset($_GET['Laba-Rugi'])){
			include "module/".$_MODULE[$i]."/view/laba_rugi.php";
	}
	////////////////////////////////////////////////////////////
	elseif(isset($_GET['Konfigurasi-Laporan'])){
			include "module/".$_MODULE[$i]."/view/konfigurasi.php";
	}
	elseif(isset($_GET['Proses-Tambah'])){
			include "module/".$_MODULE[$i]."/model/proses.php";
	}
?>
