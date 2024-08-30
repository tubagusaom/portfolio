<?php
  date_default_timezone_set('Asia/Jakarta');
  $date		=date("Y-m-d H:i:s");

  if (isset($_POST['simpanmaster'])) {
    $nama=$_POST['nm'];
    $kode=$_POST['kd'];

    $sql="INSERT INTO report (`id`, `kd_report`, `desc_report`, `type_report`, `stts_report`, `c_report`) VALUES('','$kode','$nama','M','1','$date')";
		$query=mysqli_query($koneksi,$sql);

    if ($query)
		{echo "<script>alert('Master Report Berhasil Ditambahkan'); location.href='?Konfigurasi-Laporan&&header=Laporan&&Report=Master';</script>";}
		else {echo "<script>alert('Master Report Gagal Ditambahkan'); location.href='?Konfigurasi-Laporan&&header=Laporan&&Report=Master'</script>";}
  }
  elseif (isset($_POST['simpansub'])) {
    $nama=$_POST['nm'];
    $kode=$_POST['kd'];
    $master=$_POST['master'];

    $sql="INSERT INTO report (`id`, `kd_report`, `desc_report`, `type_report`, `stts_report`, `c_report`) VALUES('','$kode','$nama','$master','1','$date')";
		$query=mysqli_query($koneksi,$sql);

    if ($query)
		{echo "<script>alert('Sub Report Berhasil Ditambahkan'); location.href='?Konfigurasi-Laporan&&header=Laporan&&Report=Master';</script>";}
		else {echo "<script>alert('Sub Report Gagal Ditambahkan'); location.href='?Konfigurasi-Laporan&&header=Laporan&&Report=Master'</script>";}
  }
  elseif (isset($_POST['simpangroup'])) {
    $acount=$_POST['acount'];
    $kode=$_POST['kd'];
    $report=$_POST['report'];

    $sql="INSERT INTO `report_group`(`id`, `kd_group`, `kd_acount`, `kd_report`, `stts_group`, `c_group`) VALUES('','$kode','$acount','$report','1','$date')";
		$query=mysqli_query($koneksi,$sql);

    if ($query)
		{echo "<script>alert('Group Report Konfigurasi Berhasil Ditambahkan'); location.href='?Konfigurasi-Laporan&&header=Laporan&&Report=Group';</script>";}
		else {echo "<script>alert('Group Report Gagal Ditambahkan'); location.href='?Konfigurasi-Laporan&&header=Laporan&&Report=Group'</script>";}
  }
  elseif (isset($_POST['simpanformula'])) {
    $jenis  =$_POST['jenis'];
    $group  =$_POST['group'];
    $acount =$_POST['acount'];

    $sql="INSERT INTO `report_formula`(`id`, `kd_acount`, `kd_group`, `jenis_formula`, `stts_formula`, `c_formula`) VALUES('','$acount','$group','$jenis','1','$date')";
		$query=mysqli_query($koneksi,$sql);

    if ($query)
		{echo "<script>alert('Data Konfigurasi Formula Berhasil Ditambahkan'); location.href='?Konfigurasi-Laporan&&header=Laporan&&Report=Formula';</script>";}
		else {echo "<script>alert('Data Konfigurasi Formula Gagal Ditambahkan'); location.href='?Konfigurasi-Laporan&&header=Laporan&&Report=Formula'</script>";}
  }
  elseif (isset($_POST['ubahahformula'])) {
    $kode   =$_POST['kodeformula'];
    $jenis  =$_POST['jenis'];
    $group  =$_POST['group'];
    $acount =$_POST['acount'];

    $sql="UPDATE `report_formula` SET kd_acount='$acount',kd_group='$group',jenis_formula='$jenis',stts_formula=2 where id='$kode'";
		$query=mysqli_query($koneksi,$sql);
		if ($query)
		{echo "<script>alert('Data Konfigurasi Formula Berhasil Diubah'); location.href='?Konfigurasi-Laporan&&header=Laporan&&Report=Formula'</script>";}
		else {echo "<script>alert('Data Konfigurasi Formula Gagal Diubah'); location.href='?Konfigurasi-Laporan&&header=Laporan&&Report=Formula'</script>";}
  }
?>
