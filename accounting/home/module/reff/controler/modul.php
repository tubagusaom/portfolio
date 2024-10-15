<?php

	if(isset($_GET['Refferensi'])){
			include "module/".$_MODULE[$i]."/view/refferensi.php";
	}
	// ---------------------------------------------------------- //
	elseif(isset($_GET['Hak-Akses'])){
			include "module/".$_MODULE[$i]."/view/akses/view.php";
	}
	elseif(isset($_GET['Hak-Akses-Edit'])){
			include "module/".$_MODULE[$i]."/view/akses/edit.php";
	}
	elseif(isset($_GET['Proses-Hak-Akses'])){
			include "module/".$_MODULE[$i]."/model/hak_proses.php";
	}


	elseif(isset($_GET['Proses-Akses'])){
			include "module/".$_MODULE[$i]."/model/akses_proses.php";
	}
	elseif(isset($_GET['Proses-Edit-Akses'])){
			include "module/".$_MODULE[$i]."/model/akses_proses.php";
	}

	// ---------------------------------------------------------- //
	elseif(isset($_GET['Menu'])){
			include "module/".$_MODULE[$i]."/view/menu/view.php";
	}
	elseif(isset($_GET['Proses-Dir'])){
			include "module/".$_MODULE[$i]."/model/dir_proses.php";
	}

	// ---------------------------------------------------------- //
	elseif(isset($_GET['Akses-Menu'])){
			include "module/".$_MODULE[$i]."/view/akses_menu/view.php";
	}
	elseif(isset($_GET['Akses-Menu-Edit'])){
			include "module/".$_MODULE[$i]."/view/akses_menu/edit.php";
	}

	// ---------------------------------------------------------- //
	elseif(isset($_GET['Menu-ACL'])){
			include "module/".$_MODULE[$i]."/view/menu_acl/view.php";
	}
	elseif(isset($_GET['Proses-ACL'])){
			include "module/".$_MODULE[$i]."/model/acl_proses.php";
	}

	// ---------------------------------------------------------- //
	elseif(isset($_GET['Akses-Menu-ACL'])){
			include "module/".$_MODULE[$i]."/view/menu_acl_akses/view.php";
	}
	elseif(isset($_GET['Proses-Akses-ACL'])){
			include "module/".$_MODULE[$i]."/model/acl_akses_proses.php";
	}

	// ---------------------------------------------------------- //
	elseif(isset($_GET['Toolbar-Menu'])){
			include "module/".$_MODULE[$i]."/view/toolbar_menu/view.php";
	}
	elseif(isset($_GET['Proses-toolbar-Menu'])){
			include "module/".$_MODULE[$i]."/model/toolbar_proses.php";
	}

	// ---------------------------------------------------------- //
	elseif(isset($_GET['Toolbar'])){
			include "module/".$_MODULE[$i]."/view/toolbar/view.php";
	}
	elseif(isset($_GET['Proses-toolbar'])){
			include "module/".$_MODULE[$i]."/model/toolbar_proses.php";
	}

	// ---------------------------------------------------------- //
	elseif(isset($_GET['Edit-Refferensi'])){
			include "module/".$_MODULE[$i]."/view/ubah_refferensi.php";
	}
	elseif(isset($_GET['Proses-Edit-Ketentuan'])){
			include "module/".$_MODULE[$i]."/model/ubah_proses_refferensi.php";
	}
?>
