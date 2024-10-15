<!DOCTYPE html>
<html>
<head>
	<title>Detail MPA</title>
	<link rel="stylesheet" href="<?= base_url() . 'assets/bootstraps2.css' ?>">
</head>
<body>
<div class="container" style="margin:20px;">
	<div class="row">
	<div class="col-md-12 well">
		<div class="col-md-2">Nama MMA</div><div class="col-md-10"><b><?=$mma->nama_mma?></b></div>
		<div class="col-md-2">Tanggal Penyusunan</div><div class="col-md-10"><b><?=tgl_indo($mma->tanggal_penyusunan)?></b></div>
		<div class="col-md-2">Deskripsi MMA</div><div class="col-md-10"><b><?=$mma->deskripsi_mma?></b></div>
	</div>
	<div class="col-md-12"><?php
echo $table;
?>
</div>
</div>
</div>
<script src="<?php echo base_url() ?>assets/js/jquery.v2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/bootstraps/bootstrap.min.js" type="text/javascript"></script>
</body>