
<table>
  <tr>
    <td>
      <a class="btn-link" href="?Menu&&header=Konfigurasi&&Akses=Adddir">
        <i class="fa fa-plus"></i> Tambah Menu
      </a>
    </td>
  </tr>
</table>

<?php

  if ($_GET['Akses'] == 'Adddir') {
    require_once "add.php";
  }
  else { echo ""; }

  require_once "data.php";
  echo "<br><br>";
?>
