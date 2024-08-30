<?php

	if (isset($_POST['simpan']))
	{
		if (isset($_GET['Proses-Edit-Account-Master'])) {
			date_default_timezone_set('Asia/Jakarta');
			$hidden	=$_POST['acuan_kode'];
			$kd		=$_POST['kode'];
			$nm		=$_POST['nama'];
			$jn		=$_POST['jenis'];
			$tp		="M";
			$date		=date("Y-m-d H:i:s");
			$sql="UPDATE acount SET desc_acount='$nm',jenis_acount='$jn',type_acount='$tp',stts_acount='2',c_acount='$date' where id='$hidden';";
			$sql.="UPDATE acount SET jenis_acount='$jn',stts_acount='2',c_acount='$date' where type_acount='$kd'";
			$query=mysqli_multi_query($koneksi,$sql);
			if ($query)
			{echo "<script>alert('DATA MASTER ACCOUNT BERHASIL DIUBAH'); location.href='?Data-Account&&header=Account'</script>";}
			else {echo "<script>alert('DATA MASTER ACCOUNT GAGAL DIUBAH'); location.href='?Edit-Account-Master&&header=Account'</script>";}
		}elseif (isset($_GET['Proses-Edit-Account-Sub'])) {
			date_default_timezone_set('Asia/Jakarta');
			$exp	=explode("-",$_POST['type']);
			$hidden	=$_POST['acuan_kode'];
			$kd		=$_POST['kode'];
			$nm		=$_POST['nama'];
			$tp		=$exp[0];
			$date		=date("Y-m-d H:i:s");
			$sql="UPDATE acount SET desc_acount='$nm',type_acount='$tp',stts_acount='2',c_acount='$date' where id='$hidden';";
			$query=mysqli_multi_query($koneksi,$sql);
			if ($query)
			{echo "<script>alert('DATA SUB ACCOUNT BERHASIL DIUBAH'); location.href='?Data-Account&&header=Account'</script>";}
			else {echo "<script>alert('DATA SUB ACCOUNT GAGAL DIUBAH'); location.href='?Edit-Account-Master&&header=Account'</script>";}
		}
	};
?>
