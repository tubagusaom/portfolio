<?php
  date_default_timezone_set('Asia/Jakarta');
  $date	=date("Y-m-d H:i:s");
  $ket	  =$_POST['ta'];
  $kdp	  =$_POST['kp'];
  $tape	  =$_POST['tape'];

  echo $ket;

  $sql="INSERT INTO `trans_pinjam`(`id`, `angsur_pinjam`, `jenis_pinjam`, `c_pinjam`, `id_pinjam`, `efv_pinjam`) VALUES ('', '$ket', 'proses', '$date', '$kdp', '$tape')";
  $query=mysqli_query($koneksi,$sql);

  $sqlus="UPDATE pinjam SET ket_pinjam='2' where id='$kdp'";
  $queryus=mysqli_query($koneksi,$sqlus);

  if ($query){
    echo "<script>alert('Pelunasan Sedang diproses, silahkan lakukan pembayaran dan tunggu konfirmasi'); location.href='?Profile-Pinjaman&&header=Profile';</script>";
  }
  else{echo "<script>alert('Pelunasan Gagal diproses'); location.href='?Profile-Pinjaman&&header=Profile'</script>";}
?>
