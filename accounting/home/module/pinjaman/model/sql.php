<?php
  if (isset($_POST['idper'])) {
    require_once "../../../model/config/master_koneksi.php";
    $idschm = $_POST['idper'];

    $sql	= mysqli_query($koneksi,"SELECT * FROM schm WHERE id = $idschm");
    $data = mysqli_fetch_array($sql);

    // echo $data = $data['bank_schm'];
    // echo $data['norek_schm'];
    // echo $data['pemilik_schm'];

    echo '
      <tr>
        <td style="border-top:2px solid #999"></td>
        <td style="border-top:2px solid #999">
          <input type="text" name="nabank" id="nabank" value="'. $data = $data['bank_schm'] .'" placeholder="nama bank" required oninvalid="this.setCustomValidity("Silahkan Masukan Nama Bank")" oninput="setCustomValidity("")">
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="text" name="norek" id="norek" value="'. $data = $data['norek_schm'] .'" placeholder="No Rekening" required oninvalid="this.setCustomValidity("Silahkan Masukan No Rekening")" oninput="setCustomValidity("")">
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="text" name="napem" id="napem" value="'. $data = $data['pemilik_schm'] .'" placeholder="Nama Pemilik" required oninvalid="this.setCustomValidity(Silahkan Masukan Nama Pemilik)" oninput="setCustomValidity("")">
        </td>
      </tr>
    ';

  }exit;

  var_dump($data); die();
?>
