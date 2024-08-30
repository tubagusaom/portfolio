<?php
	if(isset($_GET['Input-Jurnal'])){
			include "module/".$_MODULE[$i]."/view/tambah_jurnal.php";
	}
	elseif(isset($_GET['Proses-Tambah-Jurnal'])){
			include "module/".$_MODULE[$i]."/model/tambah_proses.php";
	}
	elseif(isset($_GET['Posting-Jurnal'])){
			include "module/".$_MODULE[$i]."/model/proses_posting.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Data-Jurnal'])){
			include "module/".$_MODULE[$i]."/view/detail_jurnal.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Edit-Jurnal'])){
			include "module/".$_MODULE[$i]."/view/ubah_jurnal.php";
	}
	elseif(isset($_GET['Proses-Edit-Jurnal'])){
			include "module/".$_MODULE[$i]."/model/ubah_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Hapus-Jurnal'])){
			include "module/".$_MODULE[$i]."/model/hapus_proses.php";
	}
?>
