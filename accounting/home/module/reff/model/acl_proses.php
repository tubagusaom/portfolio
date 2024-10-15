<?php
  if (isset($_POST['simpan'])){

    date_default_timezone_set('Asia/Jakarta');
    $date	=date("Y-m-d H:i:s");

    $menu = $_POST['menu'];
    $acl   = $_POST['acl'];
    $urutan   = $_POST['urutan'];

    // echo $acl;

    $sql="INSERT INTO `t_menu_acl`(`id`, `menu_acl`, `id_menu`, `no_menu_acl`, `stts_menu_acl`, `c_menu_acl`)VALUES('','$acl','$menu','$urutan','1','$date')";
    $query=mysqli_query($koneksi,$sql);

    if ($query){
      echo "<script>alert('Menu ACL Berhasil Ditambahkan'); location.href='?Menu-ACL&&header=Konfigurasi&&MenuACL=Addacl';</script>";
    }else{
      echo "<script>alert('Menu ACL Sudah Ada'); location.href='?Menu-ACL&&header=Konfigurasi&&MenuACL=Addacl'</script>";
    }

  }else if (isset($_POST['ubah'])) {

    date_default_timezone_set('Asia/Jakarta');
    $date	=date("Y-m-d H:i:s");

    $acuan = $_POST['acuan'];
    $idmenu = $_POST['menu'];
    $acl   = $_POST['acl'];
    $urutan   = $_POST['urutan'];

    $url_get    = $_POST['url_get'];

    $url_array  = explode('&&', $url_get);
    $a_url = "$url_array[4]&&$url_array[5]&&$url_array[6]";
    $b_url = "idm=$idmenu&&no=$urutan&&menu=$acl";

    $r_url = str_replace($a_url, $b_url, $url_get);

    // echo $url_get;
    // echo "<br>";
    // echo $r_url;

    $sql="UPDATE t_menu_acl SET menu_acl='$acl',id_menu='$idmenu',no_menu_acl='$urutan',c_menu_acl='$date' where id='$acuan'";
		$query=mysqli_query($koneksi,$sql);

		if ($query){
      echo "<script>alert('Menu ACL $acl berhasil diubah'); location.href='?$r_url';</script>";
    }else {
      echo "<script>alert('Menu ACL $acl gagal diubah'); location.href='?$r_url'</script>";
    }

  }
?>
