<?php
	if(isset($_GET['Data-Peminjaman'])){
			include "module/".$_MODULE[$i]."/view/peminjaman.php";
	}
	elseif(isset($_GET['Detail-Peminjaman'])){
			include "module/".$_MODULE[$i]."/view/detail_peminjaman.php";
	}

	if(isset($_GET['Data-Pinjaman'])){
			include "module/".$_MODULE[$i]."/view/pinjaman.php";
	}
	elseif(isset($_GET['Detail-Pinjaman'])){
			include "module/".$_MODULE[$i]."/view/detail_pinjaman.php";
	}

	elseif(isset($_GET['Data-Pelunasan'])){
			include "module/".$_MODULE[$i]."/view/detail_pelunasan.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Pinjaman-Anggota'])){
			include "module/".$_MODULE[$i]."/view/tambah_pinjam.php";
	}
	elseif(isset($_GET['Proses-Tambah-Pinjaman'])){
			include "module/".$_MODULE[$i]."/model/tambah_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Edit-Pinjaman'])){
			include "module/".$_MODULE[$i]."/view/ubah_pinjam.php";
	}
	elseif(isset($_GET['Proses-Edit-Pinjaman'])){
			include "module/".$_MODULE[$i]."/model/ubah_proses.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Aprove-Pinjaman'])){
			include "module/".$_MODULE[$i]."/model/aprove_pinjaman.php";
	}

	elseif(isset($_GET['Proses-Pelunasan'])){
			include "module/".$_MODULE[$i]."/model/pelunasan_proses.php";
	}
	elseif(isset($_GET['Aprove-Pelunasan'])){
			include "module/".$_MODULE[$i]."/model/aprove_pelunasan.php";
	}

	elseif(isset($_GET['Hapus-Pinjaman'])){
			include "module/".$_MODULE[$i]."/model/hapus_pinjaman.php";
	}
?>
