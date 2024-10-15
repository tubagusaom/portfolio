<?php
  date_default_timezone_set('Asia/Jakarta');
  $date	=date("Y-m-d H:i:s");

  if (isset($_POST['simpan'])){
    $akses  = $_POST['akses'];
    $menu   = $_POST['menu'];
    $urutan = $_POST['no_urut'];

    $sql_cd="SELECT conf_akses.id
        FROM conf_akses
        WHERE
              conf_akses.id_akses = $akses AND
              conf_akses.id_menu = $menu
    ";

    $query_cd=mysqli_query($koneksi,$sql_cd);
    $data_cd=mysqli_fetch_array($query_cd);
    $datatotal = count($data_cd['id']);

    if ($datatotal == 0) {
      echo $data_cd['id'];
      $sql="INSERT INTO `conf_akses`(`id`, `id_akses`, `id_menu`, `no_menu`, `stts_akses`, `c_akses`)VALUES('','$akses','$menu','$urutan',1,'$date')";
      $query=mysqli_query($koneksi,$sql);

      if ($query){
        echo "<script>alert('Akses Menu Berhasil Ditambahkan'); location.href='?Hak-Akses&&header=Konfigurasi&&Akses=Addakses';</script>";
      }else{
        echo "<script>alert('Akses Menu Gagal Ditambahkan'); location.href='?Hak-Akses&&header=Konfigurasi&&Akses=Addakses'</script>";
      }
    }else {
      echo "<script>alert('Akses Menu Sudah Ada'); location.href='?Hak-Akses&&header=Konfigurasi&&Akses=Addakses';</script>";
    }

  }elseif (isset($_POST['ubah'])) {

    $hidden     = $_POST['acuan_kode'];
    $nmuser     = $_POST['nm_akses'];
    $id_menu    = $_POST['id_menu'];
    $urutan    = $_POST['urutan'];
    $url_get    = $_POST['url_get'];

    // echo $url_get;
    // echo "<br><br>";

    $sqld="SELECT
          a.id,
          a.nm_menu,
          a.keterangan
          FROM t_menu a
          WHERE a.id = $id_menu";
    $queryd=mysqli_query($koneksi,$sqld);
    $datad=mysqli_fetch_array($queryd);

    $url_array  = explode('&&', $url_get);
    $a_url = "$url_array[5]&&$url_array[6]&&$url_array[7]";
    $b_url = "no=$urutan&&id_menu=$datad[id]&&menu=$datad[keterangan]";

    $r_url      = str_replace($a_url, $b_url, $url_get);

    // $urlget	=  merge_get_url($r_url);

    // echo "<br><br>";
    // echo $r_url;
    // echo "<br><br>";

    // $url_get	=  merge_get_url($r_url);

    // echo "<br><br>";
    // echo $url_get;

    $sql="UPDATE conf_akses SET id_menu='$id_menu',no_menu='$urutan' where id='$hidden'";
		$query=mysqli_query($koneksi,$sql);

		if ($query){
      echo "<script>alert('Akses $nmuser berhasil diubah'); location.href='?$r_url';</script>";
    }else {
      echo "<script>alert('Akses $nmuser gagal diubah'); location.href='?$r_url'</script>";
    }
  }
?>
