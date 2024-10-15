<?php
if (isset($_POST['simpan'])){
	date_default_timezone_set('Asia/Jakarta');
	$init		= $_POST['init'];
	$saldo		= $_POST['saldo'];
	$angka		= str_replace(".", "", $saldo);
	$reff		= $_POST['reff'];
	$a_date		= $_POST['a_date'];
	$ket		= $_POST['keterangan'];
	$session	= $_POST['idakun'];
	$date		= date("Y-m-d H:i:s");
	
	$account1	= $_POST['account1'];
	$jenis1		= $_POST['jenis1'];

	$account2	= $_POST['account2'];
	$jenis2		= $_POST['jenis2'];

	$sql1="INSERT INTO `trans_them`(`id`, `init_trans`, `saldo_trans`, `jenis_trans`, `reff_trans`, `ket_trans`, `efv_trans`, `id_schema`, `kd_acount`, `stts_trans`, `c_trans`, `id_akun`) VALUES ('', '$init', '$angka', '$jenis1', '$reff', '$ket', '$a_date', '0', '$account1', '1', '$date', '$session')";
	$query1=mysqli_query($koneksi,$sql1);

	$sql2="INSERT INTO `trans_them`(`id`, `init_trans`, `saldo_trans`, `jenis_trans`, `reff_trans`, `ket_trans`, `efv_trans`, `id_schema`, `kd_acount`, `stts_trans`, `c_trans`, `id_akun`) VALUES ('', '$init', '$angka', '$jenis2', '$reff', '$ket', '$a_date', '0', '$account2', '1', '$date', '$session')";
	$query2=mysqli_query($koneksi,$sql2);

	if ($query1 && $query2){
	echo "<script>location.href='?Input-Jurnal&&header=Jurnal'</script>";}
	else
	{echo "<script>alert('Jurnal Sementara Gagal Ditambahkan'); location.href='?Input-Jurnal&&header=Jurnal'</script>";}
}
?>
