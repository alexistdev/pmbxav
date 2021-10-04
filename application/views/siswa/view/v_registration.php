<!DOCTYPE html>
<html lang="en">
<head>

	<title><?= sanitasi($title); ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Font Icon -->
	<link rel="stylesheet"
		  href="<?= base_url('assets/login/') ?>fonts/material-icon/css/material-design-iconic-font.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
		  integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!-- Web Icon -->
	<link rel="icon" href="<?= base_url('assets/gambar/') ?>myicon.png">
	<!-- Main css -->
	<link rel="stylesheet" href="<?= base_url('assets/login/') ?>css/style.css">
	<style>
		.bg-danger {
			background-color: #f2dede;
		}

		.text-danger {
			color: red;
		}

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		html, body {
			height: 100%;
			background-color: #333;
		}

		.container {
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-orient: vertical;
			-webkit-box-direction: normal;
			-ms-flex-direction: column;
			flex-direction: column;
			height: 100%;
			width: 100%;
			min-width: 480px;
			padding: 0 40px;
		}

		.breadcrumb {
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			border-radius: 6px;
			overflow: hidden;
			margin: auto;
			text-align: center;
			top: 50%;
			width: 100%;
			height: 57px;
			-webkit-transform: translateY(-50%);
			transform: translateY(-50%);
			box-shadow: 0 1px 1px black, 0 4px 14px rgba(0, 0, 0, 0.7);
			z-index: 1;
			background-color: #ddd;
			font-size: 14px;
		}

		.breadcrumb a {
			position: relative;
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-flex: 1;
			-ms-flex-positive: 1;
			flex-grow: 1;
			text-decoration: none;
			margin: auto;
			height: 100%;
			padding-left: 38px;
			padding-right: 0;
			color: #666;
		}

		.breadcrumb a:first-child {
			padding-left: 15.2px;
		}

		.breadcrumb a:last-child {
			padding-right: 15.2px;
		}

		.breadcrumb a:after {
			content: "";
			position: absolute;
			display: inline-block;
			width: 57px;
			height: 57px;
			top: 0;
			right: -28.14815px;
			background-color: #ddd;
			border-top-right-radius: 5px;
			-webkit-transform: scale(0.707) rotate(45deg);
			transform: scale(0.707) rotate(45deg);
			box-shadow: 1px -1px rgba(0, 0, 0, 0.25);
			z-index: 1;
		}

		.breadcrumb a:last-child:after {
			content: none;
		}

		.breadcrumb__inner {
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-orient: vertical;
			-webkit-box-direction: normal;
			-ms-flex-direction: column;
			flex-direction: column;
			margin: auto;
			z-index: 2;
		}

		.breadcrumb__title {
			font-weight: bold;
		}

		.breadcrumb a.active, .breadcrumb a:hover {
			background: #996300;
			color: white;
		}

		.breadcrumb a.active:after, .breadcrumb a:hover:after {
			background: #996300;
			color: white;
		}

		@media all and (max-width: 1000px) {
			.breadcrumb {
				font-size: 12px;
			}
		}

		@media all and (max-width: 710px) {
			.breadcrumb__desc {
				display: none;
			}

			.breadcrumb {
				height: 38px;
			}

			.breadcrumb a {
				padding-left: 25.33333px;
			}

			.breadcrumb a:after {
				content: "";
				width: 38px;
				height: 38px;
				right: -19px;
				-webkit-transform: scale(0.707) rotate(45deg);
				transform: scale(0.707) rotate(45deg);
			}
		}

	</style>
</head>
<body>

<div class="main">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="signup-content">

					<div class="signup-img">
						<img src="<?= base_url('assets/login/') ?>images/signup-img.jpg" alt="">
					</div>
					<div class="signup-form">
						<div class="breadcrumb">
							<a href="https://smpxaverius1bl.com">
						<span class="breadcrumb__inner">
							<span class="breadcrumb__title">Home</span>
						</span>
							</a>
							<a href="#">
						<span class="breadcrumb__inner">
							<span class="breadcrumb__title">Petunjuk Pengisian</span>
						</span>
							</a>
							<a href="#">
						<span class="breadcrumb__inner">
							<span class="breadcrumb__title">Ketentuan</span>
						</span>
							</a>
							<a href="#">
						<span class="breadcrumb__inner">
							<span class="breadcrumb__title">Jadwal PPDB</span>
						</span>
							</a>
							<a href="#">
						<span class="breadcrumb__inner">
							<span class="breadcrumb__title">Login</span>
						</span>
							</a>
						</div>
						<?= form_open("Registration",'class="register-form"'); ?>
							<h2>Form Pendaftaran Siswa Baru</h2>
							<!-- Start: Nama dan NISN -->
							<div class="form-row">
								<div class="form-group">
									<label for="namaLengkap">Nama :</label>
									<?= form_input(array(
											'type' => 'text',
											'class' => (!empty(form_error('namaLengkap'))) ? "form-control is-invalid" : "form-control",
											'name' => 'namaLengkap',
											'placeholder' => 'Nama Lengkap',
											'value' => set_value('namaLengkap'),
											'required' => 'required'
									)); ?>

									<?= form_error('namaLengkap'); ?>
								</div>
								<div class="form-group">
									<label for="nisn">Nisn :</label>
									<?= form_input(array(
											'type' => 'text',
											'class' => (!empty(form_error('nisn'))) ? "form-control is-invalid" : "form-control",
											'name' => 'nisn',
											'placeholder' => 'NISN',
											'value' => set_value('nisn'),
											'required' => 'required'
									)); ?>
									<?= form_error('nisn'); ?>
								</div>
							</div>
							<!-- End: Nama dan NISN -->


							<div class="form-row">
								<!-- Start : Jumlah Saudara -->
								<div class="form-group">
									<label for="jmlSaudara">Jumlah Saudara</label>
									<?= form_input(array(
											'type' => 'number',
											'class' => (!empty(form_error('jmlSaudara'))) ? "form-control is-invalid" : "form-control",
											'name' => 'jmlSaudara',
											'placeholder' => '0',
											'value' => set_value('jmlSaudara'),
										//'required' => 'required'
									)); ?>

									<?= form_error('jmlSaudara'); ?>
								</div>
								<!-- End : Jumlah Saudara -->

								<!-- Start : Anak ke -->
								<div class="form-group">
									<label for="anakke">Anak ke :</label>
									<?= form_input(array(
											'type' => 'number',
											'class' => (!empty(form_error('anakke'))) ? "form-control is-invalid" : "form-control",
											'name' => 'anakke',
											'placeholder' => '1',
											'value' => set_value('anakke'),
										//'required' => 'required'
									)); ?>
									<?= form_error('anakke'); ?>
								</div>
								<!-- End : Anak ke -->
							</div>

							<div class="form-row">
								<!-- Start : Jenis Kelamin -->
								<div class="form-group">
									<label for="jenis_kelamin">Jenis Kelamin :</label>
									<?php $optionJK = array(
										'' => 'Pilih',
										'L' => 'Laki-laki',
										'P' => 'Perempuan',
									); ?>
									<?= form_dropdown('jenisKelamin',$optionJK,set_value('jenisKelamin'),array('class' => (!empty(form_error('jenisKelamin'))) ? "form-control is-invalid" : "form-control",)); ?>
									<?= form_error('jenisKelamin'); ?>
								</div>
								<!-- End : Jenis Kelamin -->

								<!-- Start : Agama -->
								<div class="form-group">
									<label for="agama">Agama :</label>
									<?php $optionAgama = array(
											'' => 'Pilih',
											'islam' => 'Islam',
											'katholik' => 'Katholik',
											'kristen' => 'Kristen',
											'hindu' => 'Hindu',
											'budha' => 'Budha',
									); ?>
									<?= form_dropdown('namaAgama',$optionAgama,set_value('namaAgama'),array('class' => (!empty(form_error('namaAgama'))) ? "form-control is-invalid" : "form-control")); ?>
									<?= form_error('namaAgama'); ?>
								</div>
								<!-- End : Agama -->
							</div>

							<div class="form-row">
								<!-- Start : Asal Sekolah -->
								<div class="form-group">
									<label for="asalSekolah">Asal Sekolah :</label>
									<?php
									echo form_dropdown('asalSekolah', $asalSekolah, set_value('asalSekolah'), array('class' => (!empty(form_error('asalSekolah'))) ? "form-control is-invalid" : "form-control")); ?>
									<?= form_error('asalSekolah'); ?>
								</div>
								<!-- End : Asal Sekolah -->

								<!-- Start : Nomor Telepon -->
								<div class="form-group">
									<label for="nomorTelepon">Nomor Telepon :</label>
									<?= form_input(array(
											'type' => 'text',
											'class' => (!empty(form_error('nomorTelepon'))) ? "form-control is-invalid" : "form-control",
											'name' => 'nomorTelepon',
											'placeholder' => '0812345678',
											'value' => set_value('nomorTelepon'),
										//'required' => 'required'
									)); ?>
									<?= form_error('nomorTelepon'); ?>
								</div>

								<!-- End : Nomor Telepon -->
							</div>


							<div class="form-row">
								<!-- Start : Tempat Lahir -->
								<div class="form-group">
									<label for="tempatLahir">Tempat Lahir :</label>
									<?= form_input(array(
											'type' => 'text',
											'class' => (!empty(form_error('tempatLahir'))) ? "form-control is-invalid" : "form-control",
											'name' => 'tempatLahir',
											'placeholder' => 'Tempat Lahir',
											'value' => set_value('tempatLahir'),
										//'required' => 'required'
									)); ?>
								</div>
								<!-- End : Tempat Lahir -->
								<!-- Start : Tanggal Lahir -->
								<div class="form-group">
									<label for="tanggalLahir">Tanggal Lahir :</label>
									<?= form_input(array(
											'type' => 'text',
											'class' => (!empty(form_error('tanggalLahir'))) ? "form-control is-invalid" : "form-control",
											'name' => 'tanggalLahir',
											'placeholder' => '01-01-2021',
											'value' => set_value('tanggalLahir'),
											'id' => 'datepicker'
										//'required' => 'required'
									)); ?>

									<?= form_error('tanggalLahir'); ?>
								</div>
								<!-- End : Tanggal Lahir -->
							</div>

							<div class="form-row">
								<!-- Start : Golongan Darah -->
								<div class="form-group">
									<label for="golDarah">Golongan Darah :</label>
									<?php $optionDarah = array(
											'' => 'Pilih',
											'A' => 'A',
											'B' => 'B',
											'AB' => 'AB',
											'O' => 'O',
									); ?>
									<?= form_dropdown('golDarah',$optionDarah,set_value('golDarah'),array('class' => (!empty(form_error('golDarah'))) ? "form-control is-invalid" : "form-control")); ?>

									<?= form_error('golDarah'); ?>
								</div>
								<!-- End : Golongan Darah -->

								<!-- Start : Tinggi badan -->
								<div class="form-group">
									<label for="tinggiBadan">Tinggi Badan :</label>
									<?= form_input(array(
											'type' => 'text',
											'class' => (!empty(form_error('tinggiBadan'))) ? "form-control is-invalid" : "form-control",
											'name' => 'tinggiBadan',
											'placeholder' => '165',
											'value' => set_value('tinggiBadan'),
										//'required' => 'required'
									)); ?>

									<?= form_error('tinggiBadan'); ?>
								</div>
								<!-- End : Tinggi badan -->

							</div>

						<div class="form-row">

							<!-- Start : Berat Badan badan -->
							<div class="form-group">
								<label for="beratBadan">Berat Badan :</label>
								<?= form_input(array(
										'type' => 'text',
										'class' => (!empty(form_error('beratBadan'))) ? "form-control is-invalid" : "form-control",
										'name' => 'beratBadan',
										'placeholder' => '55',
										'value' => set_value('beratBadan'),
									//'required' => 'required'
								)); ?>

								<?= form_error('beratBadan'); ?>
							</div>
							<!-- End : Berat badan -->

						</div>

							<div class="form-row">
								<div class="form-group">
									<?= $image; ?>
									<label for="captcha">Captcha :</label>
									<?= form_input(array(
											'type' => 'text',
											'class' => (!empty(form_error('captcha'))) ? "form-control is-invalid" : "form-control",
											'name' => 'captcha',
											'placeholder' => 'captcha',
											'value' => set_value('captcha'),
										//'required' => 'required'
									)); ?>

									<?= form_error('captcha'); ?>
								</div>
							</div>

							<div class="form-submit">
								<button type="button" class="btn btn-dark">BATAL</button>
								<button type="submit" class="btn btn-primary">DAFTAR</button>
							</div>
						<?= form_close(); ?>
					</div>
				</div>
			</div>

		</div>
	</div>

</div>

<!-- JS -->
<script src="<?= base_url('assets/login/') ?>vendor/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
		crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?= base_url('assets/login/') ?>js/main.js"></script>
<script>
	$( function() {
		$( "#datepicker" ).datepicker();
	} );
</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
