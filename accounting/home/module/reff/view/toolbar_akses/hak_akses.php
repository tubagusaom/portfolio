
<table>
  <tr>
    <td>
      <a href="?Hak-Akses&&header=Konfigurasi&&Akses=Addhakakses">
        <input type="button" name="simpan" value="Akses" style="width: 100%;">
      </a>
    </td>
  </tr>

  <tr>
    <td>
      <a href="?Hak-Akses&&header=Konfigurasi&&Akses=Adddir">
        <input type="button" name="simpan" value="Menu" style="width: 100%;">
      </a>
    </td>
  </tr>

  <tr>
    <td>
      <a href="?Hak-Akses&&header=Konfigurasi&&Akses=Addakses">
        <input type="button" name="simpan" value="Akses Menu" style="width: 100%;">
      </a>
    </td>
  </tr>

  <tr>
    <td>
      <a href="?Hak-Akses&&header=Konfigurasi&&Akses=Addacl">
        <input type="button" name="simpan" value="Toolbar" style="width: 100%;">
      </a>
    </td>
  </tr>

  <tr>
    <td>
      <a href="?Hak-Akses&&header=Konfigurasi&&Akses=Addakses">
        <input type="button" name="simpan" value="Toolbar Menu" style="width: 100%;">
      </a>
    </td>
  </tr>

  <tr>
    <td>
      <a href="?Hak-Akses&&header=Konfigurasi&&Akses=Addacl">
        <input type="button" name="simpan" value="Toolbar Akses" style="width: 100%;">
      </a>
    </td>
  </tr>

</table>

<?php

  if ($_GET['Akses'] =='Addakses') {
    require_once "akses_menu.php";
    require_once "data_ha.php";
  }else { echo ""; }

  if ($_GET['Akses'] == 'Adddir') {
    require_once "dir.php";
    require_once "data_dir.php";
  }else { echo ""; }

  if ($_GET['Akses'] =='Addhakakses') {
    require_once "akses.php";
    require_once "data_akses.php";
  }else { echo ""; }

  if ($_GET['Akses'] =='Addacl') {
    require_once "acl.php";
    require_once "data_acl.php";
  }else { echo ""; }

  if ($_GET['Akses'] == 'Editakses') {
    require_once "ubah_akses.php";
  }else { echo ""; }

  echo "<br><br>";
?>
