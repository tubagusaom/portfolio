<?php

	$base_ = (empty($_SERVER['HTTPS']) OR strtolower($_SERVER['HTTPS']) === 'off') ? 'http' : 'https';
	$base_ .= '://'. $_SERVER['HTTP_HOST'];

	if ($_SERVER['HTTP_HOST'] == "localhost") {
		$base_url = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
	}else{
		$base_url = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $base_);
	}

  $base_home = str_replace('error/','', $base_url).'/';

	// echo $base_home;
?>

<head>
  <title>404 - Halaman Tidak Ditemukan</title>

  <meta name="keywords" content="ERROR, ERROR 404, 404, EROR, HALAMAN, halaman, PAGE, page, error, error 404, eror, PAGE NOT FOUND, page not found, halaman tidak ditemukan" />
  <meta name="description" content="ERROR 404">
  <meta name="author" content="https://www.instagram.com/tera.bytee/">

  <link rel="shortcut icon" href="<?= $base_home.'berkas/images/eror-404.png'?>" type="image/x-icon" />
  <link rel="apple-touch-icon" href="<?=$base_home?>berkas/images/eror-404.png">
  <link rel="stylesheet" type="text/css" href="<?=$base_home?>berkas/css/erors404.css">
  <script src="<?=$base_home?>berkas/js/jquery.min.js"></script>
</head>


<div class="noise"></div>
<div class="overlay"></div>
<div class="terminal">
  <h1>ERROR <span id='fire' class="errorcode">404</span></h1>
  <p class="output">HALAMAN YANG ANDA CARI TIDAK DITEMUKAN, NAMANYA BERUBAH ATAU</p>
  <p style="padding-left:23px">TIDAK TERSEDIA UNTUK SEMENTARA.</p>
  <p class="output">SILAKAN COBA UNTUK <a href="<?=$base_home?>">KEMBALI</a> ATAU <a href="<?=$base_home?>">KEMBALI KE BERANDA</a>.</p>
  <p class="output">SEMOGA BERHASIL .</p>
</div>

<script type="text/javascript">
var obj = $('#fire');
var fps = 200;
var letters = obj.html().split('');
obj.empty();
$.each(letters, function (el) {
  obj.append($('<span>' + this + '</span>'));
});
var animateLetters = obj.find('span');
setInterval(function () {
  animateLetters.each(function () {
      $(this).css('fontSize', 40 + (Math.floor(Math.random() * 20)));
  });
}, fps);
</script>
