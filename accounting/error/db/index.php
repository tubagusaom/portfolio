<?php

	$base_ = (empty($_SERVER['HTTPS']) OR strtolower($_SERVER['HTTPS']) === 'off') ? 'http' : 'https';
	$base_ .= '://'. $_SERVER['HTTP_HOST'];

	if ($_SERVER['HTTP_HOST'] == "localhost") {
		$base_url = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
	}
	elseif ($_SERVER['HTTP_HOST'] == "192.168.1.19") {
    $base_url = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
  }
	else{
		$base_url = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $base_).'/';
	}

  $base_home = str_replace('error/db/','', $base_url);

	// echo $base_home;
?>

<html lang="en">
<head>
	<title>DATABASE ERROR</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="ERROR, ERROR DB, DATABASE, EROR, DB, error db, error, error database, eror, Could not select database, database tidak ditemukan" />
  <meta name="description" content="ERROR DATABASE">
  <meta name="author" content="https://www.instagram.com/tera.bytee/">

	<link rel="shortcut icon" href="<?=$base_home?>berkas/images/error_db.png" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="<?=$base_home?>berkas/css/error_db.css">
	<link rel="stylesheet" type="text/css" href="<?=$base_home?>home/css/font-awesome-4.7.0/css/font-awesome.css">
</head>

<body>
	<div id="wrapper">

	<div class="grid">
		<span class="server_head">
			<a class="refresh" href="<?=$base_home?>">
				<i id="rotasi" class="fa fa-refresh"></i> REFRESH
			</a>
		</span>
	  <span class="server"><font></font></span>
	  <span class="server"></span>
	  <span class="server"></span>
	  <span class="server"></span>
	  <span class="server"></span>
	</div>

	<div class="content">
	  <h1>COULD NOT SELECT DATABASE</h1>
	</div>

	</div>
</body>
</html>
