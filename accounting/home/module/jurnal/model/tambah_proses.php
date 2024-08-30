<?php
if (isset($_POST['simpan'])){
	date_default_timezone_set('Asia/Jakarta');
	$init		=$_POST['init'];
	$saldo	=$_POST['saldo'];
	$angka	= str_replace(".", "", $saldo);
	$jenis	=$_POST['jenis'];
	$reff		=$_POST['reff'];
	$a_date	=$_POST['a_date'];
	$ket		=$_POST['keterangan'];
	$account=$_POST['account'];
	$session=$_POST['idakun'];
	$date		=date("Y-m-d H:i:s");

	$sql="INSERT INTO `trans_them`(`id`, `init_trans`, `saldo_trans`, `jenis_trans`, `reff_trans`, `ket_trans`, `efv_trans`, `id_schema`, `kd_acount`, `stts_trans`, `c_trans`, `id_akun`) VALUES ('', '$init', '$angka', '$jenis', '$reff', '$ket', '$a_date', '0', '$account', '1', '$date', '$session')";
	$query=mysqli_query($koneksi,$sql);

	if ($query){
	echo "<script>location.href='?Input-Jurnal&&header=Jurnal'</script>";}
	else
	{echo "<script>alert('Jurnal Sementara Gagal Ditambahkan'); location.href='?Input-Jurnal&&header=Jurnal'</script>";}
}
?>
