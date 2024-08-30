<?php
  $reff=$_GET['reff'];
  // $_GET['Aprove_Penarikan'];

  if ($akses=='ketua') {
    $stts="2";
  }elseif ($akses=='superuser' OR $akses=='analis' OR $akses=='akunting') {
    $stts="1";
  }else {
    echo "<script>location.href='?header=Simpanan&warning_akses=Aprove_Penarikan';</script>";
  }

  $sqlus="UPDATE trans_ambil SET stts_ambil='$stts' where id='$reff'";
  $queryus=mysqli_query($koneksi,$sqlus);

  if ($queryus){
    echo "<script>alert('Penarikan Sudah Aprove'); location.href='?Data-Pengambilan&&header=Simpanan';</script>";
  }
  else{echo "<script>alert('Penarikan Gagal Aprove'); location.href='?Data-Pengambilan&&header=Simpanan';</script>";}
?>
