<?php
  if (isset($_POST['idper'])) {
    require_once "../../../model/config/master_koneksi.php";
    $idanggota = $_POST['idper'];

    $sql	= mysqli_query($koneksi,"SELECT almt_akun FROM akun WHERE id = $idanggota");
    $data = mysqli_fetch_array($sql);

    echo $data['almt_akun'];

  }exit;

  // var_dump($data); die();
?>
