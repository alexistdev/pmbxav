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
	<!-- Web Icon -->
	<link rel="icon" href="<?= base_url('assets/gambar/') ?>myicon.png">
	<!-- Main css -->
	<link rel="stylesheet" href="<?= base_url('assets/login/') ?>css/style.css">
	<style>
		.bg-danger {
			background-color: #f2dede;
		}
		.text-danger{
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

				<form action="" method="POST" class="register-form" id="register-form">
					<h2>Form Pendaftaran Siswa Baru</h2>

					<!-- Start: Nama dan NISN -->
					<div class="form-row">
						<div class="form-group">
							<label for="namaLengkap">Nama :</label>
							<input type="text" class="bg-danger" name="namaLengkap" id="namaLengkap" />
							<?= form_error('namaLengkap'); ?>
						</div>
						<div class="form-group">
							<label for="nisn">Nisn :</label>
							<input type="text" name="nisn" id="nisn" />
						</div>
					</div>
					<!-- End: Nama dan NISN -->


					<div class="form-row">
						<!-- Start : Asal Sekolah -->
						<div class="form-group">
							<label for="jmlSaudara">Jumlah Saudara</label>
							<input type="text" name="jmlSaudara" id="jmlSaudara">
						</div>
						<!-- End : Asal Sekolah -->

						<!-- Start : Nomor Telepon -->
						<div class="form-group">
							<label for="anakke">Anak ke :</label>
							<input type="text" name="anakke" id="anakke">
						</div>
						<!-- End : Nomor Telepon -->
					</div>

					<div class="form-row">
						<!-- Start : Jenis Kelamin -->
						<div class="form-group">
							<label for="jenis_kelamin">Jenis Kelamin :</label>
							<div class="form-select">
								<select name="jenis_kelamin" id="state">
									<option value="">Pilih</option>
									<option value="L">Laki-laki</option>
									<option value="P">Perempuan</option>
								</select>
								<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
							</div>
						</div>
						<!-- End : Jenis Kelamin -->

						<!-- Start : Agama -->
						<div class="form-group">
							<label for="agama">Agama :</label>
							<div class="form-select">
								<select name="agama" id="agama">
									<option value="">Pilih</option>
									<option value="islam">Islam</option>
									<option value="katolik">Katholik</option>
									<option value="kristen">Kristen</option>
									<option value="hindu">Hindu</option>
									<option value="budha">Budha</option>
								</select>
								<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
							</div>
						</div>
						<!-- End : Agama -->
					</div>

					<div class="form-row">
						<!-- Start : Asal Sekolah -->
						<div class="form-group">
							<label for="asalSekolah">Asal Sekolah :</label>
							<div class="form-select">
								<select name="asalSekolah" id="asalSekolah">
									<option value="">Pilih</option>
								</select>
								<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
							</div>
						</div>
						<!-- End : Asal Sekolah -->

						<!-- Start : Nomor Telepon -->
						<div class="form-group">
							<label for="nomorTelepon">Nomor Telepon :</label>
							<input type="text" name="nomorTelepon" id="nomorTelepon">
						</div>
						<!-- End : Nomor Telepon -->
					</div>


					<div class="form-row">
						<!-- Start : Tempat Lahir -->
						<div class="form-group">
							<label for="tempatLahir">Tempat Lahir :</label>
							<input type="text" name="tempatLahir" id="tempatLahir">
						</div>
						<!-- End : Tempat Lahir -->
						<!-- Start : Tanggal Lahir -->
						<div class="form-group">
							<label for="tanggalLahir">Tanggal Lahir :</label>
							<input type="text" name="tanggalLahir" id="tanggalLahir">
						</div>
						<!-- End : Tanggal Lahir -->
					</div>

					<div class="form-row">
						<!-- Start : Golongan Darah -->
						<div class="form-group">
							<label for="gol">Golongan Darah :</label>
							<div class="form-select">
								<select name="gol" id="gol">
									<option value="">Pilih</option>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="AB">AB</option>
									<option value="O">O</option>
								</select>
								<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
							</div>
						</div>
						<!-- End : Golongan Darah -->

						<!-- Start : Tanggal Lahir -->
						<div class="form-group">
							<label for="tinggiBadan">Tinggi Badan :</label>
							<input type="text" name="tinggiBadan" id="tinggiBadan">
						</div>
						<!-- End : Tanggal Lahir -->

					</div>
					<div class="form-row">
						<div class="form-group">
							<?= $image; ?>
							<label for="captcha">Captcha :</label>
							<input type="text" name="captcha" id="captcha">
						</div>
					</div>

					<div class="form-submit">
						<a href="<?= base_url(); ?>"><input type="button" value="Reset All" class="submit" name="reset" id="reset"/></a>
						<input type="submit" value="Simpan" class="submit" name="submit" id="submit"/>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>

<!-- JS -->
<script src="<?= base_url('assets/login/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/login/') ?>js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
