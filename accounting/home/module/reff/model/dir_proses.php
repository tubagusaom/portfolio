<?php
  if (isset($_POST['simpan_menu'])){

    date_default_timezone_set('Asia/Jakarta');
    $date	=date("Y-m-d H:i:s");

    $folder_name = $_POST['dir'];
    $url_get     = $_POST['url_get'];

    $in_dir = getCwd()."/module"."/";
    $sub_dir = getCwd()."/module"."/$folder_name/";
    // $chdir = chdir("/$folder_name");

    // echo $sub_dir;

    $url_array  = explode('&&', $url_get);
    $r_url      = $url_array[0].'&'.$url_array[1];

    if (!file_exists($in_dir . $folder_name))
    {
      mkdir($in_dir . $folder_name, 0755);
      mkdir($sub_dir . 'controler', 0755);
      mkdir($sub_dir . 'model', 0755);
      mkdir($sub_dir . 'view', 0755);

      file_put_contents($sub_dir . 'controler/modul.php', "<?php ?>");
      file_put_contents($sub_dir . 'controler/navigasi.php', "<?php ?>");
      file_put_contents($sub_dir . "view/detail_$folder_name.php", "<?php ?>");

      $sql="INSERT INTO `t_menu`(`id`, `nm_menu`, `keterangan`, `c_menu`)VALUES('','$folder_name','$folder_name','$date')";
      $query=mysqli_query($koneksi,$sql);

      if ($query) {
        echo "<script>alert('Menu $folder_name berhasil disimpan '); location.href='?$r_url';</script>";
      }else {
        echo "<script>alert('Menu $folder_name gagal disimpan '); location.href='?$r_url';</script>";
      }

    }else {
      echo "<script>alert('Menu $folder_name sudah ada'); location.href='?$url_get';</script>";
    }

  }elseif (isset($_POST['ubah'])){
    date_default_timezone_set('Asia/Jakarta');
    $date	=date("Y-m-d H:i:s");

    $acuan = $_POST['acuan'];
    $folder_name = $_POST['dir'];
    $status = $_POST['status'];
    $url_get     = $_POST['url_get'];

    $url_array  = explode('&&', $url_get);
    $a_url = "$url_array[4]";
    $b_url = "status=$status";

    $r_url = str_replace($a_url, $b_url, $url_get);

    // echo $url_get;
    // echo "<br>";
    // echo $r_url;

    $sql="UPDATE t_menu SET stts_menu='$status',c_menu='$date' where id='$acuan'";
		$query=mysqli_query($koneksi,$sql);

		if ($query){
      echo "<script>alert('Menu $folder_name berhasil diubah'); location.href='?$r_url';</script>";
    }else {
      echo "<script>alert('Menu $folder_name gagal diubah'); location.href='?$r_url'</script>";
    }
  }
?>
