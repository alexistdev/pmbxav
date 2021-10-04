<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Aplikasi Penerimaan Siswa Baru
 * Dikembangkan oleh: KencanaTech
 * web: www.kencanatech.com
 * contact: alexistdev@gmail.com
 * hp : 082371408678
 */
?>
<div class="login-box">
	<!-- /.login-logo -->
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Siswa Login</p>
			<p class="login-box-msg">
				<?php
				echo $this->session->flashdata('pesan');
				echo $this->session->flashdata('pesan2');
				?>
				<?= form_error('captcha'); ?>
			</p>
			<?= form_open("login",'class="register-form"'); ?>
			<div class="form-group">
				<div class="input-group mb-3">
					<?= form_input(array(
							'type' => 'text',
							'class' => (!empty(form_error('username'))) ? "form-control is-invalid" : "form-control",
							'name' => 'username',
							'placeholder' => 'NISN',
							'max_length' => '30',
							'value' => set_value('username'),
//								'required' => 'required'
					)); ?>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>

				</div>
				<?= form_error('username'); ?>
			</div>

				<div class="form-group">
					<div class="input-group mb-3">
						<?= form_input(array(
								'type' => 'password',
								'class' => (!empty(form_error('password'))) ? "form-control is-invalid" : "form-control",
								'name' => 'password',
								'placeholder' => '******',
								'min_length' => '6',
								'max_length' => '16',
								'value' => set_value('password'),
//								'required' => 'required'
						)); ?>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<?= form_error('password'); ?>
				</div>



					<div class="row">
						<div class="col-md-6">
							<div class="icheck-primary">
								<?= $image; ?>
							</div>
						</div>
						<!-- /.col -->
						<div class="col-md-6">
							<?= form_input(array(
									'type' => 'text',
									'class' => (!empty(form_error('captcha'))) ? "form-control is-invalid" : "form-control",
									'name' => 'captcha',
									'placeholder' => 'Captcha',
									'min_length' => '3',
									'max_length' => '5',
									'value' => set_value('captcha'),
//								'required' => 'required'
							)); ?>
						</div>
						<!-- /.col -->
					</div>
					<div class="row mt-4">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary btn-block">Login</button>
						</div>
					</div>
				</form>

				<!-- /.social-auth-links -->
				<div class="row">
					<div class="col-md-6">
						<p class="mb-1 mt-4">
							<a href="forgot-password.html">Lupa password?</a>
						</p>
					</div>
					<div class="col-md-6">
						<p class="mb-1 mt-4 float-right">
							<a href="<?= base_url('Registration'); ?>">Daftar?</a>
						</p>
					</div>
				</div>



		</div>
		<!-- /.login-card-body -->
	</div>
</div>
<!-- /.login-box -->
