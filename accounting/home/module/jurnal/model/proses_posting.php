<?php
  if (isset($_POST['posting'])){
    $akses=$_SESSION['id_akun'];

    $copy="INSERT INTO trans(`init_trans`,`saldo_trans`, `jenis_trans`, `reff_trans`, `ket_trans`, `efv_trans`, `id_schema`, `kd_acount`, `stts_trans`, `c_trans`, `id_akun`)
    SELECT 'Jurnal', `saldo_trans`, `jenis_trans`, `reff_trans`, `ket_trans`, `efv_trans`, `id_schema`, `kd_acount`, `stts_trans`, `c_trans`, `id_akun` FROM trans_them WHERE id_akun='$akses'";
    $query=mysqli_query($koneksi,$copy);

    if ($query){
      $sql="DELETE FROM trans_them where id_akun='$akses'";
    	$hapus=mysqli_query($koneksi,$sql);

      if ($hapus){
    	  echo "<script>alert('Jurnal Sementara Berhasil Diposting');location.href='?Data-Jurnal&&header=Jurnal'</script>";
      }else{
        echo "<script>alert('POSTING ERORE GASWAT CUY!'); location.href='?Input-Jurnal&&header=Jurnal'</script>";
      }
    }else{
      echo "<script>alert('Jurnal Sementara Gagal Diposting'); location.href='?Input-Jurnal&&header=Jurnal'</script>";
    }
  }
?>
