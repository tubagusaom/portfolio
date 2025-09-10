<?php
	header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' );
	header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
	header( 'Cache-Control: no-store, no-cache, must-revalidate' );
	header( 'Cache-Control: post-check=0, pre-check=0', false );
	header( 'Pragma: no-cache' );
	echo doctype('html5');
?>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="product" content="Sistem Informasi Sertifikasi Online <?=$aplikasi->singkatan_unit?>">
    <meta name="description" content="Sistem Informasi Sertifikasi Online <?=$aplikasi->singkatan_unit?>">
    <meta name="author" content="Krisno W. Utomo, MBS Team">
    <meta name="keywords" content="<?=$aplikasi->singkatan_unit?>, Sistem Sertifikasi Online,Sistem Sertifikasi Online BNSP">
	<meta charset="utf-8">
	<title><?php echo $this->config->item('title') ?></title>
    <link href='<?=base_url()?>favicon.ico' rel='icon' type='image/x-icon'/>
	<script type="text/javascript">
		var base_url = "<?php echo base_url() ?>";
	</script>
<?php
	if(isset($_css_tag))
	{
		echo link_tag($_css_tag);
	}
	if(isset($_script_tag))
	{
		echo script_tag($_script_tag);
	}
?>
	<script type="text/javascript">
		var base_url = "<?php echo base_url() ?>";
		window.onload = function(){
			window.name = 'simontiParent';
		}
	</script>
</head>
<body>
