<?php
  if (isset($_POST['simpan_akses'])){

    date_default_timezone_set('Asia/Jakarta');
    $date	=date("Y-m-d H:i:s");

    $akses = $_POST['akses'];
    $ket   = $_POST['keterangan'];

    $sql_cd="SELECT conf_akses.id
        FROM t_role
        WHERE
              t_role.nama_peran = $akses AND
              t_role.keterangan = $ket
    ";

    $sql="INSERT INTO `t_role`(`id`, `nama_peran`, `keterangan`, `c_role`)VALUES('','$akses','$ket','$date')";
    $query=mysqli_query($koneksi,$sql);

    if ($query){
      echo "<script>alert('Akses Berhasil Ditambahkan'); location.href='?Hak-Akses&&header=Konfigurasi&&Akses=Addhakakses';</script>";
    }else{
      echo "<script>alert('Akses Gagal Ditambahkan'); location.href='?Hak-Akses&&header=Konfigurasi&&Akses=Addhakakses'</script>";
    }

  }else if (isset($_POST['ubah'])) {

    date_default_timezone_set('Asia/Jakarta');
    $date	=date("Y-m-d H:i:s");

    $acuan = $_POST['acuan'];
    $akses = $_POST['akses'];
    $ket   = $_POST['keterangan'];
    $url_get    = $_POST['url_get'];

    $url_array  = explode('&&', $url_get);
    $a_url = "$url_array[3]&&$url_array[4]";
    $b_url = "nama=$akses&&ket=$ket";

    $r_url = str_replace($a_url, $b_url, $url_get);

    // echo $url_get;
    // echo "<br>";
    // echo $r_url;

    $sql="UPDATE t_role SET nama_peran='$akses',keterangan='$ket',c_role='$date' where id='$acuan'";
		$query=mysqli_query($koneksi,$sql);

		if ($query){
      echo "<script>alert('Akses $akses berhasil diubah'); location.href='?$r_url';</script>";
    }else {
      echo "<script>alert('Akses $akses gagal diubah'); location.href='?$r_url'</script>";
    }
  }
?>
