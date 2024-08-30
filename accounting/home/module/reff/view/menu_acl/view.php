
<table>
  <tr>
    <td>
      <a class="btn-link" href="?Menu-ACL&&header=Konfigurasi&&MenuACL=Addacl">
        <i class="fa fa-plus"></i> Tambah Menu ACL
      </a>
    </td>
  </tr>

</table>

<?php
  if ($_GET['MenuACL'] =='Addacl') {
    require_once "proses.php";
  }else { echo ""; }

  require_once "data.php";
  echo "<br><br>";
?>
