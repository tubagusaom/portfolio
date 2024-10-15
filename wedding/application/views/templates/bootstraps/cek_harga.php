<link href="<?= base_url(); ?>assets/plugins/select2-4.0.3/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url() ?>assets/js/jquery.v2.min.js" type="text/javascript"></script>

<style media="screen">
	.input-tb{
    width: 100%;
    height: 34px;
    padding: 3px 10px;
    font-size: 14px;
    line-height: 1.42857143;
    color: rgba(0, 0, 0, 0.5);
    background-color: #fff;
    background-image: none;
    border: none;
  	border-bottom: 1px solid #aaa;
	}
	.input-tb:disabled {
	  background: transparent;
	}
</style>

<div class="modal fade" id="formModal" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title heading-primary" id="formModalLabel">Daftar dan Cek Harga Mobil Anda - Gratis!</h4>
			</div>
			<div class="modal-body">
				<form action="<?=base_url().'cek-harga-save'?>" method="POST" id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate">
					<div class="form-group mt-lg">
						<label class="col-sm-4 control-label">TAHUN MOBIL</label>
						<div class="col-sm-8">

							<select id="id_tahun" name="id_tahun" class="combobox form-control select2" style="width: 100%" onchange="prosesTahun()">
								<option value="" selected>TAHUN MOBIL</option>
								<?php foreach ($tahun_mobil as $tahun) { ?>
									<option value="<?php echo $tahun->id ?>">
										<?php echo $tahun->tahun_mobil ?>
									</option>
								<?php } ?>
              </select>

						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label">MEREK MOBIL</label>
						<div id="merek1" class="col-sm-8" style="display:block">
							<input type="text" class="input-tb" disabled value="MEREK MOBIL">
						</div>
						<div id="merek2" class="col-sm-8" style="display:none">
							<select id="id_merek" name="id_merek" class="combobox form-control select2" style="width: 100%" onchange="prosesMerek()">
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label">MODEL MOBIL</label>
						<div id="model1" class="col-sm-8" style="display:block">
							<input type="text" class="input-tb" disabled value="MODEL MOBIL">
						</div>
						<div id="model2" class="col-sm-8" style="display:none">
							<select id="id_model" name="id_model" class="combobox form-control select2" style="width: 100%" onchange="prosesModel()">
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label">TRANSMISI</label>
						<div id="transmisi1" class="col-sm-8" style="display:block">
							<input type="text" class="input-tb" disabled value="TRANSMISI MOBIL">
						</div>
						<div id="transmisi2" class="col-sm-8" style="display:none">
							<select id="id_transmisi" name="id_transmisi" class="combobox form-control select2" style="width: 100%" onchange="prosesTransmisi()">
							</select>
						</div>
					</div>

					<div id="dataDiri" style="display:none">
						<hr class="tall">
						<div class="form-group">
							<label class="col-sm-4 control-label">NAMA</label>
							<div class="col-sm-8">
								<input type="text" name="nama_member" class="form-control" placeholder="Masukan nama..." required/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">NO HP</label>
							<div class="col-sm-8">
								<input type="number" name="no_hp_member" class="form-control" placeholder="Masukan no handphone..." required/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">NOPOL KENDARAAN</label>
							<div class="col-sm-8">
								<input type="text" name="nopol_member" class="form-control" placeholder="Masukan NoPol kendaraan..." required/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">EMAIL</label>
							<div class="col-sm-8">
								<input type="email" name="email_member" class="form-control" placeholder="Masukan email..." required/>
							</div>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save Changes</button>
						</div>
					</div>

				</form>
			</div>

		</div>
	</div>
</div>

<script src="<?= base_url(); ?>assets/plugins/select2-4.0.3/dist/js/select2.full.min.js" type="text/javascript"></script>

<script type="text/javascript">

	var base_url = "<?php echo base_url() ?>";

	$("#id_tahun").select2({
		placeholder: "TAHUN MOBIL",
		allowClear: true,
	});

	function prosesTahun(){
		var idtahun = document.getElementById("id_tahun").value;

		if (idtahun != "") {
      document.getElementById("merek1").style.display = 'none';
			document.getElementById("merek2").style.display = 'block';

			document.getElementById("model1").style.display = 'block';
			document.getElementById("model2").style.display = 'none';

			document.getElementById("transmisi1").style.display = 'block';
			document.getElementById("transmisi2").style.display = 'none';

			$.ajax({
				type: "POST",
				url: base_url + 'welcome/master_merek',
				data: {idtahun: idtahun},
	      cache: false,
				success: function (data) {
					// $('#merek2').append('<div id="merek2" class="col-sm-8" style="display:none"></div>');
					$('#id_merek').append(data).trigger('change');
				}
			});

			$('#id_merek').empty().trigger("change");

		}

	};

	$("#id_merek").select2({
		placeholder: "MEREK MOBIL",
		allowClear: true
	});

	function prosesMerek(){
		var idmerek = document.getElementById("id_merek").value;

		if (idmerek != "") {
      document.getElementById("model1").style.display = 'none';
			document.getElementById("model2").style.display = 'block';

			document.getElementById("transmisi1").style.display = 'block';
			document.getElementById("transmisi2").style.display = 'none';

			$.ajax({
				type: "POST",
				url: base_url + 'welcome/master_model',
				data: {idmerek: idmerek},
	      cache: false,
				success: function (data) {
					// $('#model2').append('<div id="model2" class="col-sm-8" style="display:none"></div>');
					$('#id_model').append(data).trigger('change');
				}
			});

			$('#id_model').empty().trigger("change");
		}

	};


	$("#id_model").select2({
		placeholder: "MODEL MOBIL",
		allowClear: true
	});

	function prosesModel(){
		var idmodel = document.getElementById("id_model").value;

		if (idmodel != "") {
      document.getElementById("transmisi1").style.display = 'none';
			document.getElementById("transmisi2").style.display = 'block';

			$.ajax({
				type: "POST",
				url: base_url + 'welcome/master_transmisi',
				data: {idmodel: idmodel},
	      cache: false,
				success: function (data) {
					// $('#transmisi2').append('<div id="transmisi2" class="col-sm-8" style="display:none"></div>');
					$('#id_transmisi').append(data).trigger('change');
				}
			});

			$('#id_transmisi').empty().trigger("change");
		}

	};

	$("#id_transmisi").select2({
		placeholder: "TRANSMISI MOBIL",
		allowClear: true
	});

	function prosesTransmisi(){
		var idtransmisi = document.getElementById("id_transmisi").value;

		if (idtransmisi != "") {
			document.getElementById("dataDiri").style.display = 'block';
		}

	};

</script>
