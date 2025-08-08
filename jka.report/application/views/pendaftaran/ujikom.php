<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pendaftaran | <?=$aplikasi->singkatan_unit?></title>

	<link rel="shortcut icon" href="<?=base_url()?>assets/icon-pendaftaran.png" type="image/x-icon" />

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/_tera_byte/form/css/opensans-font.css">
	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url() ?>assets/_tera_byte/form/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstraps/font-awesome.min.css" type="text/css" />

	<!-- Bootstrap -->
	<link rel="stylesheet"
		href="<?php echo base_url() ?>assets/_tera_byte/form/vendor/bootstrap.3.3.4/css/bootstrap.min.css">

	<!-- Main Style Css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/_tera_byte/form/css/style.css" />

	<!-- Main Style tera_byte -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/_tera_byte/form/css/wizard.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/_tera_byte/form/css/accordion.css" />

	<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet">
	</link>

	<style>
		#myOverlay {
			position: fixed;
			top: 0px;
			bottom: 0px;
			width: 100%;
			overflow-y: auto;
		}

		#myOverlay {
			background: black;
			opacity: .7;
			z-index: 2;
		}

		#loadingGIF {
			position: fixed;
			top: 40%;
			left: 45%;
			z-index: 3;
		}

		#loadingGIF img {
			width: 100px;
		}

		.harus_diisi {
			color: red;
			font-weight: bold;
		}

		/* @media screen and (min-width: 80rem) {

	} */
	</style>

</head>

<body>

	<div id="myOverlay"></div>
	<!-- <div id="loadingGIF"><img src="<?=base_url()?>assets/_tera_byte/images/book-gif.gif" /></div> -->
	<div id="loadingGIF">
		<img src="<?=base_url()?>assets/gif/spin-200.gif" />
	</div>

	<div class="page-content">

		<div id="formHeader" class="form-header">
			<div class="wizard-header-2">

				<ul class="wizard2">
					<li class="active2">
						<a id="link-1" class="td-none" href="#step1">Skema</a>
					</li>
					<li id="step2" class="disabled">
						<a id="link-2" class="td-none" href="#step2">APL-01</a>
					</li>
					<li id="step3" class="disabled">
						<a id="link-3" class="td-none" href="#step3">Dokumen</a>
					</li>
					<li id="step4" class="disabled">
						<a id="link-4" class="td-none" href="#step4">APL-02</a>
					</li>
				</ul>

				<!-- <div class="wizard2">
					<div id="step1" class="step-menu">
						<a class="a-menu active2">Skema</a>
					</div>
				</div> -->

			</div>
		</div>

		<div class="form-v1-content">
			<div class="wizard-form">
				<!-- <form name="formRegister" id="formRegister" class="form-register" onsubmit="return validateForm()"
					action="#" method="post"> -->
				<form name="formRegister" id="formRegister" class="form-register" role="form" method="post" action="<?php echo base_url() . "welcome/uji_kompetensi_save"; ?>" enctype="multipart/form-data">

					<input type="hidden" name="step_langkah" id="step_langkah" value="<?=$uri?>">
					<input type="hidden" name="skema_yang_dipilih" id="skema_yang_dipilih">

					<div id="form-total">

						<h2 id="step1">
							<p class="step-icon"><span>01</span></p>
							<span class="step-text">Skema Sertifikasi</span>
						</h2>
						<?php
							$this->load->view('pendaftaran/step_1');
						?>

						<h2>
							<p class="step-icon"><span>02</span></p>
							<span class="step-text">Personal Infomation</span>
						</h2>
						<?php
			              $this->load->view('pendaftaran/step_2');
			            ?>


						<h2>
							<p class="step-icon"><span>03</span></p>
							<span class="step-text">Connect Bank Account</span>
						</h2>
						<?php
							$this->load->view('pendaftaran/step_3');
			            ?>

						<h2>
							<p class="step-icon"><span>04</span></p>
							<span class="step-text">Set Financial Goals</span>
						</h2>
						<?php
			              $this->load->view('pendaftaran/step_4');
			            ?>

					</div>
				</form>
			</div>

		</div>

	</div>



	<!-- jQuery -->
	<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

	<script src="<?php echo base_url();?>assets/_tera_byte/form/vendor/jquery.2.1.3/jquery.min.js"></script>
	<!-- <script src="<?php echo base_url();?>assets/_tera_byte/form/js/jquery-3.3.1.min.js"></script> -->

	<!-- Bootstrap JS -->
	<script src="<?php echo base_url();?>assets/_tera_byte/form/vendor/bootstrap.3.3.4/js/bootstrap.min.js"></script>

	<script src="<?php echo base_url();?>assets/_tera_byte/form/js/jquery.steps.js"></script>
	<script src="<?php echo base_url();?>assets/_tera_byte/form/js/main.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
	<script src="<?php echo base_url() ?>assets/_tera_byte/plugins/limonte-sweetalert2/sweetalert2.all.min.js"></script>

	<script>
		var base_url = "<?php echo base_url() ?>";

		$('#myOverlay').hide();
		$('#loadingGIF').hide();

		window.onscroll = function () {
			myFunction()
		};

		var header = document.getElementById("formHeader");
		// var kontenx = document.getElementsByClassName("content");

		// var header = $('#formHeader');
		var sticky = header.offsetTop;

		function myFunction() {
			if (window.pageYOffset > sticky) {
				header.classList.add("sticky");
				header.classList.add("shadow1");
				header.classList.remove("shadow2");

			} else {
				header.classList.remove("sticky");
				header.classList.remove("shadow1");
				header.classList.add("shadow2");
			}
		}

		function pilih_skema(id) {
			$('#skema_yang_dipilih').val(id);
			$('#step_langkah').val('2');

			// alert($('#skema_yang_dipilih').val());
		}
	</script>

</body>

</html>
