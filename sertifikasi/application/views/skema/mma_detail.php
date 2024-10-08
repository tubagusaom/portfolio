<!DOCTYPE html>
<html>
<head>
	<title>Detail MMA</title>
	<link rel="stylesheet" href="<?= base_url() . 'assets/bootstraps2.css' ?>">
	<style type="text/css">
		 .table_detail{
		 	
		 	padding:2px; 
		 }
	</style>
</head>
<body>

<form action="<?=base_url().'skema/mma_add'?>" method="POST">
<div class="container" style="margin:20px;">
	<div class="row">
		<input type="hidden" name="id_kuk" value="<?=$id_kuk?>">
		<input type="hidden" name="id_mma" value="<?=$id_mma?>">

		<div class="col-md-2" style="margin-bottom: 15px;">Kriteria Unjuk Kerja</div>
		<div class="col-md-10" style="margin-bottom: 15px;"><input type="text" class="form-control" name="kuk" value="<?=$data_kuk->kuk?>"></div>

		<div class="col-md-2" style="margin-bottom: 15px;">Nama Bukti</div>
		<div class="col-md-10" style="margin-bottom: 15px;"><input type="text" class="form-control" name="deskripsi_bukti"></div>

		<div class="col-md-2" style="margin-bottom: 5px;">Jenis Bukti</div>
		<div class="col-md-10" style="margin-bottom: 5px;">
			<input type="radio"  name="jenis_bukti" value="Langsung">Langsung 
			<input type="radio"  name="jenis_bukti" value="Tidak Langsung">Tidak Langsung
			<input type="radio"  name="jenis_bukti" value="Tambahan">Tambahan
		</div>

		<div class="col-md-2" style="margin-bottom: 5px;">Metode Uji</div>
		<div class="col-md-10" style="margin-bottom: 5px;">
			<input type="radio"  name="metode_bukti" value="CLO">CLO 
			<input type="radio"  name="metode_bukti" value="CLP">CLP 
			<input type="radio"  name="metode_bukti" value="DPL">DPL	 
			<input type="radio"  name="metode_bukti" value="DPT">DPT	 
			<input type="radio"  name="metode_bukti" value="PW">PW 
			<input type="radio"  name="metode_bukti" value="SK">SK	 
		</div>

		<div class="col-md-2"></div>
		<div class="col-md-10"><input type="submit" class="btn" value="Simpan"><a href="<?=base_url().'skema/mma/'.$id_mma?>">Kembali</a></div>
	</div>
</div>
</form>

<table class="table">
	<tr><th>Nama Bukti</th><th>Jenis Bukti</th><th>Metode Uji</th><th>Aksi</th></tr>
	<?php foreach ($data as $key => $value) {
		echo '<tr><td>'.$value->deskripsi_bukti.'</td>
		<td>'.$value->jenis_bukti.'</td>
		<td>'.$value->metode_bukti.'</td>
		<td><a href="'.base_url().'skema/mma_delete/'.$id_kuk.'/'.$id_mma.'/'.$value->id.'">Hapus</a></td>
		</tr>';
	}
	?>
</table>
</body>
<script src="<?php echo base_url() ?>assets/jquery.v2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/bootstraps/bootstrap.min.js" type="text/javascript"></script>
</html>
