<?php
	if(isset($_GET['Data-Simpanan'])){
			include "module/".$_MODULE[$i]."/view/simpanan.php";
	}
	elseif(isset($_GET['Detail-Simpanan'])){
			include "module/".$_MODULE[$i]."/view/detail_simpanan.php";
	}
	elseif(isset($_GET['Laporan-Simpanan'])){
			include "module/".$_MODULE[$i]."/view/laporan_simpanan.php";
	}
	elseif(isset($_GET['Data-Pengambilan'])){
			include "module/".$_MODULE[$i]."/view/detail_ambil.php";
	}
	//---------------------------------------------------------- //
	elseif(isset($_GET['Edit-Simpanan'])){
			include "module/".$_MODULE[$i]."/view/ubah_simpan.php";
	}
	elseif(isset($_GET['Proses-Edit-Simpanan'])){
			include "module/".$_MODULE[$i]."/model/ubah_proses.php";
	}
	elseif(isset($_GET['Penarikan'])){
			include "module/".$_MODULE[$i]."/model/penarikan_proses.php";
	}
	elseif(isset($_GET['Aprove_Penarikan'])){
			include "module/".$_MODULE[$i]."/model/penarikan_aprove.php";
	}
	//---------------------------------------------------------- //
	elseif(isset($_GET['Import-SHU'])){
			include "module/".$_MODULE[$i]."/view/import_shu.php";
	}
	elseif(isset($_GET['Proses-Import'])){
			include "module/".$_MODULE[$i]."/model/proses_import.php";
	}
?>
