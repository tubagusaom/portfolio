<?php

	if (isset($_SESSION['akses'])) {
		$sessionakses = $_SESSION['akses'];
	}else{
		$sessionakses = '';
		$_MODULE = [];
		$akses = '';
	}

	$this_login->sesiOn($sessionakses,FALSE);

	$arr_segmen = $this_url->get_url();
  $segmen = explode ("&&",$arr_segmen);
  // echo $segmen[0];

  $aksesusr = $this_login->akses_user($_SESSION['akses']);

	$basehomeurl = str_replace('home/','',base_url());

	// echo $basehomeurl;
?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="DEMO Koperasi OBS Versi 2.0" />
	<title><?=$aksesusr?> - <?=singkatan_app()?> Versi 3.0</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?=base_url() ?>images\logokoperasi_transparent_k.png" />
	<link rel="stylesheet" href="<?=base_url() ?>css/corehtml.css">
	<link rel="stylesheet" href="<?=base_url() ?>css/navigasi.css">
	<link rel="stylesheet" href="<?=base_url() ?>css/container.css">
	<link rel="stylesheet" href="<?=base_url() ?>css/respon.css">
	<link rel="stylesheet" href="<?=base_url() ?>css/content.css">
	<link rel="stylesheet" href="<?=$basehomeurl?>berkas/css/coits.css">
	<link rel="stylesheet" href="<?=$basehomeurl?>berkas/css/form.css">
	<link rel="stylesheet" href="<?=base_url() ?>css/font-awesome-4.7.0/css/font-awesome.css" media="screen" title="no title" charset="utf-8">
	<script type="text/javascript" src="<?=base_url() ?>js/in.js"></script>
	<script type="text/javascript" src="<?=base_url() ?>js/form.js"></script>
	<script type="text/javascript" src="<?=$basehomeurl ?>berkas/js/form.js"></script>
</head>
