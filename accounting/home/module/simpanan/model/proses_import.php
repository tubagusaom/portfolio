<?php
if (isset($_POST['import-shu'])){
  $fileexcel=$_POST['fileexcel'];
  foreach($_POST['kdschm'] as $key => $value){
    date_default_timezone_set('Asia/Jakarta');
    $periode	=$_POST['periode'];
    $saldo	=$_POST['shu'][$key];
    $angka	= str_replace(",", "", $saldo);
    $date	=date("Y-m-d H:i:s");
      if($value){
          $sql="INSERT INTO `shu`(`id`, `value_shu`, `periode_shu`, `c_shu`, `id_schm`) VALUES ('', '$angka', '$periode', '$date', '$value')";
          $query=mysqli_query($koneksi,$sql);

          if ($query){
            unlink($fileexcel);
            echo "<script>alert('DATA SHU PERIODE $periode BERHASIL DIIMPORT'); location.href='?Import-SHU&&header=Simpanan';</script>";}
          else
            {echo "<script>alert('DATA SHU PERIODE $periode GAGAL Diimport'); location.href='?Import-SHU&&header=Simpanan'</script>";}
      }
  }
}
?>
