<?php
  if (isset($_POST['kirim'])){
    $sqlus  ="UPDATE schm SET ket_schm='2' where stts_schm NOT LIKE '3' AND stts_schm NOT LIKE '4' AND stts_schm NOT LIKE '5' AND stts_schm NOT LIKE '6' AND ket_schm NOT LIKE '2'";
    $queryus=mysqli_query($koneksi,$sqlus);

    if ($queryus){
      echo "<script>alert('Penagihan Sudah Dikirim'); location.href='?Data-Penagihan&&header=Penagihan'</script>";
    }else{
      echo "<script>alert('Penagihan Gagal Dikirim'); location.href='?Data-Penagihan&&header=Penagihan'</script>";
    }
  }

// -----------------------------------------------------------------------------------
  else if (isset($_POST['aprove'])){
    date_default_timezone_set('Asia/Jakarta');
    $date	=date("Y-m-d H:i:s");
    $tape	=$_POST['tape'];

    $copy="INSERT INTO `trans_simpan`(`id`, `p_simpan`, `w_simpan`, `s_simpan`, `stts_simpan`, `efv_simpan`, `c_simpan`, `id_schm`)
    SELECT
      '',
      IF(MAX(`trans_simpan`.`id`) IS NULL,`schm`.`p_schm`,0) AS pokok,
      `schm`.`w_schm` AS wajib,
      `schm`.`s_schm` AS sukarela,
      '1',
      '$tape',
      '$date',
      `schm`.`id` AS IDSCHM
      FROM `schm`
      LEFT JOIN `trans_simpan` ON `schm`.`id`=`trans_simpan`.`id_schm`
      WHERE
        `schm`.`stts_schm` NOT LIKE '3' AND
        `schm`.`stts_schm` NOT LIKE '4' AND
        `schm`.`stts_schm` NOT LIKE '5' AND
        `schm`.`stts_schm` NOT LIKE '6'
        GROUP BY `schm`.`id`

      ";
    $querycopy=mysqli_query($koneksi,$copy);

    $sql="SELECT
              `pinjam`.`id` AS IDPINJAM,
              `pinjam`.`jangka_pinjam` AS JANGKA,
              IF(MAX(`trans_pinjam`.`id`) IS NULL,1,COUNT(`trans_pinjam`.`id`)+1) AS ANGSUR
          FROM
              `pinjam`
          LEFT JOIN `trans_pinjam` ON `pinjam`.`id` = `trans_pinjam`.`id_pinjam`
          WHERE
              `pinjam`.`ket_pinjam` NOT LIKE '2' AND
              `pinjam`.`ket_pinjam` NOT LIKE '3' AND
              `pinjam`.`ket_pinjam` NOT LIKE '4'
              GROUP BY IDPINJAM
            ";

    $query	=mysqli_query($koneksi,$sql);
    while($data=mysqli_fetch_array($query)){
      if ($data['ANGSUR']==$data['JANGKA']) {
        $sqltp="INSERT INTO `trans_pinjam`(`id`, `angsur_pinjam`, `jenis_pinjam`, `c_pinjam`, `id_pinjam`, `efv_pinjam`) VALUES ('', '$data[ANGSUR]', 'angsuran', '$date', '$data[IDPINJAM]', '$tape')";
        $querytp=mysqli_query($koneksi,$sqltp);
        if ($querytp) {
          $sqlus="UPDATE pinjam SET ket_pinjam='3' where id='$data[IDPINJAM]'";
          $queryus=mysqli_query($koneksi,$sqlus);
        }
      }else{
        $sqltp="INSERT INTO `trans_pinjam`(`id`, `angsur_pinjam`, `jenis_pinjam`, `c_pinjam`, `id_pinjam`, `efv_pinjam`) VALUES ('', '$data[ANGSUR]', 'angsuran', '$date', '$data[IDPINJAM]', '$tape')";
        $querytp=mysqli_query($koneksi,$sqltp);
      }
    }

    $sqluschm  ="UPDATE schm SET ket_schm='1' where stts_schm NOT LIKE '3' AND stts_schm NOT LIKE '4' AND stts_schm NOT LIKE '5' AND stts_schm NOT LIKE '6' AND ket_schm NOT LIKE '1'";
    $queryuschm=mysqli_query($koneksi,$sqluschm);

    if ($querycopy AND $queryuschm OR $querytp){
      echo "<script>alert('Penagihan Sudah Aprove'); location.href='?Data-Penagihan&&header=Penagihan';</script>";
    }else{
      echo "<script>alert('Penagihan Gagal Aprove'); location.href='?Data-Penagihan&&header=Penagihan';</script>";
    }

  }
?>
