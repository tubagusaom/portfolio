<script language="JavaScript" type="text/javascript">
    function checkform ( form )
    {
			if (form.kd.value == "") {
        alert( "Masukan Kode Report.!!" );
        form.kd.focus();
        return false ;
      }else if (form.nm.value == "") {
        alert( "Masukan Nama Report.!!" );
        form.nm.focus();
        return false ;
      }else if (form.master.value == "") {
        alert( "Pilih Master Report.!!" );
        form.master.focus();
        return false ;
      }
      return true ;
    }
</script>

<form class="" action="?Proses-Tambah" method="post" onsubmit="return checkform(this);">
<table>
  <tr>
    <td colspan="5">
      <a href="?Konfigurasi-Laporan&&header=Laporan&&Report=Master&&Plus=Sub">
        <input type="button" name="" value="Tambah Sub">
      </a>

      <a href="?Konfigurasi-Laporan&&header=Laporan&&Report=Master&&Plus=Master">
        <input type="button" name="" value="Tambah Master">
      </a>

      <a href="?Konfigurasi-Laporan&&header=Laporan&&Report=Master">
        <input type="button" name="" value="Batal" class="bback">
      </a>
    </td>
  </tr>

  <tr align="center">
  	<th width="2%">No</th>
    <th>Kode Report</th>
  	<th>Nama Report</th>
    <th>Type Report</th>
    <th width="8%">-</th>
  </tr>

  <?php
    if (!isset($_GET['Plus'])) {
      echo "";
    }elseif ($_GET['Plus']=='Master') {
  ?>
  <tr>
    <td align="center"><font class="fa fa-plus-square"></font></td>
    <td><input type="text" name="kd" value="" placeholder="max 10 karakter"></td>
    <td style="padding-right:50px"><input type="text" name="nm" value="" placeholder="Nama Master Configurasi"></td>
    <td><input type="text" name="" value="Master" readonly style="background:whitesmoke"></td>
    <td><input type="submit" name="simpanmaster" value="simpan Master"></td>
  </tr>
  <?php }elseif ($_GET['Plus']=='Sub') { ?>
  <tr>
    <td align="center"><font class="fa fa-plus-square"></font></td>
    <td><input type="text" name="kd" value="" placeholder="max 10 karakter"></td>
    <td style="padding-right:50px"><input type="text" name="nm" value="" placeholder="Nama Sub Configurasi"></td>
    <td>
      <select class="" name="master">
        <option value="" style="font-weight:700">- Master Report -</option>
        <?php
          $sqlx	  ="SELECT `kd_report`, `desc_report` FROM `report` WHERE type_report='M' ORDER BY kd_report ASC";
          $queryx	=mysqli_query($koneksi,$sqlx);
          while($datax=mysqli_fetch_array($queryx)){
            echo "<option value='$datax[0]'>$datax[0] - $datax[1]</option>";
          }
        ?>
      </select>
    </td>
    <td><input type="submit" name="simpansub" value="simpan Sub"></td>
  </tr>
  <?php } ?>

  <?php
    $no=1;
    $sql	  ="SELECT `id`, `kd_report`, `desc_report`, `type_report` FROM `report` WHERE type_report='M' AND `stts_report` NOT LIKE '3' ORDER BY id ASC";
    $query	=mysqli_query($koneksi,$sql);
    while($data=mysqli_fetch_array($query)){
      if(fmod($no,2)==1){
        $warna="ghostwhite";
      }else{
        $warna="whitesmoke";
      }
  ?>

  <tr class="hover" bgcolor="<?php echo $warna; ?>">
    <td><?php echo "$no"; ?></td>
    <td style="font-weight:700"><?php echo "$data[1]"; ?></td>
    <td style="font-weight:700"><?php echo "$data[2]"; ?></td>
    <td style="font-weight:700">Master</td>
    <td align="center">Edit | Hapus</td>
  </tr>

  <?php
		$sql_sub	  ="SELECT `id`, `kd_report`, `desc_report`, `type_report` FROM `report` WHERE stts_report NOT LIKE '3' AND type_report = '$data[1]' ORDER BY id ASC";
		$query_sub	=mysqli_query($koneksi,$sql_sub);
		while($data_sub=mysqli_fetch_array($query_sub))
		{$no++;
			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}
	?>

  <tr class="hover" bgcolor="<?php echo $warna; ?>">
    <td><?php echo "$no"; ?></td>
    <td style="padding-left:10px">- <?php echo "$data_sub[1]"; ?></td>
    <td style="padding-left:10px">- <?php echo "$data_sub[2]"; ?></td>
    <td style="padding-left:10px">- Sub</td>
    <td align="center">Edit | Hapus</td>
  </tr>

  <?php
	}
		$no++;};
	?>
</table>
</form>
