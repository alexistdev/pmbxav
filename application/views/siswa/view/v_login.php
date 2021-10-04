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
<!DOCTYPE html>
<html>
<?php $this->load->view('admin/template/v_header') ?>

<body class="hold-transition login-page bg-dark">

<!-- Site wrapper -->
<?php $this->load->view('siswa/konten/k_login') ?>


<!-- jQuery -->
<script src="<?= base_url('vendor/almasaeed2010/adminlte') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('vendor/almasaeed2010/adminlte') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('vendor/almasaeed2010/adminlte') ?>/dist/js/adminlte.min.js"></script>

<script>
	/** After window Load */
	$(window).bind("load", function() {
		window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function() {
				$(this).remove();
			});
		}, 4000);
	});
</script>

</body>

</html>
