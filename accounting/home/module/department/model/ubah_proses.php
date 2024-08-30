<?php

	if (isset($_POST['simpan']))
	{
		date_default_timezone_set('Asia/Jakarta');
		$hidden	=$_POST['acuan_kode'];
		$nm			=$_POST['nama'];
		$date		=date("Y-m-d H:i:s");
		$sql="UPDATE dept SET nm_dept='$nm',stts_dept=1,c_dept='$date' where id='$hidden'";
		$query=mysqli_query($koneksi,$sql);
		if ($query)
		{echo "<script>alert('DATA DEPARTMENT BERHASIL DIUBAH'); location.href='?Data-Department&&header=DEPARTMENT'</script>";}
		else {echo "<script>alert('DATA DEPARTMENT GAGAL DIUBAH'); location.href='?Edit-Department&&header=DEPARTMENT'</script>";}
	};
?>
