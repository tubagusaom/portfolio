<?php

include "../config/master_koneksi.php";

// $nama = $_POST['image-upload'];
// $kontak = $_POST['kontak'];
// $alamat = $_POST['alamat'];

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','mp4','AVI','WMV','MOV','mkv');
$filename = $_FILES['image-upload']['name'];
$ukuran = $_FILES['image-upload']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

$ekstensi_f =  array('png','jpg','jpeg');
$ekstensi_v =  array('mp4','AVI','WMV','MOV','mkv');

if(in_array($ext,$ekstensi_f)){
    $folder="m-image";
    $jenis_file=1;
}elseif(in_array($ext,$ekstensi_v)){
    $folder="m-video";
    $jenis_file=2;
}

if(!in_array($ext,$ekstensi) ) {
    echo "<script>alert('gagal_ekstensi'); location.href='./'</script>";
}else{
	// if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['image-upload']['tmp_name'], '../assets/'.$folder.'/'.$rand.'_'.$filename);
		mysqli_query($koneksi, "INSERT INTO files VALUES(NULL,'$xx','$jenis_file','$ukuran','$ext')");
		// header("location:./?alert=berhasil");
        echo "<script>alert('berhasil'); location.href='./'</script>";
	// }else{
	// 	// header("location:./?alert=gagal_ukuran");
    //     echo "<script>alert('gagal_ukuran'); location.href='./'</script>";
	// }
}

?>