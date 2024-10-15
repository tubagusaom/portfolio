<link href="<?php echo base_url() ?>_assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	<div class="row">
	<h3>Nama Perangkat : <?=$data->perangkat_detail?></h3>
	<h5>Jenis Perangkat : <?=$jenis_soal[$data->jenis_perangkat]?></h5>
	<h5>Jumlah Soal : <?=$data->jumlah_soal?> Soal</h5>
	<h5>Waktu : <?=$data->waktu_pengerjaan?> Menit</h5>
	
    <?php
	foreach ($detail_perangkat as $key => $value) { 
		if($value->jenis_soal=='2'){
	?>
	
	<div class="well"><?=($key+1).'. '.$value->pertanyaan?></div>

<?php		
		}else{

?>
	<div class="well"><?='<b>'.($key+1).'. '.$value->pertanyaan.'</b>'?>
		<?php echo $value->jawaban_a!=""?'<br/>&nbsp&nbsp&nbsp&nbspA. '.$value->jawaban_a:''?>
		<?php echo $value->jawaban_b!=""?'<br/>&nbsp&nbsp&nbsp&nbspB. '.$value->jawaban_b:''?>
		<?php echo $value->jawaban_c!=""?'<br/>&nbsp&nbsp&nbsp&nbspC. '.$value->jawaban_c:''?>
		<?php echo $value->jawaban_d!=""?'<br/>&nbsp&nbsp&nbsp&nbspD. '.$value->jawaban_d:''?>
		<?php echo $value->jawaban_e!=""?'<br/>&nbsp&nbsp&nbsp&nbspE. '.$value->jawaban_e:''?>
	</div>


<?php
		}
	}
?>
</div>
</div>    