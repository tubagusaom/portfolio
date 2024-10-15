
<table>
  <tr>
    <td>
      <a href="?Toolbar&&header=Konfigurasi&&Toolbars=Addacl">
        <input type="button" name="simpan" value="Tambah Toolbar" style="width: 100%;">
      </a>
    </td>
  </tr>

</table>

<?php

  if ($_GET['Toolbars'] =='Addacl') {
    require_once "proses.php";
  }else { echo ""; }

  require_once "data.php";
  echo "<br><br>";
?>
