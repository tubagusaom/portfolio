<?php
  if (isset($_GET['Proses-Ubah-Password'])) {
    $hidden=$_POST['id'];

		$date	=date("Y-m-d H:i:s");

    if ($akses == 'superuser') {
      $paws='bismillahhirrahmanirrahim';
      $pwasli = "";
      $texttb1 = 'ho ho ho ho ;p';
    }else{
      $paws=$_POST['pws'];
      $pwasli = $_POST['pws'];
      $texttb1 = 'Minimal 5 karakter';
    }
    $pass = md5($paws);

    // echo $pwasli;

    if ((strlen($paws)) < 5){
      echo "<script>alert('$texttb1'); location.href='?Detail-Akun&&header=User';</script>";
    }
    elseif ((strlen($paws)) > 30){
      echo "<script>alert('Maximal 20 karakter'); location.href='?Detail-Akun&&header=User';</script>";
    }
    else{
      $sqlu ="UPDATE user SET pw_user='$pass',pw_asli='$pwasli',c_user='$date' WHERE id = '$hidden'";
      $query=mysqli_query($koneksi,$sqlu);
    }

    if ($query)
    {echo "<script>alert('Password Berhasil Diubah, silahkan login menggunakan password baru'); location.href='?Logout';</script>";}
    else {echo "<script>alert('Password Gagal Diubah'); location.href='?Detail-Akun&&header=User'</script>";}
  }
?>
