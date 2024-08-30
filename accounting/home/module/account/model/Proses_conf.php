<?php
  date_default_timezone_set('Asia/Jakarta');
  $date	=date("Y-m-d H:i:s");

  if (isset($_POST['simpan'])){
    $acount=$_POST['acount'];
    $jenis=$_POST['jenis'];

    $sql="INSERT INTO `conf_acount`(`id`, `jenis_conf`, `id_acount`, `stts_conf`, `c_conf`)VALUES('','$jenis','$acount',1,'$date')";
    $query=mysqli_query($koneksi,$sql);

    if ($query){
      echo "<script>alert('Konfigurasi Account Berhasil Ditambahkan'); location.href='?Configurasi-Account&&header=Account';</script>";
    }else{
      echo "<script>alert('Konfigurasi Account Gagal Ditambahkan'); location.href='?Configurasi-Account&&header=Account&&Acount=Configurasi'</script>";
    }
  }elseif (isset($_POST['simpanperubahan'])) {
    $jenis=$_POST['editjenis'];
    $id=$_POST['acuanedit'];

    $sql="UPDATE `conf_acount` SET `jenis_conf`='$jenis',`stts_conf`='2',`c_conf`='$date' where id='$id';";
    $query=mysqli_multi_query($koneksi,$sql);
    if ($query)
    {echo "<script>alert('Konfigurasi Account Berhasil diubah'); location.href='?Configurasi-Account&&header=Account'</script>";}
    else {echo "<script>alert('Konfigurasi Account gagal diubah'); location.href='?Configurasi-Account&&header=Account'</script>";}
  }else {
    $hidden	=$_GET['id'];
  	$sql_hapus="DELETE FROM `conf_acount` where id='$hidden'";
  	$query_h=mysqli_query($koneksi,$sql_hapus);

  	if ($query_h){
  	echo "<script>alert('Konfigurasi Account Berhasil dihapus'); location.href='?Configurasi-Account&&header=Account'</script>";}
  	else {echo "<script>alert('Konfigurasi Account gagal dihapus'); location.href='?Configurasi-Account&&header=Account'</script>";}
  }
?>
