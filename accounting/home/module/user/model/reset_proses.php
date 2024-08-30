<?php
  if (isset($_GET['Reset-Password'])) {
    $hidden=$_GET['id'];

    $sqlu ="UPDATE user SET pw_user=md5('koperasi'),pw_asli='koperasi' WHERE id = '$hidden'";
    $query=mysqli_query($koneksi,$sqlu);

    if ($query)
    {echo "<script>alert('Password Berhasil Direset'); location.href='?Data-User&&header=User';</script>";}
    else {echo "<script>alert('Password Gagal Direset'); location.href='?Data-User&&header=User'</script>";}
  }
?>
