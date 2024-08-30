<?php
  date_default_timezone_set('Asia/Jakarta');
  $date	=date("Y-m-d H:i:s");
  $ket=3;
  $a=$_POST['ssr'];
  $ssrela= str_replace(".", "", $a);
  $b=$_POST['jumpen'];
  $penarikan= str_replace(".", "", $b);
  $c=$_POST['kode'];
  $d=$_POST['kodea'];
  $e=$_POST['namaa'];
  $f=$_POST['tglp'];

  // echo $date;

  // if ($penarikan > $ssrela) {
  //   echo "<script>alert('Saldo Tidak Mencukupi....!!'); location.href='?Detail-Simpanan&&header=Simpanan&&kode=$c&&kodea=$d&&namaa=$e'</script>";
  // }
  // else{
    $sql="INSERT INTO `trans_ambil`(`id`, `jumlah_ambil`, `stts_ambil`, `efv_ambil`, `c_ambil`, `id_schm`) VALUES ('', '$penarikan', '$ket', '$f', '$date', '$c')";
    $query=mysqli_query($koneksi,$sql);
  //
    if ($query){
      echo "<script>alert('PENARIKAN SEDANG DIPROSES....!!'); location.href='?Profile-Simpanan&&header=Profile'</script>";
    }else {
      echo "<script>alert('PENARIKAN GAGAL DIPROSES....!!'); location.href='?Profile-Simpanan&&header=Profile'</script>";
    }
  // }
?>
