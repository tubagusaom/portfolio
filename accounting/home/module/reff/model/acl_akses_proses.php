<?php
  if (isset($_POST['simpan'])){

    date_default_timezone_set('Asia/Jakarta');
    $date	=date("Y-m-d H:i:s");

    $akses  = $_POST['akses'];
    $acl    = $_POST['acl'];
    $status = $_POST['status'];

    foreach ($acl as $keyacl => $arrayacl) {
        // echo $valuemenu." = ";
        // echo $menu[$keymenu];
        // echo "<br>";

        $sql="INSERT INTO `conf_akses_menu_acl`(`id`, `id_akses`, `id_menu_acl`, `stts_akses`, `c_akses`)VALUES('','$akses','$arrayacl','$status','$date')";
        $query=mysqli_query($koneksi,$sql);

        if ($query){
          echo "<script>alert('Akses Menu ACL Berhasil Ditambahkan'); location.href='?Akses-Menu-ACL&&header=Konfigurasi';</script>";
        }else{
          echo "<script>alert('Akses Menu ACL Sudah Ada'); location.href='?Akses-Menu-ACL&&header=Konfigurasi'</script>";
        }
    }

  }else if (isset($_POST['ubah'])) {

    date_default_timezone_set('Asia/Jakarta');
    $date	=date("Y-m-d H:i:s");

    $acuan = $_POST['acuan'];
    $idmenu = $_POST['menu'];
    $acl   = $_POST['acl'];
    $status   = $_POST['status'];

    $url_get    = $_POST['url_get'];

    $url_array  = explode('&&', $url_get);
    $a_url = "$url_array[4]&&$url_array[5]&&$url_array[6]";
    $b_url = "idm=$idmenu&&menu=$acl&&stts=$status";

    $r_url = str_replace($a_url, $b_url, $url_get);

    // echo $url_get;
    // echo "<br>";
    // echo $r_url;

    $sql="UPDATE conf_akses_menu_acl SET menu_acl='$acl',id_menu_acl='$idmenu',stts_akses='$status',c_akses='$date' where id='$acuan'";
		$query=mysqli_query($koneksi,$sql);

		if ($query){
      echo "<script>alert('Akses Menu ACL $acl berhasil diubah'); location.href='?$r_url';</script>";
    }else {
      echo "<script>alert('Akses Menu ACL $acl gagal diubah'); location.href='?$r_url'</script>";
    }

  }
?>
