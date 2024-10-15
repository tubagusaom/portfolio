<script language="JavaScript" type="text/javascript">
    function checkform ( form )
    {
      if (form.jenis.value == "") {
        alert( "Pilih Jenis Formula.!!" );
        form.jenis.focus();
        return false ;
      }
			else if (form.group.value == "") {
        alert( "Pilih Acount Group.!!" );
        form.group.focus();
        return false ;
      }
      else if (form.acount.value == "") {
        alert( "Pilih Acount.!!" );
        form.acount.focus();
        return false ;
      }
      return true ;
    }
</script>

<form class="" action="?Proses-Tambah" method="post" onsubmit="return checkform(this);">
<table>
  <tr>
    <td colspan="5">
      <a href="?Konfigurasi-Laporan&&header=Laporan&&Report=Formula&&Plus=Formula">
        <input type="button" name="" value="Tambah Formula">
      </a>

      <a href="?Konfigurasi-Laporan&&header=Laporan&&Report=Formula">
        <input type="button" name="" value="Batal" class="bback">
      </a>
    </td>
  </tr>

  <tr align="center">
  	<th width="2%">No</th>
    <th>Jenis</th>
    <th>Acount Group</th>
  	<th>Kd Acount</th>
    <th width="8%">-</th>
  </tr>

  <?php  if (isset($_GET['Plus'])) {  ?>
    <!-- start tambah formula -->
  <tr>
    <td align="center"><font class="fa fa-plus-square"></font></td>
    <td>
      <select class="" name="jenis">
        <option value="" selected style="font-weight:700">-</option>
        <option value="D">Debit</option>
        <option value="K">Kredit</option>
      </select>
    </td>
    <td style="padding-right:50px">
      <select class="" name="group">
        <option value="" selected style="font-weight:700">- Acount Group -</option>
        <?php
          $sqlg	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE `stts_group` NOT LIKE '3' ORDER BY kd_report ASC";
          $queryg	=mysqli_query($koneksi,$sqlg);
          while($datag=mysqli_fetch_array($queryg)){

            $sqlga	  ="SELECT `kd_acount`, `desc_acount` FROM acount WHERE kd_acount = $datag[1]";
            $queryga	=mysqli_query($koneksi,$sqlga);
            $dataga   =mysqli_fetch_array($queryga);

            $sqlgs	  ="SELECT `desc_report`, `type_report` FROM report WHERE kd_report = $datag[2]";
            $querygs	=mysqli_query($koneksi,$sqlgs);
            $datags   =mysqli_fetch_array($querygs);

            $sqlgss	  ="SELECT `desc_report`, `type_report` FROM report WHERE kd_report = $datags[1]";
            $querygss	=mysqli_query($koneksi,$sqlgss);
            $datagss   =mysqli_fetch_array($querygss);

            echo "<option value='$datag[0]'>$datagss[0] - $datags[0] - $dataga[0] - $dataga[1]</option>";
          }
        ?>
    </td>
    <td style="padding-right:50px">
      <select class="" name="acount">
        <option value="" selected style="font-weight:700">- Acount -</option>
        <?php
          $sqla	  ="SELECT `kd_acount`, `desc_acount` FROM acount WHERE type_acount NOT LIKE 'M' AND stts_acount NOT LIKE '3' ORDER BY kd_acount ASC";
          $querya	=mysqli_query($koneksi,$sqla);
          while($dataa=mysqli_fetch_array($querya)){
            echo "<option value='$dataa[0]'>$dataa[0] - $dataa[1]</option>";
          }
        ?>
    </td>
    <td><input type="submit" name="simpanformula" value="simpan formula"></td>
  </tr>
  <!-- end tambah formula -->

<?php }if (isset($_GET['Edit'])) { ?>
  <!-- start edit formula -->
  <tr>
    <td align="center"><font class="fa fa-pencil-square-o"></font></td>
    <td>
      <input type="hidden" name="kodeformula" value="<?php echo "$_GET[idf]" ?>">
      <select name="jenis">
        <option value="<?php echo $_GET['jenis']; ?>" selected style="font-weight:700">
          <?php
            if ($_GET['jenis']=='D') {
              echo "Debit";
            }else {
              echo "Kredit";
            }
          ?>
        </option>
        <option value="D">Debit</option>
        <option value="K">Kredit</option>
      </select>
    </td>
    <td style="padding-right:50px">
      <select class="" name="group">
        <option value="<?php echo "$_GET[kdgroup]"; ?>" selected style="font-weight:700"><?php echo "$_GET[perubahangroup]"; ?></option>
        <?php
          $sqlg	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE `stts_group` NOT LIKE '3' ORDER BY kd_report ASC";
          $queryg	=mysqli_query($koneksi,$sqlg);
          while($datag=mysqli_fetch_array($queryg)){

            $sqlga	  ="SELECT `kd_acount`, `desc_acount` FROM acount WHERE kd_acount = $datag[1]";
            $queryga	=mysqli_query($koneksi,$sqlga);
            $dataga   =mysqli_fetch_array($queryga);

            $sqlgs	  ="SELECT `desc_report`, `type_report` FROM report WHERE kd_report = $datag[2]";
            $querygs	=mysqli_query($koneksi,$sqlgs);
            $datags   =mysqli_fetch_array($querygs);

            $sqlgss	  ="SELECT `desc_report`, `type_report` FROM report WHERE kd_report = $datags[1]";
            $querygss	=mysqli_query($koneksi,$sqlgss);
            $datagss   =mysqli_fetch_array($querygss);

            echo "<option value='$datag[0]'>$datagss[0] - $datags[0] - $dataga[0] - $dataga[1]</option>";
          }
        ?>
    </td>
    <td style="padding-right:50px">
      <select class="" name="acount">
        <option value="<?php echo $_GET['kdacount'] ?>" selected style="font-weight:700"><?php echo "$_GET[kdacount] - $_GET[perubahanacount]"; ?></option>
        <?php
          $sqla	  ="SELECT `kd_acount`, `desc_acount` FROM acount WHERE type_acount NOT LIKE 'M' AND stts_acount NOT LIKE '3' ORDER BY kd_acount ASC";
          $querya	=mysqli_query($koneksi,$sqla);
          while($dataa=mysqli_fetch_array($querya)){
            echo "<option value='$dataa[0]'>$dataa[0] - $dataa[1]</option>";
          }
        ?>
    </td>
    <td><input type="submit" name="ubahahformula" value="Ubah formula"></td>
  </tr>
  <!-- end edit formula -->
  <?php } ?>

  <?php
      $sqlgroup	  ="SELECT `kd_group`, `kd_acount`, `kd_report` FROM `report_group` WHERE `stts_group` NOT LIKE '3' ORDER BY kd_report ASC";
      $querygroup	=mysqli_query($koneksi,$sqlgroup);
      while($datagroup=mysqli_fetch_array($querygroup)){

        // sub report
        $sqlsreport	  ="SELECT `desc_report`, `type_report` FROM report WHERE `kd_report` = '$datagroup[2]'";
        $querysreport	=mysqli_query($koneksi,$sqlsreport);
        $datasreport  =mysqli_fetch_array($querysreport);

        // master report
        $sqlmreport	  ="SELECT `desc_report` FROM report WHERE `kd_report` = '$datasreport[1]'";
        $querymreport	=mysqli_query($koneksi,$sqlmreport);
        $datamreport  =mysqli_fetch_array($querymreport);

        // acount group
        $sqlacountg	  ="SELECT `desc_acount` FROM acount WHERE `kd_acount` = '$datagroup[1]'";
        $queryacountg	=mysqli_query($koneksi,$sqlacountg);
        $dataacountg  =mysqli_fetch_array($queryacountg);
  ?>

  <tr>
    <td align="center">-</td>
    <td colspan="4"><b><?php echo "$datagroup[1] - $datamreport[0] - $datasreport[0] - $dataacountg[0]"; ?></b></td>
  </tr>

  <?php
    $no=1;
    $sql	  ="SELECT `kd_acount`, `kd_group`, `jenis_formula`, `id` FROM `report_formula` WHERE `kd_group` = '$datagroup[0]' ORDER BY kd_acount ASC";
    $query	=mysqli_query($koneksi,$sql);
    while($data=mysqli_fetch_array($query)){
      if(fmod($no,2)==1){
        $warna="ghostwhite";
      }else{
        $warna="whitesmoke";
      }

      // acount formula
      $sqlacountf	  ="SELECT `desc_acount` FROM acount WHERE `kd_acount` = '$data[0]'";
      $queryacountf	=mysqli_query($koneksi,$sqlacountf);
      $dataacountf  =mysqli_fetch_array($queryacountf);
  ?>

  <tr class="hover" bgcolor="<?php echo $warna; ?>">
    <td><?php echo "$no"; ?></td>
    <td>
      <?php
        if ($data[2]=='D') {
          echo "Debit";
        }else {
          echo "Kredit";
        }
      ?>
    </td>
    <td>
      <?php
        echo "$datagroup[1] - $dataacountg[0]";
      ?>
    </td>
    <td>
      <?php
        echo "$data[0] - $dataacountf[0]";
      ?>
    </td>
    <td align="center">
      <a href="?Konfigurasi-Laporan&&header=Laporan&&Report=Formula&&Edit=Formula&&idf=<?php echo $data[3] ?>&&jenis=<?php echo "$data[2]" ?>&&kdgroup=<?php echo $datagroup[0] ?>&&kdacount=<?php echo $data[0] ?>&&perubahangroup=<?php echo "$datamreport[0] - $datasreport[0] - $datagroup[1] - $dataacountg[0]" ?>&&perubahanacount=<?php Echo "$dataacountf[0]" ?>">Edit</a> |
      <a href="?Konfigurasi-Laporan&&header=Laporan&&Report=Formula&&Hapus=Formula">Hapus</a>
    </td>
  </tr>

  <?php $no++; }} ?>
</table>
</form>
