<script language="JavaScript" type="text/javascript">
    function checkform ( form )
    {
      if (form.report.value == "") {
        alert( "Pilih Kode Report.!!" );
        form.report.focus();
        return false ;
      }else if (form.acount.value == "") {
        alert( "Pilih Acount.!!" );
        form.acount.focus();
        return false ;
      }
      return true ;
    }
</script>

<?php //urutan

$sql_kg=mysqli_query($koneksi,"SELECT `kd_group` FROM `report_group` order by kd_group DESC");
$data_kg=mysqli_fetch_array($sql_kg);

$croop=substr($data_kg[0],1);

if ($croop==0){
	$urutan="G"."0001";
}elseif ($croop<9){
	$jum=$croop+1;
	$urutan="G"."000".$jum;
}elseif ($croop<99){
	$jum=$croop+1;
	$urutan="G"."00".$jum;
}elseif ($croop<999){
	$jum=$croop+1;
	$urutan="G"."0".$jum;
}elseif ($croop>=999){
  $jum=$croop+1;
	$urutan="G".$jum;}
?>

<form class="" action="?Proses-Tambah" method="post" onsubmit="return checkform(this);">
<table>
  <tr>
    <td colspan="5">
      <a href="?Konfigurasi-Laporan&&header=Laporan&&Report=Group&&Plus=Group">
        <input type="button" name="" value="Tambah Group">
      </a>

      <a href="?Konfigurasi-Laporan&&header=Laporan&&Report=Group">
        <input type="button" name="" value="Batal" class="bback">
      </a>
    </td>
  </tr>

  <tr align="center">
  	<th width="2%">No</th>
  	<th>Master Report</th>
  	<th>Kode Acount</th>
    <th width="8%">-</th>
  </tr>

  <?php  if (isset($_GET['Plus'])) {  ?>
  <tr>
    <td align="center"><font class="fa fa-plus-square"></font></td>
    <td>
      <input type="hidden" name="kd" value="<?php echo "$urutan"; ?>">
      <select class="" name="report">
        <option value="" selected style="font-weight:700">- Report -</option>
        <?php
          $sqlr	  ="SELECT `kd_report`, `desc_report`, `type_report` FROM `report` WHERE type_report NOT LIKE 'M' AND `stts_report` NOT LIKE '3' ORDER BY id ASC";
          $queryr	=mysqli_query($koneksi,$sqlr);
          while($datar=mysqli_fetch_array($queryr)){
            $sqlrr	  ="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report = '$datar[2]'";
            $queryrr	=mysqli_query($koneksi,$sqlrr);
            $datarr=mysqli_fetch_array($queryrr);

            echo "<option value='$datar[0]'>$datarr[1] - $datar[1]</option>";
          }
        ?>
      </select>
    </td>
    <td style="padding-right:50px">
      <select class="" name="acount">
        <option value="" selected style="font-weight:700">- Acount -</option>
        <?php
          $sqla	  ="SELECT `kd_acount`, `desc_acount`, `type_acount` FROM acount WHERE stts_acount NOT LIKE '3' ORDER BY kd_acount ASC";
          $querya	=mysqli_query($koneksi,$sqla);
          while($dataa=mysqli_fetch_array($querya)){
            if(fmod($dataa['type_acount'], 2)==M){
              $font='0';
            }else{
              $font='700';
            }

            echo "<option value='$dataa[0]' style='font-weight:$font'>$dataa[0] - $dataa[1]</option>";
          }
        ?>
    </td>
    <td><input type="submit" name="simpangroup" value="simpan group"></td>
  </tr>
  <?php } ?>

  <?php
    $sqlsubreport	  ="SELECT `kd_report`, `desc_report`, `type_report` FROM `report` WHERE type_report NOT LIKE 'M'";
    $querysubreport	=mysqli_query($koneksi,$sqlsubreport);
    while($datasubreport=mysqli_fetch_array($querysubreport)){

      $sqlmreport	  ="SELECT `kd_report`, `desc_report` FROM `report` WHERE kd_report = '$datasubreport[2]'";
      $querymreport	=mysqli_query($koneksi,$sqlmreport);
      $datamreport  =mysqli_fetch_array($querymreport);
  ?>

  <tr>
    <td align="center"><b>-</b></td>
    <td colspan="4">
      <b><?php echo "$datamreport[1] - $datasubreport[1]"; ?></b>
    </td>
  </tr>

  <?php
    $no=1;
		$sqlgroup	  ="SELECT `id`, `kd_group`, `kd_acount`, `kd_report`, `stts_group`, `c_group` FROM `report_group` WHERE `stts_group` NOT LIKE '3' AND kd_report = '$datasubreport[0]' ORDER BY id ASC";
		$querygroup	=mysqli_query($koneksi,$sqlgroup);
		while($datagroup=mysqli_fetch_array($querygroup)){
			if(fmod($no,2)==1)
			{$warna="ghostwhite";}
			else
			{$warna="whitesmoke";}

      $sqlacount	  ="SELECT `kd_acount`, `desc_acount` FROM acount WHERE `kd_acount` = '$datagroup[2]'";
      $queryacount	=mysqli_query($koneksi,$sqlacount);
      $dataacount   =mysqli_fetch_array($queryacount);
	?>

  <tr class="hover" bgcolor="<?php echo $warna; ?>">
    <td align="center"><?php echo "$no"; ?></td>
    <td style="padding-left:20px"><?php echo "$datamreport[1] - $datasubreport[1]"; ?></td>
    <td style="padding-left:20px"><?php echo "$dataacount[0] - $dataacount[1]"; ?></td>
    <td align="center">Edit | Hapus</td>
  </tr>

<?php $no++;}}; ?>
</table>
</form>
