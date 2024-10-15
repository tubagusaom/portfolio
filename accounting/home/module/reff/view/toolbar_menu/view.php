
<table>
  <tr>
    <td>
      <a href="?Toolbar-Menu&&header=Konfigurasi&&Toolbars-Menu=Addtoolbarmenu">
        <input type="button" name="simpan" value="Detail Toolbar Menu" style="width: 100%;">
      </a>
    </td>
  </tr>
</table>

<?php

  if ($_GET['Toolbars-Menu'] =='Addtoolbarmenu') {
    require_once "proses.php";
    require_once "data.php";
  }else { echo ""; }

  echo "<br><br>";
?>
