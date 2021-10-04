<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Aplikasi Penerimaan Siswa Baru
	 * Dikembangkan oleh: KencanaTech
	 * web: www.kencanatech.com
	 * contact: alexistdev@gmail.com
	 * hp : 082371408678
	 */

	public $session;
	public $form_validation;
	public $input;
	public $siswa;

	/** Constructor dari Class Login */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('registration/M_siswa', 'siswa');
		$this->title = "Login Dashboard | "._namaSekolah();
		if ($this->session->userdata('is_login_in') == TRUE) {
			redirect('Member');
		}
	}

	/** Template untuk memanggil view */
	private function _layout($data, $view)
	{
		$this->load->view('siswa/view/' . $view, $data);
	}

	/** Method untuk generate captcha */
	private function _create_captcha()
	{
		$cap = create_captcha(config_captcha());
		$image = $cap['image'];
		$this->session->set_userdata('captchaword', $cap['word']);
		return $image;
	}

	/** Validasi Captcha */
	public function _check_captcha($string)
	{
		if ($string == $this->session->userdata('captchaword')) {
			return TRUE;
		} else {
			$this->form_validation->set_message('_check_captcha', 'Captcha yang anda masukkan salah!');
			return FALSE;
		}
	}

	public function index()
	{
		$this->form_validation->set_data($this->input->post());
		$this->form_validation->set_rules($this->_cekValidasi());
		$this->form_validation->set_error_delimiters('<span class="text-danger text-sm" >', '</span>');
		if ($this->form_validation->run() === false) {
			$data['image'] = $this->_create_captcha();
			$data['title'] = $this->title;
			$data['tag'] = 'user';
			$view ='v_login';
			$this->_layout($data,$view);
		} else {
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);
			$cekLogin = $this->siswa->validasi_login($username)->row();
			if(!password_verify($password, $cekLogin->password)){
				$this->session->set_flashdata('pesan2', '<div class="alert alert-danger" role="alert">Username atau password anda salah!</div>');
				redirect("login");
			} else {
				$data_session = array(
					'id_user' => $cekLogin->id_user,
					'is_login_siswa' => TRUE,
				);
				$this->session->set_userdata($data_session);
				redirect("siswa/dashboard");
			}
		}
	}

	/** Validasi input registration */
	private function _cekValidasi()
	{
		$config = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'trim|max_length[30]|required',
				'errors' => array(
					'required' => 'Anda harus mengisi %s.',
					'max_length' => 'Panjang karakter %s maksimal adalah 30 karakter.'
				),
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'trim|max_length[16]|required',
				'errors' => array(
					'required' => 'Anda harus mengisi %s.',
					'max_length' => 'Panjang karakter %s maksimal adalah 30 karakter.'
				),
			),
			array(
				'field' => 'captcha',
				'label' => 'Captcha',
				'rules' => 'trim|callback__check_captcha|required|max_length[5]',
				'errors' => array(
					'required' => 'Anda harus mengisi %s.',
					'max_length' => 'Anda harus mengisi %s dengan benar.'
				),
			),
		);
		return $config;
	}
}
