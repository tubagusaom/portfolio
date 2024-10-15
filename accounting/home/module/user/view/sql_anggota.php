<?php
  require_once "../../../model/config/master_koneksi.php";
  $idakses = $_POST['get_option'];

  if ($idakses === '66') {
    $sql="SELECT akun.id,akun.nm_akun
      FROM akun
      LEFT JOIN user ON akun.id = user.id_akun
      WHERE akun.stts_user = '0' AND
            akun.stts_akun NOT LIKE '3' AND
            akun.stts_akun NOT LIKE '4' AND
            akun.stts_akun NOT LIKE '5' AND
            akun.stts_akun NOT LIKE '6' OR
            user.stts_user='3'
      ORDER BY akun.nm_akun ASC";
  }else {
    $sql="SELECT akun.id,akun.nm_akun
      FROM akun
      LEFT JOIN user ON akun.id = user.id_akun
      WHERE
            akun.stts_user = '0' AND
            akun.stts_akun NOT LIKE '3' AND
            akun.stts_akun NOT LIKE '4' AND
            akun.stts_akun NOT LIKE '5' AND
            akun.stts_akun NOT LIKE '6' OR
            -- user.id_akun is NULL
            -- user.id_akun NOT IN
            --   (SELECT kd_user FROM t_user_role
            --     WHERE
            --     kd_role NOT LIKE '66'
            --   )

            -- akun.stts_user = '1' AND
            -- user.stts_user NOT LIKE '1' AND
            user.stts_user='3'
      ORDER BY akun.nm_akun ASC";
  }

  $query=mysqli_query($koneksi,$sql);

  // echo $data;
  echo "<option selected value=''>-</option>";
  while($data=mysqli_fetch_array($query))
  {
    echo "<option value='$data[id]'>$data[nm_akun]</option>";
  }
  exit;
  // var_dump($data); die();
?>
