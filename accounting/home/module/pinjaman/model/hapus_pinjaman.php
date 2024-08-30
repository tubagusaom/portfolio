<?php
  $acuan=$_GET['kode'];
  $hidden	=$_GET['kodes'];

  $sql_hapus="DELETE FROM pinjam_them where id='$acuan'";
	$query_h=mysqli_query($koneksi,$sql_hapus);

	if ($query_h){
      $sqlpinjam="SELECT id FROM pinjam WHERE id_schm='$hidden' ORDER BY id DESC";
      $querypinjam=mysqli_query($koneksi,$sqlpinjam);
      $datapinjam=mysqli_fetch_array($querypinjam);

      $sqls="UPDATE pinjam SET ket_pinjam='3' where id='$datapinjam[0]'";
      $querys=mysqli_query($koneksi,$sqls);

      if ($querys) {
        echo "<script>alert('DATA PEMINJAMAN BERHASIL DIHAPUS'); location.href='?Data-Peminjaman&&header=Pinjaman'</script>";
      }else {
        echo "<script>alert('ERORE !!!'); location.href='?Data-Peminjaman&&header=Pinjaman'</script>";
      }
  }else{
    echo "<script>alert('DATA PEMINJAMAN GAGAL DIHAPUS'); location.href='?Data-Peminjaman&&header=Pinjaman'</script>";
  }
?>
