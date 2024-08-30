<table>
  <tr>
    <td><h1>Konfigurasi Laporan</h1></td>
  </tr>

  <tr>
    <td>
      <a href="?Konfigurasi-Laporan&&header=Laporan&&Report=Formula">
        <input type="button" name="" value="Formula Report" class="export">
      </a>

      <a href="?Konfigurasi-Laporan&&header=Laporan&&Report=Group">
        <input type="button" name="" value="Group Report" class="export">
      </a>

      <a href="?Konfigurasi-Laporan&&header=Laporan&&Report=Master">
        <input type="button" name="" value="Master Report" class="export">
      </a>
    </td>
  </tr>

<?php if (isset($_GET['Report'])) { ?>
  <tr>
    <th style="color:#fff" align="center">
      <?php echo $report=$_GET['Report']; ?> Report
    </th>
  </tr>

  <tr>
    <td>
      <?php
        if ($_GET['Report']=='Master') {
          include "module/laporan/view/conf_master.php";
        }
        elseif ($_GET['Report']=='Group') {
          include "module/laporan/view/conf_group.php";
        }
        elseif ($_GET['Report']=='Formula') {
          include "module/laporan/view/conf_formula.php";
        }
      ?>
    </td>
  </tr>


<?php } ?>
</table>
