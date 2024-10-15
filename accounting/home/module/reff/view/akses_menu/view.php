
<table>
  <tr>
    <td>
      <a class="btn-link" href="?Akses-Menu&&header=Konfigurasi&&Akses=Addakses">
        <i class="fa fa-plus"></i> Tambah Menu Akses
      </a>
    </td>
  </tr>
</table>

<?php

  if ($_GET['Akses'] =='Addakses') {
    require_once "add.php";
  }else { echo ""; }

  require_once "data.php";
  echo "<br><br>";
?>
