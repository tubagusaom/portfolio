<?php
  $acuan=$_POST['kodepinjaman'];

  if (isset($_POST['kirim'])) {
    $sqlus="UPDATE pinjam_them SET ket_pinjam='2' where id='$acuan'";
    $queryus=mysqli_query($koneksi,$sqlus);

    if ($queryus){
      echo "<script>alert('Pinjaman Sudah Dikirim'); location.href='?Data-Peminjaman&&header=Pinjaman';</script>";
    }
    else{echo "<script>alert('Pelunasan Gagal Dikirim'); location.href='?Data-Peminjaman&&header=Pinjaman';</script>";}
  }elseif (isset($_POST['aprove'])) {
    $sqlus="UPDATE pinjam_them SET ket_pinjam='3' where id='$acuan'";
    $queryus=mysqli_query($koneksi,$sqlus);

    if ($queryus){
      echo "<script>alert('Pinjaman Sudah Diaprove'); location.href='?Data-Peminjaman&&header=Pinjaman';</script>";
    }
    else{echo "<script>alert('Pelunasan Gagal Diaprove'); location.href='?Data-Peminjaman&&header=Pinjaman';</script>";}
  }elseif (isset($_POST['acc'])){
    $tanggaltransfer=$_POST['tape'];
    $idschm=$_POST['kodeschm'];

    $sqlpinjam="SELECT id FROM pinjam WHERE id_schm='$idschm' ORDER BY id DESC";
		$querypinjam=mysqli_query($koneksi,$sqlpinjam);
		$datapinjam=mysqli_fetch_array($querypinjam);

    if (isset($datapinjam)) {
      $sqls="UPDATE pinjam SET ket_pinjam='4' where id='$datapinjam[0]'";
      $querys=mysqli_query($koneksi,$sqls);
    }else {echo "";}

    $copy="INSERT INTO pinjam(`id`, `jumlah_pinjam`, `keperluan_pinjam`, `tgl_pinjam`, `bank_pinjam`, `norek_pinjam`, `pemilik_pinjam`, `jangka_pinjam`, `jasa_pinjam`, `ket_pinjam`, `c_pinjam`, `id_schm`)
    SELECT '', `jumlah_pinjam`, `keperluan_pinjam`, '$tanggaltransfer', `bank_pinjam`, `norek_pinjam`, `pemilik_pinjam`, `jangka_pinjam`, `jasa_pinjam`, '1', `c_pinjam`, `id_schm` FROM pinjam_them WHERE id='$acuan'";
    $query=mysqli_query($koneksi,$copy);

    if ($query){
      $sql="DELETE FROM pinjam_them where id='$acuan'";
    	$hapus=mysqli_query($koneksi,$sql);

      if ($hapus){
    	  echo "<script>alert('Pinjaman Berhasil Aprove');location.href='?Data-Peminjaman&&header=Pinjaman'</script>";
      }else{
        echo "<script>alert('POSTING ERORE GASWAT CUY!'); location.href='?Data-Peminjaman&&header=Pinjaman'</script>";
      }
    }else{
      echo "<script>alert('Pinjaman Gagal Aprove'); location.href='?Data-Peminjaman&&header=Pinjaman'</script>";
    }
  }else {
    echo "PAGE NOT FOUND !!!";
  }
?>
