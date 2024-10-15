<?php
  if (isset($_POST['simpan'])){

    date_default_timezone_set('Asia/Jakarta');
    $date	=date("Y-m-d H:i:s");

    $tool = $_POST['tool'];
    $ket   = $_POST['keterangan'];

    $sql="INSERT INTO `t_toolbar`(`id`, `nama_toolbar`, `keterangan`, `c_toolbar`)VALUES('','$tool','$ket','$date')";
    $query=mysqli_query($koneksi,$sql);

    if ($query){
      echo "<script>alert('Toolbar Berhasil Ditambahkan'); location.href='?Toolbar&&header=Konfigurasi&&Toolbars=Addacl';</script>";
    }else{
      echo "<script>alert('Toolbar Sudah Ada'); location.href='?Toolbar&&header=Konfigurasi&&Toolbars=Addacl'</script>";
    }

  }else if (isset($_POST['ubah'])) {

    date_default_timezone_set('Asia/Jakarta');
    $date	=date("Y-m-d H:i:s");

    $acuan = $_POST['acuan'];
    $tool = $_POST['tool'];
    $ket   = $_POST['keterangan'];
    $url_get    = $_POST['url_get'];

    $url_array  = explode('&&', $url_get);
    $a_url = "$url_array[3]&&$url_array[4]";
    $b_url = "nama=$tool&&ket=$ket";

    $r_url = str_replace($a_url, $b_url, $url_get);

    // echo $url_get;
    // echo "<br>";
    // echo $r_url;

    $sql="UPDATE t_toolbar SET nama_toolbar='$tool',keterangan='$ket',c_toolbar='$date' where id='$acuan'";
		$query=mysqli_query($koneksi,$sql);

		if ($query){
      echo "<script>alert('Toolbar $tool berhasil diubah'); location.href='?$r_url';</script>";
    }else {
      echo "<script>alert('Toolbar $tool gagal diubah'); location.href='?$r_url'</script>";
    }

  }
?>
