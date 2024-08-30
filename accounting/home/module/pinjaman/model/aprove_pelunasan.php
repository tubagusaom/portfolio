<?php
  $reff=$_GET['reff'];

  $sqlus="UPDATE pinjam SET ket_pinjam='3' where id='$reff'";
  $queryus=mysqli_query($koneksi,$sqlus);

  $sqlus="UPDATE trans_pinjam SET jenis_pinjam='pelunasan' where id_pinjam='$reff' AND jenis_pinjam='proses'";
  $queryus=mysqli_query($koneksi,$sqlus);

  if ($queryus){
    echo "<script>alert('Pelunasan Sudah Aprove'); location.href='?Data-Pelunasan&&header=Penagihan';</script>";
  }
  else{echo "<script>alert('Pelunasan Gagal Aprove'); location.href='?Data-Pelunasan&&header=Penagihan';</script>";}
?>
