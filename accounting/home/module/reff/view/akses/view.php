
<table>
  <tr>
    <td>
      <a class="btn-link" href="?Hak-Akses&&header=Konfigurasi&&Akses=Addhakakses">
        <i class="fa fa-plus"></i> Tambah Akses
      </a>
    </td>
  </tr>
</table>

<?php

  if ($_GET['Akses'] =='Addhakakses') {
    require_once "add.php";
  }else { echo ""; }

  require_once "data.php";
  echo "<br><br>";
?>
