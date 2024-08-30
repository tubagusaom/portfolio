
<?php
	if(isset($_GET['Input-Account_master'])){
			include "module/".$_MODULE[$i]."/view/tambah_account_master.php";
	}
	elseif(isset($_GET['Proses-Tambah-Account-Master'])){
			include "module/".$_MODULE[$i]."/model/tambah_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Input-Account_sub'])){
			include "module/".$_MODULE[$i]."/view/tambah_account_sub.php";
	}
	elseif(isset($_GET['Proses-Tambah-Account-sub'])){
			include "module/".$_MODULE[$i]."/model/tambah_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Data-Account'])){
			include "module/".$_MODULE[$i]."/view/detail_account.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Edit-Account-Master'])){
			include "module/".$_MODULE[$i]."/view/ubah_account_master.php";
	}
	elseif(isset($_GET['Proses-Edit-Account-Master'])){
			include "module/".$_MODULE[$i]."/model/ubah_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Edit-Account-Sub'])){
			include "module/".$_MODULE[$i]."/view/ubah_account_sub.php";
	}
	elseif(isset($_GET['Proses-Edit-Account-Sub'])){
			include "module/".$_MODULE[$i]."/model/ubah_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Configurasi-Account'])){
			include "module/".$_MODULE[$i]."/view/con_acount.php";
	}
	elseif(isset($_GET['Proses-Configurasi'])){
			include "module/".$_MODULE[$i]."/model/Proses_conf.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Hapus-Account-Master'])){
			include "module/".$_MODULE[$i]."/model/hapus_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Hapus-Account-Sub'])){
			include "module/".$_MODULE[$i]."/model/hapus_proses.php";
	}
?>
