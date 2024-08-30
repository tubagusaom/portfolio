<?php
  if ( ! defined('BASEPATH')) exit('Tidak ada akses skrip langsung yang diizinkan');

  // test();
  // echo $_SESSION['akses'];
  if (isset($_SESSION['akses'])) {
    $akses = $this_login->akses($_SESSION['akses']);
    // var_dump($akses); die();

    if ($akses=='superuser') {
      $_MODULE[]="user";
      $_MODULE[]="account";
      $_MODULE[]="company";
      $_MODULE[]="divisi";
      $_MODULE[]="akun";
      $_MODULE[]="department";
      $_MODULE[]="lokasi";
      $_MODULE[]="simpanan";
      $_MODULE[]="pinjaman";
      $_MODULE[]="penagihan";
      $_MODULE[]="penyelesaian";
      $_MODULE[]="jurnal";
      $_MODULE[]="laporan";
      $_MODULE[]="reff";
      $_MODULE[]="profile";
    }elseif ($akses=='ketua') {
      $_MODULE[]="user";
      $_MODULE[]="reff";
      $_MODULE[]="account";
      $_MODULE[]="company";
      $_MODULE[]="akun";
      $_MODULE[]="department";
      $_MODULE[]="lokasi";
      $_MODULE[]="simpanan";
      $_MODULE[]="pinjaman";
      $_MODULE[]="penagihan";
      $_MODULE[]="penyelesaian";
      $_MODULE[]="jurnal";
      $_MODULE[]="laporan";
      $_MODULE[]="profile";
    }

    // Sekertaris 1 dan Sekertaris 2
    elseif ($akses=='admin' OR $akses=='sekertaris') {
      $_MODULE[]="department";
      $_MODULE[]="lokasi";
      $_MODULE[]="akun";
      $_MODULE[]="simpanan";
      $_MODULE[]="pinjaman";
      $_MODULE[]="penyelesaian";
      $_MODULE[]="reff";
      $_MODULE[]="profile";
    }

    // Bendahara 1
    elseif ($akses=='akunting') {
      $_MODULE[]="account";
      $_MODULE[]="simpanan";
      $_MODULE[]="pinjaman";
      $_MODULE[]="penagihan";
      $_MODULE[]="penyelesaian";
      $_MODULE[]="jurnal";
      $_MODULE[]="laporan";
      $_MODULE[]="reff";
      $_MODULE[]="profile";
    }

    // Bendahara 2
    elseif ($akses=='analis') {
      $_MODULE[]="simpanan";
      $_MODULE[]="pinjaman";
      $_MODULE[]="penagihan";
      $_MODULE[]="penyelesaian";
      $_MODULE[]="reff";
      $_MODULE[]="profile";
    }

    // pengawas / analis
    elseif ($akses=='pengawas') {
      $_MODULE[]="laporan";
      $_MODULE[]="reff";
      $_MODULE[]="profile";
    }

    // Panitia Kredit
    elseif ($akses=='kredit') {
      $_MODULE[]="akun";
      $_MODULE[]="simpanan";
      $_MODULE[]="pinjaman";
      $_MODULE[]="penyelesaian";
      $_MODULE[]="reff";
      $_MODULE[]="profile";
    }

    // anggota koperasi
    elseif ($akses=='anggota') {
      $_MODULE[]="profile";
    }

  }
?>
