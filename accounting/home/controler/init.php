<?php
  if ( ! defined('BASEPATH')) exit('Tidak ada akses skrip langsung yang diizinkan');

  // echo $_SESSION['akses'];

  if (isset($_SESSION['akses'])) {
    $sessionidakses = $_SESSION['akses'];
    $akses = $this_login->akses($_SESSION['akses']);

    // echo $akses;

    $sql_aks =
              "SELECT
                  a.id,
                  a.id_akses,
                  a.id_menu,
                  a.no_menu,
                  b.id as IDMENU,
                  b.nm_menu as nmmenu,
                  b.keterangan as menu,
                  c.nama_peran as nmrole,
                  c.keterangan as role
                FROM conf_akses a
                JOIN t_menu b ON b.id = a.id_menu
                JOIN t_role c ON c.id = a.id_akses
                WHERE b.stts_menu NOT LIKE '0'
                ORDER BY no_menu ASC
              ";
		$query_aks	=mysqli_query($koneksi,$sql_aks);
    // $data_aks=mysqli_fetch_array($query_aks);

    // var_dump($data_aks['nmrole']);
    // $acuanidmenu='';
		while($data_aks=mysqli_fetch_array($query_aks)){
      if ($sessionidakses==$data_aks['id_akses']) {
        $_MODULE[]=$data_aks['nmmenu'];
      }

      $acuanidmenu= $data_aks['id_menu'];


      // $sql_menu_acls =
      //           "SELECT
      //               a.id,
      //               a.id_akses,
      //               a.id_menu_acl,
      //               a.stts_akses,
      //               b.id AS IDAKSES,
      //               b.nama_peran AS NAMA,
      //               b.keterangan AS KETNAMA,
      //               c.id AS IDMENUACL,
      //               c.id_menu,
      //               c.menu_acl as MENUACL,
      //               d.id AS IDMENU,
      //               d.keterangan as KETMENU
      //             FROM conf_akses_menu_acl a
      //             JOIN t_role b ON b.id = a.id_akses
      //             JOIN t_menu_acl c ON c.id = a.id_menu_acl
      //             JOIN t_menu d ON d.id = c.id_menu
      //
      //             WHERE
      //               a.id_akses = $sessionidakses AND
      //               c.id_menu = $data_aks[id_menu] AND
      //               a.stts_akses NOT LIKE '0'
      //
      //             ORDER BY IDAKSES ASC, IDMENUACL ASC, c.no_menu_acl ASC
      //           ";
  		// $query_menu_acls=mysqli_query($koneksi,$sql_menu_acls);

    }

    $sql_menu_acls =
              "SELECT
                  a.id,
                  a.id_akses,
                  a.id_menu_acl,
                  a.stts_akses,
                  b.id AS IDAKSES,
                  b.nama_peran AS NAMA,
                  b.keterangan AS KETNAMA,
                  c.id AS IDMENUACL,
                  c.id_menu,
                  c.menu_acl as MENUACL,
                  d.id AS IDMENU,
                  d.keterangan as KETMENU
                FROM conf_akses_menu_acl a
                JOIN t_role b ON b.id = a.id_akses
                JOIN t_menu_acl c ON c.id = a.id_menu_acl
                JOIN t_menu d ON d.id = c.id_menu

                WHERE
                  a.id_akses = $sessionidakses AND
                  d.id = $acuanidmenu AND
                  a.stts_akses NOT LIKE '0'

                ORDER BY IDAKSES ASC, IDMENUACL ASC, c.no_menu_acl ASC
              ";
    $query_menu_acls=mysqli_query($koneksi,$sql_menu_acls);

    // echo $sessionidakses;

  }
?>
