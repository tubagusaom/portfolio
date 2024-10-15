<select id="divi" name="divisi" required oninvalid="this.setCustomValidity('Silahkan Pilih Bisnis Unit')" oninput="setCustomValidity('')">
  <option value="" selected>-</option>
  <?php

  if (isset($_POST['idper'])) {
    require_once "../../../model/config/master_koneksi.php";

    $idper=$_POST['idper'];
    // echo $id;
    // var_dump($id); die();

    $sql_dvv   = "select * from divisi WHERE kd_comp != '' AND kd_comp = '".$idper."' AND stts_divisi NOT LIKE '3'";
    $query_dvv = mysqli_query($koneksi,$sql_dvv);

    while($datadvv=mysqli_fetch_array($query_dvv))
    {
      echo "<option value='$datadvv[0]'>$datadvv[1]</option>";
    }
  }
  ?>
</select>
